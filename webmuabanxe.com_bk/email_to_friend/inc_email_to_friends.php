<?
 $trang_here=35;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
?>
<SCRIPT language=JavaScript>
 function send_to_f()
{
	if(!isEmail(form_mail.email.value)){
		alert("Xin vui long nhap Email! ");
		form_mail.email.focus();
		return false;
	}
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

</SCRIPT>
<?

if ( (isset($_POST["form_mail"])) && ($_POST["form_mail"] == "form_mail"))
 {
	
	$mailto=$HTTP_POST_VARS["email"];
	$link_page="<a href=\"http://www.saigonoto.com.vn\" target=\"_blank\">http://www.saigonoto.com.vn</a>";
	
	$ngay = date("F j, Y");
	$subject=" Mail to friends !";
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "To: $mailto \r\n"; 
	$headers .= "From: < $project_email > \r\n"; 
	
 	$message='<br><br><b>$link_page</b>';
	$message.='<br>----------------------------------------------------------------------------';
	$message.='<br><b>Clink Here:</b> ';
	$message.=$link_page;
	$message.='<br>----------------------------------------------------------------------------';
	
	if(mail($mailto, $subject, $message, $headers))
		$tip="Send completed !";

	echo "<script  language='JavaScript'>";
	echo "alert('$tip')";
	echo "</script>";
}
?>

<?php 
		if($lg=="eg")
	    {
		$sub = " Send";		
		}
	else
		{
		$sub = " Gửi ";	
		}
	?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="block_1_center">
  <tr>
    <td height="27" valign="top" class="block_1_bottom" ><table class="block_1_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		<tbody>
		  <tr>
			<td valign="middle" class="title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		  <tr>
			<td class="tab_10_10_10_10 text_def"><div id=AdEmailToFriendLoc style="DISPLAY: block"><table width="70%" border="0" cellpadding="0" cellspacing="2">
                              <form name="form_mail" method="post" action="<?=$form_action?>" onSubmit="return send_to_f()">
							    <tr>
                                  <td width="61%" height="20" valign="middle">
                                      <input name="email" type="text" class="textfield" value="Email here" onFocus="email.value=''" style="width: 100px;">                                  </td>
                                  <td width="39%"><input name="Submit" type="submit" class="nut" value="<?=$sub;?>" /></td>
                                </tr>
							    <input type="hidden" name="form_mail" value="form_mail">
						      </form>
                              </table></div></td>
		  </tr>
		</tbody>
</table>
</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>
	<? } ?>