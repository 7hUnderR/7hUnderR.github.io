<SCRIPT language=JavaScript>
<!--
function checkInput_fg(from){
	
	if ((from.user_name.value)==""){
		alert("Please enter your username!");
		from.user_name.focus();
		return false;
	}

	if (isEmail(from.email.value)==false){
		alert("Please enter your Email!");
		from.email.focus();
		return false;
	}
	return true;
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
-->
</script>
<link href="member/style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<br />
<?php 
if ((isset($_POST["forgetpassword_form"])) && ($_POST["forgetpassword_form"] == "forgetpassword_form")) 
{
	$email=rep($_POST["email"]);
	//$user_name=rep($_POST["user_name"]);
	
	$email=trim($email);
	//echo"User: $user_id, Email: $email";
	$sql="select * from tb_member where email='$email' and kichhoat=1 ";
	$result = mysql_query($sql);	
	if (mysql_num_rows($result)!=0)
	{
		$rs= mysql_fetch_array($result);
		$email=$rs["email"];
		$pass_new=ran_dom(8);
		
		$pass_update=md5("$pass_new");
		
		$query_ = "UPDATE tb_member SET pass='$pass_update'";
		$query_ .= "WHERE email='$email'";
		$result_ = mysql_query($query_);
		
		$mail_to=$email;
		$mail_from=$project_email;
		
		$thanks="Send to your email completed !";
		
		$subject="Forget password (Pham Nguyen Food) ";
		$message="<b>Usernam and password:</b>";
		$message.= "<hr>Email: $email <br> Password: $pass_new <br><hr>";
		$message.="<a href=\"http://www.phamnguyenfood.com\" target=\"_blank\">http://www.phamnguyenfood.com</a>";
		gui_email($mail_to, $mail_from, $subject, $message, $thanks);
		
	}
	else 
	 {
	 echo "Email address you've entered is invalid.";
	 echo "<meta http-equiv=refresh content=2;url=$form_action>";
	 }
}
else{
?>

<table width="400" border="1" align="center" cellpadding="1" cellspacing="1" class="tbldata">
  <form action="<?=$form_action?>" method="post" name="forgetpassword_form" ENCTYPE="multipart/form-data" onsubmit="return checkInput_fg(this);">
	<thead>
	<tr>
	<th width="30%"><!--DWLayoutEmptyCell-->&nbsp;</th>
	<th height="23" colspan="2" align="left" valign="middle" id="senderheader"><?=gia_tri_mot_cot("tb_bac_2","trang",50,"ten_$lg");?></th>
	</tr>
	</thead>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Email address :</td>
	  <td align="left" valign="middle"  class="text_def" >
	    <input name="email" type="text" class="textfield" id="email" style="width:150px;">
      * </td>
	</tr>
	<tr>
	  <td height="30" align="right" valign="middle" class="text1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td height="25" align="left" valign="middle" class="tab_left_3"><input name="Submit2" type="submit" class="nut_nhan_2" value="Get password">
	    <input type="hidden" name="forgetpassword_form" value="forgetpassword_form">	  </td>
	</tr>
  </form>
</table>
<?php }?>