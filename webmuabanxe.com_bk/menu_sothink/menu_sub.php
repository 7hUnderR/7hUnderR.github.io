	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script language="javascript">
	stm_bm(["menu63b0",430,"","blank.gif",0,"","",0,0,0,0,20,1,0,0,"","",0],this);
	stm_bp("p0",[0,4,0,5,0,0,0,0,100,"",-2,"",-2,50,0,0,"#fffff7","transparent","",3,0,0,"#000000"]);
	<?
	$i=0;
	$query = "Select * FROM  tb_bac_2 where ma_bac_2 = $ma_bac_2_catalog_root and activate=1 order by thu_tu ASC ";
	$result = mysql_query($query);
	$num_menu = mysql_num_rows($result);
	while($rs= mysql_fetch_array($result))
	{
	$ten=$rs["ten_$lg"];
	$ma_bac_2=$rs["ma_bac_2"];
	$link="./?Bcat=$rs[ma_bac_2]&lg=$lg&start=0";
	?>
	stm_ai("p0i<?=$i?>",[0,"<?=$ten?>   ","","",-1,-1,0,"<?=$link?>","_self","","","","",0,0,0,"","",0,0,0,0,1,"#58ad45",1,"#ffe500",1,"","",3,3,0,0,"#CCCCCC","#e3b73d","#ffffff","#FF6600","bold 11px arial","bold 11px arial",0,0]);
	stm_bpx("p1","p0",[1,2,0,0,2,3,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.60)",4,50,0,0,"#3399ff","#fffff7"]);
	
	<?
	$j=0;
	$result_=select_co_2dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate",1,"thu_tu","ASC");
	while($rs_= mysql_fetch_array($result_))
	{
	$ma_bac_3=$rs_["ma_bac_3"];
	$ten_ct=$rs_["ten_$lg"];
	$num=dem_max_2dk("tb_bac_4","ma_bac_3",$ma_bac_3,"activate",1);
	if($num>0)
	  {
		$ma_bac_4=gia_tri_mot_cot("tb_bac_4","ma_bac_3",$ma_bac_3,"ma_bac_4");
		$link="./?Dcat=$ma_bac_4&lg=$lg&start=0";
	  }
	else
	$link="./?Ccat=$rs_[ma_bac_3]&lg=$lg&start=0";
	?>
		stm_aix("p2i<?=$j?>","p0i0",[0,"  <?=$ten_ct?>  ","","",-1,-1,0,"<?=$link?>","_self","","","","",0,0,0,"","",0,0,0,0,1,"#e6e6e6",0,"#0860a8",0,"","",3,3,0,0,"#fffff7","#ffffff","#000000","#ffffff"]);
		stm_bpx("p3","p1",[1,2,0,0,1,1,0,0,100,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=forward,enabled=0,Duration=0.60)",5,"progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=1,motion=reverse,enabled=0,Duration=0.60)",4,50,0,0,"#3399ff","#fffff7"]);
			<?
			$k=0;
			$result__=select_co_2dk("tb_bac_4","ma_bac_3",$ma_bac_3,"activate",1,"thu_tu","ASC");
			while($rs__= mysql_fetch_array($result__))
			{
			$ten_dv_ct_s=$rs__["ten_$lg"];
			$link="./?Dcat=$rs__[ma_bac_4]&lg=$lg&start=0";
			?>
			stm_aix("p3i<?=$k?>","p0i0",[0,"  <?=$ten_dv_ct_s?>  ","","",-1,-1,0,"<?=$link?>","_self","","","","",1,1,0,"","",0,0,0,0,1,"#22c7ff",0,"#aae8ff",0,"","",3,3,0,0,"#fffff7","#ffffff"]);
			<? $k++; } ?>
		stm_ep();
		<? $j++; }  ?>
	<? $i++;
	 } ?>
	stm_em();
	</script>