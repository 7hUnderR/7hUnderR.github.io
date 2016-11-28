<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="JavaScript1.2" src="shopping_cart/vietuni.js" type='text/javascript'></script> 
<script language="javascript" src="shopping_cart/inc/form_validation.js"></script>
<script language=JavaScript>

function checkUpadteProfile(param){  

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
if(!session_is_registered("ten_dang_nhap"))
{
	header("Location: index.php");
}


if ((isset($_POST["update_profile_form"])) && ($_POST["update_profile_form"] == "update_profile_form"))
 {
	$table="tb_shopping_cart_auto";
	$query = "Select * FROM  $table ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$kichhoat=$rs["account"];
	
	$ten=rep($HTTP_POST_VARS["fullname"]);
	$sex="";
	$ngay_sinh="";
	$address=rep($HTTP_POST_VARS["address"]);
	
	$quan_huyen="";
	$tinh_thanh=rep($HTTP_POST_VARS["country"]);
	$zip="";

	$ma_vung="";
	$dt_codinh=$HTTP_POST_VARS["dt_codinh"];
	$dt_didong=rep($HTTP_POST_VARS["dt_didong"]);
	$fax="";
	
	$you_are="";
	$where_now="";
	
	$ip = getenv ("REMOTE_ADDR"); 
	$ngay = date("F j, Y, g:i a");

		$table = "tb_member";
		$query = "UPDATE $table SET ten='$ten',sex='$sex',ngay_sinh='$ngay_sinh',address='$address',city='$quan_huyen',zip='$zip',country='$tinh_thanh',ma_vung='$ma_vung',dt_codinh='$dt_codinh',dt_didong='$dt_didong',fax='$fax',you_are='$you_are',where_now='$where_now',kichhoat='$kichhoat',ngay='$ngay',ip='$ip'";
		$query .= " WHERE ma_user = '$ma_dang_nhap' ";
		//echo "$query";
		if($result = mysql_query($query))
		{
			echo '<table width="100%" border="0" cellpadding="5" cellspacing="1">';
			echo '<tr><td height="300px" valign="top">';		
			echo "Upadate complated !";
			echo '</td></tr>';
			echo '</table>';
			//echo '<meta http-equiv="refresh" content="2;url=index.php">';
			/*echo "<script  language='JavaScript'>";
			echo "alert('Cập nhật thành công !')";
			echo "redirect('forum.php')";
			echo "</script>";		*/
		}
		if($kichhoat==0){
			echo '<table width="100%" border="0" cellpadding="5" cellspacing="1">';
			echo '<tr><td height="300px">';		
			echo "Upadate complated !";
			echo '</td></tr>';
			echo '</table>';
			echo '<meta http-equiv="refresh" content="2;url=index.php">';
			/* echo "<script  language='JavaScript'>";
			echo "alert('Xin vui lòng chờ chúng tôi cấp phép sau 24 giờ.')";
			echo "redirect('forum.php')";
			echo "</script>";*/
		}
	}

else
{
	$result = select_co_2dk("tb_member","ma_user",$ma_dang_nhap,"kichhoat","1","id","ASC");
	$rs = mysql_fetch_array($result);
?>
<script language="javascript" src="inc/form_validation.js"></script>
<link href="member/style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<table width="400" border="0" align="center" cellpadding="1" cellspacing="1" class="tbldata">
  <form name="update_profile_form" method="post"  ENCTYPE="multipart/form-data" action="<?=$form_action?>" onSubmit="return checkUpadteProfile(this)">
  <input type="hidden" name="update_profile_form" value="update_profile_form">
	<thead>
	<tr>
	<th width="30%">&nbsp;</th>
	<th height="23" colspan="2" align="center" valign="middle" id="senderheader"><div align="left">
	  <?=gia_tri_mot_cot("tb_bac_2","trang",79,"ten_$lg");?>
	  </div></th>
	</tr>
	</thead>
    <tr>
      <td height="20" align="right" valign="middle" class="text_tb" >  Full Name:</td>
    <td height="20" valign="middle" class="text_tb" >
      <input name="fullname" type="text" class="textfield" id="fullname" style="WIDTH:150px;"  value="<?=$rs["ten"]?>">
      <span class="style6"><span class="do">*</span></span> </td>
  </tr>
    
  	<tr>
	  <td height="20" align="right" valign="middle" class="text_tb" >Address:</td>
	  <td height="20" valign="middle" class="text_tb" ><input name="address" type="text" class="textfield" id="address" style="WIDTH:192px;"  value="<?=$rs["address"]?>">
      <span class="text_def"><span class="style6">*</span></span></td>
	</tr>
	<tr>
	  <td height="20" align="right" valign="middle" class="text_tb" >Country :</td>
	  <td height="20" valign="middle" class="text_tb" ><? 
			$table_="tb_country";
			$query_ = "Select * FROM  $table_ order by name_country ASC";
			$result_ = mysql_query($query_);
			?>
            <select name="country" size="1" class="textfield" id="select">
            <option value="0" selected >- Select -</option>
            <? while($rs_= mysql_fetch_array($result_))
				{
				$ma_nuoc=$rs_["code_country"];
				?>
            <option value="<?=$ma_nuoc?>" <? if($ma_nuoc==$rs["country"]) echo"selected"; ?> > 
            <? echo $rs_["name_country"];?>            </option>
            <? } ?>
      </select></td>
	</tr>
  <tr>
    <td height="20" align="right" valign="middle" class="text_tb" ><span class="style3">Phone (Home / Work)</span>:</td>
    <td height="20" valign="middle" class="text_tb" ><input name="dt_codinh" onKeyDown="AcceptNumbersOnly();" type="text" class="textfield" id="dt_codinh" style="WIDTH:150px;" value="<?=$rs["dt_codinh"]?>">
      <span class="style6"> *</span></td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" class="text_tb" ><span class="style3">Phone (Mobile)</span>:</td>
    <td height="20" valign="middle" class="text_tb" ><input name="dt_didong" onKeyDown="AcceptNumbersOnly();" type="text" class="textfield" id="dt_didong" style="WIDTH:150px;" value="<?=$rs["dt_didong"]?>"></td>
  </tr>
  <tr>
    <td height="40" valign="top" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" class="text_tb" ><input name="Submit" type="submit" class="nut_nhan_2" style="WIDTH:60px;" value="Update">
      <input name="Submit2" type="reset" class="nut_nhan_2" style="WIDTH:60px;" value="Reset"></td>
  </tr>
  </form>
</table>
<?php }?>