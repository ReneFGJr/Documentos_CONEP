<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	public function index() {
		$this -> cab();
		$this -> load -> view('header/foot');
	}

	public function resolucao() {
		$this -> cab();
		
		/* Models */
		$this -> load -> model('documentos');

		/* Resolucao */
		$data['lista'] = $this -> documentos -> list_all_documents(1,1);
		$data['titulo'] = 'Resoluções CNS/CONEP';
		$this -> load -> view('circular/lista', $data);

		$data['lista'] = $this -> documentos -> list_all_documents(1,2);
		$data['titulo'] = 'Resoluções CNS/CONEP - Revogadas';
		$this -> load -> view('circular/lista', $data);

		$this -> load -> view('header/foot');
	}

	public function circular() {
		$this -> cab();

		/* Models */
		$this -> load -> model('documentos');

		/* Lista circular */
		$data['lista'] = $this -> documentos -> list_all_documents(4);
		$data['titulo'] = 'Carta Circular CONEP';
		$this -> load -> view('circular/lista', $data,1);

		/* Lista norma operacional */
		$data['titulo'] = 'Norma Operacional CONEP';
		$data['lista'] = $this -> documentos -> list_all_documents(5);
		$this -> load -> view('circular/lista', $data,1);

		$this -> load -> view('header/foot');
	}

	public function cab() {
		$this -> load -> view('header/cab');
		$this -> load -> view('header/cab_nav');
		$this -> load -> view('header/content');
	}

}
