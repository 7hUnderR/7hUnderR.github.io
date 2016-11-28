<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<span class="text_menu_login">
<? 		
	$num_=0;
	$shopping=gia_tri_mot_cot("tb_bac_1","trang",63,"ma_bac_1");
	$i=0;
	$query = "Select * FROM  tb_bac_2 where ma_bac_1=$shopping and trang in ('67','73') and activate_setup=1 order by thu_tu ASC";
	$result = mysql_query($query);
	$num_ = mysql_num_rows($result); 
	while($rs= mysql_fetch_array($result))
	{
	$i++;
	$ma_bac_2=$rs["ma_bac_2"];
	$ten_dv=$rs["ten_$lg"];
	$link="./?Bcat=$ma_bac_2&lg=$lg&start=0";
	
	
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
	<? 		
	echo "Welcome <b>$ten_dang_nhap</b> | "; 
	$num_=0;
	$shopping=gia_tri_mot_cot("tb_bac_1","trang",133,"ma_bac_1");
	$i=0;
	$query = "Select * FROM  tb_bac_2 where ma_bac_1=$shopping and trang in ('79','82','153') and activate_setup=1 order by thu_tu ASC";
	$result = mysql_query($query);
	$num_ = mysql_num_rows($result); 
	while($rs= mysql_fetch_array($result))
	{
	$i++;
	$ma_bac_2=$rs["ma_bac_2"];
	$ten_dv=$rs["ten_$lg"];
	$link="./?Bcat=$ma_bac_2&lg=$lg&start=0";
	
	
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
	</span>