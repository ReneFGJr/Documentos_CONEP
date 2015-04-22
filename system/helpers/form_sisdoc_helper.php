<?php
/**
 * CodeIgniter
 * sisDOC Labs
 *
 * @package	CodeIgniter
 * @author	Rene F. Gabriel Junior <renefgj@gmail.com>
 * @copyright Copyright (c) 2006 - 2015, sisDOC
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 2.1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Rene F. Gabriel Junior <renefgj@gmail.com>
 * @link		http://www.sisdoc.com.br/CodIgniter
 */

// ------------------------------------------------------------------------
class form {
	var $cp = array();
	var $data = array();
	var $post = array();
	var $tabela = '';

	/* row */
	var $fd = array();
	var $lb = array();
	var $mk = array();
	var $edit = false;
	var $see = false;
	var $new = false;

}

/* Funcao troca */
if (!function_exists('troca')) {
	function troca($qutf, $qc, $qt) {
		if (is_array($qutf)) {
			return ('erro');
		}
		return (str_replace(array($qc), array($qt), $qutf));
	}

}

if (!function_exists('splitx')) {
	function splitx($in, $string) {
		$string .= $in;
		$vr = array();
		while (strpos(' ' . $string, $in)) {
			$vp = strpos($string, $in);
			$v4 = trim(substr($string, 0, $vp));
			$string = trim(substr($string, $vp + 1, strlen($string)));
			if (strlen($v4) > 0) { array_push($vr, $v4);
			}
		}
		return ($vr);
	}

}

if (!function_exists('form_edit')) {
	/* Form Edit
	 * @parameter $cp - campos de edicao
	 * @parameter $tabela - nome da tabela que le/insere/atualiza registro
	 * @paramrter $id - chave primaria do registro
	 * @parameter $data - Dados do post inserir no controler: $data = $this->input->post();
	 */

	function row($obj) {
		$fd = $obj -> fd;
		$mk = $obj -> mk;
		$lb = $obj -> lb;
		/* parametros */
		$edit = $obj -> edit;
		$see = $obj -> see;
		$new = $obj -> new;

		/* campo ID */
		$fld = $fd[0];

		$sh = '<thead><tr>';
		for ($r = 1; $r < count($fd); $r++) {
			$label = $lb[$r];
			$sh .= '<th>' . $label . '</th>';
			/* campos da consulta */
			$fld .= ', ' . $fd[$r];
		}
		$sh .= '</tr></thead>';

		/* Recupera dados */
		$tabela = $obj -> tabela;

		$CI = &get_instance();
		$sql = "select $fld from " . $tabela;
		$query = $CI -> db -> query($sql);
		$data = '';

		/* Metodo de chamada */
		$url_pre = uri_string();
		$url_pre = troca($url_pre, '/row', '/view');

		foreach ($query->result_array() as $row) {
			/* recupera ID */
			$flds = trim($fd[0]);
			$id = $row[$flds];
			/* mostra resultado da query */
			$data .= '<tr>';
			for ($r = 1; $r < count($fd); $r++) {
				$flds = trim($fd[$r]);
				$msk = trim($mk[$r]);
				$mskm = '';
				switch($msk) {
					case 'C' :
						$mskm = ' align="center" ';
						break;
					case 'L' :
						$mskm = ' align="left" ';
						break;
					case 'R' :
						$mskm = ' align-"right" ';
						break;
				}

				/* see */
				if ($see == TRUE) {
					$link = '<A HREF="' . base_url() . $url_pre . '/' . $id . '/' . checkpost_link($id) . '">';
					$linkf = '</A>';
				} else {
					$link = '';
					$linkf = '';
				}
				$data .= chr(15) . '<td ' . $mskm . '>' . $link . trim($row[$flds]) . $linkf . '</td>';
			}
			$data .= '</tr>' . chr(13) . chr(10);
		}

		/* Tela completa */
		$tela = '<table width="100%">';
		$tela .= $sh;
		$tela .= $data;
		$tela .= '</table>';

		return ($tela);
	}

	function form_save($obj) {
		/* recupera post */
		$CI = &get_instance();
		$post = $CI -> input -> post();

		$tabela = $obj -> tabela;
		$cp = $obj -> cp;
		$id = $obj -> id;

		/* Modo de gravacao */
		if (round($id) > 0) {
			/* Update */
			$sql = "update " . $tabela . " set ";
			$sv = 0;
			for ($r = 1; $r < count($cp); $r++) {
				/* verifica se existe parametro */
				if (isset($post['dd' . $r])) {
					/* verefica se o campo é gravavel */
					if (strlen($cp[$r][1]) > 0) {
						if ($sv > 0) { $sql .= ', ';
						}
						$sql .= $cp[$r][1] . " = '" . $post['dd' . $r] . "' ";
						$sv++;
					}
				}
			}
			$sql .= "where " . $cp[0][1] . ' = ' . $id;
		} else {
			/* Insert */
			$sql = "insert into " . $tabela . " ";
			$sq1 = '';
			$sq2 = '';
			$sv = 0;
			for ($r = 1; $r < count($cp); $r++) {
				if (isset($post['dd' . $r])) {

					if ($sv > 0) { $sq1 .= ', ';
						$sq2 .= ', ';
					}
					$sq1 .= $cp[$r][1];
					$sq2 .= "'" . $post['dd' . $r] . "'";
					$sv++;
				}
			}
			$sql .= '(' . $sq1 . ') values (' . $sq2 . ')';
		}
		if ($sv == 0) { $sql = "";
		} else {
			$CI = &get_instance();
			$query = $CI -> db -> query($sql);
			return (1);
		}

		return (0);
	}

	function form_menu($id, $editar = FALSE, $excluir = FALSE) {
		$CI = &get_instance();
		$url_pre = uri_string();
		$url_edit = troca($url_pre, '/view', '/edit');
		$url_del = troca($url_pre, '/view', '/del');

		$link = '';

		if ($editar == TRUE) {
			$link_editar = base_url($url_edit);
			$link = '<A HREF="' . $link_editar . '" class="link lt0">' . $CI -> lang -> line('sisdocform_edit') . '</A>';
		}

		if ($excluir == TRUE) {
			$link_delete = base_url($url_del);
			$link .= ' | <A HREF="' . $link_delete . '" class="link lt0">' . $CI -> lang -> line('sisdocform_del') . '</A>';
		}
		return ($link);

	}

	function checkpost_link($id) {
		$chk = md5($id . date("Ymd"));
		return ($chk);
	}

	function checkpost($id, $chk1) {
		$chk2 = checkpost_link($id);
		if ($chk1 == $chk2) {
			return (0);
		} else {
			return (1);
		}
	}

	function le_dados($obj) {
		$id = $obj -> id;
		$tabela = $obj -> tabela;
		$fld = $obj -> cp[0][1];

		$sql = "select * from " . $tabela . "  
					where $fld = $id";

		$CI = &get_instance();
		$query = $CI -> db -> query($sql);
		$row = $query -> row();
		return ($row);
	}

	function form_edit($obj) {
		$dd = array($obj -> id);

		/* recupera post */
		$CI = &get_instance();
		$post = $CI -> input -> post();

		$cp = $obj -> cp;
		/* Recupera dados do banco */
		$recupera = 0;
		/* recupera ACAO do post */
		$acao = '';

		if (!isset($post['acao'])) { $recupera = 1;
		}

		/* Save in table */
		if ($recupera == 0) {
			$saved = form_save($obj);
			if ($saved == 1) {
				/* Redireciona */
				$url_pre = uri_string();
				$url_pre = substr($url_pre, 0, strpos($url_pre, '/')) . '/row';
				redirect($url_pre);
				//redirect($link, 'location', 301);
			}
		}

		$tela = '';
		$tela .= '<table class="tabela00" width="100%" border=0 >';
		$tela .= '<tr><td>' . form_open() . '</td></tr>';

		if ($recupera == 1) {
			/* recupera dados do banco */
			$data = le_dados($obj);
		} else {
			$data = array();
		}
		$tela .= 'Recupera = ' . $recupera;

		for ($r = 0; $r < count($cp); $r++) {
			/* Recupera dados */
			$vlr = '';
			if ($recupera == 1) {
				/* banco de dados */
				$fld = $cp[$r][1];
				if (isset($data -> $fld)) {
					$vlr = $data -> $fld;
				}
			} else {
				if (isset($post['dd' . $r])) {
					$vlr = $post['dd' . $r];
				}
			}
			$tela .= form_field($cp[$r], $vlr);
		}
		$tela .= '</table>';
		$tela .= form_close();

		return ($tela);
	}
	/* Botao novo */
	function form_botton_new($url,$txt='Novo registro')
		{
			$link = '<A HREF="'.$url.'/edit/0/'.checkpost_link('0').'">';
			$sx = $link.'<span class="botton_new">'.$txt.'</span>'.'</A>';
			return($sx);
		}

	/* Formulário */
	function form_field($cp, $vlr) {
		global $dd, $ddi;
		/* Zera tela */
		$tela = '';

		$table = 1;
		if (!(isset($dd))) { $dd = array();
			$ddi = 0;
		}

		$type = $cp[0];
		$label = $cp[2];
		$required = $cp[3];
		$placeholder = $label;
		$readonly = $cp[4];

		$tt = substr($type, 1, 1);
		$max = 100;
		$size = 100;
		$dados = array();
		$dn = 'dd' . $ddi;

		if ($table == 1) {
			$td = '<td>';
			$tdl = '<td align="right">';
			$tdn = '</td>';

			$tr = '<tr valign="top">';
			$trn = '</tr>';
		} else {
			$td = '';
			$tdl = '';
			$tdn = '';
			$tr = '';
			$trn = '';
		}

		//$dados = array('name'=>'dd'.$ddi, 'id'=>'dd'.$ddi,'value='.$dd[$ddi],'maxlenght'=>$max,'size'=>$size,$class=>'');

		switch ($tt) {
			/* String */
			case 'S' :
				/* TR da tabela */
				$tela .= $tr;

				/* label */
				if (strlen($label) > 0) {
					$tela .= $tdl . $label . ' ';
				}
				if ($required == 1) { $tela .= ' <font color="red">*</font> ';
				}

				$dados = array('name' => $dn, 'id' => $dn, 'value' => $vlr, 'maxlenght' => $max, 'size' => $size, 'placeholder' => $label, 'class' => 'form_string');
				if ($readonly == false) { $dados['readonly'] = 'readonly';
				}
				$tela .= $td . form_input($dados);
				$tela .= $tdn . $trn;
				break;

			/* Oculto */
			case 'H' :
				$dados = array($dn => $vlr);
				$tela .= form_hidden($dados);
				break;
			/* Update */
			case 'U' :
				if (round($vlr) == 0) { $vlr = date("Ymd");
				}
				$dados = array($dn => $vlr);
				$tela .= form_hidden($dados);
				break;

			/* Textarea */
			case 'T' :
				$ntype = trim(substr($type, 2, strlen($type)));
				$ntype = troca($ntype, ':', ';') . ';';
				$param = splitx(';', $ntype);

				/* TR da tabela */
				$tela .= $tr;

				/* label */
				if (strlen($label) > 0) {
					$tela .= $tdl . $label . ' ';
				}
				if ($required == 1) { $tela .= ' <font color="red">*</font> ';
				}

				$data = array('name' => $dn, 'id' => $dn, 'value' => $vlr, 'rows' => $param[1], 'cols' => $param[0], 'class' => 'form_textarea');
				$tela .= $td . form_textarea($data);
				$tela .= $tdn . $trn;
				break;
			/* Select Box */
			case 'Q' :
				$ntype = trim(substr($type, 2, strlen($type)));
				$ntype = troca($ntype, ':', ';') . ';';
				$param = splitx(';', $ntype);
				$options = array('' => '::select an option::');

				/* recupera dados */
				$sql = "select * from (" . $param[2] . ") as tabela ";
				$CI = &get_instance();
				$query = $CI -> db -> query($sql);
				foreach ($query->result_array() as $row) {
					/* recupera ID */
					$flds = trim($param[0]);
					$vlrs = trim($param[1]);
					$flds = $row[$flds];
					$vlrs = $row[$vlrs];
					$options[$flds] = $vlrs;
				}

				$dados = array('name' => $dn, 'id' => $dn, 'size' => 1, 'class' => 'form_select');

				$shirts_on_sale = array('small', 'large');

				/* label */
				if (strlen($label) > 0) {
					$tela .= $tdl . $label . ' ';
				}
				if ($required == 1) { $tela .= ' <font color="red">*</font> ';
				}
				$tela .= '<TD>';
				$tela .= form_dropdown($dados, $options, $vlr);
				break;
			/* Password */
			case 'P' :
				if (strlen($label) > 0) {
					$tela .= $label . ' ';
				}
				$dados = array('name' => $dn, 'id' => $dn, 'value' => $vlr, 'maxlenght' => $max, 'size' => $size);
				$tela .= form_password($dados);
				break;

			/* Button */
			case 'B' :
				$tela .= $tr . $tdl . $td;
				$dados = array('name' => 'acao', 'id' => 'acao', 'value' => $label);
				$tela .= form_submit($dados);
				$tela .= $tdn . $trn;
				break;
		}
		$ddi++;
		return ($tela);
	}

}
?>