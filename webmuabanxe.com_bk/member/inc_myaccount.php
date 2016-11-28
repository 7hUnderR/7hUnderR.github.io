<?
	if(session_is_registered("ten_dang_nhap"))
 		include("inc_myaccount_$lg.php");
  	else
		include("shopping_cart/check_login.php");
  ?>