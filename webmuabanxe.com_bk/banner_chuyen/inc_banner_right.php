 <?
 $trang_here=42;
 $cat_banner=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ma_bac_2");
 if(gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_banner,"activate")==1)
 {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="20" align="left" class="bg_title_r title tab_5_5"><img src="images/icon/icon_b.gif" style="margin-right: 5px;" /><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg")?></td>
  </tr>
	 <tr>
	   <td height="2" align="center" valign="top">&nbsp;</td>
  </tr>
	 <tr>
    <td height="2" align="center" valign="top">
		<SCRIPT src="banner_chuyen/js/A573G988.js" type=text/javascript></SCRIPT>
			<SCRIPT src="banner_chuyen/js/A573Z388.js" type=text/javascript></SCRIPT>
			<SCRIPT src="banner_chuyen/js/A573Z288.js" type=text/javascript></SCRIPT>
			<SCRIPT src="banner_chuyen/js/A573G788.js" type=text/javascript></SCRIPT>
			<DIV class=Rotator id=ucVieRight_rttRightAd  style="OVERFLOW: hidden; WIDTH: 130px; HEIGHT: 205px" >
			<DIV id=ucVieRight_rttRightAd_SlideContainer style="VISIBILITY: hidden">
			
		   <?
		    $i=0;
			$result=select_co_3dk("tb_news","ma_bac_2",$cat_banner,"banner",1,"activate","1","thu_tu","DESC");
			$num = mysql_num_rows($result);
			while($rs= mysql_fetch_array($result))
			{
			$banner="";
			$title=$rs["ten_$lg"];
			if($num>0)
			{
				
		if($rs["type"]==0)
			{
			if($rs["mo_ta_$lg"]!="") 
			  { 
			   $link_banner="<a href=\"".$rs["mo_ta_$lg"]."\" target=\"".$rs["target_$lg"]."\">"; 
			   $link_end="</a>";
			  }
			else 
			  { 
			   $link_banner=""; 
			   $link_end="";
			  }
			if($lg=="vn")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho]\" vspace=2 border=0 title=\"$title\">$link_end";
			if($lg=="eg")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh]\" vspace=2 border=0 title=\"$title\">$link_end";
			if($lg=="kr")
			  $banner="$link_banner<img src=\"images/photo/news/$rs[anh_nho_1]\" vspace=2 border=0 title=\"$title\">$link_end";
			
			}
		else
			{
			if($lg=="vn")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"130\" height=\"60\">
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh_nho]\">
					  <param name=\"quality\" value=\"high\">
					  <embed src=\"images/photo/news/$rs[anh_nho]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"130\" height=\"60\"></embed></object>";
			if($lg=="eg")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"130\" height=\"60\">
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh]\">
					  <param name=\"quality\" value=\"high\">
					  <embed src=\"images/photo/news/$rs[anh]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"130\" height=\"60\"></embed></object>";
			if($lg=="kr")
			$banner="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"130\" height=\"60\">
					  <param name=\"movie\" value=\"images/photo/news/$rs[anh_nho_1]\">
					  <param name=\"quality\" value=\"high\">
					  <embed src=\"images/photo/news/$rs[anh_nho_1]\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"130\" height=\"60\"></embed></object>";
					  
					 }?>
            <DIV id=stt_<?=$i?>>
<!-- 0 -------------------->			
				<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 class="boder_chay_logo">
				  <TBODY>
					  <TR>
						<TD vAlign=top align=middle><?=$banner?></TD>
					  </TR>
				 </TBODY>
				</TABLE>
			</DIV>
		<?
		}
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
		$result=select_co_3dk("tb_news","ma_bac_2",$cat_banner,"banner",1,"activate","1","thu_tu","DESC");
		$num = mysql_num_rows($result);
		while($rs= mysql_fetch_array($result))
			{
			?>
		rco_ucVieRight_rttRightAd.Slides[<?=$i?>] = 'stt_<?=$i?>'; 
		<? $i++; } ?>
		rco_ucVieRight_rttRightAd.HasTickers = false; 
		
		
		
		if (rco_ucVieRight_rttRightAd.AutoStart) rcr_Start(rco_ucVieRight_rttRightAd); 
		</SCRIPT>
</DIV></td></tr>	 <tr>
	   <td height="2" align="center" valign="top">&nbsp;</td>
  </tr>
</table>
<? } ?>