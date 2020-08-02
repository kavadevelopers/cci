<?php
class Document extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function folder()
	{
		$data['_title']		= "Document Folders";
		$data['_e']         = 0;
		$data['list']		= $this->db->order_by('id','desc')->get_where('document_folders',['df' => ''])->result_array();
		$this->load->theme('master/folder',$data);		
	}

	public function save()
	{
		$this->form_validation->set_error_delimiters('<div class="val-error">', '</div>');
		$this->form_validation->set_rules('name', 'Name','trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['_title']		= "Document Folders";
			$data['_e']         = 0;
			$data['list']		= $this->db->order_by('id','desc')->get_where('document_folders',['df' => ''])->result_array();
			$this->load->theme('master/folder',$data);	
		}
		else
		{ 
			$data = [
				'name'		=> $this->input->post('name')
			];
			$this->db->insert('document_folders',$data);

			$this->session->set_flashdata('msg', 'Folder Added');
	        redirect(base_url('document/folder'));
		}
	}
}