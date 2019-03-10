<?php

$arr_files = array();
$arr_files[] = 'sp';
$arr_files[] = 'rj';
$arr_files[] = 'pe';

foreach ($arr_files as $estado)
{
	$sFile = '../arquivos/cep_logradouros_'. $estado .'.txt';
	echo 'Arquivo: ' . $sFile . '<br />';
	echo 'Tamanho: ' . filesize($sFile) . '<br />';
	echo 'MD5: ' . md5_file($sFile) . '<br />';
	echo 'Formato: ' . $estado . '@#@' . md5_file($sFile) . '@#@<br />';
	echo "<hr>";
}
exit;
?>