<? 
include("../inc/banner.php")
?> 
<? if($suid==1){?>
<script language="javascript">
function hoi(page){
	var checkedNum = getCheckedNum_muc();
	if(checkedNum == 0) 
	{
			alert("Please select item !");
	}
	if(checkedNum > 0) 
	{
		if (window.confirm('Are you sure you want to delete the item(s)?'))
	    {
		dem_chon();
		document.messageList.action=page;
		document.messageList.submit();
	 	return true;
	    } 
	 }
	 return false;		
}

function check_descount(param)
{  
	if (param.name.value==""){
		alert("Please check agian name!");
		param.name.focus();
		return false;
	}
	
	return true;
}  

function check_descount_edit(param)
{  
	if (param.name.value==""){
		alert("Please check agian name!");
		param.name.focus();
		return false;
	}
	return true;
}  

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="25" valign="middle" class="bg_title">
				<a href="index.php?cat=0&alpha=All&start=0&lg=<?=$lg?>"><img src="<?=$path_tuyet_doi?>/images/home.gif" width="14" height="14" border="0"> Home</a> » 
				<?
				$cat="1";
				if(isset($HTTP_GET_VARS["cat"])){
					$cat = $HTTP_GET_VARS["cat"];
				}
				$alpha="All";
				if(isset($HTTP_GET_VARS["alpha"])){
					$alpha = $HTTP_GET_VARS["alpha"];
				}
				$start=0;
				if(isset($HTTP_GET_VARS["start"])){
					$start = $HTTP_GET_VARS["start"];
				}
				
				if(isset($HTTP_GET_VARS["lg"]))
				{
					$lg = $HTTP_GET_VARS["lg"];
				}
				include("inc/inc_config_$lg.php");
				$quan=gia_tri_mot_cot("tb_product_status","code",$cat,"name_$lg");
				?></td>
             </tr>
              <tr>
                <td height="227" valign="top" class="bg_center">
				<? 
				include("../inc/inc_get_cat.php");

		$path=lay_path_root("local")."images/photo/product_status";
		$PHP_SELF="product_status.php";
		$tb="tb_product_status";
		 
		$form_action = $_SERVER['PHP_SELF'];
		$qr = $_SERVER["QUERY_STRING"];
		if($qr!="")
		  $form_action = $form_action."?".$qr;
		
		if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
		 {
			$name=rep($_POST["name"]);
			$link=rep($_POST["link"]);
			$note=rep($_POST["note"]);
			$code=max_cot("$tb","code")+1;
			$thu_tu=max_cot("$tb","thu_tu")+1;
			
			$anh_nho="";
			$anh="";
			$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
			$ext_nho=lay_ext($anh_nho);
			
			$anh=$HTTP_POST_FILES['userfile']['name']; 
			$ext=lay_ext($anh);
			
			$id_anh=max_cot("$tb","code")+1;
			
			$anh_nho_rename=$id_anh;
			$anh_nho_rename.=".".$ext_nho;
			if($anh_nho=="")
				$anh_nho_rename="";
			
			$anh_rename=$id_anh;
			$anh_rename.="_.".$ext;
			if($anh=="")
				$anh_rename="";
		
			
			if($anh_nho!="")
			{
				move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
				$thumbnail=$_POST["thumbnail"];
				if(($thumbnail==1)||($thumbnail==2))
				{
				 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
				 delete_file("$path/$anh_nho");
				}
				if($thumbnail==0)
					 {
					 rename("$path/$anh_nho","$path/$anh_nho_rename");
					 }
			}
			
			if($anh!="")
			{
				move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
				$thumbnail_lon=$_POST["thumbnail_lon"];
				if(($thumbnail_lon==1)||($thumbnail_lon==2))
				{
				 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
				 delete_file("$path/$anh");
				}
					 
				if($thumbnail_lon==0)
					 {
					 rename("$path/$anh","$path/$anh_rename");
					 }
			}
										
			
			$query_ = "INSERT INTO $tb (code,name_$lg,note_01_$lg,link_$lg,anh_01_$lg,anh_02_$lg,thu_tu)";
			$query_ .= " VALUES ('$code','$name','$note','$link','$anh_nho_rename','$anh_rename','$thu_tu')";
			$result_ = mysql_query($query_);

			$tip="Add completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script/>";
		}
		
		if ( (isset($_POST["messageList"])) && ($_POST["messageList"] == "messageList"))
		 {
			
			if(strstr($qr,"update_sort"))
			{
				$num=$HTTP_POST_VARS["num"]; 
				for($i=1;$i<=$num; $i++)
					{
						$id=rep($HTTP_POST_VARS["id_$i"]);
						$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
						$ten=rep($HTTP_POST_VARS["ten_$i"]);
						$note=rep($HTTP_POST_VARS["note_$i"]);
						
						$query_01 = "UPDATE $tb SET thu_tu='$thu_tu', name_$lg='$ten', note_01_$lg='$note'";
						$query_01 .= "WHERE id=$id";
						$result_01 = mysql_query($query_01);
					}
				echo "<script  language='JavaScript'>";
				echo "alert('$update_completed')";
				echo "</script>";
			}
			else
			{
			$tip="Delete completed !";
			$id=$HTTP_POST_VARS["chon"];
			$id = substr($id,0,strlen($id)-1);
			//echo "$id";
				$query__ = "Select * FROM $tb WHERE id in (".$id.")";
				$result__ = mysql_query($query);	
				while($rs__= mysql_fetch_array($result__))
				{ 
					 $anh_01=$rs__["anh_01_$lg"];
					 $anh_02=$rs__["anh_02_$lg"];
					 
					 delete_file("$path/$anh_01");
					 delete_file("$path/$anh_02");
				}			
			
			$query__ = "DELETE  FROM $tb WHERE id in (".$id.")";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		    } 
		}
		
		
		if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
		   {
			
			$id=$_POST["id"];
			$name=rep($_POST["name"]);
			$link=rep($_POST["link"]);
			$note=rep($_POST["note"]);

			$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
			$ext_nho=lay_ext($anh_nho);
			$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
			$anh_xoa=$HTTP_POST_VARS["anh_nho"];
			$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
			
			if($anh_nho!="")
				 {
				 $anh_nho_rename=$id;
				 $anh_nho_rename.=".".$ext_nho;
				 }
			else
			  {
			  if($xoa_nho==1)
				 {
				  delete_file("$path/$anh_xoa");
				  $anh_nho_rename="";
				 }
			  }
			if($anh_nho!="")
				{
				 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
				 if($HTTP_POST_VARS["anh_nho"]!="")
				  {
					delete_file("$path/$anh_xoa");
				  }
				$thumbnail=$_POST["thumbnail"];
				if(($thumbnail==1)||($thumbnail==2))
					{
					 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
					 delete_file("$path/$anh_nho");
					}
				if($thumbnail==0)
					 {
					 rename("$path/$anh_nho","$path/$anh_nho_rename");
					 }
		   }
				
			$anh=$HTTP_POST_FILES['userfile']['name']; 
			$ext=lay_ext($anh);
			$anh_rename=$HTTP_POST_VARS["anh"];
			$anh_xoa=$HTTP_POST_VARS["anh"];
			$xoa=$HTTP_POST_VARS["xoa"];
			if($anh!="")
				 {
				 $anh_rename=$id;
				 $anh_rename.="_.".$ext;
				 }
			else
			  {
			  if($xoa==1)
				 {
				  delete_file("$path/$anh_xoa");
				  $anh_rename="";
				 }
			  }
			if($anh!="")
				{move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
				 if($HTTP_POST_VARS["anh"]!="")
					  {
					  delete_file("$path/$anh_xoa");
					  }
			$thumbnail_lon=$_POST["thumbnail_lon"];
			if(($thumbnail_lon==1)||($thumbnail_lon==2))
				{
				 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
				 delete_file("$path/$anh");
				}
			if($thumbnail_lon==0)
				 {
				 rename("$path/$anh","$path/$anh_rename");
				 }
			}
				
				$query_edit = "UPDATE $tb SET name_$lg='$name', note_01_$lg='$note',link_$lg='$link', anh_01_$lg='$anh_nho_rename', anh_02_$lg='$anh_rename'";
				$query_edit .= "WHERE id=$id";
				$result_edit = mysql_query($query_edit);
				$result_edit = mysql_query($query_edit);
				$tip="Update completed !";
				
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$PHP_SELF?lg=$lg\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		  }
		
		 if($alpha=="All")
			 $sort=" ";
		 else
			 $sort=" where name_$lg like '".$alpha."%' ";
		$query = "Select * FROM  $tb ";
		$query.= $sort;
		$query.=" order by thu_tu ASC ";
		$result = mysql_query($query);
		?>		
	 	<form name="messageList" method="post" action="<?=$form_action?>" onSubmit=" return dem_chon();">	
		 <? 
		 include("../inc/inc_lg_only.php"); 
		 include("../inc/inc_sort_only.php"); 
		 ?>
		<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
			<thead>
			<tr>
			<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
			<th width=25% id="senderheader">Name  </th>
			<th id="subjectheader" width=25%>Note</th>
			<th id="subjectheader" width=17%><? echo "$view_item_images/$view_item_flash"; ?></th>
			<th id="subjectheader" width=10%>Sort</th>
			<th id="subjectheader" width=10%>Code </th>
			<th id="subjectheader" width=10%>Edit</th>
			</tr>
			</thead>
			<tbody>
			 <?
			 $i=0;
			 while ($rs= mysql_fetch_array($result)) // LAY DU LIEU RA
			 { 
			 $i++;
			 $anh_01=$rs["anh_01_$lg"];
			 $anh_02=$rs["anh_02_$lg"];
			 ?>
		
			<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
			<td align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$rs["id"]?>"></td>
			<td><input name="ten_<?=$i?>" type="text"  class="input" size="30" value="<?=$rs["name_$lg"]?>" /></td>
			<td><input name="note_<?=$i?>" type="text"  class="input" size="30" value="<?=$rs["note_01_$lg"]?>" /></td>
			<td><? 
				if($anh_01!="") 
				{
				if((strstr($anh_01,".SWF")) || (strstr($anh_01,".swf")) )
				   echo"<span class=lot> | <a href=\"$path/$anh_01\" target=_blank>$view_item_flash</a></span>";
				else
				   echo"<span class=lot> | <a onclick=\"javascript: popupImage('$path/$anh_01')\" href=\"#\"><b>?</b></a></span>";
				}
				if($anh_02!="") 
				{
				if((strstr($anh_02,".SWF")) || (strstr($anh_02,".swf")) )
				   echo"<span class=lot> | <a href=\"$path/$anh_02\" target=_blank>$view_item_flash</a></span>";
				else
				   echo"<span class=lot> | <a onclick=\"javascript: popupImage('$path/$anh_02')\" href=\"#\"><b>?</b></a></span>";
				}
				?></td>
			<td><input type="hidden" name="id_<?=$i?>" value="<?=$rs["id"]?>">
              <input name="thu_tu_<?=$i?>" type="text"  class="input" size="2" value="<?=$rs["thu_tu"]?>" onKeyDown="AcceptNumbersOnly();"></td>
			<td><? echo"$rs[code]";?></td>
			<td><a href="<?=$PHP_SELF?>?cat=<?=$cat?>&id=<?=$rs["id"]?>&do=edit&lg=<?=$lg?>"><img src="<?=$path_tuyet_doi?>/images/edit.gif" width="12" height="12" border="0" /></a></td>
			</tr>
			<? } ?>
			</tbody>
		</table>
				<input type="hidden" name="num" value="<?=$i?>" />
				<table width="100%" border="0" cellpadding="0" cellspacing="0" background="<?=$path_tuyet_doi?>/images/bg_icon.gif">
				  <tr>
					<td width="35%" height="30" align="left" valign="middle" class="tab_lr_5"><? include("../inc/inc_select.php"); ?> </td>
					<td width="65%" align="right" valign="middle" class="tab_lr_5">
				   <input type="image" src="<?=$path_tuyet_doi?>/images/update.gif" onClick="update_industry('<?=$PHP_SELF?>','?update_sort&cat=<?=$cat?>')" name="Submit3">
					<img src="<?=$path_tuyet_doi?>/images/delete.gif" onClick="return hoi('<?=$PHP_SELF?>');" style="cursor: pointer" alt="<?=$view_item_reset?>"/>
					</td>
				  </tr>
				</table>
               <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="messageList" value="messageList">
			   </form>
			  <? ?>
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <tr>
                <td valign="top"><br>
				<?
				//$qr = getenv('QUERY_STRING');
				$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM $tb WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="85%" border="0" align="center" cellpadding="1" cellspacing="1" class="bg_1">
               <form action="<?=$form_action?>" method="post" name="form_color_edit" ENCTYPE="multipart/form-data" onSubmit="return check_descount_edit(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold">Update </td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">  Name: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="name" type="text" class="input" style="width:300px" value="<?=$rs_edit["name_$lg"]?>">                   </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><?=$view_item_link?>: </td>
                    <td valign="middle" class="bg_2"><textarea name="link" class="textarea" id="textarea3" style="width:300px; height:40px;" onKeyUp="initTyper(this);"><?=$rs_edit["link_$lg"]?></textarea></td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><? echo "$view_item_images/$view_item_flash"; ?>: </td>
                    <td valign="middle" class="bg_2"><input name="anh_nho" type="hidden" value="<?=$rs_edit["anh_01_$lg"]?>">
                <img src='<?=$path?>/<?=$rs_edit["anh_01_$lg"]?>' width='50' height='50' name='Img1' border='1'><br />
                <SELECT name="xoa_nho" class="selected" id="xoa_nho">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete</option>
                </SELECT>
                <br />
                <input name="userfile_nho" type="file" class="input" onChange='Img1.src=this.value;' style="width:300px;">
                <br />
	   
	  
	 <table height='40' width="100%" cellpadding='0' cellspacing='0' class="text">
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
              </table>
			  JPN, GIF, SWF
			  </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><? echo "$view_item_images/$view_item_flash";?>: </td>
                    <td valign="middle" class="bg_2"><input name="anh" type="hidden" value="<?=$rs_edit["anh_02_$lg"]?>">
                <img src='<?=$path?>/<?=$rs_edit["anh_02_$lg"]?>' name='Img2' width='50' height='50' border='1' id="Img2"><br />
                <SELECT name="xoa" class="selected" id="xoa">
                  <option value="0" selected>Remain</option>
                  <option value="1" >Delete</option>
                </SELECT><br />
                <input name="userfile" type="file" class="input" onChange='Img2.src=this.value;' style="width:300px;">
                <br />
	   
	  
	 <table height='40' width="100%" cellpadding='0' cellspacing='0' class="text">
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
              </table>
			  JPN, GIF, SWF 
			  </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><?=$item_note?>: </td>
                    <td valign="middle" class="bg_2"><textarea name="note" class="textarea" id="note" style="width:300px; height:40px;" onKeyUp="initTyper(this);"><?=$rs_edit["note_01_$lg"]?></textarea></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="middle" class="bg_2">
				   <input type="image" src="<?=$path_tuyet_doi?>/images/update.gif" name="Submit3" title="<?=$view_item_new?>" align="absmiddle">
					<img src="<?=$path_tuyet_doi?>/images/reset.gif" onClick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>" align="absmiddle"/>
					</td>
                  </tr>
				  <input type="hidden" name="id" value="<?=$rs_edit["id"]?>">
				  <input type="hidden" name="form_color_edit" value="form_color_edit">
				  </form>
                </table>
				<? 
				} 
				else
				{
				?>
				<table width="85%" border="0" align="center" cellpadding="1" cellspacing="1" class="bg_1" >
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color" ENCTYPE="multipart/form-data" onSubmit="return check_descount(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold">New </td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2"> Name: </td>
                    <td width="70%" align="left" valign="middle" class="bg_2"><input name="name" type="text" class="input" id="name" style="width:300px"></td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><?=$view_item_link?>: </td>
                    <td valign="middle" class="bg_2"><textarea name="link" class="textarea" id="textarea3" style="width:300px; height:40px;" onKeyUp="initTyper(this);"></textarea></td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><? echo "$view_item_images/$view_item_flash"; ?>: </td>
                    <td valign="middle" class="bg_2"><img src='' name='Img1' width='50' height='50' border='1' id="Img1" /><br />
                      <input name="userfile_nho" type="file" class="input" style="width:300px;" onChange='Img1.src=this.value;'>
	  <br />
	   
	  
	 <table height='40' width="100%" cellpadding='0' cellspacing='0' class="text">
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
              </table>
			  JPN, GIF, SWF			  </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><? echo "$view_item_images/$view_item_flash"; ?>: </td>
                    <td valign="middle" class="bg_2"><img src='' width='50' height='50' name='Img2' border='1' ><br /><input name="userfile" type="file" class="input" style="width:300px;" onChange='Img2.src=this.value;'>
	  <br />
	   
	  
	 <table height='40' width="100%" cellpadding='0' cellspacing='0' class="text">
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
              </table>
			  JPN, GIF, SWF			  </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><?=$item_note?>: </td>
                    <td valign="middle" class="bg_2"><textarea name="note" class="textarea" id="note" style="width:300px; height:40px;" onKeyUp="initTyper(this);"></textarea></td>
                  </tr>
                  <tr>
                    <td height="30" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="middle" class="bg_2">
					<input type="image" src="<?=$path_tuyet_doi?>/images/add_new.gif" name="Submit3" title="<?=$view_item_new?>" align="absmiddle">
					<img src="<?=$path_tuyet_doi?>/images/reset.gif" onClick="noi_dung.reset();" style="cursor: pointer" alt="<?=$view_item_reset?>" align="absmiddle"/>					</td>
                  </tr>
				  <input type="hidden" name="form_color" value="form_color">
				  </form>
                </table>
				<? } ?>
				</td>
              </tr>
              <tr>
                <td height="8"></td>
              </tr>
 <!-- ........................................................ -->			  
              <tr>
                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>


</table>
              <p>
                <?  

 ?>	
              </p>
              <p>&nbsp;</p></td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? 
} 
else
echo"Bạn không dược quyền Admin ! Xin vui lòng hỏi admin.";
?>
<? include("../inc/bottom.php")?>
