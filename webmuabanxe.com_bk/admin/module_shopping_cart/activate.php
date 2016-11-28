<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="272" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->
	  <tr>
		<td height="25" valign="middle" class="bg_title">Activate</td>
	 </tr>
	  <tr>
		<td height="227" valign="top" class="tab_left_10">
		  <?
		$ma_activate=$HTTP_GET_VARS["ma_activate"];
				
		if($ma_activate=="update_industry"){
					$num=$HTTP_POST_VARS["num"]; 
					for($i=1;$i<=$num; $i++)
					{
					$id=rep($HTTP_POST_VARS["id_$i"]);
					$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
					
					$query = "UPDATE tb_shopping_cart_industry SET thu_tu='$thu_tu'";
					$query .= "WHERE id=$id";
					$result = mysql_query($query);
					}
					echo "$update_completed";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=industry_01.php\">"; 
					}
		if($ma_activate=="update_industry_s"){
					$num=$HTTP_POST_VARS["num"]; 
					for($i=1;$i<=$num; $i++)
					{
					$id=rep($HTTP_POST_VARS["id_$i"]);
					$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
					
					$query = "UPDATE tb_shopping_cart_industry_s SET thu_tu='$thu_tu'";
					$query .= "WHERE id=$id";
					$result = mysql_query($query);
					}
					echo "$update_completed";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=industry_02.php\">"; 
					}

		if($ma_activate=="activate_account")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table_2="tb_shopping_cart_account";
					$query_2 = "UPDATE $table_2 SET kichhoat='1'";
					$query_2 .= "WHERE id in ('$items')";
					if($result_2 = mysql_query($query_2))
					echo"Activate completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=member.php?cat=0&start=$_POST[start]\">"; 
					}
		if($ma_activate=="deactivate_account")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table_2="tb_shopping_cart_account";
					$query_2 = "UPDATE $table_2 SET kichhoat='0'";
					$query_2 .= "WHERE id in ('$items')";
					if($result_2 = mysql_query($query_2))
					echo"Deactivate completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=member.php?cat=0&start=$_POST[start]\">"; 
					}

		if($ma_activate=="mot")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='0'";
					$query .= "WHERE id in ('$items')";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=0&start=0\">";
					}
		if($ma_activate=="hai")
				   {
				   
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='1'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=1&start=0\">";
					}
		if($ma_activate=="ba")
				   {
				   
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='2'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=2&start=0\">";
					}
		if($ma_activate=="bon")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='3'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=3&start=0\">";
					}
		if($ma_activate=="nam")
				   {
					$start=$HTTP_POST_VARS["start"]; 
					$cat=$HTTP_POST_VARS["cat"]; 
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);

					 $query_ = "Select * FROM  tb_shopping_cart_order where id in ('$items') ";
					 $result_ = mysql_query($query_);
					 while($rs_= mysql_fetch_array($result_))
					  {
					   $ma_user=$rs_["ma_user"];
					   $code_introduction=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"code_introduction");
					   
					   $total=$rs_["sum_price"];
					   $shipping=$rs_["shipping"];
					   
					   $percent_old=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"total_percent");
					   $diem_old=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"diem");
					   
					   $code_percent=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"code_percent");
					   $percent = gia_tri_mot_cot("tb_shopping_cart_percent","percent_code",$code_percent,"percent_value");
					   
					   $total_percent=$percent_old+($total*$percent);
					  
					   $shipping_value=gia_tri_mot_cot("tb_shopping_cart_tax","tax_code",$shipping,"tax_value");
					   $total_thuc=$total-$shipping_value;
					   $diem=$diem_old+$total_thuc;
					   
					   $query = "UPDATE tb_shopping_cart_account SET total_percent='$total_percent',diem='$diem'";
					   $query .= "WHERE ma_user=$code_introduction";
					   $result = mysql_query($query);
					   
					   $query = "UPDATE tb_shopping_cart_account SET diem='$diem'";
					   $query .= "WHERE ma_user=$ma_user";
					   $result = mysql_query($query);
					  }
					
					
					//echo"<br> $id | $discount";
					
					
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='4'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=4&start=0\">";
					}
		if($ma_activate=="sau")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='5'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=5&start=0\">";
					}
		if($ma_activate=="bay")
				   {
					$items =$_POST["chkids"];
					$items=str_replace (",", "','", $items);
					$table="tb_shopping_cart_order";
					$query = "UPDATE $table SET order_status='6'";
					$query .= " WHERE id in ('$items') ";
					if($result = mysql_query($query))
					echo"Activate Completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=6&start=0\">";
					}
					
	?>
		</td>
	  </tr>
	  <tr class="M">
		<td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
	  </tr>
				</table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
