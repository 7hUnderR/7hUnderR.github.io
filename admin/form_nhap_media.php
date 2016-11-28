<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><?	include("inc/inc_path_top.php");?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<?
				if ((isset($_POST["noi_dung"])) && ($_POST["noi_dung"] == "noi_dung")) 
				{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							
							$id_anh=max_cot("tb_news","id")+1;
							$ext=lay_ext($anh);
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
							
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							$file_size=$_FILES['userfile']['size'];
							
							if($file_size>7340032) //7MB
							  echo"<br>File Size < 7340032 bytes (7MB)!";
							else
							{
							if($anh_nho!="")
							   {
							 	move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							}
							
							if($anh!="")
							{
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$link = $HTTP_POST_VARS["link"];
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung=chuan_php($noidung);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							include("inc/inc_cat.php");	
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,ghi_chu_$lg,link_$lg,mo_ta_$lg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
						
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$link."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
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
					</script>
					
					<form method="post" action="<?=$form_action?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
					<? include("../tool/fckeditor.php") ;?>
					<thead>
					<tr>
					<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"New item";?></th>
					</tr>
					</thead>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td width="15%" valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
					<td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
					<td width="71%" height="22" valign=middle><span class="dot_do">
					  <input name="ten" onkeyup="initTyper(this);" type="text" class="input" id="ten" style="width:450px;" />
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
							  </table>					  </td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=top class="tab_10_bg_1"><span class="S10">
					    <?=$view_item_files?>
					  </span></td>
					  <td height="20" valign=middle>                            <input name="userfile" type="file" class="input" style="width:400px;" onChange='Img2.src=this.value;'>
                            <INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
                            <INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
                            <INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden></td>
					  </tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td valign=top class="tab_10_bg_1"><?=$view_item_link?></td>
					<td height="20" valign=middle><input name="link" type="text" class="input" id="link" style="width:450px;" /></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=middle class="tab_10_bg_1"><?=$view_item_content?></td>
					  <td height="20" valign=middle><?php
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
								  <td height="30" align="left" valign='top' ><?=$view_item_ngay?>
									  <br />
								  <input name="ngay" value="<?=date('d/m/y')?>" type="text" class="input" style="width:100px;" />                  </td>
								  <td width='50' align="left" valign="top" ><?=$view_item_gio?>
									  <br />
								  <input name="gio" value="<?=date("g:i a")?>" type="text" class="input" id="gio3" style="width:100px;" /></td>
								  <td width='184' align="left" valign="top" ><?=$view_item_sort_num?>
									  <br />
								  <input name="thu_tu" value="<?=$thu_tu?>" type="text" class="input" id="gio4" style="width:100px;" /></td>
								</tr>
							  </table></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					<td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
					<td height="25" valign=middle>
					<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
					<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
					<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
					</td></tr>
					<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
					<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
					<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
					<INPUT name="noi_dung" value="noi_dung"type=hidden>
					</form>
					</table>
					<? } ?>				
				</td>
              </tr>
                  </table>
				  
  </td>
  </tr>
</table>
<? include("inc/bottom.php")?>
