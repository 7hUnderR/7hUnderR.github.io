<? 
 if(session_is_registered("ten_dang_nhap"))
  include("inc_myaccount_$lg.php");
 else
  include("inc_register_$lg.php"); 
?>