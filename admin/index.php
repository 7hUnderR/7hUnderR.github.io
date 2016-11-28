<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> Index</td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><?
					$cat="1";
					if(isset($HTTP_GET_VARS["cat"])){
						$cat = $HTTP_GET_VARS["cat"];
					}
					
					$bac="1";
					if(isset($HTTP_GET_VARS["bac"])){
						$bac = $HTTP_GET_VARS["bac"];
					}
					
					$alpha="All";
					if(isset($HTTP_GET_VARS["alpha"])){
						$alpha = $HTTP_GET_VARS["alpha"];
					}
					$start=0;
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}
					
					if(isset($HTTP_GET_VARS["lg"]))
					{
						$lg = $HTTP_GET_VARS["lg"];
					}
					
					$all_quyen_cr=gia_tri_mot_cot("tb_admin","ma_user","$ma_user_admin","quyen_catalog");
					$all_quyen_cr= str_replace (",", "','", $all_quyen_cr);
 
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
					 $PHP_SELF="index.php";
					 $page_count =30; 
					 $cut_off = 5; 
					 include("inc/phantrang.php");
					 $query2 = "Select * FROM  $table ";
					 $query2.=$sort;
					 $query2.=" ORDER BY activate_setup DESC, thu_tu ASC LIMIT $start, $page_count";
					 $result2 = mysql_query($query2);
				     
				?>
        <form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=sort">
		<? include("inc/inc_sort.php"); ?>
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
	<thead>
	<tr>
	<th width=2% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll"  title="Select or deselect all"></th>
	<th width=40% id="senderheader"><?=$main_tieu_de_trang?></th>
	<th id="subjectheader" width=20%><?=$main_tieu_de_in_folder?></th>
	<th id="subjectheader" width=20%><?=$main_tieu_de_thong_ke?></th>
	<th id="subjectheader" width=13%><?=$main_tieu_de_thu_tu?></th>
	<th id="subjectheader" width=6%><?=$edit_page?></th>
	</tr>
	</thead>
	<tbody>
	<input type="hidden" name="cat" value="<?=$cat?>">
	<input type="hidden" name="bac" value="<?=$bac?>">
	<input type="hidden" name="alpha" value="<?=$alpha?>">
	<input type="hidden" name="start" value="<?=$start?>">
	<input type="hidden" name="lg" value="<?=$lg?>">
	<? 
		 while($rs= mysql_fetch_array($result2)) 
		 {
		 $tam++; 
		 $ma_bac_1=$rs["ma_bac_1"];
		 $page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm","$rs[trang]","ma_bac","1","file_view");
		 $tb_detail=gia_tri_mot_cot_2dk("tb_setup","ma_dm","$rs[trang]","ma_bac","1","tb");
		 
		 $activate=$rs["activate"];
		 if($activate==1)
		   $on_off="<span class=xanh>On</span>";
		 else
		   $on_off="<span class=do>Off</span>";
		
		if($rs["activate_setup"]==1)
		   {
		   $style="";
		   $folder="folder.gif";
		   }
		else
		   {
		   $style="class=text_off";
		   $folder="folder_deactive.gif";
		   }
		//sub folder
		if($ma_user_admin==1) 
			 $num_ = dem_max_dk("tb_bac_2","ma_bac_1","$ma_bac_1");
		else
			 $num_ = dem_max_2dk("tb_bac_2","ma_bac_1","$ma_bac_1","activate_setup",1);
			 
		  $link="$page_view?cat=$ma_bac_1&bac=$bac&start=0&lg=$lg";
	   	  $link_in="index_2.php?cat=$ma_bac_1&alpha=All&start=0&lg=$lg";
		if($num_>0)
		  $link_icon=$link_in;
		else
		  $link_icon=$link;
			
			if($suid==2)
			{
			  $num_item=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"nguoi_viet",$ma_user_admin);
			  $num_item_deactivate=dem_max_4dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","0","nguoi_viet",$ma_user_admin);
			  $num_item_activate=dem_max_4dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","1","nguoi_viet",$ma_user_admin);
			}
			else
			{
			  $num_item=dem_max_2dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0);
			  $num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","0");
			  $num_item_activate=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","1");
			}
		   $dtc=dem_max_dk("tb_quanly_truycap","ma_bac_1",$ma_bac_1); 
		 ?>
	<tr <?=$style?> bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$ma_bac_1?>"></td>
	<td><? echo "<a href=\"$link_icon\" ><img src=\"images/$folder\" border=\"0\" align=\"absmiddle\"/></a> "; ?><input name="ten_<?=$tam?>" type="text"  size="50" class="input" value="<?=$rs["ten_$lg"]?>" ></td>
	<td><? echo" <a href=\"$link\" title=\"$main_tieu_de_in_folder $main_view_item\" >$main_view_item</a>"; echo" | <a href=\"$link_in\" title=\"$main_tieu_de_in_folder $main_in_folder\">$main_in_folder</a>";  if($ma_user_admin==1) echo " | $rs[trang]"; ?></td>
	<td><? 
			echo"<span class=\"lot\"><A href=\"javascript:openWin('inc/folder_content.php?id=$rs[id]&bac=1&lg=$lg','smilies','toolbar=0,location=0,status=0,menubar=0,scrollbars=1,resizable=1,width=500,height=350')\" title=\"$note_statictics\"><b>?</b></a></span>"; 
			echo" <span class=\"lot\">$num_ | <span class=S10>$num_item</span> | <span class=dot_do>$num_item_deactivate</span> | <span class=dot_xanh>$num_item_activate</span> | $dtc </span> | $on_off";
			?></td>
	<td><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>">
              <input name="thu_tu_<?=$tam?>" type="text"  class="input" size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();"></td>
	<td align="center"><? include("inc/inc_edit_folder.php");?></td>
	</tr>
	<? } ?>
	</tbody>
</table>
		<? include("inc/inc_nut_nhan_folder.php");?>
		<INPUT type=hidden value='' name="chon">
		</form>		
		  </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
