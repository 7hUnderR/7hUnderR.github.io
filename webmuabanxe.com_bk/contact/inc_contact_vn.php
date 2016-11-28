<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput(param)
{  
	if (param.fullname.value==""){
		alert("Xin vui lòng nhập họ tên của quý khách!");
		param.fullname.focus();
		return false;
	}
	if (isEmail(param.email.value)==false){
		alert("Xin vui lòng nhập email!");
		param.email.focus();
		return false;
	}
	
	if (param.content.value==""){
		alert("Xin vui lòng nhập nội dung yêu cầu!");
		param.content.focus();
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
				$mail_to=$project_email;

				$full_name=$HTTP_POST_VARS["fullname"];
				$address=$HTTP_POST_VARS["address"];
				$phone=$HTTP_POST_VARS["phone"];
				$email_from=$HTTP_POST_VARS["email"];
				//$fax=$HTTP_POST_VARS["fax"];
				$content=$HTTP_POST_VARS["content"];
				
				$ngay=date("d/m/y");
				
				
				$subject="Contact Information from website - $project_title";
				 
				$message='<br><br><b>CONTACT INFORMATION - $project_title </b>';
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
				
				$thanks="Cảm ơn quý khách đã liên hệ, chúng tôi sẻ trả lời trong thời gian sớm nhất !";
				
				$ssecuritycode= $_SESSION['ssecuritycode'];
				$varsecuritycode=strtoupper($_POST['userstring']);
				//echo "$ssecuritycode = $varsecuritycode";
				
				if($ssecuritycode==$varsecuritycode)
				{
				gui_email($mail_to, $email_from, $subject, $message, $thanks);
				
				echo "<script  language='JavaScript'>";
				echo "alert('Cảm ơn quý khách đã liên hệ, chúng tôi sẻ trả lời trong thời gian sớm nhất !');";
				echo "</script>";
				echo "<meta http-equiv=refresh content=0;url=./>";
				}
				else
				echo "<span class=text_do>Bạn nhập mã bảo vệ không chinh xác!</span>"; 

				//Email cam on!
				} 
				else
				{
				?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<table width="100%" cellpadding="0"  cellspacing="0">
					<tr><td height="62" align="left" valign="top" class="text_def">
					  <br>
					  <? 
							$query = "Select * FROM  tb_news where ma_bac_1=$cat and banner!=1 and activate=1 and ngoai_index!=1 ORDER BY thu_tu DESC";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);
							$noi_dung=$rs["mo_ta_$lg"];
							$noi_dung=cat_duong_dan_thua($noi_dung);
							echo"$noi_dung";
					?>
                      <br>				</td>
				    </tr>
					
                    <form name="form" method="post"  action="<?=$form_action?>" onSubmit="return checkInput(this)">
				    <tr> 
                      <td height="252" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->
                        <tr>
                          <td width="25%" height="30" class="tab_5 path"><!--DWLayoutEmptyCell-->&nbsp;</td>
                          <td width="75%" valign="middle" class="tieu_de tab_5">Gửi email li&ecirc;n h&#7879;</td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" class="text_def">H&#7885; t&ecirc;n:</td>
                      <td valign="middle" class="tab_5">
                      <input name="fullname" type="text" class="textfield"  id="fullname" size="40">
                      <span class="tieude">*</span></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" class="text_def">&#272;&#7883;a ch&#7881;:</td>
                      <td valign="middle" class="tab_5"><input name="address" type="text" class="textfield"  id="address" size="40"></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" class="text_def">Email:</td>
                      <td valign="middle" class="tab_5"><input name="email" type="text" class="textfield"  id="email" size="40">
                        <span class="tieude">*</span></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" class="text_def">&#272;i&#7879;n tho&#7841;i:</td>
                      <td valign="middle" class="tab_5"><input name="phone" type="text" class="textfield"  id="phone" size="40"></td>
                    </tr>
                        
                        <tr>
                          <td height="76" align="right" valign="top" class="text_def">Chi ti&#7871;t:</td>
                      <td valign="middle" class="tab_5"><textarea name="content" cols="42" rows="5" class="textfield"  id="content"></textarea>
                        <span class="tieude">*</span></td>
                    </tr>
    <tr>
      <td height="20" align="right" valign="middle" class="tab_5">Bạn nhập mã bảo vệ vào ô bên cạnh:</td>
      <td height="20" valign="middle" class="tab_5"><input maxlength="8" size="8" name="userstring" type="text" value="" class="textfield" /><img src="contact/img.php" align="absmiddle" />
*</td>
    </tr> 
	<tr>
                          <td height="35"></td>
                          <td valign="middle" class="tab_5"><input name="Submit" type="submit" class="nut" style="width:60px;"  value="G&#7917;i">
					        <input name="Submit2" type="reset" class="nut" style="width:60px;"  value="Vi&#7871;t l&#7841;i">
						    <input type="hidden" name="form" value="form">
					      <span class="tab_5">(*) bắt buộc phải điền</span></td>
                    </tr>
                        
                      </table>
                      </td>
                      </tr>
					</form>
</table>
				  <?
				  }
				  ?>
