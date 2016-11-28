<?
 $trang_here=86;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
?>
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tieu_de"><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		  <tr>
			<td align="left" style="padding-top: 3px;">
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <? 
				  $ma_weblink=gia_tri_mot_cot("tb_bac_2","trang","$trang_here","ma_bac_2");
				  $result=select_co_2dk("tb_news","ma_bac_2","$ma_weblink","activate",1,"thu_tu","ASC");
				  while($rs= mysql_fetch_array($result)) 
					{?>
				<tr>
				<td style="padding-bottom: 5px;" valign="middle" align="left" class="weblink"><a href="<?=$rs["ghi_chu_$lg"]?>" target="<?=$rs["target_$lg"]?>"><?=$rs["ten_$lg"]?></a>
				</td>
			  </tr>
  <? }?>
</table></td>
		  </tr>
</table>
<? } ?>