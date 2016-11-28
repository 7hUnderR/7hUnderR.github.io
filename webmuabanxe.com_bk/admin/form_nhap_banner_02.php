<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" height="497" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
    <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" valign="middle" class="bg_title"><? include("inc/inc_path_top.php");?></td>
  </tr>
      <tr>
        <td height="469" valign="top" class="bg_center">
		  <table id="datatable" class="tbldata" cellpadding=10 width="600" cellspacing=0 border=0>
              <!--DWLayoutTable-->
			   <SCRIPT language=JavaScript>
				function Check_Values_banner(form)
				{
				if(form.ten.value =="")
				 {
					alert("Please enter title!");
					form.ten.focus();
					return (false);
				  }   
				
				if(form.userfile.value =="")
				 {
					alert("Please enter Images/Flash!");
					form.userfile.focus();
					return (false);
				  }   
				}
				</SCRIPT>

             <FORM  method="post" ENCTYPE="multipart/form-data" name="form" action="admin_add.php?ma_add=banner" onsubmit="return Check_Values_banner(this)"> 
			  <INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
			  <INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
			  <INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
			  <? include("../tool/fckeditor.php") ;?>
			  	<thead>
				  <tr>
					<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Add  banner";?></th>
				  </tr>
			    </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_typing?></td>
							  <td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
							</tr><tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="24%" valign=middle class="tab_10_bg_1"><?=$view_item_tieude ?></td>
				              <td width="76%" height="22" valign=middle><input name="ten"style="width:400px;" class="input" onKeyUp="initTyper(this);" />
			  <span class="dot_do"> *</span></td>
</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="22" valign=middle><input name="userfile" type="file" class="input" style="width:400px;">
                <span class="dot_do">*</span>                </td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_type?></td>
							  <td height="20" valign=middle>JPN, GIF, SWF</td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link?></td>
							  <td height="20" valign=middle><textarea name="mo_ta" class="textarea" id="textarea" style="width:400px; height:60px;" onKeyUp="initTyper(this);"></textarea></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link_target?></td>
							  <td height="20" valign=middle><select name="target"  class="selected">
							<option value="" selected="selected">No set</option>  
							<option value="_blank">New window (_blank)</option>
							<option value="_top">Topmost window (_top)</option>
							<option value="_self">Same window (_self)</option>
							<option value="_parent">Parent window (_parent)</option>
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
							$oFCKeditor->Value		= " " ;
							$oFCKeditor->Create() ;
							?></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
							<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
							<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
							<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
							  </td>
			    </tr>
	    </form>
	  </table></td>
  </tr>
    </table></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
