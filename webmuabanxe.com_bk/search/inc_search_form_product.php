<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script language="javascript">
	function calculatechon_services()
		{			
			var strchon="";
			var alen=document.form.elements.length;				
			
			alen=(alen>0)?document.form.chkid_service.length:0;
			if (alen>0)
			 {
				for(var i=0;i<alen;i++)
					if(document.form.chkid_service[i].checked==true)
						strchon+=document.form.chkid_service[i].value+",";
			 }
			else
			 {
				if(document.form.chkid_service.checked==true)
					strchon=document.form.chkid_service.value;
			 }				
			document.form.chon_service.value=strchon;	
		}
  </script>

<?
	$trang_here=29;
	$ma_search=gia_tri_mot_cot("tb_bac_1","trang",29,"ma_bac_1");
	$ma_product=gia_tri_mot_cot("tb_bac_1","trang",82,"ma_bac_1");
	if(strstr($qr,"text_search"))
	   {
		$value=$HTTP_GET_VARS["text_search"];
		$s_cat=$HTTP_GET_VARS["s_cat"];
		$codetype=$HTTP_GET_VARS["codetype"];
		$codetype2=$HTTP_GET_VARS["codetype2"];
		$codetype3=$HTTP_GET_VARS["codetype3"];
		$codetype4=$HTTP_GET_VARS["codetype4"];
		$codetype5=$HTTP_GET_VARS["codetype5"];
		
		$chon_service=$HTTP_GET_VARS["chon_service"];
		$chon_service="'".str_replace (",", "','", $chon_service);
		//echo "$chon_service";
		}
	else
		{
		$s_cat=$ma_product;
		$codetype=0;
		$codetype2=0;
		$codetype3=0;
		$codetype4=0;
		$codetype5=0;
		$chon_service="";
		$value='Từ khóa';
		}
	
	if($lg=="eg")
	    {
		$catalog="Product catalog:";
		$key_work="Key work:";
		$title = "Search: ";
		$ket_qua="Search result";
		$all="Chọn nhà sản xuất";
		$muc_gia="Price";
		$cho_ngoi="Số chỗ ngồi";
		$nam_san_xuat="Năm sản xuất";
		$product_catalog="Dòng xe";
		}
	else
		{
		$catalog="Loại sản phẩm:";
		$key_work="Từ khóa:";
		$title = "Tìm: ";
		$ket_qua="Kết quả tìm";
		$all="Chọn nhà sản xuất";
		$muc_gia="Chọn mức giá";
		$cho_ngoi="Số chỗ ngồi";
		$nam_san_xuat="Năm sản xuất";
		$product_catalog="Dòng xe";
		}
?>
<table class="block_1_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_1_title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		  <tr>
			<td valign="middle" class="block_1_center" style=" padding-top: 3px;">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<form name="form" action="./" method="GET">
	 <input type="hidden" name="Acat" value="<?=$ma_search?>">
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><select name="s_cat" class="textfield"  style="height:20px; width: 140px;">
         <option value="<?=$cat_s?>" class="form_select"  style="height:20px;">
         <?=$all?>
         </option>
         <?
			$query = "Select * FROM  tb_bac_2 where ma_bac_1 = $ma_product and activate=1 order by thu_tu ASC";
			$result = mysql_query($query);
			while($rs= mysql_fetch_array($result))
			{
			$ma_bac_2=$rs["ma_bac_2"];
			$title="&nbsp;".$rs["ten_$lg"];
			?>
         <option value="<?=$ma_bac_2?>" class="form_select" <? if($rs["ma_bac_2"]==$s_cat) echo"selected"?>  style="height:20px;">
         <?=$title?>
         </option>
         <? }?>
       </select></td>
	 </tr>
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><select name="codetype" class="textfield" id="codetype"  style="height:20px; width: 140px;">
         <option value="0" class="form_select"  style="height:20px;">
         <?=$muc_gia?>
         </option>
         <?
			$query = "Select * FROM  tb_product_thang_gia order by thu_tu ASC";
			$result = mysql_query($query);
			while($rs= mysql_fetch_array($result))
			{
			$title="&nbsp;".$rs["name_$lg"];
			?>
         <option value="<?=$rs["code"];?>" class="form_select" <? if($rs["code"]==$codetype) echo"selected"?>  style="height:20px;">
         <?=$title?>
         </option>
         <? }?>
       </select></td>
	   </tr>
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><select name="codetype2" class="textfield" id="codetype2"  style="height:20px; width: 140px;">
         <option value="0" class="form_select"  style="height:20px;">
         <?=$cho_ngoi?>
         </option>
         <?
			$query = "Select * FROM  tb_product_type_2 order by thu_tu ASC";
			$result = mysql_query($query);
			while($rs= mysql_fetch_array($result))
			{
			$title="&nbsp;".$rs["name_$lg"];
			?>
         <option value="<?=$rs["code"];?>" class="form_select" <? if($rs["code"]==$codetype2) echo"selected"?>  style="height:20px;">
         <?=$title?>
         </option>
         <? }?>
       </select></td>
	   </tr>
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><select name="codetype3" class="textfield" id="codetype3"  style="height:20px; width: 140px;">
         <option value="0" class="form_select"  style="height:20px;">
         <?=$nam_san_xuat;?>
         </option>
         <?
			$query = "Select * FROM  tb_product_type_4 order by thu_tu ASC";
			$result = mysql_query($query);
			while($rs= mysql_fetch_array($result))
			{
			$title="&nbsp;".$rs["name_$lg"];
			?>
         <option value="<?=$rs["code"];?>" class="form_select" <? if($rs["code"]==$codetype3) echo"selected"?>  style="height:20px;">
         <?=$title?>
         </option>
         <? }?>
       </select></td>
	   </tr>
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><select name="codetype4" class="textfield" id="select"  style="height:20px; width: 140px;">
         <option value="0" class="form_select"  style="height:20px;">
         <?=$product_catalog;?>
         </option>
         <?
			$query = "Select * FROM  tb_product_type_5 order by thu_tu ASC";
			$result = mysql_query($query);
			while($rs= mysql_fetch_array($result))
			{
			$title="&nbsp;".$rs["name_$lg"];
			?>
         <option value="<?=$rs["code"];?>" class="form_select" <? if($rs["code"]==$codetype4) echo"selected"?>  style="height:20px;">
         <?=$title?>
         </option>
         <? }?>
       </select></td>
	   </tr>
	 <tr>
	   <td height="24" align="left" valign="middle" class="tab_5_5"><input name="text_search" type="text" class="textfield" style="width:140px; " value="<?=$value?>" /></td>
	   </tr>
	 <tr>
	   <td height="20" align="left" valign="middle" class="tab_5_5"><table width="100%" border="0" cellpadding="0" cellspacing="0">
							 <tr><? 
							 $table="tb_product_type_3";
							 $query = "Select * FROM  $table order by thu_tu DESC ";
							 $result = mysql_query($query);
							 $i=0;
							 while ($rs_services= mysql_fetch_array($result))
							 { 
							 $code=$rs_services["code"];
							 
							 $i++;?>
							 <td height="21" valign="top" class="text_search"><input name="chkid_service" type=checkbox id="chkid_service" value="<?=$rs_services["code"];?>" <? if(strstr("$chon_service","$code")) echo "checked=\"checked\""; ?>  >							    
	                                    <? echo $rs_services["name_$lg"]; ?></td>
										 <? 
									  if($i==1)
									  {
									  echo "</tr>";
									  $i=0;
									  }
									  } ?> 
                                      </tr>
                              </table></td>
	   </tr>
	 <tr>
  <td height="30" align="right" valign="middle" class="tab_5_5">
	    <input type="hidden" name="start" value="0">
	  <input type="hidden" name="lg" value="<?=$lg?>">
	  <input type="hidden" name="chon_service" value="" />
	  <input type="submit" value="Tìm" onClick="calculatechon_services();" class="nut" align="absmiddle" border="0"></td>
</tr>
</form>
</table>
</td>
		  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>
