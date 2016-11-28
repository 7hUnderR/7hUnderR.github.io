	<? 
	$trang_here=3;
	$ma_sub_newscn = gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"ma_bac_1");
	$table="tb_news";
	$query_cn = "Select * FROM  $table where ma_bac_1=$ma_sub_newscn and banner!=1 and activate=1 and ngoai_index = 1 ORDER BY thu_tu DESC LIMIT 0, 10";
	$result_cn = mysql_query($query_cn);
	$num = mysql_num_rows($result_cn);
	$i=0;
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="block_7_center">
  <tr>
    <td valign="top" class="block_7_bottom" ><table class="block_7_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		<tbody>
		  <tr>
			<td valign="middle" class="tab_8_8 block_7_title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		  <tr>
			<td class="tab_10_10_10_10 text_def"><div id=AdTinTucLoc style="DISPLAY: block">

		<SCRIPT src="news/js/A573G988.js" type=text/javascript></SCRIPT>
			<SCRIPT src="news/js/A573Z388.js" type=text/javascript></SCRIPT>
			<SCRIPT src="news/js/A573Z288.js" type=text/javascript></SCRIPT>
			<SCRIPT src="news/js/A573G788.js" type=text/javascript></SCRIPT>
			<DIV class=Rotator id=ucVieRight_rttRightAd  style="OVERFLOW: hidden; WIDTH: 100%; HEIGHT: 220px" >
			<DIV id=ucVieRight_rttRightAd_SlideContainer style="VISIBILITY: hidden">
			
		   <?
		  while($rs= mysql_fetch_array($result_cn))
		  {	
		  if($rs["anh_nho"]!="") $anh="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\"><img src=\"images/photo/news/$rs[anh_nho]\" border=0 hspace=0 class=border_images style=\"float: center;\"></a>";
		  else
		  $anh="";
		  
		  $ten="<a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
		  $ghi_chu=$rs["ghi_chu_$lg"];
		  $ngay="".$rs["ngay"]."";
		  /*
		  if($lg=="vn")
			$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Xem chi tiết »</a></span>";
		  else
			$more="<span class=more><a href=\"./?id_pnewsv=$rs[id]&lg=$lg&start=0\">Detail »</a></span>";
			*/
			?>
            <DIV id=stt_<?=$i?> style="height: 220px;">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="boder_chay_logo">
				<tr>
				  <td valign="middle" class="tieu_de_tin" align="center"><?=$ten?></td>
				  </tr>
				<tr>
				  <td height="25" valign="top" align="center"><?=$anh?></td>
				  </tr>
				<tr>
				  <td valign="top" align="center"><?=$ghi_chu?></td>
				</tr>
				</table>
			</DIV>
		<?
		$i++;
		}
		?>			
		</DIV>
		<SCRIPT type=text/javascript>
		// Initialize rotator instance -------------------------------------------------
		
		var rco_ucVieRight_rttRightAd = new ComponentArt_Rotator(); 
		rco_ucVieRight_rttRightAd.GlobalID = 'rco_ucVieRight_rttRightAd'; 
		rco_ucVieRight_rttRightAd.ElementID = 'ucVieRight_rttRightAd';
		rco_ucVieRight_rttRightAd.ContainerID = 'ucVieRight_rttRightAd_SlideContainer';
		rco_ucVieRight_rttRightAd.ContainerRowID = 'ucVieRight_rttRightAd_ContainerRow';
		rco_ucVieRight_rttRightAd.AutoStart = true;
		rco_ucVieRight_rttRightAd.SlidePause = 2000; // so giay den nhay 
		rco_ucVieRight_rttRightAd.HideEffect = null; 
		rco_ucVieRight_rttRightAd.HideEffectDuration = 50;
		rco_ucVieRight_rttRightAd.Loop = true; 
		rco_ucVieRight_rttRightAd.PauseOnMouseOver = true; //false; //Dong mo chuot
		rco_ucVieRight_rttRightAd.RotationType = 'SmoothScroll';
		rco_ucVieRight_rttRightAd.ScrollDirection = 'up'; 
		rco_ucVieRight_rttRightAd.ScrollInterval = 5; 
		rco_ucVieRight_rttRightAd.ShowEffect = null; 
		rco_ucVieRight_rttRightAd.ShowEffectDuration = 50;
		rco_ucVieRight_rttRightAd.SmoothScrollSpeed = 'Medium';
		rco_ucVieRight_rttRightAd.Slides = new Array();
		<?
		$i=0;
		$query_cn = "Select * FROM  $table where ma_bac_1=$ma_sub_newscn and banner!=1 and activate=1 and ngoai_index = 1 ORDER BY thu_tu DESC LIMIT 0, 10";
		$result_cn = mysql_query($query_cn);
		while($rs= mysql_fetch_array($result_cn))
			{
			?>
		rco_ucVieRight_rttRightAd.Slides[<?=$i?>] = 'stt_<?=$i?>'; 
		<? $i++; } ?>
		rco_ucVieRight_rttRightAd.HasTickers = false; 
		if (rco_ucVieRight_rttRightAd.AutoStart) rcr_Start(rco_ucVieRight_rttRightAd); 
		</SCRIPT>
			</DIV>			
			  </div></td>
		  </tr>
		</tbody>
</table>
</td>
  </tr>
</table>
<table width="168" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif" width=168></td>
  </tr>
</table>	