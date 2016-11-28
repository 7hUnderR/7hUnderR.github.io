                    <table width="502" border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
					  <form action="admin_search_results.php" method="GET">
                      <tr>
                        <td width="502" height="43" valign="top" class="S9">Key Word 
                          <input type="hidden" name="start" value="0">
                          <br>
                          <input name="SearchText" style="FONT-FAMILY: Tahoma; WIDTH: 150px" value="<?=$HTTP_GET_VARS["SearchText"]?>" size=32 maxlength=140>
                          <? 
							include("dbconnect.php");
							$table="tb_bac_1";
							$query = "Select * FROM  $table order by thu_tu ASC";
							$result = mysql_query($query);
							?>
                          <select name="ma_bac_1" size="1" id="select" style="FONT-FAMILY: Tahoma;">
                            <option value="-1" <? if($HTTP_GET_VARS["ma_bac_1"]==-1) echo"selected" ?> >-All Catalog- </option>
                            <? while($rs= mysql_fetch_array($result)){?>
                            <option value="<? echo $rs["ma_bac_1"]?>" <? if($HTTP_GET_VARS["ma_bac_1"]==$rs["ma_bac_1"]) echo"selected" ?> > <? echo $rs["ten_$lg"]; ?> </option>
                            <? }?>
                                </select>
                          <input class=S1 type=submit value=Search name=Submit style="FONT-FAMILY: Tahoma;"></td>
                        </tr>
                     </form></table>
