<?	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",21,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$rs= mysql_fetch_array($result);
	$num = mysql_num_rows($result);
	$banner="";
	$width="width=434";
	$height="height=175";
	
	if($num>0)
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
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho]\" border=0 $width >$link_end";
			if($lg=="eg")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh]\" border=0 $width >$link_end";
			if($lg=="kr")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho_1]\" border=0 $width >$link_end";
			}
		else
			{
			if($lg=="vn")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" $width $height>
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh_nho]\">
					  <param name=\"quality\" value=\"high\">
				      <param name=\"wmode\" value=\"transparent\">
					  <embed src=\"images/photo/news/$rs[anh_nho]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" $width $height></embed></object>";
			if($lg=="eg")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" $width $height>
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh]\">
					  <param name=\"quality\" value=\"high\">
				      <param name=\"wmode\" value=\"transparent\">
					  <embed src=\"images/photo/news/$rs[anh]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" $width $height></embed></object>";
			if($lg=="kr")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" $width $height>
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh_nho_1]\">
					  <param name=\"quality\" value=\"high\">
				      <param name=\"wmode\" value=\"transparent\">
					  <embed src=\"images/photo/news/$rs[anh_nho_1]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" $width $height></embed></object>";

			 }
		}
		echo $banner;?>