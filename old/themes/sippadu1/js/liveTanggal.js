// JavaScript Document
var tanggalLengkap = " ";
var namaHari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namaHari = namaHari.split(" ");
var namaBulan = ("Januari Pebruari Maret April Mei Juni Juli Agustus September Oktober Nopember Desember");
namaBulan = namaBulan.split(" ");
var tgl = new Date();
tanggalLengkap = namaHari[tgl.getDay()]+", "+tgl.getDate()+" "+namaBulan[tgl.getMonth()]+" "+tgl.getYear();
document.write(tanggalLengkap);