<? 
include("../inc/banner.php")
?>
<? if($suid==1){?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> &gt; New members </td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10">
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="JavaScript1.2" src="shopping_cart/vietuni.js" type='text/javascript'></script> 
<script language=JavaScript>

function checkUpadteProfile(param){  
	if (isEmail(param.email.value)==false){
		alert("Please fill in email address");
		param.email.focus();
		return false;
	}
	
	if (param.password.value!="")
	{	
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
	}
	
	if (param.fullname.value==""){
		alert("Xin vui lòng nhập họ tên của bạn");
		param.fullname.focus();
		return false;
	}	
	if (param.address.value==""){
		alert("Please fill in address line 1");
		param.address.focus();
		return false;
	}	

	if (param.dt_codinh.value==""){
		alert("Please fill in daytime Phone");
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
</script>
<?php 
	$form_action = $_SERVER['PHP_SELF'];
	//$form_action = str_replace("index.php","./",$form_action);
	if (isset($_SERVER['QUERY_STRING'])) 
			{
			$form_action .= "?" . $_SERVER['QUERY_STRING'];
			}
if ((isset($_POST["update_profile_form"])) && ($_POST["update_profile_form"] == "update_profile_form"))
 {
	
	$table="tb_shopping_cart_auto";
	$query = "Select * FROM  $table ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$kichhoat=$rs["account"];
	$ma_user=$HTTP_GET_VARS["ma_user"];
	
	$email=rep($HTTP_POST_VARS["email"]);
	$pass=rep($HTTP_POST_VARS["password"]);
	if($pass!="")
	    $pass=md5($pass);
	else
	    $pass=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"pass");
		
	$ten=rep($HTTP_POST_VARS["fullname"]);
	$sex=rep($HTTP_POST_VARS["sex"]);
	$ngay_sinh=rep($HTTP_POST_VARS["ngay_sinh"]);
	$address=rep($HTTP_POST_VARS["address"]);
	
	$quan_huyen=rep($HTTP_POST_VARS["city"]);
	$tinh_thanh=rep($HTTP_POST_VARS["country"]);
	$zip=rep($HTTP_POST_VARS["zip"]);

	$ma_vung=rep($HTTP_POST_VARS["ma_vung"]);
	$dt_codinh=$HTTP_POST_VARS["dt_codinh"];
	$dt_didong=rep($HTTP_POST_VARS["dt_didong"]);
	$fax=rep($HTTP_POST_VARS["fax"]);
	
	$you_are=rep($HTTP_POST_VARS["you_are"]);
	$where_now=rep($HTTP_POST_VARS["where_now"]);
	
	$ip = getenv ("REMOTE_ADDR"); 
	$ngay = date("F j, Y, g:i a");
	
	
	$table="tb_shopping_cart_account";
	$query = "Select * FROM  $table where ma_user!=$ma_user";
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
		echo "Email is Unavailable! <input type=button value=\"Back\" onClick=\"history.go(-1);\" class=button name=\"button\"> chọn lại Email khác";
	}
	else
	{
		$table = "tb_shopping_cart_account";
		$query = "UPDATE $table SET email='$email',pass='$pass',ten='$ten',sex='$sex',ngay_sinh='$ngay_sinh',address='$address',zip='$zip',city='$quan_huyen',country='$tinh_thanh',ma_vung='$ma_vung',dt_codinh='$dt_codinh',dt_didong='$dt_didong',fax='$fax',kichhoat='$kichhoat',ngay='$ngay',ip='$ip'";
		$query .= " , you_are='$you_are' , where_now='$where_now' ";
		$query .= " WHERE ma_user = '$ma_user' ";
		//echo "$query";
		if($result = mysql_query($query))
		{
			echo "Upadate complated !";
		    echo '<meta http-equiv="refresh" content="2;url=member.php?cat=0&start=0">';
			/*echo "<script  language='JavaScript'>";
			echo "alert('Cập nhật thành công !')";
			echo "redirect('forum.php')";
			echo "</script>";		*/
		}
		if($kichhoat==0){
			//echo "Upadate complated !";
			//echo '<meta http-equiv="refresh" content="2;url=member.php?cat=0&start=0">';
			/* echo "<script  language='JavaScript'>";
			echo "alert('Xin vui lòng chờ chúng tôi cấp phép sau 24 giờ.')";
			echo "redirect('forum.php')";
			echo "</script>";*/
		}
	}
}
else
{
	$ma_user=$_GET["ma_user"];
	$result = select_co_dk("tb_shopping_cart_account","ma_user",$ma_user,"id","ASC");
	$rs = mysql_fetch_array($result);
?>
<script language="javascript" src="inc/form_validation.js"></script>
<link href="../text.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <form name="update_profile_form" method="post"  ENCTYPE="multipart/form-data" action="<?=$form_action?>" onSubmit="return checkUpadteProfile(this)">
  <input type="hidden" name="update_profile_form" value="update_profile_form">
  <tr valign="middle" class="bg_mo">
    <td width="35%" height="35" valign="middle">&nbsp;</td>
  <td width="300" align="left" class="tieude">My profile </td>
  </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Email:</td>
    <td height="20" valign="middle" class="text2" >
      <input name="email" type="text" class="bottom" id="email" style="WIDTH:150px;" value="<?=$rs["email"]?>">
      <span class="style2"><span class="do">*</span></span> </td>
  </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Password:</td>
    <td height="20" valign="middle" class="text2" >
      <input name="password" type="password" class="bottom" style="WIDTH:100px;" value=""  maxlength="20">      </td>
    </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def"> Confirm Pass:</td>
    <td height="20" valign="middle" class="text2" >
      <input name="confirm_password" type="password" class="bottom" style="WIDTH:100px;" value=""  maxlength="20"></td>
  </tr>
    <tr class="bg_mo">
      <td height="20" align="right" valign="middle" class="text_def" >  Full Name:</td>
    <td height="20" valign="middle" class="text2" >
      <input name="fullname" type="text" class="bottom" id="fullname" style="WIDTH:150px;"  value="<?=$rs["ten"]?>">
      <span class="style2"><span class="do">*</span></span> Ppoints: <strong><?=$rs["diem"]?></strong></td>
  </tr>
    <tr class="bg_mo">
      <td height="20" align="right" valign="middle" class="text_def" >Title:</td>
    <td height="20" valign="middle" class="text2" ><select name="sex" class="bottom" style="width:80px;">
                        <option value="MRS" <? if($rs["sex"]=="MRS") echo"selected"; ?> >Mrs</option>
                        <option value="MS" <? if($rs["sex"]=="MS") echo"selected"; ?> >Ms</option>
                        <option value="MISS" <? if($rs["sex"]=="MISS") echo"selected"; ?> >Miss</option>
                        <option value="MR" <? if($rs["sex"]=="MR") echo"selected"; ?> >Mr</option>
	  </select></td>
  </tr>
      <tr class="bg_mo">
      <td height="20" align="right" valign="middle" class="text_def" >Birthday:</td>
    <td height="20" valign="middle" class="text2" ><input name="ngay_sinh" type="text" class="bottom" id="ngay_sinh" style="WIDTH:150px;" value="<?=$rs["ngay_sinh"]?>">
      <span class="small">(mm/dd/yy)</span></td>
      </tr>
  	<tr class="bg_mo">
	  <td height="20" align="right" valign="middle" class="text_def" >Address:</td>
	  <td height="20" valign="middle" class="text2" ><input name="address" type="text" class="bottom" id="address" style="WIDTH:192px;"  value="<?=$rs["address"]?>">
      <span class="text_def"><span class="style2">*</span></span></td>
	</tr>
	<tr class="bg_mo">
	  <td height="20" align="right" valign="middle" class="text_def" >City/Suburb :</td>
	  <td height="20" valign="middle" class="text2" ><input name="city" type="text" class="bottom" id="city" style="WIDTH:150px;"  value="<?=$rs["city"]?>"></td>
	</tr>
	  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >State:</td>
    <td height="20" valign="middle" class="text2" ><input name="zip" type="text" class="bottom" id="zip" style="WIDTH:192px;" value="<?=$rs["zip"]?>">      </td>
  </tr>

	<tr class="bg_mo">
	  <td height="20" align="right" valign="middle" class="text_def" >Country :</td>
	  <td height="20" valign="middle" class="text2" ><? 
			$table_="tb_country";
			$query_ = "Select * FROM  $table_ order by name_country ASC";
			$result_ = mysql_query($query_);
			?>
            <select name="country" size="1" class="bottom" id="select">
            <option value="0" selected >- Countries -</option>
            <? while($rs_= mysql_fetch_array($result_))
				{
				$ma_nuoc=$rs_["code_country"];
				?>
            <option value="<?=$ma_nuoc?>" <? if($ma_nuoc==$rs["country"]) echo"selected"; ?> > 
            <? echo $rs_["name_country"];?>            </option>
            <? } ?>
      </select></td>
	</tr>
    <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Postcode/ ZIP:</td>
    <td height="20" valign="middle" class="text2" >      <input name="ma_vung" onKeyDown="AcceptNumbersOnly();" type="text" class="bottom" id="ma_vung" style="WIDTH:150px;" value="<?=$rs["ma_vung"]?>">
      <span class="style6"> </span></td>
  </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Daytime Phone:</td>
    <td height="20" valign="middle" class="text2" ><input name="dt_codinh" onKeyDown="AcceptNumbersOnly();" type="text" class="bottom" id="dt_codinh" style="WIDTH:150px;" value="<?=$rs["dt_codinh"]?>">
      <span class="style6"> *</span></td>
  </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Evening Phone:</td>
    <td height="20" valign="middle" class="text2" ><input name="dt_didong" onKeyDown="AcceptNumbersOnly();" type="text" class="bottom" id="dt_didong" style="WIDTH:150px;" value="<?=$rs["dt_didong"]?>"></td>
  </tr>
  <tr class="bg_mo">
    <td height="20" align="right" valign="middle" class="text_def" >Fax:</td>
    <td height="20" valign="middle" class="text2" ><input name="fax" onKeyDown="AcceptNumbersOnly();" type="text" class="bottom" id="fax" style="WIDTH:150px;" value="<?=$rs["fax"]?>"></td>
  </tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def">You are: </td>
	  <td valign="middle" class="text2" >
	    <SELECT name=you_are class="bottom" id="you_are">
          <option value="Mother" <? if($rs["you_are"]=="Mother") echo"selected"; ?> >Mother</option>
          <option value="Father" <? if($rs["you_are"]=="Father") echo"selected"; ?> >Father</option>
          <option value="Grand parents" <? if($rs["you_are"]=="Grand parents") echo"selected"; ?> >Grand parents</option>
          <option value="Other" <? if($rs["you_are"]=="Other") echo"selected"; ?> >Other</option>
        </SELECT>
	  </td>
	  </tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def">Where did you hear about us?</td>
	  <td valign="middle" class="text2" >
	    <SELECT name=where_now class="bottom" id="where_now">
          <option value="Family" <? if($rs["where_now"]=="Family") echo"selected"; ?> >Family</option>
          <option value="Friends" <? if($rs["where_now"]=="Friends") echo"selected"; ?> >Friends</option>
          <option value="Magazine" <? if($rs["where_now"]=="Magazine") echo"selected"; ?> >Magazine</option>
          <option value="Website" <? if($rs["where_now"]=="Website") echo"selected"; ?> >Website</option>
        </SELECT>
	  </td>
	  </tr>
  <tr class="bg_mo">
    <td height="40" valign="top" class="text1"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" class="text2" ><input name="Submit" type="submit" class="bottom" style="WIDTH:120px; height:20px" value="Update">
      <input name="Submit2" type="reset" class="bottom" style="WIDTH:80px; height:20px" value="Reset"></td>
  </tr>
  </form>
</table>
<?php }?></td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? 
} 
else
echo"Bạn không dược quyền Admin ! Xin vui lòng hỏi admin.";
?>
<? include("../inc/bottom.php")?>
