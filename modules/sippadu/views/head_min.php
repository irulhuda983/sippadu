		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $site_title; ?></title>
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/css/main.min.css">
				
        <script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery-1.8.2.min.js"></script>
		<style>
		input[type="text"].autonumber, input[type="text"].automoney {
			text-align:right;
		}
		/*input[type="text"].upper {
			text-transform:uppercase;
		}*/
		</style>
		<script type='text/javascript'>
		var site_url = "<?php echo site_url(); ?>";
		var fmodule = "<?php echo fmodule(); ?>";
		var copyright_year = "<?php echo config('copyright_year'); ?>";
		checked=false;
		function checkedAll (frm1) {
			var aa= document.getElementById(frm1); 
			if(checked == false){
				checked = true
			}
			else{
				checked = false
			}
			for (var i =0; i < aa.elements.length; i++){ 
				aa.elements[i].checked = checked;
			}
		}
		
		function checkedAll2 (frm1) {
			var aa= document.getElementById('form2'); 
			if(checked == false){
				checked = true
			}
			else{
				checked = false
			}
			for (var i =0; i < aa.elements.length; i++){ 
				aa.elements[i].checked = checked;
			}
		}
		
		function formatAngka(objek) {
			var separator = ".";
			a = objek.value;
			b = a.replace(/[^\d]/g,"");
			//b = a.replace(/[^0-9.]/g,"");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--) {
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)) {
					c = b.substr(i-1,1) + separator + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			objek.value = c;
		}
		
		function formatUang(objek) {
			var separator = ".";
			a = objek.value;
			//b = a.replace(/[^\d]/g,"");
			b = a.replace(/[,;]+/g,"");
			c = "";
			panjang = b.length;
			j = 0;
			for (i = panjang; i > 0; i--) {
				j = j + 1;
				if (((j % 3) == 1) && (j != 1)) {
					c = b.substr(i-1,1) + separator + c;
				} else {
					c = b.substr(i-1,1) + c;
				}
			}
			//e = c.replace(/(\d\d?)$/,',');
			objek.value = c;
		}
		
		function formatMoney(el) {
		  el.value = '$' + el.value.replace(/[^\d]/g,'').replace(/(\d\d?)$/,',$1');
		}

		function selectCopy(el) {
			var body = document.body, range, sel;
			if (document.createRange && window.getSelection) {
				range = document.createRange();
				sel = window.getSelection();
				sel.removeAllRanges();
				try {
					range.selectNodeContents(el);
					sel.addRange(range);
				} catch (e) {
					range.selectNode(el);
					sel.addRange(range);
				}
			} else if (body.createTextRange) {
				range = body.createTextRange();
				range.moveToElementText(el);
				range.select();
			}
			document.execCommand("Copy");
		}
		
		function popup(url){
			myWindow=window.open (url,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_el(url){
			var kode = $("#el").find('option:selected').val();
			myWindow=window.open (url + "/" + kode,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_aa(url){
			var awal = $("#tgl_awal").val();
			var akhir = $("#tgl_akhir").val();
			aw = awal.replace(/[^\d]/g,"-");
			ak = akhir.replace(/[^\d]/g,"-");
			myWindow=window.open (url+ "/" + aw + "/" + ak,"," ,"menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		function popup_tdp(url){
			var kode = $("#op_bentuk_perusahaan").find('option:selected').val();
			var kbli = $("#kbli").val();
			myWindow=window.open (url + "/" + kode + "/" + kbli,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		//$('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
		

		</script>