<?php
class Client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Clients";	
		$data['client']		= $this->general_model->get_clients();
		$this->load->theme('client/index',$data);
	}

	public function new_clients()
	{
		$data['_title']		= "New Clients";
		$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => '','status' => '1'])->result_array();
		$this->load->theme('client/new_client',$data);	
	}

	public function new_client_register($id)
	{
		$data['_title']		= "Register Client";
		$data['lead']		= $this->general_model->_get_lead($id);
		$this->load->theme('client/register',$data);		
	}

	public function save()
	{
		$mobiles = '';
		foreach ($this->input->post('mobile') as $key => $value) {
			if($value != ''){
				$mobiles .= $value.',';
			}
		}

		$emails = '';
		foreach ($this->input->post('email') as $key => $value) {
			if($value != ''){
				$emails .= strtoupper($value).',';
			}
		}

		$language = '';
		foreach ($this->input->post('language') as $key => $value) {
			if($value != ''){
				$language .= $value.',';
			}
		}

		$time_to_call = '';
		foreach ($this->input->post('time_to_call') as $key => $value) {
			if($value != ''){
				$time_to_call .= strtoupper($value).',';
			}
		}

		$data = [
			'lead'		=> $this->input->post('lead'),
			'branch'		=> $this->input->post('branch'),
			'fname'		=> strtoupper($this->input->post('fname')),
			'mname'		=> strtoupper($this->input->post('mname')),
			'lname'		=> strtoupper($this->input->post('lname')),
			'firm'		=> strtoupper($this->input->post('firm')),
			'mobile'	=> rtrim($mobiles,','),
			'email'		=> rtrim($emails,','),
			'pan'		=> strtoupper($this->input->post('pan')),
			'dob'		=> dd($this->input->post('pan')),
			'gender'	=> $this->input->post('gender'),
			'add1'		=> strtoupper($this->input->post('add1')),
			'add2'		=> strtoupper($this->input->post('add2')),
			'area'		=> $this->input->post('area'),
			'city'		=> $this->input->post('city'),
			'state'		=> $this->input->post('state'),
			'pin'		=> $this->input->post('pin'),
			'occupation'		=> $this->input->post('occupation'),
			'language'		=> rtrim($language,','),	
			'time_to_call'	=> rtrim($time_to_call,','),	
			'health_in'		=> $this->input->post('health_insurance'),
			'life_in'		=> $this->input->post('life_insurance'),
			'itr_client'		=> $this->input->post('itr_client'),
			'gst_client'		=> $this->input->post('gst_client'),
			'gst_type'			=> $this->input->post('gst_type'),
			'month_quater'		=> $this->input->post('month_quater'),
			'industry'			=> $this->input->post('industry'),
			'sub_industry'		=> $this->input->post('sub_industry'),
			'ind_remarks'		=> strtoupper($this->input->post('ind_remaarks')),
			'profile_intro'		=> strtoupper($this->input->post('profile_intro')),
			'turnover_notes'	=> strtoupper($this->input->post('turnover_notes')),
			'turnover_notes'	=> strtoupper($this->input->post('turnover_notes')),
			'created_by'		=> get_user()['id'],
			'created_at'		=> date('Y-m-d H:i:s')
		];

		$this->db->insert('client',$data);
		$customer_id = $this->db->insert_id();

		$this->db->where('id',$customer_id)->update('client',['c_id' => "CLIENT_".$customer_id]);


		foreach ($this->input->post('services') as $key => $value) {
			if($value != ''){
				$service = explode('-',$value)[0];
				$price = $this->input->post('amount')[$key];
				$this->db->order_by('rand()');
			    $this->db->limit(1);
			    $this->db->where('user_type','2');
			    $this->db->where('df','');
			    $user = $this->db->get('user')->row_array();
				$data = [
					'branch'		=> $this->input->post('branch'),
					'service'		=> $service,
					'price'			=> $price,
					'client'		=> $customer_id,
					'status'		=> 0,
					'owner'			=> $user['id'],
					'importance'	=> 'Medium',
					'f_date'		=> null,
					'f_time'		=> null,
					'created_by'	=> get_user()['id'],
					'created_at'		=> date('Y-m-d H:i:s')
				];
				$this->db->insert('job',$data);
				$job_id = $this->db->insert_id();
				$this->db->where('id',$job_id)->update('job',['job_id' => "JOB_".$job_id]);			
			}
		}

		$this->db->where('id',$this->input->post('lead'))->update('leads',['status' => 2]);		

		$this->session->set_flashdata('msg', 'Client Created');
	    redirect(base_url('client/new_clients'));
	}
}