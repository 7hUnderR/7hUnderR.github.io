	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?
			echo "» ";
			switch($bac){
				case "1":
					echo " <a href=\"index.php?cat=$cat&bac=$bac&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
					echo "</a> ";
					break;
				case "2":
					$ma_bac_1=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ma_bac_1");
					
					echo " <a href=\"index_2.php?cat=$ma_bac_1&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
					echo "</a> » ";

					echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ten_$lg");
					echo "";
					break;
				case "3":
					$ma_bac_1=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_1");
					$ma_bac_2=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_2");
					
					echo " <a href=\"index_2.php?cat=$ma_bac_1&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
					echo "</a> » ";
					
					echo " <a href=\"index_3.php?cat=$ma_bac_2&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
					echo "</a> » ";
					
					echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ten_$lg");
					echo "";
					break;
				case "4":
					$ma_bac_1=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_1");
					$ma_bac_2=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_2");
					$ma_bac_3=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_3");									
					$ma_bac_4=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_4");									
													
					echo " <a href=\"index_2.php?cat=$ma_bac_1&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
					echo "</a> » ";
					
					echo " <a href=\"index_3.php?cat=$ma_bac_2&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
					echo "</a> » ";
					
					echo " <a href=\"index_4.php?cat=$ma_bac_3&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$ma_bac_3,"ten_$lg");
					echo "</a> » ";

					echo gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ten_$lg");
					echo "";
					break;
				case "5":
					$ma_bac_1=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_1");
					$ma_bac_2=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_2");
					$ma_bac_3=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_3");	
					$ma_bac_4=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_4");									
														

					echo " <a href=\"index_2.php?cat=$ma_bac_1&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_1","ma_bac_1",$ma_bac_1,"ten_$lg");
					echo "</a> » ";
					
					echo " <a href=\"index_3.php?cat=$ma_bac_2&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_2","ma_bac_2",$ma_bac_2,"ten_$lg");
					echo "</a> »";
					
					echo " <a href=\"index_4.php?cat=$ma_bac_3&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_3","ma_bac_3",$ma_bac_3,"ten_$lg");
					echo "</a> » ";
					
					echo "<a href=\"index_5.php?cat=$ma_bac_4&lg=$lg&alpha=All&start=0\">";
					echo gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$ma_bac_4,"ten_$lg");
					echo "</a> » ";

					echo gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ten_$lg");
					echo "";
					
					break;
				default:
					break;
			}
	?>