<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><? 
					include("inc_path_top.php");
					?>
                <? include("inc/inc_path_top.php");?></td>
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

	  <form method="post" action="admin_add.php?ma_add=add_news_2_images_1_movie" ENCTYPE="multipart/form-data" name="noi_dung" onSubmit="return Check_Values_nhap(this);">
			<? include("../tool/fckeditor.php") ;?>
			<tr>
			  <TD width="816" height="120" align="left" valign="top" class="S10">                <span class="dot_do">
                <span class="text"><? include("inc/inc_go_dau_vn.php"); ?><br>
                <?=$view_item_tieude ?>
                </span><br>
                <input name="ten" onKeyUp="initTyper(this);" type="text" class="input" id="ten" style="width:600px;">
              *</span> <br>
              <br>
              <span class="text">
              <?=$view_item_short_content?>
              </span><br>
              <?php
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('ghi_chu') ;
				$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->Height = 200;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= " " ;
				$oFCKeditor->Create() ;
				?></TD>
      </tr>
			<tr>
			  <td height="80" valign="top" class="S10"><br />
		<table height='50' cellspacing='0' cellpadding='0'>
						<!--DWLayoutTable-->
						<tr>
						  <td width="419" height="24" valign='top' class="S10"><img src='images/images.gif' width='50' height='50' name='Img1' border='1' align="left">
                          <?=$view_item_small_images?>
                          <br>
                            <input name="userfile_nho" type="file" class="input" style="width:300px;" onChange='Img1.src=this.value;'>
					      </td>
</tr>
						<tr>
						  <td height="32" valign='top' class="S10"><img src='images/images.gif' width='50' height='50' name='Img2' border='1' align="left">
                            <?=$view_item_images?>
                            <br>
                            <input name="userfile" type="file" class="input" style="width:300px;" onChange='Img2.src=this.value;'>
                            <INPUT name="cat" value="<?=$HTTP_GET_VARS["cat"]?>"type=hidden>
                            <INPUT name="bac" value="<?=$HTTP_GET_VARS["bac"]?>"type=hidden>
                            <INPUT name="lg" value="<?=$HTTP_GET_VARS["lg"]?>"type=hidden>
                            </td>
						</tr>
						<tr>
						  <td height="24" valign="top"><span class="S10">
						  <img src=''  width='50' height='50' name='Img3' border='1' align="left" id="Img3">
						    <?=$view_item_movie?>
                            <br>
                            <input name="movie" type="file" class="input" id="movie3" style="width:300px;" onChange='Img3.src="images/movie.jpg";'>
</span></td>
			    </tr>
	
			  </table>              </td>
			  </tr>
			<tr>
			  <td height="40" valign="top" class="S10"><br />
			    <table height='50' cellspacing='0' cellpadding='0'>
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
				$sBasePath = $_SERVER['PHP_SELF'];
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= " " ;
				$oFCKeditor->Create() ;
				?>
			    <br>
			
	            <input type="image" src="images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" >
				<img src="images/reset.gif" onclick="noi_dung.reset(); Img1.src=""; Img2.src="";" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
				<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
			</td>
			  </tr>
			<tr>
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
