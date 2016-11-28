<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

	function view_profile(id)
	{
		var arg= "width=400,height=300,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
		window.open ("inc/view_profile.php?ma_user="+ id,"a",arg);	
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
        document.form.action="delete_wait.php?ma_del=account_admin&id=0";
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
        document.form.action="activate.php?ma_activate=activate_account";
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
        document.form.action="activate.php?ma_activate=deactivate_account";
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
</SCRIPT>
  <tr>
    <td width="15%" height="322" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> > Members	</td>
             </tr>
              <tr>
                <td height="292" valign="top" class="S10"> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="1">
                <!--DWLayoutTable-->
                <!--DWLayoutTable-->
                <tr align="left" bgcolor="#DEDFDE"> 
                  <td height="29" colspan="7" valign="middle" class="tab_left_10">
				  <? 
					$cat="0";
					if(isset($HTTP_GET_VARS["cat"])){
						$cat = $HTTP_GET_VARS["cat"];
					}
					$start=0;
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}
				  
				  ?>
					 <select name="trang_thai" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" style="FONT: 11px verdana,arial,helvetica;">
					   <option value="member.php?cat=0&start=0" <? if($cat==0) echo"selected";?> >- Sort by Date -</option>
                       <option value="member.php?cat=1&start=0" <? if($cat==1) echo"selected";?> >- Sort by Discount -</option>
						<option value="member.php?cat=3&start=0" <? if($cat==3) echo"selected";?> >- Sort by Full Name -</option>
						<option value="member.php?cat=4&start=0" <? if($cat==4) echo"selected";?> >- Sort by Email -</option>
						<option value="member.php?cat=6&start=0" <? if($cat==6) echo"selected";?> >- Sort by Mark -</option>
                     </select>
				  <? 
					$table="tb_shopping_cart_account";
					$query = "Select * FROM  $table";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num = mysql_num_rows($result);
					$start = 0; 
					$PHP_SELF="member.php";
					$page_count =20; 
					$cut_off = 5; 
					$by= "id" ; 							
					
					switch($cat)
					     {
							case "0":
			 					$by= "id DESC ";
							    break;
							case "1":
			 					$by= "code_discount DESC ";
							    break;
							case "2":
			 					$by= "total_percent DESC ";
							    break;
							case "3":
			 					$by= "ten ASC ";
							    break;
							case "4":
			 					$by= "email ASC ";
							    break;
							case "5":
			 					$by= "user_type ASC ";
							    break;
							case "6":
			 					$by= "diem DESC ";
							    break;
							default:
								$by= "id";
							break;
					  }
					   
					include("../inc/phantrang.php");
					$table="tb_shopping_cart_account";
					$query = "Select * FROM  $table ORDER BY $by LIMIT $start, $page_count ";
					$result = mysql_query($query);
				    $i=0;
					$tem=0;
					echo "Total: $num";
				    ?>                  </td>
                </tr>
					 <? if( $num>0) {?>
		    <FORM style="MARGIN: 0px" name="form" action="edit.php?ma_edit=discount" method=post>
					 <INPUT type=hidden value='20"' name=basketItemMax> 
					 <INPUT type=hidden value='0"' name=basketItemNum>
				 <tr align="center" bgcolor="#EFEFEF"> 
                  <td height="31" colspan="7" align="right"  valign="middle"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <tr>
	  <td width="376" rowspan="2" align="center" valign="middle" class="S9"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
	  <td width="124" height="30" align="left" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
	  <td width="326" rowspan="2" align="left" valign="middle">
	    <input name="Submit" type="submit" class="nut_nhan" style="width:60px;" value="UPDATE">
        <input type="reset" class="nut_nhan" style="width:60px;" value="RESET">
        <input type="submit" class="nut_nhan" name="Submit" value="ON" onClick="javascript:activate_do()" style="width:50px;">
	    <input type="submit" class="nut_nhan" name="Submit" value="OFF" onClick="javascript:deactivate_do()" style="width:50px;">
	    <input type="submit" class="nut_nhan" name="Submit" value="DEL" onClick="javascript:delete_do()" style="width:50px;"></td>
    </tr>
    <tr>
      <td height="1"></td>
      </tr>
                  </table></td>
                </tr>
				                <tr>
				                  <td width="5%" align="center" valign="middle" bgcolor="#EFEFEF" class="bg3"><!--DWLayoutEmptyCell-->&nbsp;</td> 
                  <td width="30%" height="23" align="left" valign="middle" bgcolor="#EFEFEF" class="bg3">Full Name</td>
                  <td width="30%" align="left" valign="middle" bgcolor="#EFEFEF" class="bg3">Email</td>
                  <td width="5%" align="left" valign="middle" bgcolor="#EFEFEF" class="bg3">Edit </td>
                  <td width="10%" align="left" valign="middle" bgcolor="#EFEFEF" class="bg3">Mark</td>
                  <td width="15%" align="left" valign="middle" bgcolor="#EFEFEF" class="bg3">Discount type </td>
                  <td width="5%" align="center" valign="middle" bgcolor="#EFEFEF" class="bg3">Acti</td>
                </tr>
                 <? 
				 while ($rs= mysql_fetch_array($result)) 
				 { 
				  
				  $id=$rs["id"];
				  $ma_user=$rs["ma_user"];
				  $code_introduction=$rs["code_introduction"];
				  $email=$rs["email"];
				  $i++;
				  if($rs["country"]!="")
				     $country=gia_tri_mot_cot("tb_country","code_country",$rs["country"],"name_country");
                  else
				   	 $country="";
				  ?>
				<input name="chkBuyOfferIds" type="hidden" id="chkBuyOfferIds" value="-1" checked>
				<input name="chkBuyOfferIds" type="hidden" id="chkBuyOfferIds" value="-1" checked>
                <tr>
                  <td width="27" align="center" valign="middle" bgcolor="#EFEFEF" class="S9"><input name="chkBuyOfferIds" type=checkbox id="chkBuyOfferIds" value="<? echo"$rs[id]"?>">					</td> 
                  <td height="23" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><? echo"<a href=\"member_edit.php?ma_user=$ma_user\">$rs[ten]</a>"; ?></td>
                  <td align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><?
					echo $rs["email"];
				  ?></td>
                  <td align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><? echo"<a href=\"member_edit.php?ma_user=$ma_user\">Edit</a>";?></td>
                  <td width="103" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><input name="diem_<?=$i?>" type="text" class="input" style="width:60px;" value="<?=$rs["diem"]?>"></td>
                  <td width="165" align="left" valign="middle" bgcolor="#EFEFEF" class="S9"><input type="hidden" name="id_<?=$i?>" value="<?=$id?>">
                    <? 
				$table_="tb_shopping_cart_discount";
				$query_ = "Select * FROM  $table_ order by discount_value ASC";
				$result_ = mysql_query($query_);
				?>
                    <select name="discount_<?=$i?>" size="1" id="select" class="selected">
                      <? while($rs_= mysql_fetch_array($result_))
				{
				$code_discount=$rs_["discount_code"];
				?>
                      <option value="<?=$code_discount?>" <? if($code_discount==$rs["code_discount"]) echo"selected"; ?>> <? echo "$rs_[discount_name] ($rs_[discount_value]) ";?> </option>
                      <? } ?>
                    </select></td>
                  <td width="40" align="center" valign="middle" bgcolor="#EFEFEF">
                  <? if($rs["kichhoat"]==1) echo"<span class=xanh>ON</span>"; else echo"<span class=do>OFF</span>";?>                </td>
                </tr>
                <? }?>
                <tr align="center" bgcolor="#EFEFEF"> 
                  <td height="31" colspan="7" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <tr>
	  <td width="377" rowspan="2" align="center" valign="middle" class="S9"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
	  <td width="124" height="30" align="center" valign="middle" class="S9">[ <A href="javascript:check(true)">Select All</A> | <A href="javascript:check(false)">Clear All</A> ]</td>
	  <td width="315" rowspan="2" align="left" valign="middle"><input name="Submit" type="submit" class="nut_nhan" style="width:60px;" value="UPDATE">
        <input type="reset" class="nut_nhan" style="width:60px;" value="RESET">
        <input type="submit" class="nut_nhan" name="Submit" value="ON" onClick="javascript:activate_do()" style="width:50px;">
        <input type="submit" class="nut_nhan" name="Submit" value="OFF" onClick="javascript:deactivate_do()" style="width:50px;">
        <input type="submit" class="nut_nhan" name="Submit" value="DEL" onClick="javascript:delete_do()" style="width:50px;"></td>
    </tr>
    <tr>
      <td height="1"></td>
      </tr>
                  </table></td>
                </tr>
				<input type=hidden value="" name="chkids">
				<input type=hidden value="<?=$cat?>" name="cat">
				<input type=hidden value="<?=$start?>" name="start">
				<input type=hidden value="<?=$i?>" name="num">
        </form><? }?>
                <tr align="center" bgcolor="#DEDFDE"> 
                  <TD height=27 colspan="7" valign="middle" class="tab_lr_5"> <? echo"View $i of $num ";?></TD>
                </tr>
                </table>                  
                  <? ?></td>
              </tr>
                          </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
