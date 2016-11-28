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
				
            <form method="post" action="admin_edit_save.php?save=edit_news_2_images_1_movie&id=<?=$HTTP_GET_VARS["id"]?>&lg=<?=$lg?>&start=<?=$HTTP_GET_VARS["start"]?>" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
			<? include("../tool/fckeditor.php") ;?>
			<tr>
			  <TD width="816" height="120" align="left" valign="top" class="S10">                <span class="dot_do">
                <span class="text"><? include("inc/inc_go_dau_vn.php"); ?><br />
                <br>
                <?=$view_item_tieude ?>
                </span><br>
                <input name="ten" onkeyup="initTyper(this);" type="text" class="input" id="ten" style="width:500px;" value="<?=$rs_p["ten_$lg"];?>">
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
				$oFCKeditor->Height = 200;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $rs_p["ghi_chu_$lg"];
				$oFCKeditor->Create() ;
				?>
				</TD>
      </tr>
			<tr>
			  <td height="80" valign="top" class="S10"><br />
			    <?=$view_item_small_images?>
                <br>
                <input name="anh_nho" type="hidden" value="<?=$rs_p["anh_nho"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh_nho"]?>' width='50' height='50' name='Img1' border='1' align="texttop">
                <SELECT name="xoa_nho" class="selected" id="xoa_nho">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile_nho" type="file" class="input" onChange='Img1.src=this.value;' style="width:400px;">
                <br>
                <?=$view_item_images?>
                <br>
                <input name="anh" type="hidden" value="<?=$rs_p["anh"]?>">
                <img src='../images/photo/news/<?=$rs_p["anh"]?>' width='50' height='50' name='Img2' border='1' align="texttop">
                <SELECT name="xoa" class="selected" id="xoa_nho">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this images</option>
                </SELECT>
                <input name="userfile" type="file" class="input" onChange='Img2.src=this.value;' style="width:400px;">
                <br>
                <? 
				echo $view_item_movie;
				if($rs_p["movie_vn"]=="")
					$movie="";
			     else
				    $movie="images/movie.jpg";
				?>
                <br>
                <input name="movie_name" type="hidden" value="<?=$rs_p["movie_vn"]?>">
                <img src='<?=$movie?>' name='Img3'  width='50' height='50' border='1' align="texttop" id="Img3">
                <SELECT name="xoa_movie" class="selected" id="xoa_movie">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete this movie</option>
                </SELECT>
                <input name="movie" type="file" class="input" id="movie" onChange='Img3.src="images/movie.jpg";' style="width:400px;"></td>
			</tr>
			<tr>
			  <td height="40" valign="top" class="S10"><table height='50' cellspacing='0' cellpadding='0'>
                <!--DWLayoutTable-->
                <tr>
                  <td height="56" valign='top' class="S10"><?=$view_item_ngay?>
                      <br />
                      <input name="ngay" value="<?=date('d/m/y')?>" type="text" class="input" style="width:100px;" />
                  </td>
                  <td width='50' valign="top" class="S10"><?=$view_item_gio?>
                      <br />
                      <input name="gio" value="<?=date("g:i a")?>" type="text" class="input" id="gio3" style="width:100px;" /></td>
                  <td width='184' valign="top" class="S10"><?=$view_item_sort_num?>
                      <br />
                      <input name="thu_tu" value="<?=$thu_tu?>" type="text" class="input" id="gio4" style="width:100px;" /></td>
                </tr>
              </table></td>
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
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=''; Img2.src='';" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
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
