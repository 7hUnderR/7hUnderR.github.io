<script language="javascript">
function add_cart(cat,id,lg,start,i)
	{
		document.shopping[i].action="index.php?Bcat="+cat+"&id="+id+"&lg="+lg+"&start="+start+"";
		document.shopping[i].submit();

	}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td align="center" valign="top">
          <? 
			$i=0;
			$table="tb_product";
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
			$PHP_SELF="index.php";
			$page_count =20; 
			$cut_off = 9; 

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
			  <td valign="top" align="left"><table border="0" cellpadding="0" cellspacing="5" align="center">
                <tr>
                  <?
			$i=0;
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $gia=$rs["product_price"];
			  $code = $rs["product_code"];
			  $sell_off=$rs["product_sell_off"];
			  $sell_off_view=$rs["product_sell_off"];
			  
			  $ten = $rs["ten_$lg"];
              $id = $rs["id"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/$rs[anh_nho]\" border=1 title=\"$ten\" ></a>";
			  else
			  $anh="";
			  $ten="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\" >".$rs["ten_$lg"]."</a>";
			  ?>
                  <td width="200" valign="top" align="center" class="tab_4_4_4_4 border_table"><form action="" method="post" name="shopping" id="shopping" style="margin: 0px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                        <tr>
                          <td align="center" valign="top" class="border_images_sp"><?=$anh?></td>
                        </tr>
                        <tr>
                          <td height="25" align="center" valign="middle" class="tieu_de_tin"><? echo "$ten"; ?></td>
                        </tr>
                        <tr>
                          <td height="25" align="center" valign="middle" class="gia"><?  
					if($sell_off!=0)
					  {
						$gia_v=number_format($gia);
						$sell_off_v=number_format($sell_off_view);
						echo "<strike>$gia_v $project_tien</strike>"; 
						echo " | $sell_off_v $project_tien";
					  }
					  else
					  {
						$gia_v=number_format($gia);
						echo "$gia_v $project_tien";
					  } 
				  ?></td>
                        </tr>
                      </table>
                  </form></td>
                  <? 
				  if($i==4)
				  {
				   echo"</tr>"; 
				  $i=0;
				  }
				  $k++;
				  }
			   ?>
                </tr>
              </table></td>
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