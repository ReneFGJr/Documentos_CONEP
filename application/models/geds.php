<?php
class geds extends CI_model {
	function le($id) {
		$this -> load -> database();
		$sql = "select * from " . $this -> tabela . "
					inner join " . $this -> tabela_type . " on dg_documento = id_doc
					inner join " . $this -> tabela_vigencia . " on dg_status = id_ds  
					where id_dg = $id";
		$query = $this -> db -> query($sql);
		$row = $query -> row();
		return ($row);
	}

	function le_type($id) {
		$this -> load -> database();
		$sql = "select * from " . $this -> tabela_type . "  
					where id_doc = $id";
		$query = $this -> db -> query($sql);
		$row = $query -> row();
		return ($row);
	}

	function row($obj) {
		$obj -> fd = array('id_dg', 'dg_nrdoc', 'dg_descricao', 'dg_ano', 'dg_data');
		$obj -> lb = array('ID', 'Nr.Doc', 'Documento', 'Ano', 'Data');
		$obj -> mk = array('', 'C', 'L', 'C', 'L');
		return ($obj);
	}

	function mostra_link($id) {
		$link = base_url('ged/download/' . $id . '/' . checkpost_link($id));
		$link = '<A HREF="' . $link . '" target="_new_' . date("Ymdhis") . '" class="link">';
		return ($link);
	}

	function keywords() {
		$sql = "select dg_keyword, id_dg from " . $this -> tabela . " where dg_keyword <> ''";
		$query = $this -> db -> query($sql);

		$keys = '';
		$k = array();
		$termos = array();
		foreach ($query->result_array() as $row) {
			/* recupera ID */
			$keys .= trim($row['dg_keyword']) . ';';
		}

		$keys = splitx(';', $keys);

		for ($r = 0; $r < count($keys); $r++) {
			$vlr = $keys[$r];
			$vlr1 = strtoupper(substr($vlr, 0, 1));
			$vlr2 = strtolower(substr($vlr, 1, strlen($vlr)));
			$vlr = $vlr1 . $vlr2;

			if (isset($k[$vlr])) {
				$k[$vlr] = $k[$vlr] + 1;
			} else {
				$k[$vlr] = 1;
				array_push($termos, $vlr);
			}
		}
		sort($termos);
		$tela = '';
		for ($r = 0; $r < count($termos); $r++) {
			$termo = $termos[$r];
			$link = base_url('ged/busca/' . $termo);
			$link = '<A HREF="' . $link . '" class="link lt2">';

			$tela .= $link . $termo;
			$tela .= ' (' . $k[$termo] . ')';
			$tela .= '</A><BR>' . chr(13) . chr(10);
		}

		return ($tela);
	}

	function mostra($row) {
		$cr = chr(13) . chr(10);
		$tela = '<fieldset><legend>Documentos</legend>';

		/* menu sisdoc_editar */
		$editar = TRUE;
		$excluir = TRUE;
		$tela .= form_menu($row -> id_dg, $editar, $excluir);

		/* Cor do status */
		$cor = '<font color="' . $row -> ds_cor . '">';

		$tela .= '<table width="100%" class="tabela00 pad5">';
		$tela .= '<thead><tr>';
		$tela .= '<th width="20%" align="right">Campo</th>';
		$tela .= '<th width="80%" align="left">Conteúdo</th>';
		$tela .= '</tr></thead>';
		/* dados */
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('record_id') . '</td>				<td>' . $row -> id_dg . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('ged_type') . '</td>	<td>' . $row -> doc_descricao . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('ged_keywords') . '</td>	<td>' . $row -> dg_keyword . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Nr. Doc</td>		<td>' . $row -> dg_nrdoc . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Descrição</td>		<td>' . $row -> dg_descricao . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Data</td>			<td>' . $row -> dg_data . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Ano</td>			<td>' . $row -> dg_ano . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Situação</td>		<td>' . $cor . $row -> ds_descricao . '</font></td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">Local</td>			<td>' . $this -> mostra_link($row -> id_dg) . 'documento</A></td></tr>' . $cr;

		$tela .= '</table>';
		$tela .= '</fieldset>';
		return ($tela);
	}

	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_dg', '', False, True));
		/* String size 100 required */
		array_push($cp, array('$S25', 'dg_nrdoc', 'Nr. Doc', True, True));
		/* String size 100 required */

		$sql = "select id_doc, doc_descricao from documentos where doc_ativo = 1 order by id_doc";
		array_push($cp, array('$Q id_doc:doc_descricao:' . $sql, 'dg_documento', 'Tipo do documento', True, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'dg_descricao', 'Descrição', True, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'dg_keyword', 'Palavras-chave (separadas por \';\')', True, True));

		/* String size 100 required */
		array_push($cp, array('$S4', 'dg_ano', 'Ano do documento', True, True));
		/* String size 100 required */
		array_push($cp, array('$S80', 'dg_data', 'Data de publicação', True, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'dg_local', 'Local', True, True));
		/* String size 100 required */
		$sql = "select id_ds, ds_descricao from documentos_status where ds_ativo = 1 order by id_ds";
		array_push($cp, array('$Q id_ds:ds_descricao:' . $sql, 'dg_status', 'Situação', True, True));

		/* String size 100 required */
		array_push($cp, array('$U', 'dg_update', '', True, True));

		/* Botao */
		array_push($cp, array('$B8', '', 'Gravar >>>', False, True));

		return ($cp);
	}

	function cp_docs() {
		$cp = array();
		array_push($cp, array('$H8', 'id_doc', '', False, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'doc_descricao', 'Descrição do documento', True, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'doc_folder', 'Pasta de armazenamento', True, True));

		/* Botao */
		array_push($cp, array('$B8', '', 'Gravar >>>', False, True));

		return ($cp);
	}

	/* Prepara dados */
	function prepara($row) {
		$data = array();

		$file_name = $row -> dg_local;
		$extensao = $this -> file_extensao($file_name);
		$ctype = $this -> extension_code($extensao);
		$file_path = $row -> doc_folder;
		$filename = trim($row -> dg_descricao) . '.' . $extensao;
		$qc = array('/', ':');
		$qt = array('-', '-');
		$filename = str_replace($qc, $qt, $filename);

		$data['extensao'] = $extensao;
		$data['file_name'] = $filename;
		$data['ctype'] = $ctype;
		$data['file_path'] = $file_name;
		return ($data);
	}

	/* recupera a extensao do aquivo */
	function file_extensao($fl) {
		$fl = strtolower($fl);
		$fs = strlen($fl);
		$ex = '???';
		if (substr($fl, $fs - 1, 1) == '.') { $ex = substr($fl, $fs, 1);
		}
		if (substr($fl, $fs - 2, 1) == '.') { $ex = substr($fl, $fs - 1, 2);
		}
		if (substr($fl, $fs - 3, 1) == '.') { $ex = substr($fl, $fs - 2, 3);
		}
		if (substr($fl, $fs - 4, 1) == '.') { $ex = substr($fl, $fs - 3, 4);
		}
		if (substr($fl, $fs - 5, 1) == '.') { $ex = substr($fl, $fs - 4, 5);
		}
		return (substr(trim($ex), 0, 4));
	}

	function extension_code($file_extension) {
		switch( $file_extension ) {
			case "pdf" :
				$ctype = "application/pdf";
				break;
			case "exe" :
				$ctype = "application/octet-stream";
				break;
			case "zip" :
				$ctype = "application/zip";
				break;
			case "doc" :
				$ctype = "application/msword";
				break;
			case "xls" :
				$ctype = "application/vnd.ms-excel";
				break;
			case "ppt" :
				$ctype = "application/vnd.ms-powerpoint";
				break;
			case "gif" :
				$ctype = "image/gif";
				break;
			case "png" :
				$ctype = "image/png";
				break;
			case "jpeg" :
				break;
			case "jpg" :
				$ctype = "image/jpg";
				break;
			case "mp3" :
				$ctype = "audio/mpeg";
				break;
			case "wav" :
				$ctype = "audio/x-wav";
				break;
			case "mpeg" :
				break;
			case "mpg" :
				break;
			case "mpe" :
				break;
				$ctype = "video/mpeg";
				break;
			case "mov" :
				$ctype = "video/quicktime";
				break;
			case "avi" :
				$ctype = "video/x-msvideo";
				break;
		}
		return ($ctype);
	}

}
?>
