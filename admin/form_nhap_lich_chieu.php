<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? include("inc/inc_path_top.php");?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				      <SCRIPT src="inc/js_date/calendar.js" type=text/javascript></SCRIPT>
      <SCRIPT src="inc/js_date/calendar-en.js" type=text/javascript></SCRIPT>
      <SCRIPT src="inc/js_date/calendar-setup.js" type=text/javascript></SCRIPT>
 <LINK title=win2k-1 media=all href="inc/js_date/calendar-win2k-1.css" 
      type=text/css rel=stylesheet>
<table id="datatable" class="tbldata" cellpadding=5 width="600" cellspacing=0 border=0>
	<script language="javascript">
	function Check_Values_nhap(from)
	{
	if(from.ngay_chieu.value ==""){
	alert("Please Enter Title!");
	from.chieu_chieu.focus();
	return (false);
	} 
	}
	</script>
	
	<form method="post" action="admin_add.php?ma_add=add_lich_chieu" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
	<? include("../tool/fckeditor.php") ;?>
	<thead>
	<tr>
	<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"New item";?></th>
	</tr>
	</thead>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td width="15%" valign=middle class="tab_10_bg_1"><?=$view_item_ngay?>	  <span class="dot_do">*</span></td>
	<td width="71%" height="22" valign=middle><INPUT name=ngay_chieu class="input" 
            id=ngay_chieu style=" width: 150px; " maxlength="20" value="<?=date('d/m/Y')?>"> &nbsp;<IMG 
            src="images/ew_calendar.gif" alt="Pick a Date" name="cngay_chieu" width="16" height="15" 
            id=cngay_chieu style="CURSOR: hand" align="absmiddle">
            <SCRIPT type=text/javascript>
Calendar.setup(
{
inputField : "ngay_chieu", // ID of the input field
ifFormat : "%d/%m/%Y", // the date format
button : "cngay_chieu" // ID of the button
}
);
</SCRIPT></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1"><?=$view_item_content?></td>
	<td height="20" valign=middle><?php
				$sBasePath = $_SERVER['PHP_SELF'];
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= " " ;
				$oFCKeditor->Create() ;
				?></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1">&nbsp;</td>
	<td height="20" valign=middle>
			<table height='30' cellpadding='0' cellspacing='0' class="text" >
                <tr>
                  <td height="30" valign='top' ><?=$view_item_ngay?>
                      <br />
                      <input name="ngay" value="<?=date('d/m/y')?>" type="text" class="input" style="width:100px;" />                  </td>
                  <td width='50' valign="top" ><?=$view_item_gio?>
                      <br />
                      <input name="gio" value="<?=date("g:i a")?>" type="text" class="input" id="gio3" style="width:100px;" /></td>
                  <td width='184' valign="top" ><?=$view_item_sort_num?>
                      <br />
                      <input name="thu_tu" value="<?=$thu_tu?>" type="text" class="input" id="gio4" style="width:100px;" /></td>
                </tr>
              </table></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="25" valign=middle>
	<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
	<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>	</td>
	</tr>
	<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
	<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
	<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
	</form>
	</table></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
