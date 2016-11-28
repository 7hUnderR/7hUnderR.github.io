<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<SCRIPT src="admin/inc/popupImg.js"></SCRIPT>
<script language="javascript" src="inc/form_validation.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td width="1031" height="221" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="25%" height="221" align="center" valign="top" class="product_detail">
          <? 
				$table="tb_product";
				$query = "Select * FROM  $table where id=$id and banner!=1 and activate=1 ";
				$result = mysql_query($query);
				$rs= mysql_fetch_array($result);
			      
				  $thu_tu_cuoi_cung=$rs["thu_tu"];
				  if($rs["anh"]!="") $anh="<img src=\"images/photo/$rs[anh]\" border=1 hspace=0 class=border_images>";
				  else
				  $anh="";
				  $id=$rs["id"];
				  $ten=$rs["ten_$lg"];
				  $ghi_chu=$rs["ghi_chu_$lg"];
				  $gia="$". $rs["product_price"];
				  $code=$rs["product_code"];
				  $status=$rs["product_status"];
				  $type=$rs["product_type"];
				  
				  $color=$rs["product_color"];
				  $color=str_replace (",", "','", $color);
				  
				  $size=$rs["product_size"];
				  $size=str_replace (",", "','", $size);
				  
				  $made=$rs["product_made"];
				  $made=str_replace (",", "','", $made);
				  
				  //echo"<a onclick=\"javascript: popupImage('images/photo/$rs[anh_nho_1]')\" href=\"#\">$anh</a>";
				  echo"$anh";
				 ?></td>
          <td width="70%" valign="top" class="tab_10"><?
			?>
       <table width="100%" border="0" cellpadding="0" cellspacing="0">
			      <!--DWLayoutTable-->
			      <tr>
				    <td width="123" height="20" valign="middle" class="button">Name: </td>
				    <td width="373" valign="middle" class="button"><?=$ten?></td>
			      </tr>
			      <tr>
				    <td height="20" valign="middle" class="button">Code: </td>
				    <td valign="middle" class="text_def"><?=$code?></td>
			      </tr>
			      <tr>
				    <td height="20" valign="middle" class="button">Description: </td>
				    <td valign="middle" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
			      </tr>
			      <tr >
				    <td height="44" colspan="2" valign="top" class="text_def"><?=$ghi_chu?></td>
		        </tr>
			      <tr>
			        <td height="2"></td>
			        <td></td>
		        </tr>
		      </table> 
		  </td>
    </tr>
  </table></td>
  </tr>
<tr>
  <td height="18"></td>
</tr>
<tr>
  <td height="40" valign="top" class="text_def"><?=$rs["mo_ta_$lg"]?></td>
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
            <td height="25" class="border_b tieu_de" valign="middle" align="left"><? 
			  echo "<b>$ten_tieude</b>";
			  ?></td>
          </tr>
          </tbody>
        </table> <? ?>	</td>
	</tr>
   <?
	    $query2 = "Select * FROM  $table where ma_bac_1=$cat and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 and id!=$id ORDER BY thu_tu DESC LIMIT 0, 6 ";
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
		  <table border="0" cellpadding="0" cellspacing="0">
		    <!--DWLayoutTable-->
		    <tr>
			<?
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $ten = $rs["ten_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=0\"><img width=132 src=\"images/photo/$rs[anh_nho]\" border=1 vspace=5 class=border_images alt=\"$ten\"></a>";
			  else
			  $anh="";
			  $ten="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\">".$rs["ten_$lg"]."</a>";
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  $gia="$". $rs["product_price"];
			  $code = $rs["product_code"];
			  $sell_off=$rs["product_sell_off"];
			  $sell_off_view="$".$rs["product_sell_off"];
              ?>
		      <form name="form1" method="post" action="shopping_cart/shopping_add_to_cart.php?id=<?=$id?>&lg=<?=$lg?>&start=0">
			  <td height="65" width="25%" valign="top" class="text_product tab_20" align="center">
				<?=$anh?>
				 <br>
				  <? 
				  echo " <b>$ten</b> <br>";
				  echo "$code";
				  ?>
				<br /></td>
			  </form>
			  <? 
			  if($i==3)
			  {
			   echo"</tr>"; 
			  $i=0;
			  }
			  }
			   ?>
		    </tr>
      </table>	  <? ?>          </td>
</tr>
<? } ?>
<tr>
  <td height="16"></td>
</tr>
</table>
