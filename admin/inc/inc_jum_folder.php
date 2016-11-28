<select name="nganh_nghe" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" style="FONT: 11px verdana,arial,helvetica;">
<?
	switch($bac){
		case '1':
			if($ma_user_admin==1)
				$result=select_ko_dk("tb_bac_1","thu_tu","ASC");
			else
				{
				 $all_quyen_cr=gia_tri_mot_cot("tb_admin","ma_user","$ma_user_admin","quyen_catalog");
				 $all_quyen_cr= str_replace (",", "','", $all_quyen_cr);
				 
				 $result=select_co_dk_1in("tb_bac_1","activate_setup",1,"ma_bac_1",$all_quyen_cr,"thu_tu","ASC");
				}
				
			break;
		case '2':
			$ma_bac_1=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ma_bac_1");
			if($ma_user_admin==1)
				$result=select_co_dk("tb_bac_2","ma_bac_1",$ma_bac_1,"thu_tu","ASC");
			else
				{
				 $all_quyen_cr=gia_tri_mot_cot("tb_admin","ma_user","$ma_user_admin","quyen_catalog_s");
				 $all_quyen_cr= str_replace (",", "','", $all_quyen_cr);
				
				 $result=select_co_2dk_1in("tb_bac_2","ma_bac_1",$ma_bac_1,"activate_setup",1,"ma_bac_2",$all_quyen_cr,"thu_tu","ASC");
				}
				
			break;
		case '3':
			$ma_bac_2=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_2");
			if($ma_user_admin==1)
				$result=select_co_dk("tb_bac_3","ma_bac_2",$ma_bac_2,"thu_tu","ASC");						
			else
			    $result=select_co_2dk("tb_bac_3","ma_bac_2",$ma_bac_2,"activate_setup",1,"thu_tu","ASC");						
			break;
		case '4':
			$ma_bac_3=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_3");
			if($ma_user_admin==1)
				$result=select_co_dk("tb_bac_4 ","ma_bac_3",$ma_bac_3,"thu_tu","ASC");
			else
				$result=select_co_2dk("tb_bac_4 ","ma_bac_3",$ma_bac_3,"activate_setup",1,"thu_tu","ASC");
			break;
		case '5':
			$ma_bac_4 = gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat,"ma_bac_4");
			if($ma_user_admin==1)
				$result=select_co_dk("tb_bac_5","ma_bac_4",$ma_bac_4,"thu_tu","ASC");								
			else
				$result=select_co_2dk("tb_bac_5","ma_bac_4",$ma_bac_4,"activate_setup",1,"thu_tu","ASC");								
			break;
		default:
			break;
	}

	while($rs= mysql_fetch_array($result)) {?>
		<?
		switch($bac){
			case '1':
			    $page=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"file_view");
				$tb=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"tb");
				
				if($suid==2)
					$num=dem_max_3dk("$tb","ma_bac_1",$rs["ma_bac_1"],"ma_bac_2",0,"nguoi_viet",$ma_user_admin);
				else
				    $num=dem_max_2dk("$tb","ma_bac_1",$rs["ma_bac_1"],"ma_bac_2",0);
				?>
				<option value="<?=$page?>?cat=<?=$rs["ma_bac_1"]?>&bac=<?=$bac?>&lg=<?=$lg?>&start=0" <? if($cat==$rs["ma_bac_1"]) echo"selected";?> > <? echo $rs["ten_$lg"]." [ $num ]"; ?> </option>
				<?
				break;
			case '2':
				$page=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"file_view");
			    $tb=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"tb");
				
				if($suid==2)
				   $num=dem_max_3dk("$tb","ma_bac_2",$rs["ma_bac_2"],"ma_bac_3",0,"nguoi_viet",$ma_user_admin);
				else
				   $num=dem_max_2dk("$tb","ma_bac_2",$rs["ma_bac_2"],"ma_bac_3",0);
				?>
				<option value="<?=$page?>?cat=<?=$rs["ma_bac_2"]?>&bac=<?=$bac?>&lg=<?=$lg?>&start=0" <? if($cat==$rs["ma_bac_2"]) echo"selected";?> > <? echo $rs["ten_$lg"]." [ $num ]"; ?> </option>
				<?
				break;
			case '3':
  			    $page=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"file_view");
			    $tb=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"tb");
			    
				if($suid==2)
				$num=dem_max_3dk("$tb","ma_bac_3",$rs["ma_bac_3"],"ma_bac_4",0,"nguoi_viet",$ma_user_admin);
				else
				$num=dem_max_2dk("$tb","ma_bac_3",$rs["ma_bac_3"],"ma_bac_4",0);
				
				?>
				<option value="<?=$page?>?cat=<?=$rs["ma_bac_3"]?>&bac=<?=$bac?>&lg=<?=$lg?>&start=0" <? if($cat==$rs["ma_bac_3"]) echo"selected";?> > <?  echo $rs["ten_$lg"]; echo"[ $num ]"; ?> </option>
				<?
				break;
			case '4':
			   $page=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"file_view");
			   $tb=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"tb");
			   
			   if($suid==2)
				$num=dem_max_3dk("$tb","ma_bac_3",$rs["ma_bac_3"],"ma_bac_4",$rs["ma_bac_4"],"nguoi_viet",$ma_user_admin);
				else
				$num=dem_max_dk("$tb","ma_bac_4",$rs["ma_bac_4"],"ma_bac_5",$rs["ma_bac_5"]);
				
				?>
				<option value="<?=$page?>?cat=<?=$rs["ma_bac_4"]?>&bac=<?=$bac?>&lg=<?=$lg?>&start=0" <? if($cat==$rs["ma_bac_4"]) echo"selected";?> > <? echo $rs["ten_$lg"]; echo"[ $num ]"; ?> </option>
				<?
				break;
			case '5':
			    $page=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"file_view");
				$tb=gia_tri_mot_cot("tb_setup","ma_dm",$rs["trang"],"tb");
				if($suid==2)
				$num=dem_max_2dk("$tb","ma_bac_5",$rs["ma_bac_5"],"nguoi_viet",$ma_user_admin);
				else
				$num=dem_max_dk("$tb","ma_bac_5",$rs["ma_bac_5"]);
				?>
				<option value="<?=$page?>?cat=<?=$rs["ma_bac_5"]?>&bac=<?=$bac?>&lg=<?=$lg?>&start=0" <? if($cat==$rs["ma_bac_5"]) echo"selected";?> > <? echo $rs["ten_$lg"]; echo"[ $num ]"; ?> </option>
				<?
				break;
			default:
				break;
		}
	}
?>
</select>
