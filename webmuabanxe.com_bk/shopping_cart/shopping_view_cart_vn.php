<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=javascript>
function docheckone()
		   {
		   		var alen=document.frmList.elements.length;
				var isChecked=true;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.frmList.chkid[i].checked==false)
							isChecked=false;
				}else
				{
					if(document.frmList.chkid.checked==false)
						isChecked=false;
				}				
				document.frmList.chkall.checked=isChecked;
		   }
function docheck(status,from_)
		   {
		   		var alen=document.frmList.elements.length;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						document.frmList.chkid[i].checked=status;
				}else
				{
						document.frmList.chkid.checked=status;
				}
				if(from_>0)
					document.frmList.chkall.checked=status;
		   }
 function checkInput()
		   {
				var alen=document.frmList.elements.length;
				var isChecked=false;
				var isNum=true;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
					{
						if(document.frmList.chkid[i].checked==true)
						{
							isChecked=true;							
							break;
						}
					}
					if (!isChecked)											
						{
						alert("Please select at least one of them");
						}
					
				}else
				{
					if(document.frmList.chkid.checked==true)
						isChecked=true;
					if (!isChecked)											
						{
						alert("Please select at least one of them");
						}
				}
				
				if (isChecked)											
					calculatechon();
				
												
			return isChecked;
		  } 
function calculatechon()
			{			
				var strchon=",";
				var alen=document.frmList.elements.length;				
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.frmList.chkid[i].checked==true)
							strchon+=document.frmList.chkid[i].value+",";
				}else
				{
					if(document.frmList.chkid.checked==true)
						strchon=document.frmList.chkid[i].value;
				}
				document.frmList.chkids.value=strchon;	
				
			}	
			
function shopping(cat,lg)
	{
		document.frmList.action="index.php?Bcat="+cat+"&lg="+lg+"&start=0";
		document.frmList.submit();
	}
function check_out(cat,lg)
	{
		checkInput();
		document.frmList.action="index.php?Bcat="+cat+"&lg="+lg+"&start=0";
		document.frmList.submit();
	}
function update(cat,lg,start)
	{
		checkInput();
		document.frmList.action="index.php?Bcat="+cat+"&lg="+lg+"&start="+start+"";
		document.frmList.submit();
	}
function submit_form(cat,payment,lg,start)
	{
		checkInput();
		document.frmList.action="index.php?Bcat="+cat+"&payment_id="+payment+"&lg="+lg+"&start="+start+"";
		document.frmList.submit();
	}
</script>
<script language="javascript" src="shopping_cart/inc/form_validation.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="shopping_cart/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tbldata">
	<? 
	$tax_value=gia_tri_mot_cot("tb_shopping_cart_tax","tax_code",$tax,"tax_value");
	?>
   <form action="<?=$form_action?>" method="post" name="frmList" onSubmit="return checkInput();">
	<thead>
	<tr>
	<th height="23" colspan="7" align="left" valign="middle" id="senderheader"><?=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");?></th>
	</tr>
	</thead>
	<tr valign="center" bgcolor="#FFFFFF"> 
    <td width="63" height="18" align="center" valign="middle" class="text_tb">Stt</td>
    <td width="83" valign="middle" class="text_tb"> 
    <?
	//echo "c: $cart";
	if($cart!=" ")
	{?>
    <input name="chkall" type="checkbox" onClick="docheck(document.frmList.chkall.checked,0);" value="0" checked>
    <? echo"All"; } else echo"<input name=chkall type=checkbox value=0 checked>"; ?>	</td>
    <td width="129" class="text_tb"><span class="tab_left_3">M&atilde; s&#7889; </span></td>
    <td width="383" align="left" valign="middle" class="text_tb">T&ecirc;n</td>
    <td width="81" align="left" valign="middle" class="text_tb">Gi&aacute;</td>
    <td width="66" align="left" valign="middle" class="text_tb"><span class="tab_left_3">S&#7889; l&#432;&#7907;ng </span></td>
    <td width="146" align="left" valign="middle" class="text_tb"><span class="tab_left_3">T&ocirc;ng cộng</span></td>
    </tr>
    <?php
	if($cart!=" ")
	{
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
	$ten="<span class=\"tab_left_3\"><a href=\"./?id_pproductv=$id&lg=$lg&start=0\">".$rs["ten_$lg"]."</a></span>";
	
	$code=$rs["product_code"];
	
	$price=$rs["product_price"];
    $price_sell_off=$rs["product_sell_off"];
	
	if($price_sell_off==0)
	   $price_ed=$price;
	else
	   $price_ed=$price_sell_off;
	   
	$price_sum_item=$qty*$price_ed;
	$sum_price=$sum_price+$price_sum_item;
	
	?>
    <tr bgcolor="#FFFFFF"> 
    <td height="22"  align="center" class="text_def">
    <?=$i?>    </td>
    <td valign="middle" class="text_def"><input type=checkbox name="chkid" checked value="<?=$id?>" onClick="docheckone();"></td>
    <td class="text_def" ><?=$code?></td>
    <td align="left" valign="middle" class="text_def"><?=$ten?>
    <input type=hidden value="<?=$size?>" name="size_<?=$id?>">
     <input type=hidden value="<?=$color?>" name="color_<?=$id?>">
     <input type=hidden value="<?=$made?>" name="made_<?=$id?>"></td>
    <td align="left" valign="middle" class="text_def"><? 
	$price_ed_v=number_format($price_ed);
	echo $price_ed_v; ?></td>
    <td align="left" valign="middle" class="text_def"><input type=text name="qty_<?=$id?>" size=3 maxlength=4 value="<?=$qty?>" onKeyDown="AcceptNumbersOnly();" class="input"></td>
    <td align="left" valign="middle" class="text_def"><? 
	$price_sum_item_v=number_format($price_sum_item);
	echo $price_sum_item_v; ?></td>
    </tr>
    <?
 	} //End for
	 ?>
    <tr align="right" valign="middle" bgcolor="#FFFFFF"> 
    <td height="25" colspan="6" align="right" valign="middle" class="text_def"><? echo"Vận chuyển: &nbsp;";?>
      <select name="tax" class="input" id="tax">
          <? 
		$table_s="tb_shopping_cart_tax";
		$query_s = "Select * FROM  $table_s";
		$result_s = mysql_query($query_s);
		while ($rs_s= mysql_fetch_array($result_s))   
		{ 
		?>
          <option value="<?=$rs_s["tax_code"]?>" <? if($tax==$rs_s["tax_code"]) echo"selected";?> >
          <? echo"$rs_s[tax_name]";?></option>
          <? } ?>
      </select></td>
    <td align="left" valign="middle" class="text_def"><? 
	$tax_value_v=number_format($tax_value);
	echo $tax_value_v; ?></td>
    </tr>
    <tr align="right" valign="middle" bgcolor="#FFFFFF"> 
    <td height="22" colspan="5" valign="top" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td align="left" valign="middle" class="text_def"><? echo"Tổng: &nbsp;";?></td>
    <td align="left" valign="middle" class="text_def"><? $total=$tax_value+$sum_price; $total=number_format($total); echo $total." $project_tien";?></td>
    </tr>
	<tr align="left" valign="top" bgcolor="#FFFFFF" class="bg_all"> 
    <td height="36" colspan=7 valign="middle" class="tab_left_3"> 
     <input type="button" class="nut_nhan_2"  value="Tiếp tục mua hàng" onClick="javascript: shopping('<?=gia_tri_mot_cot("tb_bac_2","trang",10,"ma_bac_2");?>','<?=$lg?>');" style="width:140px;">
	 <input type="button" class="nut_nhan_2" value="<?=gia_tri_mot_cot("tb_bac_2","trang",78,"ten_$lg");?>" onClick="javascript: update('<?=gia_tri_mot_cot("tb_bac_2","trang",78,"ma_bac_2");?>','<?=$lg?>','0');">
	 <input type=hidden value="frmList" name="frmList"> 
	 <input type=hidden value="0" name="chkid"> 
     <input type=hidden value=" " name="chkids">     </td>
    </tr>
	<tr bgcolor="#FFFFFF">
	  <td height="14" colspan="7" valign="top" class="tab_left_3"><?
		$cat_b=gia_tri_mot_cot("tb_bac_2","trang",70,"ma_bac_2");
		$table_s="tb_bac_3";
		$query_s = "Select * FROM  $table_s where trang in ('79','80') and activate=1 and activate_setup=1 order by thu_tu ASC ";
		$result_s = mysql_query($query_s);
		while ($rs_s= mysql_fetch_array($result_s))   
		{ 
		?>
	  <input type="button" onclick="submit_form('<?=$cat_b?>','<?=$rs_s["ma_bac_3"]?>','<?=$lg?>','0'); " class="nut_nhan_2"  value="<?=$rs_s["ten_$lg"]?>" >
	  <? } ?>
	  </td>
     </tr>
	<tr bgcolor="#FFFFFF">
	  <td height="14" colspan="7" valign="top" class="tab_left_3"><em class="text_tb">Ghi ch&uacute; : Sau khi thay &#273;&#7893;i s&#7889; l&#432;&#7907;ng ho&#7863;c h&igrave;nh th&#7913;c v&#7853;n chuy&#7875;n th&igrave; vui l&ograve;ng k&iacute;ch vào n&uacute;t &quot;C&#7853;p nh&#7853;t gi&#7887; h&agrave;ng&quot;</em></td>
     </tr>
  <? 
  } 
  else
  {
  ?>
    <tr valign="top" bgcolor="#FFFFFF"> 
    <td height="18" colspan=7 align="center" valign=center class="trang"><b class="text_tb">Kh&ocirc;ng c&oacute; s&#7843;n ph&#7849;m n&agrave;o trong gi&#7887; h&agrave;ng.</b></td>
    </tr>
    <tr align="left" valign="top" bgcolor="#FFFFFF" class="bg_all"> 
    <td height="25" colspan=7 valign="middle" class="tab_left_3">
	  <input type="button" class="nut_nhan_2"  value="Tiếp tục mua hàng" onClick="javascript: shopping('<?=gia_tri_mot_cot("tb_bac_2","trang",10,"ma_bac_2");?>','<?=$lg?>');" style="width:140px;">	</td>
    </tr>
    <?php
}

?>
<input name="sum_price" value="<?=$total?>" type="hidden">
</form>
</table>
