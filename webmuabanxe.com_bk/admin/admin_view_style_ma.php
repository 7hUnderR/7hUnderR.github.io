<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$menu_file?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
						  <script language="javascript">
							function Check(from)
							{
							
								if(from.tendichvu.value ==""){
									alert("Please enter 'Folder Name' !");
									from.tendichvu.focus();
									return (false);
								  } 
								if(from.tendichvu.value.indexOf(" ")>0)
								{
									alert("'Folder Name' not space !");
									from.tendichvu.focus();
									return false;
								}
							}
						</script>
					<?
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
						$alpha=$HTTP_GET_VARS["alpha"];
					}
					$start="0";
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}


					 if($alpha=="All")
						 $sort="";
					 else
						 $sort="where ten_ma_files like '".$alpha."%'";

					 
					 $table="tb_style_site_ma";
					 $query = "Select * FROM  $table $sort ";
					 $result = mysql_query($query);
					 $num = mysql_num_rows($result);
					 $page_count =15; 
					 $cut_off = 10; 
					 $PHP_SELF ="admin_view_files_ma.php";
					 include("inc/phantrang.php");
					 $query = "Select * FROM  $table $sort order by thu_tu ASC LIMIT $start, $page_count";
					 $result = mysql_query($query);
					 $tam=0;
					 ?>
								<form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=sort_ma_files">
			 					<? include("inc/inc_sort.php"); ?>
								<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
									<!--DWLayoutTable-->
									<thead>
									  <tr>
										<th width=3% height="23" align=center nowrap><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
									  <th width="30%" id="senderheader"><?=$upload_select_folder?></th>
									  <th width="20%" id="senderheader"><?=$view_item_description?></th>
									  <th width="20%" id="senderheader"><? echo"Num"; ?></th>
									  <th width="15%" id="senderheader"><?=$main_tieu_de_thu_tu?></th>
									  <th width="10%" colspan="2" id="senderheader"><?=$main_tieu_de_update?></th>
									  </tr>
									  </thead>
									<tbody>
									  <input type="hidden" name="cat" value="<?=$cat?>">
									<input type="hidden" name="alpha" value="<?=$alpha?>">
									<input type="hidden" name="start" value="<?=$start?>">
									<input type="hidden" name="lg" value="<?=$lg?>">
									
									<? 
									 while($rs= mysql_fetch_array($result)) 
									 {
									 $tam++; 
									 $ma_files=$rs["ma_files"];
									 ?>
									<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
									  <td height="24" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$ma_files?>" ></td>
									  <td><a href="admin_view_style.php?cat=<?=$rs["ma_files"]; ?>&start=0"><? echo"<img src=\"images/folder.gif\" border=\"0\" align=\"absmiddle\"/> "; ?><?=$rs["ten_ma_files"] ?></a></td>
									  <td><?=$rs["mo_ta"] ?></td>
									  <td><? 
									  		 if($suid==1)
											 $num_ = dem_max_dk("tb_style_site","ma_files",$ma_files);
											 else
											 $num_ = dem_max_2dk("tb_style_site","ma_files",$ma_files,"user",$ma_user_admin);
										     echo"$num_";
									      ?></td>
									  <td><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>" />
										<input name="thu_tu_<?=$tam?>" class="input" type="text"  size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();" /></td>
									  <td colspan="2" align="center"><? if($num_==0) {?><a href="admin_view_style_ma_edit.php?id=<?=$rs["id"]?>&ma_edit=ma_style"><img src="images/edit.gif" alt="Edit" border="0"></a><? }?></td>
									  </tr>
									<? } ?>
									</table>
										<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/bg_icon.gif">
										  <tr>
											<td width="65%" height="30" align="left" valign="middle" class="tab_lr_5">
											<? 
											include("inc/inc_select.php"); 
											echo "[ <a href=admin_view_style_ma_add.php> Add news styles</a> ]";
											?>
											<? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?>
											</td>
											<td width="35%" align="right" valign="middle" class="tab_lr_5">
										    <input type="hidden" name="num" value="<?=$tam?>">
											<input type="image" src="images/update.gif" name="Submit3" title="<?=$update_page?>" align="absmiddle">
											<img src="images/reset.gif" onclick="messageList.reset();" style="cursor: pointer" alt="<?=$main_buttom_sort_reset?>" align="absmiddle"/>
											<img src="images/delete.gif" onClick="delete_all_do('admin_delete_wait.php','?ma_del=ma_style')" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>" align="absmiddle"/>
											</td>
										  </tr>
										</table>
										  <INPUT type=hidden value='' name="chon">
										  
					 </form>
          </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
