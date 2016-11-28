<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
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
        document.form.action="admin_delete_wait.php?ma_del=partner&id=0";
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
				alen=(alen>7)?document.form.chkBuyOfferIds.length:0;
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
				alen=(alen>7)?document.form.chkBuyOfferIds.length:0;
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
	function view(id)
			{
				var arg= "width=502,height=640,resizable=no,scrollbars=no,status=0,top=0,left=0";			
				window.open ("inc/popup_images.php?id="+ id ,"a",arg);	
				
			}
</SCRIPT>
  <tr>
    <td width="153" height="252" valign="top" bgcolor="#f7f7ff" class="mau_lot"><? include("inc/menu.php")?></td>
    <td width="617" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
                <!--DWLayoutTable-->
				<tr align="left" bgcolor="#DEDFDE"> 
                  <td height="45" colspan="2" valign="middle" class="tab_left_10"><?
					$cat=1;
					$table="tb_company";
					$query = "Select * FROM  $table";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num = mysql_num_rows($result);
					$start = 0; 
					$PHP_SELF="admin_view_business_partner.php";
					$page_count =10; 
					$cut_off = 10; 
					$start=$HTTP_GET_VARS["start"];
					if ($start<=0) $start = 0;
					else $start=$HTTP_GET_VARS["start"];
					include("inc/phantrang.php");
					$table="tb_company";
					$query = "Select * FROM  $table  ORDER BY id DESC LIMIT $start, $page_count";
					$result = mysql_query($query);
				    $i=0;
					?>
                    <span class="giatien"> 
                    <? $tem=0;?>
                    </span><span class="text">Total:&nbsp;<b> 
                    <? echo( "$num" ) ?>
                  </b> </span></td>
					 <? if( $num>0) {?>
		     <FORM style="MARGIN: 0px" name="form" action="feedback.php" method=post onSubmit="return checkInput();">
					 <INPUT type=hidden value='20"' name=basketItemMax> 
					 <INPUT type=hidden value='0"' name=basketItemNum>
				 
				   <tr align="center" bgcolor="#EFEFEF">
				     <td height="29" colspan="2" align="right"  valign="middle"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
      <tr>
        <td width="409" height="29" align="center" valign="middle"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
	    <td width="141" align="center" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
	    <td width="65" align="left" valign="middle"><A href="javascript:delete_do()"><img src="images/delete.gif" border="0"></A></td>
      </tr>
                     </table></td>
                </tr>
                 <? 
				 while ($rs= mysql_fetch_array($result)) { 
				  $id=$rs["id"];
				  $i++;
				  ?>
                <tr align="center"> 
                  <td width="435" height="23" align="left" valign="middle" bgcolor="#EFEFEF" class="tab_left_10">
				  <? 
				  echo "<b>$rs[Company]</b> [ $rs[ngay] ] ";
						?></td>
                  <td width="170" align="left" valign="middle" bgcolor="#EFEFEF" class="S9">
				  <input name="chkBuyOfferIds" type=checkbox id="chkBuyOfferIds" value="<? echo"$rs[id]"?>"> 
				  Select
                  <input name="chkBuyOfferIds" type="hidden" id="chkBuyOfferIds" value="-1" checked>
				  <input name="chkBuyOfferIds" type="hidden" id="chkBuyOfferIds" value="-1" checked></td>
                </tr>
                <tr align="center" valign="top" >
                  <td height="98" colspan="2" align="left" bgcolor="#F7F3F7" class="tab_10_lh_15"><? 
				 $country=gia_tri_mot_cot("tb_country","code_country",$rs["NoiThanhLap"],"name_country");
				 $industry=gia_tri_mot_cot("tb_bac_2","ma_bac_2",$rs["ma_bac_2"],"ten_dv_tp");
				 $job_title=gia_tri_mot_cot("tb_ma_loai_dv","ma_loai_dv",$rs["industry"],"ten_loai_dv");
 				  echo"----------------------------------------------------------------";
				  echo "<br>Name:  $rs[FirstName] $rs[LastName]  ";
				  echo"<br>----------------------------------------------------------------";
				  echo "<br>Email:  $rs[Email] ";
				  echo"<br>----------------------------------------------------------------";
				  echo "<br>Phone:  $rs[PhoneCountry], $rs[PhoneArea], $rs[PhoneNumber]";
				  echo "<br>Fax:  $rs[FaxCountry], $rs[FaxArea], $rs[FaxNumber]";
				  echo "<br>Address:  $rs[Address], $rs[City], $rs[State]";
				  echo"<br>----------------------------------------------------------------";
				  echo "<br>Zip/Postal Code:  $rs[Zip] ";
				  echo"<br>----------------------------------------------------------------";
				  echo "<br><b>Job Tiltle:</b>  $job_title"; 
				  echo "<br><b>Industry:</b>  $industry"; 
				  echo "<br><b>Country:</b>  $country"; 
				  echo"<br>----------------------------------------------------------------";
				  echo "<br>Detail:  $rs[NoiDung] "; 
  				  echo"<br>----------------------------------------------------------------";
				 ?></td>
                </tr>
                <? }?>
                <tr align="center" bgcolor="#EFEFEF"> 
                  <td height="30" colspan="2" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
      <tr>
	    <td width="410" height="30" align="center" valign="middle"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
	    <td width="141" align="center" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
	    <td width="64" align="left" valign="middle"><A href="javascript:delete_do()"><img src="images/delete.gif" border="0"></A></td>
      </tr>
                                    </table></td>
                </tr>
                <tr align="center" bgcolor="#EFEFEF">
                  <TD height=20 colspan="2" valign="middle" class="S"> <? echo"View $i of $num ";?></TD>
                </tr>
				<input type=hidden value="<? echo "$rs[id]"?>" name="chkids">
				<input type=hidden value="<?=$cat?>" name="ma_bac_1">
				<input type=hidden value="<?=$start?>" name="start">
        </form><? }?>
                  </table>
    <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
