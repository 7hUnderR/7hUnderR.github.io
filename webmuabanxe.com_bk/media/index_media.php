<?
 $trang_here=46;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
 $cat_media=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ma_bac_2");
 $result=select_co_2dk("tb_news","ma_bac_2",$cat_media,"activate","1","thu_tu","DESC");
 $num_media = mysql_num_rows($result);
 $width="170";
 $height="170";
 $rs= mysql_fetch_array($result);
 if($num_media>0)
   $media="images/photo/news/$rs[anh]";
?>
<table class="block_1" cellspacing=0 cellpadding=0 
		width="100%" border=0>
		<tbody>
		  <tr>
			<td width="90%" valign="middle"><div class=title><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ten_$lg")?></div></td>
			<td width="10%" valign="middle"><img 
			id=AdVideo style="CURSOR: pointer" 
			onClick=SetViewTableDiv(this.id); alt="" 
			src="styles/<?=$style_path?>/AdImgUp.gif" border=0></td>
		  </tr>
		  <tr>
			<td colspan=2 class="tab_5_5_5_5 text_def" align="center"><div id=AdVideoLoc style="DISPLAY: block"><? if($num_media>0){?>
<embed type='application/x-mplayer2' pluginspage='http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/' 
controls='controlpanel' width=<?=$width?> height=<?=$height?> 
src='<?=$media?>' 
fullScreen='0'  loop='true' currentMarker='0' volume='100' mute='0' uiMode='full' stretchToFit='0' windowlessVideo='0' 
enabled='-1' enableContextMenu='false' playcount ='10' ShowControls='1' AutoStart='true' 
ShowDisplay='false' ShowStatusBar='1'></embed><? }?></div></td>
		  </tr>
		</tbody>
</table>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td ><img height=8 alt="" src="images/spacer.gif" width=180></td>
	      </tr>
		</table>
<? } ?>