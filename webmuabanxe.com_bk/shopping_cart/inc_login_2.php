<?php
	if(isset($HTTP_SESSION_VARS['ten_dang_nhap']))
		include("inc_logout.php");	
	else
 		include("inc_login_2_$lg.php");
?>