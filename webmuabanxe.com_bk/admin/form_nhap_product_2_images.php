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
	
	<form method="post" action="admin_add.php?ma_add=add_product_2_images" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
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
	  <input name="ten" type="text" class="input" id="ten" style="width:600px;" onkeyup="initTyper(this);"/>
*</span></td>
	</tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
	  <td valign="middle" class="tab_10_bg_1"><?=$view_item_short_content;?></td>
	  <td height="22" valign="middle"><?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('ghi_chu');
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= " ";
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
				$oFCKeditor->Value		= " ";
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="middle" class="tab_10_bg_1"><?=$view_item_nguyen_hop;?></td>
	  <td height="22" valign="middle"><?php
				$oFCKeditor = new FCKeditor('product_nguyen_hop') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= " ";
				$oFCKeditor->Create() ;
				?></td>
	  </tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="middle" class="tab_10_bg_1"><? echo "Hỗ trợ:"; ?></td>
	  <td height="22" valign="middle"><?php
				$oFCKeditor = new FCKeditor('product_ho_tro');
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 150;
				$oFCKeditor->Width = 650;
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
	<td height="20" valign=middle><img src='images/images.gif' width='50' height='50' name='Img2' border='1' ><br /><input name="userfile" type="file" class="input" style="width:300px;" onChange='Img2.src=this.value;'>
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
                            <td width="155" height="40" valign="top" class="text" ><?=$view_item_code ?>
                              <br />
                              <input name="product_code" type="text" class="input" id="product_code" style="width:150px;" height="19" /></td>
                            <td width="155" valign="top" class="text" ><?=$view_item_price ?>
                              <br />
                              <input name="product_price" type="text" class="input" id="product_price" style="width:150px;" size="15" height="19" /></td>
                          <td colspan="2" valign="top" class="text" ><?=$view_item_sell_off ?>
                            <br />
                            <input name="product_sell_off" type="text" class="input" id="product_sell_off" style="width:150px;" size="50" height="19" /></td></tr>
                          <tr>
                            <td height="40" valign="top"  class="text" ><?=$view_item_qty ?>
                              <br />
                              <input name="product_quality" type="text" class="input" id="product_quality" style="width:150px;" size="15" height="19" /></td>
                            <td valign="top"  class="text" ><?=$view_item_bao_hanh;?>
                              <br />
                              <input name="product_bao_hanh" id="product_bao_hanh" type="text" class="input" style="width:150px;" size="15" height="19" /></td>
                            <td colspan="2" valign="top" class="text" ><?=$view_item_visitors;?>
                              <br />
                              <input name="product_visitors" id="product_visitors" type="text" class="input" style="width:150px;" value="0" size="15" height="19" /></td>
                          </tr>
                          <tr>
                            <td height="41" valign="top" class="text" ><?=$view_item_mark ?>
                              <br />
                              <select name="product_mark" class="selected" id="product_mark">
                                <option value="1" selected="selected">*</option>
                                <option value="2">**</option>
                                <option value="3">***</option>
                                <option value="4">****</option>
                                <option value="5">*****</option>
                              </select></td>
                            <td valign="top" class="text" ><?=$view_item_status;?>
                              <br />
                              <select name="product_status" class="selected" id="select2">
                                <? 
					$query_t = "Select * FROM tb_product_status order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td width="171" valign="top" class="text"><?=$view_item_type;?>
                              <br />
                              <select name="product_type" class="selected" id="select">
                                <? 
					$query_t = "Select * FROM tb_product_type order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                          <td width="133" class="text">
                            <?=$view_item_cho_ngoi;?>
                            <br />
                            <select name="tb_product_cho_ngoi" class="selected" id="select6">
                              <? 
								$query_t = "Select * FROM tb_product_type_2 order by thu_tu ASC";
								$result_t = mysql_query($query_t);
								while($rs_t= mysql_fetch_array($result_t)) {?>
                              <option value="<?=$rs_t["code"]?>">
                              <?=$rs_t["name_$lg"]?>
                              </option>
                              <? }?>
                            </select>
                          </td>
                          </tr>
                          <tr>
                            <td height="41" valign="top" class="text" ><?=$view_item_catalog;?>
                              <br />
                              <select name="product_catalog" class="selected" id="select5">
                                <? 
					$query_t = "Select * FROM tb_product_type_5 order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td class="text"><?=$view_item_thang_gia;?>
                              <br />
                              <select name="product_thang_gia" class="selected" id="select4">
                                <? 
					$query_t = "Select * FROM tb_product_thang_gia order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td valign="top" class="text" ><?=$view_item_nam_san_xuat;?>
                              <br />
                              <select name="product_nam_san_xuat" class="selected" id="select3">
                                <? 
					$query_t = "Select * FROM tb_product_type_4 order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                                <option value="<?=$rs_t["code"]?>">
                                <?=$rs_t["name_$lg"]?>
                                </option>
                                <? }?>
                              </select></td>
                            <td class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="41" colspan="4" valign="top" class="text" ><?=$view_item_price_note;?>
                              <br />
                              <input name="product_price_note" id="product_price_note" type="text" class="input" style="width:350px;" size="15" height="19" /></td>
                          </tr>
                          <tr>
                            <td height="41" colspan="4" valign="top" class="text" >
							<?=$view_item_tien_nghi;?>
	   <table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr><? 
							 $table="tb_product_type_3";
							 $query = "Select * FROM  $table order by thu_tu ASC";
							 $result = mysql_query($query);
							 $i=0;
							 while ($rs= mysql_fetch_array($result)){ $i++;?>                                      
	                                    <td height="21" valign="top">
										<input name="chkid_service" type=checkbox id="chkid_service" value="<? echo"$rs[code]"?>">							    
	                                    <? echo $rs["name_$lg"]; ?></td>
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
				$value_content='<table cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" bgcolor="#E9E9E9"><strong>&#272;&#7862;T T&Iacute;NH K&#7928; THU&#7852;T </strong></td>
    <td align="middle" bgcolor="#E9E9E9"><strong>M&Ocirc; T&#7842; </strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">&#272;&#7897;ng c&#417;</td>
    <td align="left" bgcolor="#F8F8F8">2.0 l&iacute;t (1TR-FE)</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&#7897;p s&#7889;</td>
    <td align="left" bgcolor="#F8F8F8">5 s&#7889; tay</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">S&#7889; ch&#7895; ng&#7891;i</td>
    <td align="left" bgcolor="#F8F8F8">8 ch&#7895;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#E9E9E9"><strong>K&Iacute;CH TH&#431;&#7898;C &amp; TR&#7884;NG L&#431;&#7906;NG </strong></td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">K&iacute;ch   th&#432;&#7899;c t&#7893;ng th&#7875; - D x R x C</td>
    <td align="middle" bgcolor="#F8F8F8">mm</td>
    <td align="left" bgcolor="#F8F8F8">4555 x 1770 x 1745</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Chi&#7873;u d&agrave;i   c&#417; s&#7903;</td>
    <td align="middle" bgcolor="#F8F8F8">mm</td>
    <td align="left" bgcolor="#F8F8F8">2750</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Chi&#7873;u   r&#7897;ng c&#417; s&#7903; (Tr&#432;&#7899;c x sau)</td>
    <td align="middle" bgcolor="#F8F8F8">mm</td>
    <td align="left" bgcolor="#F8F8F8">1510 x 1510</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Kho&#7843;ng   s&aacute;ng g&#7847;m xe</td>
    <td align="middle" bgcolor="#F8F8F8">mm</td>
    <td align="left" bgcolor="#F8F8F8">176</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Tr&#7885;ng   l&#432;&#7907;ng kh&ocirc;ng t&#7843;i</td>
    <td align="middle" bgcolor="#F8F8F8">kg</td>
    <td align="left" bgcolor="#F8F8F8">1530</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Tr&#7885;ng   l&#432;&#7907;ng to&agrave;n t&#7843;i</td>
    <td align="middle" bgcolor="#F8F8F8">kg</td>
    <td align="left" bgcolor="#F8F8F8">2170</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#E9E9E9"><strong>KHUNG XE </strong></td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">H&#7879; th&#7889;ng   treo </td>
    <td align="middle" bgcolor="#F8F8F8">Tr&#432;&#7899;c</td>
    <td align="left" bgcolor="#F8F8F8">&#272;&#7897;c l&#7853;p v&#7899;i l&ograve; xo cu&#7897;n, &#273;&ograve;n k&eacute;p v&agrave; thanh c&acirc;n b&#7857;ng</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">&nbsp;</td>
    <td align="middle" bgcolor="#F8F8F8">Sau</td>
    <td align="left" bgcolor="#F8F8F8">4 &#273;i&#7875;m li&ecirc;n k&#7871;t, l&ograve; xo cu&#7897;n v&agrave; tay &#273;&ograve;n b&ecirc;n</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">Phanh</td>
    <td align="left" bgcolor="#F8F8F8">&ETH;&#297;a th&ocirc;ng gi&oacute;/ Tang tr&#7889;ng</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">B&aacute;n k&iacute;nh   quay v&ograve;ng t&#7889;i thi&#7875;u</td>
    <td align="middle" bgcolor="#F8F8F8">m</td>
    <td align="left" bgcolor="#F8F8F8">5.4</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Dung t&iacute;ch   b&igrave;nh x&#259;ng</td>
    <td align="middle" bgcolor="#F8F8F8">l&iacute;t</td>
    <td align="left" bgcolor="#F8F8F8">55</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">V&#7887; v&agrave; m&acirc;m xe</td>
    <td align="left" bgcolor="#F8F8F8">205/65R15 M&acirc;m &#273;&uacute;c</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#E9E9E9"><strong>&#272;&#7896;NG C&#416; </strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">Ki&#7875;u</td>
    <td align="left" bgcolor="#F8F8F8">4 xilanh th&#7859;ng h&agrave;ng, 16 van, cam k&eacute;p v&#7899;i VVT-i</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">Dung t&iacute;ch   c&ocirc;ng t&aacute;c</td>
    <td align="middle" bgcolor="#F8F8F8">cc</td>
    <td align="left" bgcolor="#F8F8F8">1998</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">C&ocirc;ng su&#7845;t   t&#7889;i &#273;a (SAE Net) <br /></td>
    <td align="middle" bgcolor="#F8F8F8">HP/rpm</td>
    <td align="left" bgcolor="#F8F8F8">134/5600</td>
  </tr>
  <tr>
    <td bgcolor="#F8F8F8">M&ocirc; men   xo&#7855;n t&#7889;i &#273;a (SAE Net)</td>
    <td align="middle" bgcolor="#F8F8F8">Kg.m/rpm</td>
    <td align="left" bgcolor="#F8F8F8">18.6/4000</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&#7879; th&#7889;ng phun nhi&ecirc;n li&#7879;u</td>
    <td align="left" bgcolor="#F8F8F8">EFI</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">Ti&ecirc;u chu&#7849;n kh&iacute; x&#7843;</td>
    <td align="left" bgcolor="#F8F8F8">Euro Step 2</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#E9E9E9"><strong>TRANG THI&#7870;T B&#7882; CH&Iacute;NH </strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">&#272;&egrave;n s&#432;&#417;ng m&ugrave; <br /></td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">B&#7843;ng &#273;&#7891;ng h&#7891; Optitron</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">M&agrave;n h&igrave;nh hi&#7875;n th&#7883; &#273;a th&ocirc;ng tin</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&#7879; th&#7889;ng &acirc;m thanh</td>
    <td align="left" bgcolor="#F8F8F8">AM/FM, CD, Mp3, WMA, 6 loa</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&#7879; th&#7889;ng &#273;i&#7873;u h&ograve;a</td>
    <td align="left" bgcolor="#F8F8F8">2 d&agrave;n l&#7841;nh</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">Kh&oacute;a c&#7917;a &#273;i&#7873;u khi&#7875;n t&#7915; xa</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">K&iacute;nh chi&#7871;u h&#7853;u &#273;i&#7873;u khi&#7875;n &#273;i&#7879;n</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">C&#7917;a s&#7893; &#273;i&#7873;u khi&#7875;n &#273;i&#7879;n</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">Ch&#7845;t li&#7879;u gh&#7871;</td>
    <td align="left" bgcolor="#F8F8F8">N&#7881; cao c&#7845;p</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&agrave;ng gh&#7871; tr&#432;&#7899;c</td>
    <td align="left" bgcolor="#F8F8F8">D&#7841;ng r&#7901;i, c&oacute; t&#7921;a &#273;&#7847;u, tr&#432;&#7907;t, ng&#7843; (ng&#432;&#7901;i l&aacute;i v&agrave; h&agrave;nh kh&aacute;ch), &#273;i&#7873;u   ch&#7881;nh &#273;&#7897; cao (ng&#432;&#7901;i l&aacute;i)</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&agrave;ng gh&#7871; th&#7913; 2</td>
    <td align="left" bgcolor="#F8F8F8">G&#7853;p 60/40, c&oacute; t&#7921;a &#273;&#7847;u, tr&#432;&#7907;t, ng&#7843; l&#432;ng gh&#7871;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">H&agrave;ng gh&#7871; th&#7913; 3</td>
    <td align="left" bgcolor="#F8F8F8">G&#7853;p sang 2 b&ecirc;n, c&oacute; t&#7921;a &#273;&#7847;u, ng&#7843; l&#432;ng gh&#7871;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">&#272;&egrave;n b&aacute;o phanh tr&ecirc;n cao</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">ABS h&#7879; th&#7889;ng ch&#7889;ng b&oacute; c&#7913;ng phanh (ABS)</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">C&#7843;m bi&#7871;n l&ugrave;i</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">S&#432;&#7903;i k&iacute;nh sau</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">G&#7841;t n&#432;&#7899;c ph&iacute;a sau <br /></td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">T&uacute;i kh&iacute;</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute; (Gh&#7871; ng&#432;&#7901;i l&aacute;i)</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">C&#7845;u tr&uacute;c gi&#7843;m ch&#7845;n th&#432;&#417;ng &#273;&#7847;u</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">C&#7897;t l&aacute;i t&#7921; &#273;&#7893;</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F8F8F8">D&acirc;y &#273;ai an to&agrave;n cho c&aacute;c gh&#7871;</td>
    <td align="left" bgcolor="#F8F8F8">C&oacute;</td>
  </tr>
</table>';
				
				$sBasePath = $_SERVER['PHP_SELF'];
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				$oFCKeditor->Width = 650;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $value_content;
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
				<input type="image" onClick="calculatechon_services();" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=""; Img2.src=""; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>	</td></tr>
	<INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
	<INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
	<INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
	<input type="hidden" name="chon_service" value="" />
	</form>
	</table></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
