<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="80%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
					$cat=$HTTP_GET_VARS["cat"]; 
					$bac="1";
					if(isset($HTTP_GET_VARS["bac"])&&$HTTP_GET_VARS["bac"]>0&&$HTTP_GET_VARS["bac"]<=5){
						$bac=$HTTP_GET_VARS["bac"]; 
					}
					if(isset($HTTP_GET_VARS["lg"])){
						$lg = $HTTP_GET_VARS["lg"];
					}					
					?><a href="index.php?cat=0&lg=<?=$lg?>&bac=1&alpha=All&start=0&lg=<?=$lg?>"><img src="images/home.gif" width="14" height="14" border="0"> Index</a>
					<? include("inc/inc_path_view_detail.php");?>				</td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr align="left"> 
                  <td colspan="10" valign="top">
				    <script language="JavaScript" type="text/JavaScript">
						<!--
						function MM_openBrWindow(theURL,winName,features) { //v2.0
						  window.open(theURL,winName,features);
						}
						//-->
						</script>
						<SCRIPT language=JavaScript>
							function view(id)
									{
										var arg= "width=350,height=410,resizable=no,scrollbars=no,status=0,top=0,left=0";			
										window.open ("inc/popup_images.php?ma=product&id="+ id ,"a",arg);	
										
									}
							function view_content(id, lg){
								var arg= "width=450,height=550,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
								window.open ("inc/popup_content_product_2_images.php?ma=product&id="+ id + "&lg=" + lg,"a",arg);	
										
							}
						    
							function edit_content(id, lg, page){
								var arg= "width=570,height=470,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
								window.open ("inc/popup_content_product_edit.php?id="+ id + "&lg=" + lg +"&page=" + page,"a",arg);	
										
							}
							
							function edit_content_news(id, lg, page){
								var arg= "width=570,height=470,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
								window.open ("inc/popup_view_all_news.php?id="+ id + "&lg=" + lg +"&page=" + page,"a",arg);	
										
							}

						</SCRIPT>
				  <? 
				  include("inc/inc_top_view_detail.php");
				  ?>
				  </td>
                </tr>
				<tr >
                  <td height="0" colspan="10" valign="middle">
	        <form name=messageList ENCTYPE="multipart/form-data" method=post action="admin_edit_save.php?save=sort_product">
			<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
				<thead>
				<tr>
				<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select or deselect all messages"></th>
				<th width=20% id="senderheader"><?=$view_item_tieude?></th>
				<th id="subjectheader" width=12%><?=$main_tieu_de_thong_ke?></th>
				<th width="4%" id="subjectheader"><?=$view_item_ma ?></th>
				<th width="8%" id="subjectheader"><?=$view_item_price ?></th>
				<th width="8%" id="subjectheader"><?=$view_item_status;?></th>
				<th width="4%" id="subjectheader"><?=$view_item_type;?></th>
				<th width="4%" id="subjectheader"><?=$view_item_content_1;?></th>
				<th width="20%" id="subjectheader"><?=$view_item_content_2;?> <?=$view_item_content_3;?> <?=$view_item_content_4;?> <?=$view_item_content_5;?></th>
				<th id="subjectheader" width=7%><?=$main_tieu_de_thu_tu?></th>
				<th id="subjectheader" width=5%><?=$edit_page?></th>
				</tr>
				</thead>
				<tbody>
				<input type="hidden" name="cat" value="<?=$cat?>">
				<input type="hidden" name="bac" value="<?=$bac?>">
				<input type="hidden" name="alpha" value="<?=$alpha?>">
				<input type="hidden" name="start" value="<?=$start?>">
				<input type="hidden" name="lg" value="<?=$lg?>">
                 <? 
				 while ($rs= mysql_fetch_array($result)) 
				 { 
				  $id=$rs["id"];
				  $ma_dv=$rs["ma_dv"];
				  $ma_dv_tp=$rs["ma_dv_tp"];
				  $ten_dv_tp=gia_tri_mot_cot("tb_ma_dv_tp","ma_dv_tp",$ma_dv_tp,"ten_dv_tp_vn");
				  $ma_dv_ct=$rs["ma_dv_ct"];
				  $ten_dv_ct=gia_tri_mot_cot("tb_ma_dv_ct","ma_dv_ct",$ma_dv_ct,"ten_dv_ct_vn");
				  $ma_dv_ct_s=$rs["ma_dv_ct_s"];
				  $ten_dv_ct_s=gia_tri_mot_cot("tb_ma_dv_ct_s","ma_dv_ct_s",$ma_dv_ct_s,"ten_dv_ct_s_vn");
  				  $ma_dv_ct_s_s=$rs["ma_dv_ct_s_s"];
				  $ten_dv_ct_s_s=gia_tri_mot_cot("tb_ma_dv_ct_s_s","ma_dv_ct_s_s",$ma_dv_ct_s_s,"ten_dv_ct_s_s_vn");

				  $nguoi_viet=gia_tri_mot_cot("tb_admin","ma_user",$rs["nguoi_viet"],"user");
				  $i++;
				  ?>
				<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#F1F1F1';>
				<td align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$id?>"></td>
				<td><input name="ten_<?=$i?>"  class="input" type="text"  size="40" value="<?=$rs["ten_$lg"]?>"/></td>
				<td class="lot"><? echo"| <a href=javascript:view_content('$id','$lg')><b>?</b></a> | "; ?><?
				  if($rs["ngoai_index"]==1) echo"<span class=dot_xanh>On</span>"; else echo"<span class=dot_do>Off</span>";
				  echo" | ";
				  if($rs["activate_"]==1) echo"<span class=dot_xanh>On</span>"; else echo"<span class=dot_do>Off</span>";
				  echo" | ";
				  if($rs["activate"]==1) echo"<span class=dot_xanh>On</span>"; else echo"<span class=dot_do>Off</span>";
				  ?></td>
				<td ><input name="code_<?=$i?>"  class="input" size="6" value="<?=$rs["product_code"]?>"/></td>
				<td ><input name="price_<?=$i?>" class="input" size="10" value="<?=$rs["product_price"]?>"/></td>
				<td><select name="product_status_<?=$i?>" class="selected" id="select">
                  <? 
					$query_t = "Select * FROM tb_product_status order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                  <option <? if($rs_t["code"]==$rs["product_status"]) echo "selected"; ?> value="<?=$rs_t["code"]?>"><?=$rs_t["name_$lg"]?></option>
                  <? }?>
                </SELECT></td>
				<td><select name="product_type_<?=$i?>" class="selected" id="select">
                  <? 
					$query_t = "Select * FROM tb_product_type order by thu_tu ASC";
					$result_t = mysql_query($query_t);
					while($rs_t= mysql_fetch_array($result_t)) {?>
                  <option <? if($rs_t["code"]==$rs["product_type"]) echo "selected"; ?> value="<?=$rs_t["code"]?>"><?=$rs_t["name_$lg"]?></option>
                  <? }?>
                </SELECT></td>
				<td><input type="hidden" name="qty_<?=$i?>" class="input" size="10" value="<?=$rs["product_quality"]?>"/>
				  <? 
				  $baiviet=gia_tri_mot_cot("tb_bac_1","trang",3,"ma_bac_1");
				  echo"<a href=\"admin_view_news_hoat_hong.php?cat_product=$cat&bac_product=$bac&start_product=$start&lg=$lg&id_product=$id&cat=$baiviet&bac=1&start=0&lg=$lg\">$view_item_content_1</a"; ?></td>
				<td><? echo"<a href=javascript:edit_content('$id','$lg','1')>$view_item_content_2</a>"; ?>
				    <? echo"<a href=javascript:edit_content('$id','$lg','2')>$view_item_content_3</a>"; ?>
				  <? echo"<a href=javascript:edit_content('$id','$lg','3')>$view_item_content_4</a>"; ?> 
				  <? echo"<a href=javascript:edit_content('$id','$lg','4')>$view_item_content_5</a>"; ?>
				  <? echo"<a href=javascript:edit_content('$id','$lg','5')>$view_item_content_6</a>"; ?>
  				  <input type="hidden" name="sell_off_<?=$i?>" class="input" size="10" value="<?=$rs["product_sell_off"]?>"/>				  </td>
				<td><input type="hidden" name="id_<?=$i?>" value="<?=$rs["id"]?>">
                  <input name="thu_tu_<?=$i?>" type="text"  class="input" size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();"></td>
				<td align="center">
				  <? 
				  include("inc/inc_edit_item.php");
				  ?>				</td>
				</tr>
				<? } ?>
				</tbody>
			</table>
				 <? 
				 include("inc/inc_nut_nhan.php"); 
				 ?>
				<INPUT type=hidden value='' name="chon">
			    </form>
				  </td>
               </tr>
                  </table>
              </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>