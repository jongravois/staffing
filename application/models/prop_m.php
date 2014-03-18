<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prop_m extends CI_Model{

function __construct(){
	parent::__construct();
} // end constructor
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function load_from_url(){
	if (!array_key_exists('HTTP_HOST', $_SERVER)) {
        redirect('http://www.edrtrust.com','refresh');
    }

    $hostname = $_SERVER['HTTP_HOST'];

    if (strpos($hostname, ':')) {
        // strip port.
        $hostname = substr($hostname, 0, strpos($hostname, ':'));
    }

    if (substr_count($hostname, '.') < 2) {
        redirect('http://www.edrtrust.com','refresh');
    }

    $base_url = implode('.', array_slice(explode('.', $hostname), -2));

    $sql = "SELECT 
		a.propNumber
		,a.propertyName
		,a.propertyAddress 
		,a.propertyCity
		,a.propertyState 
		,a.propertyZip 
		,a.propertyPhone 
		,a.propertyEmail 
	FROM
		proppro.properties a 
	WHERE 
		a.propertyProductionURL LIKE '%{$base_url}%'
	";

	$query = $this->db->query($sql);
    if ($query->num_rows() === 0) {
        redirect('http://www.edrtrust.com','refresh');
    } else {
        return $query->row(0);
    }
} // end load_from_url function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function update_record( $table, $matchField, $matchValue, $arr ){
    $this->db->where( $matchField, $matchValue )->update( $table, $arr );
    return $this->db->last_query();
} // end update_record function
/*-----------------------------------------------------*/
public function xSQL($sql){
    $this->db->query($sql);
    return $this->db->last_query();
} // end xSQL function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function get_all_staff_dd($prp, $id){
    $sql = "SELECT id, firstName, lastName FROM proppro.propertystaff WHERE propNumber = {$prp} AND iStaff = 1 AND id != {$id} ORDER BY lastName;";
    $q = $this->db->query($sql);
    
    if( $q->num_rows() > 0) {
        $data[0] = 'Please Select';
        foreach( $q->result() as $row ){
            $data[$row->id] = $row->firstName . " " . $row->lastName;
        } //end foreach
        return $data;
    } // end if
} // end get_all_staff_dd function
/*-----------------------------------------------------*/
public function get_all_work_dates_dd($prp, $id){
    $today = date('Y-m-d');

    $sql = "SELECT DISTINCT(assignment_date) FROM istaff.`schedule` WHERE propNumber = {$prp} AND emp_id != {$id} AND status_id != 4 AND assignment_date >= '{$today}' ORDER BY assignment_date";
    $q = $this->db->query($sql);

    if( $q->num_rows() > 0) {
        $data[0] = 'Please Select';
        foreach( $q->result() as $row ){
            $data[$row->assignment_date] = date('l, F d, Y', strtotime($row->assignment_date));
        } //end foreach
        return $data;
    } // end if
} // end get_all_work_dates_dd function
/*-----------------------------------------------------*/
public function get_form($id, $prp){
    $sql = "SELECT fiu.*, f.form_name FROM istaff.forms_in_use fiu JOIN istaff.forms f ON fiu.formID = f.id WHERE fiu.formID = {$id} AND fiu.propNumber = {$prp}";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_form_for_customizing function
/*-----------------------------------------------------*/
public function get_istaff_url($prp){
    $q = $this->db->select('istaffURL')->where('propNumber',$prp)->get('proppro.properties');
    return $q->row('istaffURL');
} // end get_istaff_url function
/*-----------------------------------------------------*/
public function get_location_name($id){
    $q = $this->db->select('location')->where('id',$id)->get('istaff.locations');
    return $q->row('location');
} // end get_location_name function
/*-----------------------------------------------------*/
public function get_pro_docs($prp){
    $sql = "SELECT * FROM istaff.documents WHERE propNumber = {$prp} AND access = 'pro' ORDER BY form";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_pro_docs function
/*-----------------------------------------------------*/
public function get_prop_globals($prp){
    $q = $this->db->where('propNumber', $prp)->get('istaff.globals');
    return $q->result();
} // end get_prop_globals function
/*-----------------------------------------------------*/
public function get_prop_locations($prp){
    $q = $this->db->where('propNumber', $prp)->order_by('location')->get('istaff.locations');
    return $q->result();
} // end get_prop_locations function
/*-----------------------------------------------------*/
public function get_prop_number_from_url($prp){
    $sql = "SELECT propNumber FROM proppro.properties WHERE istaffURL LIKE '%{$prp}%'";
    $q = $this->db->query($sql);

    return $q->row('propNumber');
} // end get_prop_number_from_url function
/*-----------------------------------------------------*/
public function get_res_docs($prp){
    $sql = "SELECT * FROM istaff.documents WHERE propNumber = {$prp} AND (access = 'res' OR access = 'all') ORDER BY form";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_res_docs function
/*-----------------------------------------------------*/
public function get_pro_staff_forms($prp){
    $sql = "SELECT form_name, URL FROM istaff.forms WHERE staff_type = 'pro' AND id IN ( SELECT formID FROM istaff.forms_in_use WHERE propNumber = {$prp} ) ORDER BY form_name";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_pro_staff_forms function
/*-----------------------------------------------------*/
public function get_res_staff_forms($prp){
    $sql = "SELECT form_name, URL FROM istaff.forms WHERE staff_type = 'res' AND id IN ( SELECT formID FROM istaff.forms_in_use WHERE propNumber = {$prp} ) ORDER BY form_name";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_res_staff_forms function
/*-----------------------------------------------------*/
public function get_schedule_by_date($dt){
    $da = date('Y-m-d', strtotime($dt));

    $sql = "SELECT * FROM istaff.`schedule` WHERE status_id != 4 AND assignment_date = '{$da}' ORDER BY start";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_schedule_by_date function
/*-----------------------------------------------------*/
public function get_single_assignment($id){
    $q = $this->db->where('id',$id)->get('istaff.schedule');
    return $q->result();
} // end get_single_assignment function
/*-----------------------------------------------------*/
public function get_staff_announcement($prp){
    $q = $this->db->select('announcement')->where('propNumber', $prp)->get('istaff.globals');
    return $q->row('announcement');
} // end get_staff_announcement function
/*-----------------------------------------------------*/
public function get_staff_by_id($id){
    $q = $this->db->where('id', $id)->get('proppro.propertystaff');
    return $q->result();
} // end get_staff_by_id function
/*-----------------------------------------------------*/
public function get_staff_links($prp){
    $q = $this->db->where('propNumber', $prp)->order_by('link')->get('istaff.links');
    return $q->result();
} // end get_staff_links function
/*-----------------------------------------------------*/
public function get_staffer_work_dates($id){
    $today = date('Y-m-d');

    $sql = "SELECT DISTINCT(assignment_date) FROM istaff.`schedule` WHERE emp_id = {$id} AND assignment_date >= '{$today}'";
    $q = $this->db->query($sql);

    return $q->result();
} // end get_staffer_work_dates function
/*-----------------------------------------------------*/
public function get_user_schedule($id){
    $today = date('Y-m-d');

    $sql = "SELECT * FROM istaff.`schedule` WHERE emp_id = {$id} AND assignment_date > '{$today}' ORDER BY assignment_date, start";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_user_schedule function
/*-----------------------------------------------------*/
public function get_user_schedule_by_date($id, $dt){
    $da = date('Y-m-d', strtotime($dt));

    $sql = "SELECT * FROM istaff.`schedule` WHERE emp_id = {$id} AND assignment_date = '{$da}' ORDER BY start";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_user_schedule_by_date function
/*-----------------------------------------------------*/
public function get_user_swap_schedule_by_date($id, $dt){
    $da = date('Y-m-d', strtotime($dt));

    $sql = "SELECT * FROM istaff.`schedule` WHERE emp_id = {$id} AND status_id != 4 AND assignment_date = '{$da}' ORDER BY start";
    $q = $this->db->query($sql);
    return $q->result();
} // end get_user_swap_schedule_by_date function
/*-----------------------------------------------------*/
public function get_week_number_dd(){
    $yr = date('Y');
    $ddown[0] = 'Please Select ...';

    for($y=1; $y<54; $y++){
        $tY = ( $y < 10 ? '0' . $y : $y );

        $nMon = $yr . '-W' . $tY . '-1';
        $nSun = $yr . '-W' . $tY . '-7';

        $dtMon = date('M j, Y', strtotime($nMon) );
        $dtSun = date('M j, Y', strtotime($nSun) );

        $ddown[$nMon] = "Week " . $y . ": ( " . $dtMon . ' -- ' . $dtSun . ")";
    } // end for

    return $ddown;
} // end get_week_number_dd function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function json_get_user_schedule($id){
    
} // end json_get_user_schedule function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
public function return_end_time($dayte, $srt, $dur){
    //return $dayte; 2013-12-07
    //return $srt; $srt = 08:00:00
    //return $dur; $dur = 8.25

    list($y, $m, $d) = explode('-', $dayte);
    list($h, $mi, $s) = explode(':', $srt);
    list($ah, $am) = explode('.', $dur);

    if( (int)$am > 0 ){ 
        $addmin = ( (int)$am / 100) * 60; 
    } else { 
        $addmin = 0; 
    } // end if
    
    //return $ah;
    $mins = ( (int)$ah * 60) + $addmin;
    //return $mins;

    return date('D, M j, Y  H:i:s',mktime((int)$h, (int)$mi+(int)$mins, 0, (int)$m, (int)$d, (int)$y));
} // end return_end_time function
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
} // end class

?>