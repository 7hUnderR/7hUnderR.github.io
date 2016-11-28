	<div id="ddtabs" class="menu">
	<ul>
		<? 
		$num_=0;
		$i=0;
		$query = "Select * FROM  tb_bac_1 where trang in ('1','2','3','4','6','32','30','18','19','47','31','82') and activate=1 and activate_setup=1 order by thu_tu ASC";
		$result = mysql_query($query);
		$num_ = mysql_num_rows($result); 
		while($rs= mysql_fetch_array($result))
		{
			$i++;
			$ma_bac_1=$rs["ma_bac_1"];
			$ten_dv=$rs["mo_ta_$lg"];
			if($ma_bac_1==$cat)
			   $tab_select=$i;
			$num=dem_max_3dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"activate_setup",1);
			
			if($num>0)
			{
			  $ma_bac_2=gia_tri_mot_cot_2dk("tb_bac_2","ma_bac_1",$ma_bac_1,"activate",1,"ma_bac_2");
			  $link="./?Bcat=$ma_bac_2&lg=$lg&start=0";
			  $tab="rel=\"gc$i\"";
			}
			else
			{
			     $link="./?Acat=$ma_bac_1&lg=$lg&start=0";
				 $tab="";
			}
		  $class="";
		  if($rs["trang"]==1)
			 {
			 $link="./";
			 }
			?>
			<li><? echo"<a href=\"$link\"  $tab ><span>$ten_dv</span></a>"; ?></li><u class=menu_center ><b></b></u>
			<?
			}
			?>	<?
		$i=0;
		$query = "Select * FROM  tb_bac_1 where trang in ('1','2','3','4','32','30','18','19','47','31','82') and activate=1 and activate_setup=1 order by thu_tu ASC";
		$result = mysql_query($query);
		$num_ = mysql_num_rows($result); 
		while($rs= mysql_fetch_array($result))
		{			
			$i++;
			$ma_bac_1=$rs["ma_bac_1"];
			$query_s = "Select * FROM  tb_bac_2 where ma_bac_1='$ma_bac_1' and ma_bac_1!='1' and activate=1 and activate_setup=1 order by thu_tu ASC";
			$result_s = mysql_query($query_s);
			$num_ = mysql_num_rows($result_s); 
			echo "<div id=\"gc$i\"></div>";
		}
	?></ul></div>
<script type="text/javascript" src="menu_css/menu.js"></script>
<script type="text/javascript">
ddtabmenu.definemenu("ddtabs", <?=$tab_select-1?>) 
</script>