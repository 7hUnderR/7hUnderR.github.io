<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>
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
	
	$numchild =rep($HTTP_POST_VARS["numchild"]);
	
	
	
	
	$child1="";
	$boy1 ="";
	$Age1 ="";
	
	$child2="";
	$boy2 ="";
	$Age2 ="";

	$child3="";
	$boy3 ="";
	$Age3 ="";

	$child4="";
	$boy4 ="";
	$Age4 ="";

	$child5="";
	$boy5 ="";
	$Age5 ="";

	if(isset($HTTP_POST_VARS["child1"]))
	{
	$child1 =rep($HTTP_POST_VARS["child1"]);
	$boy1 =rep($HTTP_POST_VARS["boy1"]);
	$ngay1 =rep($HTTP_POST_VARS["ngay1"]);
	$thang1 =rep($HTTP_POST_VARS["thang1"]);
	$nam1 =rep($HTTP_POST_VARS["nam1"]);
	$Age1 =$ngay1."/".$thang1."/".$nam1 ;
	}
	
	if(isset($HTTP_POST_VARS["child2"]))
	{
	$child2 =rep($HTTP_POST_VARS["child2"]);
	$ngay2 =rep($HTTP_POST_VARS["ngay2"]);
	$thang2 =rep($HTTP_POST_VARS["thang2"]);
	$nam2 =rep($HTTP_POST_VARS["nam2"]);
	 $Age2 =$ngay2."/".$thang2."/".$nam2 ;
	 $boy2 =rep($HTTP_POST_VARS["boy2"]);
	}
	if(isset($HTTP_POST_VARS["child3"]))
	{
	$child3 =rep($HTTP_POST_VARS["child3"]);
	$ngay3 =rep($HTTP_POST_VARS["ngay3"]);
	$thang3 =rep($HTTP_POST_VARS["thang3"]);
	$nam3 =rep($HTTP_POST_VARS["nam3"]);
    $Age3 =$ngay3."/".$thang3."/".$nam3 ;
	$boy3 =rep($HTTP_POST_VARS["boy3"]);
	}
	if(isset($HTTP_POST_VARS["child4"]))
	{
	$child4 =rep($HTTP_POST_VARS["child4"]);
	$ngay4 =rep($HTTP_POST_VARS["ngay4"]);
	$thang4 =rep($HTTP_POST_VARS["thang4"]);
	$nam4 =rep($HTTP_POST_VARS["nam4"]);
    $Age4 =$ngay4."/".$thang4."/".$nam4 ;
	$boy4 =rep($HTTP_POST_VARS["boy4"]);
	}
	if(isset($HTTP_POST_VARS["child5"]))
	{
	$child5 = rep($HTTP_POST_VARS["child5"]);
	$ngay5 =rep($HTTP_POST_VARS["ngay5"]);
	$thang5 =rep($HTTP_POST_VARS["thang5"]);
	$nam5 =rep($HTTP_POST_VARS["nam5"]);
	$Age5 =$ngay5."/".$thang5."/".$nam5;
	$boy5 =rep($HTTP_POST_VARS["boy5"]);
	}
	
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
	num_con,
	con_1,ngay_sinh_1,gioi_tinh_1,
	con_2,ngay_sinh_2,gioi_tinh_2,
	con_3,ngay_sinh_3,gioi_tinh_3,
	con_4,ngay_sinh_4,gioi_tinh_4,
	con_5,ngay_sinh_5,gioi_tinh_5,you_are,where_now,user_type,diem
	)";
	$query .= " VALUES('$ma_user','0','$email','$pass','$ten','$birthday','$sex','$ngay','$address','$city','$country','$zip','$ma_vung','$dt_didong','$dt_codinh','$fax','$kichhoat','$ip',
	'$numchild',
	'$child1','$Age1','$boy1',
	'$child2','$Age2','$boy2',
	'$child3','$Age3','$boy3',
	'$child4','$Age4','$boy4',
	'$child5','$Age5','$boy5','$you_are','$where_now','1','50'
	
	)";
	
	if($result = mysql_query($query))
	  {
	    echo "Rigister Completed, thank you for registering !<br>";
		
		$subject=gia_tri_mot_cot("tb_config_email_auto","id",1,"email_register_title");;
		$mail_to=$email;
		$mail_from=$project_email;
		$thanks="";
		$message="Full name: $ten <br>Login Email Address: $email <br> Password: $password<br><br>";
		$message=$message. gia_tri_mot_cot("tb_config_email_auto","id",1,"email_register");
		
		gui_email($mail_to, $mail_from, $subject, $message, $thanks);
		if($kichhoat==0)
			echo "Wait activate. ";
		echo"<meta http-equiv=\"refresh\" content=\"0;url=index.php?Acat=$cat_login&lg=$lg&start=0\">";
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
	<tr valign="middle" class="title1">
	  <td width="263" height="29" valign="top"><span class="do"> ( * ) Denotes required fields </span></td>
	  <td width="497" valign="middle" class="text_bold"><div align="left">New members </div></td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Email Address :</td>
	  <td valign="middle" class="text2" ><input name="email" type="text" class="bottom" id="email" style="WIDTH:150px;">
      <span class="do"><span class="do">*</span></span>	  </td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Password :</td>
	  <td valign="middle" class="text2" ><input name="password" type="password" class="bottom" style="WIDTH:100px;"  maxlength="20">
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def"> Confirm Pass :</td>
	  <td valign="middle" class="text2" ><input name="confirm_password" type="password" class="bottom" style="WIDTH:100px;"  maxlength="20">
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" > Full name :</td>
	  <td valign="middle" class="text2" ><input name="fullname" type="text" class="bottom" id="fullname" style="WIDTH:150px;" >
      <span class="text_def"><span class="do">*</span></span>	  </td>
	</tr>
	<tr>
	  <td height="34" align="right" valign="middle" class="text_def" >Title :</td>
	  <td valign="middle" class="text2" ><select name="sex" class="bottom" style="width:80px;">
                        <option value="MRS" selected>Mrs</option>
                        <option value="MS">Ms</option>
                        <option value="MISS">Miss</option>
                        <option value="MR">Mr</option>
	  </select></td>
	</tr>
	<tr>
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
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Address :</td>
	  <td valign="middle" class="text2" ><input name="address" type="text" class="bottom" id="address" style="WIDTH:192px;" >
      <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >City :</td>
	  <td valign="middle" class="text2" ><input name="city" type="text" class="bottom" id="city" style="WIDTH:150px;" ></td>
	</tr>
	<tr>
	  <td height="34" align="right" valign="middle" class="text_def" >Country :</td>
	  <td valign="middle" class="text2" ><? 
			$table="tb_partners_noi_thanh_lap";
			$query = "Select * FROM  $table order by ten_nuoc ASC";
			$result = mysql_query($query);
			?>
            <select name="country" size="1" id="select" style="FONT: 11px Tahoma,arial,helvetica;">
            <option value="0" selected >-Countries-</option>
            <? while($rs= mysql_fetch_array($result))
				{
				$ma_nuoc=$rs["ma_nuoc"];
				?>
            <option value="<? echo $rs["ma_nuoc"]?>"> 
            <? echo $rs["ten_nuoc"];?>
            </option>
            <? } ?>
          </select> </td>
	</tr>	
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >ZIP / Postal Code : </td>
	  <td valign="middle" class="text2" ><input name="zip" type="text" class="bottom" id="zip" style="WIDTH:100px;"></td>
	  </tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Postcode :</td>
	  <td valign="middle" class="text2" ><input name="ma_vung" type="text" class="bottom" id="ma_vung" style="WIDTH:100px;">
      <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Daytime Phone :</td>
	  <td valign="middle" class="text2" ><input name="dt_codinh" type="text" class="bottom" id="dt_codinh" style="WIDTH:150px;">
        <span class="text_def"><span class="do">*</span></span></td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Evening Phone :</td>
	  <td valign="middle" class="text2" ><input name="dt_didong" type="text" class="bottom" id="dt_didong" style="WIDTH:150px;"></td>
	</tr>
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def" >Fax :</td>
	  <td valign="middle" class="text2" ><input name="fax" type="text" class="bottom" id="fax" style="WIDTH:150px;"></td>
	  </tr>
	<tr>
	  <td height="25" colspan="2" valign="middle" class="text2" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <!--DWLayoutTable-->
                              <tr>
                                <td width="334" height="1"></td>
                                <td width="8"></td>
                                <TD width="647" rowspan="3" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <SELECT name="numchild" class="bottom" id="numchild" onChange="thaydoi(this);" >
                              
                        <option value=0 >- Num -</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
						        <option value=4>4</option>
                                <option value=5>5</option>
                              
                              </SELECT>
                                </TD>
                              </tr>
                              <tr>
                                <TD height="22" align=right valign="middle">Number your child?</TD>
                            <td></td>
                              </tr>
                              <tr>
                                <td height="1"></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="3"></td>
                                <td></td>
                                <TD></TD>
                              </tr>
                              <tr>
                                <TD rowspan="2" align=right valign="middle">Child 
                              1&nbsp;</TD>
                            <td height="1"></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="23"></td>
                                <TD rowspan="2" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <input name="child1" type="text" disabled=false class="bottom" id="child1" size="20">
                            &nbsp;<span class="style10">
<INPUT type=radio CHECKED value=0 name=boy1 disabled=false>
Boy&nbsp;&nbsp;
<INPUT type=radio value=1 name=boy1 disabled=false> 
Girl <br>
                          <span class="text2">
                          <select name="thang1" class="bottom" id="thang1" style="width:80px;" disabled=false>
                            <option value="">Month</option>
                            <? 
				for($i=1; $i<=12; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="ngay1" class="bottom" id="ngay_sinh" disabled=false>
                            <option value="">Day</option>
                           <? 
				for($i=1; $i<=31; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="nam1" class="bottom" id="nam1" disabled=false>
                            <option value="">Year</option>
                            <? 
				for($i=1980; $i<=2010; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
</span></span> </TD>
                              </tr>
                              <tr>
                                <td height="23" colspan="2" valign="middle"><div align="right" class="style10"><FONT 
                              face=verdana,arial,helvetica,sans-serif 
                              size=1>DOB</div></td>
                              </tr>
                              <tr>
                                <td height="3"></td>
                                <td></td>
                                <TD></TD>
                              </tr>
                              <tr>
                                <TD rowspan="2" align=right valign="middle">Child 
                              2&nbsp;</TD>
                            <td height="1"></td>
                                <TD></TD>
                              </tr>
                              <tr>
                                <td height="23"></td>
                                <TD rowspan="2" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <input name="child2" type="text" disabled=false class="bottom" id="child2"  size="20">
                            &nbsp;<span class="style10">
                            <INPUT type=radio CHECKED value=0 
                  name=boy2 disabled=false>
                            Boy&nbsp;&nbsp;
                            <INPUT type=radio 
                  value=1 name=boy2 disabled=false>
                          Girl <br>
                          <span class="text2">
                          <select name="thang2" class="bottom" id="thang2" style="width:80px;" disabled=false>
                            <option value="">Month</option>
                            <? 
				for($i=1; $i<=12; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="ngay2" class="bottom" id="ngay2" disabled=false>
                            <option value="">Day</option>
                            <? 
				for($i=1; $i<=31; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="nam2" class="bottom" id="nam2" disabled=false>
                            <option value="">Year</option>
                            <? 
				for($i=1980; $i<=2010; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          </span></span></TD>
                              </tr>
                              <tr>
                                <TD height="21" valign="middle"><div align="right" class="style10"><FONT 
                              face=verdana,arial,helvetica,sans-serif>DOB</div></TD>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="4"></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <TD height="22" align=right valign="middle"><span class="style10"><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>Child 
                              3</span><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>&nbsp;</TD>
                            <td></td>
                                <TD rowspan="2" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <input name="child3" type="text" id="child3" size="20" disabled=false>
                            &nbsp;<span class="style10">
                            <INPUT type=radio CHECKED value=0 
                  name=boy3 disabled=false>
                            Boy&nbsp;&nbsp;
                            <INPUT type=radio 
                  value=1 name=boy3 disabled=false> 
                          Girl <br>
                          <span class="text2">
                          <select name="thang3" class="bottom" id="thang3" style="width:80px;" disabled=false>
                            <option value="">Month</option>
                             <? 
				for($i=1; $i<=12; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="ngay3" class="bottom" id="ngay3" disabled=false>
                            <option value="">Day</option>
                             <? 
				for($i=1; $i<=31; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          <select name="nam3" class="bottom" id="nam3" disabled=false>
                            <option value="">Year</option>
                            <? 
				for($i=1980; $i<=2010; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                          </select>
                          </span></span></TD>
                              </tr>
                              <tr>
                                <TD height="22" valign="middle"><div align="right" class="style10"><FONT 
                              face=verdana,arial,helvetica,sans-serif 
                              size=1>DOB</div></TD>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="4"></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <TD height="24" valign="middle"><div align="right"><span class="style10"><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>Child 4</span><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>&nbsp;</div></TD>
                            <td></td>
                                <TD rowspan="2" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <input name="child4" type="text" disabled=false class="bottom" id="child4" size="20" >
&nbsp;<span class="style10">
<INPUT type=radio CHECKED value=0 
                  name=boy4 disabled=false>
Boy&nbsp;
        <INPUT type=radio 
                  value=1 name=boy4 disabled=false>
        Girl <br>
        <span class="text2">
        <select name="thang4" class="bottom" id="thang4" style="width:80px;" disabled=false>
          <option value="00">Month</option>
           <? 
				for($i=1; $i<=12; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
                </select>
        <select name="ngay4" class="bottom" id="ngay4" disabled=false>
          <option value="">Day</option>
           <? 
				for($i=1; $i<=31; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
        </select>
        <select name="nam4" class="bottom" id="nam4" disabled=false>
          <option value="">Year</option>
          <? 
				for($i=1980; $i<=2010; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
        </select>
        </span></span> </TD>
                              </tr>
                              <tr>
                                <TD height="20" valign="middle"><div align="right" class="style10"><FONT 
                              face=verdana,arial,helvetica,sans-serif 
                              size=1>DOB</div></TD>
                                <td></td>
                              </tr>
                              <tr>
                                <td height="4"></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <TD height="23" valign="middle"><div align="right"><span class="style10"><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>Child 5</span><FONT 
                  face=verdana,arial,helvetica,sans-serif size=2>&nbsp;</div></TD>
                            <td></td>
                                <TD rowspan="2" valign="top"><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
                              <input name="child5" type="text" id="child5" size="20" disabled=false>
                              <span class="style10">&nbsp;
                              <INPUT type=radio CHECKED value=0 
                  name=boy5 disabled=false>
                              Boy&nbsp;
                              <INPUT type=radio 
                  value=1 name=boy5 disabled=false>
        Girl <br>
        <span class="text2">
        <select name="thang5" class="bottom" id="thang5" style="width:80px;" disabled=false>
          <option value="">Month</option>
           <? 
				for($i=1; $i<=12; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
        </select>
        <select name="ngay5" class="bottom" id="ngay5" disabled=false>
          <option value="">Day</option>
         <? 
				for($i=1; $i<=31; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
          
        </select>
        <select name="nam5" class="bottom" id="nam5" disabled=false>
          <option value="">Year</option>
          <? 
				for($i=1980; $i<=2010; $i++){ 									 
					echo "<option value=$i>$i</option>";
				}
			?>
        </select>
        </span></span></TD>
                              </tr>
                              <tr>
                                <TD height="21" valign="middle"><div align="right" class="style10"><FONT 
                              face=verdana,arial,helvetica,sans-serif 
                              size=1>DOB</div></TD>
                                <td></td>
                              </tr>
                          </table></td>
	</tr>
	<tr>
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
	<tr>
	  <td height="25" align="right" valign="middle" class="text_def">Where did you hear about us?</td>
	  <td valign="middle" class="text2" ><FONT face=verdana,arial,helvetica,sans-serif 
                  size=2>
	    <SELECT name=where class="bottom" id="where">
          <option value="Yellowpages">Yellowpages</option>
          <option value="Local paper">Local paper</option>
          <option value="Mouth to mouth">Mouth to mouth</option>
          <option value="Magazine">Magazine</option>
        </SELECT>
	  </FONT></td>
	  </tr>
	<tr>
	  <td height="25" valign="top" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  <td valign="middle" class="text2" ><input name="Submit" style="WIDTH:100px;" type="submit" class="bottom" value="Register">
		  <input name="Submit2" type="reset" class="bottom" style="WIDTH:100px;" value="Reset">
			<input type="hidden" name="register_form" value="register_form">
	  </td>
	</tr>
	</form>
</table>
<? }?>