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
        return "WORK COMPLETED";
    }else if($s == "4"){
        return "PANDING FOR BILLING";
    }else{
        return "PAYMENT RECEIVED";
    }
}

function getjobStatusList(){
    return [
        '0' => "WORK PENDING",
        '1' => "DOCUMENTS RECEIVED",
        '2' => "WORK IN PROGRESS",
        '3' => "WORK COMPLETED",
        '4' => "PANDING FOR BILLING",
        '5' => "PAYMENT RECEIVED"
    ];
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