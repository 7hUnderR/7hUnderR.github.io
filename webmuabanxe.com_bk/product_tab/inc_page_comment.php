<?
	$qr = $_SERVER["QUERY_STRING"];
	include("../admin/inc/dbconnect.php");
	include("../admin/inc/common.php");
	include("../inc_cat.php");
	include("../inc_lg_ma.php");
 
 	$id_product="1";
	if(isset($HTTP_GET_VARS["id_pproductv"]))
		$id_product = $HTTP_GET_VARS["id_pproductv"];
	
	$lg="vn";
	if(isset($HTTP_GET_VARS["lg"]))
		$lg = $HTTP_GET_VARS["lg"];
?>

<?
   include("inc_comment_$lg.php");
?>