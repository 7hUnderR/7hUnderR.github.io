<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td height="147" colspan="2" valign="top">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
		    <tr>
		      <td height="35" align="left" valign="middle" class="title_3">
			  <?
			    $table="tb_news";
				$query = "Select * FROM  $table where id=$id and banner!=1 ";
				$result = mysql_query($query);
				$rs= mysql_fetch_array($result);
				$thu_tu_cuoi_cung=$rs["thu_tu"];
				//$anh_lon=$rs["anh"];
				//if($anh_lon!="")
				 //echo"<img src=\"images/photo/news/$anh_lon\" border=0 hspace=0 style=\"float:left ; margin-right: 10px; margin-bottom: 5px;\">";
				echo  $rs["ten_$lg"];
				
			  ?>
			  </td>
	        </tr>
		    <tr>
		      <td valign="top" class="text_def" style="padding-bottom: 10px;"><b><?
			  echo  $rs["ghi_chu_$lg"];
			  ?></b></td>
	        </tr>
		    <tr>
		      <td valign="top" class="text_def">
			  <? 
				$detail=$rs["mo_ta_$lg"];
				$detail=cat_duong_dan_thua($detail);
				echo  $detail;
			  ?> </td>
		    </tr>
		    <tr>
		      <td height="10" colspan="2" valign="top"></td>
	        </tr>
          </table>

		<?
			//echo"$cat | $cat_s | $cat_s_s | $cat_s_s_s | $cat_s_s_s_s ";
			
		if( ($cat!=0) && ($cat_s==0))
			{
			$query2 = "Select * FROM  $table where ma_bac_1=$cat and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1  ORDER BY thu_tu DESC LIMIT 0, 10 ";
			$ten_tieude="<a href=\"./?Acat=$cat&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg")."</a>"; 
			}
		if(($cat_s!=0) && ($cat_s_s==0))
			{
			$query2 = "Select * FROM  $table where ma_bac_2=$cat_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
			$ten_tieude="<a href=\"./?Bcat=$cat_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg")."</a>"; 
			}
		if(($cat_s_s!=0) && ($cat_s_s_s==0))
			{
			$query2 = "Select * FROM  $table where ma_bac_3=$cat_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
			$ten_tieude="<a href=\"./?Ccat=$cat_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0 && $cat_s_s_s_s==0))
		   {
			$query2 = "Select * FROM  $table where ma_bac_4=$cat_s_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
			$ten_tieude="<a href=\"./?Dcat=$cat_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0) && ($cat_s_s_s_s!=0))
			{
			$query2 = "Select * FROM  $table where ma_bac_5=$cat_s_s_s_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 ORDER BY thu_tu DESC LIMIT 0, 10 ";
			$ten_tieude="<a href=\"./?Ecat=$cat_s_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ten_$lg")."</a>";
			}
		$result2 = mysql_query($query2);
		$num_= mysql_num_rows($result2);
		if($num_>0)
		  {
		   ?>
<table cellspacing="1" cellpadding="0" width="100%">
  <tr>
    <td height="20" valign="top" class="tieu_de">
      <? 
			  echo "$ten_tieude";
			  ?>     </td>
    </tr>
  <?
	while($rs= mysql_fetch_array($result2))
	 { 
		$ngay=" <span class=nho_lot>(".$rs["ngay"].")</span>";
		$ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/icon/gif_button_icon1.gif\" border=0/> ".$rs["ten_$lg"]." $ngay</a>";
	 ?>
  <tr>
    <td height="20" valign="top" class="more_menu"><? echo"$ten ";?></td>
  </tr>
  <? } ?>
</table>
<? } ?>	
	</td>
</tr>
</table>

