<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
		  <tr><td width="40%" height="40" align="center" valign="middle" class="S10"><? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?></td>
		  <td width="60%" align="right" valign="middle"><? if($suid==1){
		  if($num>0){
		?>
		<input type="hidden" name="num" value="<?=$tam?>">
		<input type="submit" name="Submit3" value="<?=$update_page?>" class="nut_nhan">
		<input type="reset" name="Submit22" value="<?=$main_buttom_sort_reset?>" class="nut_nhan">
		<input type="button" name="Submit32" value="<?=$view_item_buttom_hien_thi?>" onClick="activate_muc_do()" class="nut_nhan">
		<input type="button" name="Submit42" value="<?=$view_item_buttom_khong_hien_thi?>" onClick="deactivate_muc_do()" class="nut_nhan">
		<? if($ma_user_admin==1) {?>
		<input type="button" name="Submit32" value="<?=$view_item_buttom_hien_thi?>" onClick="activate_all_do('admin_activate.php','?ma_act=activate_folder_set&key=activate')" class="nut_nhan_do">
		<input type="button" name="Submit42" value="<?=$view_item_buttom_khong_hien_thi?>" onClick="activate_all_do('admin_activate.php','?ma_act=activate_folder_set&key=deactivate')" class="nut_nhan_do">
		<? } ?>
		<input type="button" name="Submit22" value="<?=$view_item_buttom_xoa?>" onClick="delete_muc_do()" class="nut_nhan_do">
		<? }}?>
		</td>
		  </tr>
        </table>