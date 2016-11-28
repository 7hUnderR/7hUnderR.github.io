<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td width="50%" align="left" valign="middle" height="30" class="tab_lr_5 bg_page_border_bottom">
	<? 
	if(strstr($_SERVER['PHP_SELF'],"admin_view_images.php")) 
	{
	?>
		<select name="nganh_nghe" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" class="selected">
		<? 
		$result_=select_ko_dk("tb_images_ma","thu_tu","ASC");
		while($rs_= mysql_fetch_array($result_)) 
		{
		if($ma_user_admin==1)
		  $num_items=dem_max_dk("tb_images","ma_images",$rs_["ma_images"]);
		else
		  $num_items=dem_max_2dk("tb_images","ma_images",$rs_["ma_images"],"user",$ma_user_admin);
		?>
		<option value="admin_view_images.php?cat=<?=$rs_["ma_images"]?>&start=0" <? if($cat==$rs_["ma_images"]) echo"selected";?> > <? echo $rs_["ten_ma_images"]; echo " [ $num_items ]";?> </option>
		<? }?>
		</select>
   <? } ?>
	
	<?
	if(strstr($_SERVER['PHP_SELF'],"admin_view_files.php")) 
		{ 
	?>
		<select name="nganh_nghe" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" class="selected">
		<? 
		$result_=select_ko_dk("tb_files_ma","thu_tu","ASC");
		while($rs_= mysql_fetch_array($result_)) 
		{
		if($ma_user_admin==1)
		   $num_items=dem_max_dk("tb_files","ma_files",$rs_["ma_files"]);
		else
		   $num_items=dem_max_2dk("tb_files","ma_files",$rs_["ma_files"],"user",$ma_user_admin);
		?>
		<option value="admin_view_files.php?cat=<?=$rs_["ma_files"]?>&start=0" <? if($cat==$rs_["ma_files"]) echo"selected";?> > <? echo $rs_["ten_ma_files"]; echo " [ $num_items ]";?> </option>
		<? }?>
		</select>
	<? 
	} 
	?>
	
	<?
	if(strstr($_SERVER['PHP_SELF'],"admin_view_flash.php")) 
		{ 
	?>
		<select name="nganh_nghe" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" class="selected">
		<? 
		$result_=select_ko_dk("tb_flash_ma","thu_tu","ASC");
		while($rs_= mysql_fetch_array($result_)) 
		{
		if($ma_user_admin==1)
		$num_items=dem_max_dk("tb_flash","ma_files",$rs_["ma_files"]);
		else
		$num_items=dem_max_dk("tb_flash","ma_files",$rs_["ma_files"],"user",$ma_user_admin);
		?>
		<option value="admin_view_flash.php?cat=<?=$rs_["ma_files"]?>&start=0" <? if($cat==$rs_["ma_files"]) echo"selected";?> > <? echo $rs_["ten_ma_files"]; echo " [ $num_items ]";?> </option>
		<? }?>
		</select>
	<? 
	} 
	?>
 
  <? echo"$main_sort_view $alpha [ $num ]";?></td>
  <td width="50%" align="right" valign="middle" class="tab_lr_5 bg_page_border_bottom"><? include("inc/inc_lg.php"); ?></td>
</tr>
<tr>
  <td height="30" colspan="2" align="left" valign="middle" background="images/bg_icon.gif" class="tab_lr_5"><? 
  alpha_3dk($PHP_SELF,"cat",$cat,"b",1,"lg",$lg,$main_sort_by); ?></td>
</tr>
</table>
