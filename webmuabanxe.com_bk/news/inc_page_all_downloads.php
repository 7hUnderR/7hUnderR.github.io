<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="lightbox/lightbox.css" type="text/css">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="149" align="center" valign="top">
          <? 
			$s_cat= 18;
			if(isset($HTTP_GET_VARS["s_cat"]))
			  $s_cat=$_GET["s_cat"];

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
			$page_count =9; 
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
               $id = $rs["id"];
			  $ten = $rs["ten_$lg"];
			  
			  if($rs["mo_ta_$lg"]=="")
			   {
			   if($rs["anh"]=="")
			     $link_="javascript:;";
			   else
			     $link_="images/photo/news/$rs[anh]";
			   }
			 else
			   {
			    $link_=$rs["mo_ta_$lg"];
			   }
			  
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"$link_\" ><img id=neo_$id src=\"images/photo/news/$rs[anh_nho]\" border=1 vspace=5 class=border_images alt=\"$ten\"></a>";
			  else
			  $anh="";
			  $ten="<a href=\"$link_\" >".$rs["ten_$lg"]."</a>";
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  ?>
			  <td height="65" width="25%" valign="top" class="tab_20" align="center">
				<?=$anh?>
				 <br>
				  <? 
				  echo "<span class=tieu_de><b>$ten</b></span><br>";
				  ?>
				<br /></td>
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
        <td align="center" class="text_trang">
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