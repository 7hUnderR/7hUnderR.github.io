<?
	if(strstr($qr,"id_p"))
		{
		 if(strstr($qr,"id_pnewsv"))
			include("inc_detail_news.php"); // news detail
		 if(strstr($qr,"id_pproductv"))	
			include("product_tab/inc_detail_product_tab.php");
			
			//include("product/inc_detail_product_gallery.php"); // news detail
		}
	else
	{
	   
		if( ($cat!=0) && ($cat_s==0))
			$trang=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang");
		if(($cat_s!=0) && ($cat_s_s==0))
			$trang=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"trang");
		if(($cat_s_s!=0) && ($cat_s_s_s==0))
			$trang=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"trang");
		if(($cat_s_s_s!=0 && $cat_s_s_s_s==0))
			$trang=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"trang");
		if(($cat_s_s_s!=0) && ($cat_s_s_s_s!=0))
			$trang=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"trang");

	   $file_center=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"file_view_web");   
	   include("$file_center");    
	}
	//echo $file_center;
	?>