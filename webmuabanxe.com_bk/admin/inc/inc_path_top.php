<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
	$cat=$HTTP_GET_VARS["cat"]; 
	$bac=1;
	if(isset($HTTP_GET_VARS["bac"])&&$HTTP_GET_VARS["bac"]>0&&$HTTP_GET_VARS["bac"]<=5)
		$bac=$HTTP_GET_VARS["bac"]; 
		
	if(isset($HTTP_GET_VARS["lg"]))
	{
		$lg = $HTTP_GET_VARS["lg"];
	}		
	echo"<a href=\"index.php?cat=0&bac=$bac&alpha=All&start=0&lg=$lg\"><img src=\"images/home.gif\" border=0> Index</a>";
							echo " » ";
							switch($bac){
								case "1":
									$trang=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang");
									$page=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view");
									$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
									$thu_tu=max_id("$tb","thu_tu")+1;
									
									echo "<a href=\"$page?cat=$cat&bac=1&lg=$lg&start=0\">";
									echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
									echo "</a> ";
									break;
								case "2":
									$trang=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"trang");
									$page=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view");
									$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
									$thu_tu=max_id("$tb","thu_tu")+1;

									$ma_bac_1=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ma_bac_1");
									echo " <a href=\"index_2.php?cat=$ma_bac_1&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
									echo "</a> » ";

									echo "<a href=\"$page?cat=$cat&bac=2&lg=$lg&start=0\">";
									echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ten_$lg");
									echo "</a>";
									break;
								case "3":
									$trang=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"trang");
									$page=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view");
									$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
									$thu_tu=max_id("$tb","thu_tu")+1;
									
									$ma_bac_1=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_1");
									$ma_bac_2=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_2");
									
									echo "<a href='index_2.php?cat=$ma_bac_1&alpha=All&start=0'>";
									echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href='index_3.php?cat=$ma_bac_2&alpha=All&start=0'>";
									echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"$page?cat=$cat&bac=3&lg=$lg&start=0\">";
									echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ten_$lg");
									echo "</a>";
									break;
								case "4":
									$trang=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"trang");
									$page=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view");
									$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
									$thu_tu=max_id("$tb","thu_tu")+1;
									
									$ma_bac_1=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_1");
									$ma_bac_2=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_2");
									$ma_bac_3=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_3");									
																	
									echo "<a href=\"index_2.php?cat=$ma_bac_1&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"index_3.php?cat=$ma_bac_2&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"index_4.php?cat=$ma_bac_3&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$ma_bac_3,"ten_$lg");
									echo "</a> » ";

									echo "<a href=\"$page?cat=$cat&bac=4&lg=$lg&start=0\">";
									echo gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ten_$lg");
									echo "</a>";
									break;
								case "5":
									$trang=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"trang");
									$page=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view");
									$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
									$thu_tu=max_id("$tb","thu_tu")+1;
								
									$ma_bac_1=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_1");
									$ma_bac_2=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_2");
									$ma_bac_3=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_3");	
									$ma_bac_4=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_4");									
																		

									echo "<a href=\"index_2.php?cat=$ma_bac_1&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"index_3.php?cat=$ma_bac_2&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"index_4.php?cat=$ma_bac_3&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$ma_bac_3,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"index_5.php?cat=$ma_bac_4&bac=5&alpha=All&start=0\">";
									echo gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$ma_bac_4,"ten_$lg");
									echo "</a> » ";
									
									echo "<a href=\"$page?cat=$cat&bac=5&lg=$lg&start=0\">";
									echo gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ten_$lg");
									echo "</a>";
									
									break;
								default:
									break;
							}

?>