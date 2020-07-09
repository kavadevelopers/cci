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

	public function _get_branch($id)
	{
		return $this->db->get_where('branch',['id'	=> $id])->row_array();
	}

	public function get_branches()
	{
		return $this->db->get_where('branch',['df'	=> ''])->result_array();
	}

	public function get_services()
	{
		return $this->db->get_where('services',['df'	=> ''])->result_array();
	}

	public function get_service($id)
	{
		return $this->db->get_where('services',['id'	=> $id,'df' => ''])->row_array();
	}

	public function _get_service($id)
	{
		return $this->db->get_where('services',['id'	=> $id])->row_array();
	}

	public function get_user($id)
	{
		return $this->db->get_where('user',['id'	=> $id,'df' => ''])->row_array();
	}

	public function _get_user($id)
	{
		return $this->db->get_where('user',['id'	=> $id])->row_array();
	}

	public function get_users()
	{
		return $this->db->get_where('user',['df' => '','user_type !=' => '0'])->result_array();
	}

	public function get_lead_owners()
	{
		if(get_user()['user_type'] == '1'){
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'user_type !=' => '0','user_type !=' => '1'])->result_array();
		}else if(get_user()['user_type'] == '2' || get_user()['user_type'] == '3'){
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'user_type !=' => '0','user_type !=' => '1','id !=' => get_user()['id']])->result_array();
		}else{
			return $this->db->get_where('user',['df' => '','user_type !=' => '0'])->result_array();
		}
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

	public function list_subindustry()
	{
		return $this->db->get_where('sub_industry',['df' => ''])->result_array();
	}

	public function get_state($id)
	{
		return $this->db->get_where('area_state',['id'	=> $id,'df' => ''])->row_array();
	}

	public function get_states()
	{
		return $this->db->get_where('area_state',['df' => ''])->result_array();
	}

	public function list_state()
	{
		return $this->db->order_by('id','asc')->get_where('area_state',['df' => ''])->result_array();
	}

	public function _get_state($id)
	{
		return $this->db->get_where('area_state',['id'	=> $id])->row_array();
	}

	public function get_cities()
	{
		return $this->db->get_where('area_city',['df' => ''])->result_array();
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

	public function _get_area($id)
	{
		return $this->db->get_where('areas',['id'	=> $id])->row_array();
	}

	public function get_areas()
	{
		return $this->db->get_where('areas',['df' => ''])->result_array();
	}

	public function get_sources()
	{
		return $this->db->get_where('source',['df' => ''])->result_array();
	}

	public function get_lead($id)
	{
		return $this->db->get_where('leads',['id'	=> $id,'df' => ''])->row_array();	
	}
}
?>