<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
if($suid==1)
{
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$menu_cap_tai_khoan?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				  <?
					$id=$HTTP_GET_VARS["id"];
					$ma_edit=$HTTP_GET_VARS["ma_edit"];
				    if($ma_edit=="user")
						{
						$table="tb_admin";
						$query = "Select * FROM  $table  WHERE id=$id ";
						$result = mysql_query($query);
						$rs= mysql_fetch_array($result);
						}
				  ?>
            <table id="datatable" class="tbldata" cellpadding=10 width="320" cellspacing=0 border=0>
							 <!--DWLayoutTable-->
<form name="noi_dung" method="post" ENCTYPE="multipart/form-data"  action="admin_edit_save.php?id=<? echo $id?>&save=<?=$ma_edit?>">
							<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><?=$login_new_user?></th>
							  </tr>
							  </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$item_name?></td>
							  <td height="22" valign=middle><input name="name" value="<?=$rs["ten"]?>" type="text" class="input" id="user_name" style="width:150px;" /></td>
							  </tr>
                            <tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
                              <td valign="middle" class="tab_10_bg_1"><?=$item_email?></td>
                              <td height="22" valign="middle"><input name="email" value="<?=$rs["email"]?>" type="text" class="input" id="tendichvu" style="width:150px;" /></td>
                            </tr>
                <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="29%" valign=middle class="tab_10_bg_1"><?=$login_user?></td>
				  <td width="71%" height="22" valign=middle><input name="user_name" value="<?=$rs["user"]?>" type="text" class="input" id="tendichvu" style="width:150px;"></td>
				</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$login_pass?></td>
							  <td height="22" valign=middle><input name="password" type="password" class="input" id="password" style="width:150px;" /></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_quyen?></td>
							  <td height="20" valign=middle><select name="quyen" class="selected" id="quyen" style="width:150px;">
                                      <option value="1" <? if($rs["quyen"]==1) echo"selected";?>><?=$view_item_quyen_1?></option>
									  <option value="0" <? if($rs["quyen"]==0) echo"selected";?>><?=$view_item_quyen_0?></option>
									  <option value="2" <? if($rs["quyen"]==2) echo"selected";?>><?=$view_item_quyen_2?></option>
                              </select></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
				<input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
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
<? } else echo "Not permission!"; ?>
<? include("inc/bottom.php")?>
