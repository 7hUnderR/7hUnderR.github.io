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
					
					<form method="post" action="admin_edit_save.php?save=edit_files_download&id=<?=$HTTP_GET_VARS["id"]?>&lg=<?=$lg?>&start=<?=$HTTP_GET_VARS["start"]?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
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
					<td height="20" valign=middle><input name="FCKeditor1" type="text" value="<?=$rs_p["mo_ta_$lg"]?>" class="input" id="ten" style="width:450px;"></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=middle class="tab_10_bg_1"><?=$view_item_key_word?></td>
					  <td height="20" valign=middle><textarea name="key_word" class="textarea" id="key_word" style="width:450px; height:60px;"><?=$rs_p["key_word_$lg"]?></textarea></td>
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
					<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
					<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
					<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
					<INPUT name="page" value="<?=$HTTP_GET_VARS["page"]?>"type=hidden>
					</form>
					</table></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
