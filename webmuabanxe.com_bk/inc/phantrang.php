<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
function phan_trang_A($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&lg=$lg&start=$start_t";echo "\">$back</a> ";
}
else{
echo " $back ";
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
	if($start == ($page * $page_count) - $page_count)
	{
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Acat=$cat&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Acat=$cat&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Acat=$cat&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_B($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?Bcat=$cat_s&lg=$lg&start=$start_t";echo "\">$back</a> ";
}
else{
echo " $back ";
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
	if($start == ($page * $page_count) - $page_count)
	{
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Bcat=$cat_s&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Bcat=$cat_s&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Bcat=$cat_s&lg=$lg&start=$start_t";echo "\">$next</a>";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Bcat=$cat_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_C($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?Ccat=$cat_s_s&lg=$lg&start=$start_t";echo "\">$back</a> ";
}
else{
echo " $back ";
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
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Ccat=$cat_s_s&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Ccat=$cat_s_s&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Ccat=$cat_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Ccat=$cat_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_D($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s_s,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo "&laquo;  <a href=\"$PHP_SELF?Dcat=$cat_s_s_s&lg=$lg&start=$start_t";echo "\">$back</a>  ";
}
else{
echo " $back ";
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
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Dcat=$cat_s_s_s&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Dcat=$cat_s_s_s&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Dcat=$cat_s_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Dcat=$cat_s_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_E($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s_s_s,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo "&laquo;  <a href=\"$PHP_SELF?Ecat=$cat_s_s_s_s&lg=$lg&start=$start_t";echo "\">$back</a>  ";
}
else{
echo " $back ";
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
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Ecat=$cat_s_s_s_s&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Ecat=$cat_s_s_s_s&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Ecat=$cat_s_s_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Ecat=$cat_s_s_s_s&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_A_search($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$text,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&text_search=$text&lg=$lg&start=$start_t";echo "\">$back</a> ";
}
else{
echo "$back ";
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
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Acat=$cat&text_search=$text&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Acat=$cat&text_search=$text&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&text_search=$text&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&text_search=$text&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_B_search($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s,$text,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo "<a href=\"$PHP_SELF?Bcat=$cat_s&text_search=$text&lg=$lg&start=$start_t";echo "\">$back</a>";
}
else{
echo "$back ";
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
echo"<span class=page>";
for($i=0; $i<$newnum;$i++){
	if($start == ($page * $page_count) - $page_count){
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Bcat=$cat_s&text_search=$text&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Bcat=$cat_s&text_search=$text&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
echo"</span>";
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Bcat=$cat_s&text_search=$text&lg=$lg&start=$start_t";echo "\">$next</a>";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Bcat=$cat_s&text_search=$text&lg=$lg&start=$start_t";echo "\">$next</a>";
}
echo "";
}
}


function phan_trang_C_search($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s,$text){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "
<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"right\">
<tr>
<td nowrap>
";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo "&laquo;  <a href=\"$PHP_SELF?text_search=$text&Ccat=$cat_s_s&lg=$lg&start=$start_t";echo "\">Back</a> &nbsp;&nbsp;";
}
else{
echo "&laquo; Back &nbsp;&nbsp;";
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
echo"<span class=page>";
for($i=0; $i<$newnum;$i++){
	if($start == ($page * $page_count) - $page_count)
	{
	  if($page<10) 
		  echo "0$page &nbsp;&nbsp;";
	  else
		  echo "$page &nbsp;&nbsp;";
	}
	else
	{
	  if($page<10) 
		echo "<a href=\"$PHP_SELF?text_search=$text&Ccat=$cat_s_s&lg=$lg&start=$start_page\">0$page</a> &nbsp;&nbsp;";
  	  else
	    echo "<a href=\"$PHP_SELF?text_search=$text&Ccat=$cat_s_s&lg=$lg&start=$start_page\">$page</a> &nbsp;&nbsp;";
	}
$page++;
$start_page = $start_page + $page_count;
}
echo"</span>";
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?text_search=$text&Ccat=$cat_s_s&lg=$lg&start=$start_t&lg=$lg";echo "\">Next</a> &raquo;";
}
elseif($cur_page >= $total_pages){
echo " Next &raquo;";
}
else{
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?text_search=$text&Ccat=$cat_s_s&lg=$lg&start=$start_t&lg=$lg";echo "\">Next</a> &raquo;";
}
echo "";
}
}


//search megazine
function phan_trang_s_m($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$text,$s,$ss){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo "&laquo;  <a href=\"$PHP_SELF?Acat=$cat&s=$s&ss=$ss&text_search=$text&lg=$lg&start=$start_t";echo "\">Back</a> &nbsp;";
}
else{
echo "&laquo; Back &nbsp;";
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
echo"<span class=page>";
for($i=0; $i<$newnum;$i++){
	if($start == ($page * $page_count) - $page_count){
	  if($page<10) 
		  echo "0$page &nbsp;&nbsp;";
	  else
		  echo "$page &nbsp;&nbsp;";
	}
	else{
	  if($page<10) 
		echo "<a href=\"$PHP_SELF?Acat=$cat&s=$s&ss=$ss&text_search=$text&lg=$lg&start=$start_page\">0$page</a> &nbsp;&nbsp;";
  	  else
	    echo "<a href=\"$PHP_SELF?Acat=$cat&s=$s&ss=$ss&text_search=$text&lg=$lg&start=$start_page\">$page</a> &nbsp;&nbsp;";
	}
$page++;
$start_page = $start_page + $page_count;
}
echo"</span>";
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?Acat=$cat&s=$s&ss=$ss&text_search=$text&lg=$lg&start=$start_t";echo "\">Next</a> &raquo;";
}
elseif($cur_page >= $total_pages){
echo " Next &raquo;";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&s=$s&ss=$ss&text_search=$text&lg=$lg&start=$start_t";echo "\">Next</a> &raquo;";
}
echo "";
}
}

function phan_trang_A_download_search($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$s_cat,$text,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&download_search=$text&s_cat=$s_cat&lg=$lg&start=$start_t";echo "\">$back</a> ";
}
else{
echo "$back ";
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
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?Acat=$cat&download_search=$text&s_cat=$s_cat&lg=$lg&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?Acat=$cat&download_search=$text&s_cat=$s_cat&lg=$lg&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&download_search=$text&s_cat=$s_cat&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo " <a href=\"$PHP_SELF?Acat=$cat&download_search=$text&s_cat=$s_cat&lg=$lg&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_3dk($page_count,$num,$text_1,$dk_1,$text_2,$dk_2,$text_3,$dk_3,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&start=$start_t";echo "\">$back</a> ";
}
else{
echo " $back ";
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
	if($start == ($page * $page_count) - $page_count)
	{
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&start=$start_t";echo "\">$next</a>";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

function phan_trang_4dk($page_count,$num,$text_1,$dk_1,$text_2,$dk_2,$text_3,$dk_3,$text_4,$dk_4,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&start=$start_t";echo "\">$back</a> ";
}
else{
echo " $back ";
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
	if($start == ($page * $page_count) - $page_count)
	{
	  if($page<10) 
		  echo " $mo"."<b>0$page</b>$dong ";
	  else
		  echo " $mo"."<b>$page</b>$dong ";
	}
	else{
	  if($page<10) 
		echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&start=$start_t";echo "\">$next</a>";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

?>
