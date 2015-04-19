<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ged extends CI_Controller {
	var $tabela = 'documentos_ged';
	var $tabela_type = 'documentos';
	
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
	}	

	public function index() {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		$this -> load -> view('security/noaccess');
	}

	public function download($id) {
		$this -> load -> model('geds');

		$data = $this -> geds -> le($id);

		/* Le dados do registro */
		$data = $this -> geds -> prepara($data);
		$this -> load -> view('ged/download', $data);
	}

	public function editar() {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> form_validation -> set_rules('doc_descricao', 'Descrição', 'max_length[100]');
		$this -> form_validation -> set_rules('doc_folder', 'Pasta', 'required|max_length[100]');

		$this -> form_validation -> set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this -> form_validation -> run() == FALSE)// validation hasn't been passed
		{
			$this -> load -> view('ged/document_type');
		} else// passed validation proceed to post success logic
		{
			// build array for the model

			$form_data = array('id' => set_value('id'), 'doc_descricao' => set_value('doc_descricao'), 'doc_folder' => set_value('doc_folder'));

			// run insert model to write data to db

			if ($this -> edit -> SaveForm($form_data) == TRUE)// the information has therefore been successfully saved in the db
			{
				redirect('ged/success');
				// or whatever logic needs to occur
			} else {
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
	}

}
?>