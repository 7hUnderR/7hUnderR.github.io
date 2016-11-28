<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td width="35%" height="30" align="left" valign="middle" background="images/bg_icon.gif" class="tab_lr_5"><? 
			include("inc/inc_select.php");
		    include("inc/inc_new_item.php");
			?></td>
	<td width="65%" align="right" valign="middle" background="images/bg_icon.gif" class="tab_lr_5">
	<? if($num>0){ ?>
	<input type="hidden" name="num" value="<?=$i?>">
	<img src="images/back.gif" onClick="history.go(-1);" style="cursor: pointer" alt="Back" border="0" align="absmiddle">
	<input type="image" src="images/update.gif" name="Submit3" title="<?=$main_tieu_de_update?>" align="absmiddle">
	<img src="images/reset.gif" onclick="messageList.reset();" style="cursor: pointer" alt="<?=$main_buttom_sort_reset?>" align="absmiddle"/>
	<img src="images/change_catalog.gif" onClick="chuyen_baiviet('<?=$cat?>')" style="cursor: pointer" alt="<?=$view_item_chuyen?>" align="absmiddle"/>
	<img src="images/online.gif" onClick="activate_do()" style="cursor: pointer" alt="<?=$view_item_buttom_hien_thi?>" align="absmiddle"/>
	<img src="images/offline.gif" onClick="deactivate_do()" style="cursor: pointer" alt="<?=$view_item_buttom_khong_hien_thi?>" align="absmiddle"/>
	<img src="images/typical.gif" onClick="activate_index()" style="cursor: pointer" alt="<?=$view_item_buttom_tieu_bieu?>" align="absmiddle"/>
	<img src="images/un_typical.gif" onClick="deactivate_index()" style="cursor: pointer" alt="<?=$view_item_buttom_khong_tieu_bieu?>" align="absmiddle"/>
	<img src="images/delete.gif" onClick="delete_do()" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>" align="absmiddle"/>
	<? } ?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" class="tab_lr_5 bg_page"><? pag_all_product($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$bac,$lg,$alpha);?></td>
  </tr>
</table>

