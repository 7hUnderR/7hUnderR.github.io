<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? include("inc/inc_path_top.php");?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<?
				$form_action = $_SERVER['PHP_SELF'];
				if (isset($_SERVER['QUERY_STRING'])) 
						$form_action .= "?" . $_SERVER['QUERY_STRING'];
				
				if ((isset($_POST["noi_dung"])) && ($_POST["noi_dung"] == "noi_dung")) 
			    {
							$anh_nho="";
							$anh="";
							$anh_lon="";
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name'];
							$ext_lon=lay_ext($anh_lon);


							$anh_lon_=$HTTP_POST_FILES['userfile_lon_']['name'];
							$ext_lon_=lay_ext($anh_lon_);
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";

							$anh_lon_rename=$id_anh;
							$anh_lon_rename.="_1.".$ext_lon;
							if($anh_lon=="")
								$anh_lon_rename="";

							$anh_lon_rename_=$id_anh;
							$anh_lon_rename_.="_1_.".$ext_lon_;
							if($anh_lon_=="")
								$anh_lon_rename_="";

							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								$thumbnail=$_POST["thumbnail_nho"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width_nho"],$_POST["height_nho"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
								 delete_file("$path/$anh_nho");
								}
								if($thumbnail==0)
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
								 delete_file("$path/$anh");
								}
									 
								if($thumbnail==0)
									 rename("$path/$anh","$path/$anh_rename");
							}
														
							
							if($anh_lon!="")
							{
								if (in_array($_FILES['userfile_lon']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
								$thumbnail=$_POST["thumbnail_lon"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile_lon']['type'],"$path/$anh_lon","$path/$anh_lon_rename");
								 delete_file("$path/$anh_lon");
								}
									 
								if($thumbnail==0)
									 rename("$path/$anh_lon","$path/$anh_lon_rename");
							}
							
							if($anh_lon_!="")
							{
								if (in_array($_FILES['userfile_lon_']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_lon_']['tmp_name'], "$path/$anh_lon_");
								$thumbnail=$_POST["thumbnail_lon_"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width_lon_"],$_POST["height_lon_"],$_FILES['userfile_lon_']['type'],"$path/$anh_lon_","$path/$anh_lon_rename_");
								 delete_file("$path/$anh_lon_");
								}
									 
								if($thumbnail==0)
									 rename("$path/$anh_lon_","$path/$anh_lon_rename_");
							}

							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");
													
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;

							$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,ghi_chu_$lg,mo_ta_$lg,thu_tu,anh_nho,anh,anh_nho_1,anh_1,activate_,activate,banner,nguoi_viet,gio,ngay)";

							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .=$anh_lon_rename."','";	
							$sql .=$anh_lon_rename_."','";														
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					
					$cat=$HTTP_POST_VARS["cat"];
					$bac=$HTTP_POST_VARS["bac"];
					$lg=$HTTP_POST_VARS["lg"];
					$start=0;
					
					include("inc/inc_return_page.php");
					$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
					//echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
				
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
				<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"New item";?></th>
				</tr>
				</thead>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td width="15%" valign=middle class="tab_10_bg_1">&nbsp;</td>
				<td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
				</tr>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
				<td width="71%" height="22" valign=middle><span class="dot_do">
				  <input name="ten" onKeyUp="initTyper(this);" type="text" class="input" id="ten" style="width:450px;" />
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
							$oFCKeditor->Value		= " ";
							$oFCKeditor->Create() ;
							?></td>
				</tr>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><?=$view_item_small_images?></td>
				<td height="20" valign=middle><img src='images/images.gif' name='Img1' width='50' height='50' border='1' id="Img1" /><br /><input name="userfile_nho" type="file" class="input" style="width:300px;" onChange='Img1.src=this.value;'>
				  <br />
				   
				  
				 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
							<tr>
							  <td width="60" valign='top' ><?=$view_item_none?>
								<br />
								<input name="thumbnail_nho" type="radio" value="0" checked="checked">
								<br /></td>
							  <td width="60" valign='top' ><?=$view_item_thumbnail?>
								<br /><input name="thumbnail_nho" type="radio" value="1"></td>
							  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
								<br />
								<input name="thumbnail_nho" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
								  <br />
								  <input name="width_nho" type="text" class="input" id="width_nho" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width?>" maxlength="4"/></td>
							  <td valign="top" ><?=$view_item_thumbnail_h?>
								  <br />
								  <input name="height_nho" type="text" class="input" id="height_nho" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height?>" maxlength="4"/></td>
							</tr>
						  </table>
				  </td>
				
				</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
				<td height="20" valign=middle><img src='images/images.gif' width='50' height='50' name='Img2' border='1' ><br /><input name="userfile" type="file" class="input" style="width:300px;" onChange='Img2.src=this.value;'>
				  <br />
				   
				  
				 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
							<!--DWLayoutTable-->
							<tr>
							  <td width="60" valign='top' ><?=$view_item_none?>
								<br />
								<input name="thumbnail" type="radio" value="0" checked="checked">
								<br /></td>
							  <td width="60" valign='top' ><?=$view_item_thumbnail?>
								<br /><input name="thumbnail" type="radio" value="1"></td>
							  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
								<br />
								<input name="thumbnail" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
								  <br />
								  <input name="width" type="text" class="input" id="width" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
							  <td valign="top" ><?=$view_item_thumbnail_h?>
								  <br />
								  <input name="height" type="text" class="input" id="height" style="width:50px;" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
							</tr>
						  </table>
				  </td>
				
				</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
				<td height="20" valign=middle><img src='images/images.gif' name='Img3' width='50' height='50' border='1' id="Img3" ><br />
				  <input name="userfile_lon" type="file" class="input" id="userfile_lon" style="width:300px;" onChange='Img3.src=this.value;'>
				  <br />
				   
				  
				 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
							<!--DWLayoutTable-->
							<tr>
							  <td width="60" valign='top' ><?=$view_item_none?>
								<br />
								<input name="thumbnail_lon" type="radio" value="0" checked="checked">
								<br /></td>
							  <td width="60" valign='top' ><?=$view_item_thumbnail?>
								<br /><input name="thumbnail_lon" type="radio" value="1"></td>
							  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
								<br />
								<input name="thumbnail_lon" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
								  <br />
								  <input name="width_lon" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
							  <td valign="top" ><?=$view_item_thumbnail_h?>
								  <br />
								  <input name="height_lon" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
							</tr>
						  </table>
				  </td>
				</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
				<td height="20" valign=middle><img src='images/images.gif' name='Img4' width='50' height='50' border='1' id="Img4" ><br />
				  <input name="userfile_lon_" type="file" class="input" id="userfile_lon_" style="width:300px;" onChange='Img4.src=this.value;'>
				  <br />
				   
				  
				 <table height='40' width="512" cellpadding='0' cellspacing='0' class="text">
							<!--DWLayoutTable-->
							<tr>
							  <td width="60" valign='top' ><?=$view_item_none?>
								<br />
								<input name="thumbnail_lon_" type="radio" value="0" checked="checked">
								<br /></td>
							  <td width="60" valign='top' ><?=$view_item_thumbnail?>
								<br /><input name="thumbnail_lon_" type="radio" value="1"></td>
							  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
								<br />
								<input name="thumbnail_lon_" type="radio" value="2"></td><td width='60' valign="top" ><?=$view_item_thumbnail_w?>
								  <br />
								  <input name="width_lon_" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
							  <td valign="top" ><?=$view_item_thumbnail_h?>
								  <br />
								  <input name="height_lon_" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
							</tr>
						  </table>
				  </td>
				</tr>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=top class="tab_10_bg_1"><?=$view_item_content?></td>
				<td height="20" valign=middle><?php
							$sBasePath = $_SERVER['PHP_SELF'];
							$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
							
							$oFCKeditor = new FCKeditor('FCKeditor1') ;
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= " " ;
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
								  <input name="ngay" value="<?=date('d/m/y')?>" type="text" class="input" style="width:100px;" />                  </td>
							  <td width='50' valign="top" ><?=$view_item_gio?>
								  <br />
								  <input name="gio" value="<?=date("g:i a")?>" type="text" class="input" id="gio3" style="width:100px;" /></td>
							  <td width='184' valign="top" ><?=$view_item_sort_num?>
								  <br />
								  <input name="thu_tu" value="<?=$thu_tu?>" type="text" class="input" id="gio4" style="width:100px;" /></td>
							</tr>
						  </table></td>
				</tr>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
				<td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
				<td height="25" valign=middle>
				<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; Img2.src=''; Img3.src=''; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				</td></tr>
				<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
				<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
				<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
				</form>
				</table>
				<? }?>
				</td>
              </tr>
                  </table>
  <?  ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
