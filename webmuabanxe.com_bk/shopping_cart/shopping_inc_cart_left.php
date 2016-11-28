<link href="text.css" rel="stylesheet" type="text/css">
<table width="174" border="0" cellpadding="0" cellspacing="0" class="bg_cart_left">
<!--DWLayoutTable-->
<tr>
  <td width="5" height="4" valign="top"><img src="images/corner_pink_2.gif" height="4" width="5"></td>
  <td width="164"></td>
  <td width="5"><img src="images/corner_pink_1.gif" height="4" width="5"></td>
</tr>
<tr>
  <td height="18">&nbsp;</td>
  <td align="center" valign="middle" ><strong>Shopping Bag </strong></td>
  <td rowspan="3"></td>
</tr>
    <?php
	if($cart!="")
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
	  $id_=lay_id($product,1);
	  $made=lay_id($product,2);
	  
	  $size=lay_id($product,3);
	  $color=lay_id($product,4);
	  $qty=lay_id($product,5);
	  
	//$cart=str_replace (",", "','", $items);
	
	$SQL =" select * from tb_product where id=$id_ ";
	$result = mysql_query($SQL);
	$rs = mysql_fetch_array ($result);

	$id_=$rs["id"];
	$ten=$rs["ten_$lg"];
	$price=$rs["product_price"];

	$code=$rs["product_code"];
	
	$price_sum_item=$qty*$price;
	$sum_price=$sum_price+$price_sum_item;
	?>
		<tr>
		<td height="24">&nbsp;</td>
		<td align="left" valign="middle" class="ten_product" >
		<table width="100%">
		  <!--DWLayoutTable-->
		  <tr align="left" valign="middle"><td width="10%"><?=$i?></td>
		<td width="90" class="ten_product"><a href="index.php?id=<?=$id_?>&lg=<?=$lg?>&start=0"><?=$ten?></a></td>
		<td width="15" class="style3"><?=$qty?></td>
		<td width="19" class="style3"><? echo"$".$price;?></td>
		</table>
		</td>
		</tr>
	  <? 
	  }
	  
	  ?>
		<tr>
		<td height="24">&nbsp;</td>
		<td align="left" valign="middle" class="ten_product" >
		<table width="100%">
		  <!--DWLayoutTable-->
		  <tr align="left" valign="middle"><td width="154" height="20" align="right" valign="middle" class="style3"><? 
		  echo"Total: $".$sum_price; 
		  ?></td></tr>
		  </table>
		</td>
		</tr>
	<?
	}
	else //end cart
	{ 
	?>
		<tr>
		<td height="24">&nbsp;</td>
		<td height="18" align="center" valign="middle" >Your bag is empty</td>
		</tr>
	<?
	 }
	?>
	<tr>
	  <td height="23"></td>
	  <td height="18" rowspan="2" align="center" valign="middle" class="ten_product"><? 
		if($cart!="")
		{
		 echo"<b><a href=\"index.php?Acat=$cat_view_cart&lg=$lg&start=0\">View Bag</a> | "; 
		 echo"<a href=\"shopping_clear_cart.php?page=$page_re\">Clear Bag</a></b>"; 
		}  
	  ?></td>
	</tr>
	<tr>
	  <td rowspan="2" valign="top"><img src="images/corner_pink_3.gif" height="5" width="5"></td>
	  <td height="1"></td>
	</tr>
	<tr>
	  <td height="4"></td>
	  <td valign="top"><img src="images/corner_pink_4.gif" height="4" width="5"></td>
	</tr>
</table>
