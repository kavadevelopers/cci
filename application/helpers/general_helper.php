<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function pre_print($array)
{   
    echo count($array);
    echo "<pre>";
    print_r($array);
    exit;
}


function _vdatetime($datetime)
{
	return date('d-m-Y h:i A',strtotime($datetime));
}

function vd($date)
{
    return date('d-m-Y',strtotime($date));
}

function dd($date)
{
    return date('Y-m-d',strtotime($date));
}


function dt($time){
    return date('H:i:s',strtotime($time));   
}

function vt($time){
    return date('h:i A',strtotime($time));   
}

function rs()
{
    return "₹ ";
}  

function timeConverter($str){
    $arr = explode(":", $str);
    $new = "";
    foreach ($arr as $key => $value) {
        if($key != 0){
            $c = ":";
        }else{
            $c = "";
        }
        $value = trim($value,"_");
        if($value != ""){
            if(strlen($value) == 2){
                $new .= $c.$value;
            }else{
                $new .= $c."0".$value;
            }
        }else{
            $new .= $c."00";
        }
    }
    return dt($new);
}

function get_from_to($from,$to){
    $ret = "";
    if(!empty($from)){
        $ret .= "<br><small>".vt($from);
    }else{
        $ret .= "<br><small> NA ";
    }

    if(!empty($to)){
        $ret .= " - ".vt($to)."</small>";
    }else{
        $ret .= " - NA";
    }

    return $ret;
}

function get_setting()
{
	$ci=& get_instance();
    $ci->load->database();
    return $ci->db->get_where('setting',['id' => '1'])->row_array();
}

function get_user(){
	$ci=& get_instance();
    $ci->load->database();
    return $ci->db->get_where('user',['id' => $ci->session->userdata('id')])->row_array();	
}

function user_type(){
    if(get_user()['user_type'] == '2'){
        if(get_user()['type'] == '1'){
            return "Manager";
        }else if(get_user()['type'] == '2'){
            return "Senior";
        }else{
            return "Junior";
        }
    }else if(get_user()['user_type'] == '3'){
        if(get_user()['type'] == '1'){
            return "Field Sales";
        }else if(get_user()['type'] == '2'){
            return "Tele Sales";
        }else if(get_user()['type'] == '3'){
            return "Freelance Sales";
        }else{
            return "Admin Tele Sales";
        }
    }   
}

function _user_type($id){
    $ci=& get_instance();
    $ci->load->database();
    $user = $ci->db->get_where('user',['id' => $id])->row_array();  

    if($user['user_type'] == '2'){
        if($user['type'] == '1'){
            return "Manager";
        }else if($user['type'] == '2'){
            return "Senior";
        }else{
            return "Junior";
        }
    }else if($user['user_type'] == '3'){
        if($user['type'] == '1'){
            return "Field Sales";
        }else if($user['type'] == '2'){
            return "Tele Sales";
        }else if($user['type'] == '3'){
            return "Freelance Sales";
        }else{
            return "Admin Tele Sales";
        }
    }   
}

function menu($seg,$array)
{
    $CI =& get_instance();
    $path = $CI->uri->segment($seg);
    foreach($array as $a)
    {
        if($path === $a)
        {
          return array("active","active","pcoded-trigger");
          break;  
        }
    }
}

function getRole($type){
    if($type == 0){
        return "Super Admin";
    }else if($type == 1){
        return "Admin";
    }else if($type == 2){
        return "Back Office";
    }else if($type == 3){
        return "Sales Person";
    }
}

function getjobStatus($s){
    if($s == "0"){
        return "WORK PENDING";
    }else if($s == "1"){
        return "DOCUMENTS RECEIVED";
    }else if($s == "2"){
        return "WORK IN PROGRESS";
    }else if($s == "3"){
        return "WORK DONE & PANDING FOR BILLING";
    }else if($s == "4"){
        return "BILLED";
    }else{
        return "PAID";
    }
}

function getjobStatusList(){
    return [
        '0' => "WORK PENDING",
        '1' => "DOCUMENTS RECEIVED",
        '2' => "WORK IN PROGRESS",
        '3' => "WORK DONE & PANDING FOR BILLING",
        '4' => "BILLED",
        '5' => "PAID"
    ];
}

function invoice()
{
    return "1";
}

function payment()
{
    return "2";
}

function selected($val,$val2,$val3 = false){
    $ret = "";
    if($val == $val2){
        $ret = "selected";
    }

    if($val3 && $ret == ''){
        if($val == $val3){
            $ret = "selected";       
        }
    }
    return $ret;
}   
?>