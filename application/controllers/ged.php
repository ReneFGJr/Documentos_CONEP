<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ged extends CI_Controller {
	var $tabela = 'documentos_ged';
	var $tabela_type = 'documentos';
	var $tabela_vigencia = 'documentos_status';

	function __construct() {
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> database();
		$this -> load -> helper('form');
		$this -> load -> helper('form_sisdoc');
		$this -> load -> helper('url');
		$this->lang->load("app","portuguese");
	}

	public function index() {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		$this -> load -> view('security/noaccess');
	}
	
	function do_upload()
	{
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');		
		
		$config['upload_path'] = '_documentos/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['overwrite'] = TRUE;
		$config['max_size']	= 10*1024*1024;
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = 'Reol01.pdf';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data = array('tela' => $this->upload->display_errors());
			$data['title'] = 'Upload File';
			$this->load->view('form/form', $data);
		}
		else
		{
			$data = array('tela_array' => $this->upload->data());
			$data['title'] = 'Upload File';
			$data['tela'] = 'Resultado';
			$this->load->view('form/form', $data);
		}
	}	
	
	public function upload($id) {
		$this -> load -> helper('url');
		
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> load -> model('geds');
		/* Le registro */
		$row = $this->geds->le($id);
		
		/* Upload */
		
		$tela['tela'] = $this->geds->mostra($row);
		$tela['title'] = 'Documentos (detalhes)';
		
		$this -> load -> view('form/form_upload', $tela);
		
		$this -> load -> view('header/foot');
	}	
	
	public function view($id) {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> load -> model('geds');
		/* Le registro */
		$row = $this->geds->le($id);
		
		$tela['tela'] = $this->geds->mostra($row);
		$tela['title'] = 'Documentos (detalhes)';
		
		$this -> load -> view('form/form', $tela);
		
		$this -> load -> view('header/foot');
	}
	

	public function download($id) {
		$this -> load -> model('geds');

		$data = $this -> geds -> le($id);

		/* Le dados do registro */
		$data = $this -> geds -> prepara($data);
		$this -> load -> view('ged/download', $data);
	}
	
	public function busca()
		{
		$this -> load -> model('geds');
		$tela_keyword = $this->geds->keywords();
		$tela['title'] = 'Busca de documentos';
				
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		/* Monstagem da busca */
		$sc = '<table width="100%" class="tabela00 lt1" border=1>';
		$sc .= '<tr valign="top"><TD width="200">';
		$sc .= '<h3>Palavras-chave</h3>';
		$sc .= $tela_keyword;
		$sc .= '<td>';
		$sc .= '<h3>Busca nos documentos</h3>';
		$sc .= '</table>';
		
		$tela['tela'] = $sc;
		
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');	
		}	
	
	public function keywords()
		{
		$this -> load -> model('geds');
		$tela['tela'] = $this->geds->keywords();
		$tela['title'] = 'Palavras-chave';
				
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
		
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');	
		}

	public function row() {
		$this -> load -> model('geds');
		
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');

		$form = new form;
		$form->tabela = $this->tabela;
		$form->see = true;
		$form = $this->geds->row($form);
		
		$tela['tela'] = row($form);
		$tela['title'] = 'Documentos';
		
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');		
	}

	public function edit($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('geds');
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
		$form -> cp = $this -> geds -> cp();
		$form -> tabela = $this -> tabela;

		/* form */
		$tela['tela'] = form_edit($form);
		$tela['title'] = 'Documentos';
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');
	}

	public function edit_docs($id = 0, $chk = '') {
		/* Models */
		$this -> load -> model('geds');
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
		$form -> cp = $this -> geds -> cp_docs();
		$form -> tabela = $this -> tabela_type;

		$tela['tela'] = form_edit($form);
		$tela['title'] = 'Tipos de documentos';
		$this -> load -> view('form/form', $tela);
		$this -> load -> view('header/foot');
	}

}
?>