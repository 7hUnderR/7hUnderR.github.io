<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="272" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title">Delete</td>
             </tr>
              <tr>
                <td height="242" valign="top" class="tab_left_10"><span class="tabel">
                  <?
			
			$path_root=lay_path_root("local");
			$id=$HTTP_GET_VARS["id"]; 
			$ma_del=$HTTP_GET_VARS["ma_del"]; 
			
			$dir_dell_user =$path_root;
			
			if($ma_del=="tam")
			{
			
			$items=$_GET["id"];				 
			$cat=$_GET["cat"];				 
			
			$items=str_replace (",", "','", $items);
			$query = "Select * FROM tb_shopping_cart_order WHERE id in ('$items')";
			$result = mysql_query($query);	
			while($rs= mysql_fetch_array($result))
			 { 
				$ma_order=$rs["ma_order"];
				$query_ = "DELETE FROM tb_shopping_cart_order_product WHERE ma_order = $ma_order ";
				$result_ = mysql_query($query_);
	
				$query_ = "DELETE FROM tb_shopping_cart_order_billing_address WHERE ma_order = $ma_order ";
				$result_ = mysql_query($query_);
	
				$query_ = "DELETE FROM tb_shopping_cart_order_shipping_address WHERE ma_order = $ma_order ";
				$result_ = mysql_query($query_);
			}
			
			$query = "DELETE FROM tb_shopping_cart_order WHERE id in ('$items')";
			if($result = mysql_query($query))
			echo"Delete completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view.php?cat=$cat&start=0\">";
			}
			
		if($ma_del=="account_admin")
		  {
			$items=$_GET["id"];				 
			$items=str_replace (",", "','", $items);
			$query = "Select * FROM tb_shopping_cart_account WHERE id in ('$items')";
			$result = mysql_query($query);	
			while($rs= mysql_fetch_array($result))
			 { 
			 $ma_user=$rs["ma_user"];
			 
					$query__ = "Select * FROM tb_shopping_cart_order WHERE ma_user = $ma_user ";
					$result__ = mysql_query($query__);	
					while($rs__= mysql_fetch_array($result__))
					 { 
						$ma_order=$rs__["ma_order"];
						
						$query_ = "DELETE FROM tb_shopping_cart_order_product WHERE ma_order = $ma_order ";
						$result_ = mysql_query($query);
			
						$query_ = "DELETE FROM tb_shopping_cart_order_billing WHERE ma_order = $ma_order ";
						$result_ = mysql_query($query);
			
						$query_ = "DELETE FROM tb_shopping_cart_order_address WHERE ma_order = $ma_order ";
						$result_ = mysql_query($query);
					}
			 
			 $query_ = "DELETE FROM tb_shopping_cart_order WHERE ma_user=$ma_user ";
			 $result_ = mysql_query($query_);
			 
			 }

			$query = "DELETE FROM tb_shopping_cart_account WHERE id in ('$items')";
			if($result = mysql_query($query))
			echo"<br>Delete Account completed !";
			echo" <input type=button value=\"Back\" onClick=\"history.go(-2);\" name=\"button\">";
			}
			
			?>
                </span></td>
              </tr>
                        </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
