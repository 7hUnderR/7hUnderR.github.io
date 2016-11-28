<?
	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",24,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$rs= mysql_fetch_array($result);
	$num = mysql_num_rows($result);
	$banner="";
	$width="600";
	$height="60";
	if($num>0)
	{
		if($rs["type"]==0)
			{
			if($rs["mo_ta_$lg"]!="") 
			  { 
			   $link_banner="<a href=\"".$rs["mo_ta_$lg"]."\" target=\"".$rs["target_$lg"]."\" >"; 
			   $link_end="</a>";
			  }
			else 
			  { 
			   $link_banner=""; 
			   $link_end="";
			  }
			if($lg=="vn")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho]\" border=0 width=\"$width\" height=\"$height\">$link_end";
			if($lg=="eg")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh]\" border=0 width=\"$width\" height=\"$height\">$link_end";
			if($lg=="kr")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho_1]\" border=0  width=\"$width\" height=\"$height\">$link_end";
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
		}
		
		if(strstr($banner,".swf") || strstr($banner,".SWF"))
		{
		?>
		<script src="js/ActiveX_Template.js" language="javascript"></script>
		<script> insert_flash( "<?=$banner?>" , "<?=$width?>" , "<?=$height?>"); </script>
		<? } else  echo "$banner"; ?>