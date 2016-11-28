<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
if($suid==1)
{
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$menu_cap_tai_khoan?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
 				<?
					$cat=$HTTP_GET_VARS["cat"];
					$alpha=$HTTP_GET_VARS["alpha"];
					
					$start="0";
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}

					$PHP_SELF="admin_user.php";
					
 					 if($alpha=="All")
						 {
						 if($ma_user_admin==1)
						    $sort=" ";
						 else
						    $sort=" where id!=1 ";
						 }
					 else
						 {
						 if($ma_user_admin==1)
							 $sort=" where user like '".$alpha."%'";
						 else
						    $sort=" where id!=1 and user like '".$alpha."%'";
						 }
					 
					 $table="tb_admin";
					 $query = "Select * FROM  $table ";
					 $query.=$sort;
					 $result = mysql_query($query);
					 $tam=0;
					 $num = mysql_num_rows($result);
					 $page_count =10; 
					 $cut_off = 10; 
					 
					 include("inc/phantrang.php");
					 $query2 = "Select * FROM  $table ";
					 $query2.=$sort;
					 $query2.=" ORDER BY thu_tu ASC LIMIT $start, $page_count";
					 $result2 = mysql_query($query2);
					?>
                  <form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=sort_user">
					<? include("inc/inc_sort.php"); ?>
  <table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
    <!--DWLayoutTable-->
    <thead>
      <tr>
        <th width=3% height="23" align=center nowrap><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	  <th width="17%" id="senderheader"><?=$login_user?></th>
	  <th width="20%" id="senderheader"><?=$login_pass?></th>
	  <th width="16%" id="senderheader"><?=$item_name?></th>
	  <th width="19%" id="senderheader"><?=$view_item_quyen?></th>
	  <th width="7%" id="senderheader"><?=$main_tieu_de_thong_ke?></th>
	  <th width="10%" id="senderheader"><?=$main_tieu_de_thu_tu?></th>
	  <th width="8%" colspan="2" id="senderheader"><?=$main_tieu_de_update?></th>
	  </tr>
      </thead>
    <tbody>
      <input type="hidden" name="cat" value="<?=$cat?>">
    <input type="hidden" name="alpha" value="<?=$alpha?>">
    <input type="hidden" name="start" value="<?=$start?>">
    <input type="hidden" name="lg" value="<?=$lg?>">
	
    <? 
	 while($rs= mysql_fetch_array($result2)) 
	 {
	 $tam++; 
	 $ma_us=$rs["ma_user"];
	 $id=$rs["id"];
	 $link="#";
 	 if($rs["activate"]==1)
	   $on_off="<span class=xanh>On</span>";
	 else
	   $on_off="<span class=do>Off</span>";
	  
	  if($rs["quyen"]==0)
	  	  $quyen_text=$view_item_quyen_0;
	  if($rs["quyen"]==1)
	  	  $quyen_text=$view_item_quyen_1;
	  if($rs["quyen"]==2)
	  	  $quyen_text=$view_item_quyen_2;
	 //$num_ = dem_max_dk("tb_bac_1","ma_bac_1","$ma_bac_1");  
	 ?>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td height="24" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$id?>" ></td>
	  <td><img src="images/user_account.jpg" width="16" height="17" border="0" align="absmiddle"> <? echo $rs["user"]; ?></td>
	  <td><? echo "**********"; //$rs["pass"]; ?></td>
	  <td><? echo "<a href=\"#\" title=$rs[email]>".$rs["ten"]."</a>"; ?></td>
	  <td><? echo $quyen_text; ?> | <a href="admin_user_catalog.php?ma_user=<?=$ma_us?>&cat=0&alpha=All&start=0">View</a></td>
	  <td><?=$on_off?></td>
	  <td><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>" />
        <input name="thu_tu_<?=$tam?>" class="input" type="text"  size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();" /></td>
	  <td colspan="2" align="center"><a href="admin_user_edit.php?id=<? echo $rs["id"]?>&ma_edit=user"><img src="images/edit.gif" alt="Edit" border="0"></a></td>
	  </tr>
    <? } ?>
    </table>
	      <? 
		  if($suid==1)
		  {
		  if($num>0){
		?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/bg_icon.gif">
				  <tr>
					<td width="60%" height="30" align="left" valign="middle" class="tab_lr_5">
					<? 	include("inc/inc_select.php"); ?>
					<? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?></td>
					<td width="40%" align="right" valign="middle" class="tab_lr_5">
				      <input type="hidden" name="num" value="<?=$tam?>">
					<input type="image" src="images/update.gif" name="Submit3" title="<?=$update_page?>" align="absmiddle">
					
					<img src="images/reset.gif" onclick="messageList.reset();" style="cursor: pointer" alt="<?=$main_buttom_sort_reset?>" align="absmiddle"/>
					<img src="images/online.gif" onClick="activate_all_do('admin_activate.php','?ma_act=activate_user&key=activate')" style="cursor: pointer" alt="<?=$view_item_buttom_hien_thi?>" align="absmiddle"/>
					<img src="images/offline.gif" alt="<?=$view_item_buttom_khong_hien_thi?>" width="48" height="22" align="absmiddle" style="cursor: pointer" onClick="activate_all_do('admin_activate.php','?ma_act=activate_user&key=deactivate')"/>
					<img src="images/delete.gif" onClick="delete_all_do('admin_delete_wait.php','?ma_del=user')" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>" align="absmiddle"/>					</td>
				  </tr>
				</table>
				<? }}?>
				  <INPUT type=hidden value='' name="chon">
                    <INPUT type=hidden value='' name="chon_s">
                  </form>		
		    </td></tr>
                  </table>
			  <? ?>								
 			 </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? } else echo "Not permission!"; ?>
<? include("inc/bottom.php")?>
