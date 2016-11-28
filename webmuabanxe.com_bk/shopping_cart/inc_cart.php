<?
 $trang_here=65;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="block_7_center">
  <tr>
    <td height="27" valign="top" class="block_7_bottom" ><table class="block_7_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		<tbody>
		  <tr>
			<td valign="middle" class="tab_8_8 block_7_title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"ten_$lg")?></td>
		  </tr>
		  <tr>
			<td class="tab_5_5_5_5 text_def" align="center"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
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
	?>
	<tr>
	  <td width="20%" align="center"><? echo"<a href=$link ><img align=\"absmiddle\" src=\"styles/$style_path/$images\" border=\"0\"/></a>";?></td>
      <td width="80%" height="25" class="text_menu_shopping"><? echo"<a href=$link >$ten_dv</a> ";?></td>
      </tr>
	<? } ?>
  </table></td>
		  </tr>
		</tbody>
</table>
</td>
  </tr>
</table>
<table width="168" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif" ></td>
  </tr>
</table>
 <?php } ?>