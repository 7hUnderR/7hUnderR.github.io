<?
 $trang_here=22;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
 if($lg=="vn")
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
else
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
?>
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td class="block_6_center">
			
			<table width="100%" border="0" class="block_6_top" cellspacing="0" cellpadding="0">
			 <tr>
			<td valign="middle" height="23" class="tab_8_8 block_6_title"><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		<tr>
		  <td style="padding-top: 0px;" class="block_6_bottom" align="left"><DIV id=ja-col1>
<LINK href="banner_java_move_text/files/template.css" type=text/css rel=stylesheet>
<SCRIPT src="banner_java_move_text/files/mootools.js" type=text/javascript></SCRIPT>
<SCRIPT src="banner_java_move_text/files/mod_ja_catslwi.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
		jaSLWI.expandH = 110;
</SCRIPT>
<?
	$i=0;
	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",$trang_here,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$banner="";
	$width=" width=\"152\" ";
	$height="height=\"150\" ";
	
	while($rs= mysql_fetch_array($result))
	{
		$i++;
		if($rs["type"]==0)
			{
			$link_banner=$rs["mo_ta_$lg"];
			
			if($lg=="vn")
			  $banner="images/photo/news/$rs[anh_nho]";
			if($lg=="eg")
			  $banner="images/photo/news/$rs[anh]";
			if($lg=="kr")
			  $banner="images/photo/news/$rs[anh_nho_1]";
			}
		else
			{
			if($lg=="vn")
			$banner="images/photo/news/$rs[anh_nho]";
			if($lg=="eg")
			$banner="images/photo/news/$rs[anh]";
			if($lg=="kr")
			$banner="images/photo/news/$rs[anh_nho_1]";
		    }
		$ten=$rs["ten_$lg"];
		$ghi_chu=$rs["ghi_chu_$lg"];
	  ?>
		<DIV class=ja-catslwi style="BACKGROUND: url(<?=$banner?>) no-repeat; CURSOR: pointer; HEIGHT: 150px" 
		onclick="location.href='<?=$link_banner;?>'">
		<DIV class=ja-catslwi-container>
		<DIV class=ja-catslwi-text>
		<DIV class=ja-catslwi-content id=ja-catslwi-textbg<?=$i?> style="HEIGHT: 120px; ">
		<SCRIPT type=text/javascript>
					textbg = document.getElementById("ja-catslwi-textbg<?=$i?>");
					textbg.style.opacity = 0.5;
					textbg.style.filter = 'alpha(opacity=50)';
				</SCRIPT>
		</DIV>
		<DIV class=ja-catslwi-display style="COLOR: #ffffff; HEIGHT: 120px">
		<H3><?=$ten?></H3><?=$ghi_chu;?></DIV></DIV></DIV></DIV>
	 <? 
	 }
	?></DIV></DIV></DIV></DIV></td>
	    </tr>
		</table></td>
		  </tr>
</table>
<? } ?>