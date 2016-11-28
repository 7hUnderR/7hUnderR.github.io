<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td valign="top" width="85%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="bottom" class="bg_title"><? echo"<a href=\"forum.php?start=0\">$menu_forum</a> > $edit_page"; ?>	</td>
             </tr>
              <tr>
                <td height="245" valign="top" class="tab_left_10"><br>
				<?
				$edit=$HTTP_GET_VARS["ma_edit"];
				
				if($edit=="admin_update_auto"){
							$account=rep($HTTP_POST_VARS["account"]);
								
							$table="tb_member_auto";
							$query = "UPDATE $table SET account='$account' ";
							if($result = mysql_query($query))
							echo"Update completed !";
							echo" <input type=button class=\"nut_nhan\" value=\"Back\" onClick=\"history.go(-1);\" name=\"button\">";
							
						 }
			?></td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
