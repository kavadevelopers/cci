<?php
class Job extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}


	public function index()
	{
		$data['_title']		= "Jobs";	
		$data['jobs']		= $this->general_model->get_jobs();
		$this->load->theme('job/index',$data);
	}

	public function transfer()
	{
		$jobs = explode("-", $this->input->post('jobs'));
		foreach ($jobs as $key => $value) {
			$job = $this->db->get_where('job',['id' => $value])->row_array();

			$data = [
				'pre_owner' => $job['owner'],
				'owner' 	=> $this->input->post('owner')
			];
			$this->db->where('id',$value)->update('job',$data);
		}	

		$this->session->set_flashdata('msg', 'Jobs Transfered');
	   	redirect(base_url('job'));
	}
}