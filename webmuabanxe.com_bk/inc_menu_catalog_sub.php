	<?
	$query_catalog = "Select * FROM  tb_bac_2 where ma_bac_1=$cat and activate=1 and activate_setup=1 and trang!=24 order by thu_tu ASC ";
	$result_catalog = mysql_query($query_catalog);
	$num_menu_catalog = mysql_num_rows($result_catalog);
	$num = mysql_num_rows($result_catalog);
	if($num>0){
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	
	  <td align="left" valign="middle" class="table_newscat text_def" style="padding-left: 8px;"><a href="./?lg=<?=$lg?>"><img alt="" src="styles/<?=$style_path?>/home.png" align="absmiddle" border="0"></a> <? 
	while($rs_catalog= mysql_fetch_array($result_catalog))
	{ 
	$ten_catalog_s=$rs_catalog["ten_$lg"];
	$ten = chuan_ten($rs_catalog["ten_$lg"]);
	$ma_bac_2_catalog=$rs_catalog["ma_bac_2"];
    $link_sub=" <img hspace=\"5\" src=\"styles/$style_path/bg_newscat_sep.png\" align=\"absmiddle\"> <a href=\"./?$ten&Bcat=$ma_bac_2_catalog&lg=$lg&start=0\">$ten_catalog_s</a>";
	 echo $link_sub;
	 } 
	 ?>   </td>
  </tr>
  </table>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td ><img height=8 src="images/spacer.gif"></td>
	  </tr>
	</table>
<? } ?>
