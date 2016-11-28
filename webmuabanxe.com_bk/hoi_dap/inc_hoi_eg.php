<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput(param)
{  
	if (param.fullname.value==""){
		alert("Please check agian your name !");
		param.fullname.focus();
		return false;
	}
	
	if (isEmail(param.email.value)==false){
		alert("Please check agian email !");
		param.email.focus();
		return false;
	}
	if (param.content.value==""){
		alert("Please check agian Inquiry!");
		param.content.focus();
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
				
				if ((isset($_POST["form_faq"])) && ($_POST["form_faq"] == "form_faq")) 
			    {
				$mail_to=$project_email;
				$thu_tu = max_cot("tb_news","thu_tu") + 1;
				
				$tieu_de = "Khách hàng hỏi";
				
				$full_name=$HTTP_POST_VARS["fullname"];
				$address=$HTTP_POST_VARS["address"];
				$phone=$HTTP_POST_VARS["phone"];
				$email_from=$HTTP_POST_VARS["email"];
				//$fax=$HTTP_POST_VARS["fax"];
				$content=$HTTP_POST_VARS["content"];
				
				$ghi_chu= $content;
				if($full_name!="")
				  $ghi_chu.="<br><br><b>Người gửi</b><br>Tên : ".$full_name."<br>";
				if($address!="")
				  $ghi_chu.="Địa chỉ : ".$address."<br>";
				if($phone!="")
				  $ghi_chu.="Điện thoai : ".$phone."<br>";
				if($email_from!="")
				  $ghi_chu.="Email : ".$email_from."<br>";				
				
				
				
				
				$noidung="";
				$ngay=date("d/m/y");
				$gio=date("g:i a");
				
				$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,ghi_chu_$lg,mo_ta_$lg,activate_,activate,banner,nguoi_viet,thu_tu,gio,ngay)";
				$sql .=" values('";			
				$sql .=$cat."','";
				$sql .=$cat_s."','";
				$sql .=$cat_s_s."','";
				$sql .=$cat_s_s_s."','";
				$sql .=$cat_s_s_s_s."','";
				$sql .=$tieu_de."','";
				$sql .=$ghi_chu."','";
				$sql .=$noidung."','";
				$sql .='0'."','"; 
				$sql .='0'."','"; 
				$sql .='0'."','";
				$sql .='1'."','";
				$sql .=$thu_tu."','";
				$sql .=$gio."','"; 
				$sql .=$ngay."')";
				if($result = mysql_query($sql))
				  $thanks="Cảm ơn quý khách đã liên hệ, chúng tôi sẻ trả lời trong thời gian sớm nhất !";
				else
				  $thanks="Gửi không thành công! xin quý khách vui lòng thực hiện lại.";
				
				echo "<script  language='JavaScript'>";
				echo "alert(' $thanks ');";
				echo "</script>";
				echo "<meta http-equiv=refresh content=0;url=$form_action>";
				//Email cam on!
				} 
				else
				{
				?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style_chuan.css" rel="stylesheet" type="text/css" />
<table width="100%" cellpadding="0"  cellspacing="0">
				    <tr> 
                      <td height="252" valign="top"><? ?>
                          <br />
                          <br />
                          <table width="100%" border="0" cellpadding="4" cellspacing="0">
                          <!--DWLayoutTable-->
                          <form name="form_faq" method="post"  action="<?=$form_action?>" onSubmit="return checkInput(this)">
                            <tr>
                              <td width="30%" height="30" align="left" valign="middle" bgcolor="#EFF0F1" class="more">(*) Mandatory Field</td>
                            <td width="70%" valign="middle" bgcolor="#F4F4F4" class="tieude">Send inquiry </td>
                      </tr>
                            
                            <tr>
                              <td height="24" align="right" valign="middle" bgcolor="#EFF0F1" ><strong>Your name:</strong></td>
                        <td valign="middle" bgcolor="#F4F4F4" ><input name="fullname" type="text" class="textfield"  id="fullname" size="40">
                          <span class="more">                      *</span></td>
                      </tr>
                            
                            <tr>
                              <td height="24" align="right" valign="middle" bgcolor="#EFF0F1" ><strong>Address:</strong></td>
                        <td valign="middle" bgcolor="#F4F4F4" ><input name="address" type="text" class="textfield"  id="address" size="40"></td>
                      </tr>
                            
                            <tr>
                              <td height="24" align="right" valign="middle" bgcolor="#EFF0F1" ><strong>Email:</strong></td>
                        <td valign="middle" bgcolor="#F4F4F4" ><input name="email" type="text" class="textfield"  id="email" size="40">
                          <span class="more">*</span></td>
                      </tr>
                            
                            <tr>
                              <td height="24" align="right" valign="middle" bgcolor="#EFF0F1" ><strong>Phone:</strong></td>
                        <td valign="middle" bgcolor="#F4F4F4" ><input name="phone" type="text" class="textfield"  id="phone" size="40"></td>
                      </tr>
                            
                            <tr>
                              <td height="76" align="right" valign="top" bgcolor="#EFF0F1" ><strong>Inquiry:</strong></td>
                        <td valign="middle" bgcolor="#F4F4F4" ><textarea name="content" cols="45" rows="5" class="textfield"  id="content"></textarea>
                          <span class="more">*</span></td>
                      </tr>
                            <tr>
                              <td height="35" valign="middle" bgcolor="#EFF0F1" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                            <td valign="middle" bgcolor="#F4F4F4" >
							<input name="Submit" type="submit" class="nut" style="width:60px;"  value="Send">
							<input name="Submit2" type="reset" class="nut" style="width:60px;"  value="Reset">
					    <input type="hidden" name="form" value="form"></td>
                      </tr>
                          </form>
                        </table>
					    <? ?>
                        <br />
                        <br /></td></tr>
					
</table>
				  <?
				  }
				  ?>
