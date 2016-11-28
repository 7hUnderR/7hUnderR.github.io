<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$menu_file?></td>
             </tr>
              <tr>
                <td valign="top" class="bg_center">
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
						 $sort=" where ma_files=$cat ";
					 else
						 $sort=" where ma_files=$cat and ten_files_ like '".$alpha."%' ";

					 
					$table="tb_style_site";
					if($suid==1)
					$query = "Select * FROM  $table $sort";
					else
					$query = "Select * FROM  $table $sort and user=$ma_user_admin";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num = mysql_num_rows($result);
					$PHP_SELF="admin_view_style.php";
					$page_count =10; 
					$cut_off = 10; 

					include("inc/phantrang.php");
					 
					if($suid==1)
					$query = "Select * FROM  $table $sort ORDER BY thu_tu DESC LIMIT $start, $page_count";
					else
					$query = "Select * FROM  $table $sort and user=$ma_user_admin ORDER BY thu_tu DESC LIMIT $start, $page_count";
					$result = mysql_query($query);
					$i=0;
					$tam=0;
					$path_sub=path_upload_mannager("styles");
					?>
					<form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=sort_style">
  					<? include("inc/inc_sort_images.php"); ?>
					  <table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
									<!--DWLayoutTable-->
									<thead>
									  <tr>
										<th width=3% height="23" align=center nowrap><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
									  <th width="30%" id="senderheader"><?=$upload_select_folder?></th>
									  <th width="10%" id="senderheader"><?=$main_tieu_de_thong_ke?></th>
									  <th width="10%" id="senderheader">Size</th>
									  <th width="10%" id="senderheader">Poster</th>
									  <th width="20%" id="senderheader"><?=$view_item_description?></th>
									  <th width="20%" id="senderheader"><?=$item_note?></th>
									  <th width="10%" id="senderheader"><?=$main_tieu_de_thu_tu?></th>
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
									 $id=$rs["id"];
									 ?>
									<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
									  <td height="24" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$id?>" ></td>
									  <td><? if($rs["ten_files"]!="") {echo"<a href=\"../$path_sub/$rs[ten_files]\" target=\"_blank\">$rs[ten_files_]</a>";}?></td>
									  <td><? if($rs["activate"]==1) echo"<span class=dot_xanh>On</span>"; else echo"<span class=dot_do>Off</span>";?></td>
									  <td><?  echo fsize("../$path_sub/$rs[ten_files]");?></td>
									  <td class="lot"><? $nguoi_dang = gia_tri_mot_cot("tb_admin","ma_user",$rs["user"],"user");
									  echo $nguoi_dang;?></td>
									  <td class="lot"><? echo "$rs[ngay] "; ?></td>
									  <td><? echo "$rs[ghi_chu] ";?></td>
									  <td><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>" />
										<input name="thu_tu_<?=$tam?>" class="input" type="text"  size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();" /></td>
					    </tr>
									<? } ?>
					  </table>
									 
										<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/bg_icon.gif">
										  <tr>
											<td width="65%" height="30" align="left" valign="middle" class="tab_lr_5">
											<? 
											include("inc/inc_select.php"); 
											echo "[ <a href=\"admin_upload_style.php\">Add new file</a> ]";
											?>
											<? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?>
											</td>
											<td width="35%" align="right" valign="middle" class="tab_lr_5">
										    <input type="hidden" name="num" value="<?=$tam?>">
											<input type="image" src="images/update.gif" name="Submit3" title="<?=$update_page?>" align="absmiddle">
												<img src="images/online.gif" onClick="activate_all_do('admin_activate.php','?ma_act=style_file&key=activate&cat=<?=$cat?>&lg=<?=$lg?>&start=<?=$start?>')" style="cursor: pointer" alt="<?=$view_item_buttom_hien_thi?>" align="absmiddle"/>
	<img src="images/offline.gif" onClick="activate_all_do('admin_activate.php','?ma_act=style_file&key=deactivate&cat=<?=$cat?>&lg=<?=$lg?>&start=<?=$start?>')" style="cursor: pointer" alt="<?=$view_item_buttom_khong_hien_thi?>" align="absmiddle"/>

											<img src="images/reset.gif" onclick="messageList.reset();" style="cursor: pointer" alt="<?=$main_buttom_sort_reset?>" align="absmiddle"/>
											<img src="images/delete.gif" onClick="delete_all_do('admin_delete_wait.php','?ma_del=style')" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>" align="absmiddle"/>
											</td>
										  </tr>
										</table>									    
										  <INPUT type=hidden value='' name="chon">
				  </form>	</td>
                          </tr>
            </table>
			</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
