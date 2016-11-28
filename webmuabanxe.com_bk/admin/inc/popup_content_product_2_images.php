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
		
		$query = "Select * FROM  tb_product where id=$id ";							
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
	    
		$ten=$rs["ten_$lg"];
		$ghi_chu=$rs["ghi_chu_$lg"];
		$noidung=$rs["mo_ta_$lg"];
		if($rs["anh_nho"]!="")  
		$anh_nho="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh_nho]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh_nho]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho="";
		
		if($rs["anh_nho_1"]!="")  
		$anh_nho_1="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh_nho_1]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh_nho_1]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho_1="";
			
		if($rs["anh_nho_2"]!="")  
		$anh_nho_2="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh_nho_2]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh_nho_2]\" width=\"50\" height=\"50\" border=0></a>";
		else
			$anh_nho_2="";

		if($rs["anh"]!="") 
			{
			if($rs["type"]==1)
			    {
			     $anh="<a href=\"../../images/photo/$rs[anh]\" target=_blank>$rs[anh]</a>";
			     $title_anh=$view_item_flash;
			    }
			else
				{
				$anh="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh]\" width=\"50\" height=\"50\" border=0></a>";
				$title_anh=$view_item_images;
				}
			}
			else
			{
			$anh="";
			$title_anh=$view_item_images;
			}
			
		if($rs["anh_1"]!="") 
			{
			if($rs["type"]==1)
			    {
			     $anh_1="<a href=\"../../images/photo/$rs[anh_1]\" target=_blank>$rs[anh_1]</a>";
			     $title_anh=$view_item_flash;
			    }
			else
				{
				$anh_1="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh_1]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh_1]\" width=\"50\" height=\"50\" border=0></a>";
				$title_anh=$view_item_images;
				}
			}
			else
			{
			$anh_1="";
			$title_anh=$view_item_images;
			}
			
		if($rs["anh_2"]!="") 
			{
			if($rs["type"]==1)
			    {
			     $anh_2="<a href=\"../../images/photo/$rs[anh_2]\" target=_blank>$rs[anh_2]</a>";
			     $title_anh=$view_item_flash;
			    }
			else
				{
				$anh_2="<a onclick=\"javascript: popupImage('../../images/photo/$rs[anh_2]')\" href=\"#\"><img src=\"../../images/photo/$rs[anh_2]\" width=\"50\" height=\"50\" border=0></a>";
				$title_anh=$view_item_images;
				}
			}
			else
			{
			$anh_2="";
			$title_anh=$view_item_images;
			}
		 
		 
		  if($rs["movie_vn"]!="") 
		     $movie="<a href=\"../../images/movie/$rs[movie_vn]\" target=_blank><img src=\"../images/movie.jpg\" border=0></a>";
		  else
		     $movie="&nbsp;";
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
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$title_anh?></span></td>
	<td align="left" valign="middle" class="line_bottom"><?=$anh?></td>
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
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="20" align="right" valign="middle" class="line_bottom"><span class="tab_lr_5"><?=$view_item_detail?></span></td>
	<td align="left" valign="top" class="line_bottom"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
      <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
        <td height="18" colspan="2" align="left" valign="top" class="line_bottom">
	      <? 
		
		 if(strstr($noidung,"upload_file"))
		   $noidung=$noidung;
		 else
		   $noidung=str_replace("data/","../../data/",$noidung);
		 
		 echo"$noidung";
		 //include("../../data/files/baiviet/$file");
	  ?></td>
	</tr>
	<tr align="center" valign="middle" bgcolor="#EFEFEF" class="bg_all"> 
	  <td height="32" colspan="2" valign="middle"><input name="button" type=button class="tab_5" onClick="javascript:self.close();" value="Close Window"></td>
	</tr>
</table>
<? include("bottom.php")?>