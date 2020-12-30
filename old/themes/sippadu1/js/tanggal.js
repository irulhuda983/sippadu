// JavaScript Document

function tanggalPembahasan(tgl)
{
	if(tgl != '-') {
		var namaBulan = new Array("Januari", "Pebruari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
	//	var namaBulan = new Array("Desember", "Januari", "Pebruari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Nopember");
		var namaHari = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumaat", "Sabtu");
		var tanggal = tgl.substr(0,2);
		if(tanggal == "01") tanggal = 1;
		if(tanggal == "02") tanggal = 2;
		if(tanggal == "03") tanggal = 3;
		if(tanggal == "04") tanggal = 4;
		if(tanggal == "05") tanggal = 5;
		if(tanggal == "06") tanggal = 6;
		if(tanggal == "07") tanggal = 7;
		if(tanggal == "08") tanggal = 8;
		if(tanggal == "09") tanggal = 9;
	
		var bulan = tgl.substr(3,2);
		if(bulan == "01") bulan = 1;
		if(bulan == "02") bulan = 2;
		if(bulan == "03") bulan = 3;
		if(bulan == "04") bulan = 4;
		if(bulan == "05") bulan = 5;
		if(bulan == "06") bulan = 6;
		if(bulan == "07") bulan = 7;
		if(bulan == "08") bulan = 8;
		if(bulan == "09") bulan = 9;
		
		var tahun = tgl.substr(6,4);
		var Xtgl = new Date(tahun, (bulan-1), tanggal);
		tgl = namaHari[Xtgl.getDay()]+", "+tanggal+" "+namaBulan[bulan-1]+" "+tahun;
	}
	return tgl;
};