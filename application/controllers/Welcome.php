<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __Construct(){
	  parent::__Construct ();
	   $this->load->database(); // load database
	   $this->load->model('PostModel'); // load model
	}

	public function index()
	{
		log_message('debug', 'WELCOME CONTROLLER...');
		
		$this->load->view('welcome_message');

		$pdf= new mPDF();
        // data to views
		//$data = array();
		$this->data['posts'] = $this->PostModel->getPosts(); // calling Post model method getPosts()
		//load the view and saved it into $html variable
		$html = $this->load->view('posts_view', $this->data, true);
		//this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";
		//generate the PDF from the given html
		$pdf->WriteHTML($html);
		//download it.
		$pdf->Output($pdfFilePath,"D");
		
	}
}
