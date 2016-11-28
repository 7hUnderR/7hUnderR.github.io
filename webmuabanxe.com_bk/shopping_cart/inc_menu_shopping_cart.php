<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<span class="text_menu_shopping">
<? 		
	$dem=0;
	$myLength = strlen($cart);
	for ( $i = 0; $i < $myLength; ++$i )
		{   
			$ch = $cart{$i};
			if($ch==",") $dem++;
		}
    if($dem>1)
		$dem=$dem-1;
	 
    //echo "[ $dem ] "; 
	$num_=0;
	$shopping=gia_tri_mot_cot("tb_bac_1","trang",65,"ma_bac_1");
	$i=0;
	$query = "Select * FROM  tb_bac_2 where ma_bac_1=$shopping and trang in ('69','75') and activate_setup=1 order by thu_tu ASC";
	$result = mysql_query($query);
	$num_ = mysql_num_rows($result); 
	while($rs= mysql_fetch_array($result))
	{
	$i++;
	$ma_bac_2=$rs["ma_bac_2"];
	$ten_dv=$rs["ten_$lg"];
	$link="./?Bcat=$ma_bac_2&lg=$lg&start=0";
	
	if($i==1)
	  $images="cart.gif";
	else
	  $images="del_cart.gif";
	  
	if($i==$num_)
	{
	echo"<a href=$link ><img align=\"absmiddle\" src=\"styles/$style_path/$images\" border=\"0\"/> $ten_dv</a> ";
	}
	else
	{
	echo"<a href=$link ><img align=\"absmiddle\" src=\"styles/$style_path/$images\" border=\"0\"/> $ten_dv</a> ";
	}
	}
	?>
</span>