<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? if($ma_user_admin==1) {?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> Index</td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><? 
		
		
		$form_action = $_SERVER['PHP_SELF'];
        
		
		  $qr = $_SERVER["QUERY_STRING"];
		
		  //$qr = getenv('QUERY_STRING');
		
		if(strstr($qr,"delete"))
		 {
			$items = $HTTP_POST_VARS["chon"];
			$items = str_replace (",", "','", $items);

			$query__ = "DELETE  FROM tb_setup WHERE id in ('$items')";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		
		if(strstr($qr,"update"))
		   {

			$num=$HTTP_POST_VARS["num"]; 
			for($i=1;$i<=$num; $i++)
			{

			$id=$_POST["id_$i"];
			$ten_dv=rep($HTTP_POST_VARS["ten_$i"]);
			$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
			
			$activate=rep($HTTP_POST_VARS["activate_$i"]);
			$bac=rep($HTTP_POST_VARS["bac_$i"]);

			$table_edit="tb_setup";
			$query_edit = "UPDATE $table_edit SET ten_dm='$ten_dv',thu_tu='$thu_tu',ma_bac='$bac',activate='$activate'";
			$query_edit .= "WHERE id =$id";
			$result_edit = mysql_query($query_edit);
			$result_edit = mysql_query($query_edit);
			}
			
			$tip="Update completed !";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
		  }
		
		?>		  
		<? 
		 $table="tb_setup";
		 $query = "Select * FROM  $table order by ma_bac,thu_tu,ma_dm ASC";
		 $result = mysql_query($query);
		 $num=mysql_num_rows($result);
		 $tam=0;
		?>		
        <form name=messageList ENCTYPE="multipart/form-data" method=post action="#">
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
	<thead>
	<tr>
	<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	<th width=9% id="senderheader">Step</th>
	<th id="subjectheader" width=8%>Code</th>
	<th id="subjectheader" width=55%>Folder Name / add / edit / delete</th>
	<th id="subjectheader" width=16%>Sort</th>
	<th id="subjectheader" width=16%>Num</th>
	<th id="subjectheader" width=9%>Activate</th>
	</tr>
	</thead>
	<tbody>
	<input type="hidden" name="cat" value="<?=$cat?>">
	<input type="hidden" name="start" value="<?=$start?>">
          <? 
		  while($rs= mysql_fetch_array($result)) 
		  {
		  $tam++; 
		  $ma_dm=$rs["ma_dm"];
		  $bac=$rs["ma_bac"];
		  $id=$rs["id"];
		 
		  if($bac==1)
			$table="tb_bac_1";
		  if($bac==2)
			$table="tb_bac_2";
		  if($bac==3)
			$table="tb_bac_3";
		  if($bac==4)
			$table="tb_bac_4 ";
		  if($bac==5)
			$table="tb_bac_5";
			
			 $query_ = "Select * FROM  $table where trang=$ma_dm";
			 $result_ = mysql_query($query_);
			$num_items = mysql_num_rows($result_);
			
			if($bac==1) $bg="#CBCAD9"; else $bg="#FFFFFF";
		  ?>
	<tr bgcolor='<?=$bg?>'  onMouseOut=this.style.backgroundColor='<?=$bg?>'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td height="25" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$id?>"></td>
	<td><select name="bac_<?=$tam?>"  class="text" id="trang">
    <option value="1" <? if($rs["ma_bac"]==1) echo"selected";?>>Step 1</option>
    <option value="2" <? if($rs["ma_bac"]==2) echo"selected";?>>Step 2</option>
    <option value="3" <? if($rs["ma_bac"]==3) echo"selected";?>>Step 3</option>
    <option value="4" <? if($rs["ma_bac"]==4) echo"selected";?>>Step 4</option>
    <option value="5" <? if($rs["ma_bac"]==5) echo"selected";?>>Step 5</option>
  </select>  </td>
	<td><? echo $rs["ma_dm"]; ?></td>
	<td valign="middle"><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>" />
	  <input name="ten_<?=$tam?>" type="text" class="input" style="width:350px;" value="<?=$rs["ten_dm"];?>" /></td>
	<td><input name="thu_tu_<?=$tam?>" type="text" class="input" style="width:40px;" value="<?=$rs["thu_tu"];?>" /></td>
	<td><? echo"<font color=\"#999999\" class=\"s10\">($num_items)</font>"; ?></td>
	<td align="center"><select name="activate_<?=$tam?>"  class="text" id="activate">
      <option value="1" <? if($rs["activate"]==1) echo"selected";?>>ON</option>
      <option value="0" <? if($rs["activate"]==0) echo"selected";?>>OFF</option>
    </select></td>
	</tr>
	<? } ?>
	</tbody>
</table>
	<table width="100%"><tr><td class="lot"><? 
	include("inc/inc_select.php");
	?><input type="button" name="Submit42" value="Update" onClick="update_all_do('<?=$form_action?>','?update')" class="nut_nhan">
		<input type="button" name="Submit22" value="Delete" onClick="delete_all_do('<?=$form_action?>','?delete')" class="nut_nhan"><br /><br />
		</td></tr></table>	
		<INPUT type=hidden value='' name="chon">
		<input name="num" value="<?=$num?>" type="hidden"/>
		</form>	
		         <?
			   		$form_action = $_SERVER['PHP_SELF'];
		
		if(strstr($_SERVER["QUERY_STRING"],"add"))
		 {
			
			$ma_dm=max_id("tb_setup","ma_dm")+1;
			$thu_tu=max_cot("tb_setup","thu_tu")+1;
			
			$ten_dv=rep($HTTP_POST_VARS["tendichvu"]);
			
			$file_add=rep($HTTP_POST_VARS["file_add"]);
			$file_edit=rep($HTTP_POST_VARS["file_edit"]);
			$file_view=rep($HTTP_POST_VARS["file_view"]);
			$file_view_web=rep($HTTP_POST_VARS["file_view_web"]);
			$file_table=rep($HTTP_POST_VARS["file_table"]);
			$activate=rep($HTTP_POST_VARS["activate"]);
			$bac=rep($HTTP_POST_VARS["bac"]);
			
			$table="tb_setup";
			$query = "INSERT INTO $table(ma_bac,ma_dm,ten_dm,file_add,file_edit,file_view,tb,file_view_web,activate,thu_tu)";
			$query .= " VALUES('$bac','$ma_dm','$ten_dv','$file_add','$file_edit','$file_view','$file_table','$file_view_web','$activate','$thu_tu')";
			if($result = mysql_query($query))
			$tip="Setup folder completed !";

				
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}

			   ?>
	  <form action="<?=$form_action?>?add" method="post" name="form" >
        <span style="font-weight: bold">New Folder:</span><br>
            <br>
            <input name="switcher" type=radio onfocus="setTypingMode(0)" value="OFF" checked  >
    OFF
    <input name="switcher" type=radio onfocus="setTypingMode(1)" value="TELEX" >
    TELEX
    <input name="switcher" type=radio onfocus="setTypingMode(2)" value="VNI" >
    VNI<br>
    Name folder:<br>
    <input name="tendichvu" onKeyUp="initTyper(this);" type="text" class="input" id="tendichvu" style="width:300px;">
    <br>
    File add:<br>
    <input name="file_add" type="text" class="input" id="file_add" style="width:300px;">
    <br>
    File edit:<br>
    <input name="file_edit" type="text" class="input" id="file_edit" style="width:300px;">
    <br>
    File view:<br>
    <input name="file_view" type="text" class="input" id="file_view" style="width:300px;">
    <br />
    Table:<br />
    <input name="file_table" type="text" class="input" id="file_table" style="width:300px;" />
    <br />
    File view web:<br />
    <input name="file_view_web" type="text" class="input" style="width:300px;" />
<br>
    Activate:<br>
    <select name="activate"  class="selected" id="activate">
      <option value="1">ON</option>
      <option value="0">OFF</option>
    </select>
    <br>
    Step<br>
    <select name="bac"  class="selected" id="trang">
      <option value="1">Step 1</option>
      <option value="2">Step 2</option>
      <option value="3">Step 3</option>
      <option value="4">Step 4</option>
      <option value="5">Step 5</option>
    </select>
    <br>
    <br>
    <input name="Submit" type="submit" class="nut_nhan" value="Add new">
    <input name="Submit2" type="reset" class="nut_nhan" value="Reset">
      </form>	
</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? } else echo "Not permission!"; ?>
<? include("inc/bottom.php")?>
