<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<!--DWLayoutTable-->
<tr>
<td height="74" colspan="2" valign="top" class="text_def">
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
			$page_count =1; 
			$cut_off = 10; 

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
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $noi_dung=$rs["mo_ta_$lg"];
			  $noi_dung=cat_duong_dan_thua($noi_dung);
			?>
        <?=$noi_dung?>
      <?  }?>
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td class="text_def">
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
			?>     </td>
        </tr>
    </table></td>
</tr>
</table>
