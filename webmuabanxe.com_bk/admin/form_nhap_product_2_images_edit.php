<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"><? 
						include("inc/inc_path_top.php");
						$id=$HTTP_GET_VARS["id"];
						
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
						$thu_tu = $rs_p["thu_tu"];
					?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
<br />

<table id="datatable" class="tbldata" cellpadding=5 width="750" cellspacing=0 border=0>
	<script language="javascript">
	function Check_Values_nhap(from)
	{
	if(from.ten.value ==""){
	alert("Please Enter Title!");
	from.ten.focus();
	return (false);
	} 
	}
	
	function calculatechon_services()
		{			
			var strchon="";
			var alen=document.noi_dung.elements.length;				
			
			alen=(alen>0)?document.noi_dung.chkid_service.length:0;
			if (alen>0)
			 {
				for(var i=0;i<alen;i++)
					if(document.noi_dung.chkid_service[i].checked==true)
						strchon+=document.noi_dung.chkid_service[i].value+",";
			 }
			else
			 {
				if(document.noi_dung.chkid_service.checked==true)
					strchon=document.noi_dung.chkid_service.value;
			 }				
			document.noi_dung.chon_service.value=strchon;	
		}
  </script>
	
	<form method="post" action="admin_edit_save.php?save=edit_product_2_images&id=<?=$HTTP_GET_VARS["id"]?>&lg=<?=$lg?>&start=<?=$HTTP_GET_VARS["start"]?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
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
	  <input name="ten" onKeyUp="initTyper(this);" type="text" class="input" id="ten" style="width: 600px;" value="<?=$rs_p["ten_$lg"];?>">
*</span></td>
	</tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
	  <td valign="middle" class="tab_10_bg_1"><?=$view_item_short_content;?></td>
	  <td height="22" valign="middle"><?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('ghi_chu') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["ghi_chu_$lg"];
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
	  <td valign="middle" class="tab_10_bg_1"><?=$view_item_khuyen_mai;?></td>
      <td height="22" valign="middle"><?php
				$oFCKeditor = new FCKeditor('product_khuyen_mai') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["product_khuyen_mai_$lg"];
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td valign="middle" class="tab_10_bg_1"><?=$view_item_nguyen_hop;?></td>
	  <td height="22" valign=middle><?php
				$oFCKeditor = new FCKeditor('product_nguyen_hop') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["product_nguyen_hop_$lg"];
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td valign="middle" class="tab_10_bg_1"><? echo "Hỗ trợ:"; ?></td>
	  <td height="22" valign=middle><?php
				$oFCKeditor = new FCKeditor('product_ho_tro') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["product_ho_tro_$lg"];
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><?=$view_item_small_images?></td>
	<td height="20" valign=middle><input name="anh_nho" type="hidden" value="<?=$rs_p["anh_nho"]?>">
                <img src='../images/photo/<?=$rs_p["anh_nho"]?>' width='50' height='50' name='Img1' border='1'><br />
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
	<td valign=middle class="tab_10_bg_1"><?=$view_item_images?></td>
	<td height="20" valign=middle><input name="anh" type="hidden" value="<?=$rs_p["anh"]?>">
                <img src='../images/photo/<?=$rs_p["anh"]?>' name='Img2' width='50' height='50' border='1' id="Img2"><br />
                <SELECT name="xoa" class="selected" id="xoa">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile" type="file" class="input" onChange='Img2.src=this.value;' style="width:400px;">
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
              </table>	  </td>
	</tr>
	    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	      <td valign=top class="tab_10_bg_1">&nbsp;</td>
	      <td height="20" valign=middle><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <!--DWLayoutTable-->
                          <tr>
                            <td width="157" height="40" valign="top" class="text" ><?=$view_item_code ?>
                              <br />
                              <input name="product_code" type="text" class="input" id="product_code" style="width:150px;" value="<?=$rs_p["product_code"];?>" height="19" /></td>
                            <td width="157" valign="top" class="text" ><?=$view_item_price ?>
                              <br />
                              <input name="product_price" type="text" class="input" id="product_price" style="width:150px;" value="<?=$rs_p["product_price"];?>" size="15" height="19" /></td>
                          <td colspan="2" valign="top" class="text" ><?=$view_item_sell_off ?>
                            <br />
                            <input name="product_sell_off" type="text" class="input" id="product_sell_off" style="width:150px;" value="<?=$rs_p["product_sell_off"];?>" size="50" height="19" /></td></tr>
                          <tr>
                            <td height="40" valign="top"  class="text" ><?=$view_item_qty ?>
                              <br />
                              <input name="product_quality" type="text" class="input" id="product_quality" style="width:150px;" value="<?=$rs_p["product_quality"];?>" size="15" height="19" /></td>
                            <td valign="top"  class="text" ><?=$view_item_bao_hanh;?>
                              <br />
                              <input name="product_bao_hanh" type="text" class="input" id="product_bao_hanh" style="width:150px;" value="<?=$rs_p["product_bao_hanh_$lg"];?>" height="19" /></td>
                            <td colspan="2" valign="top" class="text" ><?=$view_item_visitors;?>
                              <br />
                              <input name="product_visitors" type="text" class="input" id="product_visitors" style="width:150px;" value="<?=$rs_p["product_visitors"];?>" height="19" /></td>
                          </tr>
                          <tr>
                            <td height="41" valign="top" class="text" ><?=$view_item_mark ?>
                              <br />
                              <select name="product_mark" class="selected">
                                <option value="1" <? if($rs_p["product_mark"]=="1") echo"selected"; ?>>*</option>
                                <option value="2" <? if($rs_p["product_mark"]=="2") echo"selected"; ?>>**</option>
                                <option value="3" <? if($rs_p["product_mark"]=="3") echo"selected"; ?>>***</option>
                                <option value="4" <? if($rs_p["product_mark"]=="4") echo"selected"; ?>>****</option>
                                <option value="5" <? if($rs_p["product_mark"]=="5") echo"selected"; ?>>*****</option>
                              </select></td>
                            <td valign="top" class="text" ><?=$view_item_status;?>
                              <br />
                              <select name="product_status" class="selected" id="select2">
                                <? 
					$query_t = "Select * FROM tb_product_status order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option <? if($rs_t["code"]==$rs_p["product_status"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td width="168" valign="top" class="text"><?=$view_item_type;?>
                              <br />
                              <select name="product_type" class="selected" id="select">
                                <? 
					$query_t = "Select * FROM tb_product_type order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option <? if($rs_t["code"]==$rs_p["product_type"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                            </select></td>
                          <td width="132"><span class="text">
                            <?=$view_item_cho_ngoi;?>
                            <br />
                            <select name="product_cho_ngoi" class="selected" id="select5">
                              <? 
					$query_t = "Select * FROM tb_product_type_2 order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                              <option <? if($rs_t["code"]==$rs_p["product_cho_ngoi"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                              <?=$rs_t["name_$lg"]?>
                              </option>
                              <? }?>
                            </select>
                          </span></td>
                          </tr>
                          
                          <tr>
                            <td height="41" valign="top" class="text" ><?=$view_item_thang_gia;?>
                              <br />
                              <select name="product_thang_gia" class="selected" id="select4">
                                <? 
					$query_t = "Select * FROM tb_product_thang_gia order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option <? if($rs_t["code"]==$rs_p["product_thang_gia"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                                                            </select></td>
                            <td ><span class="text">
                              <?=$view_item_catalog;?>
                              <br />
                              <select name="product_catalog" class="selected" id="select3">
                                <? 
					$query_t = "Select * FROM tb_product_type_5 order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option <? if($rs_t["code"]==$rs_p["product_catalog"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select>
                            </span></td>
                            <td valign="top" class="text" ><?=$view_item_nam_san_xuat;?>
                              <br />
                              <select name="product_nam_san_xuat" class="selected" id="select6">
                                <? 
					$query_t = "Select * FROM tb_product_type_4 order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option <? if($rs_t["code"]==$rs_p["product_nam_san_xuat"]) echo "selected"; ?> value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="41" colspan="4" valign="top" class="text" ><?=$view_item_price_note;?>
                              <br />
                              <input name="product_price_note" type="text" class="input" id="product_price_note" style="width:350px;" value="<?=$rs_p["product_price_note_$lg"];?>" height="19" /></td>
                          </tr>
                          <tr>
                            <td height="41" colspan="4" valign="top" class="text" ><?=$view_item_tien_nghi;?>
	   <table width="100%" border="0" cellpadding="0" cellspacing="0">
							 <tr><? 
							 $services=$rs_p["product_tien_nghi_$lg"];
							 $services="'".str_replace (",", "','", $services);
							 $table="tb_product_type_3";
							 $query = "Select * FROM  $table order by thu_tu DESC ";
							 $result = mysql_query($query);
							 $i=0;
							 while ($rs_services= mysql_fetch_array($result))
							 { 
							 
							 $i++;?>
							 <td height="21" valign="top"><input name="chkid_service" type=checkbox id="chkid_service" value="<? echo"$rs_services[code]"?>" <? if(strstr("$services","'$rs_services[code]'")) echo "checked=\"checked\""; ?>  >							    
	                                    <? echo $rs_services["name_$lg"]; ?></td>
										 <? 
									  if($i==3)
									  {
									  echo "</tr>";
									  $i=0;
									  }
									  } ?> 
                                      </tr>
                              </table></td>
                    </tr>
                          
                          
					  

					  
                        </table></td>
	      </tr>
	    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1"><?=$view_item_content?></td>
	<td height="20" valign=middle><?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				//$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Width = 650;
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
                <input type="image" onClick="calculatechon_services();" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; Img2.src=''; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>	</td></tr>
	<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
	<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
	<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
	<INPUT name="page" value="<?=$HTTP_GET_VARS["page"]?>"type=hidden>
	<input type="hidden" name="chon_service" value="" />
	</form>
	</table>
<br />
				
				</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
