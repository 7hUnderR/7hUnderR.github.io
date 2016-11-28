<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
						include("inc/inc_path_top.php");
						$id=$HTTP_GET_VARS["id"];
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
					?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><table id="datatable" class="tbldata" cellpadding="5" width="600" cellspacing="0" border="0">
      <script language="JavaScript" type="text/javascript">
					function Check_Values_nhap(from)
					{
					if(from.ten.value ==""){
					alert("Please Enter Title!");
					from.ten.focus();
					return (false);
					} 
					}
					</script>
       <form method="post" action="admin_edit_save.php?save=edit_weblink&id=<?=$HTTP_GET_VARS["id"]?>&lg=<?=$lg?>&start=<?=$HTTP_GET_VARS["start"]?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
        <thead>
          <tr>
            <th height="23" colspan="2" valign="middle" id="senderheader"><? 
						echo"Edit item";
						$id=$HTTP_GET_VARS["id"];
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
					?></th>
          </tr>
        </thead>
        <tr bgcolor='ffffff' onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#EAEAEA';">
          <td width="15%" valign="middle" class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td height="22" valign="middle"><? include("inc/inc_go_dau_vn.php"); ?></td>
        </tr>
        <tr bgcolor='ffffff' onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#EAEAEA';">
          <td valign="middle" class="tab_10_bg_1"><span class="text">
            <?=$view_item_tieude ?>
          </span></td>
          <td width="71%" height="22" valign="middle"><span class="dot_do">
            <input name="ten" onkeyup="initTyper(this);" type="text" class="input" id="ten" style="width:400px;" value="<?=$rs_p["ten_$lg"];?>" />
            *</span></td>
        </tr>
        <tr bgcolor='ffffff' onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#EAEAEA';">
          <td valign="middle" class="tab_10_bg_1"><span class="text">
            <?=$view_item_link ?>
          </span></td>
          <td height="22" valign="middle"><span class="dot_do">
            <input name="ghi_chu" type="text" class="input" id="ghi_chu" style="width:400px;" value="<?=$rs_p["ghi_chu_$lg"];?>" />
          </span></td>
        </tr>
        <tr bgcolor='ffffff' onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#EAEAEA';">
          <td valign="middle" class="tab_10_bg_1">&nbsp;</td>
          <td height="20" valign="middle"><table width="100%" height='50' cellspacing='0' cellpadding='0'>
            <!--DWLayoutTable-->
            <tr>
              <td width="100" height="56" valign='top' class="S10"><?=$view_item_ngay?>
                  <br />
                  <input name="ngay" value="<?=$rs_p["ngay"]?>" type="text" class="input" style="width:100px;" />
              </td>
              <td width='100' valign="top" class="S10"><?=$view_item_gio?>
                  <br />
                  <input name="gio" value="<?=$rs_p["gio"]?>" type="text" class="input" id="gio5" style="width:100px;" /></td>
              <td width='589' valign="top" class="S10"><?=$view_item_sort_num?>
                  <br />
                  <input name="thu_tu" value="<?=$rs_p["thu_tu"]?>" type="text" class="input" id="gio4" style="width:100px;" /></td>
            </tr>
          </table></td>
        </tr>
        <tr bgcolor='ffffff' onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#EAEAEA';">
          <td valign="top" class="tab_10_bg_1">&nbsp;</td>
          <td height="20" valign="middle"><span class="S10">
            <input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>">
            <img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src='';" style="cursor: pointer" alt="<?=$view_item_reset?>"/> <img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/> </span></td>
        </tr>
            <input name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type="hidden" />
            <input name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type="hidden" />
            <input name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type="hidden" />
            <input name="page" value="<?=$HTTP_GET_VARS["page"]?>"type="hidden" />
      </form>
    </table></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
