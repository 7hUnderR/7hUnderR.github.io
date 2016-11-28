<? 
 $cart = $HTTP_SESSION_VARS['cart'];
 $cart = str_replace(" ","",$cart);
 $id=$_POST["id"];
 $color=0;//$_POST["color"];
 $size=0;//$_POST["size"];
 $made=0;//$_POST["made"];
 $qty=$_POST["qty"];
  
  $cart_tam="|".$id."|".$made."|".$color."|".$size."|".$qty."|" ;
  $cart_="|".$id."|".$made."|".$color."|".$size."|";
   if(!strstr($cart,$cart_)&&($id!=0)) 
	{
	 if($cart=="")
	  {
	    $cart .=",".$cart_tam.",";
	  }
	 else
	  {
	   $cart .=$cart_tam.",";
	  }
	}

 $HTTP_SESSION_VARS['cart'] = $cart; 
 if($lg=="vn")
   echo "Thêm vào gỏ hàng thành công !";
 else
   echo "Add to cart completed !";

$xem_gio_hang=gia_tri_mot_cot("tb_bac_2","trang",'69',"ma_bac_2");
echo"<meta http-equiv=\"refresh\" content=\"0;url=./?Bcat=$xem_gio_hang&lg=vn&start=0\">";
?>