<? 
	 $cart = $HTTP_SESSION_VARS['cart'];
	 $cart=$_POST["chkids"];
	 $qr = $_SERVER["QUERY_STRING"];
	$cart=str_replace (",", "','",$cart);

	$dem=0;
	$myLength = strlen($cart);
	for ( $i = 0; $i < $myLength; ++$i )
		{   
			$ch = $cart{$i};
			if($ch==",") $dem++;
		}
	
	$product=",";
	for ( $i = 1; $i <$dem; ++$i )
	  {   
	  $id=lay_product($cart,$i);

	$SQL =" select * from tb_product where id = $id ";
	$result = mysql_query($SQL);
	$rs = mysql_fetch_array ($result);

	$id=$rs["id"];
	$qty=$_POST["qty_$id"];
	if($qty<1) $qty=1;
    $size=$_POST["size_$id"];
	$color=$_POST["color_$id"];
	$made=$_POST["made_$id"];
		
	$product.="|".$id."|".$made."|".$color."|".$size."|".$qty."|,";
	}

 $HTTP_SESSION_VARS['cart'] = $product; 
 $tax=$_POST["tax"];
 $HTTP_SESSION_VARS['tax'] = $tax; 
 
 $cat_view_cart=gia_tri_mot_cot("tb_bac_2","trang",69,"ma_bac_2");
 echo"<meta http-equiv=\"refresh\" content=\"1;url=./?Bcat=$cat_view_cart&lg=$lg&start=0\">";
?>
