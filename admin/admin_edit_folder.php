<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><?=$update_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><? 
					$id=$HTTP_GET_VARS["id"];
					$lg=$HTTP_GET_VARS["lg"];
					$ma_edit=$HTTP_GET_VARS["ma_edit"];

					$bac=$HTTP_GET_VARS["bac"];
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
						$ma_dm=$rs["trang"];
						
						if($bac=="1"){
							$ten_dv=$rs["ten_$lg"];
						}
						if($bac=="2"){
						   $ten_dv=$rs["ten_$lg"];
						 }
						if($bac=="3"){
						   $ten_dv=$rs["ten_$lg"];
						}
						if($bac=="4"){
						   $ten_dv=$rs["ten_$lg"];
						 }
						if($bac=="5"){
						   $ten_dv=$rs["ten_$lg"];
						}
					?>
                  <table width="600" border=0 align="left" cellpadding=10 cellspacing=0 class="tbldata" id="datatable">
							 <!--DWLayoutTable-->
					<form name="noi_dung" method="post" ENCTYPE="multipart/form-data"  action="admin_edit_save.php?id=<? echo $id?>&save=<?=$ma_edit?>">							  <tr>
								
<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Edit folder";?></th>
							  </tr>
			    </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="22" valign=middle><input name="switcher" type="radio" onfocus="setTypingMode(0)" value="OFF" checked="checked">
								OFF
								  <input name="switcher" type="radio" onfocus="setTypingMode(1)" value="TELEX">
								TELEX
								<input name="switcher" type="radio" onfocus="setTypingMode(2)" value="VNI">
								VNI</td>
							</tr><tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="24%" valign=middle class="tab_10_bg_1"><?=$main_tieu_de_trang?></td>
				              <td width="76%" height="22" valign=middle><input name="tendichvu" type="text" class="input" id="tendichvu" onkeyup="initTyper(this);" value="<?=$ten_dv?>" size="50" maxlength="255" style="width:300px;" /></td>
</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_description?></td>
							  <td height="22" valign=middle><span class="medium">
							    <input name="mo_ta_dv" type="text" class="input" id="mo_ta_dv2" onkeyup="initTyper(this);" value="<?=$rs["mo_ta_$lg"]?>" size="50"  maxlength="255" style="width:300px;" />
							  </span></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="anh" type="hidden" value="<?=$rs["anh"]?>" />
                                <? 
								$anh_01 =$rs["anh"];
								if($anh_01!="")
								{
								if((strstr($anh_01,".SWF")) || (strstr($anh_01,".swf")) )
								   echo"<span class=lot> | <a href=\"../images/danh_muc/$anh_01\" target=_blank>$view_item_flash</a></span>";
								else
								   echo"<a onclick=\"javascript: popupImage('../images/danh_muc/$rs[anh]?>')\" href=\"#\"><img src=\"../images/danh_muc/$rs[anh]\" width=\"30\" height=\"20\" border=\"0\"></a>";
								}
								
								?>
                                <br />
                                <select name="xoa_anh"  class="selected" id="select2">
                                  <? if($rs["anh"]=="") {?>
                                  <option value="2">Upload images </option>
                                  <? } else {?>
                                  <option value="0">Save this images </option>
                                  <option value="1">Delete this image</option>
                                  <? }?>
                                </select>
                                <br />
                                <input name="userfile" type="file" class="input" id="userfile" style="width:300px;" />
                              </span></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="anh_lon" type="hidden" value="<?=$rs["anh_lon"]?>" />
                                <?
									if($rs["anh_lon"]!=""){
									echo"<a onclick=\"javascript: popupImage('../images/danh_muc/$rs[anh_lon]?>')\" href=\"#\"><img src=\"../images/danh_muc/$rs[anh_lon]\" width=\"30\" height=\"20\" border=\"0\"></a>";
									}
								  ?>
                                <br />
                                <select name="xoa_anh_lon"  class="selected" id="xoa_anh_lon">
                                  <? if($rs["anh_lon"]=="") {?>
                                  <option value="2">Upload images </option>
                                  <? } else {?>
                                  <option value="0">Save this images </option>
                                  <option value="1">Delete this image</option>
                                  <? }?>
                                </select>
                                <br />
                                <input name="userfile_lon" type="file" class="input" id="userfile_lon"  maxlength="255" style="width:300px;" />
                              </span></td>
						  </tr>
						  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="anh_1" type="hidden" value="<?=$rs["anh_1"]?>" />
                                <?
									if($rs["anh_1"]!=""){
									echo"<a onclick=\"javascript: popupImage('../images/danh_muc/$rs[anh_1]')\" href=\"#\"><img src=\"../images/danh_muc/$rs[anh_1]\" width=\"30\" height=\"20\" border=\"0\"></a>";
									}
								  ?>
                                <br />
                                <select name="xoa_anh_1"  class="selected" id="xoa_anh_1">
                                  <? if($rs["anh_1"]=="") {?>
                                  <option value="2">Upload images </option>
                                  <? } else {?>
                                  <option value="0">Save this images </option>
                                  <option value="1">Delete this image</option>
                                  <? }?>
                                </select>
                                <br />
                                <input name="userfile_1" type="file" class="input" id="userfile_1"  maxlength="255" style="width:300px;" />
                              </span></td>
						  </tr>
						  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="anh_1_lon" type="hidden" value="<?=$rs["anh_1_lon"]?>" />
                                <?
									if($rs["anh_1_lon"]!="")
									{
									echo"<a onclick=\"javascript: popupImage('../images/danh_muc/$rs[anh_1_lon]')\" href=\"#\"><img src=\"../images/danh_muc/$rs[anh_1_lon]\" width=\"30\" height=\"20\" border=\"0\"></a>";
									}
								  ?>
                                <br />
                                <select name="xoa_anh_1_lon"  class="selected" id="xoa_anh_lon">
                                  <? if($rs["anh_1_lon"]=="") {?>
                                  <option value="2">Upload images </option>
                                  <? } else {?>
                                  <option value="0">Save this images </option>
                                  <option value="1">Delete this image</option>
                                  <? }?>
                                </select>
                                <br />
                                <input name="userfile_1_lon" type="file" class="input" id="userfile_1_lon"  maxlength="255" style="width:300px;" />
                              </span></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_short_content?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="ghi_chu" type="text" class="input" id="ghi_chu" onkeyup="initTyper(this);" value="<?=$rs["ghi_chu_$lg"]?>" size="50"  maxlength="255" style="width:300px;" />
							  </span></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=top class="tab_10_bg_1"><?=$view_item_content?></td>
							  <td height="20" valign=middle>
							<?php
							include("../tool/fckeditor.php") ;
							$sBasePath = $_SERVER['PHP_SELF'] ;
							$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
							$oFCKeditor = new FCKeditor('noi_dung') ;
							$oFCKeditor->ToolbarSet	= 'Basic' ;
							$oFCKeditor->Height = 200;
							$oFCKeditor->BasePath	= $sBasePath ;
							$oFCKeditor->Value		= $rs["noi_dung_$lg"];
							$oFCKeditor->Create() ;
							?>							  </td>
						  </tr>
						  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="link" type="text" class="input" id="link" onkeyup="initTyper(this);" value="<?=$rs["link_$lg"]?>" size="50"  maxlength="255" style="width:300px;" />
							  </span></td>
					  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link_target?></td>
							  <td height="20" valign=middle><select name="target"  class="selected">
							<option value="" <? if($rs["target_$lg"]=="_blank") echo "selected"; ?>>No set</option>  
							<option value="_blank" <? if($rs["target_$lg"]=="_blank") echo "selected";?>>New window (_blank)</option>
							<option value="_top" <? if($rs["target_$lg"]=="_top") echo "selected"; ?>>Topmost window (_top)</option>
							<option value="_self" <? if($rs["target_$lg"]=="_self") echo "selected"; ?>>Same window (_self)</option>
							<option value="_parent" <? if($rs["target_$lg"]=="_top") echo "selected"; ?>>Parent window (_parent)</option>
							</select></td>
						   </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$main_tieu_de_trang?></td>
							  <td height="20" valign=middle>
							 <select name="trang"  class="selected" id="trang">
							 <? 
							 if($ma_user_admin==1)
							    $result=select_co_dk("tb_setup","ma_bac",$bac,"thu_tu","ASC");
							 else
							    $result=select_co_2dk("tb_setup","ma_bac",$bac,"activate",1,"thu_tu","ASC");
								
							 while($rs= mysql_fetch_array($result)) {?>
							<option value="<?=$rs["ma_dm"]?>" <? if($ma_dm==$rs["ma_dm"]) echo"selected";?> > <? echo $rs["ten_dm"]; ?> </option>
							<? }?>
							</select>
							 <input name="bac" type="hidden" id="bac" value="<?=$bac?>">
							 <input name="cat" type="hidden" id="cat" value="<? echo $HTTP_GET_VARS["cat"]?>">
							 <input name="alpha" type="hidden" id="alpha" value="<? echo $HTTP_GET_VARS["alpha"]?>">
							 <input name="start" type="hidden" id="start" value="<? echo $HTTP_GET_VARS["start"]?>">
							 <input name="lg" type="hidden" id="start" value="<? echo $HTTP_GET_VARS["lg"]?>">						  </td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle> 
							  <input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
								<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
								<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>				</td>
			    </tr>
				    </form>
				  </table>
                  <br>
                </p></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
