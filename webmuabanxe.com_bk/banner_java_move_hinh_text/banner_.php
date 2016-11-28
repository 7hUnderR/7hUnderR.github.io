<?
 $trang_here=24;
 if(gia_tri_mot_cot_2dk("tb_bac_2","trang",$trang_here,"ma_bac_1",$cat,"activate")==1)
 {
	$cat_bn_top=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$cat,"trang",$trang_here,"ma_bac_2");
	$result=select_co_3dk("tb_news","ma_bac_2",$cat_bn_top,"banner",1,"activate","1","thu_tu","DESC");
	$banner="";
	$width="500px";
	$height="296px";
?>
<LINK rel=stylesheet type=text/css href="banner_java_move_hinh_text/files/slider.css" media=screen>
<DIV class=swap>
<DIV class=centerbody>
<DIV class=header>
<!-- Begin BOX1-->
<DIV class=content_box>
<DIV style="WIDTH: <?=$width;?>; PADDING-TOP: 1px"><!-- THEM VAO -->
<SCRIPT type=text/javascript src="banner_java_move_hinh_text/files/jquerymin.js"></SCRIPT>
<SCRIPT type=text/javascript src="banner_java_move_hinh_text/files/easy.js"></SCRIPT>
<SCRIPT type=text/javascript charset=utf-8 src="banner_java_move_hinh_text/files/slider.js"></SCRIPT>
<SCRIPT type=text/javascript>
	<!-- THEM VAO -->
    
        function formatText(index, panel) {
		  return index + "";
	    }
    
        $(function () {
        
            $('.anythingSlider').anythingSlider({
                easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
                autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 3000,                    // How long between slide transitions in AutoPlay mode
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
<!-- THEM VAO -->
<DIV style="WIDTH: <?=$width;?>; HEIGHT: <?=$height;?>; CLEAR: both"><!-- SLIDE -->
<DIV class=anythingSlider>
<DIV class=wrapper>
<UL>
<?

	while($rs= mysql_fetch_array($result))
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
  style="BACKGROUND-IMAGE: url(<?=$banner;?>); WIDTH: <?=$width;?>; HEIGHT: <?=$height;?>; BACKGROUND-REPEAT: no-repeat;">
  <DIV style="WIDTH: <?=$width;?>; HEIGHT: <?=$height;?>; CLEAR: both"></DIV>
  <DIV class=bg_textxml>
  <DIV class=text_xml_1><A 
  href="http://bam.vn/WebShow/NewsDetail.aspx?catId=daf02c0c-116f-4f25-b374-06b33d7ccaff&amp;newsId=e2190e93-0ab9-4604-88ee-243340527786">Mang 
  thai</A></DIV>
  <DIV class=text_xml_title><?=$tieu_de;?></DIV>
  <DIV class=text_xml><?=$ghi_chu;?></DIV></DIV></DIV></DIV></LI>
	 <? 
	  } 
	?>

</UL></DIV></DIV>
<!-- SLIDE --></DIV>
<? }?>