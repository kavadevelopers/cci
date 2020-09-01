<?php
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Dashboard";
		$data['todo']		= $this->general_model->getToDo();
		$data['other_task']		= $this->db->order_by('id','desc')->limit(5)->get_where('task',['from' => get_user()['id'],'done' => 0])->result_array();
		$data['my_task']		= $this->db->order_by('id','desc')->limit(5)->get_where('task',['to' => get_user()['id'],'done' => 0])->result_array();
		$data['receipt_request']	= $this->db->limit(5)->order_by('date','asc')->get_where('payment',['status' => '0'])->result_array();
		$this->load->theme('dashboard',$data);
	}

}
?>