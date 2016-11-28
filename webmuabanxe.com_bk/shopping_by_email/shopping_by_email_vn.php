<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<SCRIPT src="admin/inc/vietuni.js"></SCRIPT>

<script language=JavaScript>



function checkInput(param)

{  

	if (isEmail(param.email.value)==false){
		alert("Xin vui lòng nhập email!");
		param.email.focus();
		return false;
	}
	if (param.phone.value==""){
		alert("Xin vui lòng nhập số điện thoại!");
		param.phone.focus();
		return false;
	}
	if (param.userstring.value==""){
		alert("Xin vui lòng nhập mã bảo vệ!");
		param.userstring.focus();
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
	$ssecuritycode= $_SESSION['ssecuritycode'];
	$varsecuritycode=strtoupper($_POST['userstring']);
	//echo "$ssecuritycode = $varsecuritycode";
	
	if($ssecuritycode==$varsecuritycode)
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

	

	

	$subject="DAT HANG QUA EMAIL VNHOMESHOPPING";

	$message='<br><br><b>DAT HANG QUA EMAIL</b>';

	$message.='<br>----------------------------------------------------------------------------';

	$message.='<br><b>Product:</b> '; 

	$message.=$name_product;

	$message.='<br><b>Code:</b> ';

	$message.=$code_product;

	$message.='<br>----------------------------------------------------------------------------';

	$message.='<br><b>Full Name:</b> '; 

	$message.=$full_name;

	$message.='<br><b>Address:</b> ';

	$message.=$address;

	$message.='<br><b>Phone:</b> ';

	$message.=$phone;

	$message.='<br><b>Email:</b> ';

	$message.=$email_from;

	$message.='<br>----------------------------------------------------------------------------';

	$message.='<br><b>Detail: </b><br>';

	$message.=$content;

	$message.='<br>----------------------------------------------------------------------------';

	

	$thanks="Cảm ơn quý khách, chúng tôi sẻ trả lời trong thời gian sớm nhất !";
	
	gui_email($mail_to,$email_from,$subject,$message,$thanks);

	echo "<script  language='JavaScript'>";

	echo "alert('Cảm ơn quý khách, chúng tôi sẻ trả lời trong thời gian sớm nhất !');";

	echo "</script>";

	echo "<meta http-equiv=refresh content=0;url=./>";

	//Email cam on!
	}
	else
		echo "<span class=text_do>Bạn nhập mã bảo vệ không chinh xác!</span>"; 
	} 
	else
	{
	?>
	<table width="581" align="center" cellpadding="0" cellspacing="0" class="bg_all">

  <tr height="40">

    <td height="50" align="left" class="tieu_de">Liên hệ đặt hàng</td>

  </tr>

  <tr>

    <td align="left"><p>Để thông tin đến với chúng tôi   			một cách chính xác, bạn vui lòng điền   			một số thông tin vào form dưới đây<br>

      Dựa vào thông tin náy chúng tôi sẽ liên  			lạc với bạn một cách nhanh nhất.<br>

      <br>

      <br>

    </p></td>

  </tr>

  <tr>

    <td align="center"><fieldset>

      <legend>Khách hàng nhập thông tin</legend>

       <form name="form" method="post"  action="<?=$form_action?>" onSubmit="return checkInput(this)">

	   <?

		$id= (int)rep($_GET["idpo"]);
		//echo "$id";
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

      <table width="455" align="center" cellspacing="0" class="bg_all">

        <tbody>

          <tr height="25">

            <td colspan="2" align="right"><? include("admin/inc/inc_go_dau_vn.php"); ?></td>
          </tr>

          <tr height="25">

            <td width="161" nowrap="nowrap">Sản phẩm bạn đã chọn:</td>

            <td width="281" class="tieu_de"><?=$name?></td>
          </tr>

          <tr height="25">

            <td nowrap="nowrap">Họ và tên:</td>

            <td><input name="fullname" class="textfield" id="fullname" onKeyUp="initTyper(this);" size="35" maxlength="50"></td>
          </tr>

          <tr height="25">

            <td nowrap="nowrap">Email:</td>

            <td><input name="email" class="textfield" id="email" size="35" maxlength="200"> 
            *</td>
          </tr>

          <tr height="25">

            <td nowrap="nowrap">Số điện thoại:</td>

            <td><input name="phone" class="textfield" id="phone" size="20" maxlength="15">
*</td>
          </tr>

          <tr height="25">

            <td nowrap="nowrap">Địa chỉ:</td>

            <td><input name="address" class="textfield" id="address" onkeyup="initTyper(this);" size="35" maxlength="250" /></td>
          </tr>

          <tr height="25">

            <td valign="top" nowrap="nowrap">Các thông tin khác:</td>

            <td><textarea name="content" cols="41" rows="5" class="textfield" id="content" onkeyup="initTyper(this);"></textarea></td>
          </tr>
			<tr>
			  <td height="25" valign="middle" class="tab_5">Bạn nhập mã bảo vệ vào ô bên cạnh:</td>
			  <td valign="middle"><input maxlength="8" size="8" name="userstring" type="text" value="" class="textfield" /><img src="product_tab/img.php" align="absmiddle" />
		*</td>
          <tr height="25">

            <td valign="top" nowrap="nowrap">&nbsp;</td>

            <td><input name="submit" type="submit" class="nut" value="Đặt hàng" /></td>
          </tr>

          <tr height="25">

            <td colspan="2"><em>- Chú ý: Mục có dấu (*) là bắt buộc</em></td>
          </tr>
        </tbody>
      </table>

      </form>



    </fieldset></td>

  </tr>

</table>

<? } ?>