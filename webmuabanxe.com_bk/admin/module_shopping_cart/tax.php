<? 
include("../inc/banner.php")
?>
<? if($suid==1){?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function hoi(page){

	if (window.confirm('Are you sure you want to delete the item(s)?')){
		document.messageList.action=page;
		document.messageList.submit();
	 	return true;
	 } 
	 return false;		
}

function check_tax(param)
{  
	if (param.tax_name.value==""){
		alert("Please check agian tax name!");
		param.tax_name.focus();
		return false;
	}
	if (param.tax_value.value==""){
		alert("Please check agian tax value!");
		param.tax_value.focus();
		return false;
	}
	
	return true;
}  

function check_tax_edit(param)
{  
	if (param.tax_name.value==""){
		alert("Please check agian shipping name!");
		param.tax_name.focus();
		return false;
	}
	if (param.discount_value.value==""){
		alert("Please check agian shipping value!");
		param.tax_value.focus();
		return false;
	}
	return true;
}  

</script>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> &gt; Tax </td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10">
                <? 
		require("../inc/inc_javascript.php");
		
		$table="tb_shopping_cart_tax order by id ASC ";
		$query = "Select * FROM  $table ";
		$result = mysql_query($query);
		
		
		$form_action = $_SERVER['PHP_SELF'];
		if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
		 {
			
			$tax_name=$_POST["tax_name"];
			$tax_value=$_POST["tax_value"];
			
			$tax_code=max_id("tb_shopping_cart_tax","tax_code")+1;
			
			$table_="tb_shopping_cart_tax";
			$query_ = "INSERT INTO $table_(tax_code,tax_name,tax_value)";
			$query_ .= " VALUES('$tax_code','$tax_name','$tax_value')";
			if($result_ = mysql_query($query_))
			$tip="Add completed !";
				
			echo"<meta http-equiv=\"refresh\" content=\"0;url=tax.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		if ( (isset($_POST["messageList"])) && ($_POST["messageList"] == "messageList"))
		 {
			$id=$HTTP_POST_VARS["chon"];
			$id =str_replace (",", "','", $id);
			$query__ = "DELETE  FROM tb_shopping_cart_tax WHERE id in ('$id')";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=tax.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		
		if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
		   {
			
			$id=$_POST["id"];
			$tax_name=$_POST["tax_name"];
			$tax_value=$_POST["tax_value"];
			
			$query_edit = "UPDATE tb_shopping_cart_tax SET tax_name='$tax_name',tax_value='$tax_value'";
			$query_edit .= "WHERE id=$id";
			$result_edit = mysql_query($query_edit);
			if($result_edit = mysql_query($query_edit))
			  $tip="Update completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=tax.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		  }
		
		?>		  
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
              <tr>
                <td valign="top"><br>
				<?
				//$qr = getenv('QUERY_STRING');
				$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM tb_shopping_cart_tax WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" class="bg_1">
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color_edit" onSubmit=" return check_tax_edit(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold"><span style="font-weight: bold">Update Tax </span></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">Tax  Name: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="tax_name" type="text" value="<?=$rs_edit["tax_name"]?>" style="width:300px">                   </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><span class="text">Tax  Name: </span></td>
                    <td valign="top" class="bg_2"><input name="tax_value" type="text" id="tax_value" value="<?=$rs_edit["tax_value"]?>" size="25"></td>
                  </tr>
                  <tr>
                    <td height="21" valign="top" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="bg_2">
                    <input type="submit" name="Update" value="Update" ></td>
                  </tr>
				  <input type="hidden" name="id" value="<?=$rs_edit["id"]?>">
				  <input type="hidden" name="form_color_edit" value="form_color_edit">
				  </form>
                </table>
				<? 
				} 
				else
				{
				?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" class="bg_1" >
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color" onSubmit=" return check_tax(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold"><span style="font-weight: bold">New Tax </span></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">Tax Name: </td>
                    <td width="70%" align="left" valign="middle" class="bg_2"><input name="tax_name" type="text" id="tax_name" style="width:300px"></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="bg_2">Tax value: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="tax_value" type="text" id="tax_value" size="25">
                    $                   </td>
                  </tr>
                  <tr>
                    <td height="21" valign="top" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="bg_2">
                    <input type="submit" name="Add" value="  Add  " >                    </td>
                  </tr>
				  <input type="hidden" name="form_color" value="form_color">
				  </form>
                </table>
				<? } ?>
				</td>
              </tr>
              <tr>
                <td height="8"></td>
              </tr>

 <!-- ........................................................ -->			  
              <tr>
                <td height="88" valign="top">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
		      <!--DWLayoutTable-->
              <tr>
                <td height="52" valign="top">
			    
			    	<form name="messageList" method="post" action="<?=$form_action?>" onSubmit=" return dem_chon();">		  
					<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
						<thead>
						<tr>
						<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
						<th width=40% id="senderheader"> Tax name  </th>
						<th id="subjectheader" width=40%>Tax value </th>
						<th id="subjectheader" width=17%>Edit</th>
						</tr>
						</thead>
						<tbody>
						 <?
						 $i=0;
						 while ($rs= mysql_fetch_array($result)) // LAY DU LIEU RA
						 { 
						 $i++;
						 ?>
					
						<tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#F1F1F1';>
						<td align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$rs["id"]?>"></td>
						<td><? echo"$rs[tax_name]";?></td>
						<td><? echo"$rs[tax_value]";?></td>
						<td><a href="tax.php?id=<?=$rs["id"]?>&do=edit"><img src="../images/edit.gif" width="12" height="12" border="0"></a></td>
						</tr>
						<? } ?>
						</tbody>
					</table>
				<? include("../inc/inc_select.php"); ?> 
				<input name="Submit" type="submit" class="nut_nhan" onclick="return hoi('tax.php');" value="Delete">
               <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="messageList" value="messageList">
			   </form>
			   
				</td>
              </tr>
   		          </table></td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>


</table>
 <?  

 ?>	</td>
              </tr>
              <tr class="M">
                <td height="15" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
                        </table></td>
  </tr>
</table>
<? 
} 
else
echo"Bạn không dược quyền Admin ! Xin vui lòng hỏi admin.";
?>
<? include("../inc/bottom.php")?>
