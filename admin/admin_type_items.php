<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="151" height="518" valign="top" bgcolor="#F7F7FF" class="mau_lot"><? include("inc/menu.php")?></td>
  <td width="822" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td width="12" height="30">&nbsp;</td>
                <td width="596" valign="middle" class="tieude"><a href="index.php"><img src="images/home.gif" width="14" height="14" border="0"> Folder</a> &gt;</td>
             </tr>
             <tr>
               <td height="488" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7FF">
                            <!--DWLayoutTable-->
                            <tr>
                              <td width="608" height="488" valign="top" bgcolor="#FFFBFF" class="tab_left_10">
								<? 
								 include("dbconnect.php");
								 $table="tb_ma_loai_dv";
								 $query = "Select * FROM  $table order by id";
								 $result = mysql_query($query);
								 $tam=0;
								 while($rs= mysql_fetch_array($result)) { $tam++; $ma_loai_dv=$rs["ma_loai_dv"];?>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <!--DWLayoutTable-->
                                  <tr>
                                    <td width="42" height="25" align="center" valign="middle" class="S9"><? echo $tam; ?></td>
                                    <td width="451" valign="middle" class="S9">
									<img src="images/folder.jpg" width="34" height="18" border="0"> <? echo $rs["ten_loai_dv"]; ?>
									<? $num=dem_max_dk("tb_company","industry",$ma_loai_dv); echo"[ $num ]";?>									</td>
                                    <td width="38" valign="middle" class="S9"><a href="admin_edit.php?&id=<? echo $rs["id"]?>&ma_edit=loai_dv"><img src="images/edit.gif" alt="Edit" border="0"></a></td>
                                  <td width="67" valign="middle" class="S9"><? if($num==0) {?> <a href="admin_delete_wait.php?id=<?=$rs["id"]?>&ma_del=loai_dv"><? echo"<img src=\"images/del.jpg\" width=21 height=21 border=0 alt=Delete>";?></a><? }?></td>
                                  </tr>
                                </table>                                <? }?>                                <br>                                <hr size="1" color="#CCCCCC">
                                <span class="tieude">New Type Items&#7909;: </span>
                                <form name="form1" method="post" action="admin_add.php?ma_add=loai_dv">
									  <input name="switcher" type=radio onfocus="setTypingMode(0)" value="OFF" checked  >
OFF
<input name="switcher" type=radio onfocus="setTypingMode(1)" value="TELEX" >
TELEX
<input name="switcher" type=radio onfocus="setTypingMode(2)" value="VNI" >
VNI<br>
  								Service Name:<br>
									<input name="tendichvu" type="text" onKeyUp="initTyper(this);" class="text" id="tendichvu" size="50">
									<br>
									<br>
									<input type="submit" name="Submit" value="Add New"> 
									<input type="reset" name="Submit2" value="Reset"> 
							    </form></td>
						  </tr>
                          <!--DWLayoutTable-->
               </table></td>
            </tr>
                      </table></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
