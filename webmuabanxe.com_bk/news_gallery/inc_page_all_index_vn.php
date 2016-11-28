<?
 $trang_here=47;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
 $cat_here=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"ma_bac_1");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
              <td height="22" align="left" valign="middle">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        		<tr>
					<td valign="middle" class="title_center"><?=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat_here,"mo_ta_$lg");?></td>
       		 	</tr>
		      </table>	</td>
            </tr>
			<?
			$table="tb_bac_2";
			$query_nhom = "Select * FROM  $table where ma_bac_1=$cat_here and activate=1 ORDER BY thu_tu ASC ";
			$result_nhom = mysql_query($query_nhom);
			while($rs_nhom= mysql_fetch_array($result_nhom))
			 { 
			$i=0;
			$tin_tuc = $rs_nhom["ma_bac_2"];
			$table="tb_news";
			$query2 = "Select * FROM  $table where ma_bac_2=$tin_tuc and banner!=1 and activate=1 and ngoai_index = 1  ORDER BY thu_tu DESC LIMIT 0, 9";
			$result2 = mysql_query($query2);
			if(mysql_num_rows($result2)>0)
			{
			?>
            <tr>

              <td height="22" align="left" valign="middle" class="tieu_de tab_8_8"><b><a href="./?Bcat=<?=$rs_nhom["ma_bac_2"]?>&lg=<?=$lg?>&start=0"><?=$rs_nhom["ten_$lg"]?></a></b></td>
            </tr>
            <tr>

              <td valign="top" align="center"> 
			  <table border="0" cellpadding="0" cellspacing="5">
                <tr>
                  <?
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $ten = $rs["ten_$lg"];
              $id = $rs["id"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a onclick=\"javascript: popupImage('images/photo/news/$rs[anh]')\" href=\"javascript:;\"><img width=100 src=\"images/photo/news/$rs[anh_nho]\" border=1 class=border_images =\"$ten\" ></a>";

			  else

			  $anh="";

			  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=$start\" >".$rs["ten_$lg"]."</a>";

			  ?>
                    <td height="65" width="160" valign="top" align="center" class="tab_8_8_8_8"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="18" valign="middle" class="text_def" align="center"><?=$anh?></td>
                        </tr>
                        <tr>
                          <td height="20" valign="middle" class="tieu_de_tin" align="center"><? echo "$ten"; ?></td>
                        </tr>
                  <tr>
                    <td height="10" class="tieude_center2" valign="middle" align="center"></td>
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
              <? ?></td>
            </tr>
<? } }?>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif" ></td>
  </tr>
</table>
<? } ?>
