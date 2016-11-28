<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$images_upload_management?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<table id="datatable" class="tbldata" cellpadding=5 width="550" cellspacing=0 border=0>
				 <SCRIPT language=JavaScript>
				<!--
				function Check_images(form)
				{
				  if(form.ma_images.value == 0)
				  {
					alert("Please select 'Folder'!");
					form.ma_images.focus();
					return (false);
				  } 
				  if(form.userfile_1.value == 0)
				  {
					alert("Please select 'Images 1'!");
					form.userfile_1.focus();
					return (false);
				  } 
				  
				 }
				//-->
				</SCRIPT>
	<? $ma_upload=$HTTP_GET_VARS["ma_upload"];?>
   <FORM  method="post" ENCTYPE="multipart/form-data" name="form" action="admin_add.php?ma_add=upload&ma_upload=<?=$ma_upload?>" onsubmit="return Check_images(this)"> 
	<thead>
	<tr>
	<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Upload Images";?></th>
	</tr>
	</thead>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td width="15%" valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="22" valign=middle><input name="switcher" type="radio" onfocus="setTypingMode(0)" value="OFF" checked="checked">
	OFF
	<input name="switcher" type="radio" onfocus="setTypingMode(1)" value="TELEX">
	TELEX
	<input name="switcher" type="radio" onfocus="setTypingMode(2)" value="VNI">
	VNI</td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td valign=middle class="tab_10_bg_1"><span style="font-weight: bold">
	    <?=$upload_select_folder?>
	  </span></td>
	  <td valign=middle><select name="ma_images" size="1" id="select" class="selected">
							  <option value="0" selected><?=$upload_select_folder?></option>
							  <? 
							 if($ma_upload=="files")
							    $result=select_ko_dk("tb_files_ma","ten_ma_files","ASC");
							 else
							    $result=select_ko_dk("tb_images_ma","ten_ma_images","ASC");
								
								while($rs= mysql_fetch_array($result)) 
								{
								if($ma_upload=="files")
					              echo"<option value=\"$rs[ma_files]\">$rs[ten_ma_files]</option>";
								else
								  echo"<option value=\"$rs[ma_images]\">$rs[ten_ma_images]</option>";
						  
							  }
							  
							  ?>
				    </select></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1"><?=$upload_file_01?></td>
	<td width="71%" valign=middle><span class="do">*</span><br />
	  <img src='' name='Img1' width='50' height='50' border='1' id="Img1" /><br />
	<input name="userfile_1" type="file" class="input" id="userfile_1" style="width:400px;" onChange='Img1.src=this.value;'/>
	  <table height='50' width="400" cellpadding='0' cellspacing='0' class="text">
	    <!--DWLayoutTable-->
	    <tr>
	      <td width="60" valign='top' ><?=$view_item_none?>
	        <br />
	        <input name="thumbnail_1" type="radio" value="0" checked="checked" />
	        <br /></td>
            <td width="60" valign='top' ><?=$view_item_thumbnail?>
              <br />
              <input name="thumbnail_1" type="radio" value="1" /></td>
            <td width="60" height="30" valign='top' ><?=$view_item_cut?>
              <br />
              <input name="thumbnail_1" type="radio" value="2" /></td>
            <td width='60' valign="top" ><?=$view_item_thumbnail_w?>
              <br />
              <input name="width_1" type="text" class="input" id="width_1" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
            <td valign="top" ><?=$view_item_thumbnail_h?>
              <br />
              <input name="height_1" type="text" class="input" id="height_1" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
          </tr>
	    </table>	  
	    <input name="ghi_chu_1" class="input" style="width:400px;" onkeyup="initTyper(this);"/></td></tr>
	
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1">
	  <?=$upload_file_02?>	</td>
	<td valign=middle><br />
	  <img src='' name='Img2' width='50' height='50' border='1' id="Img2" /><br />
	<input name="userfile_2" type="file" class="input" id="userfile_2" style="width:400px;" onChange='Img2.src=this.value;'/>
	  <table height='50' width="400" cellpadding='0' cellspacing='0' class="text">
	    <!--DWLayoutTable-->
	    <tr>
	      <td width="60" valign='top' ><?=$view_item_none?>
	        <br />
	        <input name="thumbnail_2" type="radio" value="0" checked="checked" />
	        <br /></td>
          <td width="60" valign='top' ><?=$view_item_thumbnail?>
            <br />
            <input name="thumbnail_2" type="radio" value="1" /></td>
          <td width="60" height="30" valign='top' ><?=$view_item_cut?>
            <br />
            <input name="thumbnail_2" type="radio" value="2" /></td>
          <td width='60' valign="top" ><?=$view_item_thumbnail_w?>
            <br />
            <input name="width_2" type="text" class="input" id="width_2" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
          <td valign="top" ><?=$view_item_thumbnail_h?>
            <br />
            <input name="height_2" type="text" class="input" id="height_2" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
        </tr>
	    </table>	  
	    <input name="ghi_chu_2" class="input" style="width:400px;" onkeyup="initTyper(this);"/></td></tr>
	
		<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
		  <td valign=top class="tab_10_bg_1">
		    <?=$upload_file_03?>
		  </td>
		  <td height="20" valign=middle><br />
		    <img src='' name='Img3' width='50' height='50' border='1' id="Img3" /><br />
		  <input name="userfile_3" type="file" class="input" id="userfile_3" style="width:400px;" onChange='Img3.src=this.value;'/>
		    <br />
		    <table height='50' width="400" cellpadding='0' cellspacing='0' class="text">
		      <!--DWLayoutTable-->
		      <tr>
		        <td width="60" valign='top' ><?=$view_item_none?>
		          <br />
		          <input name="thumbnail_3" type="radio" value="0" checked="checked" />
		          <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br />
                    <input name="thumbnail_3" type="radio" value="1" /></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_3" type="radio" value="2" /></td>
                  <td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                    <br />
                    <input name="width_3" type="text" class="input" id="width_3" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                    <br />
                    <input name="height_3" type="text" class="input" id="height_3" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
                </tr>
		      </table>
		      <input name="ghi_chu_3" class="input" style="width:400px;" onkeyup="initTyper(this);"/></td></tr>
		<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
		  <td valign=top class="tab_10_bg_1">
		    <?=$upload_file_04?>
		 </td>
		  <td height="20" valign=middle><br />
		    <img src='' name='Img4' width='50' height='50' border='1' id="Img4" /><br />
		  <input name="userfile_4" type="file" class="input" id="userfile_4" style="width:400px;" onChange='Img4.src=this.value;'/>
		    <br />
		    <table height='50' width="400" cellpadding='0' cellspacing='0' class="text">
		      <!--DWLayoutTable-->
		      <tr>
		        <td width="60" valign='top' ><?=$view_item_none?>
		          <br />
		          <input name="thumbnail_4" type="radio" value="0" checked="checked" />
		          <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br />
                    <input name="thumbnail_4" type="radio" value="1" /></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_4" type="radio" value="2" /></td>
                  <td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                    <br />
                    <input name="width_4" type="text" class="input" id="width_4" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                    <br />
                    <input name="height_4" type="text" class="input" id="height_4" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
                </tr>
		      </table>
		      <input name="ghi_chu_4" class="input" style="width:400px;" onkeyup="initTyper(this);"/></td></tr>
		<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
		  <td valign=top class="tab_10_bg_1">
		    <?=$upload_file_05?>
		  </td>
		  <td height="20" valign=middle><br />
		    <img src='' name='Img5' width='50' height='50' border='1' id="Img5" /><br />
		  <input name="userfile_5" type="file" class="input" id="userfile_5" style="width:400px;" onChange='Img5.src=this.value;'/>
		    <br />
		    <table height='50' width="400" cellpadding='0' cellspacing='0' class="text">
		      <!--DWLayoutTable-->
		      <tr>
		        <td width="60" valign='top' ><?=$view_item_none?>
		          <br />
		          <input name="thumbnail_5" type="radio" value="0" checked="checked" />
		          <br /></td>
                  <td width="60" valign='top' ><?=$view_item_thumbnail?>
                    <br />
                    <input name="thumbnail_5" type="radio" value="1" /></td>
                  <td width="60" height="30" valign='top' ><?=$view_item_cut?>
                    <br />
                    <input name="thumbnail_5" type="radio" value="2" /></td>
                  <td width='60' valign="top" ><?=$view_item_thumbnail_w?>
                    <br />
                    <input name="width_5" type="text" class="input" id="width_5" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_width_lon?>" maxlength="4"/></td>
                  <td valign="top" ><?=$view_item_thumbnail_h?>
                    <br />
                    <input name="height_5" type="text" class="input" id="height_5" style="width:50px;" onkeydown="AcceptNumbersOnly();" value="<?=$view_item_thumbnail_height_lon?>" maxlength="4"/></td>
                </tr>
		      </table>
		      <input name="ghi_chu_5" class="input" style="width:400px;" onkeyup="initTyper(this);"/></td></tr>
		<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
		  <td valign=top class="tab_10_bg_1">&nbsp;</td>
		  <td height="30" valign=middle>
			<input type="image" src="images/upload.gif" name="Submit3" title="<?=$upload?>" align="absmiddle">
			<img src="images/reset.gif" onclick="form.reset(); Img1.src=''; Img2.src=''; Img3.src=''; Img4.src=''; Img5.src='';" style="cursor: pointer" alt="<?=$view_item_reset?>" align="absmiddle"/>
			<img src="images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>" align="absmiddle"/>
			</td>
		  </tr>
	</FORM>
	</table>
                <br /></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
