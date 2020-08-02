<?php
class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}


	public function ledger()
	{
		$data['_title']		= "Ledger";
		$data['client']		= "";
		$this->load->theme('reports/ledger',$data);
	}

	public function ledger_result()
	{
		$data['_title']		= "Ledger";
		$data['client']		= $this->input->post('client');

        $this->db->where('client', $this->input->post('client'));
		$this->db->group_start();
		    $this->db->where('type',invoice());
            $this->db->or_where('type',payment());
		$this->db->group_end();
		$this->db->order_by('date','asc');
		$data['list']		= $this->db->get('transaction')->result_array();
		$this->load->theme('reports/ledger',$data);	
	}
}
?>