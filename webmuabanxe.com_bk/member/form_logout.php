<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td width="204" height="103" style="padding-left:10px; padding-top:10px; padding-bottom: 5px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="18" align="left" valign="middle" class="text_login" style="padding-left:5px;"><?  
	$ten_dang_nhap = $HTTP_SESSION_VARS['ten_dang_nhap'];
	$ma_dang_nhap = $HTTP_SESSION_VARS['ma_dang_nhap'];
	echo "Welcome: <b>$ten_dang_nhap</b>"; ?></td>
  </tr>
  <?
	//$recruit=gia_tri_mot_cot("tb_bac_1","trang",49,"ma_bac_1");
	$member=gia_tri_mot_cot("tb_bac_1","trang",49,"ma_bac_1");
	
	$query_catalog = "Select * FROM  tb_bac_2 where (ma_bac_1=$member) and trang in ('52','53','54','56','14') and activate=1 and activate_setup=1 order by thu_tu ASC ";
	$result_catalog = mysql_query($query_catalog);
	while($rs_catalog= mysql_fetch_array($result_catalog))
	{
	$ma_bac_2=$rs_catalog["ma_bac_2"];
	$ten=$rs_catalog["ten_$lg"];
	$link="<b><a href=\"./?Bcat=$ma_bac_2&lg=$lg&start=$start\"> - $ten</a></b>";
     ?>
  <tr>
    <td height="18" align="left" valign="middle" class="text_login" style="padding-left: 10px;"><?=$link?></td>
  </tr>
  <? } ?>
</table></td></tr></table>