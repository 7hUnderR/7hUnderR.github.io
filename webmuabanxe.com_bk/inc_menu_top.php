<?
	$num_=0;
	$i=0;
	$query = "Select * FROM  tb_bac_1 where trang in ('1','6','7') and activate=1 and activate_setup=1 order by thu_tu ASC";
	$result = mysql_query($query);
	$num_ = mysql_num_rows($result); 
	while($rs= mysql_fetch_array($result))
	{
	$i++;
	$ma_bac_1=$rs["ma_bac_1"];
	$ten_dv=$rs["ten_$lg"];
	
	$query_num = "Select * FROM  tb_bac_2 where ma_bac_1=$ma_bac_1 and ma_bac_1!=1 and activate=1 and activate_setup=1";
	$result_num = mysql_query($query_num);
	$num=mysql_num_rows($result_num);
	
	if($num>0)
	{
	$ma_bac_2=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"ma_bac_2");
	$num__=dem_max_3dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate",1,"activate_setup",1);
	if($num__==0)
	$link="./?Bcat=$ma_bac_2&lg=$lg&start=0";
	else
	{
	$ma_bac_3=gia_tri_mot_cot_2dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate",1,"ma_bac_3");
	$link="./?Ccat=$ma_bac_3&lg=$lg&start=0";
	}
	}
	else
	{
	$link="./?Acat=$ma_bac_1&lg=$lg&start=0";
	}
	
	if($i==$num_)
	{
	echo"<a href=$link >$ten_dv</a> ";
	}
	else
	{
	echo"<a href=$link >$ten_dv</a> | ";
	}
	}
	?>