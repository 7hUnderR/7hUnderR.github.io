<?
	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",63,"ma_bac_2");
	$query="SELECT * FROM tb_news WHERE ma_bac_2=$cat_bn_top and banner=1 and activate=1 and ngoai_index=1 ORDER BY thu_tu DESC ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$banner="";
		if($lg=="vn")
		$banner="images/photo/news/$rs[anh_nho]";
		if($lg=="eg")
		$banner="images/photo/news/$rs[anh]";
		if($lg=="kr")
		$banner="images/photo/news/$rs[anh_nho_1]";
	$width="650";
	$height="250";
	?>
<div id="container"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this rotator.</div>
<script type="text/javascript" src="banner_flash_upload_image/swfobject.js"></script>
<script type="text/javascript">
	var s1 = new SWFObject("<?=$banner?>","rotator","<?=$width?>","<?=$height?>","3");
	s1.addVariable("file","banner_flash_upload_image/playlist.php?lg=<?=$lg?>");
	s1.addVariable("transition","blocks");
	s1.addVariable("shuffle","false");
	s1.addVariable("allowfullscreen","true");
	s1.addVariable("shownavigation","true");
	s1.addVariable("overstretch","true");
	s1.addVariable("autostart","off");
	s1.addVariable("linkfromdisplay","true");
	s1.addVariable("width","<?=$width?>");
	s1.addVariable("height","<?=$height?>");
	s1.write("container");
</script>