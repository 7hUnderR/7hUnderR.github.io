<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" rowspan="3" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
    <td width="85%" height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&start=0&alpha=All"><img src="images/home.gif" width="14" height="14" border="0"> Home</a> > Config</td>
  </tr>
  <tr>
    <td height="481" valign="top" class="bg_center">
      <?
		$form_action = $_SERVER['PHP_SELF'];
		
		if ( (isset($_POST["form_config"])) && ($_POST["form_config"] == "form_config"))
		 {
			$email_title=rep($_POST["email_title"]);
			$email=rep($_POST["email"]);
			$on_off=rep($_POST["on_off"]);
			

			//email_order_title='$email_order_title',email_order='$email_order', email_register='$on_off',
			//email_order_reply_title='$email_order_reply_title', email_order_reply='$email_order_reply', 
			//email_contact_title='$email_contact_title',	email_contact='$email_contact', 
			//email_forget_password_title='$email_forget_password_title',	email_forget_password='$email_forget_password', 
			//email_join_newsletter_title='$email_join_newsletter_title',email_join_newsletter='$email_join_newsletter', 

			
			
			$id=1;
			
			$table="tb_config_email_auto";
			$query = "UPDATE $table SET 
			email_forget_password_title='$email_title',email_forget_password='$email',email_forget_password_on_off='$on_off' ";
			
			$query .= " WHERE id = $id ";
			if($result = mysql_query($query))
				$tip="Update completed !";
		     else
			    $tip="Can't update!";
				
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		
		}
		?>
        <?
		 $query = "Select * FROM  tb_config_email_auto ";
		 $result = mysql_query($query);
		 $rs= mysql_fetch_array($result);
		 $on_off=$rs["email_forget_password_on_off"];
		?>
      <table id="datatable" class="tbldata" cellpadding=10 width="600" cellspacing=0 border=0>
     <!--DWLayoutTable-->
     <form name="form_config" method="post" action="<?=$form_action?>">
    <thead>
      <tr>
        <th height="23" colspan="2" valign="middle" id="senderheader">Auto email forget password </th>
	  </tr>
      </thead>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td width="15%" valign=middle class="tab_10_bg_1">Title:</td>
      <td width="85%" height="22" valign=middle><input name="email_title" type="text" class="text" style="width:500px;" value="<?=$rs["email_forget_password_title"]?>" maxlength="100" /></td>
    </tr>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td valign=middle class="tab_10_bg_1">Content:</td>
      <td height="22" valign=middle><?php
						include("../tool/fckeditor.php") ;
						$sBasePath = $_SERVER['PHP_SELF'];
						$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
						
						$oFCKeditor = new FCKeditor('email');
						$oFCKeditor->ToolbarSet	= 'Basic';
						$oFCKeditor->Height = 200;
						$oFCKeditor->Width = 500;
						$oFCKeditor->BasePath	= $sBasePath ;
						$oFCKeditor->Value		= $rs["email_forget_password"];
						$oFCKeditor->Create() ;
						?></td>
    </tr>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td valign=middle class="tab_10_bg_1">On/Off</td>
      <td height="20" valign=middle><select name="on_off">
        <option value="1" <? if($on_off==1) echo"selected"; ?> >On</option>
        <option value="0" <? if($on_off==0) echo"selected"; ?> >Off</option>
      </select></td>
    </tr>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td height="25" valign=middle><input type="hidden" value="form_config" name="form_config">
	    <input name="Submit" type="submit" class="nut_nhan" value="Update">
	    <input name="Submit2" type="reset" class="nut_nhan" value="Reset">
	    <input type="reset" name="Submit22" class="nut_nhan" value="Cancel" style="width:60px;" onclick="history.go(-1)" /></td>
	  </tr>
    </form>
    </table>
	
	</td>
  </tr>
  <tr>
    <td height="13"></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
