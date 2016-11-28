<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="471" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title">Deleting</td>
             </tr>
              <tr>
                <td height="441" valign="top" class="tab_left_10">
                  <? if($_GET["ma_del"]=="tam")
								{ 
								echo"<br>Deleting: ";
								$items =$_POST["chkids"];
								$items=str_replace (",", "','", $items);
								$query = "Select * FROM tb_shopping_cart_order WHERE id in ('$items')";
								$result = mysql_query($query);	
								$i=0;
								while($rs= mysql_fetch_array($result))
								 { 
								 $i++;
								 echo"<br> $i/ $rs[ma_order], $rs[ngay] ";
								 }
								 $cat=$_POST["cat"];
								 $start=$_POST["start"];
								 $ma_del=$_GET["ma_del"];
								 $id=$_POST["chkids"];
								 echo"<br><br><a href=\"delete.php?cat=$cat&start=$start&ma_del=$ma_del&id=$id\">Yes</a> | <a href=# onClick=\"history.go(-1);\">Cancel</a>";
								 }?>
								
                                <? if($_GET["ma_del"]=="account_admin")
								{ ?>
								Deleting "
								<?
								$items =$_POST["chkids"];
								$items=str_replace (",", "','", $items);
								$query = "Select * FROM tb_shopping_cart_account WHERE id in ('$items')";
								$result = mysql_query($query);	
								$i=0;
								while($rs= mysql_fetch_array($result))
								 { 
								 $i++;
								 echo"<br> $i/ $rs[id]: $rs[ten], $rs[ngay]";
								 }
								?>
								" ? <br>
								<br>
								<a href="delete.php?cat=0&start=<?=$_POST["start"]?>&ma_del=<?=$_GET["ma_del"]?>&id=<?=$_POST["chkids"]?>">
								<li> Yes</li>
								</a><br>
								<br>
								<a href="#" onClick="history.go(-1);">
								<li> Cancel</li>
								</a>
								<? }?></td>
              </tr>
                          </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
