<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
						include("inc/inc_path_top.php");
					?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<?
						if ((isset($_POST["noi_dung"])) && ($_POST["noi_dung"] == "noi_dung"))
						{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_old=gia_tri_mot_cot("tb_news","id",$id,"anh");
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							$ext=lay_ext($anh);
							
							$file_size=$HTTP_POST_FILES['userfile']['size'];
							
							if($file_size>7340032) //7MB
							  echo"<br>File Size < 7340032 bytes (7MB)!";
							else
							{
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							
							if($anh_nho!="")
							{
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
								 delete_file("$path/$anh_nho");
								}
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }

							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_old");
								  $anh_rename="";
								 }
							  }
							
							if($anh!="")
								{
								 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_old");
									  }
								 rename("$path/$anh","$path/$anh_rename");
								}
			
							$start=$HTTP_GET_VARS{"start"};
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
							$link = $HTTP_POST_VARS["link"];
							$table="tb_news";
						
							$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',mo_ta_$lg='$noidung',link_vn='$link',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "<br>$update_completed<br>";
							
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_GET_VARS["start"];
							
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
							}
						}
						else
						{
						$id=$HTTP_GET_VARS["id"];
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
						$thu_tu = $rs_p["thu_tu"];
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
					<? include("../tool/fckeditor.php") ;?>
					<thead>
					<tr>
					<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Edit item";?></th>
					</tr>
					</thead>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td width="15%" valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
					<td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
					<td width="71%" height="22" valign=middle><span class="dot_do">
					  <input name="ten" onkeyup="initTyper(this);" type="text" class="input" id="ten" style="width:450px;" value="<?=$rs_p["ten_$lg"];?>">
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
					<td height="20" valign=middle><input name="anh_nho" type="hidden" value="<?=$rs_p["anh_nho"]?>">
								<img src='../images/photo/news/<?=$rs_p["anh_nho"]?>' width='50' height='50' name='Img1' border='1'><br />
								<SELECT name="xoa_nho" class="selected" id="xoa_nho">
								  <option value="0" selected>Remain</option>
								  <option value="1" >Delete this images</option>
								</SELECT>
								<input name="userfile_nho" type="file" class="input" onChange='Img1.src=this.value;' style="width:400px;">
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
									  <input name="width" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
								  <td valign="top" ><?=$view_item_thumbnail_h?>
									  <br />
									  <input name="height" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
								</tr>
							  </table>	  </td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=middle class="tab_10_bg_1"><?=$view_item_files?></td>
					  <td height="20" valign=middle>
						<?
						if($rs_p["anh"]!="") 
							$anh="<a href=\"../images/photo/news/$rs_p[anh]\"><img src=\"images/download.gif\" border=0></a>";
						else
						$anh="";
						echo "$anh";
						?>
					      <input name="anh" type="hidden" value="<?=$rs_p["anh"]?>">
								<SELECT name="xoa" class="selected" id="xoa_nho">
								  <option value="0" echo"selected">Remain</option>
								  <option value="1" >Delete</option>
								</SELECT>
								<br />
								<input name="userfile" type="file" class="input" style="width:400px;"></td>
					  </tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td valign=middle class="tab_10_bg_1"><?=$view_item_link?></td>
					<td height="20" valign=middle><input name="link" type="text" value="<?=$rs_p["link_$lg"]?>" class="input" id="ten" style="width:450px;"></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=middle class="tab_10_bg_1"><?=$view_item_content?></td>
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
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
					</td></tr>
					<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>" type=hidden>
					<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>" type=hidden>
					<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>" type=hidden>
					<INPUT name="page" value="<?=$HTTP_GET_VARS["page"]?>" type=hidden>
					<INPUT name="noi_dung" value="noi_dung" type=hidden>
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
