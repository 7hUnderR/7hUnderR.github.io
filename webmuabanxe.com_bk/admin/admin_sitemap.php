<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title">Sitemap</td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><?
					$cat="0";
					if(isset($HTTP_GET_VARS["cat"]))
						$cat = $HTTP_GET_VARS["cat"];
					
					$bac="1";
					if(isset($HTTP_GET_VARS["bac"]))
						$bac = $HTTP_GET_VARS["bac"];
					
					$start="0";
					if(isset($HTTP_GET_VARS["start"]))
						$start = $HTTP_GET_VARS["start"];

					$alpha="All";
					if(isset($HTTP_GET_VARS["alpha"]))
						$alpha = $HTTP_GET_VARS["alpha"];
						
					$all_quyen_cr=gia_tri_mot_cot("tb_admin","ma_user","$ma_user_admin","quyen_catalog");
					$all_quyen_cr= str_replace (",", "','", $all_quyen_cr);
					
					$all_quyen_cr_s=gia_tri_mot_cot("tb_admin","ma_user","$ma_user_admin","quyen_catalog_s");
					$all_quyen_cr_s= str_replace (",", "','", $all_quyen_cr_s);

 					 if($alpha=="All")
						 {
						 if($ma_user_admin==1)
						    $sort=" ";
						 else
						    $sort=" where activate_setup=1 and ma_bac_1 in ('$all_quyen_cr') ";
						 }
					 else
						 {
						 if($ma_user_admin==1)
							 $sort=" where ten_$lg like '".$alpha."%'";
						 else
						    $sort=" where  activate_setup=1 and  ma_bac_1 in ('$all_quyen_cr') and ten_$lg like '".$alpha."%'";
						 }
					 
					
					 $table="tb_bac_1";
					 $query = "Select * FROM  $table ";
					 $query.=$sort;
					 $result = mysql_query($query);
					 $tam=0;
					 $num = mysql_num_rows($result);
					 $PHP_SELF="admin_sitemap.php";
					 $page_count =10000; 
					 $cut_off = 10; 
					 include("inc/phantrang.php");
					 $query2 = "Select * FROM  $table ";
					 $query2.=$sort;
					 $query2.=" ORDER BY thu_tu ASC LIMIT $start, $page_count";
					 $result2 = mysql_query($query2);
				?>
      <form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=update_quyen_catalog">
<? include("inc/inc_sort.php"); ?>
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
  <!--DWLayoutTable-->
	<thead>
	<tr>
	<th width=22 height="23" align=center nowrap><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	<th colspan="5" id="senderheader"><?=$main_tieu_de_trang?></th>
	</tr>
	</thead>
	<tbody>
	<input type="hidden" name="cat" value="<?=$cat?>">
	<input type="hidden" name="bac" value="<?=$bac?>">
	<input type="hidden" name="alpha" value="<?=$alpha?>">
	<input type="hidden" name="start" value="<?=$start?>">
	<input type="hidden" name="lg" value="<?=$lg?>">
	<input type="hidden" name="ma_user" value="<?=$ma_user?>">
	
	<? 
		 while($rs= mysql_fetch_array($result2)) 
		 {
		 $tam++; 
		 $ma_bac_1=$rs["ma_bac_1"];

		 //$link="index_2.php?cat=$ma_bac_1&bac=2&alpha=All&start=0&lg=$lg";
		   $link="#";
		 ?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td height="24" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$ma_bac_1?>" ></td>
	<td colspan="5"><a href="<?=$link?>"> <? echo $rs["ten_$lg"]; ?></a></td>
	</tr>
	<? 
	 if($ma_user_admin==1)
		 $sort_s=" where ma_bac_1 = $ma_bac_1 ";
	 else
		$sort_s=" where ma_bac_1 = $ma_bac_1 and activate_setup=1 and  ma_bac_2 in ('$all_quyen_cr_s') ";

	 $query_s = " Select * FROM  tb_bac_2 $sort_s ORDER BY thu_tu ASC ";
	 $result_s = mysql_query($query_s);
	 while($rs_s= mysql_fetch_array($result_s)) 
		 {
		 $ma_bac_2=$rs_s["ma_bac_2"];

	?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td height="24"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td width="20" align=center valign=middle><input id="Mid" type="checkbox" name="Mid_s" value="<?=$ma_bac_2?>" /></td>
	<td colspan="4" valign=middle><? echo $rs_s["ten_$lg"]; ?></td>
	</tr>
	<? 
	 $query_s_s = " Select * FROM  tb_bac_3 where ma_bac_2 = $ma_bac_2 ORDER BY thu_tu ASC ";
	 $result_s_s = mysql_query($query_s_s);
	 while($rs_s_s= mysql_fetch_array($result_s_s)) 
		 {
		 $ma_bac_3=$rs_s_s["ma_bac_3"];

	?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td height="24"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td width="23" align=center valign=middle><input id="Mid" type="checkbox" name="Mid_s_s" value="<?=$ma_bac_3?>" /></td>
	<td colspan="3" valign=middle><? echo $rs_s_s["ten_$lg"]; ?></td>
	</tr>
	<? 
	$query_s_s_s = " Select * FROM  tb_bac_4 where ma_bac_3 = $ma_bac_3 ORDER BY thu_tu ASC ";
	$result_s_s_s = mysql_query($query_s_s_s);
	while($rs_s_s_s= mysql_fetch_array($result_s_s_s)) 
	{
	$ma_bac_4=$rs_s_s_s["ma_bac_4"];
	
	?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td height="24"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td width="25" align=center valign=middle><input id="Mid" type="checkbox" name="Mid_s_s_s" value="<?=$ma_bac_4?>" /></td>
	<td colspan="2" valign=middle><? echo $rs_s_s_s["ten_$lg"]; ?></td>
	</tr>
	<? 
	$query_s_s_s_s = " Select * FROM  tb_bac_5 where ma_bac_4 = $ma_bac_4 ORDER BY thu_tu ASC ";
	$result_s_s_s_s = mysql_query($query_s_s_s_s);
	while($rs_s_s_s_s= mysql_fetch_array($result_s_s_s_s)) 
	{
	$ma_bac_5=$rs_s_s_s_s["ma_bac_5"];
	
	?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td height="24"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td align=center valign=middle><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td width="25" align=center valign=middle><input id="Mid" type="checkbox" name="Mid_s_s_s_s" value="<?=$ma_bac_5?>" /></td>
	<td width="697" valign=middle><? echo $rs_s_s_s_s["ten_$lg"]; ?></td>
	</tr>
	<? 
	 }
	 }
	 }
	 } 
	 } 
	 ?>
	  </table>
	<table width="100%"><tr><td class="lot"><? 
	include("inc/inc_select.php");
	?>
  </td>
	</tr></table>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
		  <tr><td width="59%" height="40" align="center" valign="middle"><span class="S10">
		    <? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?>
		  </span></td>
		  </tr>
        </table>
		<INPUT type=hidden value='' name="chon">
		<INPUT type=hidden value='' name="chon_s">
        </form>		
		  </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>

<? include("inc/bottom.php")?>
