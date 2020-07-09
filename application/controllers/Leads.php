<?php
class Leads extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Manage Leads";
		if(get_user()['user_type'] == '1'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => '','branch' => get_user()['branch']])->result_array();
		}
		else if(get_user()['user_type'] == '2'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => '','owner' => get_user()['id']])->result_array();
		}
		else if(get_user()['user_type'] == '3'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => '','owner' => get_user()['id']])->result_array();
		}
		else{
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => ''])->result_array();
		}
		$this->load->theme('leads/index',$data);
	}

	public function add_lead()
	{
		$data['_title']		= "Add Lead";	
		$this->load->theme('leads/add',$data);
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
				$emails .= $value.',';
			}
		}

		$services = '';
		foreach ($this->input->post('services') as $key => $value) {
			if($value != ''){
				$services .= $value.',';
			}
		}

		$prefered_language = '';
		foreach ($this->input->post('prefered_language') as $key => $value) {
			if($value != ''){
				$prefered_language .= $value.',';
			}
		}

		$timing = '';
		foreach ($this->input->post('from') as $key => $value) {
			if($value != '' || $this->input->post('to')[$key] != ''){
				$timing .= $value.'-'.$this->input->post('to')[$key].',';
			}
		}

		$landline = '';
		foreach ($this->input->post('landline') as $key => $value) {
			if($value != ''){
				$landline .= $value.',';
			}
		}

		$additional = [];
		foreach ($this->input->post('industry') as $key => $value) {
			if($value != '' || $this->input->post('sub_industry')[$key] != '' || $this->input->post('ind_remarks')[$key] != ''){
				$additional[] = [$value,$this->input->post('sub_industry')[$key],$this->input->post('ind_remarks')[$key]];
			}
		}		

		$data = [
			'owner'							=> $this->input->post('owner'),
			'branch'						=> $this->input->post('branch'),
			'date'							=> dd($this->input->post('date')),
			'customer'						=> $this->input->post('name'),
			'firm'							=> $this->input->post('firm'),
			'state'							=> $this->input->post('state'),
			'city'							=> $this->input->post('city'),
			'area'							=> $this->input->post('area'),
			'mobile'						=> rtrim($mobiles,','),
			'email'							=> rtrim($emails,','),
			'services'						=> rtrim($services,','),
			'importance'					=> $this->input->post('importance'),
			'remarks'						=> $this->input->post('remarks'),
			'next_followup_date'			=> dd($this->input->post('ndate')),
			'source'						=> $this->input->post('source'),
			'occupation'					=> $this->input->post('occupation'),
			'quotation'						=> $this->input->post('special_quote'),
			'helth_insurance'				=> $this->input->post('helth_insurance'),
			'life_insurance'				=> $this->input->post('life_insurance'),
			'languages'						=> rtrim($prefered_language,','),
			'timing'						=> rtrim($timing,','),
			'landline'						=> rtrim($landline,','),
			'additional'					=> json_encode($additional)
		];

		$this->db->insert('leads',$data);
		$id = $this->db->insert_id();
		$lead_id = substr($this->general_model->_get_branch($this->input->post('branch'))['name'],0,2).'_'.$id;
		$this->db->where('id',$id)->update('leads',['lead' => $lead_id]);

		$this->session->set_flashdata('msg', 'Lead Added');
	    redirect(base_url('leads'));
	}

	public function edit($id = false)
	{
		if($id){
			if($this->general_model->get_lead($id)){
				
				$data['lead']		= $this->general_model->get_lead($id);
				$data['_title']		= "Edit Lead - ".$data['lead']['lead'];	
				$this->load->theme('leads/edit',$data);

			}else{
				redirect(base_url('leads'));	
			}
		}else{
			redirect(base_url('leads'));
		}
	}

	public function update()
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
				$emails .= $value.',';
			}
		}

		$services = '';
		foreach ($this->input->post('services') as $key => $value) {
			if($value != ''){
				$services .= $value.',';
			}
		}

		$prefered_language = '';
		foreach ($this->input->post('prefered_language') as $key => $value) {
			if($value != ''){
				$prefered_language .= $value.',';
			}
		}

		$timing = '';
		foreach ($this->input->post('from') as $key => $value) {
			if($value != '' || $this->input->post('to')[$key] != ''){
				$timing .= $value.'-'.$this->input->post('to')[$key].',';
			}
		}

		$landline = '';
		foreach ($this->input->post('landline') as $key => $value) {
			if($value != ''){
				$landline .= $value.',';
			}
		}

		$additional = [];
		foreach ($this->input->post('industry') as $key => $value) {
			if($value != '' || $this->input->post('sub_industry')[$key] != '' || $this->input->post('ind_remarks')[$key] != ''){
				$additional[] = [$value,$this->input->post('sub_industry')[$key],$this->input->post('ind_remarks')[$key]];
			}
		}		

		$data = [
			'owner'							=> $this->input->post('owner'),
			'branch'						=> $this->input->post('branch'),
			'date'							=> dd($this->input->post('date')),
			'customer'						=> $this->input->post('name'),
			'firm'							=> $this->input->post('firm'),
			'state'							=> $this->input->post('state'),
			'city'							=> $this->input->post('city'),
			'area'							=> $this->input->post('area'),
			'mobile'						=> rtrim($mobiles,','),
			'email'							=> rtrim($emails,','),
			'services'						=> rtrim($services,','),
			'importance'					=> $this->input->post('importance'),
			'remarks'						=> $this->input->post('remarks'),
			'next_followup_date'			=> dd($this->input->post('ndate')),
			'source'						=> $this->input->post('source'),
			'occupation'					=> $this->input->post('occupation'),
			'quotation'						=> $this->input->post('special_quote'),
			'helth_insurance'				=> $this->input->post('helth_insurance'),
			'life_insurance'				=> $this->input->post('life_insurance'),
			'languages'						=> rtrim($prefered_language,','),
			'timing'						=> rtrim($timing,','),
			'landline'						=> rtrim($landline,','),
			'additional'					=> json_encode($additional)
		];

		$this->db->where('id',$this->input->post('id'))->update('leads',$data);

		$this->session->set_flashdata('msg', 'Lead Updated');
	    redirect(base_url('leads'));
	}

	public function transfer()
	{
		$this->db->where('id',$this->input->post('lead'))->update('leads',['owner' => $this->input->post('owner')]);
		$this->session->set_flashdata('msg', 'Lead Transfered');
	   	redirect(base_url('leads'));
	}

	public function delete($id = false)
	{
		if($id){
			if($this->general_model->get_lead($id)){
				$this->db->where('id',$id)->update('leads',['df' => 'deleted']);
				$this->session->set_flashdata('msg', 'Lead Deleted');
	    		redirect(base_url('leads'));			
			}else{
				redirect(base_url('leads'));	
			}
		}else{
			redirect(base_url('leads'));
		}
	}

	public function dump($id = false)
	{
		if($id){
			if($this->general_model->get_lead($id)){
				$this->db->where('id',$id)->update('leads',['dump' => 'yes']);
				$this->session->set_flashdata('msg', 'Lead Tranfered to Dump');
	    		redirect(base_url('leads'));			
			}else{
				redirect(base_url('leads'));	
			}
		}else{
			redirect(base_url('leads'));
		}
	}

	public function dump_leads()
	{
		$data['_title']		= "Dump Leads";
		if(get_user()['user_type'] == '1'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => 'yes','branch' => get_user()['branch']])->result_array();
		}
		else if(get_user()['user_type'] == '2'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => 'yes','owner' => get_user()['id']])->result_array();
		}
		else if(get_user()['user_type'] == '3'){
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => 'yes','owner' => get_user()['id']])->result_array();
		}
		else{
			$data['leads']		= $this->db->get_where('leads',['df' => '','dump' => 'yes'])->result_array();
		}
		$this->load->theme('leads/dump',$data);
	}

	public function normal($id = false)
	{
		if($id){
			if($this->general_model->get_lead($id)){
				$this->db->where('id',$id)->update('leads',['dump' => '']);
				$this->session->set_flashdata('msg', 'Lead Tranfered to Normal');
	    		redirect(base_url('leads/dump_leads'));			
			}else{
				redirect(base_url('leads/dump_leads'));	
			}
		}else{
			redirect(base_url('leads/dump_leads'));
		}
	}
}