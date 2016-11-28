<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
}
-->
</style>
<link href="../css_info.css" rel="stylesheet" type="text/css">
<table width="500" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
		<script language="JavaScript" type="text/JavaScript">
		<!--
		function MM_openBrWindow(theURL,winName,features) { //v2.0
		window.open(theURL,winName,features);
		}
		//-->
		</script>
		 <? 
		$id=$HTTP_GET_VARS["id"]; 	
		include("../dbconnect.php");
		$table="tb_product";
		$query = "Select * FROM  $table  where id=$id ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
 	   ?>
                <tr align="center" valign="middle" class="bg_all"> 
                  <td width="498" height="131" align="center" valign="middle"><? if($rs["anh"]!="") {echo"<img src=\"../../images/photo/$rs[anh]\" border=0 alt=\"$rs[ghi_chu]\">";} mysql_close();?></td>
                </tr>
                <tr align="center" valign="middle" bgcolor="#EFEFEF" class="bg_all"> 
                  <td height="32"><input name="button" type=button class="tab_5" onClick="javascript:self.close();" value="Close Window"></td>
                </tr>
</table>
