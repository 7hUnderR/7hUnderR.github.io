		 <?
		 include("../../inc/banner.php"); 
		$ma_user=$HTTP_GET_VARS["ma_user"]; 	
		$table="tb_shopping_cart_account";
		$query = "Select * FROM  $table  where ma_user = $ma_user ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		if($rs["country"]!="")
		$country=gia_tri_mot_cot("tb_country","code_country",$rs["country"],"name_country");
		else
		$country="";
 	   ?>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
                <tr align="center"> 
                  <td width="743" height="23" align="center" valign="middle" bgcolor="#EFEFEF"  class="tab_left_10_b">Profile</td>
  </tr>
                <tr align="center"> 
                  <td height="23" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><? echo"<b>$rs[ten]</b> $rs[ngay]";?></td>
                </tr>
                <tr align="center">
                  <td height="98" align="left" valign="top" bgcolor="#F7F3F7" class="tab_left_10"><? 
				  echo "<span class=thongbao>Email:</span> $rs[email]<br>";
				  echo "<span class=thongbao>Name:</span> $rs[ten]<br>";
				  echo "<span class=thongbao>Birdth Day:</span> $rs[ngay_sinh]<br>";
				  echo "<span class=thongbao>Sex:</span> $rs[sex]<br>";
				  echo "<span class=thongbao>Address:</span> $rs[address]<br>";
				  echo "<span class=thongbao>Daytime Phone:</span> $rs[dt_codinh]<br>";
				  echo "<span class=thongbao>Evening Phone:</span> $rs[dt_didong]<br>";
				  echo "<span class=thongbao>Fax:</span>$rs[fax]<br>";
				  echo "<span class=thongbao>City/Country:</span> $rs[city] $country<br>";
				 ?></td>
                </tr>
</table>
<div align="center">
<input name="button" type=button class="nut_nhan" onClick="javascript:self.close();" value="Close Window"  style="width:120px;">
</div>