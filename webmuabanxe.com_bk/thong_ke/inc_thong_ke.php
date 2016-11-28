<?
 $trang_here=36;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>	<table class="block_1_top" cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="tab_8_8 block_1_title"><?=gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"mo_ta_$lg");?></td>
		  </tr>
		  <tr>
			<td valign="top" class="block_1_center tab_8_8_8_8">
				<? include("thong_ke/dem_online/dem_session.php"); ?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				  
				  <tr>
					<td height="20" align="center" valign="middle" class="tab_5_5"><? 
					if($lg=="vn")
					echo "Lượt truy cập:";
					else
					echo "Visitors:";
					?></td>
				  </tr>
				  
				  <tr>
				    <td height="20" align="center" valign="middle" class="tab_5_5"><? echo "<b>$dtc</b>"; ?></td>
			      </tr>
				  <tr>
				    <td height="20" align="center" valign="middle" class="tab_5_5"><?
					if($lg=="vn")
					 echo "Khách Online:";
					else
					 echo "Customer Online:";
					?></td>
			      </tr>
				  <tr>
					<td height="20" align="center" valign="middle" class="tab_5_5"><? /*$online=$online+325;*/ echo "<b>$online </b>"; ?></td>
				  </tr>
			  </table></td>
		  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td ><img height=8 alt="" src="images/spacer.gif"></td>
  </tr>
</table>
<? } ?>