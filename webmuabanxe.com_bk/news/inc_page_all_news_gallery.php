<?
if(session_is_registered("ten_dang_nhap"))
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="lightbox_2/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
	body{ color: #333; font: 13px 'Lucida Grande', Verdana, sans-serif;	}
</style>
<link href="lightbox_2/screen.css" rel="stylesheet" type="text/css" />

<script src="lightbox_2/prototype.js" type="text/javascript"></script>
<script src="lightbox_2/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="lightbox_2/lightbox.js" type="text/javascript"></script>
<br>
<table width="95%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="149" align="left" valign="top">
          <? 

			$i=0;
			$table="tb_news";
			if(strstr($qr,"Acat"))
				$query = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1";
			if(strstr($qr,"Bcat"))
			    $query = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1";
			if(strstr($qr,"Ccat"))
			    $query = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1";
			if(strstr($qr,"Dcat"))	
			    $query = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1";
			if(strstr($qr,"Ecat"))
			    $query = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1";
			$result = mysql_query($query);
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =12; 
			$cut_off = 10; 

			$start=$HTTP_GET_VARS["start"];
			include("inc/phantrang.php");
		   
			if(strstr($qr,"Acat"))
				$query2 = "Select * FROM  $table where ma_bac_1=$cat and banner!=1 and activate=1  ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Bcat"))
			    $query2 = "Select * FROM  $table where ma_bac_2=$cat_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Ccat"))
			    $query2 = "Select * FROM  $table where ma_bac_3=$cat_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			if(strstr($qr,"Dcat"))	
			    $query2 = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count  ";
			if(strstr($qr,"Ecat"))
			    $query2 = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			$result2 = mysql_query($query2);
			?>
		  <table border="0" cellpadding="0" cellspacing="0" width="100%">
		    <tr>
			<?
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $tam++;
               $id = $rs["id"];
			  $ten = $rs["ten_$lg"];
		      if($tam==$page_count)
			    $title="$ten - Press X to close.";
			  else
			    $title="$ten - Alternatively you can press the N key.";

			  if($rs["anh_nho"]!="") 
			  $anh="<a rel=\"lightbox[plants]\" href=\"images/photo/news/$rs[anh]\" title=\"$title\"><img id=neo_$id src=\"images/photo/news/$rs[anh_nho]\" border=1 class=border_images alt=\"$ten\" width=\"100\"></a>";
			  else
			  $anh="";
			  $ten="<a rel=\"lightbox[plants]\" href=\"images/photo/news/$rs[anh]\" >".$rs["ten_$lg"]."</a>";
			  $ten_v=$rs["ten_$lg"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  
			  ?>
			  <td width="25%" valign="top" class="tab_20 tieude" align="center">
				<? echo $ten_v; ?><br />
				<div class="thumbnail">
				<?=$anh?>
				</div>
			  </td>
			  <? 
			  if($i==3)
			  {
			   echo"</tr>"; 
			  $i=0;
			  }
			  }
			   ?>
		    </tr>
          </table>	  <? ?>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td height="15" align="center" class="text_trang">&nbsp;</td>
		  </tr>
		<tr>
        <td height="30" align="center" class="text_trang">
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
			?>          </td>
        </tr>
    </table></td>
</tr>
</table>
<? } else echo "Xin vui lòng đăng nhập!"; ?>