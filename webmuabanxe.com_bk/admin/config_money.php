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
			$project_tien=stripslashes($_POST["project_tien"]);
			
			$id=1;
			$dat = date("F/j/Y");
			
			$table="tb_config_site";
			$query = "UPDATE $table SET project_tien_$lg='$project_tien'";
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
	<th height="23" colspan="2" valign="middle" id="senderheader"><? echo"Config Money";?></th>
	</tr>
	</thead>
	<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	  <td width="21%" valign=middle class="tab_10_bg_1">Money:</td>
	  <td width="79%" height="25" valign=middle><input name="project_tien" value="<?=$rs["project_tien_$lg"]?>" type="text" class="input" id="project_tien"  style="width:100px;" /></td>
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
