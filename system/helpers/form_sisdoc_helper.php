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

if ( ! function_exists('form_edit'))
{
	function form_edit($cp=array(),$tabela)
		{
			global $id;
			
			$tela = '';			
			$tela .= '<table class="tabela00" width="100%" border=0 >';
			$tela .= '<tr><td>'.form_open().'</td></tr>';
						
			for ($r=0;$r < count($cp);$r++)
				{
					$tela .= form_field($cp[$r]);
				}
			$tela .= '</table>';
			$tela .= form_close();
			
			return($tela);
		}
	/* Formulário */
	function form_field($cp)
		{
			global $dd, $ddi;
			/* Zera tela */
			$tela = '';
			
			$table = 1;
			if (!(isset($dd))) { $dd = array(); $ddi=0; }
			
			$type = $cp[0];
			$label = $cp[2];
			$required = $cp[3];
			$placeholder = $label;
			$readonly = $cp[4];		
			
			
			$tt = substr($type,1,1);
			$max = 100;
			$size = 100;
			$dados = array();	
			$dn = 'dd'.$ddi;
			$vlr = '';
			
			if ($table == 1)
				{
					$td = '<td>';
					$tdl = '<td align="right">';
					$tdn = '</td>';
					
					$tr = '<tr>';
					$trn = '</tr>';		
				} else {
					$td = '';
					$tdl = '';
					$tdn = '';
					$tr = '';
					$trn = '';
				}
			
			//$dados = array('name'=>'dd'.$ddi, 'id'=>'dd'.$ddi,'value='.$dd[$ddi],'maxlenght'=>$max,'size'=>$size,$class=>'');
			
			switch ($tt)
				{
				case 'S':
					/* TR da tabela */
					$tela .= $tr;
					
					/* label */
					if (strlen($label) > 0)
						{
							$tela .= $tdl.$label.' ';
						}
					if ($required == 1) { $tela .= ' <font color="red">*</font> '; }
					
					$dados = array('name'=>$dn,'id'=>$dn,'value'=>$vlr,'maxlenght'=>$max,'size'=>$size,'placeholder'=>$label,'class'=>'form_string');
					if ($readonly == false) { $dados['readonly'] = 'readonly'; }
					$tela .= $td.form_input($dados);
					$tela .= $tdn . $trn;
					break;
				case 'P':
					if (strlen($label) > 0)
						{
							$tela .= $label.' ';
						}
					$dados = array('name'=>$dn,'id'=>$dn,'value'=>$vlr,'maxlenght'=>$max,'size'=>$size);
					$tela .= form_password($dados);
					break;					
				case 'B':
					$tela .= $tr . $tdl . $td;
					$dados = array('name'=>'acao','id'=>'acao','value'=> $label);
					$tela .= form_submit($dados);
					$tela .= $tdn . $trn;
					break;
				}
			$ddi++;
			return($tela);
		}
}
?>