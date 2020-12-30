<?php

if($filename!=''){
	$file = './assets/'.config('main_site').'/files/dokumen/'.$filename;
	if(file_exists($file) and is_file($file)){
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="view.php"');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
	else{
		echo 'File tidak ditemukan atau sudah terhapus';
	}
}
else{
	echo '<center>Ups, file tidak ada dalam database</center>';
}
?>
