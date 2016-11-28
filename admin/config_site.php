<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" rowspan="3" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
    <td width="85%" height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&alpha=All&start=0"><img src="images/home.gif" width="14" height="14" border="0"> Home</a> » Config</td>
  </tr>
  <tr>
    <td height="481" valign="top" bgcolor="#FFFBFF" class="bg_center">
	<?
			if(isset($HTTP_GET_VARS["lg"]))
			  $lg = $HTTP_GET_VARS["lg"];
			else
			  $lg="vn";
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr height="18">
  <td width="50%" align="left" valign="middle" height="30" class="tab_lr_5 bg_page_border_bottom">&nbsp;</td>
  <td width="50%" align="right" valign="middle" class="tab_lr_5 bg_page_border_bottom">&nbsp;<? include("inc/inc_lg.php"); ?></td>
</tr>
</table>
     <?
		if ( (isset($_POST["form_config"])) && ($_POST["form_config"] == "form_config"))
		 {
			
			$project_title=stripslashes($_POST["project_title"]);
			$project_url=stripslashes($_POST["project_url"]);
			$project_search_engines=stripslashes($_POST["project_search_engines"]);
			
			$project_keywork=stripslashes($_POST["project_keywork"]);
			$project_description=stripslashes($_POST["project_description"]);
			$project_email=stripslashes($_POST["project_email"]);
			$project_email_2=stripslashes($_POST["project_email_2"]);
			$project_visitors=stripslashes($_POST["project_visitors"]);
			$project_copyright=stripslashes($_POST["project_copyright"]);
			
			$id=1;
			$dat = date("F/j/Y");
			
			$table="tb_config_site";
			$query = "UPDATE $table SET 
			project_title_$lg='$project_title',
			project_keywork='$project_keywork',
			project_description='$project_description', 
			project_email='$project_email', 
			project_email_2='$project_email_2',
			project_visitors='$project_visitors',
			project_copyright_$lg='$project_copyright',
			project_url='$project_url', 
			project_search_engines='$project_search_engines',
			date='$dat'";
			$query .= " WHERE id ='$id' ";
			$result = mysql_query($query);
				$tip="Update completed !";
		
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		
		}
		?>
<table id="datatable" class="tbldata" cellpadding=5 width="650" cellspacing=0 border=0>
      <form name="form_config" method="post" action="<?=$form_action?>">
        <?
		 $query = "Select * FROM  tb_config_site ";
		 $result = mysql_query($query);
		 $rs= mysql_fetch_array($result);
		 include("../tool/fckeditor.php");
		 ?>
	<thead>
	<tr>
	<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Config site";?></th>
	</tr>
	</thead>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td width="21%" valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="22" valign=middle><? include("inc/inc_go_dau_vn.php"); ?></td>
	</tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1">Project title:</td>
	<td width="79%" height="22" valign=middle><input name="project_title" value="<?=$rs["project_title_$lg"]?>" onkeyup="initTyper(this);" type="text" class="input" id="project_title"  style="width:500px;" /></td>
	</tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="middle" class="tab_10_bg_1">Project URL:</td>
	  <td height="22" valign="middle"><input name="project_url" value="<?=$rs["project_url"]?>" onkeyup="initTyper(this);" type="text" class="input" id="project_url"  style="width:500px;" /></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1">Key work:</td>
	<td height="22" valign=middle><textarea name="project_keywork" class="textarea" style="width:500px; height:100px;"><?=$rs["project_keywork"]?></textarea></td>
	</tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="top" class="tab_10_bg_1">Search Engines:</td>
	  <td height="20" valign="middle"><textarea name="project_search_engines" class="textarea" id="project_search_engines" style="width:500px; height:100px;"><?=$rs["project_search_engines"]?></textarea></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=top class="tab_10_bg_1">Description:</td>
	<td height="20" valign=middle><textarea name="project_description" class="textarea" id="project_description" style="width:500px; height:100px;"><?=$rs["project_description"]?></textarea></td>
	</tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="middle" class="tab_10_bg_1">Project email:</td>
	  <td height="20" valign="middle"><input name="project_email" value="<?=$rs["project_email"]?>" type="text" class="input" id="project_email" style="width:500px;" /></td>
	  </tr>
	<tr bgcolor='ffffff' onmouseover="this.style.backgroundColor='#EAEAEA';" onmouseout="this.style.backgroundColor='#ffffff';">
      <td valign="middle" class="tab_10_bg_1">Project email order:</td>
	  <td height="20" valign="middle"><input name="project_email_2" value="<?=$rs["project_email_2"]?>" type="text" class="input" id="project_email_2" style="width:500px;" /></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td valign=middle class="tab_10_bg_1">Visitors:</td>
	  <td height="20" valign=middle><input name="project_visitors" value="<?=$rs["project_visitors"]?>" type="text" class="input" id="project_email_22" style="width:200px;" /></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td valign=middle class="tab_10_bg_1">Project Copyright:</td>
	  <td height="20" valign=middle><?php
	$sBasePath = $_SERVER['PHP_SELF'];
	$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
	
	$oFCKeditor = new FCKeditor('project_copyright');
	$oFCKeditor->ToolbarSet	= 'Basic';
	$oFCKeditor->Height = 200;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $rs["project_copyright_$lg"];
	$oFCKeditor->Create() ;
	?></td>
	  </tr>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	<td valign=middle class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td height="25" valign=middle><input name="Submit3" type="submit" class="nut_nhan" value="Update" />
      <input name="Submit22" type="reset" class="nut_nhan" value="Reset" />
      <input type="hidden" value="form_config" name="form_config" /></td>
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
