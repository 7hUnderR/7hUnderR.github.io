<?
	if( ($cat!=0) && ($cat_s==0))
		 $title=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
	if(($cat_s!=0)&& ($cat_s_s==0))
		 $title=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
	if(($cat_s_s!=0) && ($cat_s_s_s==0))
		 $title=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
	if(($cat_s_s_s!=0 && $cat_s_s_s_s==0))
		 $title=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg");
	if( $cat_s_s_s_s!=0)
		 $title=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ten_$lg");
  	echo $title;
?>