<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%" height="191" valign="top" class="tab_5"><?
	//echo"<span class=tieude><a href=\"./\" class=tieude>$project_title</a></span><br>";
	$query_ = "Select * FROM  tb_bac_1 where trang in ('1','2','3','6','5','7','32','5','18','19','47','31','30','82') and activate=1 and activate_setup=1 ORDER BY thu_tu ASC ";
	$result_ = mysql_query($query_);
	while($rs_= mysql_fetch_array($result_))
	{ 
	$ma_bac_1=$rs_["ma_bac_1"];
	
	$query = "Select * FROM  tb_bac_2 where ma_bac_1=$ma_bac_1 and ma_bac_1!=1 and activate=1 and activate_setup=1 ORDER BY thu_tu ASC ";
	$result = mysql_query($query);
    $num=  mysql_num_rows($result);
	if($num>0)
	   $ten_dv=$rs_["ten_$lg"];
	else
	   $ten_dv="<a href=\"./?Acat=$rs_[ma_bac_1]&lg=$lg&start=0\">".$rs_["ten_$lg"]."</a>";
	?> 
    <TABLE cellSpacing=0 cellPadding=0 border=0 width="100%">
      <!--DWLayoutTable-->
      
      <TR>
        <TD width="16" 
                            height=19 vAlign=middle 
                            ><img height=10 
                              src="images/icon/tree_con.gif" 
                              width=16></TD>
          <TD width=25 vAlign=middle><IMG height=13 
                              src="images/icon/menu_arr_nl.gif" 
                              width=13><IMG height=1 
                              src="images/icon/spc.gif" 
                              width=1></TD>
          <td valign="middle" class="text_def"><b><?=$ten_dv?></b></td>
        </TR>
    </TABLE>
    <?
									while($rs= mysql_fetch_array($result))
									{ 
									$ma_bac_2=$rs["ma_bac_2"];
									$query_s = "Select * FROM  tb_bac_3 where ma_bac_2=$ma_bac_2 and activate=1 and activate_setup=1 ORDER BY thu_tu ASC ";
									$result_s = mysql_query($query_s);
									$num_s=  mysql_num_rows($result_s);
									if($num_s>0)
									   $ten_dv_tp=$rs["ten_$lg"];
									else
									   $ten_dv_tp="<a href=\"./?Bcat=$rs[ma_bac_2]&lg=$lg&start=0\">".$rs["ten_$lg"]."</a>";
								  ?>
								   <TABLE cellSpacing=0 cellPadding=0 border=0 width="100%">
                                              <TR>
                                                <TD width="16" 
                                height=18 valign="top" background="images/tree_line.gif"><!--DWLayoutEmptyCell-->&nbsp;</TD>
                                                <TD width="16" vAlign=middle 
                                background="Site Map - Jurby WaterTech International_files/tree_line.gif"><IMG height=10 
                                src="images/icon/tree_con.gif" 
                                width=16></TD>
                                                <TD width=24 vAlign=middle><IMG height=1 
                                src="images/spc.gif" 
                                width=1><IMG height=13 
                                src="images/icon/menu_arr_nl.gif" 
                                width=13><IMG height=1 
                                src="images/spc.gif" 
                                width=1></TD>
                                                <TD  vAlign=middle class="text_def"><?=$ten_dv_tp?></TD>
                                              </TR>
      </TABLE>
					      <?
							while($rs_s= mysql_fetch_array($result_s))
							{ 
							$ten_dv_ct="<a href=\"./?Ccat=$rs_s[ma_bac_3]&lg=$lg&start=0\">".$rs_s["ten_$lg"]."</a>";
							
						  ?>
	  								   <TABLE cellSpacing=0 cellPadding=0 border=0 width="100%">
                                              <TR>
                                                <TD width="16" valign="top" background="images/tree_line.gif"><!--DWLayoutEmptyCell-->&nbsp;</TD>
                                                <TD width="16" 
                                height=18 valign="top" background="images/tree_line.gif"><!--DWLayoutEmptyCell-->&nbsp;</TD>
                                                <TD width="33" vAlign=middle 
                                ><IMG height=10 
                                src="images/icon/tree_con.gif" 
                                width=16></TD>
                                                <TD width=21 vAlign=middle><IMG height=1 
                                src="images/spc.gif" 
                                width=1><IMG height=13 
                                src="images/icon/menu_arr_nl.gif" 
                                width=13><IMG height=1 
                                src="images/spc.gif" 
                                width=1></TD>
                                                <TD  vAlign=middle class="text_def"><?=$ten_dv_ct?></TD>
                                              </TR>
    </TABLE>	  								   <? } } } ?></td>
</tr>
</table>
  