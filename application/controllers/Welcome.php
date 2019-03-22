<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('MYPDF');

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('PdfWithCodeigniter');
		$pdf->SetTitle('PdfWithCodeigniter');
		$pdf->SetSubject('PdfWithCodeigniter');
		$pdf->SetKeywords('TCPDF, PDF, example, test, codeigniter');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
		TCPDF Codeigniter Example

		Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

		// print a block of text using Write()
		$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

		// ---------------------------------------------------------
		 ob_clean();
		//Close and output PDF document
		$pdf->Output('example_003.pdf', 'I');
	}

}
