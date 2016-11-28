<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />

	<?	
	$qr = $_SERVER["QUERY_STRING"];
	include("../admin/inc/dbconnect.php");
	include("../admin/inc/common.php");
	include("../inc_cat.php");
	include("../inc_lg_ma.php");
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<!--DWLayoutTable-->
	<tr>
	  <td valign="top" class="text_def">
	  <? 
		$id="1";
		if(isset($HTTP_GET_VARS["id_pproductv"]))
			$id = (int)$HTTP_GET_VARS["id_pproductv"];
		
		$page="1";
		if(isset($HTTP_GET_VARS["page"]))
			$page = (int)$HTTP_GET_VARS["page"];

		
		$table="tb_product";
		$query = "Select * FROM  $table where id=$id ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		/*
		$tab_1="Sản phẩm"; 1
		$tab_2="Hình ảnh"; 2
		$tab_3="Bài viết"; 
		$tab_4="Nhận xét đánh giá"; 3
		$tab_5="Phim liên quan"; 4
		$tab_6="In ấn quảng cáo"; 5

		$tab_1="Chi tiết sản pham"; 1
		$tab_2="Hình ảnh"; 2
		$tab_3="Videos"; 4
		$tab_4="Bài viết"; 
		$tab_5="Phần mềm hổ trợ"; 3
		$tab_6="Thông tin khuyến mãi"; 5
		*/
		if($page==1)
		$detail=$rs["mo_ta_1_$lg"];
		if($page==2)
		$detail=$rs["mo_ta_2_$lg"];
		if($page==3)
		$detail=$rs["mo_ta_3_$lg"];
		if($page==4)
		$detail=$rs["mo_ta_4_$lg"];
		if($page==5)
		$detail=$rs["mo_ta_5_$lg"];
		
		$detail=cat_duong_dan_thua($detail);
		echo  $detail;
	  ?> </td>
	</tr>
	<tr>
	  <td height="10" colspan="2" valign="top"></td>
	</tr>
  </table>


                        
                        