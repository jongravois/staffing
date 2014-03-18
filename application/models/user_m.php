<?php

class User_m extends CI_Model{

function __construct(){
	parent::__construct();
} // end constructor
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function authenticate($u, $p){
	$q = $this->db->where('staffEmail',$u)->where('password',md5($p))->get('proppro.propertystaff');

	if ($q->num_rows() > 0){
		foreach($q->result_array() as $user) {
			$data[] = $user;
		} // end foreach
		return $data;
	} // end if
	return false;
} // end authenticate function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function change_password($prp, $email, $pwd){
	$pass = md5($pwd);
	$q = $this->db->where('propNumber', $prp)->where('staffEmail',$email)->update('proppro.propertystaff', array('password' => $pass));
	return $this->db->last_query();
} // end change_password function
/*-----------------------------------------------------*/
public function get_available_staff_dd($prp){
	$sql = "SELECT * FROM proppro.propertystaff WHERE propNumber = {$prp} AND (staffEmail = '' OR staffEmail IS NULL) ORDER BY lastName";
	$q = $this->db->query($sql);
	return $q->result();
} // end get_available_staff_dd function
/*-----------------------------------------------------*/
public function get_staff_info($id){
	$q = $this->db->where('id', $id)->get('proppro.propertystaff');
	return $q->result();
} // end get_staff_info function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
} // end class

?>