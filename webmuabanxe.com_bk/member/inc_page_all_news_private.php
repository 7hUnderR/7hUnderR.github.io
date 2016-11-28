<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
  if(!session_is_registered("ten_dang_nhap"))
  {
  echo "Bạn đăng nhập mới xem được trang này !";
  }
  else
  {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="148" valign="top">
        <? 
			$i=0;
			$thu_tu_cuoi_cung=0;
			$table="tb_news";
			if(strstr($qr,"Acat"))
				$query = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1 and ten_$lg!='' ";
			if(strstr($qr,"Bcat"))
			    $query = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1 and ten_$lg!='' ";
			if(strstr($qr,"Ccat"))
			    $query = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1 and ten_$lg!='' ";
			if(strstr($qr,"Dcat"))	
			    $query = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1 and ten_$lg!='' ";
			if(strstr($qr,"Ecat"))
			    $query = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1 and ten_$lg!='' ";
			$result = mysql_query($query);
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =7; 
			$cut_off = 10; 

			include("inc/phantrang.php");
		   
			if(strstr($qr,"Acat"))
				$query2 = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1 and ten_$lg!=''  ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Bcat"))
			    $query2 = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Ccat"))
			    $query2 = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Dcat"))	
			    $query2 = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count  ";
			if(strstr($qr,"Ecat"))
			    $query2 = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1 and ten_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			$result2 = mysql_query($query2);
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $thu_tu_cuoi_cung=$rs["thu_tu"];
			  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 style=\"float:left ; margin-right: 10px; float:left ; margin-top: 5px;\"></a>";
			  else
			  $anh="";
			  
			  $ten="<b><a class=\"tieu_de\" href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">".$rs["ten_$lg"]."</a></b>";
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  $ngay="<span class=nho_lot>".$rs["ngay"]."</span>";
			  if($lg=="vn")
			    //$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">Detail</a></span> | ";
				$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">Xem chi tiết</a></span> | ";
			  else
			    $more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\">Detail</a></span> | ";
			?>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
	      <tr>
	        <td valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<? if($anh!=""){?><td rowspan="3" valign="top" style="padding-left:5px; padding-bottom:5px;"><?=$anh?></td>
				<? } ?>
			    <td width="100%" height="21" align="left" valign="middle"><?=$ten?></td>
			  </tr>
			  <tr>
			    <td valign="top" class="text_def" style="padding-top:5px;"><?=$ghi_chu?></td>
		      </tr>
			  <tr>
			    <td valign="top" class="text_def"><table width="100%" border="0" cellpadding="0" cellspacing="2">
                                        <tr>
                                          <td align="left" valign="middle"><?=$ngay?></td>
                                        </tr>
                                    </table></td>
			  </tr>
			</table>            </td>
	      <tr>
	        <td height="5" valign="top" background="images/gif_breakline.gif" style="background-position:center; background-repeat:repeat-x"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        </table>
	    <?  }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td class="text_trang" align="center">
            <?  
			include("inc_next_back.php"); 
			if(strstr($qr,"Acat"))
			    phan_trang_A($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$next,$back,$dong,$mo);
			if(strstr($qr,"Bcat"))
			    phan_trang_B($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s,$next,$back,$dong,$mo);
			if(strstr($qr,"Ccat"))
			    phan_trang_C($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s,$next,$back,$dong,$mo);
			if(strstr($qr,"Dcat"))	
			    phan_trang_D($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s_s,$next,$back,$dong,$mo);
			if(strstr($qr,"Ecat"))
				phan_trang_E($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat_s_s_s_s,$next,$back,$dong,$mo);
			?></td>
        </tr>
        </table></td>
  </tr>
	

<tr>
  <td height="13"></td>
  </tr>
<tr>
  <td height="101" valign="top">
  <?
	if(strstr($qr,"Acat"))
	{
	$query2 = "Select * FROM  $table where ma_bac_1=$cat and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1  ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?Acat=$cat&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg")."</a>"; 
	}
if(strstr($qr,"Bcat"))
	{
	$query2 = "Select * FROM  $table where ma_bac_2=$cat_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?Bcat=$cat_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg")."</a>"; 
	}
if(strstr($qr,"Ccat"))
	{
	$query2 = "Select * FROM  $table where ma_bac_3=$cat_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?Ccat=$cat_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg")."</a>";
	}
if(strstr($qr,"Dcat"))
   {
	$query2 = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?Dcat=$cat_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg")."</a>";
	}
if(strstr($qr,"Ecat"))
	{
	$query2 = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
	$ten_tieude="<a href=\"./?Ecat=$cat_s_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ten_$lg")."</a>";
	}
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
            <td height="20" class="tieude" valign="middle" align="left"><? 
			  echo "$ten_tieude";
			  ?></td>
          </tr>
          </tbody>
        </table></td>
    </tr>
    <?
	while($rs= mysql_fetch_array($result2))
	 { 
		$ngay=" <span class=nho_lot>(".$rs["ngay"].")</span>";
		$ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/icon/gif_button_icon1.gif\" border=0/> ".$rs["ten_$lg"]." $ngay</a>";
	 ?>
  <tr>
    <td height="15" colspan="2" valign="top" class="text_def"><? echo"$ten ";?></td>
  </tr>
    <? } ?>
  </table>  <?
	}
	?>  </td>
  </tr>
</table>
<? } ?>