<?
 $trang_here=23;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
 if($lg=="vn")
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
else
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
?>
<table class="block_5_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_5_title"><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");?></td>
		  </tr>
		  <tr>
			<td valign="top" class="block_5_center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<?
	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",$trang_here,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$banner="";
	$width=" width=\"99\" ";
	$height="79";
	$i=0;
	while($rs= mysql_fetch_array($result))
	{
		if($rs["type"]==0)
			{
			if($rs["mo_ta_$lg"]!="") 
			  { 
			   $link_banner="<a href=\"".$rs["mo_ta_$lg"]."\">"; 
			   $link_end="</a>";
			  }
			else 
			  { 
			   $link_banner=""; 
			   $link_end="";
			  }
			if($lg=="vn")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho]\" border=0 $width $height>$link_end";
			if($lg=="eg")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh]\" border=0 $width $height>$link_end";
			if($lg=="kr")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho_1]\" border=0 $width $height>$link_end";
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
	$ten="$link_banner".$rs["ten_$lg"]."$link_end";
	$i++;
	  ?>
<td align="center" valign="top" style="padding-bottom: 0px;"><? if(strstr($banner,".swf"))
	  {
	$width="99";
	$height="79";
    ?>
	<script> insert_flash( "<?=$banner?>" , "<?=$width?>" , "<?=$height?>"); </script>
	<?
	}else
	echo $banner;
	?></td>
	 <? 
	  if($i==2)
	  {
	   echo"</tr>"; 
	  $i=0;
	  }
	  }
	?>
	  </tr>
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
