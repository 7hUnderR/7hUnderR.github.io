<script language="javascript">
function add_cart(cat,id,lg,start,i)
	{
		document.shopping[i].action="index.php?Bcat="+cat+"&id="+id+"&lg="+lg+"&start="+start+"";
		document.shopping[i].submit();

	}
</script>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
			<?
			$k=0;
			$query_nhom = "Select * FROM tb_product_type order by thu_tu ASC";
			$result_nhom = mysql_query($query_nhom);
			$result_nhom = mysql_query($query_nhom);
			while($rs_nhom= mysql_fetch_array($result_nhom))
			 { 
			$i=0;
			$code = $rs_nhom["code"];
			$query2 = "Select * FROM  tb_product where product_type=$code and banner!=1 and activate=1 and ngoai_index = 1  ORDER BY thu_tu DESC LIMIT 0, 22";
			$result2 = mysql_query($query2);
			if(mysql_num_rows($result2)>0)
			{
			?>
            <tr>
              <td height="30" align="left" valign="middle" class="title_center"><img title="<?=$rs_nhom["name_$lg"]?>" src="images/photo/product_type/<?=$rs_nhom["anh_01_$lg"];?>" /></td>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 5px; padding-bottom: 5px;">
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
			  
			  $ten_link = chuan_ten($rs["ten_$lg"]);
			  $ten = $rs["ten_$lg"];
              $id = $rs["id"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"./?$ten_link&id_pproductv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/$rs[anh_nho]\" border=1 title=\"$ten\" ></a>";
			  else
			  $anh="";
			  $ten="<a href=\"./?$ten_link&id_pproductv=$rs[id]&lg=$lg&start=$start\" >".$rs["ten_$lg"]."</a>";
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

		  <? ?>

			</td>

            </tr>
<? } }?>
          </table>
