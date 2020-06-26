<?php
class General_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function get_setting()
	{
		return $this->db->get_where('setting',['id' => '1'])->row_array();
	}

	public function get_branch($id)
	{
		return $this->db->get_where('branch',['id'	=> $id,'df' => ''])->row_array();
	}

	public function get_branches()
	{
		return $this->db->get_where('branch',['df'	=> ''])->result_array();
	}

	public function get_user($id)
	{
		return $this->db->get_where('user',['id'	=> $id,'df' => ''])->row_array();
	}

	public function get_industry($id)
	{
		return $this->db->get_where('industry',['id'	=> $id,'df' => ''])->row_array();
	}

	public function _get_industry($id)
	{
		return $this->db->get_where('industry',['id'	=> $id])->row_array();
	}

	public function list_industries()
	{
		return $this->db->order_by('id','asc')->get_where('industry',['df' => ''])->result_array();
	}

	public function get_subindustry($id)
	{
		return $this->db->get_where('sub_industry',['id'	=> $id,'df' => ''])->row_array();
	}

	public function get_state($id)
	{
		return $this->db->get_where('area_state',['id'	=> $id,'df' => ''])->row_array();
	}

	public function list_state()
	{
		return $this->db->order_by('id','asc')->get_where('area_state',['df' => ''])->result_array();
	}

	public function _get_state($id)
	{
		return $this->db->get_where('area_state',['id'	=> $id])->row_array();
	}

	public function get_city($id)
	{
		return $this->db->get_where('area_city',['id'	=> $id,'df' => ''])->row_array();
	}

	public function list_city()
	{
		return $this->db->order_by('id','asc')->get_where('area_city',['df' => ''])->result_array();
	}

	public function _get_city($id)
	{
		return $this->db->get_where('area_city',['id'	=> $id])->row_array();
	}

	public function get_area($id)
	{
		return $this->db->get_where('areas',['id'	=> $id,'df' => ''])->row_array();
	}
}
?>