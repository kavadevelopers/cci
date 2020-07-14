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