<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="304" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="b2">
        <!--DWLayoutTable-->
              <tr>
                <td width="617" height="25" valign="middle" class="bg_title">
				<? 
				$cat=$HTTP_GET_VARS["cat"];
				$id=$HTTP_GET_VARS["id"];
				$start=$HTTP_GET_VARS["start"];
				?>
				<a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> » <a href="order_view.php">Order</a> » Detail</td>
             </tr>
              <tr>
                <td height="274" valign="top" class="tab_left_10"> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
				<script language="JavaScript" type="text/JavaScript">
			<!--
				function view_in(id){
					var arg= "width=700,height=500,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
					window.open ("inc/view_in.php?id="+ id,"a",arg);	
							
				}
				function view_profile(id)
				{
					var arg= "width=400,height=300,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
					window.open ("inc/view_profile.php?ma_user="+ id,"a",arg);	
				}
			//-->
			</script>
                <tr align="left" > 
                  <td width="816" height="29" valign="middle">
				  <?
					$table="tb_shopping_cart_order";
					$query = "Select * FROM  $table ";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num_ = mysql_num_rows($result);
				  ?>
					 <select name="trang_thai" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" style="FONT: 11px verdana,arial,helvetica;">
					   <option value="order_view.php?cat=0&start=0" selected>- New Order [<?=dem_max_dk("tb_shopping_cart_order","order_status",0);?>] -</option>
                       <option value="order_view.php?cat=1&start=0" <? if($cat==1) echo"selected";?> >- In Progress [<?=dem_max_dk("tb_shopping_cart_order","order_status",1);?>] -</option>
					    <option value="order_view.php?cat=2&start=0" <? if($cat==2) echo"selected";?> >- Ready To Ship [<?=dem_max_dk("tb_shopping_cart_order","order_status",2);?>] -</option>
						<option value="order_view.php?cat=3&start=0" <? if($cat==3) echo"selected";?> >- Shipped [<?=dem_max_dk("tb_shopping_cart_order","order_status",3);?>] -</option>
						<option value="order_view.php?cat=4&start=0" <? if($cat==4) echo"selected";?> >- Completed [<?=dem_max_dk("tb_shopping_cart_order","order_status",4);?>] -</option>
						<option value="order_view.php?cat=5&start=0" <? if($cat==5) echo"selected";?> >- Canceled [<?=dem_max_dk("tb_shopping_cart_order","order_status",5);?>] -</option>
						<option value="order_view.php?cat=6&start=0" <? if($cat==6) echo"selected";?> >- Denied [<?=dem_max_dk("tb_shopping_cart_order","order_status",6);?>] -</option>
						
						<option value="order_view.php?cat=100&start=0" <? if($cat==100) echo"selected";?> >- View All [<?=$num_?>] -</option>
                     </select>
				  <?
					$query = "Select * FROM  tb_shopping_cart_order where id=$id ";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					
					$ma_user=$rs["ma_user"];
					$ma_order=$rs["ma_order"];
					$tax_code=$rs["shipping"];
					$code_discount=$rs["code_discount"];
					//echo"sdjasfgasdg: $tax_code";
					$tax_value=gia_tri_mot_cot("tb_shopping_cart_tax","tax_code",$tax_code,"tax_value"); 
					$tax_text=gia_tri_mot_cot("tb_shopping_cart_tax","tax_code",$tax_code,"tax_name"); 
					
					$email=gia_tri_mot_cot('tb_shopping_cart_account','ma_user',$ma_user,'email');
				    $full_name=gia_tri_mot_cot('tb_shopping_cart_account','ma_user',$ma_user,'ten');
					?>
                  </td>
                </tr>
				 <tr> 
                  <td height="115" valign="top">
				<?
				$form_action = $_SERVER['PHP_SELF'];
				if (isset($_SERVER['QUERY_STRING'])) 
						$form_action .= "?" . $_SERVER['QUERY_STRING'];
					if ( (isset($_POST["form"])) && ($_POST["form"] == "form"))
					   {
						
						$id=$_POST["id"];

						$payment_status=$_POST["payment_status"];
						$mail_to_custumer=$_POST["mail_to_custumer"];
						
						$name_custumer=$_POST["name"];
						
				
						$mail_to=$_POST["email"];
						$mail_from=gia_tri_mot_cot("tb_config_site","id","1","project_email");
						$thanks="";

						$subject=gia_tri_mot_cot("tb_config_email_auto","id","1","email_order_reply_title");
						$on_off=gia_tri_mot_cot("tb_config_email_auto","id","1","email_order_reply_on_off");
						if($on_off==1)
						{
							$message=gia_tri_mot_cot("tb_config_email_auto","id","1","email_order_reply");
							$message=$message."<br><br>".$_POST["noi_dung"];
							gui_email($mail_to, $mail_from, $subject, $message, $thanks);
						}
						
						$query_edit = "UPDATE tb_shopping_cart_order SET payment_status='$payment_status',order_reply='$mail_to_custumer'";
						$query_edit .= "WHERE id=$id";
						$result_edit = mysql_query($query_edit);
						if($result_edit = mysql_query($query_edit))
						  $tip="Update completed ! sent mail to $name_custumer - $mail_to";
						//
						echo "<script  language='JavaScript'>";
						echo "alert('$tip')";
						echo "</script>";
						echo"<meta http-equiv=\"refresh\" content=\"0;url=order_view_detail.php?cat=$cat&id=$id&start=$start\">";
					  }
					  
				  ?>
				  <form action="<?=$form_action?>" method="post" name="form">
				  <div id="__content">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Order Code :</td>
                  <td width="81%" valign="middle" class="line_bottom"><?=$rs["ma_order"] ?></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Order Date :</td>
                  <td valign="middle" class="line_bottom"><?=$rs["ngay"] ?></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Customer Name :</td>
                  <td valign="middle" class="line_bottom"><? echo"<a href=javascript:view_profile('$ma_user') title=$email>$full_name</a>";?><input type="hidden" name="name" value="<?=$full_name?>"></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Customers Email :</td>
                  <td valign="middle" class="line_bottom"><?=$email?><input name="email" value="<?=$email?>" type="hidden"></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Order Status :</td>
                  <td valign="middle" class="line_bottom"><span class="mainlink"><?
				  if($rs["order_status"]==0)
				     echo"New Order";
				  if($rs["order_status"]==1)
				     echo"In Progress";
				  if($rs["order_status"]==2)
				     echo"Ready To Ship";
				  if($rs["order_status"]==3)
				     echo"Shipped";
				  if($rs["order_status"]==4)
				     echo"Completed";
				  if($rs["order_status"]==5)
				     echo"Canceled";
				  if($rs["order_status"]==6)
				     echo"Denied";
				   ?></span></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Shipping Method :</td>
                  <td valign="middle" class="line_bottom"><?=$tax_text?></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Shipping Tracking Number :</td>
                  <td valign="middle" class="line_bottom"><?=$tax_value?>
                    </td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Amount :</td>
                  <td valign="middle" class="line_bottom"><?=$rs["sum_price"] ?></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom">Payment Method :</td>
                  <td valign="middle" class="line_bottom"><?=$rs["payment"] ?></td>
                </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';>
				      <td height="23" align="left" valign="middle" class="line_bottom">Payment Status :</td>
				      <td valign="middle" class="line_bottom">
					  <? $payment_status=$rs["payment_status"]?>
					  <select name="payment_status" size="1" id="select" style="FONT: 11px verdana,arial,helvetica;">
					   <option value="0" <? if($payment_status==0) echo"selected";?>>Declined</option>
                       <option value="1" <? if($payment_status==1) echo"selected";?> >Waiting</option>
					    <option value="2" <? if($payment_status==2) echo"selected";?> >Full Paid</option>
                    </select></td>
			        </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';>
				      <td height="23" align="left" valign="middle" class="line_bottom">Customer Notes:</td>
				      <td valign="middle" class="line_bottom"><?=$rs["order_inquire"] ?></td>
			        </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';>
				      <td height="23" align="left" valign="top" class="line_bottom">Notes to Customer :</td>
				      <td valign="middle" class="line_bottom"><textarea name="mail_to_custumer" cols="60" rows="3" id="mail_to_custumer"><?=$rs["order_reply"]?></textarea></td>
			        </tr>
				    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';>
				      <td height="23" align="left" valign="top" class="line_bottom">Shipping &amp; Billing: </td>
				      <td valign="middle" class="line_bottom"><table width="100%">
				        <!--DWLayoutTable-->
					  <tr><td height="15" colspan="2"><span class="text" style="font-weight: bold">Shipping Address
					    <?
						$query_shipping = "Select * FROM  tb_shopping_cart_order_shipping_address where ma_order=$ma_order ";
						$result_shipping = mysql_query($query_shipping);
						$rs_shipping= mysql_fetch_array($result_shipping);
					  ?>
					  </span></td>
				      <td colspan="2"><span class="text" style="font-weight: bold">Billing Address
				        <?
						$query_billing = "Select * FROM  tb_shopping_cart_order_billing_address where ma_order=$ma_order ";
						$result_billing = mysql_query($query_billing);
						$rs_billing= mysql_fetch_array($result_billing);
					  ?>
				      </span></td>
				      </tr>
					  <tr valign="middle">
					    <td width="115" height="16" class="text">Name:</td>
					    <td width="226" class="text"><?=$rs_shipping["full_name"];?></td>
					    <td width="115" class="text">Name:</td>
					    <td width="226" class="text"><?=$rs_billing["full_name"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">Address :</td>
					    <td class="text"><?=$rs_shipping["address_1"];?></td>
					    <td class="text">Address :</td>
					    <td class="text"><?=$rs_billing["address_1"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">City:</td>
					    <td class="text"><?=$rs_shipping["city"];?></td>
					    <td class="text">City:</td>
					    <td class="text"><?=$rs_billing["city"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">State :</td>
					    <td class="text"><?=$rs_shipping["state"];?></td>
					    <td class="text">State :</td>
					    <td class="text"><?=$rs_billing["state"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text"> Zip :</td>
					    <td class="text"><?=$rs_shipping["zip"];?></td>
					    <td class="text"> Zip :</td>
					    <td class="text"><?=$rs_billing["zip"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">Country :</td>
					    <td class="text"><?=$rs_shipping["country"];?></td>
					    <td class="text">Country :</td>
					    <td class="text"><?=$rs_billing["country"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">Phone 1 :</td>
					    <td class="text"><?=$rs_shipping["phone_1"];?></td>
					    <td class="text">Phone 1 :</td>
					    <td class="text"><?=$rs_billing["phone_1"];?></td>
					  </tr>
					  <tr valign="middle">
					    <td height="16" class="text">Phone 2 :</td>
					    <td class="text"><?=$rs_shipping["phone_2"];?></td>
					    <td class="text">Phone 2 :</td>
					    <td class="text"><?=$rs_billing["phone_2"];?></td>
					  </tr>

					  </table></td>
			        </tr>
								    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="top" class="line_bottom">Product </td>
                  <td valign="middle" class="line_bottom"><table width="100%">
				        <!--DWLayoutTable-->
						
					  <tr>
					    <td width="38" height="20" align="left" valign="middle" class="text"><span class="text" style="font-weight: bold">No</span></td>
				      <td width="319" valign="middle" class="text"><span style="font-weight: bold">Name</span></td>
				        <td width="54" valign="middle" class="text"><span style="font-weight: bold">Code</span></td>
				        <td width="73" valign="middle" class="text"><span style="font-weight: bold">Price</span></td>
				        <td width="43" valign="middle" class="text"><span style="font-weight: bold">Qty</span></td>
				        <td width="114" valign="middle" class="text"><span style="font-weight: bold">Sum</span></td>
				      </tr>
					  <?
					    $i=0;
						$sum_price=0;
						$query_product = "Select * FROM  tb_shopping_cart_order_product where ma_order=$ma_order ";
						$result_product = mysql_query($query_product);
						while($rs_product= mysql_fetch_array($result_product))
						{
						$i++;
						
						$product_id=$rs_product["product_id"];
						$product_qty=$rs_product["product_qty"];
						$price=$rs_product["gia"];
						$product_name=gia_tri_mot_cot('tb_product','id',$product_id,'ten_vn');
						$product_code=gia_tri_mot_cot('tb_product','id',$product_id,'product_code');
						
						
						
						$sum_price=$sum_price+($product_qty*$price) ;
					  ?>
					  <tr valign="middle">
					    <td height="20" align="left" valign="middle" class="text"><?=$i?></td>
					    <td class="text"><?=$product_name?></td>
					    <td class="text"><?=$product_code?></td>
					    <td class="text"><? echo"$".$price; ?></td>
					    <td class="text"><?=$product_qty?></td>
					    <td class="text"><?=$product_qty*$price?></td>
					  </tr>
					<? } ?>	
						<tr valign="middle">
						  <td height="21" colspan="5" align="right" valign="middle" class="text"><span style="font-weight: bold">Sum all:</span></td>
						  <td align="left" valign="middle" class="text"><?=$sum_price?></td>
						  </tr>
						<tr valign="middle">
					    <td height="21" colspan="5" align="right" valign="middle" class="text"><?
						
						//$code_discount=gia_tri_mot_cot("tb_shopping_cart_account","ma_user",$ma_user,"code_discount");
						//
						$discount_value=gia_tri_mot_cot("tb_shopping_cart_discount","discount_code",$code_discount,"discount_value");
						$discount_name=gia_tri_mot_cot("tb_shopping_cart_discount","discount_code",$code_discount,"discount_name");
						
						echo $discount_name.": ";
						$sum_discount = $sum_price*$discount_value;
						?></td>
					    <td align="left" valign="middle" class="text"><?  echo $discount_value*100; echo "% = $sum_discount"; ?></td>
					  </tr>
						<tr valign="middle">
					    <td height="21" colspan="5" align="right" valign="middle" class="text">Shipping:</td>
					    <td align="left" valign="middle" class="text"><?=$tax_value?></td>
					  </tr>
						<tr valign="middle">
					    <td height="21" colspan="5" align="right" valign="middle" class="text"><strong>Total:</strong></td>
					    <td align="left" valign="middle" class="text"><strong><?=$rs["sum_price"]?>
					    </strong></td>
					  </tr>
					  </table></td>
								    </tr>
					    <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="19%" height="23" align="left" valign="middle" class="line_bottom"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  <td valign="middle" class="line_bottom">&nbsp;</td>
					    </tr>
				</table>
				</div>
				<INPUT name="id" type=hidden value="<?=$id?>">
				<INPUT name="noi_dung" type=hidden id="noi_dung" value="">
				<input name="submit" type="submit" id="submit" value="Save" onclick="document.form.noi_dung.value = document.getElementById('__content').innerHTML">
				<input type="hidden" name="form" value="form">
				</form>
					</td>
                </tr>
           
                </table>                  <? ?></td>
              </tr>
                          </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
