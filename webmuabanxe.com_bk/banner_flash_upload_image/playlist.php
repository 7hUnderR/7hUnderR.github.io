<?
	include("../admin/inc/dbconnect.php");
	include("../admin/inc/common.php");

	$cat_home=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat_home,"trang",63,"ma_bac_2");
	
	$query="SELECT * FROM tb_news WHERE ma_bac_2=$cat_bn_top and banner='1' and activate='1' and ngoai_index!='1' ORDER BY thu_tu DESC ";
	$result = mysql_query($query);
	$banner="";
	//$lg="eg";
	$lg = rep($HTTP_GET_VARS["lg"]);
	//echo "dfgdfg: $lg";
// third, build the playlist
header("content-type:text/xml;charset=utf-8");
echo "<playlist version='1' xmlns='http://xspf.org/ns/0/'>\n";
echo "<trackList>\n";
while($rs = @mysql_fetch_array($result)) 
{
		if($lg=="vn")
			$banner="images/photo/news/$rs[anh_nho]";
		if($lg=="eg")
			$banner="images/photo/news/$rs[anh]";
		if($lg=="kr")
			$banner="images/photo/news/$rs[anh_nho_1]";
		$ten=$rs["ten_$lg"];
		$link=$rs["mo_ta_$lg"];
		
  echo "\t<track>\n";
  echo "\t\t<title>".$ten."</title>\n";
  echo "\t\t<location>".$banner."</location>\n";
  echo "\t\t<info>".$link."</info>\n";
  echo "\t</track>\n";
}
echo "</trackList>\n";
echo "</playlist>\n";
?>