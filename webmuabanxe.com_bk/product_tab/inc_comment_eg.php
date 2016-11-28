<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />

<?
	$qr = $_SERVER["QUERY_STRING"];
	include("../admin/inc/dbconnect.php");
	//include("../admin/inc/common.php");
	include("../inc_cat.php");
	include("../inc_lg_ma.php");
?>	
	<?	
	$id_product="1";
	if(isset($HTTP_GET_VARS["id_pproductv"]))
		$id_product = $HTTP_GET_VARS["id_pproductv"];
	
	$lg="vn";
	if(isset($HTTP_GET_VARS["lg"]))
		$lg = $HTTP_GET_VARS["lg"];

	?><table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="0" valign="top">
        <? 
			$table="tb_comment";
			$query = "Select * FROM  $table where code=$id_product and name_$lg!=''";
			//echo $query;
			$result = mysql_query($query);
			$num = mysql_num_rows($result);
			$PHP_SELF="./";
			$page_count =7; 
			$cut_off = 10; 

			include("../inc/phantrang.php");
		   
			$query2 = "Select * FROM  $table where code=$id_product and name_$lg!='' ORDER BY thu_tu DESC LIMIT $start, $page_count ";
			$result2 = mysql_query($query2);
			while($rs= mysql_fetch_array($result2))
			 { 
			  
			  $full_name=$rs["full_name_$lg"];
			  $email=$rs["email"];
			  $name=$rs["name_$lg"];
			  $note=$rs["note_$lg"];
			  $vote=$rs["vote"];
			  
			  $ngay="<span class=nho_lot>".$rs["date"].", ".$rs["gio"]."</span>";
			?>

			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <!--DWLayoutTable-->
			  <tr>
			    <td width="100%" height="21" align="left" valign="middle" class="tieu_de"><img src="images/icon/icon.gif" align="absmiddle"/> <?=$name;?></td>
			  </tr>
			  <tr>
			    <td height="10" valign="top" class="text_def tab_5" style="padding-bottom: 5px;"><?=$note;?></td>
		      </tr>
			  <tr>
			    <td valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="35%" valign="middle"><em>Hộ và tên: </em></td>
      <td width="85%" valign="middle"><?=$full_name;?></td>
    </tr>
    <tr>
      <td width="35%" valign="middle"><em>Email:</em></td>
      <td width="85%" valign="middle" ><?=$email;?></td>
    </tr>
    <tr>
      <td valign="middle"><em>Đánh giá: </em></td>
	  <td><img src="images/icon/<?=$vote;?>star.gif"/> </td>
    </tr>
    <tr>
      <td valign="middle"><em>Ngày viết: </em></td>
      <td height="20" valign="middle"><?=$ngay;?></td>
    </tr>
    <tr>
      <td height="19" colspan="2" valign="middle" class="tab_5" background="images/line_dot.gif">&nbsp;</td>
      </tr>
</table></td>
			  </tr>
			</table>
	    <?  }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td class="tab_5 text_def" align="center">
            <?  
			include("../inc_next_back.php"); 
			phan_trang_4dk($page_count,$num,"id_pproductv",$id_product,"lg",$lg,"start",$start,"select_tab",4,$start,$PHP_SELF,$cut_off,$next,$back,$dong,$mo)
			?></td>
        </tr>
        </table></td>
  </tr>
	

<tr>
  <td height="13"></td>
  </tr>
</table>


<form name="form" method="post"  action="./?id_pproductv=<?=$id_product?>&select_tab=4&lg=<?=$lg?>&start=0" onsubmit="return checkInput(this)">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20" colspan="2" valign="bottom" class="title_2 tab_5">Bình chọn cho sản phẩm: <?=gia_tri_mot_cot("tb_product","id",$id_product,"ten_$lg");?></td>
    </tr>
    <tr>
      <td height="5" colspan="2" valign="middle" background="images/line_dot.gif" >&nbsp;</td>
    </tr>
    <tr>
      <td width="35%" height="20" valign="middle" class="tieude tab_5">Hộ và tên: </td>
      <td valign="middle" class="tieude tab_5">
        <input name="full_name" type="text" class="textfield"  id="full_name" size="50" style="width: 300px;" />
* </td>
    </tr>
    <tr>
      <td width="35%" height="20" valign="middle" class="tieude tab_5">Email:</td>
      <td width="74%" valign="middle" class="tieude tab_5">
        <input name="email" type="text" class="textfield"  id="email" size="50" style="width: 300px;" />
* </td>
    </tr>
    <tr>
      <td height="20" valign="middle" class="tieude tab_5">Tiêu đề:</td>
      <td valign="middle" class="tab_5"><input name="title" type="text" class="textfield" id="title" size="50" style="width: 300px;" />
* </td>
    </tr>
    <tr>
      <td width="35%" align="left" valign="top" class="tab_5">Nội dung:</td>
      <td width="74%" height="76" align="left" valign="middle" class="tab_5"><textarea class="textfield" name="content" style=" width: 300px;" rows="5"></textarea>
      * </td>
    </tr>
    <tr>
      <td height="20" valign="middle" class="tab_5">Đánh giá: </td>
      <td height="20" valign="middle" class="tab_5"><select size="1" name="star" class="textfield">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option selected="selected" value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <img src="images/icon/starblue11x11.png" width="11" height="11" /> </td>
    </tr>
    <tr>
      <td height="20" valign="middle" class="tab_5">Bạn nhập mã bảo vệ vào ô bên cạnh:</td>
      <td height="20" valign="middle" class="tab_5"><input maxlength="8" size="8" name="userstring" type="text" value="" class="textfield" /><img src="product_tab/img.php" align="absmiddle" />
*</td>
    </tr>
    <tr>
      <td valign="middle" class="tab_5">&nbsp;</td>
      <td height="35" valign="middle" class="tab_5"><input name="Submit" type="submit" class="nut" style="width:100px;"  value="G&#7917;i đánh giá" />
          <input type="hidden" name="form" value="form" /></td>
    </tr>
</table>
</form>