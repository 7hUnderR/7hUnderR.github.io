<? 
include("../inc/banner.php")
?>
<? if($suid==1){?>
<script language="javascript">
function hoi(page){

	if (window.confirm('Are you sure you want to delete the item(s)?')){
		document.frmList.action="page";
		document.frmList.submit();
	 	return true;
	 } 
	 return false;		
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
                <td height="25" valign="middle" class="bg_title"><a href="../index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> Home</a> &gt; percent </td>
             </tr>
              <tr>
                <td height="227" valign="top" class="tab_left_10">
                <? 
		require("../inc/inc_javascript.php");
		
		$table="tb_shopping_cart_percent order by percent_value ASC ";
		$query = "Select * FROM  $table ";
		$result = mysql_query($query);
		
		
		$form_action = $_SERVER['PHP_SELF'];
		if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
		 {
			
			$percent_name=$_POST["percent_name"];
			$percent_value=$_POST["percent_value"];
			
			$percent_code=max_id("tb_shopping_cart_percent","percent_code")+1;
			
			$table_="tb_shopping_cart_percent";
			$query_ = "INSERT INTO $table_(percent_code,percent_name,percent_value)";
			$query_ .= " VALUES('$percent_code','$percent_name','$percent_value')";
			if($result_ = mysql_query($query_))
			$tip="Add completed !";
				
			echo"<meta http-equiv=\"refresh\" content=\"0;url=percent.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		if ( (isset($_POST["form_color_del"])) && ($_POST["form_color_del"] == "form_color_del"))
		 {
			$id=$HTTP_POST_VARS["chon"];
			$id = substr($id,0,strlen($id)-1);
			$query__ = "DELETE  FROM tb_shopping_cart_percent WHERE percent_code in (".$id.")";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=percent.php\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		}
		
		
		if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
		   {
			
			$id=$_POST["id"];
			$percent_name=$_POST["percent_name"];
			$percent_value=$_POST["percent_value"];
			
			$query_edit = "UPDATE tb_shopping_cart_percent SET percent_name='$percent_name',percent_value='$percent_value'";
			$query_edit .= "WHERE id=$id";
			$result_edit = mysql_query($query_edit);
			if($result_edit = mysql_query($query_edit))
			  $tip="Update completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=percent.php\">";
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
				$qr = getenv('QUERY_STRING');
				//$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM tb_shopping_cart_percent WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" class="bg_1">
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color_edit" >
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold"><span style="font-weight: bold">Update percent </span></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">percent  Name: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="percent_name" type="text" value="<?=$rs_edit["percent_name"]?>" style="width:300px">                   </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2"><span class="text">percent  Name: </span></td>
                    <td valign="top" class="bg_2"><input name="percent_value" type="text" id="percent_value" value="<?=$rs_edit["percent_value"]?>" size="25"></td>
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
               <form action="<?=$form_action?>" method="post" name="form_color" >
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold"><span style="font-weight: bold">New percent </span></td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">percent Name: </td>
                    <td width="70%" align="left" valign="middle" class="bg_2"><input name="percent_name" type="text" id="percent_name" style="width:300px"></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="bg_2">percent value: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="percent_value" type="text" id="percent_value" size="25">
                    %                   </td>
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
               <form name="form_color_del" method="post" action="<?=$form_action?>" onSubmit=" return checkInput();">
              <tr>
                <td height="52" valign="top">
			    
			    <table width="100%" border="0" cellpadding=2 cellspacing=1 bgcolor="#FFFFFF" class="bodylink">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="34" height="20" align="center" valign="middle" class="ST" >No.</td>
                        <td width="98" align="center" valign="middle" class="text" >
                          <input type="checkbox" name="chkall" value="checkbox" onClick="docheck();">
                          Select all  </td>
                        <td width="326" align="left" valign="middle" class="ST" ><strong>percent Name </strong></td>
                        <td width="239" align="left" valign="middle" class="ST" >percent Value </td>
                        <td width="83" align="center" valign="middle" class="ST" >Edit</td>
                      </tr>
                         <?
						 $i=0;
					  while ($rs= mysql_fetch_array($result)) // LAY DU LIEU RA
					   { 
					   $i++;
					   ?>
				      <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#F1F1F1';>
                        <td height="24" align="center" valign="middle"><?=$i?></td>
                        <td align="center" valign="middle"><input type="checkbox" name="chkid" value=<?=$rs["percent_code"]?>></td>
                        <td align="left" valign="middle"><span class="Subtitle"><? echo"$rs[percent_name]";?></span></td>
                        <td align="left" valign="middle"><span class="Subtitle"><? echo"$rs[percent_value]";?></span></td>
                        <td align="center" valign="middle"><a href="percent.php?id=<?=$rs["id"]?>&do=edit"><img src="../images/edit.gif" width="12" height="12" border="0"></a></td>
				      </tr>
			          <? } ?>
              </table></td>
              </tr>
              <tr>
                <td height="12"></td>
                </tr>
              <tr>
                <td height="24" align="left" valign="top">
				<input type="submit" name="Submit" value="Delete" onclick="return hoi('<?=$form_action?>');"></td>
                </tr>
               <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="form_color_del" value="form_color_del">
			   </form>
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
