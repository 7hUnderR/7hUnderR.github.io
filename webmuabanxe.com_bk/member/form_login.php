				<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
				<SCRIPT language=JavaScript>
				<!--
				function check_Login_(){
					if (document.getElementById("user").value==""){
						alert("Vui lòng kiểm tra lại tên sử dụng!");
						document.getElementById("user").focus();
						return false;
					}
					
					if (document.getElementById("password").value==""){
						alert("Vui lòng kiểm tra lại mật khẩu!");
						document.getElementById("password").focus();
						return false;
					}
					return true;
				}
				function redirect(URLStr) { 
					location = URLStr; 
				}
				-->
				</script>
				<?php
				$editFormAction = $_SERVER['PHP_SELF'];
				if (isset($_SERVER['QUERY_STRING']))
				 {
					$editFormAction .= "?" . $_SERVER['QUERY_STRING'];
				 }

				
				$txtUser = "Tên sử dụng";
				if ((isset($_POST["login_form_"])) && ($_POST["login_form_"] == "login_form_") && isset($_POST["user"]) && isset($_POST["password"])) {
					$txtUser = $_POST["user"];
					$txtPWD = $_POST["password"];
					$txtPWD = md5($txtPWD);
					$sql="select ma_user,email,pass,ten,kichhoat from tb_member where email='".$txtUser."'";	
					$result = mysql_query($sql);
					$i = mysql_num_rows($result);
						if($i){
							$row=mysql_fetch_row($result);
							if($row[2]==$txtPWD)				
							{						
								if($row[4]==1)
								{
									$ma_dang_nhap=$row[0];
									$ten_dang_nhap=$row[3];
									$HTTP_SESSION_VARS['ma_dang_nhap'] = $ma_dang_nhap;
									$HTTP_SESSION_VARS['ten_dang_nhap'] = $ten_dang_nhap;
									//session_register("suid","susername_forum_sunimex","sten","smodule");
									
									echo "<script  language='JavaScript'>";
									//echo "alert('OK!');";
									echo "redirect('$editFormAction');";
									echo "</script>";
								}
								else
								{
									$ma_dang_nhap=-3;
									$HTTP_SESSION_VARS['ma_dang_nhap'] = $ma_dang_nhap;
									//session_register("suid_forum_sunimex");
									
									echo "<script  language='JavaScript'>";
									echo "alert('Tài khoản này chưa được kích hoạt, xin vui lòng liên hệ với admin!');";
									echo "redirect('$editFormAction');";
									echo "</script>";
								}
							}
							else
							{
								//$txtUser = "UserName";
								$ma_dang_nhap=-1;
								$HTTP_SESSION_VARS['ma_dang_nhap'] = $ma_dang_nhap;
								//session_register("suid_forum_sunimex");
								echo "<script  language='JavaScript'>";
								echo "alert('Tên sử dụng và mật khẩu không chính xác, xin vui lòng thực hiện lại!');";
								echo "redirect('$editFormAction');";
								echo "</script>";
							}
							
						}
						else
						{
							$txtUser = "Tên sử dụng";
							$ma_dang_nhap=-2;
							$HTTP_SESSION_VARS['ma_dang_nhap'] = $ma_dang_nhap;
							//session_register("suid_forum_sunimex");		
							echo "<script  language='JavaScript'>";
							echo "alert('Tên sử dụng và mật khẩu không chính xác, xin vui lòng thực hiện lại!');";
							echo "redirect('$editFormAction');";
							echo "</script>";	
						}
					}
				
				?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td height="103" style="padding-left:10px; padding-top:10px;"><table width="80%" border="0" cellspacing="0" cellpadding="0">
					<form name="login_form_" method="post" action="<?php echo $editFormAction; ?>" onSubmit="return check_Login_(this);">
				<input type="hidden" name="login_form_" value="login_form_">

                    <tr>
                      <td class="text_login">Email</td>
                    </tr>
                    <tr>
                      <td><input name="user" type="text" class="textfield" id="user" size="20" /></td>
                    </tr>
                    <tr>
                      <td class="text_login">Mật khẩu </td>
                    </tr>
                    <tr>
                      <td><input name="password" type="password" class="textfield" id="password" size="20" /></td>
                    </tr>
                    <tr>
                      <td height="25"><input type="image" src="images/btn_login.gif" name="Submit" value="Submit" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
					  <?
						$query_catalog = "Select * FROM  tb_bac_2 where trang in ('50','51') and activate=1 and activate_setup=1 order by thu_tu ASC ";
						$result_catalog = mysql_query($query_catalog);
						while($rs_catalog= mysql_fetch_array($result_catalog))
						{
						$ma_bac_2=$rs_catalog["ma_bac_2"];
						$ten=$rs_catalog["ten_$lg"];
						$link="<a href=\"./?Bcat=$ma_bac_2&lg=$lg&start=$start\">$ten</a>";
						 ?>
					  <tr>
						<td height="18" align="left" valign="middle" class="text_login" style="padding-left: 20px;"><?=$link?></td>
					  </tr>
					  <? } ?>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
					</form>
      </table></td>
  </tr>
</table>
