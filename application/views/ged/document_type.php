<?php
$this->load->helper('form');

/* Create by http://formigniter.org/app/ */


echo '<h1>Tipos de Documentos</h1>';
/* Formulario */
echo form_open('');
echo form_hidden('id_doc', '');

echo 'Tipo de documento <font class="red">*</font><BR>';

$dados = array('name'        => 'doc_descricao', 	'id'          => 'doc_descricao',
              'value'       => '',					'maxlength'   => '100',
              'size'        => '50',				'style'       => 'width:50%' );
echo form_input($dados);

echo '<BR>';
echo 'Pasta de gravação <font class="red">*</font><BR>';
$dados = array('name'        => 'doc_folder', 	'id'          => 'doc_descricao',
              'value'       => '',					'maxlength'   => '100',
              'size'        => '50',				'style'       => 'width:50%' );
echo form_input($dados);

echo '<BR>';
echo '<BR>';
echo form_submit('acao', 'Gravar!');
echo form_close();
?>