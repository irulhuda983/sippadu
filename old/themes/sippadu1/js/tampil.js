// JavaScript Document
function tampil(x)
{
	var w = 480, h = 340;
	if (document.all || document.layers) 
	{
	   w = screen.availWidth;
	   h = screen.availHeight;
	}
	var popW = 600, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open(x,'popup','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos +', resizable, scrollbars=yes');
}
