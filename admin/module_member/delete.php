<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="272" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title">Delete</td>
             </tr>
              <tr>
                <td height="242" valign="top" class="tab_left_10"><span class="tabel">
                  <?
			
			$path_root=lay_path_root("local");
			$id=$HTTP_GET_VARS["id"]; 
			$ma_del=$HTTP_GET_VARS["ma_del"]; 
			
			$dir_dell_user =$path_root;
			
			
		if($ma_del=="account")
		  {
			$items=$_GET["id"];				 
			$items=str_replace (",", "','", $items);
			$query = "DELETE FROM tb_member WHERE id in ('$items')";

			if($result = mysql_query($query))
			echo"<br>Delete completed !";
			echo" <input type=button value=\"Back\" onClick=\"history.go(-2);\" name=\"button\">";
			}
			
			?>
                </span></td>
              </tr>
                        </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
