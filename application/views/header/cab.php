<?php
$this->load->helper('url');
date_default_timezone_set('UTC');
//$this->load->helper('sisdoc_form');

$title = 'CONEP/CEP - PUCPR - Sistemas de Documentos';

$user_nome = 'não logado';
$user_tipo = 'usuário';

/* Header */
$cr = chr(13) . chr(10);
echo '<!---- Header ---->'.$cr;
echo '<head>' . $cr;
echo '<title>'.$title.'</title>'.$cr;
echo '<link rel="shortcut icon" type="image/x-icon" href="'.base_url('favicon.ico').'" />'.$cr;
echo '<link rel="STYLESHEET" href="'.base_url('css/prj_style.css').'">'.$cr;
echo '<link rel="STYLESHEET" href="'.base_url('css/fonts_cicpg.css').'">'.$cr;
echo '<link rel="STYLESHEET" href="'.base_url('css/fonts_roboto.css').'">'.$cr;
echo '<link rel="STYLESHEET" href="'.base_url('css/scheme_default.css').'">'.$cr;

echo '<script type="text/javascript" src="'.base_url('js/jquery.js').'"></script>'.$cr;

echo '</head>'.$cr;
?>
<div id="cab">
	<div id="cab_name">
		<?php echo $title;?>
	</div>
	<div id="show_user">
		<div id="show_user_image"></div>
		<span class="user_name lt2"><?php echo $user_nome;?></span>
		<BR>
		<span class="user_perfil"><font class="lt1"><?php echo $user_tipo;?></font></span>
	</div>
</div>