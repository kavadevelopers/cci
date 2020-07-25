<?php
class Generate_bill extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Job List";
		$this->db->select('client');
		$this->db->order_by('id','asc');
		$this->db->group_by('client');
		$this->db->where('status','3');
		$data['list'] = $this->db->get('job')->result_array();
		$this->load->theme('bill/generate',$data);		
	}

	public function all()
	{

		$date = date('Y-m-d');

		$this->db->where('status','3');
		$this->db->where('client',$this->input->post('client'));
		$jobs = $this->db->get('job')->result_array();

		$client = $this->general_model->_get_client($this->input->post('client'));


		$invoice = $this->db->get_where('invoice',['company' => $client['company']])->num_rows();

		$data = [
			'inv'				=> $this->general_model->_get_company($client['company'])['prefix']."_".($invoice + 1),
			'company'			=> $client['company'],
			'branch'			=> $client['branch'],
			'client'			=> $this->input->post('client'),
			'date'				=> $date,
			'created_at'		=> date('Y-m-d H:i:s'),
			'created_by'		=> get_user()['id']
		];
		$this->db->insert('invoice',$data);
		$inv_id = $this->db->insert_id();
		$total = 0;
		foreach ($jobs as $key => $value) {
			$total += $value['price'];

			$data = [
				'service'			=> $this->input->post('client'),
				'price'				=> $value['price'],
				'qty'				=> "1.00",
				'total'				=> $value['price'],
				'invoice'			=> $inv_id
			];
			$this->db->insert('invoice_details',$data);

			$data = [
				'remarks'		=> "Bill Generated",
				'next_f'		=> $date,
				'customer'		=> $this->input->post('client'),
				'date'			=> date('Y-m-d H:i:s'),
				'ftime'			=> null,
				'ttime'			=> null,
				'type'			=> "job",
				'main_id'		=> $value['id'],
				'needed'		=> 0,
				'followup_by'	=> get_user()['id']
			];
			$this->db->insert('followup',$data);

			$this->db->where('id',$value['id'])->update('job',['f_date' => $date,'f_time'	=> null,'t_time' => null,'status'	=> 4]);
		}

		$this->db->where('id',$inv_id)->update('invoice',['total' => $total]);


		$data = [
			'type'		=> invoice(),
			'client'	=> $this->input->post('client'),
			'date'		=> $date,
			'main'		=> $inv_id,
			'debit'		=> $total,
		];
		$this->db->insert('transaction',$data);
	}

	public function single()
	{
		$date = date('Y-m-d');

		$this->db->where('id',$this->input->post('job'));
		$jobs = $this->db->get('job')->row_array();

		$client = $this->general_model->_get_client($jobs['client']);


		$invoice = $this->db->get_where('invoice',['company' => $client['company']])->num_rows();

		$data = [
			'inv'				=> $this->general_model->_get_company($client['company'])['prefix']."_".($invoice + 1),
			'company'			=> $client['company'],
			'branch'			=> $client['branch'],
			'client'			=> $client['id'],
			'date'				=> $date,
			'created_at'		=> date('Y-m-d H:i:s'),
			'created_by'		=> get_user()['id']
		];
		$this->db->insert('invoice',$data);
		$inv_id = $this->db->insert_id();
		$total = 0;
		$total += $jobs['price'];

		$data = [
			'service'			=> $client['id'],
			'price'				=> $jobs['price'],
			'qty'				=> "1.00",
			'total'				=> $jobs['price'],
			'invoice'			=> $inv_id
		];
		$this->db->insert('invoice_details',$data);

		$data = [
			'remarks'		=> "Bill Generated",
			'next_f'		=> $date,
			'customer'		=> $client['id'],
			'date'			=> date('Y-m-d H:i:s'),
			'ftime'			=> null,
			'ttime'			=> null,
			'type'			=> "job",
			'main_id'		=> $jobs['id'],
			'needed'		=> 0,
			'followup_by'	=> get_user()['id']
		];
		$this->db->insert('followup',$data);

		$this->db->where('id',$jobs['id'])->update('job',['f_date' => $date,'f_time'	=> null,'t_time' => null,'status'	=> 4]);

		$this->db->where('id',$inv_id)->update('invoice',['total' => $total]);


		$data = [
			'type'		=> invoice(),
			'client'	=> $client['id'],
			'date'		=> $date,
			'main'		=> $inv_id,
			'debit'		=> $total,
		];
		$this->db->insert('transaction',$data);
	}
}

?>