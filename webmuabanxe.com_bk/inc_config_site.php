<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
<?
 $query = "Select * FROM  tb_config_site ";
 $result = mysql_query($query);
 $rs= mysql_fetch_array($result);
	$project_title=$rs["project_title_$lg"];
	$project_url=$rs["project_url"];
	$project_keywork=$rs["project_keywork"];
	$project_search_engines=$rs["project_search_engines"];
	$project_description=$rs["project_description"];
	$project_copyright=$rs["project_copyright_$lg"];
	$project_email=$rs["project_email"];
	$project_email_2=$rs["project_email_2"];
	$project_visitors=$rs["project_visitors"];
	$project_tien=$rs["project_tien_$lg"];

 $query = "Select * FROM  tb_style_site where su_dung=1 and activate =1 ";
 $result = mysql_query($query);
 $rs= mysql_fetch_array($result);
	
	$style=$rs["ten_files"];
	$style_path=str_replace("/".$rs["ten_files_"],"",$style);
 
 
	if(strstr($qr,"id_p"))
		  {
		      $project_title=gia_tri_mot_cot($tb_detail,"id",$id,"ten_$lg"); 
		  }
	else
	      {
			 if($qr!="")
			 {
			 if(($cat_s==0)&&($cat!=0))
			 {
			 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
			 $project_title="$ten_ma_bac_1";
			 }
			 
			 if(($cat_s_s==0)&&($cat_s!=0))
			 {
			 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
			 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
			 $project_title="$ten_ma_bac_1 / $ten_dv_tp ";
			 }
			 if(($cat_s_s_s==0)&&($cat_s_s!=0))
			 {
			 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
			 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
			 $ten_dv_ct=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
			 $project_title="$ten_ma_bac_1 / $ten_dv_tp / $ten_dv_ct";
			 }
			 
			 if(($cat_s_s_s_s==0)&&($cat_s_s_s!=0))
			 {
			 $ten_ma_bac_1=gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg");
			 $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
			 $ten_dv_ct=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
			 $ten_dv_ct_s=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg");
			  $project_title="$ten_ma_bac_1 / $ten_dv_tp / $ten_dv_ct / $ten_dv_ct_s";
			 }
			 }
		  }

 
 if($lg=="vn")
 {
 $xem_tat_ca="Xem tất cả";
 $xem_chi_tiet="Xem chi tiết";
 }
 else
 {
 $xem_tat_ca="View all";
 $xem_chi_tiet="View detail";
 }
 
?>