<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jax extends CI_Controller {

function __construct(){
	parent::__construct();
	session_start();
} // end constructor
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function index(){
	$data['propNum'] = $this->prop_m->get_prop_number_from_url($_SERVER['HTTP_HOST']);

	$this->load->view( 'jax_home', $data );
} // end index function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function swap_accept($aFrom, $aTo){
	$aF = $this->prop_m->get_single_assignment($aFrom);
	$aT = $this->prop_m->get_single_assignment($aTo);

	// send email to resform->recipient
	$globals = $this->prop_m->get_prop_globals($aF[0]->propNumber);

	$fStaff = $this->prop_m->get_staff_by_id($aF[0]->emp_id);
	$tStaff = $this->prop_m->get_staff_by_id($aT[0]->emp_id);

	$data['aF'] = $aF;
	$data['aT'] = $aT;
	$data['fStaff'] = $fStaff;
	$data['tStaff'] = $tStaff;
	$data['globals'] = $globals;
	$data['istaffURL'] = $this->prop_m->get_istaff_url($aF[0]->propNumber);
	// print_r($data); die();

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $globals[0]->resform_recipient;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $fStaff[0]->staffEmail . "\r\nReply-To: " . $fStaff[0]->staffEmail ;
	$headers .= "\r\nCc:";
	$headers .= "\r\nBcc: ";
	$subject = "Switch Shift Form";
	
	$message = $this->load->view( 'email_switch_shift_form', $data, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );

	redirect('jax/index', 'refresh');
} // end swap_accept function
/*-----------------------------------------------------*/
public function swap_approve($aFrom, $aTo){
	$aF = $this->prop_m->get_single_assignment($aFrom);
	$aT = $this->prop_m->get_single_assignment($aTo);

	// swap user & set status_id to 1 on both
	$arrUpdate = array(
		'emp_id' => $aT[0]->emp_id,
		'fname' => $aT[0]->fname,
		'lname' => $aT[0]->lname,
		'status_id' => 1
	);
	$doit = $this->prop_m->update_record( 'istaff.schedule', 'id', $aF[0]->id, $arrUpdate );

	$arrUpdate2 = array(
		'emp_id' => $aF[0]->emp_id,
		'fname' => $aF[0]->fname,
		'lname' => $aF[0]->lname,
		'status_id' => 1
	);
	$doit = $this->prop_m->update_record( 'istaff.schedule', 'id', $aT[0]->id, $arrUpdate2 );

	// send email to requestor
	$data['aF'] = $aF;
	$data['aT'] = $aT;
	$data['fStaff'] = $fStaff;
	$data['tStaff'] = $tStaff;
	$globals = $this->prop_m->get_prop_globals($aF[0]->propNumber);
	$data['istaffURL'] = $this->prop_m->get_istaff_url($aF[0]->propNumber);

	// print_r($data); die();

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	if($aF[0]->propNumber == 300):
		$to = 'jgravois@edrtrust.com';
	else:
		$to = $fStaff[0]->staffEmail;
	endif;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $globals[0]->resform_recipient . "\r\nReply-To: " . $globals[0]->resform_recipient;
	$headers .= "\r\nCc:";
	$headers .= "\r\nBcc: ";
	$subject = "Resident Staff Assignment Swap Request Approved";
	
	$message = $this->load->view( 'email_swap_request_approved', $data, TRUE);

	// echo $message; die();

	$mail_sent = @mail( $to, $subject, $message, $headers );

	// send email to accepter
	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	if($aF[0]->propNumber == 300):
		$to = 'jgravois@edrtrust.com';
	else:
		$to = $tStaff[0]->staffEmail;
	endif;

	$mail_sent = @mail( $to, $subject, $message, $headers );

	redirect('jax/index', 'refresh');
} // end swap_approve function
/*-----------------------------------------------------*/
public function swap_deny($aFrom, $aTo){
	$aF = $this->prop_m->get_single_assignment($aFrom);
	$aT = $this->prop_m->get_single_assignment($aTo);

	$sqlF = "UPDATE istaff.schedule SET status_id = 1 WHERE id = {$aFrom}";
	$doitF = $this->prop_m->xSQL($sqlF);
	
	$sqlT = "UPDATE istaff.schedule SET status_id = 1 WHERE id = {$aTo}";
	$doitT = $this->prop_m->xSQL($sqlT);

	// send email to requestor
	$fStaff = $this->prop_m->get_staff_by_id($aF[0]->emp_id);
	$tStaff = $this->prop_m->get_staff_by_id($aT[0]->emp_id);

	$data['aF'] = $aF;
	$data['aT'] = $aT;
	$data['fStaff'] = $fStaff;
	$data['tStaff'] = $tStaff;
	$data['istaffURL'] = $this->prop_m->get_istaff_url($aF[0]->propNumber);

	// print_r($data); die();

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	if($aF[0]->propNumber == 300):
		$to = 'jgravois@edrtrust.com';
	else:
		$to = $fStaff[0]->staffEmail;
	endif;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $tStaff[0]->staffEmail . "\r\nReply-To: " . $tStaff[0]->staffEmail ;
	$headers .= "\r\nCc:";
	$headers .= "\r\nBcc: ";
	$subject = "Resident Staff Assignment Swap Request Declined";
	
	$message = $this->load->view( 'email_swap_request_declined', $data, TRUE);
		
	$mail_sent = @mail( $to, $subject, $message, $headers );

	redirect('jax/index', 'refresh');
} // end swap_deny function
/*-----------------------------------------------------*/
public function swap_reject($aFrom, $aTo){
	$aF = $this->prop_m->get_single_assignment($aFrom);
	$aT = $this->prop_m->get_single_assignment($aTo);

	$sqlF = "UPDATE istaff.schedule SET status_id = 1 WHERE id = {$aFrom}";
	$doitF = $this->prop_m->xSQL($sqlF);
	
	$sqlT = "UPDATE istaff.schedule SET status_id = 1 WHERE id = {$aTo}";
	$doitT = $this->prop_m->xSQL($sqlT);

	// send email to requestor
	$fStaff = $this->prop_m->get_staff_by_id($aF[0]->emp_id);
	$tStaff = $this->prop_m->get_staff_by_id($aT[0]->emp_id);

	$data['aF'] = $aF;
	$data['aT'] = $aT;
	$data['fStaff'] = $fStaff;
	$data['tStaff'] = $tStaff;
	$data['istaffURL'] = $this->prop_m->get_istaff_url($aF[0]->propNumber);

	// print_r($data); die();

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	if($aF[0]->propNumber == 300):
		$to = 'jgravois@edrtrust.com';
	else:
		$to = $fStaff[0]->staffEmail;
	endif;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $tStaff[0]->staffEmail . "\r\nReply-To: " . $tStaff[0]->staffEmail ;
	$headers .= "\r\nCc:";
	$headers .= "\r\nBcc: ";
	$subject = "Resident Staff Assignment Swap Request Declined";
	
	$message = $this->load->view( 'email_swap_request_declined', $data, TRUE);
		
	$mail_sent = @mail( $to, $subject, $message, $headers );

	redirect('jax/index', 'refresh');
} // end swap_reject function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
} // end class

/* End of file jax.php */
/* Location: ./application/controllers/jax.php */
?>