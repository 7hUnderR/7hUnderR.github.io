	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<? 
	$trang_here=3;
	$ma_sub_newscn = gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"ma_bac_1");
	$table="tb_news";
	$query_cn = "Select * FROM  $table where ma_bac_1=$ma_sub_newscn and banner!=1 and activate=1 and ngoai_index = 1 ORDER BY thu_tu DESC LIMIT 0, 10";
	$result_cn = mysql_query($query_cn);
	$num = mysql_num_rows($result_cn);
	$i=0;
	$rs= mysql_fetch_array($result_cn);
	  $i++;
	  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 class=border_images style=\"float: center;\"></a>";
	  else
	  $anh="";
	  
	  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
	  $ghi_chu=$rs["ghi_chu_$lg"];
	  $ngay="".$rs["ngay"]."";
	  /*
	  if($lg=="vn")
		$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Xem chi tiết »</a></span>";
	  else
		$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Detail »</a></span>";
	*/
	$more="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/button_xemtiep.gif\" border=0 ></a>";
	?>
	<table class="block_1" cellspacing=0 cellpadding=0 
		width="100%" border=0>
		<tbody>
		  <tr>
			<td width="90%"><div class=title><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"ten_$lg");?></div></td>
			<td width="10%"><img 
			id=AdTinTuc style="CURSOR: pointer" 
			onClick=SetViewTableDiv(this.id); alt="" 
			src="styles/<?=$style_path?>/AdImgUp.gif" border=0> </td>
		  </tr>
		  <tr>
			<td colspan=2 class="tab_5_5_5_5 text_def"><div id=AdTinTucLoc style="DISPLAY: block"><table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td valign="middle" class="tieu_de"><?=$ten?></td>
	  </tr>
	<tr>
	  <td height="25" valign="top" align="center" ><?=$anh?></td>
	  </tr>
	<tr>
	  <td valign="top" ><?=$ghi_chu?></td>
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
	<tr>
	  <td height="5" align="left" valign="middle" ></td>
	</tr>
	<tr><td>
	<MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=2 direction=up width="100%" height=80>
	<table width="100%"  border="0" cellpadding="0" cellspacing="0">
	<?
		while($rs= mysql_fetch_array($result_cn))
		 { 
		  $i++;
		  $ten="<img src=\"images/gif_bullet03.gif\" style=\"margin-bottom:2px;\"> <a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
		  $ngay="<span class=travellink>".$rs["ngay"]."</span>";
	?>
	<tr>
	  <td height="18" align="left" valign="middle" class="text_def tab_5_5"><? echo"$ten"; ?></td>
	</tr>
	<? } ?>
    </table></MARQUEE><? ?></td><tr>
	<? } ?>
	</table>
			  </div></td>
		  </tr>
		</tbody>
		</table>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td ><img height=8 alt="" src="images/spacer.gif" width=1></td>
	      </tr>
		</table>
	