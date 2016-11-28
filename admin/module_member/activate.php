<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="272" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->
	  <tr>
		<td height="25" valign="middle" class="bg_title">Activate</td>
	 </tr>
	  <tr>
		<td height="227" valign="top" class="tab_left_10">
		  <?
		$ma_activate=$HTTP_GET_VARS["ma_activate"];
				

		if($ma_activate=="activate_account")
				   {
					$key =$_GET["key"];
					if($key=="activate")
					  $activate=1;
					else
					  $activate=0;
					$items =$_POST["chon"];
					$items=str_replace (",", "','", $items);
					$table_2="tb_member";
					$query_2 = "UPDATE $table_2 SET kichhoat='$activate'";
					$query_2 .= "WHERE id in ('$items')";
					if($result_2 = mysql_query($query_2))
					echo"Activate completed !";
					echo"<meta http-equiv=\"refresh\" content=\"0;url=index.php?cat=0&start=$_POST[start]\">"; 
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
