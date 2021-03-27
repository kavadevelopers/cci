<?php
class Ticket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function open()
	{
		$data['_title']			= "Open Tickets";
		$data['tickets']		= $this->db->order_by('id','asc')->get_where('tickets',['df'	=> '','closed'	=> '0'])->result_array();
		$this->load->theme('ticket/index',$data);	
	}

	public function closed()
	{
		$data['_title']			= "Closed Tickets";
		$data['tickets']		= $this->db->limit(100)->order_by('id','desc')->get_where('tickets',['df'	=> ''])->result_array();
		$this->load->theme('ticket/closed',$data);	
	}

	public function add()
	{
		$data['_title']		= "Add Ticket";
		$this->load->theme('ticket/add',$data);	
	}

	public function save()
	{
		$data = [
			'client'			=> $this->input->post('client'),
			'priority'			=> $this->input->post('priority'),
			'head'				=> $this->input->post('head'),
			'query_desc'		=> $this->input->post('query'),
			'close_desc'		=> '',
			'openat'			=> date('Y-m-d H:i:s'),
			'created_by'		=> $this->session->userdata('id'),
			'closed_by'			=> ''
		];
		$this->db->insert('tickets',$data);
		$ticket = $this->db->insert_id();
		$serial_no = mt_rand(0000,9999);
		$this->db->where('id',$ticket)->update('tickets',['ticket' => $serial_no.$ticket]);
		$this->session->set_flashdata('msg', 'Ticket Created');
	    redirect(base_url('ticket/open'));
	}

	public function delete($id = false,$type = "open")
	{
		if($id){
			$this->db->where('id',$id)->update('tickets',['df' => 'deleted']);			
			$this->session->set_flashdata('msg', 'Ticket Deleted');
	        redirect(base_url('ticket/'.$type));
		}else{
			redirect(base_url('ticket/'.$type));
		}
	}

	public function edit($id)
	{
		$data['_title']	= 'Edit Ticket';
		$data['ticket']	= $this->db->get_where('tickets',['id' => $id])->row_array();
		$this->load->theme('ticket/edit',$data);
	}

	public function update()
	{
		$data = [
			'client'			=> $this->input->post('client'),
			'priority'			=> $this->input->post('priority'),
			'head'				=> $this->input->post('head'),
			'query_desc'		=> $this->input->post('query'),
			'close_desc'		=> $this->input->post('closeRemarks')
		];
		$this->db->where('id',$this->input->post('id'))->update('tickets',$data);

		if($this->input->post('closed')){
			$data = [
				'closed'			=> '1',
				'closeat'			=> date('Y-m-d H:i:s'),
				'closed_by'			=> $this->session->userdata('id')
			];
			$this->db->where('id',$this->input->post('id'))->update('tickets',$data);
		}

		$this->session->set_flashdata('msg', 'Ticket Updated');
	    redirect(base_url('ticket/open'));
	}
}