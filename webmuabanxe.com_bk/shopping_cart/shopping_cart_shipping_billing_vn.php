<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" src="shopping_cart/inc/form_validation.js"></script>
<link href="shopping_cart/style.css" rel="stylesheet" type="text/css" /></head>
<script language="javascript">
<!--
	function SubmitSignUp() {
		//var theForm=document.forms['AddressForm'];
		var theForm=document.AddressForm;
		if (theForm.ShippingName.value.length<3) {
			alert("Please enter your shipping name.");
			theForm.ShippingName.focus();
			return false;
		}
		if (theForm.ShippingAddress1.value.length<5) {
			alert("Please enter your shipping address.");
			theForm.ShippingAddress1.focus();
			return false;
		}
		if (isEmail(theForm.ShippingEmail.value)==false){
			alert("Xin vui lòng nhập email!");
			theForm.ShippingEmail.focus();
			return false;
		}
		if (theForm.ShippingPhone1.value.length<7) {
			alert("Please enter your shipping phone number.");
			theForm.ShippingPhone1.focus();
			return false;
		}
//		if (theForm.ShippingPhone2.value.length<7) {
//			alert("Please enter your mobile phone number.");
//			theForm.ShippingPhone2.focus();
//			return false;
//		}
		if (theForm.SameAddress.checked==false) {
  		if (theForm.BillingName.value.length<3) {
  			alert("Please enter your billing name.");
  			theForm.BillingName.focus();
  			return false;
  		}
  		if (theForm.BillingAddress1.value.length<5) {
  			alert("Please enter your billing address.");
  			theForm.BillingAddress1.focus();
  			return false;
  		}
		if (isEmail(theForm.BillingEmail.value)==false){
			alert("Xin vui lòng nhập email!");
			theForm.BillingEmail.focus();
			return false;
		}
  		if (theForm.BillingPhone1.value.length<7) {
  			alert("Please enter your billing phone number.");
  			theForm.BillingPhone1.focus();
  			return false;
  		}
//  		if (theForm.BillingPhone2.value.length<7) {
//  			alert("Please enter your mobile phone number.");
//  			theForm.BillingPhone2.focus();
//  			return false;
//  		}
		}
		//theForm.submit();
		return true;
	}
	function SameAddressCheck() {
		var theForm=document.forms["AddressForm"];
		if (theForm.SameAddress.checked) {
			try {
				document.getElementById("BillingTitle").style.display="none";
				document.getElementById("BillingAddress").style.display="none";
			} catch(e) {
				theForm.BillingName.disabled=true;
				theForm.BillingAddress1.disabled=true;
				theForm.BillingCountry.disabled=true;
				theForm.BillingPhone1.disabled=true;
				theForm.BillingPhone2.disabled=true;
			}
		} else {
			try {
				document.getElementById("BillingTitle").style.display="inline";
				document.getElementById("BillingAddress").style.display="inline";
			} catch(e) {
				theForm.BillingName.disabled=false;
				theForm.BillingAddress1.disabled=false;
				theForm.BillingCountry.disabled=false;
				theForm.BillingPhone1.disabled=false;
				theForm.BillingPhone2.disabled=false;
			}
		}
	}
	
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
//-->
</script>
<form name="AddressForm" method="post" action="index.php?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",71,"ma_bac_2");?>&lg=<?=$lg?>&start=0" onSubmit="return SubmitSignUp();">
<input name="sum_price" value="<?=$_POST["sum_price"]?>" type="hidden">
<table class="CenterColumn border_b" border="0" cellpadding="2" cellspacing="0" width="100%">
  <tbody><tr>
    <td><strong>&#272;&#7883;a ch&#7881; nh&#7853;n h&agrave;ng </strong></td>
  </tr>
</tbody></table>
<table class="CenterColumn" border="0" cellpadding="5" cellspacing="0" width="97%">
  <tbody><tr>
    <td>
    <table class="ProductListing" border="0" cellpadding="2" cellspacing="0" width="100%">
      <tbody><tr>
        <td width="150" align="right" class="text_def">H&#7885; t&ecirc;n: </td>
			<td><input  name="ShippingName" type="text" class="textfield" size="30" maxlength="50">
			  <span class="style6">*</span></td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;&#7883;a ch&#7881;: </td>
        <td><input  name="ShippingAddress1" type="text" class="textfield" size="50" maxlength="255">
        <span class="style6">*</span></td>
      </tr>
      
      <tr>
        <td align="right" class="text_def">Email:</td>
        <td><input  name="ShippingEmail" type="text" class="textfield" id="ShippingEmail" size="50" maxlength="255" />
        *</td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&nbsp;Qu&#7889;c gia: </td>
        <td><? 
			$table_="tb_country";
			$query_ = "Select * FROM  $table_ order by name_country ASC";
			$result_ = mysql_query($query_);
			?>
            <select name="ShippingCountryID" size="1" id="select" class="textfield">
            <option value="0" selected >- Select -</option>
            <? while($rs_= mysql_fetch_array($result_))
				{
				$code_country=$rs_["code_country"];
				?>
            <option value="<? echo $rs_["code_country"]?>" <? if($code_country==$rs["country"]) echo"selected"; ?>> 
            <? echo $rs_["name_country"];?>            </option>
            <? } ?>
          </select></td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;i&#7879;n tho&#7841;i: </td>
        <td class="small"><input name="ShippingPhone1" type="text" class="textfield" size="20" maxlength="20">
           <span class="style6"> *</span>&nbsp;<br />
           M&atilde; qu&#7889;c gia + M&atilde; v&ugrave;ng + S&#7889; &#273;i&#7879;n tho&#7841;i (V&iacute; d&#7909;. 612199999999)</td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;i&#7879;n tho&#7841;i di &#273;&#7897;ng: </td>
        <td class="small"><input  name="ShippingPhone2" type="text" class="textfield" size="20" maxlength="20">
          &nbsp;<br />
          M&atilde; qu&#7889;c gia + M&atilde; v&ugrave;ng + S&#7889; &#273;i&#7879;n tho&#7841;i (V&iacute; d&#7909;. +61414123456)</td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&nbsp;</td>
        <td class="style6"><input name="SameAddress" value="ON" onClick="SameAddressCheck();" type="checkbox">
        K&iacute;ch v&agrave;o &#273;&acirc;y n&#7871;u &#273;&#7883;a ch&#7881; thanh to&aacute;n gi&#7889;ng nh&#432; &#273;&#7883;a ch&#7881; nh&#7853;n h&agrave;ng.</td>
      </tr>
    </tbody>
    </table>
    </td>
  </tr>
</tbody></table>
<table class="CenterColumn" id="BillingTitle" border="0" cellpadding="2" cellspacing="0" width="97%">
  <tbody><tr>
    <td class="border_b"><strong>&#272;&#7883;a ch&#7881; thanh to&aacute;n </strong></td>
  </tr>
</tbody></table>
<table id="BillingAddress" class="CenterColumn" border="0" cellpadding="5" cellspacing="0" width="97%">
  <tbody><tr>
    <td>
    <table class="ProductListing" border="0" cellpadding="2" cellspacing="0" width="100%">
      <tbody><tr>
        <td width="150" align="right" class="text_def">H&#7885; t&ecirc;n: </td>
        <td><input  name="BillingName" type="text" class="textfield" size="30" maxlength="50">
        <span class="style6">*</span></td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;&#7883;a ch&#7881;: </td>
        <td><input  name="BillingAddress1" type="text" class="textfield" size="50" maxlength="255">
        <span class="style6">*</span></td>
      </tr>
      
      <tr>
        <td align="right" class="text_def">Email: </td>
        <td><input  name="BillingEmail" type="text" class="textfield" id="BillingEmail" size="50" maxlength="255" />
        *</td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">Qu&#7889;c gia: </td>
        <td><? 
			$table_="tb_country";
			$query_ = "Select * FROM  $table_ order by name_country ASC";
			$result_ = mysql_query($query_);
			?>
            <select name="BillingCountryID" size="1" id="select" class="textfield">
            <option value="0" selected >- Select -</option>
            <? while($rs_= mysql_fetch_array($result_))
				{
				$code_country=$rs_["code_country"];
				?>
            <option value="<? echo $rs_["code_country"]?>" <? if($code_country==$rs["country"]) echo"selected"; ?>> 
            <? echo $rs_["name_country"];?>            </option>
            <? } ?>
          </select></td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;i&#7879;n tho&#7841;i: </td>
        <td class="small"><input  name="BillingPhone1" type="text" class="textfield" size="20" maxlength="20">
          <span class="style6">&nbsp;*&nbsp;<br />
          M&atilde; qu&#7889;c gia + M&atilde; v&ugrave;ng + S&#7889; &#273;i&#7879;n tho&#7841;i (V&iacute; d&#7909;. 612199999999)</span></td>
      </tr>
      <tr>
        <td width="150" align="right" class="text_def">&#272;i&#7879;n tho&#7841;i di &#273;&#7897;ng: </td>
        <td class="small"><input  name="BillingPhone2" type="text" class="textfield" size="20" maxlength="20">
          &nbsp;<br />
          M&atilde; qu&#7889;c gia + M&atilde; v&ugrave;ng + S&#7889; &#273;i&#7879;n tho&#7841;i (V&iacute; d&#7909;. +61414123456)</td>
      </tr>
    </tbody></table>
    </td>
  </tr>
</tbody></table>
    <table class="ProductListing" border="0" cellpadding="2" width="96%">
      <tbody><tr>
        <td align="right" width="150">&nbsp;</td>
        <td>
          <input name="Submit" type="submit" class="nut_nhan_2" value="Tiếp tục" />
        </td>
      </tr>
    </tbody></table>
    <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>
        <td height="5"></td>
      </tr>
    </tbody></table>
	<input name="payment_id" value="<?=$_GET["payment_id"]?>" type="hidden" />
</form>