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

	public function get_company($id)
	{
		return $this->db->get_where('company',['id'	=> $id,'df' => ''])->row_array();
	}

	public function _get_company($id)
	{
		return $this->db->get_where('company',['id'	=> $id])->row_array();
	}

	public function list_company()
	{
		return $this->db->get_where('company',['df' => ''])->result_array();
	}

	public function get_source($id)
	{
		return $this->db->get_where('source',['id'	=> $id,'df' => ''])->row_array();
	}

	public function _get_source($id)
	{
		return $this->db->get_where('source',['id'	=> $id])->row_array();
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
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'user_type' => '3'])->result_array();
		}else if(get_user()['user_type'] == '3'){
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'user_type' => '3','id !=' => get_user()['id']])->result_array();
		}else{
			$this->db->group_start();
				$this->db->or_where('user_type',"1");
				$this->db->or_where('user_type',"3");
			$this->db->group_end();
			return $this->db->get_where('user',['df' => ''])->result_array();
		}
	}

	public function get_todo_users()
	{
		if(get_user()['user_type'] == '0'){
			return $this->db->get_where('user',['df' => ''])->result_array();
		}
		else if(get_user()['user_type'] == '1'){
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch']])->result_array();
		}
		else if(get_user()['user_type'] == '2'){
			if(get_user()['type'] == '1'){
				return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'type >' => 1 ])->result_array();
			}else if(get_user()['type'] == '2'){
				return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'type >' => 2 ])->result_array();
			}else{
				return [];
			}
		}
		else if(get_user()['user_type'] == '3'){
			return [];
		}
	}

	public function get_job_owners()
	{
		if(get_user()['user_type'] == '1'){
			return $this->db->get_where('user',['df' => '','branch' => get_user()['branch'],'user_type' => '2'])->result_array();
		}else{
			return $this->db->get_where('user',['df' => '','user_type' => '2'])->result_array();
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

	public function _get_subindustry($id)
	{
		return $this->db->get_where('sub_industry',['id'	=> $id])->row_array();
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

	public function _get_lead($id)
	{
		return $this->db->get_where('leads',['id'	=> $id])->row_array();	
	}


	public function get_clients()
	{
		if(get_user()['user_type'] == 0){
			return $this->db->get_where('client',['status' => '0'])->result_array();
		}else{
			return $this->db->get_where('client',['branch' => get_user()['branch'],'status' => '0'])->result_array();
		}
	}

	public function get_cancel_clients()
	{
		if(get_user()['user_type'] == 0){
			return $this->db->get_where('client',['status' => '9'])->result_array();
		}else{
			return $this->db->get_where('client',['branch' => get_user()['branch'],'status' => '9'])->result_array();
		}
	}

	public function get_inactive_clients()
	{
		if(get_user()['user_type'] == 0){
			return $this->db->get_where('client',['status' => '8'])->result_array();
		}else{
			return $this->db->get_where('client',['branch' => get_user()['branch'],'status' => '8'])->result_array();
		}
	}

	public function getFilteredClients()
	{
		if(get_user()['user_type'] == 0 || get_user()['user_type'] == 2){
			return $this->db->get_where('client',['status' => '0'])->result_array();
		}else if(get_user()['user_type'] == 1){
			return $this->db->get_where('client',['branch' => get_user()['branch'],'status' => '0'])->result_array();
		}else if(get_user()['user_type'] == 3){
			return $this->db->get_where('client',['status' => '0','owner' => get_user()['id']])->result_array();
		}
	}

	public function _get_client($id)
	{
		return $this->db->get_where('client',['id' => $id])->row_array();
	}

	public function _get_invoice($id)
	{
		return $this->db->get_where('invoice',['id' => $id])->row_array();
	}

	public function _get_payment($id)
	{
		return $this->db->get_where('payment',['id' => $id])->row_array();
	}

	public function get_jobs()
	{
		$myId = get_user()['id'];
		$myBranch = get_user()['branch'];
		if(get_user()['user_type'] == 0){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['status <' => 3])->result_array();
		}else if(get_user()['user_type'] == 1){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['branch' => $myBranch,'status <' => 3])->result_array();	
		}else{
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['owner' => $myId,'status <' => 3])->result_array();
		}
	}

	public function get_workDone()
	{
		$myId = get_user()['id'];
		$myBranch = get_user()['branch'];
		if(get_user()['user_type'] == 0){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['status' => 3])->result_array();
		}else if(get_user()['user_type'] == 1){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['branch' => $myBranch,'status' => 3])->result_array();
		}else{
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['owner' => $myId,'status' => 3])->result_array();
		}
	}

	public function get_PaidJob()
	{
		$myId = get_user()['id'];
		$myBranch = get_user()['branch'];
		if(get_user()['user_type'] == 0){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['status' => 5])->result_array();
		}else if(get_user()['user_type'] == 1){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['branch' => $myBranch,'status' => 5])->result_array();
		}else{
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['owner' => $myId,'status' => 5])->result_array();
		}
	}

	public function get_BilledJob()
	{
		$myId = get_user()['id'];
		$myBranch = get_user()['branch'];
		if(get_user()['user_type'] == 0){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['status' => 4])->result_array();
		}else if(get_user()['user_type'] == 1){
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['branch' => $myBranch,'status' => 4])->result_array();
		}else{
			$this->db->order_by('status','asc');
			return $this->db->get_where('job',['owner' => $myId,'status' => 4])->result_array();
		}
	}

	public function getInvoices()
	{
		if(get_user()['user_type'] == 0 || get_user()['user_type'] == 2){
			return $this->db->order_by('id','desc')->get_where('invoice')->result_array();	
		}else if(get_user()['user_type'] == 1){
			return $this->db->order_by('id','desc')->get_where('invoice',['branch' => get_user()['branch']])->result_array();	
		}else if(get_user()['user_type'] == 3){
			$clients = $this->db->get_where('client',['owner' => get_user()['id']])->result_array();
			$cli = [];
			foreach ($clients as $key => $value) {
				array_push($cli, $value['id']);
			}
			$this->db->where_in('client',$cli);
			return $this->db->order_by('id','desc')->get_where('invoice')->result_array();	
		}
	}

	public function getPayments()
	{
		if(get_user()['user_type'] == 0 || get_user()['user_type'] == 2){
			return $this->db->order_by('id','desc')->get_where('payment')->result_array();	
		}else if(get_user()['user_type'] == 1){
			return $this->db->order_by('id','desc')->get_where('payment',['branch' => get_user()['branch']])->result_array();	
		}else if(get_user()['user_type'] == 3){
			$clients = $this->db->get_where('client',['owner' => get_user()['id']])->result_array();
			$cli = [];
			foreach ($clients as $key => $value) {
				array_push($cli, $value['id']);
			}
			$this->db->where_in('client',$cli);
			return $this->db->order_by('id','desc')->get_where('payment')->result_array();	
		}
	}

	public function getToDo()
	{
		$myId = get_user()['id'];
		$this->db->order_by('date','asc');
		$this->db->group_start();
			$this->db->where('to',$myId);
			$this->db->or_where('from',$myId);
		$this->db->group_end();
		return $this->db->get('todo')->result_array();
	}

	public function getOutStandingClient($client_id)
	{
		$query = $this->db->select_sum('credit')->from('transaction')->where('client', $client_id)->get();
		$ocredit = $query->row()->credit;

		$query = $this->db->select_sum('debit')->from('transaction')->where('client', $client_id)->get();
		$odebit = $query->row()->debit;


		if($odebit > $ocredit){
			$tra = $this->db->order_by('id','desc')->get_where('transaction',['client' => $client_id,'type' => invoice()])->row_array();
			$days = daysBeetweenDates($tra['date']);
			return [number_format($odebit - $ocredit,2),$days];
		}else if($odebit < $ocredit){
			$tra = $this->db->order_by('id','desc')->get_where('transaction',['client' => $client_id,'type' => payment()])->row_array();
			$days = daysBeetweenDates($tra['date']);
			return [number_format($odebit - $ocredit ,2),$days];
		}else{
			return [0,0];
		}
	}
}
?>