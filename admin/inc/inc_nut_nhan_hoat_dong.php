<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td width="35%" height="30" align="left" valign="middle" background="images/bg_icon.gif" class="tab_lr_5"><? 
			include("inc/inc_select.php");
			echo"<a href=\"form_nhap_product_2_images_6nd_view.php?cat=$cat_product&bac=$bac_product&start=0&lg=$lg\">Back Product</a>";
			?></td>
	<td width="65%" align="right" valign="middle" background="images/bg_icon.gif" class="tab_lr_5">
	<? if($num>0){ ?>
	<input type="hidden" name="num" value="<?=$i?>">
	<img src="images/update.gif" onClick="activate_hoat_dong('admin_activate.php','?ma_act=activate_hoat_dong&key=activate')" style="cursor: pointer" align="absmiddle"/>
	<? } ?></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" class="tab_lr_5 bg_page"><? 
	  $back="&laquo; Back";
	  $next="Next &raquo;";
	  $dong="]";
	  $mo="[";
	  
    phan_trang_7dk($page_count,$num,"cat",$cat,"bac",$bac,"start",$start,"lg",$lg,"id_product",$id_product,"cat_product",$cat_product,"bac_product",$bac_product,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo)
	?></td>
  </tr>
</table>

