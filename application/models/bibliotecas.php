<?php
class bibliotecas extends CI_model {
	function cp() {
		$cp = array();
		array_push($cp, array('$H8', 'id_p', '', False, True));
		/* String size 100 required */
		array_push($cp, array('$S100', 'p_descricao', 'Tipo de pendências', True, True));
		/* String size 100 required */
		array_push($cp, array('$T80:5', 'p_conteudo', 'Descrição da pendência', True, True));

		/* String size 100 required */
		array_push($cp, array('$T80:5', 'p_pendencia', 'Texto do parecer', True, True));
		/* String size 100 required */
		array_push($cp, array('$S80', 'p_keyword', 'Palavras-chave (separadas por \';\')', True, True));

		/* String size 100 required */
		array_push($cp, array('$U', 'p_update', '', True, True));

		/* Botao */
		array_push($cp, array('$B8', '', 'Gravar >>>', False, True));

		return ($cp);
	}

	function le($id) {
		$this -> load -> database();
		$sql = "select * from " . $this -> tabela . "
					where id_p = $id";
		$query = $this -> db -> query($sql);
		$row = $query -> row();
		return ($row);
	}

	function mostra($row) {
		$cr = chr(13) . chr(10);
		$tela = '<fieldset><legend>Avaliação ética</legend>';

		/* menu sisdoc_editar */
		$editar = TRUE;
		$excluir = TRUE;
		$tela .= form_menu($row -> id_p, $editar, $excluir);

		$tela .= '<table width="100%" class="tabela00 pad5">';
		$tela .= '<tr><td width="20%"></td><td width="80%"></tr>';
		/* dados */
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('record_id') . '</td>				<td class="tabela01">' . $row -> id_p . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('biblioteca_title') . '</td>	<td class="tabela01">' . $row -> p_descricao . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('biblioteca_context') . '</td>	<td class="tabela01">' . $row -> p_conteudo . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('biblioteca_dictamen') . '</td>		<td class="tabela01">' . $row -> p_pendencia . '</td></tr>' . $cr;
		$tela .= '<tr><td align="right" class="lt0">' . $this -> lang -> line('biblioteca_keyword') . '</td>		<td class="tabela01">' . $row -> p_keyword . '</td></tr>' . $cr;

		$tela .= '</table>';
		$tela .= '</fieldset>';
		return ($tela);
	}

	function row($obj) {
		$obj -> fd = array('id_p', 'p_descricao', 'p_keyword');
		$obj -> lb = array('ID', 'Tipo da pendência', 'Palavras-chave');
		$obj -> mk = array('', 'L', 'L');
		return ($obj);
	}

	function mostra_link($id) {
		$link = base_url('biblioteca/view/' . $id . '/' . checkpost_link($id));
		$link = '<A HREF="' . $link . '" class="link">';
		return ($link);
	}

	function keywords() {
		$sql = "select p_keyword from " . $this -> tabela . " where p_keyword <> ''";
		$query = $this -> db -> query($sql);

		$keys = '';
		$k = array();
		$termos = array();
		foreach ($query->result_array() as $row) {
			/* recupera ID */
			$keys .= trim($row['p_keyword']) . ';';
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
			$link = base_url('biblitoeca/busca/' . $termo);
			$link = '<A HREF="' . $link . '" class="link lt2">';

			$tela .= $link . $termo;
			$tela .= ' (' . $k[$termo] . ')';
			$tela .= '</A><BR>' . chr(13) . chr(10);
		}

		return ($tela);
	}

}
?>
