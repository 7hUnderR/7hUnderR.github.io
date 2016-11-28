<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="153" height="272" valign="top" class="mau_lot"><? include("../inc/menu.php")?></td>
  <td width="617" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td width="617" height="30" valign="middle" class="thongbao">Add</td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10"><? 
				$ma_add=$HTTP_GET_VARS["ma_add"];
				
				if( $ma_add==2)
				{
				$table="tb_account_forum";
				$query = "Select * FROM  $table ORDER BY id DESC";
				$result = mysql_query($query);
				$rs= mysql_fetch_array($result);
				
				$ma_forum=$rs["ma_forum"]+1;
				$ten_forum=rep($HTTP_POST_VARS["tendichvu"]);
				$mota=rep($HTTP_POST_VARS["mota"]);
			
				$table="tb_account_forum";
				$query = "INSERT INTO $table(ma_forum,ten_forum,mota)";
				$query .= " VALUES('$ma_forum','$ten_forum','$mota')";
				if($result = mysql_query($query))
				echo "Forum Add Complete !";
				}
				echo" <input type=button value=\"Back\" onClick=\"history.go(-1);\" name=\"button\">";
				?></td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
