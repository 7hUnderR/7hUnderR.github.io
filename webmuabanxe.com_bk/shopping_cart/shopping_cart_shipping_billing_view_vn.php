<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=javascript>
function submit_form(cat,lg,start)
	{
		document.frmList.noi_dung_email.value = document.getElementById('email_content').innerHTML;
		document.frmList.action="index.php?Bcat="+cat+"&lg="+lg+"&start="+start+"&payment";
		document.frmList.submit();
	}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="shopping_cart/style.css" rel="stylesheet" type="text/css" />
<form action="<?=$form_action?>" method="post" name="frmList">
<input type="hidden" name="noi_dung_email" value=""/>
<input type="hidden" name="payment_id" value="<?=$payment_id?>" />

<input type="hidden" name="name" value="<?=$name?>" />
<input type="hidden" name="address_1" value="<?=$address_1?>" />
<input type="hidden" name="address_2" value="<?=$address_2?>" />
<input type="hidden" name="city" value="<?=$city?>" />
<input type="hidden" name="state" value="<?=$state?>" />
<input type="hidden" name="zip" value="<?=$zip?>" />
<input type="hidden" name="country" value="<?=$country?>" />
<input type="hidden" name="phone_1" value="<?=$phone_1?>" />
<input type="hidden" name="phone_2" value="<?=$phone_2?>" />

<input type="hidden" name="b_name" value="<?=$b_name?>" />
<input type="hidden" name="b_address_1" value="<?=$b_address_1?>" />
<input type="hidden" name="b_address_2" value="<?=$b_address_2?>" />
<input type="hidden" name="b_city" value="<?=$b_city?>" />
<input type="hidden" name="b_state" value="<?=$b_state?>" />
<input type="hidden" name="b_zip" value="<?=$b_zip?>" />
<input type="hidden" name="b_country" value="<?=$b_country?>" />
<input type="hidden" name="b_phone_1" value="<?=$b_phone_1?>" />
<input type="hidden" name="b_phone_2" value="<?=$b_phone_2?>" />


<input type="hidden" name="discount_code" value="<?=$discount_code?>" />

<div id="email_content">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="text_def">
      <!--DWLayoutTable-->
  <tr valign="middle" class="text_def"> 
    <td height="22" colspan="2" class="border_b tieu_de" ><strong>Th&ocirc;ng tin &#273;&#417;n &#273;&#7863;t h&agrave;ng </strong></td>
    </tr>
	    <tr valign="center" class="bg_all"> 
    <td width="50%" height="18" align="left" valign="middle" class="text_def"><strong>&#272;&#7883;a ch&#7881; nh&#7853;n h&agrave;ng </strong></td>
    <td align="left" valign="middle" class="main_bold"><strong>&#272;&#7883;a ch&#7881; thanh to&aacute;n </strong></td>
    </tr>
    <tr valign="top" class="text_def"> 
    <td height="19" colspan="2" align="middle"> 
    <hr size="1" noshade color="#999999">
    </td>
    </tr>
    <tr> 
    <td height="50"  align="left" valign="top" class="text_def"><?
		echo"$name";
		echo"<br>Địa chỉ: $address_1";
		echo"<br>Email: $email_1";
		echo"<br>Quốc gia: $country_text";
		echo"<br>Điện thoại: $phone_1";
		echo"<br>Điện thoại di động: $phone_2";
	?></td>
    <td  align="left" valign="top" class="style3"><?
		echo"$b_name";
		echo"<br>Địa chỉ: $b_address_1";
		echo"<br>Email: $b_email_1";
		echo"<br>Quốc gia: $b_country_text";
		echo"<br>Điện thoại: $b_phone_1";
		echo"<br>Điện thoại di động: $b_phone_2";
	?></td>
    </tr>
    <tr valign="top" class="text_def"> 
    <td height="19" colspan="2" align="middle"> 
      <hr size="1" noshade color="#999999">
    </td>
    </tr>
    <tr align="left" valign="top" class="text_def"> 
    <td height="15" colspan=2 valign="top" class="tab_left_10"><!--DWLayoutEmptyCell-->&nbsp;
	</td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="text_def">
      <!--DWLayoutTable-->
    <tr valign="middle"> 
    <td height="22" colspan="8" class="tieu_de"><strong>Thông tin sản phẩm </strong></td>
    </tr>
	    <tr valign="center" class="bg_all"> 
    <td width="5%"  height="19" align="center" valign="middle" >Stt.</td>
    <td colspan="3" align="left" valign="middle" >Tên</td>
    <td width="20%" >Mã</td>
    <td width="15%" align="left" valign="middle" >Gía</td>
    <td width="15%"  align="left" valign="middle" >Số lượng</td>
    <td width="20%"  align="left" valign="middle" >Tổng</td>
    </tr>
    <tr valign="top"> 
    <td height="19" colspan="8" align="middle"> 
      <hr size="1" noshade color="#999999">    </td>
    </tr>
    <?php
	$i=0; 
	$sum_price=0;
	$dem=0;
	$myLength = strlen($cart);
	for ( $i = 0; $i < $myLength; ++$i )
		{   
			$ch = $cart{$i};
			if($ch==",") $dem++;
		}
	
	for ( $i = 1; $i <$dem; ++$i )
	  {   
	  $product=lay_product($cart,$i);
	  $id=lay_id($product,1);
	  $made=lay_id($product,2);
	  
	  $size=lay_id($product,3);
	  $color=lay_id($product,4);
	  $qty=lay_id($product,5);
	  
	//$cart=str_replace (",", "','", $items);
	
	$SQL =" select * from tb_product where id=$id ";
	$result = mysql_query($SQL);
	$rs = mysql_fetch_array ($result);

	$id=$rs["id"];
	$code=$rs["product_code"];
	$ten=$rs["ten_$lg"];
   
	$price=$rs["product_price"];
    $price_sell_off=$rs["product_sell_off"];
	
	if($price_sell_off==0)
	   $price_ed=$price;
	else
	   $price_ed=$price_sell_off;
	   
	$price_sum_item=$qty*$price_ed;
	$sum_price=$sum_price+$price_sum_item;
	
	?>
    <tr> 
    <td height="22"  align="center" class="text">
    <?=$i?>    </td>
    <td colspan="3" align="left" valign="middle" class="ten_product"><a href="./?id_pproductv=<?=$id?>&lg=<?=$lg?>&start=0"><?=$ten?>
    </a></td>
    <td><?=$code?></td>
    <td align="left" valign="middle"><? 
	$price_ed_v=number_format($price_ed);
	echo $price_ed_v." $project_tien"; ?> </td>
    <td align="left" valign="middle"><?=$qty?></td>
    <td align="left" valign="middle"><? 
	$price_sum_item_v=number_format($price_sum_item);
	echo $price_sum_item_v." $project_tien"; ?></td>
    </tr>
	    <tr> 
    <td height="22">&nbsp;</td>
    <td width="74" >&nbsp;</td>
    <td width="184"  valign="middle" ><span class="ten_product">
      <input type=hidden value="<?=$size?>" name="size_<?=$id?>"> 
    </span></td>
    <td width="113" align="left" valign="middle" class="ten_product"><input type=hidden value="<?=$color?>" name="color_<?=$id?>"></td>
    <td>&nbsp;</td>
    <td colspan="3" align="left" valign="middle"><span class="ten_product">
      <input type=hidden value="<?=$made?>" name="made_<?=$id?>">
    </span> </td>
    </tr>
    <?
 	} //End for
	 ?>
    <tr valign="top"> 
    <td height="10" colspan="8" align="middle"><hr size="1" noshade color="#999999"></td>
    </tr>
    <tr align="right" valign="middle">
      <td height="21" colspan="5" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td>&nbsp;</td>
      <td align="left" valign="middle"><? 
	  $sum_price_v=number_format($sum_price);
	  echo $sum_price_v." $project_tien"; ?></td>
      </tr>
    <tr align="right" valign="middle">
      <td height="21" colspan="5" align="left" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td align="left" valign="middle"><? echo "Vận chuyển:"; $tax_value=gia_tri_mot_cot("tb_shopping_cart_tax","tax_code","$tax","tax_value")?></td>
      <td colspan="2" align="left" valign="middle"><? 
	  $tax_value_v=number_format($tax_value);
	  echo "$tax_value $project_tien"; ?></td>
      </tr>
    <tr align="right" valign="middle"> 
    <td height="21" colspan="5" align="left" valign="middle">Yêu cầu đặt biệt:</td>
    <td height="1" rowspan="2" align="left" valign="middle"><? echo"<b>Tổng cộng:</b>";?></td>
      <td colspan="2" rowspan="2" align="left" valign="middle"><b><? $total=$tax_value+$sum_price; 
	  $total=number_format($total);
	  echo $total." $project_tien"; ?>
      </b></td>
      </tr>
    <tr align="right" valign="middle">
      <td colspan="5" rowspan="2" align="left" valign="top"><div contenteditable="true" 
                              style="BACKGROUND: white; BORDER-BOTTOM: #999999 1px solid; BORDER-TOP: #999999 1px solid; BORDER-LEFT: #999999 1px solid; BORDER-RIGHT: #999999 1px solid; height:45px;" align="left" class="tab_5_5_5_5"></div></td>
      </tr>
	<tr align="left" valign="top" class="bg_all">
	  <td width="204" height="43"></td>
      <td></td>
    <td></td>
	</tr>
	<tr align="left" valign="top" class="bg_all">
	  <td height="19" colspan=8 valign="middle" class="tab_left_10"> 
     <input type=hidden value="<?=$total?>" name="sum_price">	 </td>
      </tr>
</table>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="bg_main">
  
	    <tr valign="center" class="bg_all"> 
    <td height="18" align="left" valign="middle" class="text_def" ><hr size="1" noshade color="#999999"></td>
    </tr>
    <tr align="left" valign="top" class="bg_all">
      <td height="18" valign="top" class="tab_left_10">
		<?
		$cat_b=gia_tri_mot_cot("tb_bac_2","trang",72,"ma_bac_2");
		?>
	  <input type="button" onclick="submit_form('<?=$cat_b?>','<?=$lg?>','0'); " class="nut_nhan_2"  value="Submit" >
	  </td>
    </tr>
    <tr align="left" valign="top" class="bg_all"> 
    <td height="18" valign="top" class="tab_left_10"><!--DWLayoutEmptyCell-->&nbsp;	</td>
    </tr>
</table>
<input name="frmList" value="frmList" type="hidden" />
</form>
