<?
 $trang_here=46;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
 $cat_media=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ma_bac_2");
 $result=select_co_2dk("tb_news","ma_bac_2",$cat_media,"activate","1","thu_tu","DESC");
 $num_media = mysql_num_rows($result);
 $width="190";
 $height="190";
 $rs= mysql_fetch_array($result);
  
   $media="images/photo/news/$rs[anh]";
   $anh="images/photo/news/$rs[anh_nho]";
   //echo $media;
?>
<script type="text/javascript" src="media/swfobject.js"></script>
	<? if($num_media>0){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td >
<p id="video"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</p>
<script type="text/javascript">
	var s1 = new SWFObject("media/mediaplayer.swf","single","<?=$width?>","<?=$height?>","7");
	s1.addParam("allowfullscreen","true");
	s1.addVariable("file","../<?=$media?>");
	s1.addVariable("image","<?=$anh?>");
	s1.addVariable("width","<?=$width?>");
	s1.addVariable("height","<?=$height?>");
	s1.addVariable("backcolor","0x000000");
	s1.addVariable("frontcolor","0xCCCCCC");
	s1.addVariable("lightcolor","0x557722");
	s1.addVariable("shuffle","false");
	s1.addVariable("repeat","list");
	s1.write("video");
  </script></td>
  </tr>
</table>
<? }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif" ></td>
  </tr>
</table>
<? } ?>