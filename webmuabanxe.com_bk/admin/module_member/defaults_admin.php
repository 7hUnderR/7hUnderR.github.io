<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="275" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td width="821" height="25" valign="middle" class="bg_title">Default</td>
             </tr>
             <tr>
               <td height="245" valign="top" bgcolor="#FFFBFF" class="tab_left_10">
			     <form name="form1" method="post" action="edit.php?ma_edit=admin_update_auto">
			  <br>
	      	  <?
							$table="tb_shopping_cart_auto";
							$query = "Select * FROM  $table";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);
							?><br>
		      Member:<br>
              <select name="account" id="select" style="FONT: 10px verdana,arial,helvetica;">
                <option value="1" <? if($rs["account"]=="1") echo"selected"?>>- Auto -</option>
			    <option value="0" <? if($rs["account"]=="0") echo"selected"?>>- Wait Activate -</option>
              </select>
              <br>
              <br>
			     <input type="submit" name="Submit" value="Update"> 
			   <input type="reset" name="Submit2" value="Reset">            
		       </p>
		       </form></td>
		     </tr>
                  </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>