<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput(param){  
	if (isEmail(param.email.value)==false){
		alert("Please fill in email address");
		param.email.focus();
		return false;
	}
	if (param.password.value==""){
		alert("Please fill in email address");
		param.password.focus();
		return false;
	}
	if (param.confirm_password.value==""){
		alert("Please confirm your password");
		param.confirm_password.focus();
		return false;
	}
	
	if (param.password.value!=param.confirm_password.value){
		alert("Please confirm your password");
		param.confirm_password.focus();
		return false;
	}
	
	
	if (param.fullname.value==""){
		alert("Please fill full name");
		param.fullname.focus();
		return false;
	}	
	if (param.address.value==""){
		alert("Please fill in address line 1");
		param.address.focus();
		return false;
	}	
	if (param.dt_codinh.value==""){
		alert("Please fill in Daytime Phone");
		param.dt_codinh.focus();
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
	//Neu email style6n't have @
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
</script>
<?

if ((isset($_POST["register_form"])) && ($_POST["register_form"] == "register_form")) 
{
	
	$table="tb_member";
	$query = "Select * FROM  $table ORDER BY id DESC";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$ma_dang_nhap=$rs["ma_user"]+1;
	
	$table="tb_shopping_cart_auto";
	$query = "Select * FROM  $table ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$kichhoat=$rs["account"];
	
	$email=rep($HTTP_POST_VARS["email"]);
	$password=rep($HTTP_POST_VARS["password"]);
	$pass=md5($password);
	$ten=rep($HTTP_POST_VARS["fullname"]);
	$sex="";

	
	$address=rep($HTTP_POST_VARS["address"]);
	$city="";
	$country=rep($HTTP_POST_VARS["country"]);
	$zip="";
	$ma_vung="";
	$dt_didong=rep($HTTP_POST_VARS["dt_didong"]);
	$dt_codinh=rep($HTTP_POST_VARS["dt_codinh"]);
	$fax="";
	
	
	//$ngay_sinh=$HTTP_POST_VARS["ngay_sinh"];
	//$thang=$HTTP_POST_VARS["thang"];
	//$nam=$HTTP_POST_VARS["nam"];
	$birthday="";//$thang."/".$ngay_sinh."/".$nam;
	
	
	$ip = getenv ("REMOTE_ADDR"); 
	$ngay = date("F j, Y, g:i a");
	
	
	$you_are ="";
	$where_now ="";
	
	
	
	
	$table="tb_member";
	$query = "Select * FROM  $table";
	$result = mysql_query($query);
	$key=0;
	
	
	while($rs= mysql_fetch_array($result))
	{
		if($rs["email"]==$email)
		{
		  $key=1;
		}
	}
	
	if($key==1)
		{
		$ma_forget=gia_tri_mot_cot("tb_bac_1","trang",81,"ma_bac_1");
		echo "This email has been registered. If you forget your password, <a href=\"./?Bcat=125&lg=$lg&start=0\" ><b>Click here to reset</b></a> your password, or you can <a href=\"./?Bcat=124&lg=$lg&start=0\" ><b>register a new account</b></a>.";
		}
	else
	{
	$table="tb_member";
	$query = "INSERT INTO $table(ma_user,email,pass,ten,code_discount,ngay_sinh,sex,ngay,address,city,country,zip,ma_vung,dt_didong,dt_codinh,fax,kichhoat,ip,you_are,where_now
	)";
	$query .= " VALUES('$ma_dang_nhap','$email','$pass','$ten','5','$birthday','$sex','$ngay','$address','$city','$country','$zip','$ma_vung','$dt_didong','$dt_codinh','$fax','$kichhoat','$ip','$you_are','$where_now'
	
	)";
	
	if($result = mysql_query($query))
	  {
	    echo "Successful register. <br>";
		
		$subject=gia_tri_mot_cot("tb_config_email_auto","id",1,"email_register_title");;
		$mail_to=$email;
		$mail_from=$project_email;
		$thanks="";
		$message="Email: $email <br> Password: $password<br><br>";
		$message=$message. gia_tri_mot_cot("tb_config_email_auto","id",1,"email_register");
		
		gui_email($mail_to, $mail_from, $subject, $message, $thanks);
			
			
			if($kichhoat==0)
				echo "Your account will be censored and activated in the next 24 hours. <br>Thank you!";
			else
			{
				
				$HTTP_SESSION_VARS['ma_dang_nhap'] = $ma_dang_nhap;
				$HTTP_SESSION_VARS['ten_dang_nhap'] = $ten;
				//echo"Bạn có thể  sử dụng tài khoản ngay lúc này.<br><br>";
				//include("shopping_cart/inc_login_.php");
				//echo "<meta http-equiv=refresh content=0;url=$form_action>";
			}
	  }
	}
	//echo "<meta http-equiv=refresh content=2;url=login_.php>";



}
else
{
?>
<link href="member/style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<table width="400" border="0" align="center" cellpadding="1" cellspacing="1" class="tbldata">
	<form name="register_form" method="post"  ENCTYPE="multipart/form-data" action="<?=$form_action?>" onSubmit="return checkInput(this)">
		<thead>
	<tr>
	<th width="30%">&nbsp;</th>
	<th height="23" colspan="2" align="center" valign="middle" id="senderheader"><div align="left">
	  <?=gia_tri_mot_cot("tb_bac_2","trang",65,"ten_$lg");?>
	  </div></th>
	</tr>
	</thead>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Email Address :</td>
	  <td valign="middle" class="text2" ><input name="email" type="text" class="textfield" id="email" style="WIDTH:150px;">
     *</td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Password :</td>
	  <td valign="middle" class="text2" ><input name="password" type="password" class="textfield" style="WIDTH:100px;"  maxlength="20">
      *	  </td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def"> Confirm Pass :</td>
	  <td valign="middle" class="text2" ><input name="confirm_password" type="password" class="textfield" style="WIDTH:100px;"  maxlength="20">
      *	  </td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Full name :</td>
	  <td valign="middle" class="text2" ><input name="fullname" type="text" class="textfield" id="fullname" style="WIDTH:150px;" >
      *	  </td>
	</tr>
	
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Address :</td>
	  <td valign="middle" class="text2" ><input name="address" type="text" class="textfield" id="address" style="WIDTH:192px;" >
      *</td>
	</tr>
	
	<tr>
	  <td height="34" align="right" valign="middle" class="text_def" >Country :</td>
	  <td valign="middle" class="text2" ><? 
			$table="tb_country";
			$query = "Select * FROM  $table order by name_country ASC";
			$result = mysql_query($query);
			?>
            <select name="country" size="1" id="select" class="textfield">
            <option value="0" selected >- Select -</option>
            <? while($rs= mysql_fetch_array($result))
				{
				$ma_nuoc=$rs["code_country"];
				?>
            <option value="<?=$ma_nuoc?>"> 
            <? echo $rs["name_country"];?>            </option>
            <? } ?>
          </select> </td>
	</tr>	
	
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" ><span class="style3">Phone (Home / Work)</span> :</td>
	  <td valign="middle" class="text2" ><input name="dt_codinh" type="text" class="textfield" id="dt_codinh" style="WIDTH:150px;">
        *</td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" ><span class="style3">Phone (Mobile)</span> :</td>
	  <td valign="middle" class="text2" ><input name="dt_didong" type="text" class="textfield" id="dt_didong" style="WIDTH:150px;"></td>
	</tr>
	
	<tr>
	  <td height="25" valign="middle" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td valign="middle" class="text2" ><input name="Submit" style="WIDTH:70px;" type="submit" class="nut_nhan_2" value="Register">
		  <input name="Submit2" type="reset" class="nut_nhan_2" style="WIDTH:70px;" value="Reset">
			<input type="hidden" name="register_form" value="register_form">	  </td>
	</tr>
	</form>
</table>
<? }?>