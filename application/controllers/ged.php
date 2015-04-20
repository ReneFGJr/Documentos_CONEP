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
		$this->load->helper('form_sisdoc');
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

	public function editar($id=0) {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this-> load -> model('geds');
		
		$cp = $this->geds->cp();
		$post = $this->input->post();
		$acao = $this->input->post('acao');
		if ((strlen($acao)==0) and (strlen($id) > 0))
			{
				
			}
		
		$data['tela'] = form_edit($cp,$this->tabela_type);
		$data['title'] = 'Tipos de documentos';
		$this->load->view('form',$data);			
	}

}
?>