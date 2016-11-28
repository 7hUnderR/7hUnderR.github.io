<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <script language="JavaScript" type="text/JavaScript">
<!--
	function view_in(id){
		var arg= "width=700,height=500,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
		window.open ("inc/view_in.php?id="+ id,"a",arg);	
				
	}
	function view_profile(id)
	{
		var arg= "width=400,height=300,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
		window.open ("inc/view_profile.php?ma_user="+ id,"a",arg);	
	}
//-->
</script>
<SCRIPT language=JavaScript>

function getCheckedNum()
{
    var num = 0;                
    for(var i=0;i<document.frmList.elements.length;i++)
    {  
        var e = document.frmList.elements[i];
        if (e.name == 'chkid') {
            if(e.checked)
                num++;
        }
    }
    return num;
}

function mot_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=mot";
        document.frmList.target="";
        document.frmList.submit();
    }
}
function hai_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=hai";
        document.frmList.target="";
        document.frmList.submit();
    }
}
function ba_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=ba";
        document.frmList.target="";
        document.frmList.submit();
    }
}

function bon_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=bon";
        document.frmList.target="";
        document.frmList.submit();
    }
}

function nam_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=nam";
        document.frmList.target="";
        document.frmList.submit();
    }
}

function sau_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=sau";
        document.frmList.target="";
        document.frmList.submit();
    }
}

function bay_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="activate.php?ma_activate=bay";
        document.frmList.target="";
        document.frmList.submit();
    }
}

function tam_do()
{
    var checkedNum = getCheckedNum();
    var basketItemNum = parseInt(document.frmList.chkid.value);
    var urlString = document.location+""; 
    
    if(checkedNum == 0) {
			alert("Please select items !");
    }

    if(checkedNum > 0) {

         checkInput();
        document.frmList.action="delete_wait.php?ma_del=tam";
        document.frmList.target="";
        document.frmList.submit();
    }
}


function docheckone()
		   {
		   		var alen=document.frmList.elements.length;
				var isChecked=true;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.frmList.chkid[i].checked==false)
							isChecked=false;
				}else
				{
					if(document.frmList.chkid.checked==false)
						isChecked=false;
				}				
				document.frmList.chkall.checked=isChecked;
		   }
function docheck(status,from_)
		   {
		   		var alen=document.frmList.elements.length;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						document.frmList.chkid[i].checked=status;
				}else
				{
						document.frmList.chkid.checked=status;
				}
				if(from_>0)
					document.frmList.chkall.checked=status;
		   }
 function checkInput()
		   {
				var alen=document.frmList.elements.length;
				var isChecked=false;
				var isNum=true;
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
					{
						if(document.frmList.chkid[i].checked==true)
						{
							isChecked=true;							
							break;
						}
					}
					if (!isChecked)											
						alert("Please select at least one of them");
					
				}else
				{
					if(document.frmList.chkid.checked==true)
						isChecked=true;
					if (!isChecked)											
						alert("Please select at least one of them");
				}
				
				if (isChecked)											
					calculatechon();
				
												
			return isChecked;
		  } 
function calculatechon()
			{			
				var strchon="";
				var alen=document.frmList.elements.length;				
				alen=(alen>5)?document.frmList.chkid.length:0;
				if (alen>0)
				{
			   		for(var i=0;i<alen;i++)
						if(document.frmList.chkid[i].checked==true)
							strchon+=document.frmList.chkid[i].value+",";
				}else
				{
					if(document.frmList.chkid.checked==true)
						strchon=document.frmList.chkid[i].value;
				}
				document.frmList.chkids.value=strchon;	
				
	}	


</SCRIPT>
  <tr>
    <td width="15%" height="304" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="b2">
              <tr>
                <td width="617" height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> »</td>
             </tr>
              <tr>
                <td height="274" valign="top" class="tab_left_10"> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="1">
                <tr align="left" > 
                  <td height="29" colspan="7" valign="middle"><? 
					$cat="0";
					if(isset($HTTP_GET_VARS["cat"])){
						$cat = $HTTP_GET_VARS["cat"];
					}
					$start=0;
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}
					
					$table="tb_shopping_cart_order";
					$query = "Select * FROM  $table ";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num_ = mysql_num_rows($result);
					?> 
					 <select name="trang_thai" onChange="MM_jumpMenu('parent',this,0)" size="1" id="select" style="FONT: 11px verdana,arial,helvetica;">
					   <option value="order_view.php?cat=0&start=0" selected>- New Order [<?=dem_max_dk("tb_shopping_cart_order","order_status",0);?>] -</option>
                       <option value="order_view.php?cat=1&start=0" <? if($cat==1) echo"selected";?> >- In Progress [<?=dem_max_dk("tb_shopping_cart_order","order_status",1);?>] -</option>
					    <option value="order_view.php?cat=2&start=0" <? if($cat==2) echo"selected";?> >- Ready To Ship [<?=dem_max_dk("tb_shopping_cart_order","order_status",2);?>] -</option>
						<option value="order_view.php?cat=3&start=0" <? if($cat==3) echo"selected";?> >- Shipped [<?=dem_max_dk("tb_shopping_cart_order","order_status",3);?>] -</option>
						<option value="order_view.php?cat=4&start=0" <? if($cat==4) echo"selected";?> >- Completed [<?=dem_max_dk("tb_shopping_cart_order","order_status",4);?>] -</option>
						<option value="order_view.php?cat=5&start=0" <? if($cat==5) echo"selected";?> >- Canceled [<?=dem_max_dk("tb_shopping_cart_order","order_status",5);?>] -</option>
						<option value="order_view.php?cat=6&start=0" <? if($cat==6) echo"selected";?> >- Denied [<?=dem_max_dk("tb_shopping_cart_order","order_status",6);?>] -</option>
						
						<option value="order_view.php?cat=100&start=0" <? if($cat==100) echo"selected";?> >- View All [<?=$num_?>] -</option>
                     </select>
				  <?
					$table="tb_shopping_cart_order";
					if($cat==100)
					$query = "Select * FROM  $table ";
					else
					$query = "Select * FROM  $table where order_status=$cat ";
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num = mysql_num_rows($result);
					$PHP_SELF="order_view.php";
					$page_count =20; 
					$cut_off = 10; 
					
					include("../inc/phantrang.php");
					if($cat==100)
					$query = "Select * FROM  $table ORDER BY order_status,id DESC LIMIT $start, $page_count ";
					else
					$query = "Select * FROM  $table  where order_status=$cat ORDER BY order_status,id DESC LIMIT $start, $page_count ";
					$result = mysql_query($query);
				    $i=0;
					$tem=0;
					?>                  </td>
                </tr>
					 <? if( $num>0) {?>
		    <FORM style="MARGIN: 0px" name="frmList" action="#" method=post>
			<input name="chkid" value="0" type="hidden">
				 <tr align="center" > 
                  <td height="31" colspan="7" align="right"  valign="middle">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					  <!--DWLayoutTable-->
					<tr>
					  <td height="31" align="right" valign="middle">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:mot_do()" value="New Order">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:hai_do()" value="In Progress">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 90px;" onClick="javascript:ba_do()" value="Ready To Ship">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:bon_do()" value="Shipped">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:nam_do()" value="Completed">
					    <input name="Submit" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:sau_do()" value="Canceled">
					    <input name="Submit2" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:bay_do()" value="Denied">
					    <input name="Submit22" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:tam_do()" value="Delete"></td>
					</tr>
					<tr>
					  <td height="30" align="center" valign="middle"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
					  </tr>
                  </table></td>
                </tr>
				 <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="25" height="20" align="center" valign="middle" class="bg3">No.</td>
                  <td width="57" align="left" valign="middle" class="bg3"> Code</td>
                  <td width="325" align="left" valign="middle" class="bg3">Products</td>
                  <td width="109" align="left" valign="middle" class="bg3">Totals</td>
                  <td width="135" align="left" valign="middle" class="bg3">Custumers</td>
                  <td width="80" align="left" valign="middle" class="bg3"><input type="checkbox" name="chkall" value="0" onClick="docheck(document.frmList.chkall.checked,0);" align="absmiddle">
Select all </td>
                  <td width="121" align="center" valign="middle" class="bg3">Discount</td>
                </tr>
                 <? 
				 while ($rs= mysql_fetch_array($result)) 
				 { 
				  $id=$rs["id"];
				  $ma_order=$rs["ma_order"];
				  $ma_user=$rs["ma_user"];
				  $code_discount=gia_tri_mot_cot('tb_shopping_cart_account','ma_user',$ma_user,'code_discount');
				  $email=gia_tri_mot_cot('tb_shopping_cart_account','ma_user',$ma_user,'email');
				  $full_name=gia_tri_mot_cot('tb_shopping_cart_account','ma_user',$ma_user,'ten');
				  $sum_price=$rs["sum_price"];
				  
				  //$id=gia_tri_mot_cot('tb_shopping_cart_order_product','ma_order',$ma_order,'product_id');
 				  $name_product="";
				  $query_ = "Select * FROM  tb_shopping_cart_order_product where ma_order=$ma_order ";
				  $result_ = mysql_query($query_);
				  while($rs_= mysql_fetch_array($result_))
					  {
					   $id_product=$rs_["product_id"];
					   $name_product.=gia_tri_mot_cot('tb_product','id',$id_product,'ten_vn').", ";
					  }
				  
				  //$anh=gia_tri_mot_cot('tb_product','ma_order',$ma_order,'anh_nho');
				  //$anh_lon=gia_tri_mot_cot('tb_product','ma_order',$ma_order,'anh');
				  
				  //$ten_anh="<a href=\"../../images/photo/$anh_lon\" target=_blank><img src=\"../../images/photo/$anh\" width=\"50\" height=\"50\" border=0></a>";
				  if($rs["order_status"]==0)
				     $trang_thai="<span class=do>Đơn đặt hàng mới</span>";	
				  if($rs["order_status"]==1)
				     $trang_thai="<span class=xanh_lot>Đang giao dịch</span>";	
				  if($rs["order_status"]==2)
				     $trang_thai="<span class=xanh>Giao dịch thành công</span>";	
				  if($rs["order_status"]==3)
				     $trang_thai="<span class=vang>Giao dịch không thành công</span>";	
				  if($rs["order_status"]==4)
				     $trang_thai="<span class=tim>Đã hũy</span>";	

				  $i++;
				  ?>
                <tr bgcolor='ffffff' onmouseover=this.style.backgroundColor='#F1F1F1'; onMouseOut=this.style.backgroundColor='#ffffff';> 
                  <td width="25" height="23" align="center" valign="middle" class="line_bottom"><?=$i+$start;?></td>
                  <td width="57" align="left" valign="middle" class="line_bottom"><?=$ma_order?></td>
                  <td width="325" align="left" valign="middle" class="line_bottom"><? echo "<a href=order_view_detail.php?cat=$cat&id=$id&start=$start>$name_product</a>"; ?></td>
                  <td width="109" align="left" valign="middle" class="line_bottom"><?=$sum_price?></td>
                  <td width="135" align="left" valign="middle" class="line_bottom"><? echo"<a href=javascript:view_profile('$ma_user') title=$email>$full_name</a> <br><span class=lot>$rs[ngay]</span>";?></td>
                  <td width="80" align="left" valign="middle" class="line_bottom"><input type=checkbox name="chkid" value="<?=$id?>" onClick="docheckone();" align="absmiddle"> 
				  Select</td>
                  <td width="121" align="center" valign="middle" class="line_bottom"><?
                       $discount=gia_tri_mot_cot('tb_shopping_cart_discount','discount_code',$code_discount,"discount_name");
					   $discount_value=gia_tri_mot_cot('tb_shopping_cart_discount','discount_code',$code_discount,"discount_value");
					   
					   echo "$discount = ";
					   echo $discount_value*100; echo "%";
						?>                  </td>
                </tr>
                <? }?>
                <tr align="center" > 
                  <td height="31" colspan="7" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
					  <!--DWLayoutTable-->
					<tr>
					  <td height="30" align="center" valign="middle"><? pagination($page_count,$num,$start,$PHP_SELF,$cut_off,$cat);?></td>
					  </tr>
					<tr>
					  <td height="33" align="right" valign="middle"><input name="Submit3" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:mot_do()" value="New Order">
                        <input name="Submit3" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:hai_do()" value="In Progress">
                        <input name="Submit3" type="submit" class="nut_nhan" style="width: 90px;" onClick="javascript:ba_do()" value="Ready To Ship">
                        <input name="Submit3" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:bon_do()" value="Shipped">
                        <input name="Submit3" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:nam_do()" value="Completed">
                        <input name="Submit3" type="submit" class="nut_nhan" style="width: 80px;" onClick="javascript:sau_do()" value="Canceled">
                        <input name="Submit23" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:bay_do()" value="Denied">
                        <input name="Submit222" type="submit" class="nut_nhan" style="width: 70px;" onClick="javascript:tam_do()" value="Delete"></td>
					</tr>
                  </table></td>
                </tr>
				<input type=hidden value="" name="chkids">
				<input type=hidden value="<?=$cat?>" name="cat">
				<input type=hidden value="<?=$start?>" name="start">
				<input type=hidden value="<?=$i?>" name="num">
        </form><? }?>
                <tr align="center" > 
                  <TD height=27 colspan="7" valign="middle" class="text"> <? echo"View $i of $num ";?></TD>
                </tr>
                </table>                  
                  <? ?></td>
              </tr>
                          </table></td>
  </tr>
</table>
<? include("../inc/bottom.php")?>
