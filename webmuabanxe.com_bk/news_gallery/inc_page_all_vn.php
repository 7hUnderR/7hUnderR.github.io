<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<SCRIPT src="admin/inc/popupImg.js"></SCRIPT>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="149" align="center" valign="top">
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

		  <table width="100%" border="0" cellpadding="0" cellspacing="0">

		    <tr>

			  <td height="65" width="100%" valign="top" align="center">

			   <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <?
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $ten = $rs["ten_$lg"];
              $id = $rs["id"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a onclick=\"javascript: popupImage('images/photo/news/$rs[anh]')\" href=\"#\"><img width=100 src=\"images/photo/news/$rs[anh_nho]\" border=1 class=border_images =\"$ten\" ></a>";

			  else

			  $anh="";
			  $ten="<a href=\"./?id_pnewstv=$rs[id]&lg=$lg&start=$start\" >".$rs["ten_$lg"]."</a>";
			  ?>
                 <td height="65" width="130" valign="top" align="center" class="tab_5_5_5_5"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border_table">
                        <tr>
                          <td height="20" valign="middle" class="tieude" align="center"><? echo "<b>$ten</b>"; ?></td>
                        </tr>
                        <tr>
                          <td height="18" valign="middle" class="text_def" align="center"><?=$anh?></td>
                        </tr>
                  <tr>
                    <td height="10" valign="middle" align="center"></td>
                  </tr>
                    </table></td>
                  <? 
				  if($i==3)
				  {
				   echo"</tr>"; 
				  $i=0;
				  }
				  }
			   ?>
                </tr>
              </table>

			  </td>

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