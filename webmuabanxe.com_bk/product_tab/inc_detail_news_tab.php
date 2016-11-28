<?
	$qr = $_SERVER["QUERY_STRING"];
	include("../admin/inc/dbconnect.php");
	include("../admin/inc/common.php");
	include("../inc_cat.php");
	include("../inc_lg_ma.php");
?>	

<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style_chuan.css" rel="stylesheet" type="text/css">
	<?	
	$id_product="1";
	if(isset($HTTP_GET_VARS["id_pproductv"]))
		$id_product = $HTTP_GET_VARS["id_pproductv"];
	
	$lg="vn";
	if(isset($HTTP_GET_VARS["lg"]))
		$lg = $HTTP_GET_VARS["lg"];

	
	$table="tb_product";
	$query = "Select * FROM  $table where id=$id_product ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$all_news=$rs["news_all"];
	$all_news=str_replace (",", "','", $all_news);
     //echo "HEHE: $all_news";
	$cat_hd=gia_tri_mot_cot("tb_bac_1","trang",3,"ma_bac_1");
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="148" valign="top">
        <? 
			$i=0;
			$thu_tu_cuoi_cung=0;
			$table="tb_news";
			$query = "Select * FROM  $table where ma_bac_1=$cat_hd and id in ('$all_news') and banner!=1 and activate=1 and ten_$lg!=''";
			//echo $query;
			$result = mysql_query($query);
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =10; 
			$cut_off = 10; 

			include("../inc/phantrang.php");
		   
			$query2 = "Select * FROM  $table where ma_bac_1=$cat_hd  and id in ('$all_news') and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			$result2 = mysql_query($query2);
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $thu_tu_cuoi_cung=$rs["thu_tu"];
			  if($rs["anh_nho"]!="") $anh_nho="<a href=\"./?id_pproductv=$id_product&select_tab=6&id_pnews_intabv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 style=\"float:left ; margin-right: 10px; float:left ; margin-top: 5px;\"></a>";
			  else
			  $anh_nho="";
			  
			  $ten="<b><img src=\"images/icon/icon.gif\" align=\"absmiddle\"/> <a href=\"./?id_pproductv=$id_product&select_tab=6&id_pnews_intabv=$rs[id]&lg=$lg&start=$start\">".$rs["ten_$lg"]."</a></b>";
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  $ngay="<span class=nho_lot>".$rs["ngay"]."</span>";
			  if($lg=="vn")
			    $more="<img src=\"images/icon/dotte.gif\" align=\"absmiddle\"/> <a href=\"./?id_pproductv=$id_product&select_tab=6&id_pnews_intabv=$rs[id]&lg=$lg&start=$start\">Xem chi tiết»</a>";
			  else
			    $more="<img src=\"images/icon/dotte.gif\" align=\"absmiddle\"/> <a href=\"./?id_pproductv=$id_product&select_tab=6&id_pnews_intabv=$rs[id]&lg=$lg&start=$start\">More»</a>";
			?>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
	      <tr>
	        <td valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <!--DWLayoutTable-->
			  <tr>
				<? if($anh_nho!=""){?><td rowspan="2" valign="top" style="padding-left:5px; padding-bottom:5px;"><?=$anh_nho?></td>
				<? } ?>
			    <td width="100%" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <!--DWLayoutTable-->
			  <tr>
				 <td width="100%" height="21" align="left" valign="middle" class="tieu_de"><?
				   echo"$ten";
				?></td>
			  </tr>
			  <tr>
			    <td height="10" valign="top" class="text_def" style="padding-top:5px;"><?=$ghi_chu?></td>
		      </tr>
			  <tr>
			    <td height="28" valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="2">
                                        <tr>
                                          <td align="left" valign="middle" class="more"><?=$more?></td>
                                        </tr>
                                    </table></td>
			  </tr>
			</table></td>
			  </tr>
			</table>            </td>
	      <tr>
	        <td height="10" valign="top"></td>
          </tr>
        </table>
	    <?  }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td class="tab_5 text_def">
            <?  
			include("../inc_next_back.php"); 
			phan_trang_4dk($page_count,$num,"id_pproductv",$id_product,"lg",$lg,"start",$start,"select_tab",6,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo)
			?></td>
        </tr>
        </table></td>
  </tr>
	

<tr>
  <td height="13"></td>
  </tr>
<tr>
  <td valign="top">
  <?
	$query2 = "Select * FROM  $table where ma_bac_1=$cat_hd and id in ('$all_news') and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?id_pproductv=$id_product&select_tab=6&lg=$lg&start=0&select_tab=2\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat_hd,"ten_dv_$lg")."</a>"; 
	
	$result2 = mysql_query($query2);
	$num_= mysql_num_rows($result2);
	  if($num_>0)
	  {
   ?>
  <table cellspacing="1" cellpadding="0" width="100%">
    <tr>
      <td width="21"></td>
      <td width="942" ><table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
          <tr>
            <td height="20" valign="middle" align="left" class="Text_20_3"><? 
			  echo "$ten_tieude";
			  ?></td>
          </tr>
          </tbody>
        </table></td>
    </tr>
    <?
	while($rs= mysql_fetch_array($result2))
	 { 
		$ngay="(".$rs["ngay"].")";
		$ten="<a href=\"./?id_pproductv=$id_product&id_pnews_intabv=$rs[id]&select_tab=6&lg=$lg&start=0\"><img src=\"images/icon/dotte.gif\" border=0/> ".$rs["ten_$lg"]." $ngay</a>";
		
	 ?>
  <tr>
    <td height="20" colspan="2" valign="top" class="more_menu"><? echo"$ten ";?></td>
  </tr>
    <? } ?>
  </table>  <?
	}
	?>  </td>
  </tr>
</table>
