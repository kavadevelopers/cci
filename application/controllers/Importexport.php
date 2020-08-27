<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Importexport extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
		$this->load->model('import_model');
	}


	public function client()
	{
		$data['_title']		= "Import Client";
		$this->load->theme('importexport/client',$data);
	}

	public function import_client()
	{
		$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


		if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();

			$totalRows = count($sheetData) - 4;
			$fileName = 'clients-backup.xlsx'; 
		    $spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
			if($totalRows > 0){

				unset($sheetData[0]);
				unset($sheetData[1]);
				unset($sheetData[2]);
				unset($sheetData[3]);
				$errorRows = 0; $importedRows = 0; 
				foreach ($sheetData as $key => $value) {
					$error = 0; $errorString = "";
					if($value[0] == ""){ $error++; $errorString .= "COLUMN1-";}
					if($value[2] == ""){ $error++; $errorString .= "COLUMN3-"; }
					if($value[3] == ""){ $error++; $errorString .= "COLUMN4-";}else{ if(!$this->import_model->getBranch($value[3])){ $error++; $errorString .= "COLUMN4-"; } }
					if($value[4] == ""){ $error++;$errorString .= "COLUMN5-"; }else{ if(!$this->import_model->getSource($value[4])){ $error++; $errorString .= "COLUMN5-";} }
					if($value[5] == ""){ $error++; $errorString .= "COLUMN6-";}else{ if(!$this->import_model->getClientType($value[5])){ $error++; $errorString .= "COLUMN7-";} }
					if($value[9] == ""){ $error++; $errorString .= "COLUMN10-";}
					if($value[10] == ""){ $error++; $errorString .= "COLUMN11-";}
					if($this->import_model->getClientStatus($value[11]) == "1"){ $error++; $errorString .= "COLUMN12-";}
					if($value[12] == ""){ $error++; $errorString .= "COLUMN13-";}
					if($value[14] == ""){ $error++; $errorString .= "COLUMN15-";}else{ if(!$this->import_model->getArea($value[14])){ $error++; $errorString .= "COLUMN15-";} }
					if($value[15] == ""){ $error++; $errorString .= "COLUMN16-";}else{ if(!$this->import_model->getCity($value[15])){ $error++; $errorString .= "COLUMN16-";} }
					if($value[16] == ""){ $error++; $errorString .= "COLUMN17-";}else{ if(!$this->import_model->getDistrict($value[16])){ $error++; $errorString .= "COLUMN17-";} }
					if($value[17] == ""){ $error++; $errorString .= "COLUMN18-";}else{ if(!$this->import_model->getState($value[17])){ $error++; $errorString .= "COLUMN18-";} }
					if($value[19] == ""){ $error++; $errorString .= "COLUMN20-";}
					if($value[20] == ""){ $error++; $errorString .= "COLUMN21-";}
					if($value[22] == ""){ $error++; $errorString .= "COLUMN23-";}
					if($value[23] == ""){ $error++; $errorString .= "COLUMN24-";}
					if($value[24] == ""){ $error++; $errorString .= "COLUMN25-";}
					if($value[25] == ""){ $error++; $errorString .= "COLUMN26-";}
					if(!$this->import_model->getIndustry($value[28])){ $error++; $errorString .= "COLUMN29-";} 
					if(!$this->import_model->getSubIndustry($value[29])){ $error++; $errorString .= "COLUMN30-";} 




					if($error > 0){
						$errorRows++;
						$sheet->setCellValue('A'.$errorRows, $value[0]);
						$sheet->setCellValue('B'.$errorRows, $value[1]);
						$sheet->setCellValue('C'.$errorRows, $value[2]);
						$sheet->setCellValue('D'.$errorRows, $value[3]);
						$sheet->setCellValue('E'.$errorRows, $value[4]);
						$sheet->setCellValue('F'.$errorRows, $value[5]);
						$sheet->setCellValue('G'.$errorRows, $value[6]);
						$sheet->setCellValue('H'.$errorRows, $value[7]);
						$sheet->setCellValue('I'.$errorRows, $value[8]);
						$sheet->setCellValue('J'.$errorRows, $value[9]);
						$sheet->setCellValue('K'.$errorRows, $value[10]);
						$sheet->setCellValue('L'.$errorRows, $value[11]);
						$sheet->setCellValue('M'.$errorRows, $value[12]);
						$sheet->setCellValue('N'.$errorRows, $value[13]);
						$sheet->setCellValue('O'.$errorRows, $value[14]);
						$sheet->setCellValue('P'.$errorRows, $value[15]);
						$sheet->setCellValue('Q'.$errorRows, $value[16]);
						$sheet->setCellValue('R'.$errorRows, $value[17]);
						$sheet->setCellValue('S'.$errorRows, $value[18]);
						$sheet->setCellValue('T'.$errorRows, $value[19]);
						$sheet->setCellValue('U'.$errorRows, $value[20]);
						$sheet->setCellValue('V'.$errorRows, $value[21]);
						$sheet->setCellValue('W'.$errorRows, $value[22]);
						$sheet->setCellValue('X'.$errorRows, $value[23]);
						$sheet->setCellValue('Y'.$errorRows, $value[24]);
						$sheet->setCellValue('Z'.$errorRows, $value[25]);
						$sheet->setCellValue('AA'.$errorRows, $value[26]);
						$sheet->setCellValue('AB'.$errorRows, $value[27]);
						$sheet->setCellValue('AC'.$errorRows, $value[28]);
						$sheet->setCellValue('AD'.$errorRows, $value[29]);
						$sheet->setCellValue('AE'.$errorRows, $value[30]);
						$sheet->setCellValue('AF'.$errorRows, $value[31]);
						$sheet->setCellValue('AG'.$errorRows, $value[32]);
						$sheet->setCellValue('AH'.$errorRows, $value[33]);
						$sheet->setCellValue('AI'.$errorRows, $value[34]);
						$sheet->setCellValue('AJ'.$errorRows, $errorString);
					}else{
						$importedRows++;
						$branch = $this->import_model->getBranch($value[3]);
						$source = $this->import_model->getSource($value[4]);
						$clientType = $this->import_model->getClientType($value[5]);
						$client_count = $this->db->get_where('client',['branch' => $branch['id']])->num_rows();

						$insertData = [
							'c_id'				=> $branch['code'].getClientId($client_count + 1),
							'branch'			=> $branch['id'],
							'source'			=> $source['id'],
							'company'			=> $source['company'],
							'client_type'		=> $clientType['id'],
							'fname'				=> $value[0],
							'mname'				=> $this->import_model->getNotRequired($value[1]),
							'lname'				=> $value[2],	
							'firm'				=> $this->import_model->getNotRequired($value[6]),	
							'mobile'			=> str_replace(';',',',$value[7]),	
							'email'				=> str_replace(';',',',$value[8]),	
							'pan'				=> $value[9],	
							'dob'				=> date('Y-m-d',strtotime($value[10])),	
							'status'			=> $this->import_model->getClientStatus($value[11]),
							'add1'				=> $value[12],
							'add2'				=> $this->import_model->getNotRequired($value[13]),
							'area'				=> $this->import_model->getArea($value[14])['id'],
							'city'				=> $this->import_model->getCity($value[15])['id'],
							'district'			=> $this->import_model->getDistrict($value[16])['id'],
							'state'				=> $this->import_model->getState($value[17])['id'],
							'pin'				=> $this->import_model->getNotRequired($value[18]),
							'occupation'		=> $value[19],
							'language'			=> $value[20],
							'time_to_call'		=> $this->import_model->getNotRequired($value[21]),
							'health_in'			=> $value[22],
							'life_in'			=> $value[23],
							'itr_client'		=> $value[24],
							'gst_client'		=> $value[25],
							'gst_type'			=> $this->import_model->getNotRequired($value[26]),
							'month_quater'		=> $this->import_model->getNotRequired($value[27]),
							'industry'			=> $this->import_model->getIndustry($value[28])['id'],
							'sub_industry'		=> $this->import_model->getSubIndustry($value[29])['id'],
							'ind_remarks'		=> $this->import_model->getNotRequired($value[30]),
							'profile_intro'		=> $this->import_model->getNotRequired($value[31]),
							'turnover_notes'	=> $this->import_model->getNotRequired($value[32]),
							'goal'				=> $this->import_model->getNotRequired($value[33]),
							'quotation'			=> $this->import_model->getNotRequired($value[34]),
							'parent'			=> '',
							'contact_persons'	=> '',
							'refered_by'		=> '',
							'created_by'		=> get_user()['id'],
							'created_at'		=> date('Y-m-d H:i:s')
						];

						$this->db->insert('client',$insertData);

					}
				}
				if($totalRows == $importedRows){
					$this->session->set_flashdata('msg', 'All Data has been imported.');
					
					if(file_exists(FCPATH.'backup/clients-backup.xlsx')){
				    	@unlink(FCPATH.'backup/clients-backup.xlsx');
				    }

	        		redirect(base_url('importexport/client'));	
				}else{
					$this->session->set_flashdata('error', 'Total '.$totalRows.'/'. $importedRows.' Clients Imported. Check Error File.');
				    if(file_exists(FCPATH.'backup/clients-backup.xlsx')){
				    	@unlink(FCPATH.'backup/clients-backup.xlsx');
				    }
				    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
				    $writer->save("./backup/".$fileName);
				    redirect(base_url('importexport/client'));	
				}

			}else{
				$this->session->set_flashdata('error', 'No Data Found in this file.');
	        	redirect(base_url('importexport/client'));	
			}
			

		}else{
			$this->session->set_flashdata('error', 'File Not Found.');
	        redirect(base_url('importexport/client'));
		}

	}


}