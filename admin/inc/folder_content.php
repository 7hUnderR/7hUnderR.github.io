<? include("banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="middle" class="bg3">
    <td height="25" colspan="2" class="tab_left_10"><?=$view_item_content?><?
	$id=$HTTP_GET_VARS["id"];
	$bac=$HTTP_GET_VARS["bac"];
	$lg=$HTTP_GET_VARS["lg"];
	if($bac=="1")
	   $table="tb_bac_1";
	if($bac=="2")
	   $table="tb_bac_2";
	if($bac=="3")
	   $table="tb_bac_3";
	if($bac=="4")
	   $table="tb_bac_4 ";
	if($bac=="5")
	   $table="tb_bac_5";
	$query = "Select * FROM  $table where id=$id ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	
	$trang=$rs["trang"];
	$tb_detail=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
	///echo "HA HA HA: $tb_detail";
	
	if($bac=="1")
		{
		$ma_bac_1=$rs["ma_bac_1"];
		$ten_de_muc= $rs["ten_$lg"];
		$num_ = dem_max_dk("tb_bac_2","ma_bac_1","$ma_bac_1");
		if($suid==1)
		{
		  $num_item=dem_max_2dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0);
		  $num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","0");
		  $num_item_activate=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","1");
		}
		else
		{
		  $num_item=dem_max_3dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"nguoi_viet",$ma_user_admin);
		  $num_item_deactivate=dem_max_4dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","0","nguoi_viet",$ma_user_admin);
		  $num_item_activate=dem_max_4dk("$tb_detail","ma_bac_1",$ma_bac_1,"ma_bac_2",0,"activate","1","nguoi_viet",$ma_user_admin);
		}
	   $dtc=dem_max_dk("tb_quanly_truycap","ma_bac_1",$ma_bac_1); 
		}
	if($bac=="2")
		{
		$ten_de_muc= $rs["ten_$lg"];

		$ma_bac_1=$rs["ma_bac_1"];
		$ma_bac_2=$rs["ma_bac_2"];
		$num_ = dem_max_dk("tb_bac_3","ma_bac_2","$ma_bac_2");
			if($suid==1)
			  {
			   $num_item=dem_max_2dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0);
			   $num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0,"activate","0");
			   $num_item_activate=dem_max_3dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0,"activate","1");
			  }
			 else
			  {
			   $num_item=dem_max_3dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0,"nguoi_viet",$ma_user_admin);
			   $num_item_deactivate=dem_max_4dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0,"activate","0","nguoi_viet",$ma_user_admin);
			   $num_item_activate=dem_max_4dk("$tb_detail","ma_bac_2",$ma_bac_2,"ma_bac_3",0,"activate","1","nguoi_viet",$ma_user_admin);
			  }
			   $dtc=dem_max_dk("tb_quanly_truycap","ma_bac_2",$ma_bac_2); 
		}
	if($bac=="3")
		{
		$ten_de_muc= $rs["ten_$lg"];
		$ma_bac_1=$rs["ma_bac_1"];
		$ma_bac_2=$rs["ma_bac_2"];
		$ma_bac_3=$rs["ma_bac_3"];
	    $num_ = dem_max_dk("tb_bac_4 ","ma_bac_3","$ma_bac_3");
		if($suid==1)
			{
			$num_item=dem_max_2dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0);
			$num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0,"activate","0");
			$num_item_activate=dem_max_3dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0,"activate","1");
			}
		else
			{
			$num_item=dem_max_3dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0,"nguoi_viet",$ma_user_admin);
			$num_item_deactivate=dem_max_4dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0,"activate","0","nguoi_viet",$ma_user_admin);
			$num_item_activate=dem_max_4dk("$tb_detail","ma_bac_3",$ma_bac_3,"ma_bac_4",0,"activate","1","nguoi_viet",$ma_user_admin);
			}
			$dtc=dem_max_dk("tb_quanly_truycap","ma_bac_3",$ma_bac_3);
		}
	if($bac=="4")
		{
		$ten_de_muc= $rs["ten_$lg"];
		$ma_bac_1=$rs["ma_bac_1"];
		$ma_bac_2=$rs["ma_bac_2"];
		$ma_bac_3=$rs["ma_bac_3"];
		$ma_bac_4=$rs["ma_bac_4"];
		$num_ = dem_max_dk("tb_bac_5","ma_bac_4","$ma_bac_4");
			if($suid==1)
			{
			  $num_item=dem_max_2dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0");
			  $num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0","activate","0");
			  $num_item_activate=dem_max_3dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0","activate","1");
			}
			else
			{
			  $num_item=dem_max_3dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0","nguoi_viet",$ma_user_admin);
			  $num_item_deactivate=dem_max_4dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0","activate","0","nguoi_viet",$ma_user_admin);
			  $num_item_activate=dem_max_4dk("$tb_detail","ma_bac_4",$ma_bac_4,"ma_bac_5","0","activate","1","nguoi_viet",$ma_user_admin);
			}
		$dtc=dem_max_dk("tb_quanly_truycap","ma_bac_4",$ma_bac_4);
		
		}
	if($bac=="5")
		{
		$ten_de_muc= $rs["ten_$lg"];
		 $ma_bac_1=$rs["ma_bac_1"];
		 $ma_bac_2=$rs["ma_bac_2"];
		 $ma_bac_3=$rs["ma_bac_3"];
		 $ma_bac_4=$rs["ma_bac_4"];
		 $ma_bac_5=$rs["ma_bac_5"];
		if($suid==1)
			{
			  $num_item=dem_max_dk("$tb_detail","ma_bac_5",$ma_bac_5);
			  $num_=$num_item;
			  $num_item_deactivate=dem_max_2dk("$tb_detail","ma_bac_5",$ma_bac_5,"activate","0");
			  $num_item_activate=dem_max_2dk("$tb_detail","ma_bac_5",$ma_bac_5,"activate","1");
			}
		else
			{
			  $num_item=dem_max_2dk("$tb_detail","ma_bac_5",$ma_bac_5,"nguoi_viet",$ma_user_admin);
			  $num_=$num_item;
			  $num_item_deactivate=dem_max_3dk("$tb_detail","ma_bac_5",$ma_bac_5,"activate","0","nguoi_viet",$ma_user_admin);
			  $num_item_activate=dem_max_3dk("$tb_detail","ma_bac_5",$ma_bac_5,"activate","1","nguoi_viet",$ma_user_admin);
			}
		  
		  $dtc=dem_max_dk("tb_quanly_truycap","ma_bac_5",$ma_bac_5);
		
		}
		
	$mo_ta_dv = $rs["mo_ta_$lg"];
	$ghi_chu = $rs["ghi_chu_$lg"];
	$noi_dung=$rs["noi_dung_$lg"];
	$activate=$rs["activate"];
	if($activate==1)
		$on_off="<span class=xanh>On</span>";
	else
		$on_off="<span class=do>Off</span>";

?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td width="197" height="20" valign="middle" class="line_bottom"><?=$main_tieu_de_trang?></td>
  <td width="792" valign="middle" class="line_bottom"><?=$ten_de_muc?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_images?></td>
  <td valign="middle" class="line_bottom"><? if($rs["anh"]!="") echo"<img src=\"../../images/danh_muc/$rs[anh]\">"; ?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_images?></td>
  <td valign="middle" class="line_bottom"><? if($rs["anh_lon"]!="") echo"<img src=\"../../images/danh_muc/$rs[anh_lon]\">"; ?>&nbsp;</td>
  </tr>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_images?></td>
  <td valign="middle" class="line_bottom"><? if($rs["anh_1"]!="") echo"<img src=\"../../images/danh_muc/$rs[anh_1]\">"; ?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_images?></td>
  <td valign="middle" class="line_bottom"><? if($rs["anh_1_lon"]!="") echo"<img src=\"../../images/danh_muc/$rs[anh_1_lon]\">"; ?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_short_content?></td>
  <td valign="middle" class="line_bottom"><?=$mo_ta_dv?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_short_content?></td>
  <td valign="middle" class="line_bottom"><?=$ghi_chu?>&nbsp;</td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$view_item_detail?></td>
  <td valign="middle" class="line_bottom"><?=$noi_dung?>&nbsp;</td>
  </tr>
  <tr valign="middle" class="bg3">
    <td height="25" colspan="2" class="tab_left_10"><?=$main_tieu_de_thong_ke?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_sub_folder?></td>
  <td valign="middle" class="line_bottom"><?=$num_?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_bai_all?></td>
  <td valign="middle" class="line_bottom"><?=$num_item?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_bai_moi?></td>
  <td valign="middle" class="line_bottom"><? echo"<span class=dot_do>$num_item_deactivate</span>";?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_bai?></td>
  <td valign="middle" class="line_bottom"><? echo"<span class=dot_xanh>$num_item_activate</span>";?></td>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_visitor?></td>
  <td valign="middle" class="line_bottom"><?=$dtc?></td>
  </tr>
  </tr>
  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
    <td height="20" valign="middle" class="line_bottom"><?=$main_on_off?></td>
  <td valign="middle" class="line_bottom"><?=$on_off?></td>
  </tr>
</table>
<? include("bottom.php")?>