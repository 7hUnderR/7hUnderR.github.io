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
                <td height="227" valign="top" class="tab_left_10"><script language=JavaScript>
function thaydoi(a)
{

  if( a.value ==1)
   {
    set_status(false,true,true,true,true);
   }
  if( a.value ==2)
   {
    set_status(false,false,true,true,true);
   } 
 if( a.value ==3)
   {
    set_status(false,false,false,true,true);
   }  
 if( a.value ==4)
   {
    set_status(false,false,false,false,true);
   }  
 if( a.value ==5)
   {
    set_status(false,false,false,false,false);
   }   
  if(a.value ==0)     
   {
    set_status(true,true,true,true,true);
   }
 }

function set_status(child1, child2,child3,child4,child5) 
   {
	register_form.child1.disabled= child1;
	register_form.thang1.disabled= child1;
	register_form.ngay1.disabled= child1;
	register_form.nam1.disabled= child1;
	register_form.boy1[0].disabled= child1;
	register_form.boy1[1].disabled= child1;
	
	register_form.child2.disabled= child2;
	register_form.thang2.disabled= child2;
	register_form.ngay2.disabled= child2;
	register_form.nam2.disabled= child2;
	register_form.boy2[0].disabled= child2;
	register_form.boy2[1].disabled= child2;
	
	register_form.child3.disabled= child3;
	register_form.thang3.disabled= child3;
	register_form.ngay3.disabled= child3;
	register_form.nam3.disabled= child3;
	register_form.boy3[0].disabled= child3;
	register_form.boy3[1].disabled= child3;
	
	register_form.child4.disabled= child4;
	register_form.thang4.disabled= child4;
	register_form.ngay4.disabled= child4;
	register_form.nam4.disabled= child4;
	register_form.boy4[0].disabled= child4;
	register_form.boy4[1].disabled= child4;
	
	register_form.child5.disabled= child5;
	register_form.thang5.disabled= child5;
	register_form.ngay5.disabled= child5;
	register_form.nam5.disabled= child5;
	register_form.boy5[0].disabled= child5;
	register_form.boy5[1].disabled= child5;
	}


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
	if (param.ma_vung.value==""){
		alert("Please fill in Postcode");
		param.ma_vung.focus();
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
	var str="abcdefghijklmnopqrstuvwxyz-@._123456789";
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
	
	$table="tb_shopping_cart_account";
	$query = "Select * FROM  $table ORDER BY id DESC";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$ma_user=$rs["ma_user"]+1;
	
	$table="tb_shopping_cart_auto";
	$query = "Select * FROM  $table ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$kichhoat=$rs["account"];
	
	$email=rep($HTTP_POST_VARS["email"]);
	$password=rep($HTTP_POST_VARS["password"]);
	$pass=md5($password);
	$ten=rep($HTTP_POST_VARS["fullname"]);
	$sex=$HTTP_POST_VARS["sex"];

	
	$address=rep($HTTP_POST_VARS["address"]);
	$city=rep($HTTP_POST_VARS["city"]);
	$country=rep($HTTP_POST_VARS["country"]);
	$zip=rep($HTTP_POST_VARS["zip"]);
	$ma_vung=rep($HTTP_POST_VARS["ma_vung"]);
	$dt_didong=rep($HTTP_POST_VARS["dt_didong"]);
	$dt_codinh=rep($HTTP_POST_VARS["dt_codinh"]);
	$fax=rep($HTTP_POST_VARS["fax"]);
	
	
	$ngay_sinh=$HTTP_POST_VARS["ngay_sinh"];
	$thang=$HTTP_POST_VARS["thang"];
	$nam=$HTTP_POST_VARS["nam"];
	$birthday=$ngay_sinh."/".$thang."/".$nam;
	
	
	$ip = getenv ("REMOTE_ADDR"); 
	$ngay = date("F j, Y, g:i a");
	
	$you_are =rep($HTTP_POST_VARS["youare"]);
	$where_now =rep($HTTP_POST_VARS["where"]);
	
	
	
	
	$table="tb_shopping_cart_account";
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
			echo "This email has been registered ! You can Forget Password.";
		}
	else
	{
	$table="tb_shopping_cart_account";
	$query = "INSERT INTO $table(ma_user,code_discount,email,pass,ten,ngay_sinh,sex,ngay,address,city,country,zip,ma_vung,dt_didong,dt_codinh,fax,kichhoat,ip,
	you_are,where_now,user_type,diem
	)";
	$query .= " VALUES('$ma_user','0','$email','$pass','$ten','$birthday','$sex','$ngay','$address','$city','$country','$zip','$ma_vung','$dt_didong','$dt_codinh','$fax','$kichhoat','$ip',
	'$you_are','$where_now','1','50'
	
	)";
	
	if($result = mysql_query($query))
	  {
	    echo "Add completed!<br>";
		if($kichhoat==0)
			echo "Wait activate. ";
		echo"<meta http-equiv=\"refresh\" content=\"0;url=member.php?cat=0&start=0\">";
	  }
	}
	//echo "<meta http-equiv=refresh content=2;url=login_.php>";



}
else
{
?>
<style type="text/css">
<!--
.style10 {font-size: 10}
-->
</style>
<link href="css_info.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<!--DWLayoutTable-->
	<form name="register_form" method="post"  ENCTYPE="multipart/form-data" action="<?=$form_action?>" onSubmit="return checkInput(this)">
	<tr valign="middle" class="bg_mo">
	  <td width="263" height="29" valign="middle"><span class="do"> ( * ) Denotes required fields </span></td>
	  <td width="497" valign="middle" class="text_bold"><div align="left" class="tieude">New members </div></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" > Email Address :</td>
	  <td valign="middle" class="text2" ><input name="email" type="text" class="bottom" id="email" style="WIDTH:150px;">
      <span class="do"><span class="do">*</span></span>	  </td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" > Password :</td>
	  <td valign="middle" class="text2" ><input name="password" type="password" class="bottom" style="WIDTH:100px;"  maxlength="20">
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def"> Confirm Pass :</td>
	  <td valign="middle" class="text2" ><input name="confirm_password" type="password" class="bottom" style="WIDTH:100px;"  maxlength="20">
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" > Full name :</td>
	  <td valign="middle" class="text2" ><input name="fullname" type="text" class="bottom" id="fullname" style="WIDTH:150px;" >
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr class="bg_mo">
	  <td height="34" align="right" valign="middle" class="text_def" >Title :</td>
	  <td valign="middle" class="text2" ><select name="sex" class="bottom" style="width:80px;">
                        <option value="MRS" selected>Mrs</option>
                        <option value="MS">Ms</option>
                        <option value="MISS">Miss</option>
                        <option value="MR">Mr</option>
	  </select></td>
	</tr>
	<tr class="bg_mo">
	  <td height="34" align="right" valign="middle" class="text_def" >Birthday :</td>
	  <td valign="bottom" class="text2" ><select name="thang" class="bottom" id="thang" style="width:80px;">
		  <option value="">Mounth</option>
		  <option value="01">01</option>
		  <option value="02">02</option>
		  <option value="03">03</option>
		  <option value="04">04</option>
		  <option value="05">05</option>
		  <option value="06">06</option>
		  <option value="07">07</option>
		  <option value="08">08</option>
		  <option value="09">09</option>
		  <option value="10">10</option>
		  <option value="11">11</option>
		  <option value="12">12</option>
		</select>
		  <select name="ngay_sinh" class="bottom" id="ngay_sinh">
			<option value="">Day</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		  </select>
		  <select name="nam" class="bottom" id="nam">
			<option value="">Year</option>
			<? 
				for($i=1930; $i<=2000; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
		  </select></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >Address :</td>
	  <td valign="middle" class="text2" ><input name="address" type="text" class="bottom" id="address" style="WIDTH:192px;" >
      <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >City/Suburb :</td>
	  <td valign="middle" class="text2" ><input name="city" type="text" class="bottom" id="city" style="WIDTH:150px;" ></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >State : </td>
	  <td valign="middle" class="text2" ><input name="zip" type="text" class="bottom" id="zip" style="WIDTH:192px;"></td>
	  </tr>
	<tr class="bg_mo">
	  <td height="34" align="right" valign="middle" class="text_def" >Country :</td>
	  <td valign="middle" class="text2" ><? 
			$table="tb_partners_noi_thanh_lap";
			$query = "Select * FROM  $table order by ten_nuoc ASC";
			$result = mysql_query($query);
			?>
            <select name="country" size="1" id="select">
            <option value="0" selected >- Countries -</option>
            <? while($rs= mysql_fetch_array($result))
				{
				$ma_nuoc=$rs["ma_nuoc"];
				?>
            <option value="<? echo $rs["ma_nuoc"]?>"> 
            <? echo $rs["ten_nuoc"];?>            </option>
            <? } ?>
          </select> </td>
	</tr>	
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >Postcode/ ZIP :</td>
	  <td valign="middle" class="text2" ><input name="ma_vung" type="text" class="bottom" id="ma_vung" style="WIDTH:100px;">
      <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >Daytime Phone :</td>
	  <td valign="middle" class="text2" ><input name="dt_codinh" type="text" class="bottom" id="dt_codinh" style="WIDTH:150px;">
        <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >Evening Phone :</td>
	  <td valign="middle" class="text2" ><input name="dt_didong" type="text" class="bottom" id="dt_didong" style="WIDTH:150px;"></td>
	</tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def" >Fax :</td>
	  <td valign="middle" class="text2" ><input name="fax" type="text" class="bottom" id="fax" style="WIDTH:150px;"></td>
	  </tr>
	
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def">You are: </td>
	  <td valign="middle" class="text2" ><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
	    <SELECT name=youare class="bottom" id="youare">
          <option value="Mother">Mother</option>
          <option value="Father">Father</option>
          <option value="Grand parents">Grand parents</option>
          <option value="Other">Other</option>
        </SELECT>
	  </FONT></td>
	  </tr>
	<tr class="bg_mo">
	  <td height="25" align="right" valign="middle" class="text_def">Where did you hear about us?</td>
	  <td valign="middle" class="text2" ><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
	    <SELECT name=where class="bottom" id="where">
          <option value="Family">Family</option>
          <option value="Friends">Friends</option>
          <option value="Magazine">Magazine</option>
          <option value="Website">Website</option>
        </SELECT>
	  </FONT></td>
	  </tr>
	<tr class="bg_mo">
	  <td height="25" valign="top" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td valign="middle" class="text2" ><input name="Submit" style="WIDTH:100px;" type="submit" class="bottom" value="Register">
		  <input name="Submit2" type="reset" class="bottom" style="WIDTH:100px;" value="Reset">
			<input type="hidden" name="register_form" value="register_form">	  </td>
	</tr>
	</form>
</table>
<? }?></td>
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
