<?
 $trang_here=24;
 if(gia_tri_mot_cot_2dk("tb_bac_2","trang",$trang_here,"ma_bac_1",$cat,"activate")==1)
 {
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat,"trang",$trang_here,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$banner="";
	$width="615px";
	$height="320px";
?>
<LINK rel=stylesheet type=text/css href="banner_java_move_hinh_text/files/slider.css" media=screen>
<DIV class=anythingSlider>
<DIV class=wrapper>
<UL>
<SCRIPT type=text/javascript src="banner_java_move_hinh_text/files/jquerymin.js"></SCRIPT>
<SCRIPT type=text/javascript src="banner_java_move_hinh_text/files/easy.js"></SCRIPT>
<SCRIPT type=text/javascript charset=utf-8 src="banner_java_move_hinh_text/files/slider.js"></SCRIPT>
<SCRIPT type=text/javascript>
        function formatText(index, panel) {
		  return index + "";
	    }
    
        $(function () {
        
            $('.anythingSlider').anythingSlider({
                easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
                autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 2000,                    // How long between slide transitions in AutoPlay mode
                startStopped: false,            // If autoPlay is on, this can force it to start stopped
                animationTime: 300,             // How long the slide transition takes
                hashTags: true,                 // Should links change the hashtag in the URL?
                buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
        		pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
        		startText: "Start",             // Start text
		        stopText: "Stop",               // Stop text
		        navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
            });
            
            $("#slide-jump").click(function(){
                $('.anythingSlider').anythingSlider(6);
            });
            
        });
    </SCRIPT>
<? while($rs= mysql_fetch_array($result))
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
		$banner="images/photo/news/$rs[anh_nho]";
		if($lg=="eg")
		$banner="images/photo/news/$rs[anh]";
		if($lg=="kr")
		$banner="images/photo/news/$rs[anh_nho_1]";


	$tieu_de="$link_banner".$rs["ten_$lg"]."$link_end";
	$ghi_chu="$link_banner".$rs["ghi_chu_$lg"]."$link_end";
	  ?>
  <LI>
  <DIV id=textSlide>
  <DIV 
  style="BACKGROUND-IMAGE: url(<?=$banner?>); WIDTH: <?=$width?>; HEIGHT: <?=$height?>; BACKGROUND-REPEAT: no-repeat; ">
  <DIV style="WIDTH: 615px; HEIGHT: 250px; CLEAR: both"></DIV>
  <DIV class=bg_textxml>
  <DIV class=text_xml_title><?=$tieu_de;?></DIV>
  <DIV class=text_xml><?=$ghi_chu;?></DIV></DIV></DIV></DIV></LI>
	 <? 
	  } 
	?>

</UL></DIV></DIV>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td ><img height=8 alt="" src="images/spacer.gif"></td>
	  </tr>
	</table>
<? } ?>