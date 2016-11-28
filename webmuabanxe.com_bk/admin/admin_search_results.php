<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<SCRIPT language=JavaScript>
function check(checked)
{
  for(var i=0;i<document.form.elements.length;i++)
  {  
     var e = document.form.elements[i];
     if (e.name == 'chkBuyOfferIds') {
        e.checked = checked;
     }
  }
}
function delete_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_delete_wait.php?ma_del=product&id=0";
        document.form.target="";
        document.form.submit();
    }
}

function activate_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=activate&key=search";
        document.form.target="";
        document.form.submit();
    }
}

function deactivate_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.form.basketItemNum.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select item !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.form.action="admin_activate.php?ma_act=deactivate&key=search";
        document.form.target="";
        document.form.submit();
    }
}

function getCheckedNum()
{
    var num = 0;                
    for(var i=0;i<document.form.elements.length;i++)
    {  
        var e = document.form.elements[i];
        if (e.name == 'chkBuyOfferIds') {
            if(e.checked)
                num++;
        }
    }
    return num;
}

 function checkInput()
		   {
				var alen=document.form.elements.length;
				var isChecked=false;
				var isNum=true;
				alen=(alen>1)?document.form.chkBuyOfferIds.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
					{
						if(document.form.chkBuyOfferIds[i].checked==true)
						{
							isChecked=true;							
							break;
						}
					}
										
				}else
				{
					if(document.form.chkBuyOfferIds.checked==true)
						isChecked=true;
				}
				
				if (isChecked)											
					calculatechon();
			return isChecked;
		  } 
function calculatechon()
			{			
				var strchon="";
				var alen=document.form.elements.length;				
				alen=(alen>1)?document.form.chkBuyOfferIds.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.form.chkBuyOfferIds[i].checked==true)
							strchon+=document.form.chkBuyOfferIds[i].value+",";
				}else
				{
					if(document.form.chkBuyOfferIds.checked==true)
						strchon=document.form.chkBuyOfferIds[i].value;
				}
				document.form.chkids.value=strchon;	
				
			}	
		function view_content(id)
			{
				var arg= "width=450,height=550,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
				window.open ("inc/popup_content.php?ma=product&id="+ id ,"a",arg);	
				
			}

</SCRIPT>
  <tr>
    <td width="148" height="304" valign="top" class="mau_lot"><? include("inc/menu.php")?></td>
    <td width="825" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
                <!--DWLayoutTable-->
                <tr align="left" bgcolor="#DEDFDE"> 
                  <td height="57" colspan="3" valign="middle" class="tab_left_10"><? include("inc/inc_search_.php")?></td>
                </tr>
				                <tr align="left" bgcolor="#DEDFDE"> 
                  <td height="29" colspan="3" valign="middle" class="tab_left_10">SEARCH RESULTS 
				  <? 
					$lg="vn";
					if(isset($HTTP_GET_VARS["lg"])){
						$lg = $HTTP_GET_VARS["lg"];
					}					
   				   $i=0;
					$PHP_SELF="admin_search_results.php";
				  	$start = 0; 
					$page_count = 10; 
					$cut_off = 10; 
					$SearchText=$HTTP_GET_VARS["SearchText"]; 
					$text_upper = strtoupper($SearchText); //COMPANY
					$text_name = ucwords(strtolower($SearchText)); //Ban Tran
					$ma_bac_1=$HTTP_GET_VARS["ma_bac_1"]; 
					require("inc/pagingsearch.php");
					

					if(($ma_bac_1==-1)&&($SearchText==""))
					$query = "Select * FROM  $table ORDER BY id ASC LIMIT $start, $page_count ";
					if(($ma_bac_1!=-1)&&($SearchText==""))
					$query = "Select * FROM  $table where ma_bac_1=$ma_bac_1 ORDER BY id ASC LIMIT $start, $page_count ";
					if(($ma_bac_1==-1)&&($SearchText!=""))
					$query = "Select * FROM  $table  WHERE ((ten_vn LIKE '%".$SearchText."%' ) or (id LIKE '%".$SearchText."%') or (mo_ta_vn LIKE '%".$SearchText."%') or (ten_vn LIKE '%".$text_upper."%') or (id LIKE '%".$text_upper."%') or (mo_ta_vn LIKE '%".$text_upper."%') or (ten_vn LIKE '%".$text_name."%') or (id LIKE '%".$text_name."%') or (mo_ta_vn LIKE '%".$text_name."%')) ORDER BY id ASC LIMIT $start, $page_count ";
					if(($ma_bac_1!=-1)&&($SearchText!=""))
					$query = "Select * FROM  $table  WHERE ma_bac_1=$ma_bac_1 and ((ten_vn LIKE '%".$SearchText."%' ) or (id LIKE '%".$SearchText."%') or (mo_ta_vn LIKE '%".$SearchText."%') or (ten_vn LIKE '%".$text_upper."%') or (id LIKE '%".$text_upper."%') or (mo_ta_vn LIKE '%".$text_upper."%') or (ten_vn LIKE '%".$text_name."%') or (id LIKE '%".$text_name."%') or (mo_ta_vn LIKE '%".$text_name."%')) ORDER BY id ASC LIMIT $start, $page_count ";
					$result = mysql_query($query);
					
				  ?></td>
                </tr>
					 <? if( $num>0) {?>
		    <FORM style="MARGIN: 0px" name="form" action="feedback.php" method=post onSubmit="return checkInput();">
					 <INPUT type=hidden value='20"' name=basketItemMax> 
					 <INPUT type=hidden value='0"' name=basketItemNum>
				 <tr align="center" bgcolor="#EFEFEF"> 
                  <td height="31" colspan="3" align="right"  valign="middle"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
				  <!--DWLayoutTable-->
					<tr>
					  <td width="281" rowspan="2" valign="middle" align="center" class="text"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$ma_bac_1,$SearchText);?></td>
					  <td width="141" height="30" align="center" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
					  <td width="193" rowspan="2" align="left" valign="middle"><A href="javascript:activate_do()"><img src="images/activate_do.gif" width="60" height="21" border="0"></A> <A href="javascript:deactivate_do()"><img src="images/deactivate_do.gif" width="60" height="21" border="0"></A> <A href="javascript:delete_do()"><img src="images/delete.gif" width="60" height="21" border="0"></A></td>
					</tr>
					<tr>
					  <td height="1"></td>
				    </tr>
                  </table></td>
                </tr>
                 <? 
				 while ($rs= mysql_fetch_array($result)) { 
				  $id=$rs["id"];
				  $cat=$rs["ma_bac_1"];
				  $cat_s=$rs["ma_bac_2"];
				  $ten_dv_tp=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg");
				  $cat_s_s=$rs["ma_bac_3"];
				  $ten_dv_ct=gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg");
				  $i++;
 				  $cat_s_s_s=$rs["ma_bac_4"];
				  $nguoi_viet=gia_tri_mot_cot("tb_admin","ma_user",$rs["nguoi_viet"],"user");
				  ?>
                <tr align="center"> 
                  <td width="425" height="23" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><? echo"$ten_dv_tp"; echo" > $ten_dv_ct";?></td>
                  <td width="110" align="left" valign="middle" bgcolor="#EFEFEF" class="S9">
				  <input name="chkBuyOfferIds" type=checkbox id="chkBuyOfferIds" value="<? echo"$rs[id]"?>"> Select
                  <input name="chkBuyOfferIds" type="hidden" id="chkBuyOfferIds3" value="-1">
</td>
                <td width="78" valign="middle" bgcolor="#EFEFEF">
				  <span class="S9">
				  Edit 
				  | Edit F
				   </span>
                </td>
                </tr>
                <tr align="center">
                  <td height="98" align="left" valign="top" bgcolor="#F7F3F7" class="S9">
                    <? 	//$company=gia_tri_mot_cot("tb_company","ma_company",$rs["ma_company"],"Company");
					    //if($rs["loai_baiviet"]==1) $vb="<b>V</b>"; else $vb="<b>B</b>";
						$ghi_chu=chuan_hoa_chuoi("$rs[ghi_chu_eg]");
						echo "<b>Code :</b> ";
						echo " <b>$rs[id] </b> <br>";//$company <br>";
					    echo "<b>Title :</b><br>";
					  	switch($lg){
							case "vn":
								echo " $rs[ten_vn]<br>";
								break;
							case "eg";
								echo " $rs[ten_eg]<br>";
								break;
							case "kr";
								echo " $rs[ten_kr]<br>";
								break;
							default;
								break;
						}
 					    //echo " $rs[gia]<br>";
						//echo " $rs[ngay_gd]<br>";
						//echo " $rs[gio_gd]<br>";
						//echo " $rs[tai]<br>";
                        echo"<b>Short Content :</b><br>";
						switch($lg){
							case "vn":
								echo chuan_hoa_chuoi("$rs[ghi_chu_vn]");
								echo "<br><br>";
								break;
							case "eg";
								echo chuan_hoa_chuoi("$rs[ghi_chu_eg]");
								echo "<br><br>";
								break;
							case "kr";
								echo chuan_hoa_chuoi("$rs[ghi_chu_kr]");
								echo "<br><br>";
								break;
							default;
								echo chuan_hoa_chuoi("$rs[ghi_chu_eg]");
								echo "<br><br>";
								break;
						}

						echo"<b>[ <a href=javascript:view_content('$id','$lg')>View Content</a> ] [ $nguoi_viet ] [ $rs[ngay], $rs[gio] ]</b><br><br>";
						?>
                    </td>
                  <td align="right" valign="top" bgcolor="#F7F3F7" class="S9"><? 
                  if($rs["anh_nho"]!="") 
				  echo"S Images $rs[anh_nho] <br> <img src=\"../images/photo/$rs[anh_nho]\" width=\"50\" height=\"50\">";
                  if($rs["anh"]!="") 
				    {
					if($rs["type"]==1)
					echo"<br>Flash <a href=\"../images/photo/$rs[anh]\" target=_blank>$rs[anh]</a>";
				    else
					echo"<br>Images $rs[anh]<br> <a href=\"../images/photo/$rs[anh]\" target=_blank><img src=\"../images/photo/$rs[anh]\" width=\"50\" height=\"50\" border=0></a>";
					}
				  ?></td>
                <td valign="middle" bgcolor="#EFEFEF"><span class="S9">Acti_
                    <? if($rs["activate_"]==1) echo"<img src=\"images/activate2.gif\">"; else echo"<img src=\"images/deactivate2.gif\">";?>
                    <br>
                    <br>
Acti
<? if($rs["activate"]==1) echo"<img src=\"images/activate2.gif\">"; else echo"<img src=\"images/deactivate2.gif\">";?>
<br>
<br>
Index
<? if($rs["ngoai_index"]==1) echo"<img src=\"images/activate2.gif\">"; else echo"<img src=\"images/deactivate2.gif\">";?>
 </span></td>
                </tr>
                <? } ?>
                <tr align="center" bgcolor="#EFEFEF"> 
                  <td height="31" colspan="3" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <tr>
	  <td width="281" rowspan="2" valign="middle" align="center" class="text"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$ma_bac_1,$SearchText);?></td>
	  <td width="141" height="30" align="center" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
	  <td width="193" rowspan="2" align="left" valign="middle"><A href="javascript:activate_do()"><img src="images/activate_do.gif" width="60" height="21" border="0"></A> <A href="javascript:deactivate_do()"><img src="images/deactivate_do.gif" width="60" height="21" border="0"></A> <A href="javascript:delete_do()"><img src="images/delete.gif" width="60" height="21" border="0"></A></td>
    </tr>
    <tr>
      <td height="1"></td>
      </tr>
                  </table></td>
                </tr>
				<input type=hidden value="<? echo "$rs[id]"?>" name="chkids">
				<input type=hidden value="<?=$ma_bac_1?>" name="ma_bac_1">
				<input type=hidden value="<?=$SearchText?>" name="SearchText">
				<input type=hidden value="<?=$start?>" name="start">
        </form><? } else echo"<tr bgcolor=#DEDFDE><td class=tab_left_10>Sorry, Items not found !</td></tr>";?>
                <tr align="right" bgcolor="#DEDFDE"> 
                  <TD height=27 colspan="3" valign="middle" class="S"> <? if($num>0) echo"View $i of $num ";?></TD>
                </tr>
                  </table></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
