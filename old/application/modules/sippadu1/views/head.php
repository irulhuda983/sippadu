		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $site_title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>SIPPADU - System Layanan Perijinan Terpadu Bojonegoro</title>
		<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/images/favicon.png" rel="SHORTCUT ICON"></link>
		<link href="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/Master.css" rel="stylesheet" type="text/css">


		<!--<script language="javascript" type="text/javascript">
			var message="-";
			function clickIE()
			{
				if (document.all) 
				{(message);return false;}
			}
			function clickNS(e) 
			{
				if(document.layers||(document.getElementById&&!document.all)) 
				{if (e.which==2||e.which==3) {(message);return false;}}
			}

			if (document.layers)
			{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
			else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
			document.oncontextmenu=new Function("return false")
		</script>-->
       
	   
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
		//$('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
		
		function popup_tdp(url){
			var kode = $("#op_bentuk_perusahaan").find('option:selected').val();
			var kbli = $("#kbli").val();
			myWindow=window.open (url + "/" + kode + "/" + kbli,",","menubar=1,resizable=1,width=800,height=700,status=1,screenx=0,screeny=0,scrollbars=1");
		}
		
		</script>
		
		
		
		<!-- SIPPADU -->
		
		
		<script language="javascript" type="text/javascript">


		var scroll_to;
		var sc_step = 1;
		var sc_interval_ms = 25;

		function startScrollDown(if_name) {
			scroll_to = setInterval(if_name +'.scrollBy(0, sc_step);', sc_interval_ms)
		}

		function startScrollUp(if_name) {
			scroll_to = setInterval(if_name +'.scrollBy(0, -sc_step);', sc_interval_ms)
		}

		function stopScroll() {
			clearInterval( scroll_to );
		}

		function MM_callJS(jsStr) { //v2.0
		  return eval(jsStr)
		}

		</script>
		<style type="text/css">
		body {
			background-image: url(../images/bg.jpg);
			background-repeat: repeat-x;
		}
		a:link {
			text-decoration: none;
			color: #FFFFFF;
		}
		a:visited {
			text-decoration: none;
			color: #FFFFFF;
		}
		a:hover {
			text-decoration: none;
		}
		a:active {
			text-decoration: none;
			color: #FFFFFF;
		}
		.style1 {
		font-size: 10pt; font-family: Questrial, Geneva, Arial, Helvetica, sans-serif; color:#FFFFFF;
		}
		.style11 {font-size: 10pt; font-family: Questrial, Geneva, Arial, Helvetica, sans-serif; color: #FFFFFF; }
		.style15 {font-size: 12px; font-family: Questrial, Geneva, Arial, Helvetica, sans-serif; color: #FFFFFF; }
		.path1 {
			font-size: 9pt;
			font-family: Questrial, Geneva, Arial, Helvetica, sans-serif;
			color: #FFFF00;
		}
		#dropmenudiv{
		position:absolute;
		border:1px solid #FFFFFF;
		border-bottom-width: 0;
		font:normal 11px Questrial, Verdana;
		line-height:18px;
		z-index:100;
		}

		#dropmenudiv a{
		width: 100%;
		display: block;
		text-indent: 3px;
		border-bottom: 1px solid #FFFFFF;
		padding: 2px 0;
		text-decoration: none;
		}

		#dropmenudiv a:hover{ /*hover background color*/
		background-color: #666666;
		}
		</style>
		<script type="text/javascript">
				
		var menuwidth='165px' //default menu width
		var menubgcolor='#0075BD'  //menu bgcolor
		var disappeardelay=500  //menu disappear speed onMouseout (in miliseconds)
		var hidemenu_onclick="yes" //hide menu when user clicks within menu?

		/////No further editting needed

		var ie4=document.all
		var ns6=document.getElementById&&!document.all

		if (ie4||ns6)
		document.write('<div id="dropmenudiv" style="visibility:hidden;width:'+menuwidth+';background-color:'+menubgcolor+'" onMouseover="clearhidemenu()" onMouseout="dynamichide(event)"></div>')

		function getposOffset(what, offsettype){
		var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
		var parentEl=what.offsetParent;
		while (parentEl!=null){
		totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
		parentEl=parentEl.offsetParent;
		}
		return totaloffset;
		}

		function showhide(obj, e, visible, hidden, menuwidth){
		if (ie4||ns6)
		dropmenuobj.style.left=dropmenuobj.style.top="-500px";
		if (menuwidth!=""){
		dropmenuobj.widthobj=dropmenuobj.style
		dropmenuobj.widthobj.width=menuwidth
		}
		if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover")
		obj.visibility=visible
		else if (e.type=="click")
		obj.visibility=hidden
		}

		function iecompattest(){
		return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
		}

		function clearbrowseredge(obj, whichedge){
		var edgeoffset=0
		if (whichedge=="rightedge"){
		var windowedge=ie4 && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-15 : window.pageXOffset+window.innerWidth-15
		dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
		if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
		edgeoffset=dropmenuobj.contentmeasure-obj.offsetWidth
		}
		else{
		var topedge=ie4 && !window.opera? iecompattest().scrollTop : window.pageYOffset
		var windowedge=ie4 && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
		dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
		if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure){ //move up?
		edgeoffset=dropmenuobj.contentmeasure+obj.offsetHeight
		if ((dropmenuobj.y-topedge)<dropmenuobj.contentmeasure) //up no good either?
		edgeoffset=dropmenuobj.y+obj.offsetHeight-topedge
		}
		}
		return edgeoffset
		}

		function populatemenu(what){
		if (ie4||ns6)
		dropmenuobj.innerHTML=what.join("")
		}

		function dropdownmenu(obj, e, menucontents, menuwidth){
		if (window.event) event.cancelBubble=true
		else if (e.stopPropagation) e.stopPropagation()
		clearhidemenu()
		dropmenuobj=document.getElementById? document.getElementById("dropmenudiv") : dropmenudiv
		populatemenu(menucontents)

		if (ie4||ns6){
		showhide(dropmenuobj.style, e, "visible", "hidden", menuwidth)

		dropmenuobj.x=getposOffset(obj, "left")
		dropmenuobj.y=getposOffset(obj, "top")
		//dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+"px"
		//dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+obj.offsetHeight+"px"
		dropmenuobj.style.left=dropmenuobj.x+0+clearbrowseredge(obj, "rightedge")+"px"
		dropmenuobj.style.top=dropmenuobj.y+5-clearbrowseredge(obj, "bottomedge")+obj.offsetHeight+"px"
		}

		return clickreturnvalue()
		}

		function clickreturnvalue(){
		if (ie4||ns6) return false
		else return true
		}

		function contains_ns6(a, b) {
		while (b.parentNode)
		if ((b = b.parentNode) == a)
		return true;
		return false;
		}

		function dynamichide(e){
		if (ie4&&!dropmenuobj.contains(e.toElement))
		delayhidemenu()
		else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
		delayhidemenu()
		}

		function hidemenu(e){
		if (typeof dropmenuobj!="undefined"){
		if (ie4||ns6)
		dropmenuobj.style.visibility="hidden"
		}
		}

		function delayhidemenu(){
		if (ie4||ns6)
		delayhide=setTimeout("hidemenu()",disappeardelay)
		}

		function clearhidemenu(){
		if (typeof delayhide!="undefined")
		clearTimeout(delayhide)
		}

		if (hidemenu_onclick=="yes")
		document.onclick=hidemenu

		</script>
		
		
		