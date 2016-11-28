<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="275" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td width="821" height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> <?=gia_tri_mot_cot("tb_setup_menu","id","$menu","menu_ten");?></a> » <?=gia_tri_mot_cot("tb_setup_menu_s","id","$menu_s","menu_ten");?></td>
             </tr>
             <tr>
               <td height="245" valign="top" class="bg_center tab_5">
			   <?
				if ((isset($_POST["form"])) && ($_POST["form"] == "form")) 
				{
				$account=rep($HTTP_POST_VARS["account"]);
				$table="tb_member_auto";
				$query = "UPDATE $table SET account='$account' ";
				if($result = mysql_query($query))
				echo"<br>Update completed !";
				echo"<meta http-equiv=refresh content=2;url=$form_action>";
				}
				else
				{
			   ?>
			     <form name="form" method="post" action="<?=$form_action?>">
			  <br>
	      	  <?
							$table="tb_member_auto";
							$query = "Select * FROM  $table";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);
							?><br>
		      Member:<br>
              <select name="account" id="select">
                <option value="1" <? if($rs["account"]=="1") echo"selected"?>>- Auto -</option>
			    <option value="0" <? if($rs["account"]=="0") echo"selected"?>>- Wait Activate -</option>
              </select>
              <br>
              <br>
			     <input type="submit" class="nut_nhan" name="Submit" value="Update"> 
			   <input type="reset" class="nut_nhan" name="Submit2" value="Reset">            
		       </p>
			   <input name="form" value="form" type="hidden" />
		       </form><? } ?></td>
		     </tr>
                  </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>