<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('id')){
			redirect(base_url('dashboard'));
		}
		else
		{
			$this->load->helper('cookie');
			$this->load->view('login');
		}	
	}
}
