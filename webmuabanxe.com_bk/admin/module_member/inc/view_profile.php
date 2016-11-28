<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../../css_info.css" rel="stylesheet" type="text/css">

		 <? 
		$ma_user=$HTTP_GET_VARS["ma_user"]; 	
		include("../../inc/dbconnect.php");
		include("../../inc/common.php");
		$table="tb_member";
		$query = "Select * FROM  $table  where ma_user = $ma_user ";
		$result = mysql_query($query);
		$rs_ud= mysql_fetch_array($result);
 	   ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1">
                <!--DWLayoutTable-->
                <tr align="center"> 
                  <td height="23" colspan="2" align="center" valign="middle" bgcolor="#EFEFEF"  class="bg3">Profile</td>
  </tr>
                <tr align="center"> 
                  <td height="23" colspan="2" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><? echo"<b>$rs_ud[ten]</b> $rs_ud[ngay]";?></td>
                </tr>
  <tr>
    <td width="151" class="tab_10_bg_1">Name:</td>
  <td width="609" class="tab_left_10"><? echo"$rs_ud[ten]";?></td>
  </tr>
   <tr>
    <td class="tab_10_bg_1">Email: </td>
  <td class="tab_left_10"><? echo"$rs_ud[email]";?></td>
  </tr>

 <tr>
    <td class="tab_10_bg_1">Join Date:</td>
  <td class="tab_left_10"><? echo"$rs_ud[ngay]";?></td>
  </tr>
   <tr>
     <td class="tab_10_bg_1">Phone 1:</td>
     <td class="tab_left_10"><? echo"$rs_ud[dt_codinh]";?> </td>
   </tr>
   <tr>
    <td class="tab_10_bg_1">Phone 2:</td>
    <td class="tab_left_10">
      <? echo"$rs_ud[dt_didong]";?>    </td>
  </tr>
 <tr>
    <td class="tab_10_bg_1">Location:</td>
    <td class="tab_left_10"><? echo"$rs_ud[address]";?></td>
  </tr>
  </table>
				<div align="center">
	    <input name="button" type=button class="tab_5" onClick="javascript:self.close();" value="Close Window"  style="width:120px;">
</div>
