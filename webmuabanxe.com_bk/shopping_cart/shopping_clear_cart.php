<? 
 $cart = " ";
 $tax = min_id("tb_shopping_cart_tax","tax_code");
 $cat_view_cart=gia_tri_mot_cot_2dk("tb_bac_2","trang",69,"activate_setup",1,"ma_bac_2");
 $HTTP_SESSION_VARS['cart'] = $cart; 
 $HTTP_SESSION_VARS['tax'] = $tax; 
 echo"<meta http-equiv=\"refresh\" content=\"0;url=./?Bcat=$cat_view_cart&lg=$lg&start=$start\">";
?>
