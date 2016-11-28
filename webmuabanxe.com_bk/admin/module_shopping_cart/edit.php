<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="272" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="30" valign="middle" class="bg_title"> Editing </td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10"><?
				$edit=$HTTP_GET_VARS["ma_edit"];
				if($edit=="admin_update_auto")
				{
				$account=rep($HTTP_POST_VARS["account"]);
				//$topic=rep($HTTP_POST_VARS["topic"]);
				//$topic_tl=rep($HTTP_POST_VARS["topic_tl"]);
						
				$table="tb_shopping_cart_auto";
				$query = "UPDATE $table SET account='$account'";
				//$query = "UPDATE $table SET account='$account',topic='$topic',topic_tl='$topic_tl'";
				if($result = mysql_query($query))
				echo"<br>Update complete !";
				echo" <input type=button value=\"Back\" onClick=\"history.go(-1);\" name=\"button\">";
				}
	if($edit=="discount"){
				$num=$HTTP_POST_VARS["num"]; 
				$start=$HTTP_POST_VARS["start"]; 
				$cat=$HTTP_POST_VARS["cat"]; 
				for($i=1;$i<=$num; $i++)
				{
				$id=rep($HTTP_POST_VARS["id_$i"]);
				$discount=rep($HTTP_POST_VARS["discount_$i"]);
				//$type=rep($HTTP_POST_VARS["type_$i"]);
				//$percent=rep($HTTP_POST_VARS["percent_$i"]);
				//$code_percent=rep($HTTP_POST_VARS["percent_code_$i"]);
				$diem=rep($HTTP_POST_VARS["diem_$i"]);
				
				//echo"<br> $id | $discount";
				$query = "UPDATE tb_shopping_cart_account SET diem='$diem', code_discount='$discount'";
				$query .= "WHERE id=$id";
				$result = mysql_query($query);
				}
				echo"<br>Update complete !";
				echo"<meta http-equiv=\"refresh\" content=\"1;url=member.php?cat=$cat&start=$start\">";
				}
				
			?>
			</td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
