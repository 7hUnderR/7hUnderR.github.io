<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
<script type="text/javascript" src="product_tab/ajaxtabs/ajaxtabs.js"></script>
<SCRIPT src="admin/inc/popupImg.js"></SCRIPT>
<script language="javascript">
function add_cart(cat,id,lg,start,i)
	{
		document.shopping[i].action="./?Bcat="+cat+"&id="+id+"&lg="+lg+"&start="+start+"";
		document.shopping[i].submit();

	}
</script>
<script language=JavaScript>

function checkInput(param)
{  
	if (param.full_name.value==""){
		alert("Xin vui lòng nhập tên của bạn!");
		param.full_name.focus();
		return false;
	}
	if (isEmail(param.email.value)==false){
		alert("Xin vui lòng nhập email!");
		param.email.focus();
		return false;
	}
	if (param.title.value==""){
		alert("Xin vui lòng nhập tiêu đề!");
		param.title.focus();
		return false;
	}
	if (param.content.value==""){
		alert("Xin vui lòng nhập nội dung!");
		param.content.focus();
		return false;
	}
	if (param.userstring.value==""){
		alert("Xin vui lòng nhập mã bảo vệ!");
		param.userstring.focus();
		return false;
	}
}

function isEmail(email){
	//If email is null
	if(email==""){
		return false;
	}
	//If email have space
	if(email.indexOf(" ")>0){
		return false;
	}
	//Neu email don't have @
	if(email.indexOf("@") == -1){
		return false;
	}
	
	var i = 1;
	var emailLength = email.length;
	if(email.indexOf(".") == -1){
		return false;
	}
	//Neu email la chuoi co hai dau . gan nhau
	if(email.indexOf("..")!=-1){
		return false;
	}
	//Neu email la chuoi co nhieu dau @
	if(email.indexOf("@") != email.lastIndexOf("@")){
		return false;
	}
	//Neu email la chuoi co dau . dau cung
	if(email.lastIndexOf(".")==email.length-1){
		return false;
	}
	//Neu email la chuoi co ky tu khong thuoc cac ky tu sau
	var str="abcdefghijklmnopqrstuvwxyz-@._0123456789";
	for(var j = 0; j<emailLength; j++){
		if(str.indexOf(email.charAt(j))==-1){
			return false;
		}
	}
	return true;
}  		
</script>
<?
	if ((isset($_POST["form"])) && ($_POST["form"] == "form")) 
	{
	
	$full_name=rep($HTTP_POST_VARS["full_name"]);
	$email=rep($HTTP_POST_VARS["email"]);
	
	$title=rep($HTTP_POST_VARS["title"]);
	$content=rep($HTTP_POST_VARS["content"]);
	$content=stripslashes($content);
	
	$star=rep($HTTP_POST_VARS["star"]);
	
	$ngay=date("Y/m/d");
	$gio=date("h:i:s A");
	
	
	
	$thanks="";
	
	$ssecuritycode= $_SESSION['ssecuritycode'];
	$varsecuritycode=strtoupper($_POST['userstring']);
	//echo "$ssecuritycode = $varsecuritycode";
	
	if($ssecuritycode==$varsecuritycode)
	{
	$sql="insert into tb_comment(code,full_name_$lg,email,name_$lg,note_$lg,vote,date,gio)";
	$sql .=" values('";
	$sql .=$id."','";
	$sql .=$full_name."','";
	$sql .=$email."','";
	$sql .=$title."','";
	$sql .=$content."','";
    $sql .=$star."','";
	$sql .=$ngay."','"; 
	$sql .=$gio."')";
	
	if($result = mysql_query($sql))
	
	 echo "$thanks";
	}
	else
	echo "<span class=text_do>Bạn nhập mã bảo vệ không chinh xác!</span>"; 
	} 
?><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" colspan="2" align="center" valign="top" class="product_detail">&nbsp;</td>
  </tr>
      <tr>
        <td width="10%" align="center" valign="top" class="border_table" style="padding-right: 3px; padding-left: 3px; padding-top: 2px;"><table width="100%" height="100" border="0" >
          <tr>
            <td align="center" valign="middle"><? 
				$table="tb_product";
				$query = "Select * FROM  $table where id=$id and banner!=1 and activate=1 ";
				$result = mysql_query($query);
				$rs= mysql_fetch_array($result);

   				  $ten=$rs["ten_$lg"];
				  $thu_tu_cuoi_cung=$rs["thu_tu"];
				  if($rs["anh"]!="") $anh="<img class=\"border_images\" width=\"200\" height=\"130\" src=\"images/photo/$rs[anh]\" border=1 hspace=0 title=\"$ten\" alt=\"$ten\">";
				  else
				  $anh="";
				  $id=$rs["id"];
				  $ghi_chu=$rs["ghi_chu_$lg"];
				  $ho_tro=$rs["product_ho_tro_$lg"];
				  $gia= $rs["product_price"];
				  $code=$rs["product_code"];
				  $status=$rs["product_status"];
				  $type=$rs["product_type"];
				  
				  $color=$rs["product_color"];
				  $color=str_replace (",", "','", $color);
				  
				  $size=$rs["product_size"];
				  $size=str_replace (",", "','", $size);
				  
				  $made=$rs["product_made"];
				  $made=str_replace (",", "','", $made);
				  $sell_off=$rs["product_sell_off"];
				  $sell_off_view=$rs["product_sell_off"];
				  //echo"<a onclick=\"javascript: popupImage('images/photo/$rs[anh_nho_1]')\" href=\"#\">$anh</a>";
				  echo"$anh";
				 ?></td>
          </tr>
        </table>
        <table width="100%" border="0">
          
          <tr>
            <td align="center" class="gia" style="padding-top: 5px;"><?  
					if($sell_off!=0)
					  {
						$gia_v=number_format($gia);
						$sell_off_v=number_format($sell_off_view);
						echo "<strike>$gia_v $project_tien</strike>"; 
						echo " | $sell_off_v $project_tien";
					  }
					  else
					  {
						$gia_v=number_format($gia);
						echo "$gia_v $project_tien";
					  } 
				  ?></td>
          </tr>
          <tr>
            <td align="center" class="text_def" style="padding-top: 5px;">
              <?=$rs["product_price_note_$lg"];?>             </td>
          </tr>
        </table></td>
        <td width="70%" valign="top" style="padding-left: 8px;">
				<?
			?>
        <form name="shopping" method="post" action="index.php?Bcat=<?=gia_tri_mot_cot("tb_bac_2","trang",77,"ma_bac_2");?>&id=<?=$id?>&lg=<?=$lg?>&start=0" style="margin: 0px;">

		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td height="18" valign="middle" class="title_3" style="padding-bottom: 10px;"><? echo "$ten"; ?></td>
		</tr>
		</table>
		<?
		if($rs["product_khuyen_mai_$lg"]!="")
		{
		?>
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="block_3_top tab_3_3 block_3_title">Khuyến mãi:</td>
		  </tr>
		  <tr>
			<td valign="top" class="block_3_center tab_4_4_4_4"><?=$rs["product_khuyen_mai_$lg"];?></td>
		  </tr>
</table>
<? } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="30%" valign="middle" class="block_4_title border_b"><img src="images/icon/icon_p.gif" align="absmiddle" /><strong>Tình trạng:</strong></td>
              <td height="25" valign="middle" class="border_b"><?=gia_tri_mot_cot("tb_product_status","code",$status,"name_$lg");?></td>
            </tr>
			  <tr>
			    <td valign="middle" class="block_4_title border_b"><img src="images/icon/icon_p.gif" align="absmiddle" /><strong>Bảo hành:</strong></td>
              <td height="25" valign="middle" class="border_b"><?=$rs["product_bao_hanh_$lg"];?></td>
            </tr>
            <tr>
              <td valign="middle" class="block_4_title border_b"><img src="images/icon/icon_p.gif" align="absmiddle"><strong>Số lượt xem:</strong></td>
              <td height="25" valign="middle" class="border_b"><span class="gia"><? 
			  $visitors=$rs["product_visitors"];
			  $visitors_dem=$visitors+1;
			  $query_dem = "UPDATE tb_product SET product_visitors='$visitors_dem' WHERE id=$id ";	
			  $result_dem = mysql_query($query_dem);
							
										  
			  $visitors_dem=number_format($visitors_dem); 
			  
			  echo $visitors_dem; ?></span> (Tính từ ngày: 
                <?=$rs["ngay"];?>
              ) </td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="left" valign="middle" class="add_cart border_b"><a href="./?Acat=<?=gia_tri_mot_cot("tb_bac_1","trang",85,"ma_bac_1");?>&lg=<?=$lg?>&start=0&idpo=<?=$id?>">
                <?=gia_tri_mot_cot("tb_bac_1","trang",85,"ten_$lg");?>
                </a>
                  <input type="hidden" name="qty2" size="3" maxlength="4" value="1" class="textfield" />
                  <input type="hidden" name="id2" value="<?=$id?>"/>
              <input type="hidden" name="query2" value="<?=$qr?>" /></td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="left" valign="middle" class="add_cart border_b"><?=$ghi_chu;?></td>
            </tr>
          </table>
		<?
		if($rs["product_nguyen_hop_$lg"]!="")
		{
		?>
		  <img height=8 src="" width="0">	
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="block_4_top tab_3_3 block_4_title">Nguyên xe <?=$ten;?> gồm:</td>
		  </tr>
		  <tr>
			<td valign="top" class="block_4_center tab_4_4_4_4"><?=$rs["product_nguyen_hop_$lg"];?></td>
		  </tr>
</table>
<? } ?>
<?
if($rs["product_ho_tro_$lg"]!="")
{
?>
 <img height=8 src="" width="0">	
<table cellspacing=0 cellpadding=0 width="100%" border=0>
		  <tr>
			<td valign="middle" class="block_4_top tab_3_3 block_4_title">Mua xe <?=$ten;?> tại Webmaubanxe.com bạn sẽ được hỗ trợ:</td>
		  </tr>
		  <tr>
			<td valign="top" class="block_4_center tab_4_4_4_4"><? echo "$ho_tro"; ?></td>
		  </tr>
</table>
<? }?>
        </form></td>
      </tr>
      
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td valign="top" class="text_def" style="padding-top:8px;"><? 
		/*
		$tab_1="Sản phẩm";
		$tab_2="Hình ảnh";
		$tab_3="Bài viết";
		$tab_4="Nhận xét đánh giá";
		$tab_5="Phim liên quan";
		$tab_6="In ấn quảng cáo";
        */
		$tab_1="Thông số kỹ thuật";
		$tab_2="Hình ảnh";
		$tab_3="Nội ngoại thất";
		$tab_4="Xem 360";
		$tab_5="Video";
		$tab_6="Bài viết";

		$select_tab=1;
		if(isset($HTTP_GET_VARS["select_tab"]))
		$select_tab=$HTTP_GET_VARS["select_tab"];
		switch($select_tab)
		{
			case "1":
			   $select_1="class=\"selected\"";
			   $select_2="";
			   $select_3="";
			   $select_4="";
			   $select_5="";
			   $select_6="";
				break;
			case "2":
			   $select_1="";
			   $select_2="class=\"selected\"";
			   $select_3="";
			   $select_4="";
			   $select_5="";
			   $select_6="";
				break;
			case "3":
			   $select_1="";
			   $select_2="";
			   $select_3="class=\"selected\"";
			   $select_4="";
			   $select_5="";
			   $select_6="";
				break;
			case "4":
			   $select_1="";
			   $select_2="";
			   $select_3="";
			   $select_4="class=\"selected\"";
			   $select_5="";
			   $select_6="";
				break;
			case "5":
			   $select_1="";
			   $select_2="";
			   $select_3="";
			   $select_4="";
			   $select_5="class=\"selected\"";
			   $select_6="";
				break;
			case "6":
			   $select_1="";
			   $select_2="";
			   $select_3="";
			   $select_4="";
			   $select_5="";
			   $select_6="class=\"selected\"";
				break;
			default:
			   $select_1="class=\"selected\"";
			   $select_2="";
			   $select_3="";
			   $select_4="";
			   $select_5="";
			   $select_6="";
				break;
		}

		$table="tb_product";
		$query = "Select * FROM  $table where id=$id and banner!=1 ";
		$result = mysql_query($query);
		$rs= mysql_fetch_array($result);
		
		$thu_tu_cuoi_cung=$rs["thu_tu"];
		$detail=$rs["mo_ta_$lg"];
		$detail=cat_duong_dan_thua($detail);
		//echo "<span class=text_20_1>".$rs["ten_$lg"]."</span><br><br>";
		if(strstr($qr,"id_pnews_intabv"))
		   {
		   $id_pnews_intabv=$HTTP_GET_VARS["id_pnews_intabv"];
		   $link_hd = "product_tab/inc_detail_news_tab_content.php?id_pnews_intabv=$id_pnews_intabv&id_pproductv=$id&lg=$lg&start=$start";
		   }
		else
		   $link_hd = "product_tab/inc_detail_news_tab.php?id_pproductv=$id&lg=$lg&start=$start";
	  ?><ul id="maintab" class="shadetabs">
		<li <?=$select_1?> ><a href="#default" rel="ajaxcontentarea"><?=$tab_1?></a></li>
		<li <?=$select_2?> ><a href="product_tab/inc_detail_product_tab_content.php?id_pproductv=<?=$id?>&page=1&lg=<?=$lg?>" rel="ajaxcontentarea"><?=$tab_2?></a></li>
		<li <?=$select_3?> ><a href="product_tab/inc_detail_product_tab_content.php?id_pproductv=<?=$id?>&page=2&lg=<?=$lg?>" rel="ajaxcontentarea"><?=$tab_3?></a></li>
		<li <?=$select_4?> ><a href="product_tab/inc_detail_product_tab_content.php?id_pproductv=<?=$id?>&page=3&lg=<?=$lg?>" rel="ajaxcontentarea"><?=$tab_4?></a></li>
		<li <?=$select_5?> ><a href="product_tab/inc_detail_product_tab_content.php?id_pproductv=<?=$id?>&page=4&lg=<?=$lg?>" rel="ajaxcontentarea"><?=$tab_5?></a></li>
		<li <?=$select_6?> ><a href="<?=$link_hd?>" rel="ajaxcontentarea"><?=$tab_6?></a></li>

		</ul>
		
		<div id="ajaxcontentarea" class="contentstyle">
		<?
		echo  $detail;
		?>
		</div>
		
		<script type="text/javascript">
		//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
		startajaxtabs("maintab")
		</script></td>
	</tr>
	<tr>
	  <td height="5" colspan="2" valign="top"></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td valign="middle"><?
			//echo"$cat | $cat_s | $cat_s_s | $cat_s_s_s | $cat_s_s_s_s ";
			
		if( ($cat!=0) && ($cat_s==0))
			{
			$ten_tieude="<a href=\"./?Acat=$cat&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_1","ma_bac_1",$cat,"ten_$lg")."</a>"; 
			}
		if(($cat_s!=0) && ($cat_s_s==0))
			{
			$ten_tieude="<a href=\"./?Bcat=$cat_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_2","ma_bac_2",$cat_s,"ten_$lg")."</a>"; 
			}
		if(($cat_s_s!=0) && ($cat_s_s_s==0))
			{
			$ten_tieude="<a href=\"./?Ccat=$cat_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_3","ma_bac_3",$cat_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0 && $cat_s_s_s_s==0))
		   {
			$ten_tieude="<a href=\"./?Dcat=$cat_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_4","ma_bac_4",$cat_s_s_s,"ten_$lg")."</a>";
			}
		if(($cat_s_s_s!=0) && ($cat_s_s_s_s!=0))
			{
			$ten_tieude="<a href=\"./?Ecat=$cat_s_s_s_s&lg=$lg&start=0\">".gia_tri_mot_cot("tb_bac_5","ma_bac_5",$cat_s_s_s_s,"ten_$lg")."</a>";
			}
		   ?>
		<table cellspacing="0" cellpadding="0" width="100%" border="0">
          <tr>
            <td height="30" class="title_page_2" valign="middle" align="left"><? 
			  echo "<b>$ten_tieude</b>";
			  ?></td>
          </tr>
        </table> <? ?>	</td>
	</tr>
   <?
	    $query2 = "Select * FROM  $table where ma_bac_1=$cat and ma_bac_2=$cat_s and thu_tu < $thu_tu_cuoi_cung and banner!=1 and activate=1 and id!=$id ORDER BY thu_tu DESC LIMIT 0, 12 ";
         //echo $query2;
		 
		$result2 = mysql_query($query2);
		$num_= mysql_num_rows($result2);
		if($num_>0)
		  {
		    ?> 
	<tr>
	  <td height="28" valign="top" style="padding-top:20px;"><? 
			$i=0;
			?>
	    <table border="0" cellpadding="0" cellspacing="5" align="center">
          <tr>
            <?
			$i=0;
			while($rs= mysql_fetch_array($result2))
			 { 
			  $i++;
			  $gia=$rs["product_price"];
			  $code = $rs["product_code"];
			  $sell_off=$rs["product_sell_off"];
			  $sell_off_view=$rs["product_sell_off"];
			  
			  $ten = $rs["ten_$lg"];
              $id = $rs["id"];
			  $ghi_chu=$rs["ghi_chu_$lg"];
			  if($rs["anh_nho"]!="") 
			  $anh="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\"><img src=\"images/photo/$rs[anh_nho]\" border=1 title=\"$ten\" ></a>";
			  else
			  $anh="";
			  $ten="<a href=\"./?id_pproductv=$rs[id]&lg=$lg&start=$start\" >".$rs["ten_$lg"]."</a>";
			  ?>
            <td width="200" valign="top" align="center" class="tab_4_4_4_4 border_table"><form action="" method="post" name="shopping" id="shopping" style="margin: 0px;">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td align="center" valign="top" class="border_images_sp"><?=$anh?></td>
                  </tr>
                  <tr>
                    <td height="25" align="center" valign="middle" class="tieu_de_tin"><? echo "$ten"; ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="center" valign="middle" class="gia"><?  
					if($sell_off!=0)
					  {
						$gia_v=number_format($gia);
						$sell_off_v=number_format($sell_off_view);
						echo "<strike>$gia_v $project_tien</strike>"; 
						echo " | $sell_off_v $project_tien";
					  }
					  else
					  {
						$gia_v=number_format($gia);
						echo "$gia_v $project_tien";
					  } 
				  ?></td>
                  </tr>
                </table>
            </form></td>
            <? 
				  if($i==4)
				  {
				   echo"</tr>"; 
				  $i=0;
				  }
				  $k++;
				  }
			   ?>
          </tr>
        </table>
      <? ?>          </td>
</tr>
<? } ?>
<tr>
  <td height="16"></td>
</tr>
</table>