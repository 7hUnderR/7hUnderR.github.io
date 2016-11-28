<?
if(strstr($qr,"text_search"))
{
	if(strstr($qr,"Acat")){
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	$cat_s=0;
	if(isset($HTTP_GET_VARS["Acat"]))
	   $cat=$HTTP_GET_VARS["Acat"];
	else
	   $cat=1;
	$cat = str_replace("\'","",$cat);
	//$cat = $cat);
	}
	if(strstr($qr,"Bcat")){
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	if(isset($_GET["Bcat"]))
	   $cat_s=$HTTP_GET_VARS["Bcat"];
	else
	   $cat_s=1;
	$cat_s = str_replace("\'","",$cat_s);
	if($cat_s==0)
	   $cat=gia_tri_mot_cot("tb_bac_1","trang",1,"ma_bac_1");
	else
	   $cat=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ma_bac_1");
	}
}
else
{
	if(($qr=="")||($qr=="lg=vn")||($qr=="lg=eg"))
	{
	$cat=1;
	$cat_s=0;
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	}
	else
	{
	
	if(strstr($qr,"lg"))
	{
	$cat_s=0;
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	$cat=1;
	}
	if(strstr($qr,"Acat"))
	{
	$cat_s=0;
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	if(isset($HTTP_GET_VARS["Acat"]))
	   $cat=$HTTP_GET_VARS["Acat"];
	else
	   $cat=1;
    $cat = str_replace("\'","",$cat);
	//echo"HAHA: $cat";
	}
	if(strstr($qr,"Bcat"))
	{
	$cat_s_s=0;
	$cat_s_s_s=0;
	$cat_s_s_s_s=0;
	if(isset($HTTP_GET_VARS["Bcat"]))
	   $cat_s=$HTTP_GET_VARS["Bcat"];
	else
	   $cat_s=1;
	$cat_s = str_replace("\'","",$cat_s);
	$cat=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ma_bac_1");
	}
	if(strstr($qr,"Ccat")){
	$cat_s_s_s_s=0;
	$cat_s_s_s=0;
	if(isset($HTTP_GET_VARS["Ccat"]))
	   $cat_s_s=$HTTP_GET_VARS["Ccat"];
	else
	   $cat_s_s=1;
	$cat_s_s = str_replace("\'","",$cat_s_s);
	$cat_s=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ma_bac_2");
	$cat=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ma_bac_1");
	}
	if(strstr($qr,"Dcat"))
	{
	$cat_s_s_s_s=0;
	if(isset($HTTP_GET_VARS["Dcat"]))
	   $cat_s_s_s=$HTTP_GET_VARS["Dcat"];
	else
	   $cat_s_s_s=1;
	$cat_s_s_s = str_replace("\'","",$cat_s_s_s);
	$cat_s_s=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ma_bac_3");
	$cat_s=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ma_bac_2");
	$cat=gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ma_bac_1");
	}
	if(strstr($qr,"Ecat"))
	{
	if(isset($HTTP_GET_VARS["Ecat"]))
	   $cat_s_s_s_s=$HTTP_GET_VARS["Ecat"];
	else
	   $cat_s_s_s_s=1;

	$cat_s_s_s=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ma_bac_4");
	$cat_s_s=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ma_bac_3");
	$cat_s=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ma_bac_2");
	$cat=gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ma_bac_1");
	}

	if(strstr($qr,"id_p"))
	  {
		  if(strstr($qr,"id_pcompanyv"))
		  {	
			if(isset($HTTP_GET_VARS["id_pcompanyv"]))
			   $id=$HTTP_GET_VARS["id_pcompanyv"];
			else
			   $id=1;
			$tb_detail="tb_account";
			$qr_page = "pcompanyv";
		  }
		  if(strstr($qr,"id_pproductv"))
		  {	
			if(isset($HTTP_GET_VARS["id_pproductv"]))
			   $id=$HTTP_GET_VARS["id_pproductv"];
			else
			   $id=1;
			$tb_detail="tb_product";
			$qr_page = "pproductv";			
		  }
		  if(strstr($qr,"id_pnewsv"))
		  {	
			if(isset($HTTP_GET_VARS["id_pnewsv"]))
			   $id=$HTTP_GET_VARS["id_pnewsv"];
			else
			   $id=1;
		   $tb_detail="tb_news";
		   $qr_page = "pnewsv";		   
		  }
		  
			$cat_s_s_s_s=gia_tri_mot_cot("$tb_detail","id",$id,"ma_bac_5");
			$cat_s_s_s=gia_tri_mot_cot("$tb_detail","id",$id,"ma_bac_4");
			$cat_s_s=gia_tri_mot_cot("$tb_detail","id",$id,"ma_bac_3");
			$cat_s=gia_tri_mot_cot("$tb_detail","id",$id,"ma_bac_2");
			$cat=gia_tri_mot_cot("$tb_detail","id",$id,"ma_bac_1");
		  }
      }
}
	$start=0;
	if(isset($HTTP_GET_VARS["start"]))
	   $start=$HTTP_GET_VARS["start"];

	if(la_so($start)!=1)
	   $start=0;
	if(la_so($cat)!=1)
		$id=1;
	if(la_so($id)!=1)
		$id=1;
?>