<?
 $trang_here=76;
 if(gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"activate")==1)
 {
?>
<link href="shopping_cart/style.css" rel="stylesheet" type="text/css" />

  		<table class="block_1" cellspacing=0 cellpadding=0 
		width="100%" border=0>
		<tbody>
		  <tr>
			<td width="90%" valign="middle"><div class=title><?=gia_tri_mot_cot("tb_bac_2","trang",$trang_here,"ten_$lg")?></div></td>
			<td width="10%" valign="middle"><img 
			id=AdDangNhap style="CURSOR: pointer" 
			onClick=SetViewTableDiv(this.id); alt="" 
			src="styles/<?=$style_path?>/AdImgUp.gif" border=0></td>
		  </tr>
		  <tr>
			<td colspan=2 class="tab_5_5_5_5 text_def"><div id=AdDangNhapLoc style="DISPLAY: block"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="bg_login">
<tr>
    <td height="18" align="left" valign="middle" class="text_register" style="padding-left:5px;"><? echo"Welcome: "; echo "<b>$ten_dang_nhap</b>";?></td>
  </tr>
  
  <tr>
    <td height="18" align="left" valign="middle" class="text_register" style="padding-left:10px;"><a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",66,"ma_bac_2");?>&lg=<?=$lg?>&start=0">+
        <?=gia_tri_mot_cot("tb_bac_2","trang",66,"ten_$lg");?>
    </a></td>
  </tr>
  
  <tr>
    <td height="18" align="left" valign="middle" class="text_register" style="padding-left:10px;"><a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",73,"ma_bac_2");?>&lg=<?=$lg?>&start=0">+
        <?=gia_tri_mot_cot("tb_bac_2","trang",73,"ten_$lg");?>
    </a></td>
  </tr>
  
  <tr>
    <td height="18" align="left" valign="middle" class="text_register" style="padding-left:10px;"><a href="./?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",74,"ma_bac_2");?>&lg=<?=$lg?>&start=0">+
        <?=gia_tri_mot_cot("tb_bac_2","trang",74,"ten_$lg");?>
    </a></td>
  </tr>
</table>
			</div></td>
		  </tr>
		</tbody>
</table>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td ><img height=8 alt="" src="images/spacer.gif" width=176></td>
	      </tr>
		</table>
 <?php } ?>
