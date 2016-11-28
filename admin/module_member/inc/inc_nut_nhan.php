<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
[ <A href="javascript:check(true)"><?=$view_item_selet_all?></A> | <A href="javascript:check(false)"><?=$view_item_unselet_all?></A> ] 

<input type="hidden" name="num" value="<?=$i?>">
<input type="button" name="Submit32" value="<?=$view_item_buttom_hien_thi?>" onClick="activate_do()" class="nut_nhan">
<input type="button" name="Submit42" value="<?=$view_item_buttom_khong_hien_thi?>" onClick="deactivate_do()" class="nut_nhan">
<input type="button" name="Submit22" value="<?=$view_item_buttom_xoa?>" onClick="delete_do()" class="nut_nhan">
