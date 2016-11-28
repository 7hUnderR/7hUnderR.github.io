<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$main_new_folder?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
            <table id="datatable" class="tbldata" cellpadding=10 width="420" cellspacing=0 border=0>
							 <!--DWLayoutTable-->
							<form name="form1" method="post" action="admin_add.php?ma_add=ma_files" onSubmit="return Check(this)">							<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><?=$main_new_folder?></th>
							  </tr>
							  </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$main_folder?></td>
							  <td height="22" valign=middle><input name="tendichvu"  type="text" class="input" id="tendichvu" style="width:300px;"></td>
							  </tr>
<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="29%" valign=middle class="tab_10_bg_1"><?=$view_item_description?></td>
				  <td width="71%" height="22" valign=middle><input name="mo_ta" type="text" class="input" id="tendichvu" style="width:300px;"></td>
				</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
								<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>">
								<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>								</td>
							  </tr>
							</form>
				  </table>
							
							
                              <? ?>
		    </td></tr>
                  </table>
  <? ?>								
								
								
          </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
