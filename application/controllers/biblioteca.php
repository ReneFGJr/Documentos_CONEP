<?php

class biblioteca extends CI_Controller {
	
	var $tabela = "pendencias";
	
	function __construct() {
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this->lang->load("app","portuguese");
	}
	
	public function view($id) {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> load -> model('bibliotecas');
		/* Le registro */
		$row = $this->bibliotecas->le($id);
		
		$tela['tela'] = $this->bibliotecas->mostra($row);
		$tela['title'] = 'Documentos (detalhes)';
		
		$this -> load -> view('form/form', $tela);
		
		$this -> load -> view('header/foot');
	}	
	
	public function keywords()
		{
		$this -> load -> model('bibliotecas');
		$tela['tela'] = $this->bibliotecas->keywords();
		$tela['title'] = 'Palavras-chave';
				
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');	
		}	
	
	public function row() {
		$this -> load -> model('bibliotecas');
		
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');

		$form = new form;
		$form->tabela = $this->tabela;
		$form->see = true;
		$form = $this->bibliotecas->row($form);
		
		$tela['tela'] = row($form);
		$url = base_url('biblioteca');
		$tela['tela'] .= form_botton_new($url,'Novo registro');
		
		$tela['title'] = 'Documentos';
		
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');		
	}	
		
	function index() {
		$this->load->model('bibliotecas');
		
		$tela = array();
		$tela['tela'] = 'Biblioteca de avaliação ética';
		$tela['title'] = 'Avaliação ética';

		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');

		$this -> load -> view('form/form', $tela);
		
		$this -> load -> view('header/foot');
	}
	
	public function edit($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('bibliotecas');
		/* Formulário */

		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');

		if (checkpost($id, $chk)) {
			$data['link'] = checkpost_link($id);
			$this -> load -> view('form/form_erro_checkpost', $data);
			$this -> load -> view('header/foot');

			return ('');
		}

		/* Form */
		$form = new form;
		$form -> id = $id;
		$form -> cp = $this -> bibliotecas -> cp();
		$form -> tabela = $this -> tabela;

		/* form */
		$tela['tela'] = form_edit($form);
		$tela['title'] = 'Bibliotecas';
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');
	}	

}
?>