<SCRIPT src="admin/inc/popupImg.js"></SCRIPT>
<script language="javascript">
function add_cart(cat,id,lg,start,i)
	{
		document.shopping[i].action="index.php?Bcat="+cat+"&id="+id+"&lg="+lg+"&start="+start+"";
		document.shopping[i].submit();

	}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" colspan="2" align="center" valign="top" class="product_detail">&nbsp;</td>
        </tr>
      <tr>
        <td width="25%" align="center" valign="top" class="product_detail" style="padding-right: 8px;">
          <? 
				$table="tb_product";
				$query = "Select * FROM  $table where id=$id and banner!=1 and activate=1 ";
				$result = mysql_query($query);
				$rs= mysql_fetch_array($result);

   				  $ten=$rs["ten_$lg"];
				  $thu_tu_cuoi_cung=$rs["thu_tu"];
				  if($rs["anh"]!="") $anh="<img width=\"250\" src=\"images/photo/$rs[anh]\" border=1 hspace=0 title=\"$ten\" alt=\"$ten\" class=border_images>";
				  else
				  $anh="";
				  $id=$rs["id"];
				  $ghi_chu=$rs["ghi_chu_$lg"];
				  $gia= $rs["product_price"];
				  $code=$rs["product_code"];
				  $status=$rs["product_status"];
				  $type=$rs["product_type"];
				  
				  $color=$rs["product_color"];
				  $color=str_replace (",", "','", $color);
				  
				  $size=$rs["product_size"];
				  $size=str_replace (",", "','", $size);
				  
				  $made=$rs["product_made"];
				  $made=str_replace (",", "','", $made);
				  $sell_off=$rs["product_sell_off"];
				  $sell_off_view=$rs["product_sell_off"];
				  //echo"<a onclick=\"javascript: popupImage('images/photo/$rs[anh_nho_1]')\" href=\"#\">$anh</a>";
				  echo"$anh";
				 ?></td>
          <td width="70%" valign="top" class="tab_10"><?
			?>
        <form name="shopping" method="post" action="index.php?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",77,"ma_bac_2");?>&id=<?=$id?>&lg=<?=$lg?>&start=0">
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
         <!--DWLayoutTable-->
                  <tr>
                    <td height="18" valign="middle" class="title_3"><? echo "$ten"; ?></td>
                    <td width="1"></td>
                  </tr>
                  <tr>
                    <td height="18" valign="middle" class="text_def"><? echo "$ghi_chu"; ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="25" valign="middle"><? echo "Má số: $code"; ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td valign="middle" class="gia"><?  
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
                    <td></td>
                  </tr>
                  <tr>

                    <td height="30" align="left" valign="middle" class="add_cart"><a href="javascript:;" onclick="add_cart('<?=gia_tri_mot_cot("tb_bac_2","trang",77,"ma_bac_2");?>','<?=$id?>','<?=$lg?>','<?=$start?>','0');"><?=gia_tri_mot_cot("tb_bac_2","trang",77,"ten_$lg");?></a>
                        <input type="hidden" name="qty" size="3" maxlength="4" value="1" class="textfield" />
                        <input type="hidden" name="id" value="<?=$id?>"/>

                    <input type="hidden" name="query" value="<?=$qr?>" /></td>
                  </tr>
              </table> 
			</form></td>
    </tr>
  </table></td>
  </tr>
<tr>
  <td height="10"></td>
</tr>
<tr>
  <td height="40" valign="top" class="text_def"><? echo cat_duong_dan_thua($rs["mo_ta_$lg"]); ?></td>
  </tr>
	<tr>
	  <td height="25" valign="middle">		<?
			//echo"$cat | $cat_s | $cat_s_s | $cat_s_s_s | $cat_s_s_s_s ";
			
		if( ($cat!=0) && ($cat_s==0))
			{
			$ten_tieude="<a href=\"./?Acat=$cat&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg")."</a>"; 
			}
		if(($cat_s!=0) && ($cat_s_s==0))
			{
			$ten_tieude="<a href=\"./?Bcat=$cat_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg")."</a>"; 
			}
		if(($cat_s_s!=0) && ($cat_s_s_s==0))
			{
			$ten_tieude="<a href=\"./?Ccat=$cat_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0 && $cat_s_s_s_s==0))
		   {
			$ten_tieude="<a href=\"./?Dcat=$cat_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0) && ($cat_s_s_s_s!=0))
			{
			$ten_tieude="<a href=\"./?Ecat=$cat_s_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ten_$lg")."</a>";
			}
		   ?>
		<table cellspacing="0" cellpadding="0" width="100%" border="0">
        <tbody>
          <tr>
            <td height="25" class="tieu_de" valign="middle" align="left"><? 
			  echo "<b>$ten_tieude</b>";
			  ?></td>
          </tr>
          </tbody>
        </table> <? ?>	</td>
	</tr>
   <?
	    $query2 = "Select * FROM  $table where ma_bac_1=$cat and ma_bac_2=$cat_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 and id!=$id ORDER BY thu_tu DESC LIMIT 0, 6 ";
         //echo $query2;
		 
		$result2 = mysql_query($query2);
		$num_= mysql_num_rows($result2);
		if($num_>0)
		  {
		    ?> 
	<tr>
	  <td height="28" valign="top" style="padding-top:20px;"><? 
			$i=0;
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
        </table>
      <? ?>          </td>
</tr>
<? } ?>
<tr>
  <td height="16"></td>
</tr>
</table>
