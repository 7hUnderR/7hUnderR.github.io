<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css">
<SCRIPT src="admin/inc/vietuni.js"></SCRIPT>
<script language=JavaScript>

function checkInput(param)
{  
	if (isEmail(param.email.value)==false){
		alert("Xin vui lòng nhập email!");
		param.email.focus();
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
<?
	
	if ((isset($_POST["form"])) && ($_POST["form"] == "form")) 
	{
	$mail_to=$project_email_2;
	$name_product=$HTTP_POST_VARS["name_product"];
	$code_product=$HTTP_POST_VARS["code_product"];
	
	$full_name=$HTTP_POST_VARS["fullname"];
	$address=$HTTP_POST_VARS["address"];
	$phone=$HTTP_POST_VARS["phone"];
	$email_from=$HTTP_POST_VARS["email"];
	//$fax=$HTTP_POST_VARS["fax"];
	$content=$HTTP_POST_VARS["content"];
	
	$ngay=date("d/m/y");
	
	
	$subject="NHAN EMAIL KHI THAY DOI GIA";
	$message='<br><br><b>NHAN EMAIL KHI THAY DOI GIA</b>';
	$message.='<br>----------------------------------------------------------------------------';
	$message.='<br><b>Product:</b> '; 
	$message.=$name_product;
	$message.='<br><b>Code:</b> ';
	$message.=$code_product;
	$message.='<br>----------------------------------------------------------------------------';
	$message.='<br><b>Full Name:</b> '; 
	$message.=$full_name;
	$message.='<br><b>Email:</b> ';
	$message.=$email_from;
	$message.='<br>----------------------------------------------------------------------------';

	$thanks="Cảm ơn quý khách, chúng tôi sẻ trả lời trong thời gian sớm nhất !";
	
	gui_email($mail_to, $email_from, $subject, $message, $thanks);
	
	echo "<script  language='JavaScript'>";
	echo "alert('Cảm ơn quý khách, chúng tôi sẻ trả lời trong thời gian sớm nhất !');";
	echo "</script>";
	echo "<meta http-equiv=refresh content=0;url=./>";
	//Email cam on!
	} 
	else
	{
	?>
	
<table width="581" align="center" cellpadding="0" cellspacing="0" class="bg_all">
  <tr height="40">
    <td height="50" align="center" class="tieu_de">Nhận email khi thay đổi giá </td>
  </tr>
  
  <tr>
    <td align="center"><fieldset>
      <legend>Khách hàng nhập thông tin</legend>
       <form name="form" method="post"  action="<?=$form_action?>" onSubmit="return checkInput(this)">
	   <?
		$id=$_GET["idpo"];
		$table="tb_product";
		$query = "Select * FROM  $table where id=$id and banner!=1 and activate=1 ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		
		$name=$rs["ten_$lg"];
		$code=$rs["product_code"];
	   ?>
	  <input name="code_product" value="<?=$code?>" type="hidden">
      <input name="name_product" value="<?=$name?>" type="hidden">
	  <input name="form" value="form" type="hidden">
      <table width="448" align="center" cellspacing="0" class="bg_all">
        <tbody>
          <tr height="30">
            <td colspan="2" align="right"><? include("admin/inc/inc_go_dau_vn.php"); ?></td>
          </tr>
          <tr height="30">
            <td nowrap="nowrap">Sản phẩm bạn đã chọn:</td>
            <td class="tieu_de"><?=$name?></td>
          </tr>
          <tr height="30">
            <td nowrap="nowrap">Họ và tên:</td>
            <td><input name="fullname" class="textfield" id="fullname" onKeyUp="initTyper(this);" size="40" maxlength="50"></td>
          </tr>
          <tr height="30">
            <td nowrap="nowrap">Email:</td>
            <td><input name="email" class="textfield" id="email" size="40" maxlength="200">
                *</td>
          </tr>
          <tr height="30">
            <td valign="top" nowrap="nowrap">&nbsp;</td>
            <td><input name="submit" type="submit" class="nut" value="Gửi" /></td>
          </tr>
          <tr height="30">
            <td colspan="2"><em>- Chú ý: Mục có dấu (*) là bắt buộc</em></td>
          </tr>
        </tbody>
      </table>
      </form>

    </fieldset></td>
  </tr>
</table>
<? } ?>