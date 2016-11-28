<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                            <?
	if(strstr($qr,"text_search"))
	   {
		$value = $HTTP_GET_VARS["text_search"];
		$text= $value;
		$text_upper = strtoupper($text); //BAN TRAN
		$text_name = ucwords(strtolower($text)); //Ban Tran

		$search=" ma_bac_1 = $ma_product";
		if($s_cat!=0)
		  $search= $search . " and ma_bac_2 = $s_cat ";
		if($codetype!=0)
		  $search= $search . " and product_thang_gia = $codetype"; 
		if($codetype2!=0)
		  $search= $search . " and product_cho_ngoi = $codetype2";
		if($codetype3!=0)
		  $search= $search . " and product_nam_san_xuat = $codetype3";
		if($codetype4!=0)
		  $search= $search . " and product_catalog = $codetype4";

		if($value!='' and $value!='Từ khóa')
		  $search = $search ." and ((ten_$lg LIKE '%".$text."%' ) or (ten_$lg LIKE '%".$text_upper."%') or (ten_$lg LIKE '%".$text_name."%') or 
				   (ghi_chu_$lg LIKE '%".$text."%' ) or (ghi_chu_$lg LIKE '%".$text_upper."%') or (ghi_chu_$lg LIKE '%".$text_name."%') or 
				   (mo_ta_$lg LIKE '%".$text."%' ) or (mo_ta_$lg LIKE '%".$text_upper."%') or (mo_ta_$lg LIKE '%".$text_name."%')) 
				   and banner!=1 and activate=1 ";
				   
		if($chon_service!="")
			{
			 /*
			 $query = "Select * FROM  tb_product_type_3 where code in ('$chon_service') ";
			 $result = mysql_query($query);
			 $i=0;
			 while ($rs_services= mysql_fetch_array($result))
				 {
				 $search = $search ." ";
				 } */
			}
	   }
	else
	   {
		$search=" where ma_bac_1 = $ma_product and banner!=1 and activate=1 ";
		$text="";
	   }
	if($lg=="eg")
		{
		$title = "Key word";
		$ket_qua="Search result";
		}
	else
		{
		$title = "Từ khóa ";
		$ket_qua="Kết quả tìm";
		}
							  ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="138"  valign="top">
          <? 
			$qr_dk=" Select ma_bac_1,ma_bac_2,ten_$lg, ghi_chu_$lg,mo_ta_$lg,anh_nho,anh,ngay,id,banner,activate,thu_tu,product_thang_gia,product_type,loai_tin FROM tb_product where $search ";
			
			$i=0;
			$query = " $qr_dk ";
			$result = mysql_query($query);
			//echo $query."<br> ";
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =40; 
			$cut_off = 10; 

			//ten_$lg, ghi_chu_$lg,mo_ta_$lg,banner,activate,anh_nho,anh
			
			include("inc/phantrang.php");
		    $query2 = " $qr_dk ORDER BY thu_tu DESC LIMIT $start, $page_count";
			$result2 = mysql_query($query2);
		   //echo $query2;
		    if(($num>0))
			{
		
		?>
<table border="0" cellpadding="0" cellspacing="5" align="center">
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

			  if($value!="")
			    {
				$ten=str_replace($text,"<span class=search_replace>$text</span>",$ten);
				$ten=str_replace($text_upper,"<span class=search_replace>$text_upper</span>",$ten);
				$ten=str_replace($text_name,"<span class=search_replace>$text_name</span>",$ten);
				}
			  
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/$rs[anh_nho]\" border=1 title=\"$ten\" ></a>";
			  else
			  $anh="";
			  $ten="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\" >".$ten."</a>";
			  ?>

			    <td width="200" valign="top" align="center" class="tab_4_4_4_4 border_table"><form style="margin: 0px;" name="shopping" method="post" action=""><table width="100%" border="0" cellpadding="0" cellspacing="0" >
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
						      </form>

				</td>
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
              </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td align="center" class="text_def">
			<?
			//$cat=$cat; 
			include("inc_next_back.php"); 
			//phan_trang_A_search($page_count,$num,$start,$lg,$PHP_SELF,$cut_off,$cat,$text,$next,$back,$dong,$mo);
			phan_trang_4dk($page_count,$num,"Acat",$cat,"lg",$lg,"s_cat",$s_cat,'text_search',$text,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo);
			?></td>
        </tr>
    </table>	  <?
	   
	  }
	  else
	   {
	     if($lg=="vn")
		echo"Hiện tại Website chỉ hỗ trợ việc tìm kiếm các từ Việt được nhập vào theo chuẩn Unicode Precompound. Nếu nhập từ cần tìm theo các chuẩn Việt khác thì việc tìm kiếm có thể không chính xác.
		<br>Quý khách có thể dùng <b>Unikey</b> hoặc <b>Vietkey</b> để gõ chữ Việt !";
		 else
		   echo"Items not found!";
	   }
	  ?>
</td>
</tr>
<tr>
  <td height="13"></td>
  </tr>
</table>
