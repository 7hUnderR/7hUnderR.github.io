<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../../css_info.css" rel="stylesheet" type="text/css">

		 <? 
		$id=$HTTP_GET_VARS["id"]; 	
		include("../../dbconnect.php");
		include("../../inc/common.php");
		
		$table="tb_shopping_cart_order";
		$query = "Select * FROM  $table  where id=$id ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		
		 $id_product=$rs["id_product"];
		 $anh=gia_tri_mot_cot('tb_product','id',$id_product,'anh_nho');
		 $ten_anh="<img src=\"../../../images/photo/$anh\">";
 	   ?>
<table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
                <tr align="center"> 
                  <td height="23" colspan="2" align="center" valign="middle" bgcolor="#EFEFEF"  class="LM">ĐƠN ĐẶT HÀNG</td>
  </tr>
                <tr align="center"> 
                  <td width="494" height="23" bgcolor="#EFEFEF" align="left" valign="middle" class="S9"><? echo"<b>Thông tin người gửi</b> $rs[ngay]";?></td>
                  <td width="492" bgcolor="#EFEFEF" align="left" valign="middle" class="S9"><? echo"<b>Thông tin người nhận</b>";?></td>
                </tr>
                <tr align="center">
                  <td height="98" align="left" valign="top" bgcolor="#F7F3F7" class="tab_left_10"><? 
				  echo "<span class=thongbao>Tên:</span>$rs[ten_ng]<br>";
				  echo "<span class=thongbao>Địa chỉ:</span>$rs[dia_chi_ng]<br>";
				  echo "<span class=thongbao>Điện thoại cố định:</span>$rs[dt_codinh_ng]<br>";
				  echo "<span class=thongbao>Điện thoại di động:</span>$rs[dt_didong_ng]<br>";
				  echo "<span class=thongbao>Lời chúc:</span>$rs[loi_chuc]<br>";
				  ?></td>
                  <td align="left" valign="top" bgcolor="#F7F3F7" class="tab_left_10"><? 
				  echo "<span class=thongbao>Tên:</span>$rs[ten_nn]<br>";
  				  echo "<span class=thongbao>Ngày giờ nhận:</span>$rs[thoi_gian_nn_nq]<br>";
				  echo "<span class=thongbao>Địa chỉ:</span>$rs[dia_chi_nn]<br>";
				  echo "<span class=thongbao>Điện thoại cố định:</span>$rs[dt_codinh_nn]<br>";
				  echo "<span class=thongbao>Điện thoại di động:</span>$rs[dt_didong_nn]<br>";
				  echo "<br><span class=thongbao>$ten_anh</span><br>";
				  ?></td>
                </tr>
</table>
				<div align="center">
	    <input name="button" type=button class="tab_5" onClick="JavaScript:window.print();" value="In" style="width:120px;">
	    <input name="button" type=button class="tab_5" onClick="javascript:self.close();" value="Close Window"  style="width:120px;">
</div>
