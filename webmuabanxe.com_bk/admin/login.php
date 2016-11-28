<? include("inc/banner_login.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left" align="center"><br></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><?=$login_tieude?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<table id="datatable" class="tbldata"  width="250" border="0" cellpadding="2" cellspacing="0">
			  <form name="frmLogin" method="post" action="login_test.php?goto=" onsubmit="return checkInput();" o>
              <thead>
			  <tr valign="bottom">
               <th id="subjectheader" width="68" height="22">&nbsp;</Th>
              <th id="subjectheader" width="213" valign="middle"><?=$msg?></Th>
                </tr>
              </thead>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td align="right" valign="middle" class="tab_10_bg_1"><?=$login_user?></td>
            <td valign="top" class="line_bottom">
              <input type="text" name="txtUser" size="25" maxlength="100" class="input" style="FONT: 11px verdana,arial,helvetica; WIDTH:120px" >               </td>
                </tr>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td align="right" valign="middle" class="tab_10_bg_1"><?=$login_pass?></td>
            <td valign="top" class="line_bottom">
              <input type="password" name="txtPWD" size="25" maxlength="100" class="input" style="FONT: 11px verdana,arial,helvetica;WIDTH:120px">            </td>
            </tr>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="top" class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td valign="top" class="line_bottom"><input type="image" src="images/login.gif" name="Signin" title="<?=$login_buttom?>"></td>
              </tr>
	        </form> 
			   </table>               
				<? ?>

          </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom_login.php")?>
