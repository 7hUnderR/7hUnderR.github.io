<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? if($ma_user_admin==1) {?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"><a href="setup_menu.php"> Setup menu</a> / <? $id=$_GET["id"]; echo gia_tri_mot_cot("tb_setup_menu","id",$id,"menu_ten")?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><? 
$form_action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) 
		$form_action .= "?" . $_SERVER['QUERY_STRING'];
		
		if(strstr($_SERVER["QUERY_STRING"],"add"))
		 {
			
			$menu_ten=$_POST["menu_ten"];
			$menu_link=$_POST["menu_link"];
			$menu_target=$_POST["menu_target"];
			$menu_quyen=$_POST["menu_quyen"];
			$menu_type=$_POST["menu_type"];
			$menu_sort=$_POST["menu_sort"];
			$menu_activate=$_POST["menu_activate"];
			
			$menu_ma=max_id("tb_setup_menu","menu_ma")+1;
			
			$table_="tb_setup_menu_s";
			$query_ = "INSERT INTO $table_(menu_ma,ma_id_s,menu_ten,menu_link,menu_target,menu_quyen,menu_type,menu_sort,menu_activate)";
			$query_ .= " VALUES('$menu_ma','$id','$menu_ten','$menu_link','$menu_target','$menu_quyen','$menu_type','$menu_sort','$menu_activate')";
			if($result_ = mysql_query($query_))
			$tip="Add completed !";
			
			$form_action=str_replace("&add","",$form_action);
			
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";

		}
		
		if(strstr($_SERVER["QUERY_STRING"],"delete"))
		 {
			$items = $HTTP_POST_VARS["chon"];
			$items = str_replace (",", "','", $items);

			$query__ = "DELETE  FROM tb_setup_menu_s WHERE id in ('$items')";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
		    
			$form_action=str_replace("&delete","",$form_action);
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		
		if(strstr($_SERVER["QUERY_STRING"],"update"))
		   {

			$num=$HTTP_POST_VARS["num"]; 
			for($i=1;$i<=$num; $i++)
			{
			$id=$_POST["id_$i"];
			$menu_ten=$_POST["menu_ten_$i"];
			$menu_link=$_POST["menu_link_$i"];
			$menu_target=$_POST["menu_target_$i"];
			$menu_quyen=$_POST["menu_quyen_$i"];
			$menu_type=$_POST["menu_type_$i"];
			$menu_sort=$_POST["menu_sort_$i"];
			$menu_activate=$_POST["menu_activate_$i"];

			$query_edit = "UPDATE tb_setup_menu_s SET menu_ten='$menu_ten',menu_link='$menu_link',menu_target='$menu_target',menu_quyen='$menu_quyen',menu_type='$menu_type',menu_sort='$menu_sort',menu_activate='$menu_activate'";
			$query_edit .= "WHERE id=$id";
			$result_edit = mysql_query($query_edit);
			$result_edit = mysql_query($query_edit);
			}
			
			$tip="Update completed !";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
			$form_action=str_replace("&update","",$form_action);
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
		  }
		
		?>		  
      <br>
	  <? 
		$table="tb_setup_menu_s where ma_id_s=$id order by menu_sort ASC ";
		$query = "Select * FROM  $table ";
		$result = mysql_query($query);
  	    $num=mysql_num_rows($result);
	    $tam=0;
		?>		
		<br>
        <form name=messageList ENCTYPE="multipart/form-data" method=post action="#">
		<input name="switcher" type=radio onfocus="setTypingMode(0)" value="OFF" checked  >
OFF
<input name="switcher" type=radio onfocus="setTypingMode(1)" value="TELEX" >
TELEX
<input name="switcher" type=radio onfocus="setTypingMode(2)" value="VNI" >
VNI
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
	<thead>
	<tr>
	<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	<th width=36% id="senderheader">Name/ link </th>
	<th id="subjectheader" width=12%>Target</th>
	<th id="subjectheader" width=9%>Per</th>
	<th id="subjectheader" width=18%>Type</th>
	<th id="subjectheader" width=10%>Sort</th>
	<th id="subjectheader" width=12%>Activate</th>
	</tr>
	</thead>
	<tbody>
	<input type="hidden" name="cat" value="<?=$cat?>">
	<input type="hidden" name="start" value="<?=$start?>">
		<?
		while ($rs_edit= mysql_fetch_array($result)) // LAY DU LIEU RA
		{ 
		$tam++;
		$id=$rs_edit["id"];
		?>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$id?>"></td>
	<td>
	 <?
	 echo "<a href=\"menu_setup_s.php?id=$id\">".$rs_edit["menu_ten"]."</a>";
	 ?>
	<br />
     <input type="hidden" name="id_<?=$tam?>" value="<?=$id?>" />
     <input name="menu_ten_<?=$tam?>" onkeyup="initTyper(this);" type="text" size="25" value="<?=$rs_edit["menu_ten"]?>" style="width:250px;" />
      <br />
      <textarea name="menu_link_<?=$tam?>" rows="3" id="textarea" style="width:250px;"><?=$rs_edit["menu_link"]?></textarea>
      </td>
	<td>
	  <select name="menu_target_<?=$tam?>" id="select">
        <option value="_parent" <? if($rs_edit["menu_target"]=="_parent") echo"selected"; ?> >_parent</option>
        <option value="_blank" <? if($rs_edit["menu_target"]=="_blank") echo"selected"; ?> >_blank</option>
      </select>
	</td>
	<td>
	  <select name="menu_quyen_<?=$tam?>" id="select2">
        <option value="1" <? if($rs_edit["menu_quyen"]=="1") echo"selected"; ?> >1</option>
        <option value="2" <? if($rs_edit["menu_quyen"]=="2") echo"selected"; ?> >2</option>
        <option value="3" <? if($rs_edit["menu_quyen"]=="3") echo"selected"; ?> >3</option>
        <option value="4" <? if($rs_edit["menu_quyen"]=="4") echo"selected"; ?> >4</option>
      </select>
	</td>
	<td>
	  <select name="menu_type_<?=$tam?>" id="select3">
        <option value="1" <? if($rs_edit["menu_type"]=="1") echo"selected"; ?> >Management tool</option>
        <option value="2" <? if($rs_edit["menu_type"]=="2") echo"selected"; ?> >Control</option>
        <option value="3" <? if($rs_edit["menu_type"]=="3") echo"selected"; ?> >Orther</option>
      </select>
	</td>
	<td>
	  <input name="menu_sort_<?=$tam?>" type="text" id="menu_sort2" style="width:60px;" value="<?=$rs_edit["menu_sort"]?>" size="25" />
	</td>
	<td align="center">
	  <select name="menu_activate_<?=$tam?>" id="select4">
        <option value="1" <? if($rs_edit["menu_activate"]=="1") echo"selected"; ?> >Activate</option>
        <option value="0" <? if($rs_edit["menu_activate"]=="0") echo"selected"; ?> >Deactivate</option>
      </select>
	</td>
	</tr>
	<? } ?>
	</tbody>
</table>
	<table width="100%"><tr><td class="lot"><? 
	include("inc/inc_select.php");
	?>
	<input type="button" name="Submit42" value="Update" onClick="update_all_do('<?=$form_action?>','&update')" class="nut_nhan">
		<input type="button" name="Submit22" value="Delete" onClick="delete_all_do('<?=$form_action?>','&delete')" class="nut_nhan"><br /><br />
		</td></tr></table>	
		<INPUT type=hidden value='' name="chon">
		<input name="num" value="<?=$num?>" type="hidden"/>
		</form>	
		 <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>&add" method="post" name="form" >
                  <tr>
                    <td align="right" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td height="25" align="left" valign="middle" class="tab_left_5" style="font-weight: bold">New Menu </td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="tab_left_5"><input name="switcher" type=radio onfocus="setTypingMode(0)" value="OFF" checked  >
	    OFF
	    <input name="switcher" type=radio onfocus="setTypingMode(1)" value="TELEX" >
	    TELEX
	    <input name="switcher" type=radio onfocus="setTypingMode(2)" value="VNI" >
	    VNI</td>
                  </tr>
                  <tr>
                    <td width="191" align="right" valign="middle" class="text">Menu  Name: </td>
                    <td width="615" align="left" valign="middle" class="tab_5">
                    <input name="menu_ten" onKeyUp="initTyper(this);" type="text" size="25" style="width:400px;">                   </td>
                  </tr>
                    <tr>
                    <td width="191" align="right" valign="middle" class="text">Menu  link: </td>
                    <td width="615" align="left" valign="middle" class="tab_5">
                    <textarea name="menu_link" rows="3" id="menu_link" style="width:400px;"></textarea>                    </td>
                  </tr>
                  <tr>
                    <td width="191" align="right" valign="middle" class="text">Menu  Target: </td>
                    <td width="615" align="left" valign="middle" class="tab_5"><select name="menu_target" id="menu_target">
                      <option value="_parent">_parent</option>
                      <option value="_blank">_blank</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="191" align="right" valign="middle" class="text">Menu  Permission: </td>
                    <td width="615" align="left" valign="middle" class="tab_5"><select name="menu_quyen" id="menu_quyen">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="5">4</option>
                                        </select></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="text">Menu  type: </td>
                    <td align="left" valign="middle" class="tab_5"><select name="menu_type" id="menu_type">
                      <option value="1">Management tool</option>
                      <option value="2">Control</option>
                      <option value="3">Orther</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="191" align="right" valign="middle" class="text">Menu  sort: </td>
                    <td width="615" align="left" valign="middle" class="tab_5"><input name="menu_sort" type="text" id="menu_sort" style="width:200px;" size="25"></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="text">Menu  activate: </td>
                    <td align="left" valign="middle" class="tab_5"><select name="menu_activate" id="menu_activate">
                      <option value="1" selected>Activate</option>
                      <option value="0">Deactivate</option>
                                                            </select></td>
                  </tr>
                  
                  <tr>
                    <td height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="tab_5">
                    <input type="submit" name="Add" value="  Add  " >                    </td>
                  </tr>
                  <tr>
                    <td height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="tab_5"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
				  <input type="hidden" name="form_color" value="form_color">
				  </form>
                </table>
		 <? ?>	
		  </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? } else echo "Not permission! "; ?>
<? include("inc/bottom.php")?>
