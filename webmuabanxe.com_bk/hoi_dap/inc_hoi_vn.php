<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput(param)
{  
	if (param.fullname.value==""){
		alert("Xin vui lòng nhập tên của bạn !");
		param.fullname.focus();
		return false;
	}
	
	if (isEmail(param.email.value)==false){
		alert("Xin vui long nhập lại email !");
		param.email.focus();
		return false;
	}
	if (param.content.value==""){
		alert("Xin vui lòng nhập nọi dung !");
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
				
				if ((isset($_POST["form"])) && ($_POST["form"] == "form")) 
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
<table width="100%" cellpadding="0"  cellspacing="0">
					<!--DWLayoutTable-->
					<tr><td height="62" valign="top">
		 <? 
			$i=0;
			$thu_tu_cuoi_cung=0;
			$table="tb_news";
			if(strstr($qr,"Acat"))
				$query = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1";
			if(strstr($qr,"Bcat"))
			    $query = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1";
			if(strstr($qr,"Ccat"))
			    $query = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1";
			if(strstr($qr,"Dcat"))	
			    $query = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1";
			if(strstr($qr,"Ecat"))
			    $query = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1";
			$result = mysql_query($query);
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =5; 
			$cut_off = 10; 

			include("inc/phantrang.php");
		   
			if(strstr($qr,"Acat"))
				$query2 = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1  ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Bcat"))
			    $query2 = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Ccat"))
			    $query2 = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Dcat"))	
			    $query2 = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count  ";
			if(strstr($qr,"Ecat"))
			    $query2 = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			$result2 = mysql_query($query2);
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $thu_tu_cuoi_cung=$rs["thu_tu"];
			  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 style=\"float:left ; margin-right: 10px;\"></a>";
			  else
			  $anh="";
			  
			  $ten="<b><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">".$rs["ten_$lg"]."</a></b>";
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  $ngay="<span class=nho_lot>".$rs["ngay"]."</span>";
			  if($lg=="vn")
			    $more="<span class=topic><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">Xem trả lời</a> | </span>";
			  else
			    $more="<span class=topic><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">Detail++</a> | </span>";
			?>
					  <table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <!--DWLayoutTable-->
			  <tr>
				<? if($anh!=""){?><td width="10" rowspan="3" valign="top"><?=$anh?></td><? } ?>
				<td height="21" align="left" valign="middle" class="tieude border_b"><?=$ten?></td>
			  </tr>
			  <tr>
			    <td height="28" valign="top" class="text_def"><?=$ghi_chu?></td>
		      </tr>
			  <tr>
				<td height="28" valign="top" class="text_def"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                                        <tr>
                                          <td width="2%"><div align="center"><img src="images/icon/icon3.gif" width="12" height="9" /></div></td>
                                          <td align="left" valign="middle" class="more"><?=$more?><?=$ngay?></td>
                                        </tr>
                                    </table></td>
			  </tr>
			</table>
                      <? } ?></td>
				    </tr>
				    <tr> 
                      <td height="252" valign="top"><? ?>
					  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                        <!--DWLayoutTable-->
                           <form name="form" method="post"  action="<?=$form_action?>" onSubmit="return checkInput(this)">
					   <tr>
                          <td width="30%" height="38" align="left" valign="middle" bgcolor="#EFF0F1">(*) bắt buộc phải điền</td>
                          <td width="70%" valign="middle" bgcolor="#F4F4F4" class="tab_5 tieude">Gửi câu hỏi cho chúng tôi </td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" bgcolor="#EFF0F1"><strong>H&#7885; t&ecirc;n:</strong></td>
                      <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><input name="fullname" type="text" class="textfield"  id="fullname" size="40">
                        <span class="more">                      *</span></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" bgcolor="#EFF0F1"><strong>&#272;&#7883;a ch&#7881;:</strong></td>
                      <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><input name="address" type="text" class="textfield"  id="address" size="40"></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" bgcolor="#EFF0F1"><strong>Email:</strong></td>
                      <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><input name="email" type="text" class="textfield"  id="email" size="40">
                        <span class="more">*</span></td>
                    </tr>
                        
                        <tr>
                          <td height="24" align="right" valign="middle" bgcolor="#EFF0F1"><strong>&#272;i&#7879;n tho&#7841;i:</strong></td>
                      <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><input name="phone" type="text" class="textfield"  id="phone" size="40"></td>
                    </tr>
                        
                        <tr>
                          <td height="76" align="right" valign="top" bgcolor="#EFF0F1"><strong>Câu hỏi:</strong></td>
                      <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><textarea name="content" cols="45" rows="5" class="textfield"  id="content"></textarea>
                        <span class="more">*</span></td>
                    </tr>
                        <tr>
                          <td height="35" valign="middle" bgcolor="#EFF0F1"><!--DWLayoutEmptyCell-->&nbsp;</td>
                          <td valign="middle" bgcolor="#F4F4F4" class="tab_5"><input name="Submit" type="submit" class="nut" style="width:60px;"  value="G&#7917;i">
                            <input name="Submit2" type="reset" class="nut" style="width:60px;"  value="Vi&#7871;t l&#7841;i">
					    <input type="hidden" name="form" value="form"></td>
                    </tr>
                        </form>
                      </table>
					  <? ?>
                      <br />
                      <br /></td>
                      </tr>
					
</table>
				  <?
				  }
				  ?>
