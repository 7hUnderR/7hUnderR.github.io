<? $amount = $sum_price - $tax_value ;?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="frmList">
<input type="hidden" name="add" value="1">                    
<input type="hidden" name="cmd" value="_cart">                    
<input type="hidden" name="business" value="sales@phamnguyenbakery.com.vn">                    
<input type="hidden" name="item_name" value="<?=$name_product?>">                    
<input type="hidden" name="item_number"  value="<? ?>" size="7">  
<input type="hidden" name="amount" value="<?=$amount?>">
<input type="hidden" name="shipping" value="<?=$tax_value?>">    
<input type="hidden" name="no_note" value="<? echo"PHAM NGUYEN FOOD"; ?>">                    
<input type="hidden" name="currency_code" value="USD">                    
<input type="hidden" name="bn" value="PP-ShopCartBF">
<input type="hidden" name="return" value="http://www.phamnguyenbakery.com.vn">
<input type="hidden" name="cancel_return" value="http://www.phamnguyenbakery.com.vn">
<input type="image" src="images/images.jpg" border="0" name="submit" alt="Make payments with PayPal!">
</form>
