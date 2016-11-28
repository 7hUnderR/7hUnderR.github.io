<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
if($suid==1)
{
?>
<script language="javascript">
function docheck_catalog(status,from_)
   {
		var alen=document.messageList.elements.length;
		alen=(alen>5)?document.messageList.Mid.length:0;
		if (alen>0)
		{
			for(var i=0;i<alen;i++)
				document.messageList.Mid[i].checked=status;
		}
		else
		{
				document.messageList.Mid.checked=status;
		}
		if(from_>0)
			    document.messageList.toggleAll.checked=status;
		
		var alen_s=document.messageList.elements.length;
		alen_s=(alen_s>5)?document.messageList.Mid_s.length:0;
		if (alen_s>0)
		{
			for(var i=0;i<alen_s;i++)
				document.messageList.Mid_s[i].checked=status;
		}
		else
		{
				document.messageList.Mid_s.checked=status;
		}
		if(from_>0)
			    document.messageList.toggleAll.checked=status;
   }
</script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title">Permission</td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><?
					$cat=$HTTP_GET_VARS["cat"];
					$bac="1";
					if(isset($HTTP_GET_VARS["bac"])){
						$bac = $HTTP_GET_VARS["bac"];
					}
					
					if(isset($HTTP_GET_VARS["lg"])){
						$lg = $HTTP_GET_VARS["lg"];
					}
					$alpha=$HTTP_GET_VARS["alpha"];
					$ma_user=$HTTP_GET_VARS["ma_user"];
					
					$all_quyen_cr=gia_tri_mot_cot("tb_admin","ma_user","$ma_user","quyen_catalog");
					$all_quyen_cr="'".str_replace (",", "','", $all_quyen_cr);
					
					$all_quyen_cr_s=gia_tri_mot_cot("tb_admin","ma_user","$ma_user","quyen_catalog_s");
					$all_quyen_cr_s="'".str_replace (",", "','", $all_quyen_cr_s);
					//echo $all_quyen_cr;
					
					
					$start=$HTTP_GET_VARS["start"];
						
					 if($alpha=="All")
						 $sort="where activate_setup=1 ";
					 else
						 $sort="where activate_setup=1 and ten_$lg like '".$alpha."%'";
					 
					 $table="tb_bac_1";
					 $query = "Select * FROM  $table ";
					 $query.=$sort;
					 $result = mysql_query($query);
					 $tam=0;
					 $num = mysql_num_rows($result);
					 $PHP_SELF="admin_user_catalog.php";
					 $page_count =10000; 
					 $cut_off = 10; 
					 $start=$HTTP_GET_VARS["start"];
					 include("inc/phantrang.php");
					 $query2 = "Select * FROM  $table ";
					 $query2.=$sort;
					 $query2.=" ORDER BY thu_tu ASC LIMIT $start, $page_count";
					 $result2 = mysql_query($query2);
				?>
        <form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=update_quyen_catalog">
<? include("inc/inc_sort_user.php"); ?>
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
	<thead>
	<tr>
	<th width=20 height="23" align=center nowrap><input type="checkbox" id="toggleAll" name="toggleAll" value="0" onClick="docheck_catalog(document.messageList.toggleAll.checked,0);" title="Select all"></th>
	<th colspan="2" id="senderheader"><?=$main_tieu_de_trang?></th>
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
	<td height="24" align=center valign=middle><input id="Mid" type="checkbox" name="Mid" value="<?=$ma_bac_1?>" <? if(strstr("$all_quyen_cr","'$ma_bac_1'")) echo "checked=\"checked\""; ?> ></td>
	<td colspan="2"><a href="<?=$link?>"> <? echo $rs["ten_$lg"]; ?></a></td>
	</tr>
	<? 
	 $query_s = " Select * FROM  tb_bac_2 where ma_bac_1 = $ma_bac_1 and activate_setup=1 ORDER BY thu_tu ASC ";
	 $result_s = mysql_query($query_s);
	 while($rs_s= mysql_fetch_array($result_s)) 
		 {
		 $ma_bac_2=$rs_s["ma_bac_2"];

	?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td height="24"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td width="26" align=center valign=middle><input id="Mid_s" type="checkbox" name="Mid_s" value="<?=$ma_bac_2?>" <? if(strstr("$all_quyen_cr_s","'$ma_bac_2'")) echo "checked=\"checked\""; ?> /></td>
	<td width="766" valign="middle"><? echo $rs_s["ten_$lg"]; ?></td>
	</tr>
	<? 
	 } 
	 } 
	 ?>
	
	  </table>
	<table width="100%"><tr><td class="lot">
  <? 
		  if($suid==1)
		  {
		  if($num>0){
		?>
  <input type="hidden" name="num" value="<?=$tam?>" />
  <input type="button" class="nut_nhan" name="Submit" value="<?=$main_tieu_de_update?>" onclick="javascript:update_quyen_catalog()" style="width:70px;" />
  <input type="reset" name="Submit22" value="<?=$main_buttom_sort_reset?>" class="nut_nhan">
  <? }}?>
  </td>
	</tr></table>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr><td width="59%" height="40" align="center" valign="middle">
		    <? pag_cat_sort_ma_user($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg,$ma_user); ?>
		  </td>
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
<? } else echo "Not permission!"; ?>
<? include("inc/bottom.php")?>
