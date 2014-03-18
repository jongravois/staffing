<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends MY_Controller {

	public $prp = '';
	public $boilerplate = array();

function __construct(){
	parent::__construct();
	session_start();

	if( !isset($_SESSION['propNumber']) ):
		redirect('user/log_in', 'refresh');
	else:
		$prp = $_SESSION['propNumber'];
		$this->prp = $prp;
		$this->id = $_SESSION['id'];
		$this->boilerplate['prp'] = $prp;
		$this->boilerplate['id'] = $_SESSION['id'];
		$this->boilerplate['username'] = $_SESSION['username'];
		$this->boilerplate['user'] = $this->user_m->get_staff_info($_SESSION['id']);
		$this->boilerplate['email'] = $_SESSION['email'];
		$this->boilerplate['accessLevel'] = $_SESSION['accessLevel'];
		$this->boilerplate['globals'] = $this->prop_m->get_prop_globals($prp);
	endif;
} // end constructor
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function index(){
	$this->boilerplate['announcement'] = $this->prop_m->get_staff_announcement($this->prp);

	$this->load->view('user_home', $this->boilerplate);
} // end index function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function forms(){
	$this->boilerplate['forms'] = $this->prop_m->get_res_staff_forms($this->prp);

	$this->load->view('forms', $this->boilerplate);
} // end forms function
/*-----------------------------------------------------*/
public function form_success(){
	$this->load->view('form_success', $this->boilerplate);
} // end form_success function
/*-----------------------------------------------------*/
public function links(){
	$this->boilerplate['links'] = $this->prop_m->get_staff_links($this->prp);
	$this->boilerplate['prodocs'] = $this->prop_m->get_pro_docs($this->prp);
	$this->boilerplate['resdocs'] = $this->prop_m->get_res_docs($this->prp);

	$this->load->view('links', $this->boilerplate);
} // end links function
/*-----------------------------------------------------*/
public function myschedule($res = null){
	if( !$res ){
		$this->boilerplate['stats'] = "form";
	} else {
		$this->boilerplate['stats'] = $res;
	} //end if

	$this->boilerplate['dates'] = $this->prop_m->get_staffer_work_dates($this->id);

	$this->load->view('myschedule', $this->boilerplate);
} // end myschedule function
/*-----------------------------------------------------*/
public function news(){
	$this->load->view('news', $this->boilerplate);
} // end news function
/*-----------------------------------------------------*/
public function profile(){
	$this->load->view('profile', $this->boilerplate);
} // end profile function
/*-----------------------------------------------------*/
public function proforms(){
	$this->boilerplate['forms'] = $this->prop_m->get_pro_staff_forms($this->prp);

	$this->load->view('proforms', $this->boilerplate);
} // end proforms function
/*-----------------------------------------------------*/
public function schedule($week = null){
	if( !$week ){ $week = date('W'); }
	
	$this->boilerplate['week'] = $week;
	
	$this->load->view('schedule', $this->boilerplate);
} // end schedule function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function pro_amex(){
	$this->boilerplate['form'] = $this->prop_m->get_form('5',$this->prp);

	$this->load->view('pro_amex', $this->boilerplate);
} // end pro_amex function
/*-----------------------------------------------------*/
public function pro_amex_handler(){
	//print_r($_POST); die();

	$frmData['sName']       = $this->input->post('raFName') . ' ' . $this->input->post('raLName');
	$frmData['email']         = $this->input->post('email');
	$frmData['date_needed'] = $this->input->post('date_needed');
	$frmData['location']    = $this->input->post('location');
	$frmData['purpose']     = $this->input->post('purpose');
	$frmData['expense']     = $this->input->post('expense');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->proform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "AmEx Credit Card Request";
	
	$message = $this->load->view( 'email_prop_pro_amex', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end pro_amex_handler function
/*-----------------------------------------------------*/
public function pro_po(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('6',$this->prp);

	$this->load->view('pro_po', $this->boilerplate);
} // end pro_po function
/*-----------------------------------------------------*/
public function pro_po_handler(){
	// print_r($_POST); die();
	$loc = $this->input->post('location');

	$frmData['fname']       = $this->input->post('raFName');  
	$frmData['lname']       = $this->input->post('raLName');
	$frmData['email']       = $this->input->post('email');
	$frmData['location']    = $this->prop_m->get_location_name($loc);
	$frmData['vendor']      = $this->input->post('vendor');
	$frmData['i1desc']      = $this->input->post('i1-desc');
	$frmData['i1quantity']  = $this->input->post('i1-quantity');
	$frmData['i1unitprice'] = $this->input->post('i1-unit-price');
	$frmData['i1total']     = (float)$frmData['i1unitprice'] * (float) $frmData['i1quantity'];
	$frmData['i2desc']      = $this->input->post('i2-desc');
	$frmData['i2quantity']  = $this->input->post('i2-quantity');
	$frmData['i2unitprice'] = $this->input->post('i2-unit-price');
	$frmData['i2total']     = (float)$frmData['i2unitprice'] * (float) $frmData['i2quantity'];
	$frmData['i3desc']      = $this->input->post('i3-desc');
	$frmData['i3quantity']  = $this->input->post('i3-quantity');
	$frmData['i3unitprice'] = $this->input->post('i3-unit-price');
	$frmData['i3total']     = (float)$frmData['i3unitprice'] * (float) $frmData['i3quantity'];
	$frmData['i4desc']      = $this->input->post('i4-desc');
	$frmData['i4quantity']  = $this->input->post('i4-quantity');
	$frmData['i4unitprice'] = $this->input->post('i4-unit-price');
	$frmData['i4total']     = (float)$frmData['i4unitprice'] * (float) $frmData['i4quantity'];
	$frmData['i5desc']      = $this->input->post('i5-desc');
	$frmData['i5quantity']  = $this->input->post('i5-quantity');
	$frmData['i5unitprice'] = $this->input->post('i5-unit-price');
	$frmData['i5total']     = (float)$frmData['i5unitprice'] * (float) $frmData['i5quantity'];
	$frmData['i6desc']      = $this->input->post('i6-desc');
	$frmData['i6quantity']  = $this->input->post('i6-quantity');
	$frmData['i6unitprice'] = $this->input->post('i6-unit-price');
	$frmData['i6total']     = (float)$frmData['i6unitprice'] * (float) $frmData['i6quantity'];
	$frmData['i7desc']      = $this->input->post('i7-desc');
	$frmData['i7quantity']  = $this->input->post('i7-quantity');
	$frmData['i7unitprice'] = $this->input->post('i7-unit-price');
	$frmData['i7total']     = (float)$frmData['i7unitprice'] * (float) $frmData['i7quantity'];
	$frmData['i8desc']      = $this->input->post('i8-desc');
	$frmData['i8quantity']  = $this->input->post('i8-quantity');
	$frmData['i8unitprice'] = $this->input->post('i8-unit-price');
	$frmData['i8total']     = (float)$frmData['i8unitprice'] * (float) $frmData['i8quantity'];
	$frmData['numberItems'] = $this->input->post('numberItems');
	$frmData['totalPrice']  = $frmData['i1total'] + $frmData['i2total'] + $frmData['i3total'] + $frmData['i4total'] + $frmData['i5total'] + $frmData['i6total'] + $frmData['i7total'] + $frmData['i8total'];

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->proform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Purchase Order Request";
	
	$message = $this->load->view( 'email_prop_pro_po', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end pro_po_handler function
/*-----------------------------------------------------*/
public function pro_tor(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('7',$this->prp);

	$this->load->view('pro_tor', $this->boilerplate);
} // end pro_tor function
/*-----------------------------------------------------*/
public function pro_tor_handler(){
	// print_r($_POST); die();
	$loc = $this->input->post('location');
	$otsd = $this->input->post('off_time_start_date');
	$otst = $this->input->post('off_time_start_time');
	$offStart = $otsd . ' ' . $otst;
	$oted = $this->input->post('off_time_end_date');
	$otet = $this->input->post('off_time_end_time');
	$offEnd = $oted . ' ' . $otet;

	$frmData['fName']          = $this->input->post('raFName');
	$frmData['lName']          = $this->input->post('raLName');
	$frmData['email']          = $this->input->post('email');
	$frmData['off_time_start'] = date('Y-m-d H:i:s', strtotime($offStart));
	$frmData['off_time_end']   = date('Y-m-d H:i:s', strtotime($offEnd));
	$frmData['location']       = $this->prop_m->get_location_name($loc);
	$frmData['reason']         = $this->input->post('reason');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->proform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Leave Request";
	
	$message = $this->load->view( 'email_prop_pro_tor', $frmData, TRUE);

	// echo "To: " . $to; echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end pro_tor_handler function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function res_al(){
	$this->boilerplate['form'] = $this->prop_m->get_form('14',$this->prp);

	$this->load->view('res_al', $this->boilerplate);
} // end res_al function
/*-----------------------------------------------------*/
public function res_al_handler(){
	// print_r($_POST['contact']); die();
	$frmData['raFName']          = $this->input->post('raFName');
	$frmData['raLName']          = $this->input->post('raLName');
	$frmData['email']            = $this->input->post('email'); 
	$frmData['common_areas']     = $this->input->post('common_areas');
	$frmData['signage']          = $this->input->post('signage');
	$frmData['lights']           = $this->input->post('lights');
	$frmData['fire_equipment']   = $this->input->post('fire_equipment');
	$frmData['damage']           = $this->input->post('damage');
	$frmData['lease_violations'] = $this->input->post('lease_violations');
	$frmData['landscaping']      = $this->input->post('landscaping');
	$frmData['feedback']         = $this->input->post('feedback');
	$frmData['contacts']         = $this->input->post('contact');
	$frmData['bcards']           = $this->input->post('bcards');
	$frmData['ghill']            = $this->input->post('ghill');
	$frmData['cdev']             = $this->input->post('cdev');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	// $to="jgravois@edrtrust.com";
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Activity Log Submission";
	
	$message = $this->load->view( 'email_prop_res_al', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_al_handler function
/*-----------------------------------------------------*/
public function res_lr(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('2',$this->prp);

	$this->load->view('res_lreq', $this->boilerplate);
} // end res_lr function
/*-----------------------------------------------------*/
public function res_lr_handler(){
	//print_r($_POST); die();
	$loc = $this->input->post('location');

	$frmData['raFName']            = $this->input->post('raFName');
	$frmData['raLName']            = $this->input->post('raLName');
	$frmData['email']              = $this->input->post('email');
	$frmData['leave_time_start']   = $this->input->post('leave_time_start');
	$frmData['leave_time_end']     = $this->input->post('leave_time_end');
	$frmData['location']           = $this->prop_m->get_location_name($loc);
	$frmData['cphone']             = $this->input->post('cphone');

	//print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	// $to="jgravois@edrtrust.com";
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Leave Request Form Submission";
	
	$message = $this->load->view( 'email_prop_res_lr', $frmData, TRUE);

	//echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_lr_handler function
/*-----------------------------------------------------*/
public function res_pbb(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('3',$this->prp);

	$this->load->view('res_pbb', $this->boilerplate);
} // end res_pbb function
/*-----------------------------------------------------*/
public function res_pbb_handler(){
	// print_r($_POST); die();
	$frmData['raName']        = $this->input->post('raFName') . ' ' . $this->input->post('raLName');
	$frmData['email']         = $this->input->post('email');
	$frmData['display_month'] = $this->input->post('display_month');
	$frmData['prog_location'] = $this->input->post('locationPBB');
	$frmData['description']   = $this->input->post('description');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Weekly Report";
	
	$message = $this->load->view( 'email_prop_res_pbb', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_pbb_handler function
/*-----------------------------------------------------*/
public function res_pds(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('1',$this->prp);

	$this->load->view('res_pds', $this->boilerplate);
} // end res_pds function
/*-----------------------------------------------------*/
public function res_pds_handler(){
	//print_r($_POST); die();
	$loc = $this->input->post('location');

	$frmData['raFName']            = $this->input->post('raFName');
	$frmData['raLName']            = $this->input->post('raLName');
	$frmData['email']              = $this->input->post('email');
	$frmData['location']           = $this->prop_m->get_location_name($loc);
	$frmData['shift_date']         = date('Y-m-d', strtotime($this->input->post('shift_date')));
	$frmData['shift_time_start']   = date('H:i:s', strtotime($this->input->post('shift_time_start')));
	$frmData['shift_duration']     = $this->input->post('shift_duration');
	
	// print_r($this->boilerplate);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	// $to="jgravois@edrtrust.com";
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Paid Shift Form Submission";
	
	$message = $this->load->view( 'email_prop_pds', $frmData, TRUE);
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_pds_handler function
/*-----------------------------------------------------*/
public function res_pe(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('15',$this->prp);

	$this->load->view('res_pe', $this->boilerplate);
} // end res_pe function
/*-----------------------------------------------------*/
public function res_pe_handler(){
	//print_r($_POST); die();	
	$frmData['raFName']          = $this->input->post('raFName');
	$frmData['raLName']          = $this->input->post('raLName');
	$frmData['email']            = $this->input->post('email');
	$frmData['program_title']    = $this->input->post('program_title');
	$frmData['program_date']     = $this->input->post('program_date');
	$frmData['program_time']     = $this->input->post('program_time');
	$frmData['program_location'] = $this->input->post('program_location');
	$frmData['had_presenter']    = $this->input->post('had_presenter');
	$frmData['presenter']        = $this->input->post('presenter');
	$frmData['program_type']     = $this->input->post('program_type');
	$frmData['audience']         = $this->input->post('audience');
	$frmData['number_audience']  = $this->input->post('number_audience');
	$frmData['marketing']        = $this->input->post('marketing');
	$frmData['description']      = $this->input->post('description');
	$frmData['evaluation']       = $this->input->post('evaluation');
	$frmData['program_datetime'] = date('F d, Y', strtotime($frmData['program_date'])) . ' ' . date('g:i A', strtotime($frmData['program_time']));

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Weekly Report";
	
	$message = $this->load->view( 'email_prop_res_pe', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_pe_handler function
/*-----------------------------------------------------*/
public function res_rpr(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('3',$this->prp);

	$this->load->view('res_rpr', $this->boilerplate);
} // end res_rpr function
/*-----------------------------------------------------*/
public function res_rpr_handler(){
	// print_r($_POST); die();
	$frmData['raName']        = $this->input->post('raFName') . ' ' . $this->input->post('raLName');
	$frmData['email']         = $this->input->post('email');
	$frmData['program_name']  = $this->input->post('program_name');
	$frmData['program_type']  = $this->input->post('program_type');
	$frmData['outcome']       = $this->input->post('outcome');
	$frmData['display_month'] = $this->input->post('display_month');
	$frmData['prog_location'] = $this->input->post('locationPBB');
	$frmData['description']   = $this->input->post('description');
	$frmData['cost']          = $this->input->post('cost');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->resform_recipient; 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Weekly Report";
	
	$message = $this->load->view( 'email_prop_res_rpr', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_rpr_handler function
/*-----------------------------------------------------*/
public function res_wr(){
	$this->boilerplate['locations'] = $this->prop_m->get_prop_locations($this->prp);
	$this->boilerplate['form'] = $this->prop_m->get_form('4',$this->prp);
	$this->boilerplate['weekNumDD'] = $this->prop_m->get_week_number_dd();

	$this->load->view('res_wr', $this->boilerplate);
} // end res_wr function
/*-----------------------------------------------------*/
public function res_wr_handler(){
	//print_r($_POST); die();
	$loc = $this->input->post('location');
	$wkNum = $this->input->post('week_num');
	$week_num = substr($wkNum, 0, 8); //2014-W10-1
	$wkSun = substr( $wkNum, 0, 8 ) . '-7';
	
	// $week_yr = substr($this->input->post('week_num'),0,4);
	$week_mon = date('F j, Y', strtotime($wkNum) );
	$week_sun = date('F j, Y', strtotime( $wkSun) );

	$frmData['raName']            = $this->input->post('raFName') . ' ' . $this->input->post('raLName');
	$frmData['email']             = $this->input->post('email');
	$frmData['week_num']          = $week_num;
	$frmData['week_mon']          = $week_mon;
	$frmData['week_sun']          = $week_sun;
	$frmData['location']          = $this->prop_m->get_location_name($loc);
	$frmData['concerns']          = $this->input->post('concerns');
	$frmData['appointment']       = $this->input->post('appointment');
	$frmData['distribution']      = $this->input->post('distribution');
	$frmData['maintenance']       = $this->input->post('maintenance');
	$frmData['morale']            = $this->input->post('morale');
	$frmData['community']         = $this->input->post('community');
	$frmData['resident_concerns'] = $this->input->post('resident_concerns');
	$frmData['additional']        = $this->input->post('additional');

	// print_r($frmData);die();

	// SAVE TO DATABASE

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	$to = $this->boilerplate['globals'][0]->resform_recipient;
	//$to = 'jgravois@edrtrust.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $frmData['email'] . "\r\nReply-To: " . $frmData['email'] ;
	$headers .= "\r\nCc:" . $frmData['email'];
	$headers .= "\r\nBcc: ";
	$subject = "Weekly Report";
	
	$message = $this->load->view( 'email_prop_wr', $frmData, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/form_success', 'refresh');
} // end res_wr_handler function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function test(){
	// $post = '2013-W48';
	// $week_num = substr($post,-2);
	// $week_yr = substr($post,0,4);
	// $week_mon = monday_of_week_by_week($week_num, $week_yr);
	// $week_sun = sunday_of_week_by_week($week_num, $week_yr);

	// echo $week_mon . ' -- ' . $week_sun;
	$tst = $this->prop_m->get_week_number_dd();
	var_dump($tst);
} // end test function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function ajax_swap_date(){
	$aid = $this->input->post('a2swap');
	$uid = $this->input->post('id');
	$dt = $this->input->post('date');

	$this->boilerplate['a2swap'] = $aid;
	$this->boilerplate['date'] = $dt;
	$this->boilerplate['uid'] = $uid;

	$retHTML = $this->load->view('components/date_schedule', $this->boilerplate, true);

	echo $retHTML;
} // end ajax_swap_date function
/*-----------------------------------------------------*/
public function ajax_swap_name(){
	$aid = $this->input->post('a2swap');
	$uid = $this->input->post('id');
	$dt = $this->input->post('date');

	$this->boilerplate['a2swap'] = $aid;
	$this->boilerplate['dates'] = $this->prop_m->get_staffer_work_dates($uid);
	$this->boilerplate['uid'] = $uid;

	$retHTML = $this->load->view('components/my_schedule', $this->boilerplate, true);

	echo $retHTML;
} // end ajax_swap_name function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function edit_profile(){
	//print_r($_POST); die();
	$id                 = $this->input->post('id');
	$frmData[firstName] = $this->input->post('firstName');
	$frmData[lastName]  = $this->input->post('lastName');
	$frmData[email]     = $this->input->post('email');

	$doit = $this->prop_m->update_record( 'proppro.propertystaff', 'id', $id, $frmData );

	redirect('staff/profile', 'redirect');
} // end edit_profile function
/*-----------------------------------------------------*/
public function request_swap($aid){
	$this->boilerplate['a2swap'] = $aid;
	$this->boilerplate['ddStaff'] = $this->prop_m->get_all_staff_dd($this->prp, $this->id);
	$this->boilerplate['ddDates'] = $this->prop_m->get_all_work_dates_dd($this->prp, $this->id);

	$this->load->view('swap_assignment', $this->boilerplate);
} // end request_swap function
/*-----------------------------------------------------*/
public function request_swap_two($aFrom, $aTo){
	$aF = $this->prop_m->get_single_assignment($aFrom);
	$aT = $this->prop_m->get_single_assignment($aTo);

	$sqlF = "UPDATE istaff.schedule SET status_id = 4 WHERE id = {$aFrom}";
	$doitF = $this->prop_m->xSQL($sqlF);
	
	$sqlT = "UPDATE istaff.schedule SET status_id = 4 WHERE id = {$aTo}";
	$doitT = $this->prop_m->xSQL($sqlT);

	// send email to assignment staffer
	$fStaff = $this->prop_m->get_staff_by_id($aF[0]->emp_id);
	$tStaff = $this->prop_m->get_staff_by_id($aT[0]->emp_id);

	$data['aF'] = $aF;
	$data['aT'] = $aT;
	$data['fStaff'] = $fStaff;
	$data['tStaff'] = $tStaff;
	$data['istaffURL'] = $this->prop_m->get_istaff_url($this->prp);

	// print_r($data); die();

	/********************* SEND DATA EMAIL *************************/
	//mail setup, recipients, subject, etc
	if($aF[0]->propNumber == 300):
		$to = 'jgravois@edrtrust.com';
	else:
		$to = $tStaff[0]->staffEmail;
	endif;

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $fStaff[0]->staffEmail . "\r\nReply-To: " . $fStaff[0]->staffEmail ;
	$headers .= "\r\nCc:";
	$headers .= "\r\nBcc: ";
	$subject = "Resident Staff Assignment Swap Request";
	
	$message = $this->load->view( 'email_swap_request', $data, TRUE);

	// echo $message; die();
		
	$mail_sent = @mail( $to, $subject, $message, $headers );
		
	redirect('staff/myschedule/success', 'refresh');
} // end request_swap_two function
/*-----------------------------------------------------*/
public function swap_ast_one_handler(){
	print_r($_POST); die();
} // end swap_ass_one_handler function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
} // end class

/* End of file staff.php */
/* Location: ./application/controllers/staff.php */