<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public $data = array();
	public $property = array();

function __construct(){
	parent::__construct();
	session_start();
	$this->data['errors'] = array();

    $this->property = $this->prop_m->load_from_url();
    $this->data['propNum'] = $this->property->propNumber;
    $this->data['propNumber'] = $this->property->propNumber;
    $this->data['property'] = $this->property;
} // end constructor
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function index() {
	$this->data['msg'] = "PLEASE LOG IN";
	$this->data['frm'] = "A";
	$this->load->view('logger', $this->data);
} // end index function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function log_in($status = null){
	switch($status){
		case 'wrong':
			$this->data['msg'] = "INCORRECT CREDENTIALS. PLEASE TRY AGAIN!";
			$this->data['frm'] = "A";
			break;
		case 'reset':
			$this->data['msg'] = "RESETTING PASSWORD!";
			$this->data['frm'] = "B";
			break;
		default:
			$this->data['msg'] = "PLEASE LOG IN";
			$this->data['frm'] = "A";
			break;
	} // end switch
	
	$this->load->view('logger', $this->data);
} // end get_logger function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function validate_user(){
	//print_r($_POST); die();
	$propNum  = $this->input->post('propNum');
	$email    = $this->input->post('email');
	$pwd = $this->input->post('password');

	//CHECK CREDENTIALS WITH DATABASE
	if( $user = $this->user_m->authenticate($email, $pwd) ){
		//echo "<pre>";print_r($user);echo "</pre>"; die();
		if ( $pwd == "changeme" ){
			redirect('user/log_in/reset');	
		} else {
			$_SESSION['id'] = $user[0]['id'];
			$_SESSION['username'] = $user[0]['firstName'].' '.$user[0]['lastName'];
			$_SESSION['email'] = $user[0]['staffEmail'];
			$_SESSION['propNumber'] = $user[0]['propNumber'];
			$_SESSION['accessLevel'] = $user[0]['accessLevel'];
			$_SESSION['logged_in'] = TRUE;

	 		redirect('staff/index', 'refresh');
		} // end if
	} else {
	 	redirect('user/log_in/wrong');
	} // end if
} // end authenticate function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function create_new_account($id){
	$this->data['staff'] = $this->user_m->get_staff_info($id);

	$this->load->view('new_account', $this->data);
} // end create_new_account function
/*-----------------------------------------------------*/
public function create_new_account_handler(){
	$id = $this->input->post('id');
	$email = $this->input->post('email');

	// update database
	$saveit = $this->prop_m->update_record( 'proppro.propertystaff', 'id', $id, array('staffEmail'=>$email) );

	// redirect to log-in
	redirect('user/index', 'refresh');
} // end create_new_user_handler function
/*-----------------------------------------------------*/
public function create_new_user(){
	$this->data['staff'] = $this->user_m->get_available_staff_dd($this->property->propNumber);

	$this->load->view('new_user', $this->data);
} // end create_new_user function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function get_user_info($id){
	$q = $this->db->where('id', $id)->get('proppro.propertystaff');
	return $q->result();
} // end get_user_info function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function change_password(){
	$prp      = $this->input->post('propNum');
	$email    = $this->input->post('email');
	$password = $this->input->post('password');

	$changeit = $this->user_m->change_password($prp, $email, $password);

	redirect('user/log_in', 'refresh');
} // end change_password function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function log_out(){
	$_SESSION = array(); 
	
	redirect('user/log_in', 'refresh');
} // end logout function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
} // end class

/* End of file user.php */
/* Location: ./application/controllers/user.php */