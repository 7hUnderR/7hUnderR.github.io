<?php
	if(!session_is_registered("cart"))
	 {
	  $cart = " ";
	  $HTTP_SESSION_VARS['cart'] = $cart; 
	  //echo "Can Notsdfsdfs";
	 }
	else
	 {
	 $cart = $HTTP_SESSION_VARS['cart'];
	 //echo "HAHHA: ".$cart;
	 }
	 
	 
	if(!session_is_registered("tax"))
	 {
	  $tax = min_id("tb_shopping_cart_tax","tax_value");
	  $HTTP_SESSION_VARS['tax'] = $tax; 
	 }
	else
	 $tax = $HTTP_SESSION_VARS['tax'];

	 if(!session_is_registered("ten_dang_nhap"))
	   {
	   $ma_dang_nhap= "";
	   $ten_dang_nhap= "";
	   }
	   else
	   {
	   $ma_dang_nhap= $HTTP_SESSION_VARS['ma_dang_nhap'];
	   $ten_dang_nhap= $HTTP_SESSION_VARS['ten_dang_nhap'];
	   }
?>