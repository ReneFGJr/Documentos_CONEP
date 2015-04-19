<?
/*
 * @parameter $file_path
 * @parameter $file_name
 * @parameter $ctype
 */
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
//header('Content-Length: $len');
header('Content-Transfer-Encoding: none');
header("Content-Type: $ctype");
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header("Content-type: application-download");
header("Content-Transfer-Encoding: binary");
readfile($file_path);
?>