<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$update_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><br />
                  <br />
				  
				  <?
					$form_action = $_SERVER['PHP_SELF'];
					$qr = $_SERVER["QUERY_STRING"];
					if($qr!="")
					  $form_action = $form_action."?".$qr;
					  
					if ( (isset($_POST["form"])) && ($_POST["form"] == "form"))
					 {
							$path_root=lay_path_root("local");
							
							$id=$HTTP_GET_VARS["id"]; 
							$old_name=gia_tri_mot_cot("tb_style_site_ma","id",$id,"ten_ma_files");
							
							$tendv=rep($HTTP_POST_VARS["ten_dich_vu"]);
							$mo_ta=rep($HTTP_POST_VARS["mo_ta"]);

							$query = "Select * FROM  tb_style_site_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_files"]==$tendv)
							  $key=1;
							}
							
							if($key==0)
							{
							$table="tb_style_site_ma";
							$query = "UPDATE $table SET ten_ma_files='$tendv',mo_ta='$mo_ta' ";
							$query .= "WHERE id =$id";
							$result = mysql_query($query);
								$path=$path_root."styles";
								$newdir=$path."/".$ten_dv;
							    rename("$path/$old_name","$path/$tendv");
								echo "$update_completed";
							}
							else
								echo "Can not rename, please choose folder name another !";
						}
					else
					{				
					$id=$HTTP_GET_VARS["id"];
					$ma_edit=$HTTP_GET_VARS["ma_edit"];
						$table="tb_style_site_ma";
						$query = "Select * FROM  $table  WHERE id=$id ";
						$result = mysql_query($query);
						$rs= mysql_fetch_array($result);
				  ?>
            <table id="datatable" class="tbldata" cellpadding=10 width="420" cellspacing=0 border=0>
<form name="form" method="post" ENCTYPE="multipart/form-data"  action="<?=$form_action?>">
<thead>
							  <tr>
								<th height="23" colspan="2" valign="middle" id="senderheader"><?=$edit_page?></th>
							  </tr>
							  </thead>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><?=$main_folder?></td>
							  <td height="22" valign=middle><input name="ten_dich_vu" value="<?=$rs["ten_ma_files"]?>" type="text" class="input" style="width:300px;"/></td>
							  </tr>
<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td width="29%" valign=middle class="tab_10_bg_1"><?=$view_item_description?></td>
				  <td width="71%" height="22" valign=middle><input name="mo_ta" value="<?=$rs["mo_ta"]?>" type="text" class="input" style="width:300px;"></td>
				</tr>
							<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
							  <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  <td height="25" valign=middle>
				<input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>"/></td>
							  </tr>
							  <input name="form" value="form" type="hidden"  />
							</form>
							</table>
							
							
                              <? } ?>
		    </td></tr>
                  </table>
  <? ?>								
								
								
          </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
