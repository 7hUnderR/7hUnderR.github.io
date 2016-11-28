<?
 $query_1 = "Select ma_bac_1,activate,thu_tu,trang,mo_ta_$lg, ten_$lg FROM  tb_bac_1 where trang in ('3') and activate=1 ORDER BY thu_tu ASC ";
 $result_1 = mysql_query($query_1);
 while($rs_1 = mysql_fetch_array($result_1))
 {
 $ma_bac_1 = $rs_1["ma_bac_1"];
 $ten_catalog = $rs_1["ten_$lg"];
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="30" class="title_center"><a href="./?Acat=<?=$ma_bac_1?>&lg=<?=$lg?>&start=0"><?=$ten_catalog;?></a></td>
	  </tr>
</table>
 <?
 
	$query_nhom = "Select * FROM  tb_bac_2 where ma_bac_1=$ma_bac_1 and activate=1 ORDER BY thu_tu ASC ";
	$result_nhom = mysql_query($query_nhom);
	while($rs_nhom= mysql_fetch_array($result_nhom))
	 { 
 	$tin_tuc = $rs_nhom["ma_bac_2"];
	
 $table="tb_news";
 $query2 = "Select * FROM  $table where ma_bac_2=$tin_tuc and banner!=1 and activate=1 and ngoai_index = 1  ORDER BY thu_tu DESC LIMIT 0, 10";
 $result2 = mysql_query($query2);
 $num = mysql_num_rows($result2);
 if($num>0)
 {
?>
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td class="tab_8_8_8_8" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="30" class="tieu_de"><a href="./?Bcat=<?=$tin_tuc?>&lg=<?=$lg?>&start=0"><?=$rs_nhom["ten_$lg"];?></a></td>
	  </tr>
</table>
<?
  $rs= mysql_fetch_array($result2);
  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 class=border_images style=\"float:left ; margin-right: 5px; margin-top: 5px;\"></a>";
  else
  $anh="";
  
  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
  $ghi_chu=$rs["ghi_chu_$lg"];
   $ngay=$rs["ngay"].", ".$rs["gio"];
  $more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/button_xemtiep.gif\" border=0 ></a></span>";

?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<? if($anh!=""){?><td valign="top"><?=$anh?></td>
				<? } ?>
			    <td width="100%" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <tr>
			    <td width="100%" align="left" valign="middle" class="tieu_de_tin"><?=$ten?></td>
			  </tr>
			  <tr>
			    <td valign="top" class="text_date"><?=$ngay?></td>
		      </tr>
			  <tr>
			    <td valign="top" class="text_def" style="padding-top:5px;"><?=$ghi_chu?></td>
		      </tr>
			</table></td>
			  </tr>
			</table>
			<?
  while($rs= mysql_fetch_array($result2))
  {
  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"styles/$style_path/icon.gif\" border=0 /> ".$rs["ten_$lg"]."</a>";
  $ngay="<span class=travellink>".$rs["ngay"]."</span>";
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left" valign="top" style="padding-top: 5px;" class="more"><?=$ten?></td>
	  </tr>
  </table>
  	<? } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" class="border_b_index">&nbsp;</td>
  </tr>
</table></td></tr>
</table>
<? }} } ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td valign="top"><IMG height=8 src="images/spacer.gif"></td>
      </tr>
    </table>
