<? include("banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="345" border="0" cellpadding="0" cellspacing="1">
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
		if($HTTP_GET_VARS["ma"]=="product") $table="tb_product";
		if($HTTP_GET_VARS["ma"]=="images") $table="tb_images";
		$query = "Select * FROM  $table  where id=$id ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		if($HTTP_GET_VARS["ma"]=="images")
		{
		$ma_images=$rs["ma_images"];
		$folder=gia_tri_mot_cot("tb_images_ma","ma_images",$ma_images,"ten_ma_images");
		}
 	   ?>
                <tr align="center" valign="middle" class="bg_all"> 
                  <td width="498" height="131" align="left" valign="middle"><? 
				  if($HTTP_GET_VARS["ma"]=="product") echo"<img src=\"../../images/photo/$rs[anh]\" border=0 alt=\"$rs[ghi_chu]\">";
				  if($HTTP_GET_VARS["ma"]=="images") echo"<img src=\"../../editer/data/images/$folder/$rs[ten_anh]\" border=0 alt=\"$rs[ghi_chu]\">";
				  mysql_close();?></td>
                </tr>
                <tr align="center" valign="middle" bgcolor="#EFEFEF" class="bg_all"> 
                  <td height="32"><input name="button" type=button class="tab_5" onClick="javascript:self.close();" value="Close Window"></td>
                </tr>
</table>
<? include("bottom.php")?>