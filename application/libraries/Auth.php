<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{	

	public $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
    }

	public function check_session()
	{
        $admin = $this->CI->session->userdata('id');
        if(!$admin)
        {
        	$this->CI->session->set_flashdata('error', 'Your Session Is Expire Please Login Again.');
            redirect(base_url());
        }

    }

}