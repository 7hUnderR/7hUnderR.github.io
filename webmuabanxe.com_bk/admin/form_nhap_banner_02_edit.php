<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr><td width="15%" rowspan="2" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
    <td  width="85%" height="25" valign="middle" class="bg_title"><? include("inc/inc_path_top.php");?></td>
 </tr> 
  <tr>
    <td valign="top" class="bg_center">
      <table id="datatable" class="tbldata" cellpadding=10 width="600" cellspacing=0 border=0>
            <? 
				$cat = $HTTP_GET_VARS["cat"];
				$bac = $HTTP_GET_VARS['bac'];
				$lg = $HTTP_GET_VARS['lg'];
				
				include("inc/inc_return_page.php");
				$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
		
			    include("inc/inc_cat_get.php");
			   
			   $id=$HTTP_GET_VARS["id"];
			   $start=$HTTP_GET_VARS["start"];
			   $result=select_mot_dong("$tb","id",$id);
			   $rs_p=mysql_fetch_array($result);
			   
			   if($lg=="vn")
			      $anh=$rs_p["anh_nho"];
			   if($lg=="eg")
			      $anh=$rs_p["anh"];
			   if($lg=="kr")
			      $anh=$rs_p["anh_nho_1"];
				
				
			?>
			<SCRIPT language=JavaScript>
				function Check_Values_banner(form)
				{
				if(form.ten.value =="")
				 {
					alert("Please enter title!");
					form.ten.focus();
					return (false);
				  }   
				}
				</SCRIPT>

			 <FORM  method="post" ENCTYPE="multipart/form-data" name="form" action="admin_edit_save.php?id=<?=$id?>&save=banner&start=<?=$HTTP_GET_VARS["start"]?>" onsubmit="return Check_Values_banner(this)"> 
            <input type="hidden" name="cat" value="<?=$HTTP_GET_VARS["cat"];?>">
			 <input type="hidden" name="bac" value="<?=$bac?>">
			 <input type="hidden" name="lg" value="<?=$lg?>">
			 <? include("../tool/fckeditor.php") ;?>
					<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Edit banner";?></th>
							  </tr>
			    </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_typing?></td>
							  <td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
							</tr><tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="24%" valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
				              <td width="76%" height="22" valign=middle>
				                <input name="ten" value="<?=$rs_p["ten_$lg"]?>" style="width:400px;" onkeyup="initTyper(this);" class="input"/>
                                <span class="dot_do">*</span></td>
</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="22" valign=middle>
							    <input name="anh" type="hidden" value="<?=$anh?>" />
                                <input name="anh" type="text" class="input" id="anh" style="width:100px;" value="<?=$anh?>" disabled="disabled">
                                <br />
                                <input name="userfile" type="file" class="input" style="width:400px;" />
                                <span class="dot_do">*</span></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_type?></td>
							  <td height="20" valign=middle>JPN, GIF, SWF</td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link?></td>
							  <td height="20" valign=middle>
							    <textarea name="mo_ta" class="textarea" id="textarea" style="width:400px; height:60px;" onkeyup="initTyper(this);"><?=$rs_p["mo_ta_$lg"]?></textarea>							  </td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link_target?></td>
							  <td height="20" valign=middle><select name="target"  class="selected">
							<option value="" <? if($rs_p["target_$lg"]=="_blank") echo "selected"; ?>>No set</option>  
							<option value="_blank" <? if($rs_p["target_$lg"]=="_blank") echo "selected";?>>New window (_blank)</option>
							<option value="_top" <? if($rs_p["target_$lg"]=="_top") echo "selected"; ?>>Topmost window (_top)</option>
							<option value="_self" <? if($rs_p["target_$lg"]=="_self") echo "selected"; ?>>Same window (_self)</option>
							<option value="_parent" <? if($rs_p["target_$lg"]=="_top") echo "selected"; ?>>Parent window (_parent)</option>
							</select></td>
			   </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_short_content?></td>
							  <td height="20" valign=middle>
							    <?php
								$sBasePath = $_SERVER['PHP_SELF'] ;
								$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
								$oFCKeditor = new FCKeditor('ghi_chu') ;
								$oFCKeditor->Height = 200;
								$oFCKeditor->BasePath	= $sBasePath ;
								$oFCKeditor->Value		= $rs_p["ghi_chu_$lg"];
								$oFCKeditor->Create() ;
								?>
							  </td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
								<input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
								<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
								<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>							  </td>
			    </tr>
	    </form>
	  </table></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
