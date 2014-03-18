<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function call_mod_func($model_name, $function_name, $parameters=null){
      $ci = &get_instance();
      $ci->load->model($model_name);
      return $ci->$model_name->$function_name($parameters);
} // end function
/**************************************************/
function checkRemote($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	// don't download content
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if( curl_exec($ch) !== FALSE){
		return true;
	} else {
		return false;
	}// end if
} // end checkRemote function
/**************************************************/
function cleanHTML($str) {
	$pattern = "/<(\w+)>(\s|&nbsp;)*<\/\1>/";
    $str = preg_replace($pattern, '', $str);
    return mb_convert_encoding($str, 'HTML-ENTITIES', 'UTF-8');
} // end cleanHTML function
/**************************************************/
function convert_smart_quotes($string) { 
    $search = array(chr(145), 
                    chr(146), 
                    chr(147), 
                    chr(148), 
                    chr(151)); 
 
    $replace = array("'", 
                     "'", 
                     '"', 
                     '"', 
                     '-'); 
 
    return str_replace($search, $replace, $string); 
} // end function
/***************************************************/
function curl($url){
      if ( empty($url) ) return false;

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $data = curl_exec($ch);
      curl_close($ch);

      $data = json_decode($data);

      return $data; // string or null
} // end curl function
/**************************************************/
function formatPhone($phone) {
	$phone = preg_replace("/[^0-9]/", "", $phone);
		if(strlen($phone) == 7)
			return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
		elseif(strlen($phone) == 10)
			return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
		else
			return $phone;
} // end function formatPhone
/**************************************************/
function getTweet($val) {} // end function
/**************************************************/
function in_array_like($needle,$haystack){
      foreach($haystack as $ref){
        if (strstr($needle,$ref)){         
          return true;
        } //end if
      } // end foreach
      return false;
} // end function
/**************************************************/
function month_to_text($mo){
	switch( (int) $mo ){
		case 1: return "January"; break;
		case 2: return "February"; break;
		case 3: return "March"; break;
		case 4: return "April"; break;
		case 5: return "May"; break;
		case 6: return "June"; break;
		case 7: return "July"; break;
		case 8: return "August"; break;
		case 9: return "September"; break;
		case 10: return "October"; break;
		case 11: return "November"; break;
		case 12: return "December"; break;
	} // end switch
} // end month_to_text function
/***************************************************/
function prettyPrint($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
} // end prettyPrint function
/**************************************************/
function putCSS($val, $media){
	$path = base_url("assets/css/" . $val);
	return '<link rel="stylesheet" type="text/css" href="' . $path . '" media="' . $media . '" />';
} // end function
/***************************************************/
function putCSSother($val, $media){
	$path = base_url("assets/" . $val);
	return '<link rel="stylesheet" type="text/css" href="' . $path . '" media="' . $media . '" />';
} // end function
/***************************************************/
function putJS($val){
	$path = base_url("assets/js/" . $val);
	return '<script src="' . $path . '"></script>';	
} // end function
/***************************************************/
function putJSother($val){
	$path = base_url("assets/" . $val);
	return '<script src="' . $path . '"></script>';	
} // end function
/***************************************************/
function sanitizeHTMLInput( $html ){
	$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript 
	                 "'<[/!]*?[^<>]*?>'si",          // Strip out HTML tags 
	                 "'([rn])[s]+'",                // Strip out white space 
	                 "'&(quot|#34);'i",                // Replace HTML entities 
	                 "'&(amp|#38);'i", 
	                 "'&(lt|#60);'i", 
	                 "'&(gt|#62);'i", 
	                 "'&(nbsp|#160);'i", 
	                 "'&(iexcl|#161);'i", 
	                 "'&(cent|#162);'i", 
	                 "'&(pound|#163);'i", 
	                 "'&(copy|#169);'i", 
	                 "'&#(d+);'e"
	); 

	$replace = array ("", 
	                 "", 
	                 "\1", 
	                 "\"", 
	                 "&", 
	                 "<", 
	                 ">", 
	                 " ", 
	                 chr(161), 
	                 chr(162), 
	                 chr(163), 
	                 chr(169), 
	                 "chr(\1)"
	); 
	return preg_replace($search, $replace, $html);
} // end function
/***************************************************/
function stripTiny( $str ){
	$cnt = strlen($str);
	if (  substr($str,0,3) == "<p>" ) {
		$clnStr = substr($str,3,$cnt-7);
	} else {
		$str = $clnStr;
	} // end if
	return $clnStr;
} // end function
/**************************************************/
function subtractMonth($timestamp) {
	$thePHPDate = getdate($timeStamp);
	$thePHPDate['mday'] = $thePHPDate['mday']-30;
	$timeStamp = mktime($thePHPDate['hours'], $thePHPDate['minutes'], $thePHPDate['seconds'], $thePHPDate['mon'], $thePHPDate['mday'], $thePHPDate['year']);
	return $timeStamp;	
} // end function
/**************************************************/
function hourmin($hid = "hour", $mid = "minute", $pid = "pm", $hval = "", $mval = "", $pval = "")
{
	if(empty($hval)) $hval = date("h");
	if(empty($mval)) $mval = date("i");
	if(empty($pval)) $pval = date("a");

	$hours = array(12, 1, 2, 3, 4, 5, 6, 7, 9, 10, 11);
	$out = "<select name='$hid' id='$hid'>";
	foreach($hours as $hour)
		if(intval($hval) == intval($hour)) $out .= "<option value='$hour' selected>$hour</option>";
		else $out .= "<option value='$hour'>$hour</option>";
	$out .= "</select>";

	$minutes = array("00", 15, 30, 45);
	$out .= "<select name='$mid' id='$mid'>";
	foreach($minutes as $minute)
		if(intval($mval) == intval($minute)) $out .= "<option value='$minute' selected>$minute</option>";
		else $out .= "<option value='$minute'>$minute</option>";
	$out .= "</select>";
	
	$out .= "<select name='$pid' id='$pid'>";
	$out .= "<option value='am'>am</option>";
	if($pval == "pm") $out .= "<option value='pm' selected>pm</option>";
	else $out .= "<option value='pm'>pm</option>";
	$out .= "</select>";
	
	return $out;
}
/***************************************************/
function monday_of_week_by_week($week, $year){
    if( (int)$week < 10){ $week = '0'.(string)$week; } else { $week = (string)$week; }
    return date('Y-m-d', strtotime($year."W".$week));
} // end monday_of_week_by_week function
/***************************************************/
function sunday_of_week_by_week($week, $year){
    if( (int)$week < 10){ $week = '0'.(string)$week; } else { $week = (string)$week; }
    $mon = monday_of_week_by_week($week, $year);
    $date = date_create($mon);
    date_add($date, date_interval_create_from_date_string('6 days'));
    $sun = $date->format('Y-m-d');

    return $sun;
} // end sunday_of_week_by_week function
/***************************************************/
