	<table class="block_2_top" cellspacing=0 cellpadding=0 width="325" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_2_title"><?=gia_tri_mot_cot("tb_bac_1","trang",3,"mo_ta_$lg");?></td>
		  </tr>
		  <tr>
			<td valign="top" class="block_2_center" height="220">
				<? 
	$ma_sub_newscn = gia_tri_mot_cot("tb_bac_1","trang",3,"ma_bac_1");
	$table="tb_news";
	$query_cn = "Select * FROM  $table where ma_bac_1=$ma_sub_newscn and banner!=1 and activate=1 and ngoai_index = 1 ORDER BY thu_tu DESC LIMIT 0, 10";
	$result_cn = mysql_query($query_cn);
	$num = mysql_num_rows($result_cn);
	$i=0;
	?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="5" align="left" valign="middle"></td>
	</tr>
	<?
		while($rs= mysql_fetch_array($result_cn))
		 { 
		  $i++;
		  $ngay=$rs["ngay"];
		  $ten_link = chuan_ten($rs["ten_$lg"]);
		  $ten="<img src=\"images/gif_bullet03.gif\" align=\"absmiddle\"><a href=\"./?$ten_link&id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."  ($ngay) </a>";
	?>
	<tr>
	  <td height="15" align="left" valign="middle" class="more_menu tab_5_5"><? echo"$ten"; ?></td>
	</tr>
	<? } ?>
	<tr>
	  <td height="8" align="left" valign="middle" ></td>
	</tr>
	</table>

			  
  </td>
		  </tr>
</table>

	
