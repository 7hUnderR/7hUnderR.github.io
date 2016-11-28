<?
 $trang_here=76;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput_login(param)
{  
	if (isEmail(param.email.value)==false){
		alert("Vui lòng nhập địa chỉ Email!");
		param.email.focus();
		return false;
	}
	if (param.password.value==""){
		alert("Vui lòng nhập mật khẩu!");
		param.password.focus();
		return false;
	}
}       	  		
//Kiem tra email
function isEmail(email){
	//If email is null
	if(email==""){
		return false;
	}
	//If email have space
	if(email.indexOf(" ")>0){
		return false;
	}
	//Neu email don't have @
	if(email.indexOf("@") == -1){
		return false;
	}
	
	var i = 1;
	var emailLength = email.length;
	if(email.indexOf(".") == -1){
		return false;
	}
	//Neu email la chuoi co hai dau . gan nhau
	if(email.indexOf("..")!=-1){
		return false;
	}
	//Neu email la chuoi co nhieu dau @
	if(email.indexOf("@") != email.lastIndexOf("@")){
		return false;
	}
	//Neu email la chuoi co dau . dau cung
	if(email.lastIndexOf(".")==email.length-1){
		return false;
	}
	//Neu email la chuoi co ky tu khong thuoc cac ky tu sau
	var str="abcdefghijklmnopqrstuvwxyz-@._0123456789";
	for(var j = 0; j<emailLength; j++){
		if(str.indexOf(email.charAt(j))==-1){
			return false;
		}
	}
	return true;
}

function redirect(URLStr) { 
	location = URLStr; 
}
</script>
<?php

if ((isset($_POST["login_form_"])) && ($_POST["login_form_"] == "login_form_") && isset($_POST["email"]) && isset($_POST["password"])) {
	$email = $_POST["email"];
	$txtPWD = $_POST["password"];
	$txtPWD = md5($txtPWD);
	
	$sql="select ma_user,email,pass,ten,kichhoat from tb_shopping_cart_account where email='".$email."'";	
	$result = mysql_query($sql);
	$i = mysql_num_rows($result);
	if($i){
		$row=mysql_fetch_row($result);
		if($row[2]==$txtPWD)				
		{						
			if($row[4]==1)
			{
				//$suid=$row[0];
				//$ten_dang_nhap=$row[1];
				//$sten=$row[3];
				//$smodule=1;
				//session_register("suid","ten_dang_nhap","sten","smodule");
				$HTTP_SESSION_VARS['ma_dang_nhap'] = $row[0];
				$HTTP_SESSION_VARS['ten_dang_nhap'] = $row[3];

				echo "<script  language='JavaScript'>";
				echo "redirect('$form_action');";
				echo "</script>";
			}
			else
			{
				$suid=-3;
				//session_register("suid");
				$HTTP_SESSION_VARS['suid'] = $suid;
				
				echo "<script  language='JavaScript'>";
				echo "alert(' Email address and/or password you\'ve entered is invalid.')";
				echo "redirect('$form_action');";
				echo "</script>";
			}
		}
		else
		{
			//$txtUser = "UserName";
			$suid=-1;
			//session_register("suid");
			$HTTP_SESSION_VARS['suid'] = $suid;
			
			echo "<script  language='JavaScript'>";
			echo "alert(' Email address and/or password you\'ve entered is invalid.');";
			echo "redirect('$form_action');";
			echo "</script>";
		}
		
	}
	else
	{
		$suid=-2;
		//session_register("suid");		
		$HTTP_SESSION_VARS['suid'] = $suid;
		echo "<script  language='JavaScript'>";
		echo "alert('Email address and/or password you\'ve entered is invalid.');";
		echo "redirect('$form_action');";
		echo "</script>";	
	}
}

?>
<link href="shopping_cart/style.css" rel="stylesheet" type="text/css" />

  		<table class="block_1" cellspacing=0 cellpadding=0 
		width="100%" border=0>
		<tbody>
		  <tr>
			<td width="90%" valign="middle"><div class=title><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ten_$lg")?></div></td>
			<td width="10%" valign="middle"><img 
			id=AdDangNhap style="CURSOR: pointer" 
			onClick=SetViewTableDiv(this.id); alt="" 
			src="styles/<?=$style_path?>/AdImgUp.gif" border=0></td>
		  </tr>
		  <tr>
			<td colspan=2 class="tab_5_5_5_5 text_def"><div id=AdDangNhapLoc style="DISPLAY: block"><table width="100%" height="125"  border="0" cellpadding="0" cellspacing="0" class="bg_login">
	<form name="login_form_" method="post" action="<?=$form_action?>" onSubmit="return checkInput_login(this)">
	<input type="hidden" name="login_form_" value="login_form_">
    
    <tr>
      <td width="10%">&nbsp;</td>
      <td>&#272;&#7883;a ch&#7881; email <br />
        <input name="email" type="text" class="textfield" id="email" style="width:120px;">      </td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td >M&#7853;t kh&#7849;u <br />
        <input name="password" type="password" class="textfield" id="password" style="width:120px;" maxlength="16"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="20" align="left" valign="top" class="text_register">
	  <a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",67,"ma_bac_2");?>&lg=<?=$lg?>&start=0" ><?=gia_tri_mot_cot("tb_bac_2","trang",67,"ten_$lg");?></a>	  
	   | 
	  <a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",68,"ma_bac_2");?>&lg=<?=$lg?>&start=0">
	 <?=gia_tri_mot_cot("tb_bac_2","trang",68,"ten_$lg");?>
	  </a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" valign="top" class="text_register"><input type="submit" name="Submit22" value="<?=gia_tri_mot_cot("tb_bac_2","trang",74,"ten_$lg");?>" align="absmiddle" class="nut_nhan"/>
      </td>
    </tr>
	<tr>
	  <td colspan="2"></td>
	</tr>
	</form>
  </table>
			</div></td>
		  </tr>
		</tbody>
</table>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td ><img height=8 alt="" src="images/spacer.gif" width=176></td>
	      </tr>
		</table>
 <?php } ?>