<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"> <?=$add_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><?
								 $alpha=$HTTP_GET_VARS["alpha"];
								 $cat=$HTTP_GET_VARS["cat"];
								 $start=$HTTP_GET_VARS["start"];
								 $bac=$HTTP_GET_VARS["bac"];
								 $lg=$HTTP_GET_VARS["lg"];
							if($bac=="1")
							   {
							   	$ma_bac_5=0;
								$ma_bac_4=0;
								$ma_bac_3=0;
								$ma_bac_2=0;
  								$ma_bac_1=0;
							   }
							if($bac=="2")
							   {
							   	$ma_bac_5=0;
								$ma_bac_4=0;
								$ma_bac_3=0;
								$ma_bac_2=0;
								$ma_bac_1=$cat;
							   }
							if($bac=="3")
							   {
								$ma_bac_5=0;
								$ma_bac_4=0;
								$ma_bac_3=0;
								$ma_bac_2=$cat;
								$ma_bac_1=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat,"ma_bac_1");
							   }
							if($bac=="4")
							   {
								$ma_bac_5=0;
								$ma_bac_4=0;
								$ma_bac_3=$cat;
								$ma_bac_2=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_2");
								$ma_bac_1=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat,"ma_bac_1");
							   }
							if($bac=="5")
							   {
								$ma_bac_5=0;
								$ma_bac_4=$cat;
								$ma_bac_3=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_3");
								$ma_bac_2=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_2");
								$ma_bac_1=gia_tri_mot_cot("tb_bac_4 ","ma_bac_4",$cat,"ma_bac_1");
							   }
							?>
                    <table id="datatable" class="tbldata" cellpadding=10 width="600" cellspacing=0 border=0>
							 <!--DWLayoutTable-->
				        <form name="noi_dung" method="post" action="admin_add.php?ma_add=catalog&bac=<?=$bac?>" ENCTYPE="multipart/form-data">
						<input type="hidden" name="cat" value="<?=$cat?>">
						<input type="hidden" name="bac" value="<?=$bac?>">	
						<input type="hidden" name="lg" value="<?=$lg?>">							
						<input type="hidden" name="alpha" value="<?=$alpha?>">
						<input type="hidden" name="start" value="<?=$start?>">							
						<input type="hidden" name="ma_bac_1" value="<?=$ma_bac_1?>">
						<input type="hidden" name="ma_bac_2" value="<?=$ma_bac_2?>">
						<input type="hidden" name="ma_bac_3" value="<?=$ma_bac_3?>">
						<input type="hidden" name="ma_bac_4" value="<?=$ma_bac_4?>">
									<input type="hidden" name="ma_bac_5" value="<?=$ma_bac_5?>">	
															<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"New folder";?></th>
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
							</tr>
<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="29%" valign=middle class="tab_10_bg_1"><?=$main_tieu_de_trang?></td>
				              <td width="71%" height="22" valign=middle><input name="tendichvu" type="text" class="input" id="tendichvu" onkeyup="initTyper(this);" size="50" maxlength="255" style="width:300px;" /></td>
</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_description?></td>
							  <td height="22" valign=middle><span class="medium">
							    <input name="mo_ta_dv" type="text" class="input" id="mo_ta_dv2" onkeyup="initTyper(this);" size="50" maxlength="255" style="width:300px;" />
							  </span></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="userfile" type="file" class="input" id="userfile" style="width:300px;" />
							  </span></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="userfile_lon" type="file" class="input" id="userfile_lon" style="width:300px;" />
							  </span></td>
						  </tr>
						  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="userfile_1" type="file" class="input" id="userfile_1" style="width:300px;" />
							  </span></td>
						  </tr>
						  <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><? echo "$view_item_images/$view_item_flash"; ?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="userfile_1_lon" type="file" class="input" id="userfile_1_lon" style="width:300px;" />
							  </span></td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_short_content?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="ghi_chu" type="text" class="input" id="mo_ta_dv" onkeyup="initTyper(this);" size="50" maxlength="255" style="width:300px;" />
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
							$oFCKeditor->Value		= " ";
							$oFCKeditor->Create() ;
							?>							  </td>
						  </tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$view_item_link?></td>
							  <td height="20" valign=middle><span class="medium">
							    <input name="link" type="text" class="input" id="ghi_chu" onkeyup="initTyper(this);" size="50" maxlength="255" style="width:300px;" />
							  </span></td>
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
							  <td valign=middle class="tab_10_bg_1"><?=$main_tieu_de_trang?></td>
							  <td height="20" valign=middle><span class="medium">
							    <select name="trang"  class="selected" id="trang">
                                  <? 
										if($ma_user_admin==1)
										  $result=select_co_dk("tb_setup","ma_bac",$bac,"thu_tu","ASC");
										else
										  $result=select_co_2dk("tb_setup","ma_bac",$bac,"activate",1,"thu_tu","ASC");
										
										while($rs= mysql_fetch_array($result)) {?>
                                  <option value="<?=$rs["ma_dm"]?>">
                                    <?=$rs["ten_dm"]?>
                                  </option>
                                  <? }?>
                                </select>
							  </span></td>
							</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
								<input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
								<img src="images/reset.gif" onclick="noi_dung.reset()" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
								<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>							  </td>
			    </tr>
					  </form>
				  </table>
                   <? ?> </td></tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
