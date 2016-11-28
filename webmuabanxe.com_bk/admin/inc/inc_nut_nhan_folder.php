<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr><td width="25%" align="left" valign="middle" height="30" background="images/bg_icon.gif" class="tab_lr_5 check">
			<? 
			include("inc/inc_select.php");
			if($ma_user_admin==1) 
				include("inc/inc_new_folder.php");
			else
			{
			if($suid!=2)
			   include("inc/inc_new_folder.php");
			}
			?> 
	      </td>
		  <td width="75%" align="right" valign="middle" background="images/bg_icon.gif" class="tab_lr_5"><? 
		  if($suid!=2)
		  {
		  if($num>0){
			?>
			<input type="hidden" name="num" value="<?=$tam?>">
			<img src="images/back.gif" onClick="history.go(-1);" style="cursor: pointer" alt="Back" border="0" align="absmiddle">
			<input type="image" src="images/update.gif" name="Submit3" title="<?=$update_page?>" align="absmiddle">
			<img src="images/reset.gif" onclick="messageList.reset();" style="cursor: pointer" alt="<?=$main_buttom_sort_reset?>" align="absmiddle"/>
			<img src="images/online.gif" onClick="activate_muc_do()" style="cursor: pointer" alt="<?=$view_item_buttom_hien_thi?>" align="absmiddle"/>
			<img src="images/offline.gif" onClick="deactivate_muc_do()" style="cursor: pointer" alt="<?=$view_item_buttom_khong_hien_thi?>" align="absmiddle"/>
			<? if($ma_user_admin==1) {?>
			<img src="images/online_do.gif" onClick="activate_all_do('admin_activate.php','?ma_act=activate_folder_set&key=activate')" style="cursor: pointer" alt="<?=$view_item_buttom_hien_thi?>" align="absmiddle"/>
			<img src="images/offline_do.gif" onClick="activate_all_do('admin_activate.php','?ma_act=activate_folder_set&key=deactivate')" style="cursor: pointer" alt="<?=$view_item_buttom_khong_hien_thi?>" align="absmiddle"/>
			<? } ?>
			<img src="images/delete.gif" onClick="delete_muc_do()" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>" align="absmiddle"/>
			<? }}?></td>
		  </tr>
		  <tr><td height="30" colspan="2" align="center" valign="middle" class="tab_lr_5 bg_page"><? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?></td>
	      </tr>
        </table>
