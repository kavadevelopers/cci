<?php
class Pdf extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
		$this->load->library('tcpdf/tcpdf');
	}

	public function invoice($id = false)
	{
		if($id){
			if($this->general_model->_get_invoice($id)){
				$invoice = $this->general_model->_get_invoice($id);
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		        $pdf->SetCreator(PDF_CREATOR);
		        $pdf->SetAuthor('Kava Developers');
		        $pdf->SetTitle('Invoice - #'.$invoice['inv']);
		        $pdf->SetSubject('Invoice - #'.$invoice['inv']);
		        $pdf->SetKeywords('PDF');
		        $pdf->SetFontSize(11);
		        $pdf->setPrintHeader(false);
		        $pdf->setPrintFooter(false);
		        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		        $pdf->AddPage();
		        $data['invoice'] = $invoice;
		        $html = $this->load->view('pdf/invoice',$data,true);
		        $pdf->writeHTML($html, true, false, true, false, '');
		        $pdf->Output('Invoice_#'.$invoice['inv'].'.pdf', 'I');
		    }
		    else{
	    		redirect(base_url('invoices'));
	    	}
	    }else{
	    	redirect(base_url('invoices'));
	    }
	}

	public function receipt($id = false)
	{
		if($id){
			if($this->general_model->_get_payment($id)){
				$invoice = $this->general_model->_get_payment($id);
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		        $pdf->SetCreator(PDF_CREATOR);
		        $pdf->SetAuthor('Kava Developers');
		        $pdf->SetTitle('Receipt - #'.$invoice['invoice']);
		        $pdf->SetSubject('Receipt - #'.$invoice['invoice']);
		        $pdf->SetKeywords('PDF');
		        $pdf->SetFontSize(11);
		        $pdf->setPrintHeader(false);
		        $pdf->setPrintFooter(false);
		        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		        $pdf->AddPage();
		        $data['invoice'] = $invoice;
		        $html = $this->load->view('pdf/receipt',$data,true);
		        $pdf->writeHTML($html, true, false, true, false, '');
		        $pdf->Output('Receipt_#'.$invoice['invoice'].'.pdf', 'I');
		    }
		    else{
	    		redirect(base_url('payment'));
	    	}
	    }else{
	    	redirect(base_url('payment'));
	    }
	}

}
?>