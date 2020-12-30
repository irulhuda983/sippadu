<%@ page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*, java.util.*" errorPage="" %>
<%@ include file="../conn.jsp"%>
<html>
<head>
<script language="JavaScript" src="scroll.dflt.js"></script>
<script>
	var n_id = document.location.search.substr(1);
	document.write("<link rel='stylesheet' href='scroll" + n_id + ".css'>")
</script>
<%
out.print("<script language=\"javascript\">\n");
out.print("var LOOK = {\n");
	// scroller box size: [width, height]
out.print("	'size': [511, 72]\n");
out.print("},\n");

out.print("BEHAVE = {\n");
	// autoscroll - true, on-demand - false
out.print("	'auto': true,\n");
	// vertical - true, horizontal - false
out.print("	'vertical': true,\n");
	// scrolling speed, pixels per 40 milliseconds;
	// for auto mode use negative value to reverse scrolling direction
out.print("	'speed': 2\n");
out.print("},\n");

// a data to build scroll window content");

int id = 0, jml = 0, x = 0;
sql ="SELECT id FROM tb_opini WHERE publish ='1'";
stmt = conn.prepareStatement(sql);
rs = stmt.executeQuery();
rs.next();
id = rs.getInt("id");
rs.close();
stmt.close();

sql ="SELECT COUNT(id) AS jumlah FROM tb_saran WHERE id ="+ id +" AND publish ='1'";
stmt = conn.prepareStatement(sql);
rs = stmt.executeQuery();
rs.next();
jml = rs.getInt("jumlah");
rs.close();
stmt.close();

if(jml != 0)
{ 
//	sql ="SELECT * FROM tb_saran WHERE id ="+ id +" AND publish ='1'";
	sql ="SELECT * FROM tb_saran WHERE id ="+ id;
	stmt = conn.prepareStatement(sql);
	rs = stmt.executeQuery();
	
	out.print("ITEMS = [\n");
	while(rs.next())
	{	
		x++;
		out.print("{\n");
		out.print("	'file': '',\n");
		out.print("	'content': '<strong>"+rs.getString("PENGIRIM")+"</strong>, <font color=\"#006699\">"+rs.getString("EMAILNYA")+"</font><br>\" "+rs.getString("KOMENTAR")+" \"',\n");
		out.print("	'pause_b': 3,\n");
		out.print("	'pause_a': 0\n");
		out.print("}\n");
		if(x < jml) 
			out.print(",");
	}
	out.print("]\n");
}else{
out.print("ITEMS = [");
out.print("{");
out.print("	'file': '',");
out.print("	'content': '',");
out.print("	'pause_b': 3,");
out.print("	'pause_a': 0");
out.print("}");
out.print("]");
}
out.print("</script>\n");
rs.close();
stmt.close();
conn.close();
%>
</head>

<body class="Back" onLoad="init()">
<div id=mn style="visibility:hidden;position:absolute;top:0;left:0;width:100%"><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td class="ItemBody" id=mnc></td></tr></table></div>
<script language="JavaScript">
function getElem(div) {
	return document.getElementById ? document.getElementById(div) : document.all[div]
}

var auto = BEHAVE.auto,
vertical = BEHAVE.vertical,
items = ITEMS,
o_up = new Image(16,16),
o_dn = new Image(16,16),
o_class = DEFAULT.clas,
o_container = parent.document.getElementById ? parent.document.getElementById("Tscr" + n_id) : parent.document.all["Tscr" + n_id],
w = LOOK.size[0] ? LOOK.size[0] : DEFAULT.size[0],
h = LOOK.size[1] ? LOOK.size[1] : DEFAULT.size[1],
n_wheight = vertical ? h : w,
n_step = BEHAVE.speed != 0 ? BEHAVE.speed : 1,
n_timeout=n_interval = n_pos = n_cur = prior = 0, 
n_astep = Math.abs(n_step),
n_num = items.length;
main = getElem('mn');
o_cont = getElem('mnc');
o_container.style.width = w + 'px';
o_container.style.height = h + 'px';

if (!auto) {	
	o_up.src = LOOK.up ? LOOK.up : DEFAULT.up;
  o_dn.src = LOOK.dn ? LOOK.dn : DEFAULT.dn;
	document.write("<div id=aup class=" + o_class.aup + " style=position:absolute;z-index:1><img src=" + o_up.src + "></div><div id=adn class=" + o_class.adn + " style=position:absolute;z-index:1><img src=" + o_dn.src + "></div>");
	arrup = getElem("aup")
	arrdn = getElem("adn")
}
// ------------------------------------------------------------
// initialize items array - waiting for each to load completely
// ------------------------------------------------------------
for (var i in items) {
	if (items[i].file) 
		document.write("<iframe style=\"visibility:hidden\" height=0 width=0 src=\"" + items[i].file + "\"></iframe>")
	items[i].supply = supp;
}

function init(n_2measure) {
	var b_fl = true, e_frm, k = 0, i;
	if (n_2measure != null)
		items[n_2measure].height = vertical ? o_cont.offsetHeight : o_cont.offsetWidth;
	for (i = n_num - 1; i >= 0; i--) if (!items[i].height) {
		if (items[i].content)	{
			o_cont.innerHTML = items[i].content;
			return setTimeout("init(" + i + ")", 100);
		}
		else if (items[i].file) {	
			e_frm = window.frames[k++];
			if (e_frm.document.body) items[i].content = e_frm.document.body.innerHTML	
		}
		b_fl = false;
 	}
	if (!b_fl) return setTimeout("init()", 100)
	main.style.visibility='visible';
	if (auto) move(0)
}

// user control methods assigning
if (auto) {	
	document.body.onmouseover = function () { stop(1) }
	document.body.onmouseout = function () { move(1) }
}
else {
	arrup.onmouseover = function () { 
		n_step = -n_astep; 
		move(1) 
	}
	arrdn.onmouseover = function () { 
		n_step = n_astep; 
		move(1) 
	}
	arrdn.onmouseout = arrup.onmouseout = function () { 
		n_pos += n_step
		stop(1)
	}
}

// internal control methods
function move(p) { 
	if (prior <= p && n_interval == 0) {	
		prior = 0
		n_interval = setInterval("roll()", 40) 
	}
} 
function stop(p) { 
	if (prior < p) prior = p
	if (n_timeout != 0) {
		clearTimeout(n_timeout)
		n_timeout = 0
	}
	if (n_interval != 0) {
		clearInterval(n_interval)
		n_interval = 0
	}
}
var ajust = vertical ? 
	function () { main.style.top = n_pos } :
	function () { main.style.left = n_pos }

function sleep(delay) { 
	stop(0); 
	n_timeout=setTimeout("move_s()", delay * 1000) 
}
	function move_s() {
		n_pos -= n_step
		ajust() 
		move(0)
		}

function roll() {	
	var item = items[n_cur];
	if (n_pos > n_wheight) {
		item = items[n_cur = n_cur == 0 ? n_num - 1 : n_cur - 1]
		n_pos = -item.height
		item.supply()
	}
	else if (n_pos < - item.height) {
		item = items[n_cur = n_cur == n_num - 1 ? 0 : n_cur + 1]
		n_pos = n_wheight
		item.supply()
	}
	var delta = n_wheight - item.height
	if (item.pause_a > 0 && n_pos >= delta && n_pos < n_astep + delta) {
		n_pos = delta
		ajust()
		return sleep (item.pause_a)
	}
	if (item.pause_b > 0 && n_pos >= 0 && n_pos < n_astep) {
		n_pos = 0
		ajust()
		return sleep (item.pause_b)
	}
	n_pos -= n_step
	ajust() 
}

function supp () {
	o_cont.innerHTML = this.content
	ajust()
}
</script>
</body>
</html>
