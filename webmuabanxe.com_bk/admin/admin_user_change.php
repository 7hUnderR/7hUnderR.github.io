<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$login_change_pass_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
			<table id="datatable" class="tbldata"  width="300" border="0" cellpadding="2" cellspacing="0">
			<form name="form1" method="post" action="admin_edit_save.php?save=user_pass">              <thead>
		      	   <?
					$table="tb_admin";
					$query = "Select * FROM  $table where ma_user=$ma_user_admin";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					?>
			  <tr valign="bottom">
               <th id="subjectheader" width="81" height="22">&nbsp;</Th>
              <th id="subjectheader" width="211" valign="middle"><?=$login_change_pass_page?></Th>
                </tr>
              </thead>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="middle" class="tab_10_bg_1" align="right"><?=$login_pass_old?></td>
            <td valign="top" class="line_bottom">
              <input name="a" type="password" size="25" maxlength="100" class="input" style="WIDTH:120px" >               </td>
                </tr>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="middle" class="tab_10_bg_1" align="right"><?=$login_pass?></td>
            <td valign="top" class="line_bottom">
              <input name="password" type="password" size="25" maxlength="100" class="input" style="WIDTH:120px">            </td>
            </tr>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="top" class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td valign="top" class="line_bottom">
			         <input type="hidden" name="id" value="<?=$rs["id"]?>">
				     <input name="Submit" type="submit" class="nut_nhan" value="<?=$login_change?>"> 
				     <input name="Submit2" type="reset" class="nut_nhan" value="<?=$view_item_reset?>">   
			</td>
              </tr>
	        </form> 
			   </table>
			   </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
