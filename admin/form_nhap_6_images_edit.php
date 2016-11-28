<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
				         include("inc/inc_path_top.php");
						$id=$HTTP_GET_VARS["id"];
						$result=select_mot_dong("$tb","id",$id);
						$rs_p=mysql_fetch_array($result);
					?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><TABLE width="100%" cellPadding=0 cellSpacing=0>
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
				
            <form method="post" action="admin_edit_save.php?save=edit_product_6_images&id=<?=$HTTP_GET_VARS["id"]?>&lg=<?=$lg?>&start=<?=$HTTP_GET_VARS["start"]?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
			<? include("../tool/fckeditor.php") ;?>
			<tr>
			  <TD width="778" height="82" align="left" valign="top" class="S10">                <span class="dot_do">
                <span class="text"><? include("inc/inc_go_dau_vn.php"); ?><br>
                <?=$view_item_tieude ?>
                </span><br>
                <input name="ten" onKeyUp="initTyper(this);" type="text" class="input" id="ten" style="width:500px;" value="<?=$rs_p["ten_$lg"];?>">
              *</span> <br>
              <br>
              <span class="text">
              <?=$view_item_short_content?>
              </span>
				<?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('ghi_chu') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 100;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["ghi_chu_$lg"];
				$oFCKeditor->Create() ;
				?>				</TD>
      </tr>
			<tr>
			  <TD height="38" valign="top" class="S10"><table height='50' cellspacing='0' cellpadding='0' width="100%">
						<!--DWLayoutTable-->
						<tr>
						<td width="272" height="87" valign='top' class="S10"><br>
						<?=$view_item_small_images?><br>
						<input name="anh_nho" type="hidden" value="<?=$rs_p["anh_nho"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh_nho"]?>' width='50' height='50' name='Img1' border='1' align="left">
						<select name="xoa_nho" class="selected" id="select">
						  <option value="0" echo"selected">Remain</option>
						  <option value="1" >Delete this images</option>
						</select>
						<br>
						<input name="userfile_nho" type="file" class="input" onChange='Img1.src=this.value;' style="width:200px;"><br></td>
						<td width='506' valign="top" class="S10"><br>
						<?=$view_item_images?>
						<br>
						<input name="anh" type="hidden" value="<?=$rs_p["anh"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh"]?>' width='50' height='50' name='Img2' border='1' align="left">
						<SELECT name="xoa" class="selected" id="xoa_nho">
						<option value="0" echo"selected">Remain</option>
						<option value="1" >Delete this images</option>
						</SELECT>
						<br>
						<input name="userfile" type="file" class="input" onChange='Img2.src=this.value;' style="width:200px;"><br></td>
						</tr>	
						<tr>
						<td width="272" height="87" valign='top' class="S10"><br>
						<?=$view_item_small_images?><br>
						<input name="anh_nho_1" type="hidden" id="anh_nho_1" value="<?=$rs_p["anh_nho_1"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh_nho_1"]?>' name='Img3' width='50' height='50' border='1' align="left" id="Img3">
						<select name="xoa_nho_1" class="selected" id="select">
						  <option value="0" echo"selected">Remain</option>
						  <option value="1" >Delete this images</option>
						</select>
						<br>
						<input name="userfile_nho_1" type="file" class="input" id="userfile_nho_1" style="width:200px;" onChange='Img3.src=this.value;'>
						<br></td>
						<td width='506' valign="top" class="S10"><br>
						<?=$view_item_images?>
						<br>
						<input name="anh_1" type="hidden" id="anh_1" value="<?=$rs_p["anh_1"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh_1"]?>' name='Img4' width='50' height='50' border='1' align="left" id="Img4">
						<SELECT name="xoa_1" class="selected" id="xoa_nho">
						<option value="0" echo"selected">Remain</option>
						<option value="1" >Delete this images</option>
						</SELECT>
						<br>
						<input name="userfile_1" type="file" class="input" id="userfile_1" style="width:200px;" onChange='Img4.src=this.value;'>
						<br></td>
						</tr>	
						<tr>
						<td width="272" height="87" valign='top' class="S10"><br>
						<?=$view_item_small_images?><br>
						<input name="anh_nho_2" type="hidden" id="anh_nho_2" value="<?=$rs_p["anh_nho_2"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh_nho_2"]?>' name='Img5' width='50' height='50' border='1' align="left" id="Img5">
						<select name="xoa_nho_2" class="selected" id="select">
						  <option value="0" echo"selected">Remain</option>
						  <option value="1" >Delete this images</option>
						</select>
						<br>
						<input name="userfile_nho_2" type="file" class="input" id="userfile_nho_2" style="width:200px;" onChange='Img5.src=this.value;'>
						<br></td>
						<td width='506' valign="top" class="S10"><br>
						<?=$view_item_images?>
						<br>
						<input name="anh_2" type="hidden" id="anh_2" value="<?=$rs_p["anh_2"]?>">
						<img src='../images/photo/news/<?=$rs_p["anh_2"]?>' name='Img6' width='50' height='50' border='1' align="left" id="Img6">
						<SELECT name="xoa_2" class="selected" id="xoa_nho">
						<option value="0" echo"selected">Remain</option>
						<option value="1" >Delete this images</option>
						</SELECT>
						<br>
						<input name="userfile_2" type="file" class="input" id="userfile_2" style="width:200px;" onChange='Img6.src=this.value;'>
						<br></td>
						</tr>	
			  </table><? ?></TD>
			  </tr>
			<tr>
			  <td height="80" valign="top" class="S10"><br>
                <? 
				echo $view_item_movie;
				if($rs_p["movie_vn"]=="")
					$movie="";
			     else
				    $movie="images/movie.jpg";
				?>
                <br>
                <input name="movie_name" type="hidden" value="<?=$rs_p["movie_vn"]?>">
                <img src='<?=$movie?>' name='Img7'  width='50' height='50' border='1' align="left" id="Img7">
                <select name="xoa_movie" class="selected" id="xoa_movie">
                  <option value="0" echo"selected">Remain</option>
                  <option value="1" >Delete this movie</option>
                </select>
                <input name="movie" type="file" class="input" id="movie" onChange='Img7.src="images/movie.jpg";' style="width:200px;"></td>
			</tr>
			<tr>
			  <td height="40" valign="top" class="S10"><table height='50' cellspacing='0' cellpadding='0'>
						<!--DWLayoutTable-->
						<tr>
						  <td height="56" valign='top' class="S10"><?=$view_item_ngay?>						    <br>
                          <input name="ngay" value="<?=$rs_p["ngay"]?>" type="text" class="input" style="width:100px;"> </td>
<td width='50' valign="top" class="S10"><?=$view_item_gio?>  <br>                                
  <input name="gio" value="<?=$rs_p["gio"]?>" type="text" class="input" id="gio5" style="width:100px;"></td>
						<td width='184' valign="top" class="S10"><?=$view_item_sort_num?>						  <br>
						  <input name="thu_tu" value="<?=$rs_p["thu_tu"]?>" type="text" class="input" id="gio4" style="width:100px;"></td>
						</tr>	
							
			  </table>              </td>
			  </tr>
			<tr>
			  <td height="86" valign="top" class="S10"><?=$view_item_content?>
			    <?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				//$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["mo_ta_$lg"];
				$oFCKeditor->Create() ;
				
				?>
			    <br>
			
	            <INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
                <INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
                <INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
                <INPUT name="page" value="<?=$HTTP_GET_VARS["page"]?>"type=hidden>
                <input type="image" src="images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; Img2.src=''; Img3.src='';  Img4.src=''; Img5.src=''; Img6.src=''; " style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				</td>
			  </tr>
			<tr >
			  <td height="25">&nbsp;</td>
			  </tr>
	  </form>
</TABLE></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
