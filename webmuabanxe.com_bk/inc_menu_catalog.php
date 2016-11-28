	<?
	$query = "Select * FROM  tb_bac_1 where trang in ('82') and activate=1 and activate_setup=1 order by thu_tu ASC ";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	while($rs= mysql_fetch_array($result))
	{
	$ten = chuan_ten($rs["ten_$lg"]);
	$ten_v = $rs["mo_ta_$lg"];
	$ma_bac_1=$rs["ma_bac_1"];
	$query_catalog = "Select * FROM  tb_bac_2 where ma_bac_1=$ma_bac_1 and activate=1 and activate_setup=1 order by thu_tu ASC ";
	$result_catalog = mysql_query($query_catalog);
	$num_menu_catalog = mysql_num_rows($result_catalog);
	$num_2= mysql_num_rows($result_catalog);
	
	//$num_bac_2=dem_max_3dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"activate_setup",1);
	//if($num_bac_2>0)
	 //{ 
	// $ma_bac_2=gia_tri_mot_cot_3dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"activate_setup",1,"ma_bac_2");
	// $link_bac_1="<a href=\"./?Bcat$ma_bac_2&Lg$lg&Start0&$ten\">$ten_v</a>";
	// }
	//else
	  $link_bac_1="<a href=\"./?$ten&Acat=$ma_bac_1&lg=$lg&start=0\">$ten_v</a>";
	?>
<table class="block_1_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_1_title"><?=$link_bac_1;?></td>
		  </tr>
		  <tr>
			<td valign="middle" class="block_1_center">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?
	while($rs_catalog= mysql_fetch_array($result_catalog))
	{
	$ten = chuan_ten($rs_catalog["ten_$lg"]);
	$ten_catalog=$rs_catalog["ten_$lg"];
	$ma_bac_2_catalog=$rs_catalog["ma_bac_2"];
	
	$query_catalog_s = "Select * FROM  tb_bac_3 where ma_bac_2 = $ma_bac_2_catalog and activate=1 and activate_setup=1 order by thu_tu ASC ";
	$result_catalog_s = mysql_query($query_catalog_s);
	$num_bac_3= mysql_num_rows($result_catalog_s);
	
	  $link_bac_2="<a href=\"./?$ten&Bcat=$ma_bac_2_catalog&lg=$lg&start=0\">$ten_catalog</a>";

	if($cat_s==$ma_bac_2_catalog)
	   $class="menu_s_select";
	else
	   $class="menu_s";
	?>
	<tr>
	  <td valign="middle" class="<?=$class?>" ><?=$link_bac_2?></td>
	</tr>
		<? 
	while($rs_catalog_s= mysql_fetch_array($result_catalog_s))
	{ 
	$ten_catalog_s=$rs_catalog_s["ten_$lg"];
	$ten = chuan_ten($rs_catalog_s["ten_$lg"]);
	$ma_bac_3_catalog=$rs_catalog_s["ma_bac_3"];
	if($cat_s_s==$ma_bac_3_catalog)
	   $class_s="menu_s_s_select";
	else
	   $class_s="menu_s_s";
    $link_sub="<a href=\"./?$ten&Ccat=$ma_bac_3_catalog&lg=$lg&start=0\">$ten_catalog_s</a>";
	?>
	
	<tr>
	  <td valign="middle" class="<?=$class_s?>"><?=$link_sub?></td>
  </tr>
  <? } } ?>
  </table>
  
  </td>
		  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>
<? } ?>
