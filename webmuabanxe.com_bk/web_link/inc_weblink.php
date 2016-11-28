<?
 $trang_here=28;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="block_7_center">
  <tr>
    <td height="27" valign="top" class="block_7_bottom" ><table class="block_7_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		<tbody>
		  <tr>
			<td valign="middle" class="tab_8_8 block_7_title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"mo_ta_$lg")?></td>
		  </tr>
		  <tr>
			<td class="tab_5_5_5_5 text_def"><div id=AdWeblinkLoc style="DISPLAY: block"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="2">
							    <tr>
                                  <td height="20" valign="middle" align="center"><select name="trang" onChange="window.open(this.value,'_blank')" class="select" id="trang" style="width: 165px;">
  <option value="./"><?=gia_tri_mot_cot("tb_bac_1","trang","28","ten_$lg");?></option>
  <? 
  $ma_weblink=gia_tri_mot_cot("tb_bac_1","trang","28","ma_bac_1");
  $result=select_co_2dk("tb_news","ma_bac_1",$ma_weblink,"activate",1,"thu_tu","ASC");
  while($rs= mysql_fetch_array($result)) 
	{?>
  <option value="<?=$rs["ghi_chu_$lg"]?>"><?=$rs["ten_$lg"]?></option>
  <? }?>
</select></td>
                                </tr>
                              </table></div></td>
		  </tr>
		</tbody>
</table>
</td>
  </tr>
</table>
<table width="168" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>
<? } ?>