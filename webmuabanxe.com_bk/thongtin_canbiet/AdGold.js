//----------------------------
    document.write('<table border="0" cellpadding="0" cellspacing="0" width="100%">');
	try
	{
	    if (typeof vGoldBuy != "undefined")
	    	document.write('<tr><td>&nbsp;&nbsp;Mua</td><td>&nbsp;' + vGoldBuy + '</td></tr>');
	    if (typeof vGoldSell != "undefined")
	    	document.write('<tr><td>&nbsp;&nbsp;Bán</td><td>&nbsp;' + vGoldSell + '</td></tr>');
	}
	catch (error)
	{
	    document.write('<tr><td colspan="2" class="source"><a href="http://www.fpt.vn">http://www.fpt.vn</a></td></tr>');
	}
	document.write('<tr><td colspan="2" class="source"><i>(Nguồn: Cty SJC Hà Nội)</i></td></tr>');
	document.write('</table>');
