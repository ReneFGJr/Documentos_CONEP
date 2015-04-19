<?php
class documentos extends CI_model {
	var $tabela = "documentos";
	var $tabela_docs = "documentos_ged";
	
	function list_all_documents($tipo = '', $status = 1) {
		$this -> load -> database();
		$sql = "select * from " . $this -> tabela_docs . " 
					where dg_documento = '$tipo'
					and dg_status = $status 
					order by dg_ano desc ";
		$query = $this -> db -> query($sql);

		$sx = '<table width="96%" align="center">';
		$sx .= '<TR><thead>
					<TH width="5%">Nr. Doc</TH>
					<TH width="75%">Descrição</TH>
					<TH width="15%">Data</TH>
					<TH width="5%">Ano</TH>
				</thead>
				</TR>';
		foreach ($query->result() as $row) {
			/* link */
			$link = '<A HREF="' . base_url('ged/download/' . $row -> id_dg) . '" target="new" class="link">';

			$sx .= '<TR>';
			$sx .= '<TD>';
			$sx .= $link;
			$sx .= $row -> dg_nrdoc;
			$sx .= '</A>';
			$sx .= '</TD>';

			$sx .= '<TD>';
			$sx .= $row -> dg_descricao;
			$sx .= '</TD>';

			$sx .= '<TD>';
			$sx .= $row -> dg_data;
			$sx .= '</TD>';

			$sx .= '<TD>';
			$sx .= $row -> dg_ano;
			$sx .= '</TD>';

			$sx .= '</TR>';
			$sx .= chr(13) . chr(10);
		}
		$sx .= '</table>';
		$sx .= 'Total Results: ' . $query -> num_rows();
		return ($sx);
	}

	function monta_lista_documentos($rlt) {

	}

}
?>
