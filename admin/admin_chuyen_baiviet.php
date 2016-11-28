<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$view_item_chuyen?></td>
             </tr>
              <tr>
                <td valign="top" class="bg_center"><br>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
             <? 
				if(strstr($_SERVER["QUERY_STRING"],"post"))
					{
						$cat = $HTTP_POST_VARS["cat"];
						$bac = $HTTP_POST_VARS['bac'];
						$lg = $HTTP_POST_VARS['lg'];
						$id =$HTTP_POST_VARS["chon"];
						$start=$HTTP_POST_VARS["start"];
						include("inc/inc_cat.php");
					}
				else
					{
						$cat = $HTTP_GET_VARS["cat"];
						$bac = $HTTP_GET_VARS['bac'];
						$lg = $HTTP_GET_VARS['lg'];
						$id =$HTTP_GET_VARS["id"];
						$start=$HTTP_GET_VARS["start"];
						include("inc/inc_cat_get.php");		
					}
			   //echo"$bac, $cat|$cat_s|$cat_s_s";
			?>
			 <FORM  method="post" ENCTYPE="multipart/form-data" name="form" action="admin_edit_save.php?cat=<?=$HTTP_GET_VARS["cat"];?>&id=<?=$id?>&save=chuyen_baiviet&start=<?=$start?>&lg=<?=$lg?>"> 
             <input type="hidden" name="ma_bac_2" value="0">
			 <input type="hidden" name="ma_bac_3" value="0">
			 <input type="hidden" name="ma_bac_4" value="0">
			 <input type="hidden" name="ma_bac_5" value="0">
			 <input type="hidden" name="bac" value="<?=$bac?>">
			 
			<tr>
                <td width="231" height="31" align="right" valign="middle" class="text">Catalog:</td>
              <td width="562" align="left" valign="middle" class="tab_left_10">
                <SELECT name="ma_bac_1" class="input" onChange="MM_jumpMenu('parent',this,0)" id="select" style="width:300px;">
                  <option value="javascript:;" selected>Select Catalog</option>
                  <?				  	
					if($ma_user_admin==1)
					$result=select_ko_dk("tb_bac_1","thu_tu","ASC");
					else
					$result=select_co_dk("tb_bac_1","activate_setup",1,"thu_tu","ASC");
					while($rs = mysql_fetch_array($result)) {?>
                  <option <? if ($cat==$rs["ma_bac_1"]) echo"selected"?> value="admin_chuyen_baiviet.php?cat=<?=$rs["ma_bac_1"]?>&bac=1&id=<?=$id?>&start=<?=$start?>&lg=<?=$lg?>">
				  	<?
					echo $rs["ten_$lg"];
					?>
				  </option>
                 <? }?>
                </SELECT>
                <span class="dot_do">*</span> </td>
               </tr>
                      <?
						    $tam=0;
							$tam=dem_max_2dk("tb_bac_2","ma_bac_1","$cat","activate_setup",1);
							if($tam!=0){
						?> 
						  <tr>
	                        <td height="35" align="right" valign="middle" bgcolor="#FFFFFF"  class="text"> Sub Category:</td>
                          <td valign="middle" bgcolor="#FFFFFF" class="tab_left_10">
                          <select name="ma_bac_2" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select2" class="input" style="width:300px;">
                            <option value="admin_chuyen_baiviet.php?<?=$_SERVER["QUERY_STRING"]?>" selected>-Select catelory type- </option>
                          <? 
						      if($ma_user_admin==1)
							  $result=select_co_dk("tb_bac_2","ma_bac_1",$cat,"thu_tu","ASC");
							  else
							  $result=select_co_2dk("tb_bac_2","ma_bac_1",$cat,"activate_setup",1,"thu_tu","ASC");
							   
							  while($rs= mysql_fetch_array($result)) {?>
                            <option <? if ($cat_s==$rs["ma_bac_2"]) echo"selected"?> value="admin_chuyen_baiviet.php?cat=<?=$rs["ma_bac_2"]?>&bac=2&id=<?=$id?>&start=<?=$start?>&lg=<?=$lg?>">
								<?
								echo $rs["ten_$lg"];
								?>
							</option>
                           <? }?>
                          </select></td>
                        </tr>
						<? }
						    $tam=0;
							$tam=dem_max_2dk("tb_bac_3","ma_bac_2","$cat_s","activate_setup",1);
							if($tam!=0){
						?> 
						   <tr>
                             <td height="35" align="right" valign="middle" bgcolor="#FFFFFF" class="text">Sub Sub Category:</td>
                            <td valign="middle" bgcolor="#FFFFFF" class="tab_left_10">
                            <select name="ma_bac_3" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select2" class="input" style="width:300px;">
                              <option value="admin_chuyen_baiviet.php?<?=$_SERVER["QUERY_STRING"]?>" selected >-Select catelory type- </option>
				              <? 
							  if($ma_user_admin==1)
							     $result=select_co_dk("tb_bac_3","ma_bac_2",$cat_s,"thu_tu","ASC");
							  else
							     $result=select_co_2dk("tb_bac_3","ma_bac_2",$cat_s,"activate_setup",1,"thu_tu","ASC");
							  while($rs= mysql_fetch_array($result)) {?>
                              <option <? if ($cat_s_s==$rs["ma_bac_3"]) echo"selected"?> value="admin_chuyen_baiviet.php?cat=<?=$rs["ma_bac_3"]?>&bac=3&id=<?=$id?>&start=<?=$start?>&lg=<?=$lg?>">
							  	<?
								echo $rs["ten_$lg"];
								?>
							  </option>
                              <? } ?>
                            </select>
                           </td>
                          </tr>
						<? }
							$tam=0;
							$tam=dem_max_2dk("tb_bac_4 ","ma_bac_3","$cat_s_s","activate_setup",1);
							if($tam!=0){
						?> 
						   <tr>
                             <td height="35" align="right" valign="middle" bgcolor="#FFFFFF" class="text">Sub Sub Sub Category:</td>
                            <td valign="middle" bgcolor="#FFFFFF" class="tab_left_10">
                            <select name="ma_bac_4" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select2" class="input" style="width:300px;">
                              <option value="admin_chuyen_baiviet.php?<?=$_SERVER["QUERY_STRING"]?>" selected >-Select Sub Sub Sub catelory- </option>
				              <? 
							  if($ma_user_admin==1)
							    $result=select_co_dk("tb_bac_4 ","ma_bac_3",$cat_s_s,"thu_tu","ASC");
							  else
							    $result=select_co_2dk("tb_bac_4 ","ma_bac_3",$cat_s_s,"activate_setup",1,"thu_tu","ASC");
								
							  while($rs= mysql_fetch_array($result)) {?>
                              <option <? if ($cat_s_s_s==$rs["ma_bac_4"]) echo"selected"?> value="admin_chuyen_baiviet.php?cat=<?=$rs["ma_bac_4"]?>&bac=4&id=<?=$id?>&start=<?=$start?>&lg=<?=$lg?>">
								  <?
									echo $rs["ten_$lg"];
								?>
								</option>
                              <? } ?>
                            </select>
                           </td>
                          </tr>
						<? }
							$tam=0;
							$tam=dem_max_2dk("tb_bac_5","ma_bac_4","$cat_s_s_s","activate_setup",1);
							if($tam!=0){
						?> 
						   <tr>
                             <td height="35" align="right" valign="middle" bgcolor="#FFFFFF" class="text">Sub Sub Sub Sub Category:</td>
                            <td valign="middle" bgcolor="#FFFFFF" class="tab_left_10">
                            <select name="ma_bac_5" size="1" id="select2" class="input" style="width:300px;">
                              <option value="0" selected >-Select Sub Sub Sub Sub catelory- </option>
				              <? 
							  if($ma_user_admin==1)
							  $result=select_co_dk("tb_bac_5","ma_bac_4",$cat_s_s_s,"ten_$lg","ASC");
							  else
							  $result=select_co_2dk("tb_bac_5","ma_bac_4",$cat_s_s_s,"activate_setup",1,"ten_$lg","ASC");
							  
							  while($rs= mysql_fetch_array($result)) {?>
                              <option <? if ($cat_s_s_s_s==$rs["ma_bac_5"]) echo"selected"?> value="<?=$rs["ma_bac_5"]?>">
								<?
								echo $rs["ten_$lg"];
								?>
							  </option>
                              <? } ?>
                            </select>
                           </td>
                          </tr>
						<? }?>
			  <tr>
                <td height="34" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td valign="middle" class="tab_left_10"><input name="Submit" type="submit" class="nut_nhan" value="<?=$view_item_chuyen?>" >
                <input name="Submit22" type="reset" class="nut_nhan"  onClick="history.go(-1)" value="<?=$thong_bao_cancel?>"></td>
              </tr>
          	</form>
    		</table>
			<br>
			</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
