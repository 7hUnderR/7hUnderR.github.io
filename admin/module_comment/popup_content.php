<? include("../inc/banner.php")?>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
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
		$lg=$HTTP_GET_VARS["lg"];
		
		$query = "Select * FROM  tb_contact where id=$id ";							
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
 	   ?>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="30%" height="19" align="right" valign="middle" class="line_bottom">Subject:</td>
	  <td width="798" align="left" valign="middle" class="line_bottom"><?=$rs["title_$lg"];?>&nbsp;</td>
    </tr>
	      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Message:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["noi_dung_$lg"];?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Name:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["name_$lg"];?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Age:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["age"];?>&nbsp;</td>
    </tr>
	      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Address:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["address_$lg"];?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Country:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["country"];?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Email:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["email"];?>&nbsp;</td>
    </tr>
      <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Phone:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["phone"];?>&nbsp;</td>
    </tr>

     <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Company:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["company_$lg"];?>&nbsp;</td>
    </tr>
	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	    <td height="19" align="right" valign="middle" class="line_bottom">Occupation:</td>
	    <td align="left" valign="middle" class="line_bottom"><?=$rs["nghe_nghiep_$lg"];?>&nbsp;</td>
  </tr>
	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	    <td height="19" align="right" valign="middle" class="line_bottom">Field of Interesting: </td>
	    <td align="left" valign="middle" class="line_bottom"><?=$rs["so_thich_$lg"];?>&nbsp;</td>
  </tr>
	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
	    <td height="19" align="right" valign="middle" class="line_bottom">Education:</td>
	    <td align="left" valign="middle" class="line_bottom"><?=$rs["education_$lg"];?>&nbsp;</td>
  </tr>
	  <tr align="center" valign="middle" bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';> 
	  <td width="20%" height="19" align="right" valign="middle" class="line_bottom">Contact Day:</td>
	  <td align="left" valign="middle" class="line_bottom"><?=$rs["date"];?>; <?=$rs["gio"];?>&nbsp;</td>
	</tr>
	<tr align="center" valign="middle" bgcolor="#EFEFEF" class="bg_all"> 
	  <td height="32" colspan="2" valign="middle"><input name="button2" type="button" class="nut_nhan" onclick="javascript:window.print();" value="Print" style="width: 100px;"/>
	  <input name="button" type=button class="nut_nhan" onClick="javascript:self.close();" value="Close Window"></td>
	</tr>
</table>
<? include("../inc/bottom.php")?>