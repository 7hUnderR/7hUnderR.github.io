<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
 if (isset($_POST["frmList"]) && ($_POST["frmList"] == "frmList"))
  {
 if($cart!="")
	{
	$email=$_POST["email"];
	$ma_payment=$_POST["payment_id"];//o day nghia la ma_bac_2
	$noi_dung_email=stripslashes($_POST["noi_dung_email"]);
	$noi_dung_email=chuan_php("$noi_dung_email");
			
		$mail_to=$email;
		
		$mail_from=gia_tri_mot_cot("tb_config_site","id","1","project_email");
		$mail_from_2=gia_tri_mot_cot("tb_config_site","id","1","project_email_2");
		
		$thanks="";

		$subject="DON DAT HANG - ORDER";//gia_tri_mot_cot("tb_config_email_auto","id","1","email_order_title");
		$on_off=gia_tri_mot_cot("tb_config_email_auto","id","1","email_order_on_off");
		if($on_off==1)
		    {
			$message=$noi_dung_email;
			gui_email($mail_from_2, $mail_to, $subject, $message, $thanks);
		
			$message=gia_tri_mot_cot("tb_config_email_auto","id","1","email_order");
			$message=$message."<br><br>".$noi_dung_email;
			gui_email($mail_to, $mail_from_2, $subject, $message, $thanks);
			}
		else
		    {
			$message=$noi_dung_email;
			//Gui cho Admin
			gui_email($mail_from_2, $mail_to, $subject, $message, $thanks);
			// Gui cho khach hang
			gui_email($mail_to, $mail_from_2, $subject, $message, $thanks);
			}
		//echo $message;
		
	$payment_detail=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$ma_payment,"trang");
	if($payment_detail==80)
			include("shopping_cart_payment_paypal.php");
	/*
	if($payment_detail==79)
			include("shopping_cart_payment_chuyenkhoan.php");
	if($payment_detail==162)
			include("shopping_cart_payment_buudien.php");
	*/
	}
	}
?>