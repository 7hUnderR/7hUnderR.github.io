<?php 	ob_start();
 	session_start();
	$qr = $_SERVER["QUERY_STRING"];
	$browser=$_SERVER['HTTP_USER_AGENT'];
	if(strstr($browser,"MSIE") || strstr($browser,"msie"))
		$browse="ie";
	else
	    $browse="firefox";
	//error_reporting(0);
	include("admin/inc/dbconnect.php");
	include("admin/inc/common.php");
	include("inc_cat.php");
	include("inc_lg_ma.php");
	include("inc_config_site.php");
	include("inc_dem_truy_cap.php");
	include("inc_config_text.php");
	include("shopping_cart/session_def.php");
	//include("ajaxtabs/ajaxtabs.php");
	
	$form_action = $_SERVER['PHP_SELF'];
	//$form_action = str_replace("index.php","./",$form_action);
	if (isset($_SERVER['QUERY_STRING'])) 
			{
			$form_action .= "?" . $_SERVER['QUERY_STRING'];
			}
	?>
	<? 
	include("inc_title.php");
	//include("js/dong_mo.php");
	?>
	<?
		 $page=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang");
		 $sub_page=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"trang");
	if($qr =="")
	    {
		include("inc_top.php");
		include("inc_center.php");
		include("inc_bottom.php");
		}
	else
		{ 
		 if($page==1)
			{
			include("inc_top.php");
			include("inc_center.php");
			include("inc_bottom.php");
			}
		 else
			{
			include("inc_top.php");
			include("inc_center_sub.php");
			include("inc_bottom.php");
			}
		}
	?>	
	<?
	/*
	$browser=$_SERVER['HTTP_USER_AGENT'];
	if(strstr($browser,"MSIE") || strstr($browser,"msie"))
	{
	include("banner_chay_theo_ie/inc_banner_chay_phai.php");
	include("banner_chay_theo_ie/inc_banner_chay_trai.php");
	}
	else
	include("banner_chay_theo_firefox/inc_banner_left_right.php");
	*/
	?>
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10129670-1");
pageTracker._trackPageview();
} catch(err) {}</script>
	<? include("inc_title_end.php");?>
	<?php 
  mysql_close();
  ob_end_flush();
   ?>