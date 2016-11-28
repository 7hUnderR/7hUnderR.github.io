<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"><?=$wait_delete_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><br>
				<?
				if($HTTP_GET_VARS["ma_del"]=="images")
					{
					echo"$thong_bao_cho_xoa<br> ";
					$item =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $item);
					$query = "Select * FROM tb_images WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 $ma_images=$rs["ma_images"];
					 echo" $i/ $rs[ten_anh]<br>";
					 }
					$cat=$HTTP_POST_VARS["cat"];
					$start=$HTTP_POST_VARS["start"];
					$alpha=$HTTP_POST_VARS["alpha"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					$lg=$HTTP_POST_VARS["lg"];
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$item\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					

					}
				if($HTTP_GET_VARS["ma_del"]=="files")
					{
					echo"$thong_bao_cho_xoa<br> ";
					$item =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $item);
					$query = "Select * FROM tb_files WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 $ma_images=$rs["ma_files"];
					 echo" $i/ $rs[ten_files_]<br>";
					 }
					$cat=$HTTP_POST_VARS["cat"];
					$start=$HTTP_POST_VARS["start"];
					$alpha=$HTTP_POST_VARS["alpha"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					$lg=$HTTP_POST_VARS["lg"];
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$item\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					

					}
				if($HTTP_GET_VARS["ma_del"]=="style")
					{
					echo"$thong_bao_cho_xoa<br> ";
					$item =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $item);
					$query = "Select * FROM tb_style_site WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 $ma_images=$rs["ma_files"];
					 echo" $i/ $rs[ten_files_]<br>";
					 }
					$cat=$HTTP_POST_VARS["cat"];
					$start=$HTTP_POST_VARS["start"];
					$alpha=$HTTP_POST_VARS["alpha"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					$lg=$HTTP_POST_VARS["lg"];
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$item\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					

					}
					if($HTTP_GET_VARS["ma_del"]=="flash")
					{
					echo"$thong_bao_cho_xoa<br> ";
					$item =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $item);
					$query = "Select * FROM tb_flash WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 $ma_images=$rs["ma_files"];
					 echo" $i/ $rs[ten_files_]<br>";
					 }
					$cat=$HTTP_POST_VARS["cat"];
					$start=$HTTP_POST_VARS["start"];
					$alpha=$HTTP_POST_VARS["alpha"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					$lg=$HTTP_POST_VARS["lg"];
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$item\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					

					}
				if($HTTP_GET_VARS["ma_del"]=="setup")
					{
					$setup=gia_tri_mot_cot("tb_setup","id",$HTTP_GET_VARS["id"],"ten_dm");
					$id=$HTTP_GET_VARS["id"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					echo"$thong_bao_cho_xoa <b>$setup</b>?";
					echo"<br><br> [ <a href=\"admin_delete.php?id=$id&ma_del=$ma_del\">$thong_bao_yes</a>
					  | <a href=\"#\" onClick=\"history.go(-1);\">$thong_bao_cancel</a> ]";
					 }
				if($HTTP_GET_VARS["ma_del"]=="ma_images")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$lg = $HTTP_POST_VARS["lg"];
					$alpha = $HTTP_POST_VARS["alpha"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM tb_images_ma WHERE ma_images in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[ten_ma_images] <br>";
					 }
					
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					
					}
  if($HTTP_GET_VARS["ma_del"]=="ma_files")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$lg = $HTTP_POST_VARS["lg"];
					$alpha = $HTTP_POST_VARS["alpha"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM tb_files_ma WHERE ma_files in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[ten_ma_files] <br>";
					 }
					
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					
					}
  if($HTTP_GET_VARS["ma_del"]=="ma_style")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$lg = $HTTP_POST_VARS["lg"];
					$alpha = $HTTP_POST_VARS["alpha"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM tb_style_site_ma WHERE ma_files in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[ten_ma_files] <br>";
					 }
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					
					}
  if($HTTP_GET_VARS["ma_del"]=="ma_flash")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$lg = $HTTP_POST_VARS["lg"];
					$alpha = $HTTP_POST_VARS["alpha"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM tb_flash_ma WHERE ma_files in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[ten_ma_files] <br>";
					 }
					
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					echo"</form>";					
					}
				if($HTTP_GET_VARS["ma_del"]=="user")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$lg = $HTTP_POST_VARS["lg"];
					$alpha = $HTTP_POST_VARS["alpha"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM tb_admin WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[user] <br>";
					 }
					
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					
					echo"</form>";
					}
				if($HTTP_GET_VARS["ma_del"]=="loai_dv")
					{
					$loai_dv=gia_tri_mot_cot("tb_ma_loai_dv","id",$HTTP_GET_VARS["id"],"ten_loai_dv");
					$id=$HTTP_GET_VARS["id"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					echo"$thong_bao_cho_xoa <b>$loai_dv</b> ?";
					echo"<br><br>[ <a href=\"admin_delete.php?id=$id&ma_del=$ma_del\">$thong_bao_yes</a> | <a href=\"#\" onClick=\"history.go(-1);\">$thong_bao_cancel</a> ]";
					}
				if($HTTP_GET_VARS["ma_del"]=="product")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$bac = $HTTP_POST_VARS["bac"];
					$lg = $HTTP_POST_VARS["lg"];
					$start=$HTTP_POST_VARS["start"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					
					include("inc/inc_return_page.php");
					$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
					
					echo"$thong_bao_cho_xoa<br> ";
					$items =$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $items);
					$query = "Select * FROM $tb WHERE id in ('$items')";
					$result = mysql_query($query);	
					$i=0;
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
					 echo" $i/ $rs[ten_vn] <br>";
					 }
					
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"bac\" value=\"$bac\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					
					echo"</form>";
					
					}
				if($HTTP_GET_VARS["ma_del"]=="catalog")
					{
					$cat=$HTTP_POST_VARS["cat"];
					$bac=$HTTP_POST_VARS["bac"];
					$start=$HTTP_POST_VARS["start"];
					$alpha=$HTTP_POST_VARS["alpha"];
					$ma_del=$HTTP_GET_VARS["ma_del"];
					$lg=$HTTP_POST_VARS["lg"];
					
					$chon=$HTTP_POST_VARS["chon"];
					$items=str_replace (",", "','", $chon);
					
					if($bac=="1")
					   $query = "Select * FROM tb_bac_1 WHERE ma_bac_1 in ('$items')";
					if($bac=="2")
					   $query = "Select * FROM tb_bac_2 WHERE ma_bac_2 in ('$items')";
					if($bac=="3")
					   $query = "Select * FROM tb_bac_3 WHERE ma_bac_3 in ('$items')";
					if($bac=="4")
					   $query = "Select * FROM tb_bac_4  WHERE ma_bac_4 in ('$items')";
					if($bac=="5")
					   $query = "Select * FROM tb_bac_5 WHERE ma_bac_5 in ('$items')";
					
					
					$result = mysql_query($query);	
					$i=0;
					echo"<b>$thong_bao_cho_xoa</b><br> ";
					while($rs= mysql_fetch_array($result))
					 { 
					 $i++;
						if($bac=="1")
							echo" $i/ ".$rs["ten_$lg"]."<br>";
						if($bac=="2")
							echo" $i/ ".$rs["ten_$lg"]."<br>";
						if($bac=="3")
							echo" $i/ ".$rs["ten_$lg"]."<br>";
						if($bac=="4")
							echo" $i/ ".$rs["ten_$lg"]."<br>";
						if($bac=="5")
						   echo" $i/ ".$rs["ten_$lg"]."<br>";
					 }
					
					echo"<form  method=\"post\" name=\"form\" action=\"admin_delete.php?ma_del=$ma_del&id=0\">";
					echo "<input type=\"hidden\" name=\"cat\" value=\"$cat\">";
					echo "<input type=\"hidden\" name=\"bac\" value=\"$bac\">";
					echo "<input type=\"hidden\" name=\"alpha\" value=\"$alpha\">";
					echo "<input type=\"hidden\" name=\"start\" value=\"$start\">";
					echo "<input type=\"hidden\" name=\"ma_del\" value=\"$ma_del\">";
					echo "<input type=\"hidden\" name=\"items\" value=\"$items\">";
					echo "<input type=\"hidden\" name=\"lg\" value=\"$lg\">";
					
					echo "<input type=\"submit\" name=\"Submit\" value=\"Delete\" class=nut_nhan style=\"width:60px;\">";
					echo " <input type=\"button\" value=\"Cancel\" class=nut_nhan  style=\"width:60px;\" onClick=\"history.go(-1)\">";
					
					echo"</form>";
					}?>
					</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
