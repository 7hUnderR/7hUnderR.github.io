<?
	if(session_is_registered("ten_dang_nhap"))
	  {
	 include("inc_change_password_$lg.php"); 
  	  }
   else
     include("shopping_cart/check_login.php");
?>