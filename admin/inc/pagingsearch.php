<?php 
$table="tb_product";
if(($ma_bac_1==-1)&&($SearchText==""))
{
$query = "Select * FROM  $table";
$result = mysql_query($query);
$num=mysql_num_rows($result);
$total=$num/$page_count;
$total=ceil($total);
}

if(($ma_bac_1!=-1)&&($SearchText==""))
{
$query = "Select * FROM  $table where ma_bac_1=$ma_bac_1 ";
$result = mysql_query($query);
$num=mysql_num_rows($result);
$total=$num/$page_count;
$total=ceil($total);
}

if(($ma_bac_1==-1)&&($SearchText!=""))
{
$query = "Select * FROM  $table  WHERE ((ten_vn LIKE '%".$SearchText."%' ) or (id LIKE '%".$SearchText."%') or (mo_ta_vn LIKE '%".$SearchText."%' ) or (ten_vn LIKE '%".$text_upper."%') or (id LIKE '%".$text_upper."%') or (mo_ta_vn LIKE '%".$text_upper."%')  or (ten_vn LIKE '%".$text_name."%') or (id LIKE '%".$text_name."%') or (mo_ta_vn LIKE '%".$text_name."%'))";
$result = mysql_query($query);
$num=mysql_num_rows($result);
$total=$num/$page_count;
$total=ceil($total);
}

if(($ma_bac_1!=-1)&&($SearchText!=""))
{
$query = "Select * FROM  $table  WHERE ma_bac_1=$ma_bac_1 and ((ten_vn LIKE '%".$SearchText."%' ) or (id LIKE '%".$SearchText."%') or (mo_ta_vn LIKE '%".$SearchText."%') or (ten_vn LIKE '%".$text_upper."%') or (id LIKE '%".$text_upper."%') or (mo_ta_vn LIKE '%".$text_upper."%')  or (ten_vn LIKE '%".$text_name."%') or (id LIKE '%".$text_name."%') or (mo_ta_vn LIKE '%".$text_name."%'))";
$result = mysql_query($query);
$num=mysql_num_rows($result);
$total=$num/$page_count;
$total=ceil($total);
}


$start=$HTTP_GET_VARS["start"];
if ($start<=0) $start = 0;
else $start=$HTTP_GET_VARS["start"];

// BEGIN FUNCTION

function pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$ma_bac_1,$SearchText){

$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
if(isset($start) && $start != 0){
echo "&laquo;  <a href=\"$PHP_SELF?start="; echo $start - $page_count; echo"&ma_bac_1=";echo "$ma_bac_1";echo"&SearchText=";echo "$SearchText";echo "\">back</a> ";
}
else{
echo "&laquo; back ";
}
$total_pages = $newnum;
if($newnum > $cut_off)$newnum = $cut_off;
$cur_page = ($start + $page_count) / $page_count;
if($cur_page > $cut_off)$page = $cur_page - $cut_off + 1;
if($cur_page > $cut_off){
$start_page = $page * $page_count - $page_count;
}
else{
$start_page = 0;
}
for($i=0; $i<$newnum;$i++){
	if($start == ($page * $page_count) - $page_count){
	echo " <b><font color=\"#666666\"> $page</font></b> &nbsp";
	}
	else{
	echo " <a href=\"$PHP_SELF?SearchText=$SearchText&ma_bac_1=$ma_bac_1&start=$start_page\"> $page</a> &nbsp";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
echo " <a href=\"$PHP_SELF?start="; echo $start + $page_count; echo"&ma_bac_1=";echo "$ma_bac_1";echo"&SearchText=";echo "$SearchText";echo "\">next</a> &raquo;";
}
elseif($cur_page >= $total_pages){
echo " next &raquo;";
}
else{
echo " <a href=\"$PHP_SELF?start="; echo $start + $page_count;echo"&ma_bac_1=";echo "$ma_bac_1";echo"&SearchText=";echo "$SearchText"; echo "\">next</a> &raquo;";
}
}
}

function pagination_pt($page_count,$num,$start,$PHP_SELF,$cut_off,$thang,$nam){

$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
if(isset($start) && $start != 0){
echo "&laquo;  <a href=\"$PHP_SELF?start="; echo $start - $page_count; echo"&thang=";echo "$thang";echo"&nam=";echo "$nam";echo "\">back</a> ";
}
else{
echo "&laquo; back ";
}
$total_pages = $newnum;
if($newnum > $cut_off)$newnum = $cut_off;
$cur_page = ($start + $page_count) / $page_count;
if($cur_page > $cut_off)$page = $cur_page - $cut_off + 1;
if($cur_page > $cut_off){
$start_page = $page * $page_count - $page_count;
}
else{
$start_page = 0;
}
for($i=0; $i<$newnum;$i++){
	if($start == ($page * $page_count) - $page_count){
	echo " <b><font color=\"#666666\"> $page</font></b> &nbsp";
	}
	else{
	echo " <a href=\"$PHP_SELF?thang=$thang&nam=$nam&start=$start_page\"> $page</a> &nbsp";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
echo " <a href=\"$PHP_SELF?start="; echo $start + $page_count; echo"&thang=";echo "$thang";echo"&nam=";echo "$nam";echo "\">next</a> &raquo;";
}
elseif($cur_page >= $total_pages){
echo " next &raquo;";
}
else{
echo " <a href=\"$PHP_SELF?start="; echo $start + $page_count;echo"&thang=";echo "$thang";echo"&nam=";echo "$nam"; echo "\">next</a> &raquo;";
}
}
}
?>


  