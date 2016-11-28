<script language=JavaScript>

function checkInput_login(param)
{  
	if (isEmail(param.email.value)==false){
		alert("Please enter your Email !");
		param.email.focus();
		return false;
	}
	if (param.password.value==""){
		alert("Please enter your Password!");
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
				$HTTP_SESSION_VARS['ma_dang_nhap'] = $row[0];
				$HTTP_SESSION_VARS['ten_dang_nhap'] = $row[3];
				//header("Location: $form_action ");
				/*
				if(!$HTTP_SESSION_VARS['ten_dang_nhap'])
				echo "nnononon aaaa";
				else
				echo "Duoc";
				*/
				echo"<meta http-equiv=\"refresh\" content=\"0;url= $form_action \">";

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
else
{
?>
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<form name="login_form_" method="post" action="<?=$form_action?>" onSubmit="return checkInput_login(this)">
<input type="hidden" name="login_form_" value="login_form_">
  <table width="400"  border="0" align="center" cellpadding="1" cellspacing="1" class="tbldata">
    <!--DWLayoutTable-->
	<thead>
	<tr>
	<th width="30%" height="23">&nbsp;</th>
	<th align="left" valign="middle" id="senderheader"><?=gia_tri_mot_cot("tb_bac_2","trang",74,"ten_$lg")?></th>
	</tr>
	</thead>
    <tr>
      <td height="24" align="right" class="text_tb">Email Address:</td>
      <td width="253" class="text_tb"><input name="email" type="text" class="textfield" id="email" style="width:200px;" value="">
       *</td>
    </tr>
    <tr>
      <td height="24" align="right" class="text_tb">Password:</td>
      <td class="text_tb"><input name="password" type="password" class="textfield" id="password" style="width:120px;" maxlength="16">
        * <a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",66,"ma_bac_2");?>&amp;lg=<?=$lg?>&amp;start=0"><strong><?=gia_tri_mot_cot("tb_bac_2","trang",66,"ten_$lg");?></strong></a> </td>
    </tr>
    <tr class="text_tb">
      <td height="26" class="text2"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td valign="middle"><span class="text2">
        <input name="Submit" type="submit" class="nut_nhan_2" value="Login" style="width:70px;" />
        <input name="Reset" type="reset" class="nut_nhan_2" value="Reset" style="width:70px;" />
      </span></td>
    </tr>
  </table>
</form>
<? } ?>