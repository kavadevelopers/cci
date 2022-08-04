<?php
class Discount extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
	}

	public function index()
	{
		$data['_title']		= "Discounts";
		$data['list']	= $this->general_model->getDiscounts();
		$this->load->theme('payment/discount',$data);		
	}


	public function save()
	{
		$date = dd($this->input->post('date'));
		if(get_user()['user_type'] == 0){
			$status = 1;
		}else{
			$status = 0;
		}
		$client = $this->general_model->_get_client($this->input->post('client'));

		$company = $this->general_model->_get_company($this->input->post('company'));
		$payment_count = $this->db->get_where('payment_discounts',['company' => $company['id']])->num_rows();
		while (1){ 
			$payment_count++;
			$Chk = $this->db->get_where('payment_discounts',['invoice' => $company['discount_prefix'].'_'.($payment_count)])->num_rows();
			if ($Chk == 0) {
				break;		
			}	
		}

		$data = [
			'date'			=> $date,
			'invoice'		=> $company['discount_prefix'].'_'.($payment_count),
			'client'		=> $this->input->post('client'),
			'branch'		=> $client['branch'],
			'company'		=> $this->input->post('company'),
			'amount'		=> $this->input->post('amount'),
			'remarks'		=> $this->input->post('remarks'),
			'status'		=> $status,
			'created_by'	=> get_user()['id'],
			'created_at'	=> date('Y-m-d H:i:s')
		];

		$this->db->insert('payment_discounts',$data);
		$inv_id = $this->db->insert_id();

		if(get_user()['user_type'] == 0){
			$data = [
				'type'		=> discount(),
				'client'	=> $this->input->post('client'),
				'date'		=> $date,
				'main'		=> $inv_id,
				'credit'		=> $this->input->post('amount'),
			];
			$this->db->insert('transaction',$data);
		}

		$this->session->set_flashdata('msg', 'Discount Added');
	    redirect(base_url('discount'));
	}

	public function update()
	{

		$company = $this->general_model->_get_company($this->input->post('company'));
		$pay = $this->db->get_where('payment_discounts',['id' => $this->input->post('id')])->row_array();
		if ($pay['company'] != $this->input->post('company')) {
			$payment_count = $this->db->get_where('payment_discounts',['company' => $company['id']])->num_rows();

			while (1){ 
				$payment_count++;
				$Chk = $this->db->get_where('payment_discounts',['invoice' => $company['discount_prefix'].'_'.($payment_count)])->num_rows();
				if ($Chk == 0) {
					break;		
				}	
			}
			
			$this->db->where('id',$this->input->post('id'))->update('payment_discounts',[
				'invoice'		=> $company['discount_prefix'].'_'.($payment_count),
			]);
		}


		$date = dd($this->input->post('date'));
		
		$client = $this->general_model->_get_client($this->input->post('client'));

		$data = [
			'date'			=> $date,
			'client'		=> $this->input->post('client'),
			'branch'		=> $client['branch'],
			'company'		=> $this->input->post('company'),
			'amount'		=> $this->input->post('amount'),
			'remarks'		=> $this->input->post('remarks')
		];
		$this->db->where('id',$this->input->post('id'))->update('payment_discounts',$data);
		$data = [
			'client'	=> $this->input->post('client'),
			'date'		=> $date,
			'credit'	=> $this->input->post('amount')
		];
		$this->db->where('type',discount())->where('main',$this->input->post('id'))->update('transaction',$data);

		

		$this->session->set_flashdata('msg', 'Discount Updated');
	    redirect(base_url('discount'));
	}
}