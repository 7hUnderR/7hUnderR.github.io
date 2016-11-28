  	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td valign="top"><IMG height=8 src="images/spacer.gif"></td>
      </tr>
    </table>
  <table width="735" border="0" cellpadding="0" cellspacing="0" class="block_5_center">
  <tr>
    <td height="27" valign="top" class="block_5_bottom" ><table class="block_5_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td colspan=2 class="tab_8_8_8_8"><?
 $query_1 = "Select ma_bac_1,activate,thu_tu,trang,mo_ta_$lg, ten_$lg FROM  tb_bac_1 where trang in ('81') and activate=1 ORDER BY thu_tu ASC ";
 $result_1 = mysql_query($query_1);
 while($rs_1 = mysql_fetch_array($result_1))
 {
 $ma_bac_1 = $rs_1["ma_bac_1"];
 $ten_catalog = $rs_1["ten_$lg"];
 
 $table="tb_news";
 $query2 = "Select * FROM  $table where ma_bac_1=$ma_bac_1 and banner!=1 and activate=1 and ngoai_index = 1  ORDER BY thu_tu DESC LIMIT 0, 10";
 $result2 = mysql_query($query2);
 $num = mysql_num_rows($result2);
 if($num>0)
 {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="20" class="tieu_de border_b"><a href="./?Acat=<?=$ma_bac_1?>&lg=<?=$lg?>&start=0"><?=$ten_catalog;?></a></td>
	  </tr>
</table>
<?
  while($rs= mysql_fetch_array($result2))
  {
  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 class=border_images style=\"float:left ; margin-right: 5px; \"></a>";
  else
  $anh="";
  
  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
  $ghi_chu=$rs["ghi_chu_$lg"];
  $ngay="<span class=travellink>".$rs["ngay"]."</span>";
  $more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/button_xemtiep.gif\" border=0 ></a></span>";

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left" valign="top" style="padding-top: 5px;" class="tieu_de_tin"><?=$ten?></td>
	  </tr>
	<tr>
	  <td align="left" valign="top" style="padding-top: 5px;">
	 <?=$anh?>
	 <?=$ghi_chu?></td>
	</tr>
	</table>
	  <? ?></td>
	</tr>
	  <tr>
		<td height="10">&nbsp;</td>
	  </tr>
	<? } ?>
  </table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" class="border_b_index">&nbsp;</td>
  </tr>
</table>
<? }} ?></td>
		  </tr>
</table></td>
  </tr>
</table>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td valign="top"><IMG height=8 src="images/spacer.gif"></td>
      </tr>
    </table>
