	<table class="block_2_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_2_title"><?=gia_tri_mot_cot("tb_bac_1","trang",3,"mo_ta_$lg");?></td>
		  </tr>
		  <tr>
			<td valign="middle" class="block_2_center">
				<? 
	$ma_sub_newscn = gia_tri_mot_cot("tb_bac_1","trang",3,"ma_bac_1");
	$table="tb_news";
	$query_cn = "Select * FROM  $table where ma_bac_1=$ma_sub_newscn and banner!=1 and activate=1 and ngoai_index = 1 ORDER BY thu_tu DESC LIMIT 0, 10";
	$result_cn = mysql_query($query_cn);
	$num = mysql_num_rows($result_cn);
	$i=0;
	$rs= mysql_fetch_array($result_cn);
	  $i++;
	  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 class=border_images style=\"float:left ; margin-right: 10px; \"></a>";
	  else
	  $anh="";
	  
	  $ten="<b><span class=tieude><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a></span></b>";
	  $ghi_chu=$rs["ghi_chu_$lg"];
	  $ngay="<span class=travellink>".$rs["ngay"]."</span>";
	  /*
	  if($lg=="vn")
		$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Xem chi tiết »</a></span>";
	  else
		$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Detail »</a></span>";
	*/
	$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/button_xemtiep.gif\" border=0 ></a></span>";
	?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="25" valign="middle" class="tab_5_5"><?=$ten?></td>
	  </tr>
	<tr>
	  <td valign="top" class="tab_5_5">
	  <?=$anh?>
	  <?=$ghi_chu?></td>
	</tr>
	<?
	 if($num>1)
	 {
	?>
	<tr>
	  <td height="10" align="left" valign="top" ></td>
	</tr>
	<tr>
	  <td height="20" align="left" valign="top" class="tieu_de tab_5_5"><a href="./?Acat=<?=$ma_sub_newscn?>&lg=<?=$lg?>&start=0"><?=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_sub_newscn,"ten_$lg");?></a></td>
	</tr>
	<?
		while($rs= mysql_fetch_array($result_cn))
		 { 
		  $i++;
		  $ten="<img src=\"images/gif_bullet03.gif\" style=\"margin-bottom:2px;\"> <a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
		  $ngay="<span class=travellink>".$rs["ngay"]."</span>";
	?>
	<tr>
	  <td height="18" align="left" valign="middle" class="more tab_5_5"><? echo"$ten"; ?></td>
	</tr>
	<? } } ?>
	<tr>
	  <td height="5" align="left" valign="middle" ></td>
	</tr>
	</table>

			  
  </td>
		  </tr>
</table>

	
