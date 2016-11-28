                    <table width="490" border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
					  <form action="admin_search_results.php" method="GET">
                      <tr>
                        <td width="210" height="42" valign="bottom"><span class="style2"><strong>Key Word </strong></span>
                          <input type="hidden" name="start" value="0">
                          <input maxlength=140 size=32 name="SearchText" style="FONT-FAMILY: Tahoma; WIDTH: 200px">						  </td>
                        <td width="210" valign="bottom"><? 
							include("dbconnect.php");
							$table="tb_bac_1";
							$query = "Select * FROM  $table order by thu_tu ASC";
							$result = mysql_query($query);
							?>
                          <select name="ma_bac_1" size="1" id="select" style="FONT-FAMILY: Tahoma; WIDTH: 210px">
                            <option value="-1" selected>-All Catalog- </option>
                            <? while($rs= mysql_fetch_array($result)){?>
                            <option value="<? echo $rs["ma_bac_1"]?>"> <? echo $rs["ten_$lg"]; ?> </option>
                            <? }?>
                        </select>                          </td>
                        <td width="70" align="center" valign="bottom"><input class=S1 type=submit value=Search name=Submit style="FONT-FAMILY: Tahoma;"></td>
                        </tr>
                     </form></table>
