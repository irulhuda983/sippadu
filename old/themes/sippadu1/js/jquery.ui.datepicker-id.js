/* Indonesian initialisation for the jQuery UI date picker plugin. */
/* Written by Wawan Setyawan <wakuadratn@gmail.com> */
jQuery(function($){
  $.datepicker.regional['id'] = {
		closeText: 'Selesai',
		prevText: 'Sebelumnya',
		nextText: 'Selanjutnya',
		currentText: 'Hari Ini',
		monthNames: ['Januari','Februari','Maret','April','Mei','Juni',
		'Juli','Agustus','September','Oktober','November','December'],
		monthNamesShort: ['Jan.','Feb.','Mar.','Apr.','Mei','Juni',
		'Juli','Agst.','Sept.','Okt.','Nov.','Des.'],
		dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
		dayNamesShort: ['Ming.','Sen.','Sel.','Rab.','Kam.','Jum.','Sab.'],
		dayNamesMin: ['M','S','S','R','K','J','S'],
		weekHeader: 'Ming.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['id']);
});