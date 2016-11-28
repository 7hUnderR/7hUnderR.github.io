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
					
					<form method="post" action="admin_add.php?ma_add=add_files_download" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
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
								<!--DWLayoutTable-->
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
									  <input name="width_nho" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
								  <td valign="top" ><?=$view_item_thumbnail_h?>
									  <br />
									  <input name="height_nho" onKeyDown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height?>" type="text" class="input" style="width:50px;" maxlength="4"/></td>
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
					<td height="20" valign=middle><input name="FCKeditor1" type="text" class="input" id="FCKeditor1" style="width:450px;" /></td>
					</tr>
					<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
					  <td valign=middle class="tab_10_bg_1"><?=$view_item_key_word?></td>
					  <td height="20" valign=middle><textarea name="key_word" class="textarea" id="key_word" style="width:450px; height:60px;"></textarea></td>
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
					</form>
					</table>				
				</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
