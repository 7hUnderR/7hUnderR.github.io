<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
						include("inc/inc_path_top.php");
						$id=$HTTP_GET_VARS["id"];
						
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
						$thu_tu = $rs_p["thu_tu"];
					?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
	<?
		$form_action = $_SERVER['PHP_SELF'];
		if (isset($_SERVER['QUERY_STRING'])) 
				$form_action .= "?" . $_SERVER['QUERY_STRING'];
		
		if ((isset($_POST["noi_dung"])) && ($_POST["noi_dung"] == "noi_dung")) 
		{
		$path_root=lay_path_root("local");
		$path=$path_root."images/photo/news";
		
		$id=$HTTP_GET_VARS{"id"};
		
		$anh_1=$HTTP_POST_FILES['userfile_1']['name']; 
		$ext_1=lay_ext($anh_1);
		$anh_1_rename=$HTTP_POST_VARS["anh_1"];
		$xoa_1=$HTTP_POST_VARS["xoa_1"];
		if($anh_1!="")
			 {
			 $anh_1_rename=$id;
			 $anh_1_rename.=".".$ext_1;
			 }
		else
		  {
		  if($xoa_1==1)
			 {
			  delete_file("$path/$anh_1_rename");
			  $anh_1_rename="";
			 }
		  }
		  
		if($anh_1!="")
			{
			if (in_array($_FILES['userfile_1']['type'],$imgarray))
			move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
			 if($HTTP_POST_VARS["anh_1"]!="")
				delete_file("$path/$anh_1_rename");
		
			$thumbnail=$_POST["thumbnail_1"];
			if(($thumbnail==1)||($thumbnail==2))
			{
			 thumb($thumbnail,$_POST["width_1"],$_POST["height_1"],$_FILES['userfile_1']['type'],"$path/$anh_1","$path/$anh_1_rename");
			 delete_file("$path/$anh_1");
			}
				 
			if($thumbnail==0)
				 rename("$path/$anh_1","$path/$anh_1_rename");
	   }
			
		$anh_2=$HTTP_POST_FILES['userfile_2']['name']; 
		$ext_2=lay_ext($anh_2);
		$anh_2_rename=$HTTP_POST_VARS["anh_2"];
		$xoa_2=$HTTP_POST_VARS["xoa_2"];
		if($anh_2!="")
			 {
			 $anh_2_rename=$id;
			 $anh_2_rename.="_.".$ext_2;
			 }
		else
		  {
		  if($xoa_2==1)
			 {
			  delete_file("$path/$anh_2_rename");
			  $anh_2_rename="";
			 }
		  }
		if($anh_2!="")
			{
			if (in_array($_FILES['userfile_2']['type'],$imgarray))
			move_uploaded_file($HTTP_POST_FILES['userfile_2']['tmp_name'], "$path/$anh_2");
			 if($HTTP_POST_VARS["anh_2"]!="")
				delete_file("$path/$anh_2_rename");
		
			$thumbnail=$_POST["thumbnail_2"];
			if(($thumbnail==1)||($thumbnail==2))
			{
			 thumb($thumbnail,$_POST["width_2"],$_POST["height_2"],$_FILES['userfile_2']['type'],"$path/$anh_2","$path/$anh_2_rename");
			 delete_file("$path/$anh_2");
			}
				 
			if($thumbnail==0)
				 rename("$path/$anh_2","$path/$anh_2_rename");
	   }

		$anh_3=$HTTP_POST_FILES['userfile_3']['name']; 
		$ext_3=lay_ext($anh_3);
		$anh_3_rename=$HTTP_POST_VARS["anh_3"];
		$xoa_3=$HTTP_POST_VARS["xoa_3"];
		if($anh_3!="")
			 {
			 $anh_3_rename=$id;
			 $anh_3_rename.="_1.".$ext_3;
			 }
		else
		  {
		  if($xoa_3==1)
			 {
			  delete_file("$path/$anh_3_rename");
			  $anh_3_rename="";
			 }
		  }
		if($anh_3!="")
			{
			if (in_array($_FILES['userfile_3']['type'],$imgarray))
			move_uploaded_file($HTTP_POST_FILES['userfile_3']['tmp_name'], "$path/$anh_3");
			 if($HTTP_POST_VARS["anh_3"]!="")
				delete_file("$path/$anh_3_rename");
		
			$thumbnail=$_POST["thumbnail_3"];
			if(($thumbnail==1)||($thumbnail==2))
			{
			 thumb($thumbnail,$_POST["width_3"],$_POST["height_3"],$_FILES['userfile_3']['type'],"$path/$anh_3","$path/$anh_3_rename");
			 delete_file("$path/$anh_3");
			}
				 
			if($thumbnail==0)
				 rename("$path/$anh_3","$path/$anh_3_rename");
	   }

		$anh_4=$HTTP_POST_FILES['userfile_4']['name']; 
		$ext_4=lay_ext($anh_4);
		$anh_4_rename=$HTTP_POST_VARS["anh_4"];
		$xoa_4=$HTTP_POST_VARS["xoa_4"];
		if($anh_4!="")
			 {
			 $anh_4_rename=$id;
			 $anh_4_rename.="_1_.".$ext_4;
			 }
		else
		  {
		  if($xoa_4==1)
			 {
			  delete_file("$path/$anh_4_rename");
			  $anh_4_rename="";
			 }
		  }
		if($anh_4!="")
			{
			if (in_array($_FILES['userfile_4']['type'],$imgarray))
			move_uploaded_file($HTTP_POST_FILES['userfile_4']['tmp_name'], "$path/$anh_4");
			 if($HTTP_POST_VARS["anh_4"]!="")
				delete_file("$path/$anh_4_rename");
		
			$thumbnail=$_POST["thumbnail_4"];
			if(($thumbnail==1)||($thumbnail==2))
			{
			 thumb($thumbnail,$_POST["width_4"],$_POST["height_4"],$_FILES['userfile_4']['type'],"$path/$anh_4","$path/$anh_4_rename");
			 delete_file("$path/$anh_4");
			}
				 
			if($thumbnail==0)
				 rename("$path/$anh_4","$path/$anh_4_rename");
	   }
	   
	   $start=$HTTP_POST_VARS{"start"};
		$cat=$HTTP_POST_VARS["cat"];
		$bac = $HTTP_POST_VARS['bac'];
		$lg = $HTTP_POST_VARS['lg'];
		include("inc/inc_cat.php");										
		$ngay_df=date('m/d/y');
		$gio_df=date("g:i a");
		$ngay_n=rep($HTTP_POST_VARS{"ngay"});
		$gio_n=rep($HTTP_POST_VARS{"gio"});
		if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
		if($gio_n=="") $gio=$gio_df; else $gio=$gio_n; 
		$ten = stripslashes($HTTP_POST_VARS["ten"]);
		$ten=chuan_php($ten);
		$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
		$ghi_chu=chuan_php($ghi_chu);
		$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
		$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
		$noidung =chuan_php("$noidung");
		
		$table="tb_news";
		if($suid==1)
				$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_1_rename',anh='$anh_2_rename',anh_nho_1='$anh_3_rename',anh_1='$anh_4_rename',ngay='$ngay',gio='$gio' ";	
		else
				$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_1_rename',anh='$anh_2_rename',anh_nho_1='$anh_3_rename',anh_1='$anh_4_rename',ngay='$ngay',gio='$gio',nguoi_viet='$ma_user_admin',activate='0',activate_='0'";	
		
		$query .= "WHERE id =$id";
		if($result = mysql_query($query))
			echo "$update_completed";
		$cat=$HTTP_POST_VARS["cat"];
		$bac=$HTTP_POST_VARS["bac"];
		$lg=$HTTP_POST_VARS["lg"];
		$start=$HTTP_POST_VARS["start"];
		
		include("inc/inc_return_page.php");
		$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
		echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
		}
		else
		{
		?>
<table id="datatable" class="tbldata" cellpadding=5 width="600" cellspacing=0 border=0>
	<script language="javascript">
	function Check_Values_nhap(from)
	{
	if(from.ten.value ==""){
	alert("Please Enter Title!");
	from.ten.focus();
	return (false);
	} 
	}
	
 function thumbnail_check() 
 {
		var theForm=document.forms["noi_dung"];
		if (theForm.thumbnail.checked)
		 {
			    theForm.width.disabled=false;
				theForm.height.disabled=false;
		} 
		else 
		{
				theForm.width.disabled=true;
				theForm.height.disabled=true;
		}
	}
	
	</script>
	
	<form method="post" action="<?=$form_action?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
	<input name="noi_dung" type="hidden" value="noi_dung" />
	<? include("../tool/fckeditor.php") ;?>
	<thead>
	<tr>
	<th height="23" colspan="2" align="left" valign="middle" id="senderheader"><? echo"Edit item";?></th>
	</tr>
	</thead>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td width="15%" valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
	<td width="71%" height="22" valign=middle><span class="dot_do">
	  <input name="ten" onKeyUp="initTyper(this);" type="text" class="input" id="ten" style="width:450px;" value="<?=$rs_p["ten_$lg"];?>">
*</span></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_short_content?></td>
	<td height="22" valign=middle><?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('ghi_chu') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["ghi_chu_$lg"];
				$oFCKeditor->Create() ;
				?></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_small_images?></td>
	<td height="20" valign=middle><input name="anh_1" type="hidden" value="<?=$rs_p["anh_nho"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh_nho"]?>' width='50' height='50' name='Img1' border='1'><br />
                <SELECT name="xoa_1" class="selected" id="xoa_nho">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile_1" type="file" class="input" onChange='Img1.src=this.value;' style="width:400px;">
                <br />
	   
	  
	 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
                <!--DWLayoutTable-->
                <tr>
                  <td width="60" valign='top' ><?=$view_item_none?>
                    <br />
                    <input name="thumbnail_1" type="radio" value="0" checked="checked">
                    <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br /><input name="thumbnail_1" type="radio" value="1"></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_1" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                      <br />
                      <input name="width_1" type="text" class="input" id="width_nho" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width?>" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                      <br />
                      <input name="height_1" type="text" class="input" id="height_nho" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height?>" maxlength="4"/></td>
                </tr>
              </table>
	  </td>
	
	</tr>
		<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
	<td height="20" valign=middle><input name="anh_2" type="hidden" value="<?=$rs_p["anh"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh"]?>' name='Img2' width='50' height='50' border='1' id="Img2"><br />
                <SELECT name="xoa_2" class="selected" id="xoa">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile_2" type="file" class="input" onChange='Img2.src=this.value;' style="width:400px;">
                <br />
	   
	  
	 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
                <!--DWLayoutTable-->
                <tr>
                  <td width="60" valign='top' ><?=$view_item_none?>
                    <br />
                    <input name="thumbnail_2" type="radio" value="0" checked="checked">
                    <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br /><input name="thumbnail_2" type="radio" value="1"></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_2" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                      <br />
                      <input name="width_2" type="text" class="input" id="width" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                      <br />
                      <input name="height_2" type="text" class="input" id="height" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
                </tr>
              </table>
	  </td>
	
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
	<td height="20" valign=middle><input name="anh_3" type="hidden" id="anh_3" value="<?=$rs_p["anh_nho_1"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh_nho_1"]?>' name='Img3' width='50' height='50' border='1' id="Img3"><br />
                <SELECT name="xoa_3" class="selected" id="xoa_3">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile_3" type="file" class="input" id="userfile_3" style="width:400px;" onChange='Img3.src=this.value;'>
                <br />
	   
	  
	 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
                <!--DWLayoutTable-->
                <tr>
                  <td width="60" valign='top' ><?=$view_item_none?>
                    <br />
                    <input name="thumbnail_3" type="radio" value="0" checked="checked">
                    <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br /><input name="thumbnail_3" type="radio" value="1"></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_3" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                      <br />
                      <input name="width_3" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                      <br />
                      <input name="height_3" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
                </tr>
              </table>
	  </td>
	
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
	<td height="20" valign=middle><input name="anh_4" type="hidden" id="anh_4" value="<?=$rs_p["anh_1"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh_1"]?>' name='Img4' width='50' height='50' border='1' id="Img4"><br />
                <SELECT name="xoa_4" class="selected" id="xoa_4">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile_4" type="file" class="input" id="userfile_4" style="width:400px;" onChange='Img4.src=this.value;'>
                <br />
	   
	  
	 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
                <!--DWLayoutTable-->
                <tr>
                  <td width="60" valign='top' ><?=$view_item_none?>
                    <br />
                    <input name="thumbnail_4" type="radio" value="0" checked="checked">
                    <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br /><input name="thumbnail_4" type="radio" value="1"></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_4" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                      <br />
                      <input name="width_4" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                      <br />
                      <input name="height_4" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
                </tr>
              </table>
	  </td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1"><?=$view_item_content?></td>
	<td height="20" valign=middle><?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				//$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["mo_ta_$lg"];
				$oFCKeditor->Create() ;
				
				?></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1">&nbsp;</td>
	<td height="20" valign=middle>
			<table height='30' cellpadding='0' cellspacing='0' class="text" >
                <!--DWLayoutTable-->
                <tr>
                  <td height="30" valign='top' ><?=$view_item_ngay?>
                      <br />
                      <span class="S10">
                      <input name="ngay" value="<?=date('d/m/y')?>" type="text" class="input" style="width:100px;" />
                      </span></td>
                  <td width='50' valign="top" ><?=$view_item_gio?>
                      <br />
                      <span class="S10">
                      <input name="gio" value="<?=date("g:i a")?>" type="text" class="input" id="gio3" style="width:100px;" />
                      </span></td>
                  <td width='184' valign="top" ><?=$view_item_sort_num?>
                      <br />
                      <span class="S10">
                      <input name="thu_tu" value="<?=$thu_tu?>" type="text" class="input" id="gio4" style="width:100px;" />
                      </span></td>
                </tr>
              </table></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="25" valign=middle>
                <input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; Img2.src=''; Img3.src=''; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				</td></tr>
	<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
	<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
	<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
	<INPUT name="start" value="<?=$HTTP_GET_VARS["start"]?>"type=hidden>
	<INPUT name="page" value="<?=$HTTP_GET_VARS["page"]?>"type=hidden>
	</form>
	</table>
	<? } ?>
	</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
