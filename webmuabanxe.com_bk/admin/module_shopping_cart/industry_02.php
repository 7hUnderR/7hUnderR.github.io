<? 
include("../inc/banner.php")
?>
<? if($suid==1){?>
<script language="javascript">
function hoi(page){

	if (window.confirm('Are you sure you want to delete the item(s)?')){
		document.messageList.action=page;
		document.messageList.submit();
	 	return true;
	 } 
	 return false;		
}

function check_descount(param)
{  
	if (param.industry_name.value==""){
		alert("Please check agian industry name!");
		param.industry_name.focus();
		return false;
	}
	
	return true;
}  

function check_descount_edit(param)
{  
	if (param.industry_name.value==""){
		alert("Please check agian industry name!");
		param.industry_name.focus();
		return false;
	}
	return true;
}  

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr>
                <td height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> &gt; <?=$menu_industry_02?></td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10">
                <? 
		require("../inc/inc_javascript.php");
		
		$table="tb_shopping_cart_industry_s order by thu_tu ASC ";
		$query = "Select * FROM  $table ";
		$result = mysql_query($query);
		
		
		$form_action = $_SERVER['PHP_SELF'];
		if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
		 {
			$industry_name=rep($_POST["industry_name"]);
			$industry_code=max_id("tb_shopping_cart_industry_s","industry_code")+1;
			
			$table_="tb_shopping_cart_industry_s";
			$query_ = "INSERT INTO $table_(industry_code,industry_name)";
			$query_ .= " VALUES('$industry_code','$industry_name')";
			$result_ = mysql_query($query_);
			$tip="Add completed !";
			
			echo"<meta http-equiv=\"refresh\" content=\"0;url=industry_02.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script/>";
		}
		
		if ( (isset($_POST["messageList"])) && ($_POST["messageList"] == "messageList"))
		 {
		    $tip="Delete completed !";
			$id=$HTTP_POST_VARS["chon"];
			$id = substr($id,0,strlen($id)-1);
			$query__ = "DELETE  FROM tb_shopping_cart_industry_s WHERE id in (".$id.")";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=industry_02.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		
		if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
		   {
			
			$id=$_POST["id"];
			$industry_name=rep($_POST["industry_name"]);
				$query_edit = "UPDATE tb_shopping_cart_industry_s SET industry_name='$industry_name'";
				$query_edit .= "WHERE id=$id";
				$result_edit = mysql_query($query_edit);
				$result_edit = mysql_query($query_edit);
				$tip="Update completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=industry_02.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		  }
		
		?>		
		
		
 <? ?><form name="messageList" method="post" action="<?=$form_action?>" onSubmit=" return dem_chon();">		  
<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
	<thead>
	<tr>
	<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	<th width=50% id="senderheader"><?=$menu_industry_02?> name  </th>
	<th id="subjectheader" width=20%>Sort</th>
	<th id="subjectheader" width=15%><?=$menu_industry_02?> code </th>
	<th id="subjectheader" width=15%>Edit</th>
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
	<td><? echo"$rs[industry_name]";?></td>
	<td><input type="hidden" name="id_<?=$i?>" value="<?=$rs["id"]?>">
              <input name="thu_tu_<?=$i?>" type="text"  class="input" size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();"></td>
	<td><? echo"$rs[industry_code]";?></td>
	<td><a href="industry_02.php?id=<?=$rs["id"]?>&amp;do=edit"><img src="../images/edit.gif" width="12" height="12" border="0" /></a></td>
	</tr>
	<? } ?>
	</tbody>
</table>
				<? include("../inc/inc_select.php"); ?> 
				<input type="hidden" name="num" value="<?=$i?>" />
				<input type="button" name="Submit32" value="Up date" onClick="update_industry('activate.php','?ma_activate=update_industry_s&key=sort')" class="nut_nhan">
				<input name="Submit" type="submit" class="nut_nhan" onclick="return hoi('industry_02.php');" value="Delete">
               <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="messageList" value="messageList">
			   </form>
			  <? ?><table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
              <tr>
                <td valign="top"><br>
				<?
				//$qr = getenv('QUERY_STRING');
				$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM tb_shopping_cart_industry_s WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" class="bg_1">
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color_edit" onsubmit="return check_descount_edit(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold">Update <?=$menu_industry_02?></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2"><?=$menu_industry_02?>  Name: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="industry_name" type="text" value="<?=$rs_edit["industry_name"]?>" style="width:300px">                   </td>
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
               <form action="<?=$form_action?>" method="post" name="form_color" onsubmit="return check_descount(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold">New <?=$menu_industry_02?></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2"><?=$menu_industry_02?> Name: </td>
                    <td width="70%" align="left" valign="middle" class="bg_2"><input name="industry_name" type="text" id="industry_name" style="width:300px"></td>
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
                <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>


</table>
              <p>
                <?  

 ?>	
              </p>
              <p>&nbsp;</p></td>
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
