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

		$lead = $this->general_model->_get_lead($this->input->post('lead'));
		$source = $this->general_model->_get_source($lead['source']);

		$data = [
			'lead'		=> $this->input->post('lead'),
			'company'		=> $source['company'],
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
			'created_at'		=> date('Y-m-d H:i:s'),
			'owner'				=> $this->input->post('owner')
		];

		$this->db->insert('client',$data);
		$customer_id = $this->db->insert_id();

		$this->db->where('id',$customer_id)->update('client',['c_id' => "CLIENT_".$customer_id,'group' => 'GROUP_'.$customer_id]);


		foreach ($this->input->post('services') as $key => $value) {
			if($value != ''){
				$service = explode('-',$value)[0];
				$price = $this->input->post('amount')[$key];
				if($this->input->post('qty')[$key] != ""){
					$qty = $this->input->post('qty')[$key];
				}else{
					$qty = 1;
				}
				
				$this->db->order_by('rand()');
			    $this->db->limit(1);
			    $this->db->where('user_type','2');
			    $this->db->where('df','');
			    $user = $this->db->get('user')->row_array();
				$data = [
					'branch'		=> $this->input->post('branch'),
					'service'		=> $service,
					'price'			=> $price,
					'qty'			=> $qty,
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


	public function view($id = false)
	{
		if($id){
			if($this->general_model->_get_client($id)){
				$data['_title']		= "View Client";	
				$data['client']		= $this->general_model->_get_client($id);
				$this->load->theme('client/view',$data);
			}else{
				redirect(base_url('client'));			
			}
		}else{
			redirect(base_url('client'));
		}
	}

	public function cancel($id = false)
	{
		if($id){
			if($this->general_model->_get_client($id)){
				$this->db->where('id',$id);
				$this->db->update('client',['status' => 9]);
				$this->session->set_flashdata('msg', 'Client Cancel Success');
	    		redirect(base_url('client'));
			}else{
				redirect(base_url('client'));			
			}
		}else{
			redirect(base_url('client'));
		}
	}

	public function in_activate($id = FALSE)
	{
		if($id){
			if($this->general_model->_get_client($id)){
				$this->db->where('id',$id);
				$this->db->update('client',['status' => 8]);
				$this->session->set_flashdata('msg', 'Client In Activated');
	    		redirect(base_url('client'));
			}else{
				redirect(base_url('client'));			
			}
		}else{
			redirect(base_url('client'));
		}
	}

	public function active($id,$type)
	{
		$this->db->where('id',$id);
		$this->db->update('client',['status' => 0]);
		$this->session->set_flashdata('msg', 'Client Activated');
		if($type == '1'){
			redirect(base_url('client/canceled'));
		}else if($type == '2'){
			redirect(base_url('client/in_active'));
		}
	}

	public function canceled()
	{
		$data['_title']		= "Cancled Clients";	
		$data['client']		= $this->general_model->get_cancel_clients();
		$this->load->theme('client/cancel',$data);
	}

	public function in_active()
	{
		$data['_title']		= "In-Active Clients";	
		$data['client']		= $this->general_model->get_inactive_clients();
		$this->load->theme('client/in_active',$data);
	}

	public function add_group()
	{
		$data = [
			'main'		=> $this->input->post('main'),
			'child'		=> $this->input->post('child'),
			'relation'		=> strtoupper($this->input->post('relation')),
			'remarks'		=> $this->input->post('remarks')
		];
		$this->db->insert('grouping',$data);
		$main = $this->general_model->_get_client($this->input->post('main'));
		$child = $this->general_model->_get_client($this->input->post('child'));
		echo json_encode(['group' => $main['group'],'name' => $child['fname'].' '.$child['mname'].' '.$child['lname'],'relation' => strtoupper($this->input->post('relation')),'remarks' => nl2br($this->input->post('remarks')),'client' => $child['c_id']]);
	}
}