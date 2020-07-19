<?php
class Followup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function lead()
	{
		$data['_title']		= "Lead Followup";
		$this->db->where('owner',$this->session->userdata('id'));
		$this->db->where('df',"");
		$this->db->where('dump',"");
		$this->db->where('status',0);
		$this->db->where('next_followup_date <=', date('Y-m-d'));
		$data['leads']		= $this->db->get('leads')->result_array();
		$this->load->theme('followup/lead',$data);	
	}

	public function get()
	{
		$followups = $this->db->order_by('id','desc')->get_where('followup',['main_id' => $this->input->post('id'),'type' => $this->input->post('type')])->result_array();
		$string = '';
		$cus = 0;
		foreach ($followups as $key => $followup) {
			$customer = $followup['customer'] == '1'?'Yes':'No';
			if($followup['customer'] == 1){
				$cus++;
			}
			$str = '<tr>';
			$str .= '<td class="text-center">'.vd($followup['next_f']).'</td>';
			$str .= '<td class="text-center">'._vdatetime($followup['date']).'</td>';
			$str .= '<td>'.nl2br($followup['remarks']).'</td>';
			$str .= '<td class="text-center">'.$customer.'</td>';
			if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){
				$str .= '<td>'.$this->general_model->_get_user($followup['followup_by'])['name'].'</td>';
			}
			$str .= '</tr>';
			$string .= $str;
		}
		if($cus > 0){
			$cus = "1";
		}else{
			$cus = "";
		}
		echo json_encode([$string,$cus]);
	}

	public function save()
	{
		$data = [
			'remarks'		=> $this->input->post('remarks'),
			'next_f'		=> dd($this->input->post('date')),
			'customer'		=> $this->input->post('cus'),
			'date'			=> date('Y-m-d H:i:s'),
			'type'			=> $this->input->post('type'),
			'main_id'		=> $this->input->post('id'),
			'followup_by'	=> $this->session->userdata('id')
		];
		$this->db->insert('followup',$data);
		$fId = $this->db->insert_id();

		$status = $this->input->post('cus') == '1'?1:0;
		$this->db->where('id',$this->input->post('id'))->update('leads',['next_followup_date' => dd($this->input->post('date')),'tfrom'	=> dt($this->input->post('ftime')),'tto' => dt($this->input->post('ttime')),'status'	=> $status]);


		$followup = $this->db->get_where('followup',['id' => $fId])->row_array();
		$customer = $followup['customer'] == '1'?'Yes':'No';
		$str = '<tr>';
			$str .= '<td class="text-center">'.vd($followup['next_f']).'</td>';
			$str .= '<td class="text-center">'._vdatetime($followup['date']).'</td>';
			$str .= '<td>'.nl2br($followup['remarks']).'</td>';
			$str .= '<td class="text-center">'.$customer.'</td>';
			if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){
				$str .= '<td>'.$this->general_model->_get_user($followup['followup_by'])['name'].'</td>';
			}
		$str .= '</tr>';


		$lead = $this->db->get_where('leads',['id' => $this->input->post('id')])->row_array();
		$date_str = vd($lead['next_followup_date']).'<br>'.vt($lead['tfrom']).'-'.vt($lead['tto']);
		echo json_encode([$str,$date_str]);
	}

	public function saveJob()
	{	
		$customer = 0;
		if($this->input->post('status') == "5"){
			$customer = 1;
		}
		$data = [
			'remarks'		=> $this->input->post('remarks'),
			'next_f'		=> dd($this->input->post('date')),
			'customer'		=> $customer,
			'date'			=> date('Y-m-d H:i:s'),
			'type'			=> $this->input->post('type'),
			'main_id'		=> $this->input->post('id'),
			'followup_by'	=> $this->session->userdata('id')
		];
		$this->db->insert('followup',$data);
		$fId = $this->db->insert_id();

		$status = $this->input->post('status');
		$this->db->where('id',$this->input->post('id'))->update('job',['f_date' => dd($this->input->post('date')),'f_time'	=> dt($this->input->post('ftime')),'t_time' => dt($this->input->post('ttime')),'status'	=> $status]);


		$followup = $this->db->get_where('followup',['id' => $fId])->row_array();
		$customer = $followup['customer'] == '1'?'Yes':'No';
		$str = '<tr>';
			$str .= '<td class="text-center">'.vd($followup['next_f']).'</td>';
			$str .= '<td class="text-center">'._vdatetime($followup['date']).'</td>';
			$str .= '<td>'.nl2br($followup['remarks']).'</td>';
			$str .= '<td class="text-center">'.$customer.'</td>';
			if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){
				$str .= '<td>'.$this->general_model->_get_user($followup['followup_by'])['name'].'</td>';
			}
		$str .= '</tr>';


		
		$status = getjobStatus($this->input->post('status'));
		echo json_encode([$str,$status]);
	}

	public function job_get()
	{
		$followups = $this->db->order_by('id','desc')->get_where('followup',['main_id' => $this->input->post('id'),'type' => $this->input->post('type')])->result_array();
		$string = '';
		$cus = 0;
		foreach ($followups as $key => $followup) {
			$customer = $followup['customer'] == '1'?'Yes':'No';
			if($followup['customer'] == 1){
				$cus++;
			}
			$str = '<tr>';
			$str .= '<td class="text-center">'.vd($followup['next_f']).'</td>';
			$str .= '<td class="text-center">'._vdatetime($followup['date']).'</td>';
			$str .= '<td>'.nl2br($followup['remarks']).'</td>';
			$str .= '<td class="text-center">'.$customer.'</td>';
			if(get_user()['user_type'] == 0 || get_user()['user_type'] == 1){
				$str .= '<td>'.$this->general_model->_get_user($followup['followup_by'])['name'].'</td>';
			}
			$str .= '</tr>';
			$string .= $str;
		}
		if($cus > 0){
			$cus = "1";
		}else{
			$cus = "";
		}
		echo json_encode([$string,$cus]);
	}
}


