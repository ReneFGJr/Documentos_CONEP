<?php
class geds extends CI_model {
	function le($id) {
		$this -> load -> database();
		$sql = "select * from " . $this -> tabela . "
					inner join " . $this -> tabela_type . " on dg_documento = id_doc  
					where id_dg = $id";
		$query = $this -> db -> query($sql);
		$row = $query -> row();
		return ($row);
	}
	
	function save($data)
		{
			echo 'SAVED';
		}
	
	function cp()
		{
			$cp = array();
			array_push($cp,array('$H8','id_doc','',False,True));
			/* String size 100 required */
			array_push($cp,array('$S100','doc_descreicao','Descrição do documento',True,True));
			/* String size 100 required */
			array_push($cp,array('$S100','doc_folder','Pasta de armazenamento',True,True));
			
			/* Botao */
			array_push($cp,array('$B8','','Gravar >>>',False,True));

			return($cp);
		}

	/* Prepara dados */
	function prepara($row) {
		$data = array();

		$file_name = $row -> dg_local;
		$extensao = $this -> file_extensao($file_name);
		$ctype = $this -> extension_code($extensao);
		$file_path = $row->doc_folder;
		$filename = trim($row->dg_descricao).'.'.$extensao;
		$qc = array('/',':');
		$qt = array('-','-');
		$filename =  str_replace($qc, $qt, $filename);

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
