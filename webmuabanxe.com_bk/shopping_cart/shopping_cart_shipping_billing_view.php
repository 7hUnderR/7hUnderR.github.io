<? 
	$ma_order=max_id("tb_shopping_cart_order","ma_order")+1;
	$order_status=0;
	$order_inquire="Now";
	$sum_price=$_POST["sum_price"];
	
	$payment_id = $_POST["payment_id"];
	$ngay= date("d/m/y, g:i a"); 
	$ip = getenv("REMOTE_ADDR"); 
	
	$name=$_POST["ShippingName"];
	$address_1=$_POST["ShippingAddress1"];
	$email_1=$_POST["ShippingEmail"];
	$address_2="";//$_POST["ShippingAddress2"];
	$city="";//$_POST["ShippingCity"];
	$state="";//$_POST["ShippingState"];
	$zip="";//$_POST["ShippingZip"];
	$country=$_POST["ShippingCountryID"];
	$phone_1=$_POST["ShippingPhone1"];
	$phone_2=$_POST["ShippingPhone2"];
	$country_text=gia_tri_mot_cot("tb_country","code_country",$country,"name_country");
	
	if(isset($_POST["SameAddress"]))
	 $same=$_POST["SameAddress"]?1:0;
	else
	$same=0;

	
	if($same)
	 {
		$b_name=$name;
		$b_address_1=$address_1;
		$b_address_2=$address_2;
		$b_email_1=$email_1;
		$b_city=$city;
		$b_state=$state;
		$b_zip=$zip;
		$b_country=$country;
		$b_phone_1=$phone_1;
		$b_phone_2=$phone_2;
 		$b_country_text=gia_tri_mot_cot("tb_country","code_country",$country,"name_country");
	 }
	 else
	 {
		$b_name=$_POST["BillingName"];
		$b_address_1=$_POST["BillingAddress1"];
		$b_address_2="";//$_POST["BillingAddress2"];
		$b_email_1=$_POST["BillingEmail"];
		$b_city="";//$_POST["BillingCity"];
		$b_state="";//$_POST["BillingState"];
		$b_zip="";//$_POST["BillingZip"];
		$b_country=$_POST["BillingCountryID"];
		$b_phone_1=$_POST["BillingPhone1"];
		$b_phone_2=$_POST["BillingPhone2"];
		$b_country_text=gia_tri_mot_cot("tb_country","code_country",$b_country,"name_country");
	 }
 include("shopping_cart_shipping_billing_view_$lg.php");
?>
