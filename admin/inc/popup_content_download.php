<? include("banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
		<!--DWLayoutTable-->
		<SCRIPT src="popupImg.js"></SCRIPT>
		<script language="JavaScript" type="text/JavaScript">
		<!--
		function MM_openBrWindow(theURL,winName,features) { //v2.0
		window.open(theURL,winName,features);
		}
		//-->
		</script>
		 <? 
		$id=$HTTP_GET_VARS["id"]; 
		$lg=$HTTP_GET_VARS["lg"];
		
		$query = "Select * FROM  tb_news where id=$id ";							
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
	    
		$ten=$rs["ten_$lg"];
		$ghi_chu=$rs["ghi_chu_$lg"];
		$noidung=$rs["mo_ta_$lg"];
		if($rs["anh_nho"]!="")  
		$anh_nho="<a onclick=\"javascript: popupImage('../../images/photo/news/$rs[anh_nho]')\" href=\"#\"><img src=\"../../images/photo/news/$rs[anh_nho]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho="";
		
		if($rs["anh_nho_1"]!="")  
		$anh_nho_1="<a onclick=\"javascript: popupImage('../../images/photo/news/$rs[anh_nho_1]')\" href=\"#\"><img src=\"../../images/photo/news/$rs[anh_nho_1]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho_1="";
			
		if($rs["anh_nho_2"]!="")  
		$anh_nho_2="<a onclick=\"javascript: popupImage('../../images/photo/news/$rs[anh_nho_2]')\" href=\"#\"><img src=\"../../images/photo/news/$rs[anh_nho_2]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho_2="";

		if($rs["anh"]!="") 
			{
				$anh="<a href=\"../../images/photo/news/$rs[anh]\"><img src=\"../images/download.gif\" border=0></a>";
				$title_anh=$view_item_images;
			}
			else
			{
			$anh="";
			$title_anh=$view_item_images;
			}
			
		$nguoi_viet=gia_tri_mot_cot("tb_admin","ma_user",$rs["nguoi_viet"],"user");
 	   ?>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_tieude?></span></td>
	<td width="798" align="left" valign="middle" class="line_bottom"><?=$ten?>&nbsp;</td>
    </tr>
	      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_short_content?></span></td>
	<td align="left" valign="middle" class="line_bottom"><?=$ghi_chu?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_small_images?></span></td>
	<td align="left" valign="middle" class="line_bottom"><?=$anh_nho?></td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_files?></span></td>
	<td align="left" valign="middle" class="line_bottom"><?=$anh?></td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_link?></span></td>
	<td align="left" valign="middle" class="line_bottom"><?=$noidung?></td>
    </tr>
    	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    	    <td height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5">
    	      <?=$view_item_key_word?>
    	    </span></td>
    	    <td align="left" valign="middle" class="line_bottom"><?=$rs["key_word_$lg"]?></td>
  	    </tr>
    	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_poster?></span></td>
	<td align="left" valign="middle" class="line_bottom"><? echo"[ $nguoi_viet ] [ $rs[ngay], $rs[gio] ]"; ?></td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_tieu_biet?></span></td>
	<td align="left" valign="middle" class="line_bottom"><? if($rs["ngoai_index"]==1) echo"<span class=dot_xanh>ON</span>"; else echo"<span class=dot_do>OFF</span>"; ?></td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_quyen_2?></span></td>
	<td align="left" valign="middle" class="line_bottom"><? if($rs["activate_"]==1) echo"<span class=dot_xanh>ON</span>"; else echo"<span class=dot_do>OFF</span>"; ?></td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_quyen_1?></span></td>
	<td align="left" valign="middle" class="line_bottom"><? if($rs["activate"]==1) echo"<span class=dot_xanh>ON</span>"; else echo"<span class=dot_do>OFF</span>"; ?></td>
    </tr>
	<tr align="center" valign="middle" bgcolor="#EFEFEF" class="bg_all"> 
	  <td height="32" colspan="2" valign="middle"><input name="button" type=button class="nut_nhan" onClick="javascript:self.close();" value="Close Window"></td>
	</tr>
</table>
<? include("bottom.php")?>