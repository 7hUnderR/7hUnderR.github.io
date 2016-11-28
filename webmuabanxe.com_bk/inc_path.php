<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TR>
                      <TD valign="middle" class="title_page"><? include("inc_title_text_all.php"); ?></TD>
                      </TR>
                    <TR>
                      <TD height="25" align="left" class="path"><?
		if(gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"trang")!=1)
		{
			$home=gia_tri_mot_cot("tb_bac_1","trang",1,"ten_$lg");
			$home_ma=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
			echo"<a href=\"./?Acat=$home_ma&lg=$lg&start=0\">$home</a> &raquo; ";
        }
		$ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
		 if(($cat_s==0)&&($cat!=0))
		 {
		 echo "<a href=\"./?Acat=$cat&lg=$lg&start=0\">$ten_ma_bac_1</a> &raquo;";
		 }
		 
		 if(($cat_s_s==0)&&($cat_s!=0))
		 {
		 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
		 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
		 echo"$ten_ma_bac_1 &raquo; <a href=\"./?Bcat=$cat_s&start=0&lg=$lg\">$ten_dv_tp</a> ";
		 }
		 if(($cat_s_s_s==0)&&($cat_s_s!=0))
		 {
		 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
		 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
		 $ten_dv_ct=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
		 echo"$ten_ma_bac_1 &raquo; $ten_dv_tp &raquo; <a href=\"./?Ccat=$cat_s_s&start=0&lg=$lg\">$ten_dv_ct</a>";
		 }
		 
		 if(($cat_s_s_s_s==0)&&($cat_s_s_s!=0))
		 {
		 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
		 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
		 $ten_dv_ct=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
		 $ten_dv_ct_s=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg");
		 echo"$ten_ma_bac_1 &raquo; $ten_dv_tp &raquo; $ten_dv_ct &raquo; <a href=\"./?Dcat=$cat_s_s_s&start=0&lg=$lg\">$ten_dv_ct_s</a>";
		 }

		?></TD>
                    </TR></TABLE>
