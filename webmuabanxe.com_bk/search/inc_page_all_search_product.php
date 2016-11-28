<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                            <?
								if(strstr($qr,"text_search"))
								   {
									$s=$HTTP_GET_VARS["Acat"];
									//if($s!=17)
									  $text_ma_bac_1=" ";
									//else
									 // $text_ma_bac_1=" ma_bac_1= $s and ";
									  
									$value=chuan_php($HTTP_GET_VARS["text_search"]);
									$text=$value;
									$text_upper = strtoupper($text); //BAN TRAN
									$text_name = ucwords(strtolower($text)); //Ban Tran
									
									$search=" $text_ma_bac_1 ((ten_$lg LIKE '%".$text."%' ) or (ten_$lg LIKE '%".$text_upper."%') or (ten_$lg LIKE '%".$text_name."%') or 
											   (ghi_chu_$lg LIKE '%".$text."%' ) or (ghi_chu_$lg LIKE '%".$text_upper."%') or (ghi_chu_$lg LIKE '%".$text_name."%') or 
											   (mo_ta_$lg LIKE '%".$text."%' ) or (mo_ta_$lg LIKE '%".$text_upper."%') or (mo_ta_$lg LIKE '%".$text_name."%')) ";
								   }
								else
								   {
									$search=" ";
									$value="";
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
			$search=" ((ten_$lg LIKE '%".$text."%' ) or (ten_$lg LIKE '%".$text_upper."%') or (ten_$lg LIKE '%".$text_name."%') or 
				   (ghi_chu_$lg LIKE '%".$text."%' ) or (ghi_chu_$lg LIKE '%".$text_upper."%') or (ghi_chu_$lg LIKE '%".$text_name."%') or 
				   (mo_ta_$lg LIKE '%".$text."%' ) or (mo_ta_$lg LIKE '%".$text_upper."%') or (mo_ta_$lg LIKE '%".$text_name."%')) 
				   and banner!=1 and activate=1 ";
						
			
			if($s_cat==0)
				$qr_dk=" Select ten_$lg, ghi_chu_$lg,mo_ta_$lg,anh_nho,anh,ngay,id,banner,activate,thu_tu,loai_tin FROM tb_product where $search ";
			else
				$qr_dk=" Select ten_$lg, ghi_chu_$lg,mo_ta_$lg,anh_nho,anh,ngay,id,banner,activate,thu_tu,loai_tin from tb_product where ma_bac_2 = $s_cat and $search ";
			
			$i=0;
			$query = " $qr_dk ";
			$result = mysql_query($query);
			//echo $query."<br>";
			$tam=0;
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =10; 
			$cut_off = 10; 

			//ten_$lg, ghi_chu_$lg,mo_ta_$lg,banner,activate,anh_nho,anh
			
			include("inc/phantrang.php");
		    $query2 = " $qr_dk ORDER BY thu_tu DESC LIMIT $start, $page_count";
			$result2 = mysql_query($query2);
		   // echo $query2;
			
		    if(($num>0)&&($value!=""))
			{
			while($rs_p= mysql_fetch_array($result2))
			 { 
			  $id_pr=$rs_p["id"];
			  
			  if($rs_p["loai_tin"]==1)
				$link="./?id_pproductv=$rs_p[id]&lg=$lg&start=$start";
			  else
				$link="./?id_pnewsv=$rs_p[id]&lg=$lg&start=$start";
			  
			  $ten=$rs_p["ten_$lg"];
			  $ghi_chu=$rs_p["ghi_chu_$lg"];
			  if($value!="")
			    {
				$ten=str_replace($text,"<span class=search_replace>$text</span>",$ten);
				$ghi_chu=str_replace($text,"<span class=search_replace>$text</span>",$ghi_chu);
				
				$ten=str_replace($text_upper,"<span class=search_replace>$text_upper</span>",$ten);
				$ghi_chu=str_replace($text_upper,"<span class=search_replace>$text_upper</span>",$ghi_chu);

				$ten=str_replace($text_name,"<span class=search_replace>$text_name</span>",$ten);
				$ghi_chu=str_replace($text_name,"<span class=search_replace>$text_name</span>",$ghi_chu);
				
				}
			  $ten="<a href=\"$link\" class=\"tieude\">".$ten."</a>";
			  
			  $ngay="<span class=nho_lot>".$rs_p["ngay"]."</span>";
		      $more="<a href=\"$link\"><img src=\"images/icon/btn_more_$lg.gif\" border=0></a>";
		
		?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		    <tr>
		      <td valign="top">
			    <table width="100%" border="0" cellpadding="0" cellspacing="0">
			      <!--DWLayoutTable-->
			  <tr>
			    <td height="21" align="left" valign="middle" class="tieude"><?=$ten?></td>
			  </tr>
			  <tr>
			    <td valign="top" class="text_def" ><?=$ghi_chu?></td>
		      </tr>
			  <tr>
			    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
			  </tr>
			</table></td>
		    </tr>
		    <tr>
		      <td height="10" align="right" valign="top"></td>
	        </tr>
              </table>
	  <?  }?>
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
		echo"<br><b>Tìm thấy: 0 mục</b> <br><br> Hiện tại Website chỉ hỗ trợ việc tìm kiếm các từ Việt được nhập vào theo chuẩn Unicode Precompound. Nếu nhập từ cần tìm theo các chuẩn Việt khác thì việc tìm kiếm có thể không chính xác.
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
