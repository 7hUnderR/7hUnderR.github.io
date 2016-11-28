<? include("banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?	
	include("../../tool/fckeditor.php");
	$id="1";
	if(isset($HTTP_GET_VARS["id"]))
	$id = $HTTP_GET_VARS["id"];
	$lg="vn";
	if(isset($HTTP_GET_VARS["lg"]))
	$lg = $HTTP_GET_VARS["lg"];
	$page="1";
	if(isset($HTTP_GET_VARS["page"]))
	$page = $HTTP_GET_VARS["page"];
	
	if($page==1)
	$view_item_content=$view_item_content_2;
	if($page==2)
	$view_item_content=$view_item_content_3;
	if($page==3)
	$view_item_content=$view_item_content_4;
	if($page==4)
	$view_item_content=$view_item_content_5;
	if($page==5)
	$view_item_content=$view_item_content_6;
	
		$form_action = $_SERVER['PHP_SELF'];
		$qr = $_SERVER["QUERY_STRING"];
		if($qr!="")
		  $form_action = $form_action."?".$qr;

		if ( (isset($_POST["form"])) && ($_POST["form"] == "form"))
		 {
				$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
				$noidung =chuan_php("$noidung");

				
				
				if($page==1)
				 $query = "UPDATE tb_product SET mo_ta_1_$lg='$noidung' ";
				if($page==2)
				 $query = "UPDATE tb_product SET mo_ta_2_$lg='$noidung' ";
				if($page==3)
				 $query = "UPDATE tb_product SET mo_ta_3_$lg='$noidung' ";
				if($page==4)
				 $query = "UPDATE tb_product SET mo_ta_4_$lg='$noidung' ";
				if($page==5)
				 $query = "UPDATE tb_product SET mo_ta_5_$lg='$noidung' ";
				
				
				$query .= " WHERE id=$id ";
				$result = mysql_query($query);
				
				echo "<script  language='JavaScript'>";
				echo "alert('$update_completed')";
				echo "</script>";
			    echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
		}
		
		?>
<title><?=$view_item_content?></title>	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<form action="<?=$form_action?>" method="post" name="form" ENCTYPE="multipart/form-data">
	<tr>
	  <td height="28" valign="middle" class="tab_10_bg_1 M"><?
		$table="tb_product";
		$query = "Select * FROM  $table where id=$id ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		echo $rs["ten_$lg"]." / ".$view_item_content;
	  
	  ?></td>
  </tr>
	<tr>
	  <td align="left" valign="top" class="tab_10_bg_1"><? 
		if($page==1)
		$detail=$rs["mo_ta_1_$lg"];
		if($page==2)
		$detail=$rs["mo_ta_2_$lg"];
		if($page==3)
		$detail=$rs["mo_ta_3_$lg"];
		if($page==4)
		$detail=$rs["mo_ta_4_$lg"];
		if($page==5)
		$detail=$rs["mo_ta_5_$lg"];
		
				$sBasePath = $_SERVER['PHP_SELF'] ;
				$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
				$oFCKeditor = new FCKeditor('FCKeditor1') ;
				//$oFCKeditor->ToolbarSet	= 'Basic' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $detail;
				$oFCKeditor->Create() ;
				
				?></td>
  </tr>
	<tr>
	  <td height="30" align="left" valign="top" class="tab_10_bg_1">
	    <input type="hidden" name="form" value="form" />
		<input type="submit" name="Submit3" value="<?=$main_tieu_de_update?>" class="nut_nhan" />
        <input type="reset" name="Submit22" value="Close" class="nut_nhan" onclick="window.close();"/></td>
	</tr>
	</form>
  </table>
<? include("bottom.php")?>
                        
                        