<?
function pag_cat_s_s($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
		$start_t=$start - $page_count;
		echo "&laquo;  <a href=\"$PHP_SELF?cat_s_s=$cat_s_s&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
		echo "Page: &nbsp;";
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
			echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
			echo "<a href=\"$PHP_SELF?cat_s_s=$cat_s_s&start=$start_page\">$page</a> &nbsp;";
		}
		$page++;
		$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
		$start_t=$start + $page_count;
		echo "<a href=\"$PHP_SELF?cat_s_s=$cat_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
		echo " ";
	}
	else{
		$start_t=$start + $page_count;
		echo " <a href=\"$PHP_SELF?cat_s_s=$cat_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	}
}

function pag_cat_s($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
		if(isset($start) && $start != 0){
			$start_t=$start - $page_count;
			echo "&laquo;  <a href=\"$PHP_SELF?cat_s=$cat_s&start=$start_t";echo "\">back</a> &nbsp;";
		}
		else{
			echo "Page: &nbsp;";
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
				echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
			}
			else{
				echo "<a href=\"$PHP_SELF?cat_s=$cat_s&start=$start_page\">$page</a> &nbsp;";
			}
			$page++;
			$start_page = $start_page + $page_count;
		}
		if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
			$start_t=$start + $page_count;
			echo "<a href=\"$PHP_SELF?cat_s=$cat_s&start=$start_t";echo "\">next</a> &raquo;";
		}
		elseif($cur_page >= $total_pages){
			echo " ";
		}
		else{
			$start_t=$start + $page_count;
			echo " <a href=\"$PHP_SELF?cat_s=$cat_s&start=$start_t";echo "\">next</a> &raquo;";
		}
	}
}

function pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"center\">
	<tr>
	<td style=\"border: 0px solid #999999; font-family: Verdana; font-size: 11px; TEXT-DECORATION: none;\" nowrap>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?cat=$cat&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?cat=$cat&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?cat=$cat&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?cat=$cat&start=$start_t";echo "\">next</a> &raquo;";
	}
	echo "
	</td>
	</tr>
	</table>
	<div align=\"center\" style=\"font-family: Verdana; font-size: 11px; color: #666666;\">
	 <div>";
	}
}
//Mr Tri lam them
function pag_all_product($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$bac,$lg,$alpha){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
		$start_t=$start - $page_count;
		echo "&laquo;  <a href=\"$PHP_SELF?cat=$cat&bac=$bac&lg=$lg&start=$start_t&alpha=$alpha";echo "\">back</a> &nbsp;";
	}
	else{
		echo "&laquo; back &nbsp;";
	}
	$total_pages = $newnum;
	if($newnum > $cut_off){
		$newnum = $cut_off;
	}
	$cur_page = ($start + $page_count) / $page_count;
	if($cur_page > $cut_off){
		$page = $cur_page - $cut_off + 1;
	}
	if($cur_page > $cut_off){
		$start_page = $page * $page_count - $page_count;
	}
	else{
		$start_page = 0;
	}
	for($i=0; $i<$newnum;$i++){
		if($start == ($page * $page_count) - $page_count){
			echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
			echo "<a href=\"$PHP_SELF?cat=$cat&bac=$bac&lg=$lg&start=$start_page&alpha=$alpha\">$page</a> &nbsp;";
		}
		$page++;
		$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
		$start_t=$start + $page_count;
		echo "<a href=\"$PHP_SELF?cat=$cat&bac=$bac&lg=$lg&start=$start_t&alpha=$alpha";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
		echo " next &raquo;";
		}
		else{
			$start_t=$start + $page_count;
			echo " <a href=\"$PHP_SELF?cat=$cat&bac=$bac&lg=$lg&start=$start_t&alpha=$alpha";echo "\">next</a> &raquo;";
		}
	}
}
function pagination_all($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$cat_s,$cat_s_s,$cat_s_s_s,$cat_s_s_s_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?cat=$cat&cat_s=$cat_s&cat_s_s=$cat_s_s&cat_s_s_s=$cat_s_s_s&cat_s_s_s_s=$cat_s_s_s_s&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?cat=$cat&cat_s=$cat_s&cat_s_s=$cat_s_s&cat_s_s_s=$cat_s_s_s&cat_s_s_s_s=$cat_s_s_s_s&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?cat=$cat&cat_s=$cat_s&cat_s_s=$cat_s_s&cat_s_s_s=$cat_s_s_s&cat_s_s_s_s=$cat_s_s_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?cat=$cat&cat_s=$cat_s&cat_s_s=$cat_s_s&cat_s_s_s=$cat_s_s_s&cat_s_s_s_s=$cat_s_s_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	}
}
function phan_trang_A($page_count,$num,$start,$PHP_SELF,$cut_off,$cat){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"right\" class=TaiNang>
	<tr>
	<td nowrap class=TaiNang>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?Acat=$cat&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?Acat=$cat&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?Acat=$cat&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?Acat=$cat&start=$start_t";echo "\">next</a> &raquo;";
	}
	echo "
	</td>
	</tr>
	</table>";
	}
}
function phan_trang_B($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"right\" class=TaiNang>
	<tr>
	<td nowrap class=TaiNang>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?Bcat=$cat_s&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?Bcat=$cat_s&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?Bcat=$cat_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?Bcat=$cat_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	echo "
	</td>
	</tr>
	</table>";
	}
}
function phan_trang_C($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"right\" class=TaiNang>
	<tr>
	<td nowrap class=TaiNang>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	echo "
	</td>
	</tr>
	</table>";
	}
}
function phan_trang_D($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s_s_s){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"right\" class=TaiNang>
	<tr>
	<td nowrap class=TaiNang>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?Dcat=$cat_s_s_s&start=$start_t";echo "\">back</a> &nbsp;";
	}
	else{
	echo "&laquo; back &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?Dcat=$cat_s_s_s&start=$start_page\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?Dcat=$cat_s_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?Dcat=$cat_s_s_s&start=$start_t";echo "\">next</a> &raquo;";
	}
	echo "
	</td>
	</tr>
	</table>";
	}
}

function phan_trang_C_photo($page_count,$num,$start,$PHP_SELF,$cut_off,$cat_s_s,$next,$back){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	echo "
	<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"  align=\"center\" class=TaiNang>
	<tr>
	";
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "<td nowrap class=TaiNang valign=middle><a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">$back</a></td>";
	}
	else{
	echo "<td nowrap class=TaiNang valign=middle>$back</td>";
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
		echo "<td nowrap class=txtTintuc-tt3Title valign=middle><b>$page</b></td>";
		}
		else{
		echo "<td nowrap class=txtTintuc-tt3Title valign=middle><a href=\"$PHP_SELF?Bcat=$cat_s&start=$start_page\">$page</a></td>";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<td nowrap class=txtTintuc-tt3Title valign=middle><b>Trong $num</b></td><td nowrap class=TaiNang valign=middle><a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">$next</a></td>";
	}
	elseif($cur_page >= $total_pages){
	echo "<td nowrap class=txtTintuc-tt3Title valign=middle><b>Trong $num</b></td><td nowrap class=TaiNang valign=middle>$next</td>";
	}
	else{
	$start_t=$start + $page_count;
	echo "<td nowrap class=txtTintuc-tt3Title valign=middle><b>Trong $num</b></td><td nowrap class=TaiNang valign=middle><a href=\"$PHP_SELF?Ccat=$cat_s_s&start=$start_t";echo "\">$next</a></td>";
	}
	echo "
	</tr>
	</table>";
	}
}


function pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">back</a> &nbsp;";
	}
	else{
	echo "Page: &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?cat=$cat&alpha=$alpha&start=$start_page&lg=$lg\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	}
}

function pag_cat_sort_ma_user($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg,$ma_user){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?ma_user=$ma_user&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">back</a> &nbsp;";
	}
	else{
	echo "Page: &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?ma_user=$ma_user&cat=$cat&alpha=$alpha&start=$start_page&lg=$lg\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?ma_user=$ma_user&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?ma_user=$ma_user&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	}
}

function pag_cat_sort_id($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg,$id){
	$newnum = $num / $page_count;
	$newnum = ceil($newnum);
	if(!isset($page))$page = 1;
	if($newnum >= 2){ 
	if(isset($start) && $start != 0){
	$start_t=$start - $page_count;
	echo "&laquo;  <a href=\"$PHP_SELF?id=$id&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">back</a> &nbsp;";
	}
	else{
	echo "Page: &nbsp;";
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
		echo "<b><font color=\"#666666\">$page</font></b> &nbsp;";
		}
		else{
		echo "<a href=\"$PHP_SELF?id=$id&cat=$cat&alpha=$alpha&start=$start_page&lg=$lg\">$page</a> &nbsp;";
		}
	$page++;
	$start_page = $start_page + $page_count;
	}
	if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
	$start_t=$start + $page_count;
	echo "<a href=\"$PHP_SELF?id=$id&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	elseif($cur_page >= $total_pages){
	echo " next &raquo;";
	}
	else{
	$start_t=$start + $page_count;
	echo " <a href=\"$PHP_SELF?id=$id&cat=$cat&alpha=$alpha&start=$start_t&lg=$lg";echo "\">next</a> &raquo;";
	}
	}
}

function phan_trang_7dk($page_count,$num,$text_1,$dk_1,$text_2,$dk_2,$text_3,$dk_3,$text_4,$dk_4,$text_5,$dk_5,$text_6,$dk_6,$text_7,$dk_7,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo){
$newnum = $num / $page_count;
$newnum = ceil($newnum);
if(!isset($page))$page = 1;
if($newnum >= 2){ 
echo "";
if(isset($start) && $start != 0){
$start_t=$start - $page_count;
echo " <a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&$text_5=$dk_5&$text_6=$dk_6&$text_7=$dk_7&start=$start_t";echo "\">$back</a> ";
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
		echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&$text_5=$dk_5&$text_6=$dk_6&$text_7=$dk_7&start=$start_page\">0$page</a>$dong ";
  	  else
	    echo " $mo<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&$text_5=$dk_5&$text_6=$dk_6&$text_7=$dk_7&start=$start_page\">$page</a>$dong ";
	}
$page++;
$start_page = $start_page + $page_count;
}
if($newnum >= 2 && $cur_page < $newnum && $cur_page <= $total_pages){
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&$text_5=$dk_5&$text_6=$dk_6&$text_7=$dk_7&start=$start_t";echo "\">$next</a>";
}
elseif($cur_page >= $total_pages){
echo " $next ";
}
else{
$start_t=$start + $page_count;
echo "<a href=\"$PHP_SELF?$text_1=$dk_1&$text_2=$dk_2&$text_3=$dk_3&$text_4=$dk_4&$text_5=$dk_5&$text_6=$dk_6&$text_7=$dk_7&start=$start_t";echo "\">$next</a> ";
}
echo "";
}
}

?>