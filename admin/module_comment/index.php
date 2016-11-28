<? 
include("../inc/banner.php")
?>
<? if($suid==1){?>
<script language="javascript">
function hoi(page){
	var checkedNum = getCheckedNum_muc();
	if(checkedNum == 0) 
	{
			alert("Please select item !");
	}
	if(checkedNum > 0) 
	{
		if (window.confirm('Are you sure you want to delete the item(s)?'))
	    {
		dem_chon();
		document.messageList.action=page;
		document.messageList.submit();
	 	return true;
	    } 
	 }
	 return false;		
}

function check_descount(param)
{  
	if (param.name.value==""){
		alert("Please check agian name!");
		param.name.focus();
		return false;
	}
	
	return true;
}  

function check_descount_edit(param)
{  
	if (param.name.value==""){
		alert("Please check agian name!");
		param.name.focus();
		return false;
	}
	return true;
}  

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" height="278" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> <?=gia_tri_mot_cot("tb_setup_menu","id","$menu","menu_ten");?></a> » Comment</td>
             </tr>
              <tr>
                <td height="227" valign="top" class="bg_center">
				<? 
					$cat=1;
					if(isset($HTTP_GET_VARS["cat"]))
					{
						$cat = $HTTP_GET_VARS["cat"];
					}
					$alpha="All";
					if(isset($HTTP_GET_VARS["alpha"])){
						$alpha = $HTTP_GET_VARS["alpha"];
					}
					$start="0";
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}
					$lg ="vn";
					if(isset($HTTP_GET_VARS["lg"])){
						$lg = $HTTP_GET_VARS["lg"];
					}
		
		require("../inc/inc_javascript.php");
		
		$tb="tb_comment";
		$PHP_SELF="index.php";
		
		$form_action = $_SERVER['PHP_SELF'];
		$qr = $_SERVER["QUERY_STRING"];
		if($qr!="")
		  $form_action = $form_action."?".$qr;
		
		if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
		 {
			$note=rep($_POST["note"]);
			$name=rep($_POST["name"]);
			$code=max_cot("$tb","code")+1;
			$industry_thu_tu=max_cot("$tb","thu_tu")+1;
			
			$query_ = "INSERT INTO $tb (code,name_$lg,note_$lg,thu_tu)";
			$query_ .= " VALUES ('$code','$name','$note','$industry_thu_tu')";
			$result_ = mysql_query($query_);

			$tip="Add completed !";
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$PHP_SELF\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script/>";
		}
		
		if ( (isset($_POST["messageList"])) && ($_POST["messageList"] == "messageList"))
		 {
			
			if(strstr($qr,"update_sort"))
			{
				$num=$HTTP_POST_VARS["num"]; 
				for($i=1;$i<=$num; $i++)
					{
						$id=rep($HTTP_POST_VARS["id_$i"]);
						$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
						
						$query = "UPDATE $tb SET thu_tu='$thu_tu'";
						$query .= "WHERE id=$id";
						$result = mysql_query($query);
					}
				echo "<script  language='JavaScript'>";
				echo "alert('$update_completed')";
				echo "</script>";
			}
			else
			{
			$tip="Can not delete!";
			$item =$HTTP_POST_VARS["chon"];
			$item=str_replace (",", "','", $item);

			$query__ = " DELETE  FROM $tb WHERE id in ('$item') ";
			if($result__ = mysql_query($query__))
			  $tip="Delete completed !";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		    } 
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$PHP_SELF\">";
		}
		
		
		if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
		   {
			
			$id=$_POST["id"];
			$note=rep($_POST["note"]);
			$name=rep($_POST["name"]);

				
				$query_edit = "UPDATE $tb SET name_$lg='$name', note_$lg='$note'";
				$query_edit .= "WHERE id=$id";
				$result_edit = mysql_query($query_edit);
				$result_edit = mysql_query($query_edit);
				$tip="Update completed !";
				
			echo"<meta http-equiv=\"refresh\" content=\"0;url=$PHP_SELF?lg=$lg\">";
			echo "<script  language='JavaScript'>";
			echo "alert('$tip')";
			echo "</script>";
		  }
		
		?>		
	 	<form name="messageList" method="post" action="<?=$form_action?>" onSubmit=" return dem_chon();">
		 <? 
		 
		 include("../inc/inc_get_cat.php");
		 include("../inc/inc_lg_only.php"); 
		 include("../inc/inc_sort_only.php");
		
		 if($alpha=="All")
			 $sort="";
		 else
			 $sort=" where note like '".$alpha."%'";

		$table="$tb";
		$query = "Select * FROM  $table ";
		 $HTTP_SESSION_VARS['export_query'] = $query;

		$result = mysql_query($query);
		 $num = mysql_num_rows($result);
		 $page_count =50; 
		 $cut_off = 10; 
		 include("../inc/phantrang.php");
		 $query = "Select * FROM  $table ";
		 $query.=$sort;
		 $query.=" ORDER BY id DESC LIMIT $start, $page_count";
		 $result = mysql_query($query);
		 ?>
		<table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
			<thead>
			<tr>
			<th width=3% nowrap align=center><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
			<th width=25% id="senderheader"> Title </th>
			<th id="subjectheader" width=30%>Comment</th>
			<th id="subjectheader" width=15%>Post</th>
			<th id="subjectheader" width=15%>Member</th>
			<th id="subjectheader" width=15%>Date</th>
			<th id="subjectheader" width=5%>Sort</th>
			<th id="subjectheader" width=3%>Edit</th>
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
			<td>
			  <?=$rs["name_$lg"];?>			</td>
			<td><?=$rs["note_$lg"];?></td>
			<td><? echo gia_tri_mot_cot("tb_member","ma_user",$rs["code_member_post"],"ten");?></td>
			<td><? echo gia_tri_mot_cot("tb_member","ma_user",$rs["code_member"],"ten");?></td>
			<td><?=$rs["date"];?>; <?=$rs["gio"];?></td>
			<td><input type="hidden" name="id_<?=$i?>" value="<?=$rs["id"]?>">
              <input name="thu_tu_<?=$i?>" type="text"  class="input" size="2" value="<?=$rs["thu_tu"]?>" onkeydown="AcceptNumbersOnly();"></td>
			<td><a href="<?=$PHP_SELF?>?id=<?=$rs["id"]?>&do=edit&lg=<?=$lg?>"><img src="../images/edit.gif" width="12" height="12" border="0" /></a></td>
			</tr>
			<? } ?>
			</tbody>
		</table>
			<input type="hidden" name="num" value="<?=$i?>" />
			<table width="100%" border="0" cellpadding="0" cellspacing="0" background="../images/bg_icon.gif">
			  <tr>
				<td width="80%" height="30" align="left" valign="middle" class="tab_lr_5"><? include("../inc/inc_select.php"); ?> <? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?></td>
				<td width="30%" align="right" valign="middle" class="tab_lr_5">
                  <input type="image" src="../images/update.gif" onClick="update_industry('<?=$PHP_SELF?>','?update_sort')" name="Submit3" title="<?=$update_page?>" >
				<img src="../images/delete.gif" onclick="return hoi('<?=$PHP_SELF?>');" style="cursor: pointer" alt="<?=$view_item_buttom_xoa?>"/>
				</td>
			  </tr>
			</table>
			   <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="messageList" value="messageList">
			   </form>
			  <?
				//$qr = getenv('QUERY_STRING');
				$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM $tb WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="bg_1">
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color_edit" ENCTYPE="multipart/form-data" onsubmit="return check_descount_edit(this);">
                  <tr>
                    <td height="20" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td align="left" valign="middle" class="bg_2" style="font-weight: bold">Update </td>
                  </tr>
                  <tr>
                    <td width="30%" align="right" valign="middle" class="bg_2">  Name: </td>
                    <td align="left" valign="middle" class="bg_2">
                    <input name="name" type="text" class="input" id="name" style="width:300px" value="<?=$rs_edit["name_$lg"]?>">                   </td>
                  </tr>
                  <tr>
                    <td height="21" align="right" valign="middle" class="bg_2">Note: </td>
                    <td valign="middle" class="bg_2">
                    <textarea name="note" cols="45" rows="5" style="width:300px"><?=$rs_edit["note_$lg"]?></textarea></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" valign="middle" class="bg_2"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="middle" class="bg_2">
				   <input type="image" src="../images/update.gif" name="Submit3" title="<?=$view_item_new?>" >
				   <img src="../images/cancel.gif" onclick="history.go(-1)" style="cursor: pointer" alt="<?=$view_item_reset?>"/>					</td>
                  </tr>
				  <input type="hidden" name="id" value="<?=$rs_edit["id"]?>">
				  <input type="hidden" name="form_color_edit" value="form_color_edit">
				  </form>
                </table>
				<? 
				} 
				?><? ?></td>
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