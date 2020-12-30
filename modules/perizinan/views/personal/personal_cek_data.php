<?php 
$hasil = alert('success','Data belum tersedia. Silakan lanjutkan pengisian form');
if($data->num_rows() > 0){
	$hasil = alert('error',$data->num_rows().' data ditemukan dengan nomor '.$kitas.'. Silakan isi dengan lengkap');
	if($data->num_rows() == 1){
		//$hasil = alert('error','Nomor identitas '.$kitas.' sudah tersedia!<br/> Nama : '.$nmpelanggan.'. ID Pelanggan : <b>'.$idpelanggan.'</b>. Jika identitas tersebut belum terintegrasi dengan akun anda, silakan lakukan klaim data di Menu "Klaim Data"');
		$hasil = alert('error','Nomor identitas '.$kitas.' sudah tersedia!<br/> Jika identitas tersebut belum terintegrasi dengan akun anda, silakan lakukan klaim data di Menu "Klaim Data"');
	}
}
echo $hasil;
?>