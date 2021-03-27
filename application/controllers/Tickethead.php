<?php
class Tickethead extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Ticket Head";
		$data['_e']         = 0;
		$data['list']		= $this->db->order_by('id','desc')->get_where('ticket_head',['df' => ''])->result_array();
		$this->load->theme('master/ticket_head',$data);		
	}

	public function save()
	{
		$data = [
			'name'		=> $this->input->post('name')
		];
		$this->db->insert('ticket_head',$data);
		$this->session->set_flashdata('msg', 'Ticket Head Added');
        redirect(base_url('tickethead'));
	}

	public function delete($id = false)
	{
		if($id){
			$data = [
				'df'		=> 'deleted'
			];
			$this->db->where('id',$id)->update('ticket_head',$data);
			$this->session->set_flashdata('msg', 'Ticket Head Deleted');
        	redirect(base_url('tickethead'));
		}else{
			redirect(base_url('tickethead'));
		}
	}
}