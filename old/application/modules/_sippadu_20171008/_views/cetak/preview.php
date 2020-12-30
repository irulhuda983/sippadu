<?php

if($path!=''){
	//$file = "asset/file/transparansi/".$file;
	header('Content-type: application/pdf');
	header('Content-Disposition: inline; filename="'.$filename.'.html"');
	header('Content-Length: ' . filesize($path));
	ob_clean();
	flush();
	readfile($path);
	exit;
	unlink($path);
}
else{
	echo '<center>Ups, file tidak ditemukan</center>';
}
?>
