<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
	<?	
	$qr = $_SERVER["QUERY_STRING"];
	include("../admin/inc/dbconnect.php");
	include("../admin/inc/common.php");
	?>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/style_chuan.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<!--DWLayoutTable-->
	<tr>
	  <td valign="top" class="text_def">
	  <? 
		$id_product="1";
		if(isset($HTTP_GET_VARS["id_pproductv"]))
			$id_product = (int)$HTTP_GET_VARS["id_pproductv"];
		$id="1";
		if(isset($HTTP_GET_VARS["id_pnews_intabv"]))
			$id = (int)$HTTP_GET_VARS["id_pnews_intabv"];
			
		$lg="vn";
		if(isset($HTTP_GET_VARS["lg"]))
			$lg = $HTTP_GET_VARS["lg"];
	
		
		$table="tb_product";
		$query = "Select * FROM  $table where id=$id_product ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		$all_news=$rs["news_all"];
		$all_news=str_replace (",", "','", $all_news);
	
		$cat_hd=gia_tri_mot_cot("tb_bac_1","trang",3,"ma_bac_1");
			
		
	   
		$table="tb_news";
		$query = "Select id,mo_ta_$lg FROM  $table where id='$id' ";
		//echo "$lg|$id|$query";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		
		$detail=$rs["mo_ta_$lg"];
		
		$detail=cat_duong_dan_thua($detail);
		echo  $detail;
	  ?> </td>
	</tr>
	<tr>
	  <td height="10" colspan="2" valign="top"></td>
	</tr>
	<tr>
	  <td height="10" colspan="2" valign="top">  
	  <?
	$query2 = "Select * FROM  $table where ma_bac_1=$cat_hd and id in ('$all_news') and id != $id and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?id_pproductv=$id_product&select_tab=6&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat_hd,"ten_$lg")."</a>"; 
	
	$result2 = mysql_query($query2);
	$num_= mysql_num_rows($result2);
	  if($num_>0)
	  {
   ?>
 <table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td colspan="2" style="border-bottom: 1px solid #CCCCCC;" class="tieu_de" valign="middle" align="left"><div id="1"><? if($lg=="vn") echo "Các bài viết khác"; else echo "More details";?></div></td>
      </tr>
    <tr>
      <td valign="top"  height="10"></td>
    </tr>
    <?
	while($rs= mysql_fetch_array($result2))
	 { 
		$ngay="(".$rs["ngay"].")";
		$ten="<a href=\"./?id_pproductv=$id_product&id_pnews_intabv=$rs[id]&select_tab=6&lg=$lg&start=0\"><img src=\"images/icon/dotte.gif\" border=0/> ".$rs["ten_$lg"]." $ngay</a>";
		
	 ?>
	 <tr>
      <td height="20" valign="top" class="text_def"><? echo"$ten";?></td>
    </tr>
	    <? } ?>
  </table>  <?
	}
	?></td>
	</tr>
  </table>


                        
                        