<?
 $trang_here=62;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
 if($lg=="vn")
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
else
   $anh=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?
	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",$trang_here,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$banner="";
	$width=" width=\"150\" ";
	$height=" ";
	
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
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho]\" class=\"border_images\" border=1 $width $height>$link_end";
			if($lg=="eg")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh]\" class=\"border_images\" border=1 $width $height>$link_end";
			if($lg=="kr")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho_1]\" class=\"border_images\" border=1 $width $height>$link_end";
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
	  if(strstr($banner,".swf"))
	  {
	$width="150";
	$height="300";
	  ?>
	 <tr>
		<td align="center" valign="top" style="padding-top: 5px;"><script> insert_flash( "<?=$banner?>" , "<?=$width?>" , "<?=$height?>"); </script></td>
     </tr>
	 <?
	  }
	  else
	  {
	  ?>
	   <tr>
		<td align="center" valign="top" style="padding-top: 5px;"><?=$banner?></td>
	  </tr>
	 <? 
	  } 
	 }
	?>
</table>
<? } ?>
