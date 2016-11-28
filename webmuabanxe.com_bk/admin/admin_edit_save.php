<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr class="M">
			<td height="25" valign="middle" class="bg_title"><?=$update_page?></td>
			</tr>
			<tr>
			<td height="285" valign="top" class="bg_center"><br>
			<?
			$image_upload=path_upload_mannager("images");
			$files_upload=path_upload_mannager("files");
			$flash_upload=path_upload_mannager("flash");
			
			$save=$HTTP_GET_VARS["save"];
				if($save=="sort"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$lg=rep($HTTP_POST_VARS["lg"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							$ten=rep($HTTP_POST_VARS["ten_$i"]);
							$query = "UPDATE tb_bac_1 SET thu_tu='$thu_tu',ten_$lg='$ten'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							}
				if($save=="sort_s"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							$ten=rep($HTTP_POST_VARS["ten_$i"]);
							$lg=rep($HTTP_POST_VARS["lg"]);
							$query = "UPDATE tb_bac_2 SET thu_tu='$thu_tu',ten_$lg='$ten'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							}
				if($save=="sort_s_s"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							$ten=rep($HTTP_POST_VARS["ten_$i"]);
							$lg=rep($HTTP_POST_VARS["lg"]);
							$query = "UPDATE tb_bac_3 SET thu_tu='$thu_tu',ten_$lg='$ten'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							}
				if($save=="sort_s_s_s"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							$ten=rep($HTTP_POST_VARS["ten_$i"]);
							$lg=rep($HTTP_POST_VARS["lg"]);
							$query = "UPDATE tb_bac_4  SET thu_tu='$thu_tu',ten_$lg='$ten'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							}
				if($save=="sort_s_s_s_s"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							$ten=rep($HTTP_POST_VARS["ten_$i"]);
							$lg=rep($HTTP_POST_VARS["lg"]);
							$query = "UPDATE tb_bac_5 SET thu_tu='$thu_tu',ten_$lg='$ten'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							}
				if($save=="sort_ma_images"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_images_ma SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							
							echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_view_images_ma.php?cat=$cat&lg=$lg&start=$start&alpha=All\">";							
							}
				if($save=="sort_images"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_images SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$alpha=$HTTP_POST_VARS["alpha"];
							$start=$HTTP_POST_VARS["start"];
							
							echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_view_images.php?cat=$cat&lg=$lg&start=$start&alpha=$alpha\">";							
							}
				if($save=="sort_ma_files"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_files_ma SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							
							echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_view_files_ma.php?cat=$cat&lg=$lg&start=$start&alpha=All\">";							
							}
				if($save=="sort_files"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_files SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$alpha=$HTTP_POST_VARS["alpha"];
							$start=$HTTP_POST_VARS["start"];
							
							echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_view_files.php?cat=$cat&lg=$lg&start=$start&alpha=$alpha\">";							
							}
				if($save=="sort_user"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_admin SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							
							echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_user.php?cat=$cat&lg=$lg&start=$start&alpha=All\">";							
							}
				if($save=="sort_items_news"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
							
							$query = "UPDATE tb_news SET thu_tu='$thu_tu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";							
							
							}
				if($save=="sort_items_news_lich_chieu"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
							{
							$id=rep($HTTP_POST_VARS["id_$i"]);
							$ngay_chieu=rep($HTTP_POST_VARS["ngay_chieu_$i"]);
							
							$query = "UPDATE tb_news SET ngay_chieu='$ngay_chieu'";
							$query .= "WHERE id=$id";
							$result = mysql_query($query);
							}
							echo "$update_completed";
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";							
							
							}
			if($save=="sort_product"){
							$num=$HTTP_POST_VARS["num"]; 
							for($i=1;$i<=$num; $i++)
								{
								$id=rep($HTTP_POST_VARS["id_$i"]);
								$thu_tu=rep($HTTP_POST_VARS["thu_tu_$i"]);
								$ten=rep($HTTP_POST_VARS["ten_$i"]);
								$price=rep($HTTP_POST_VARS["price_$i"]);
								$sell_off=rep($HTTP_POST_VARS["sell_off_$i"]);
								$code=rep($HTTP_POST_VARS["code_$i"]);
								$qty=rep($HTTP_POST_VARS["qty_$i"]);
								$status=rep($HTTP_POST_VARS["product_status_$i"]);
								$type=rep($HTTP_POST_VARS["product_type_$i"]);
								
								$lg=$HTTP_POST_VARS["lg"]; // Update 1 lần khong luu lai do thieu dong nay trong trang admin  la form_nhap_product_2_images_view.php
								
								$query = "UPDATE tb_product SET thu_tu='$thu_tu',product_price='$price',
								ten_$lg='$ten',
								product_sell_off='$sell_off',
								product_code='$code',
								product_quality='$qty',
								product_type='$type',
								product_status='$status'";						
								$query .= "WHERE id=$id";
								$result = mysql_query($query);


								$query = "UPDATE tb_product_da_catalog SET thu_tu='$thu_tu' ";
								$query .= "WHERE id_product=$id";
								$result = mysql_query($query);
								}
							echo "$update_completed";
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
							}
			if($save=="ma_images")
							{
							$id=$HTTP_GET_VARS["id"]; 
							$old_name = gia_tri_mot_cot("tb_images_ma","id",$id,"ten_ma_images");
							
							$tendv=rep($HTTP_POST_VARS["ten_dich_vu"]);
							$mo_ta=rep($HTTP_POST_VARS["mo_ta"]);
					
							$query = "Select * FROM  tb_images_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_images"]==$tendv)
							  $key=1;
							}
							
							if($key==0)
							{
							$table="tb_images_ma";
							$query = "UPDATE $table SET ten_ma_images='$tendv', mo_ta='$mo_ta' ";
							$query .= "WHERE id =$id";
							$result = mysql_query($query);
							$path=lay_path_root("local").$image_upload;
							   rename("$path/$old_name","$path/$tendv");
							echo "$update_completed";
							}else
							echo "Can not rename, please choose folder name another !";
							}
			if($save=="ma_files")
							{
							$id=$HTTP_GET_VARS["id"]; 
							$old_name=gia_tri_mot_cot("tb_files_ma","id",$id,"ten_ma_files");
							
							$tendv=rep($HTTP_POST_VARS["ten_dich_vu"]);
							$mo_ta=rep($HTTP_POST_VARS["mo_ta"]);

							$query = "Select * FROM  tb_files_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_files"]==$tendv)
							  $key=1;
							}
							
							if($key==0)
							{
							$table="tb_files_ma";
							$query = "UPDATE $table SET ten_ma_files='$tendv',mo_ta='$mo_ta' ";
							$query .= "WHERE id =$id";
							$result = mysql_query($query);
							$path=lay_path_root("local").$files_upload;
							   rename("$path/$old_name","$path/$tendv");
							echo "$update_completed";
							}else
							echo "Can not rename, please choose folder name another !";
							}
			if($save=="ma_flash")
							{
							$id=$HTTP_GET_VARS["id"]; 
							$old_name=gia_tri_mot_cot("tb_flash_ma","id",$id,"ten_ma_files");
							
							$tendv=rep($HTTP_POST_VARS["ten_dich_vu"]);
							$mo_ta=rep($HTTP_POST_VARS["mo_ta"]);

							$query = "Select * FROM  tb_flash_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_files"]==$tendv)
							  $key=1;
							}
							
							if($key==0)
							{
							$table="tb_flash_ma";
							$query = "UPDATE $table SET ten_ma_files='$tendv',mo_ta='$mo_ta' ";
							$query .= "WHERE id =$id";
							$result = mysql_query($query);
							
							$path=lay_path_root("local").$flash_upload;
							   rename("$path/$old_name","$path/$tendv");
							echo "$update_completed";
							}else
							echo "Can not rename, please choose folder name another !";
							}
			if($save=="user"){
							$id=$HTTP_GET_VARS["id"]; 
							$name=rep($HTTP_POST_VARS["name"]);
							$email=rep($HTTP_POST_VARS["email"]);
							$user_name=rep($HTTP_POST_VARS["user_name"]);
							$password=rep($HTTP_POST_VARS["password"]);
							$password=md5($password);
							
							$quyen=rep($HTTP_POST_VARS["quyen"]);
							$table="tb_admin";
							$query = "UPDATE $table SET ten='$name',email='$email',user='$user_name',pass='$password',quyen='$quyen'";
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed";
							}
			if($save=="loai_dv"){
							$id=$HTTP_GET_VARS["id"]; 
							$tendv=rep($HTTP_POST_VARS["ten_dich_vu"]);
							$table="tb_ma_loai_dv";
							$query = "UPDATE $table SET ten_loai_dv='$tendv'";
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed";
							}
				if($save=="catalog"){
							$id=$HTTP_GET_VARS["id"]; 
							$bac=$HTTP_POST_VARS["bac"];
                            $lg=$HTTP_POST_VARS["lg"]; 
							$path=lay_path_root("local");
							$path.="images/danh_muc/";
							
							$ten_dv=rep($HTTP_POST_VARS["tendichvu"]);
							$mo_ta_dv=rep($HTTP_POST_VARS["mo_ta_dv"]);
							$ghi_chu=rep($HTTP_POST_VARS["ghi_chu"]);
							$noi_dung = stripslashes($HTTP_POST_VARS["noi_dung"]);
							$noi_dung =chuan_php("$noi_dung");
							$link=rep($HTTP_POST_VARS["link"]);
							$target=rep($HTTP_POST_VARS["target"]);
							$trang=rep($HTTP_POST_VARS["trang"]);
							
							$anh=$HTTP_POST_FILES['userfile']['name'];
							$anh_old=$HTTP_POST_VARS["anh"];
							$ext_nho=lay_ext($anh);
							if($anh!="")
							  $anh_rename=$bac."_".$id."_"."small.".$ext_nho;
							else
							  $anh_rename=$anh_old;
							$xoa_anh=$HTTP_POST_VARS["xoa_anh"];
							
							if($xoa_anh==1)
								 {
								  delete_file("$path/$anh_old");
								  $anh_rename="";
								 }
							if($anh!="")
								{
								 if($anh_old!="") delete_file("$path/$anh_old");
								 if (in_array($_FILES['userfile']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 rename("$path/$anh","$path/$anh_rename");
								}
							
							
							
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name']; 
							$anh_lon_old=$HTTP_POST_VARS["anh_lon"];
							$ext_lon=lay_ext($anh_lon);
							if($anh_lon!="")
							  $anh_rename_lon=$bac."_".$id."_"."max.".$ext_lon;
							else
							  $anh_rename_lon=$anh_lon_old;
							  
							$xoa_anh_lon=$HTTP_POST_VARS["xoa_anh_lon"];
							if($xoa_anh_lon==1)
								 {
								  delete_file("$path/$anh_lon_old");
								  $anh_rename_lon="";
								 }
							if($anh_lon!="")
								{
								 if($anh_lon_old!="")  delete_file("$path/$anh_lon_old");
								 if (in_array($_FILES['userfile_lon']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
								 rename("$path/$anh_lon","$path/$anh_rename_lon");
								}
							
							$anh_1=$HTTP_POST_FILES['userfile_1']['name'];
							$anh_1_old=$HTTP_POST_VARS["anh_1"];
							$ext_nho_1=lay_ext($anh_1);
							if($anh_1!="")
							  $anh_rename_1=$bac."_".$id."_1_small.".$ext_nho_1;
							else
							  $anh_rename_1=$anh_1_old;
							$xoa_anh_1=$HTTP_POST_VARS["xoa_anh_1"];
							
							if($xoa_anh_1==1)
								 {
								  delete_file("$path/$anh_1_old");
								  $anh_rename_1="";
								 }
							if($anh_1!="")
								{
								 if($anh_1_old!="") delete_file("$path/$anh_1_old");
								 if (in_array($_FILES['userfile_1']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
								 rename("$path/$anh_1","$path/$anh_rename_1");
								}
							
							$anh_1_lon=$HTTP_POST_FILES['userfile_1_lon']['name']; 
							$anh_1_lon_old=$HTTP_POST_VARS["anh_1_lon"];
							$ext_1_lon=lay_ext($anh_1_lon);
							if($anh_1_lon!="")
							  $anh_rename_1_lon=$bac."_".$id."_1_max.".$ext_1_lon;
							else
							  $anh_rename_1_lon=$anh_1_lon_old;
							  
							$xoa_anh_1_lon=$HTTP_POST_VARS["xoa_anh_1_lon"];
							if($xoa_anh_1_lon==1)
								 {
								  delete_file("$path/$anh_1_lon_old");
								  $anh_rename_1_lon="";
								 }
							if($anh_1_lon!="")
								{
								 if($anh_1_lon_old!="")  delete_file("$path/$anh_1_lon_old");
								 if (in_array($_FILES['userfile_1_lon']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_1_lon']['tmp_name'], "$path/$anh_1_lon");
								 rename("$path/$anh_1_lon","$path/$anh_rename_1_lon");
								}
						   
						   if($bac=="1")
							   {
							   $query = "UPDATE tb_bac_1 SET ten_$lg='$ten_dv',mo_ta_$lg='$mo_ta_dv',ghi_chu_$lg='$ghi_chu',noi_dung_$lg='$noi_dung',anh='$anh_rename',anh_lon='$anh_rename_lon',anh_1='$anh_rename_1',anh_1_lon='$anh_rename_1_lon',link_$lg='$link',target_$lg='$target',trang='$trang'";
							   $page="index.php";
							   }
							if($bac=="2")
							   {
							   $query = "UPDATE tb_bac_2 SET ten_$lg='$ten_dv',mo_ta_$lg='$mo_ta_dv',ghi_chu_$lg='$ghi_chu',noi_dung_$lg='$noi_dung',anh='$anh_rename',anh_lon='$anh_rename_lon',anh_1='$anh_rename_1',anh_1_lon='$anh_rename_1_lon',link_$lg='$link',target_$lg='$target',trang='$trang'";
							   $page="index_2.php";
							   }
							if($bac=="3")
							   {
							   $query = "UPDATE tb_bac_3 SET ten_$lg='$ten_dv',mo_ta_$lg='$mo_ta_dv',ghi_chu_$lg='$ghi_chu',noi_dung_$lg='$noi_dung',anh='$anh_rename',anh_lon='$anh_rename_lon',anh_1='$anh_rename_1',anh_1_lon='$anh_rename_1_lon',link_$lg='$link',target_$lg='$target',trang='$trang'";
							   $page="index_3.php";
							   }
							if($bac=="4")
							  {
							   $query = "UPDATE tb_bac_4 SET ten_$lg='$ten_dv',mo_ta_$lg='$mo_ta_dv',ghi_chu_$lg='$ghi_chu',noi_dung_$lg='$noi_dung',anh='$anh_rename',anh_lon='$anh_rename_lon',anh_1='$anh_rename_1',anh_1_lon='$anh_rename_1_lon',link_$lg='$link',target_$lg='$target',trang='$trang'";
							   $page="index_4.php";
							   }
							if($bac=="5")
							  {
							   $query = "UPDATE tb_bac_5 SET ten_$lg='$ten_dv',mo_ta_$lg='$mo_ta_dv',ghi_chu_$lg='$ghi_chu',noi_dung_$lg='$noi_dung',anh='$anh_rename',anh_lon='$anh_rename_lon',anh_1='$anh_rename_1',anh_1_lon='$anh_rename_1_lon',link_$lg='$link',target_$lg='$target',trang='$trang'";
							   $page="index_5.php";
							   }
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed";
							}
			
				if($save=="user_pass"){
							$id=$HTTP_POST_VARS["id"];
							$a=rep($HTTP_POST_VARS["a"]);
							$a=md5($a);
							$table="tb_admin";
							$query = "Select * FROM  $table  where ma_user='$ma_user_admin' ";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);
							if($rs["pass"]==$a)
							{
							$password=rep($HTTP_POST_VARS["password"]);
							$password=md5($password);
							$query = "UPDATE $table SET pass='$password'";
							$query .= "WHERE id =$id and ma_user=$ma_user_admin";
							if($result = mysql_query($query))
							echo "$update_completed";
							}
							else
							echo" Old Password Wrong! Can not change! <br><input type=\"reset\" name=\"Submit2\" value=\"Back\" onclick=\"history.go(-1)\">";
							}
							
							
				if($save=="edit_files_download")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_old=gia_tri_mot_cot("tb_news","id",$id,"anh");
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							$ext=lay_ext($anh);
							
							$file_size=$HTTP_POST_FILES['userfile']['size'];
							
							if($file_size>7340032) //7MB
							  echo"<br>File Size < 7340032 bytes (7MB)!";
							else
							{
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								 $thumbnail=$_POST["thumbnail"];
									if(($thumbnail==1)||($thumbnail==2))
										{
										  $source_file = "$path/$anh_nho";
										  $destination_file = "$path/$anh_nho_rename";
										  $width = $_POST["width"];
										  $height = $_POST["height"];
										  $type = $_FILES['userfile_nho']['type'];
										  if($thumbnail==1)
										  {
										  if(($width=="")&&($height!=""))
											thumbnaily($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height==""))
											thumbnailx($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height!=""))
											thumbnailxy($source_file,$destination_file,$type,$width,$height);
										  }
										  else
											thumbnail_cut($source_file,$destination_file,$type,$width,$height);
										  
										  delete_file("$path/$anh_nho");
										 }
										 
									if($thumbnail==0)
										 {
										 rename("$path/$anh_nho","$path/$anh_nho_rename");
										 }
								}
								
						

							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_old");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								 if (in_array($_FILES['userfile']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 delete_file("$path/$anh_old");
								 rename("$path/$anh","$path/$anh_rename");
								}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;	
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							$key_word = stripslashes($HTTP_POST_VARS["key_word"]);
							$key_word=chuan_php($key_word);

							$table="tb_news";
						
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',key_word_vn='$key_word',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',key_word_vn='$key_word',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',key_word_kr='$key_word',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$noidung',key_word_vn='$key_word',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							}
					}
								   
				if($save=="edit_one_page")
							{
							$id=$HTTP_GET_VARS{"id"};
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");
			
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
			
							$ten=rep($HTTP_POST_VARS{"ten"});
							//$ten=str_replace("'","\'",$ten);
			
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',mo_ta_eg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
							}
							else
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',mo_ta_eg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
					}
				if($save=="edit_lich_chieu")
							{
							$id=$HTTP_GET_VARS{"id"};
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");
			
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
			
							$ngay_chieu=rep($HTTP_POST_VARS{"ngay_chieu"});
							//$ten=str_replace("'","\'",$ten);
			
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ngay_chieu='$ngay_chieu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
							else
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ngay_chieu='$ngay_chieu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
					}

				if($save=="edit_news_2_images_movie")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							$path_movie=$path_root."images/movie/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							    delete_file("$path/$anh_nho_rename");
								rename("$path/$anh_nho","$path/$anh_nho_rename");
								}
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.jpg";
								 }
							else
							  {
							  if($xoa==1)
								 {
								  if(is_file("$path/$anh_rename"))
									 unlink("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								delete_file("$path/$anh_rename");
								 rename("$path/$anh","$path/$anh_rename");
								}
							
							$movie=$HTTP_POST_FILES['movie']['name']; 
							$movie_rename=$HTTP_POST_VARS["movie_name"];
							$xoa_movie=$HTTP_POST_VARS["xoa_movie"];
							if($movie!="")
								 {
								 $movie_rename=$id.".wmv";
								 }
							else
							  {
							  if($xoa_movie==1)
								 {
								  if(is_file("$path_movie/$movie_rename"))
									 unlink("$path_movie/$movie_rename");
								  $movie_rename="";
								 }
							  }
							
							if($movie!="")
								{
								 if (in_array($_FILES['movie']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
								 delete_file("$path/$movie_rename");
								 rename("$path_movie/$movie","$path_movie/$movie_rename");
								}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;	
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
							}
							else
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}
					
					
				if($save=="edit_news_3_images")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name'];
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 delete_file("$path/$anh_nho_rename");
								  
								$thumbnail_nho=$_POST["thumbnail_nho"];
								if(($thumbnail_nho==1)||($thumbnail_nho==2))
									{
									  $source_file = "$path/$anh_nho";
									  $destination_file = "$path/$anh_nho_rename";
									  $width = $_POST["width_nho"];
									  $height = $_POST["height_nho"];
									  $type = $_FILES['userfile_nho']['type'];
									  if($thumbnail_nho==1)
									  {
									  if(($width=="")&&($height!=""))
										thumbnaily($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height==""))
										thumbnailx($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height!=""))
										thumbnailxy($source_file,$destination_file,$type,$width,$height);
									  }
									  else
										thumbnail_cut($source_file,$destination_file,$type,$width,$height);
									  
									  delete_file("$path/$anh_nho");
									 }
									 
								if($thumbnail_nho==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
							 }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								 if (in_array($_FILES['userfile']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
									$thumbnail=$_POST["thumbnail"];
									if(($thumbnail==1)||($thumbnail==2))
										{
										  $source_file = "$path/$anh";
										  $destination_file = "$path/$anh_rename";
										  $width = $_POST["width"];
										  $height = $_POST["height"];
										  $type = $_FILES['userfile']['type'];
										  if($thumbnail==1)
										  {
										  if(($width=="")&&($height!=""))
											thumbnaily($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height==""))
											thumbnailx($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height!=""))
											thumbnailxy($source_file,$destination_file,$type,$width,$height);
										  }
										  else
											thumbnail_cut($source_file,$destination_file,$type,$width,$height);
										  
										  delete_file("$path/$anh");
										 }
								if($thumbnail==0)
										 {
										 rename("$path/$anh","$path/$anh_rename");
										 }
								}
							
								///dfgsdfsdfasdf
								$anh_lon=$HTTP_POST_FILES['userfile_lon']['name']; 
								$ext_lon=lay_ext($anh_lon);
								$anh_lon_rename=$HTTP_POST_VARS["anh_lon"];
								$xoa_lon=$HTTP_POST_VARS["xoa_lon"];
								if($anh_lon!="")
									 {
									 $anh_lon_rename=$id;
									 $anh_lon_rename.="_1.".$ext_lon;
									 }
								else
								  {
								  if($xoa_lon==1)
									 {
									  delete_file("$path/$anh_lon_rename");
									  $anh_lon_rename="";
									 }
								  }
								  
								if($anh_lon!="")
									{
									 if (in_array($_FILES['userfile_lon']['type'],$imgarray))
									 move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
									 if($HTTP_POST_VARS["anh_lon"]!="")
										  {
										  delete_file("$path/$anh_lon_rename");
										  }
									$thumbnail_lon=$_POST["thumbnail_lon"];
									if(($thumbnail_lon==1)||($thumbnail_lon==2))
										{
										  $source_file = "$path/$anh_lon";
										  $destination_file = "$path/$anh_lon_rename";
										  $width = $_POST["width_lon"];
										  $height = $_POST["height_lon"];
										  $type = $_FILES['userfile_lon']['type'];
										  if($thumbnail_lon==1)
										  {
										  if(($width=="")&&($height!=""))
											thumbnaily($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height==""))
											thumbnailx($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height!=""))
											thumbnailxy($source_file,$destination_file,$type,$width,$height);
										  }
										  else
											thumbnail_cut($source_file,$destination_file,$type,$width,$height);
										  
										  delete_file("$path/$anh_lon");
										 }
										 
									if($thumbnail_lon==0)
										 {
										 rename("$path/$anh_lon","$path/$anh_lon_rename");
										 }							 
									}

			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n; 
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio' ";	
							else
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}					
								
				if($save=="edit_news_3_images_4_noi_dung")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								delete_file("$path/$anh_nho_rename");
								rename("$path/$anh_nho","$path/$anh_nho_rename");
								}
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.jpg";
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								delete_file("$path/$anh_rename");
								rename("$path/$anh","$path/$anh_rename");
								}
							
								///dfgsdfsdfasdf
								$anh_lon=$HTTP_POST_FILES['userfile_lon']['name']; 
								$anh_lon_rename=$HTTP_POST_VARS["anh_lon"];
								$xoa_lon=$HTTP_POST_VARS["xoa_lon"];
								if($anh_lon!="")
									 {
									 $anh_lon_rename=$id;
									 $anh_lon_rename.="_1.jpg";
									 }
								else
								  {
								  if($xoa_lon==1)
									 {
									  delete_file("$path/$anh_lon_rename");
									  $anh_lon_rename="";
									 }
								  }
								  
								if($anh_lon!="")
									{
									 if (in_array($_FILES['userfile_lon']['type'],$imgarray))
									 move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
									 delete_file("$path/$anh_lon_rename");
									 rename("$path/$anh_lon","$path/$anh_lon_rename");
									}

			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							
							
							$mo_ta_1 = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$mo_ta_1 =chuan_php("$mo_ta_1");
							
							$mo_ta_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$mo_ta_2 =chuan_php("$mo_ta_2");
							
							$noi_dung_1 = stripslashes($HTTP_POST_VARS["noi_dung_1"]);
							$noi_dung_1 =chuan_php("$noi_dung_1");
							
							$noi_dung_2 = stripslashes($HTTP_POST_VARS["noi_dung_2"]);
							$noi_dung_2 =chuan_php("$noi_dung_2");

							
							$table="tb_news";
						
							switch($lg)
							{
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$mo_ta_1',mo_ta_1_vn='$mo_ta_2',noi_dung_vn='$noi_dung_1',noi_dung_1_vn='$noi_dung_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$mo_ta_1',mo_ta_1_eg='$mo_ta_2',noi_dung_eg='$noi_dung_1',noi_dung_1_eg='$noi_dung_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$mo_ta_1',mo_ta_1_kr='$mo_ta_2',noi_dung_kr='$noi_dung_1',noi_dung_1_kr='$noi_dung_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$mo_ta_1',mo_ta_1_vn='$mo_ta_2',noi_dung_vn='$noi_dung_1',noi_dung_1_vn='$noi_dung_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0' ";	
									break;
							}
						
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}
			   
				if($save=="edit_product")
							{
							    		$path_root=lay_path_root("local");
										$path=$path_root."images/photo";
										$path_movie=$path_root."images/movie";
										
										$id=$HTTP_GET_VARS{"id"};
										$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
										$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
										$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
										if($anh_nho!="")
											 {
											 $anh_nho_rename=$id;
											 $anh_nho_rename.=".jpg";
											 }
										else
										  {
										  if($xoa_nho==1)
											 {
											  delete_file("$path/$anh_nho_rename");
											  $anh_nho_rename="";
											 }
										  }
										if($anh_nho!="")
											{
											if (in_array($_FILES['userfile_nho']['type'],$imgarray))
											move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
											delete_file("$path/$anh_nho_rename");
											rename("$path/$anh_nho","$path/$anh_nho_rename");
											}
											
										$anh=$HTTP_POST_FILES['userfile']['name']; 
										$anh_rename=$HTTP_POST_VARS["anh"];
										$xoa=$HTTP_POST_VARS["xoa"];
										if($anh!="")
											 {
											 $anh_rename=$id;
											 $anh_rename.="_.jpg";
											 }
										else
										  {
										  if($xoa==1)
											 {
											  delete_file("$path/$anh_rename");
											  $anh_rename="";
											 }
										  }
										if($anh!="")
											{
											if (in_array($_FILES['userfile']['type'],$imgarray))
											move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
											delete_file("$path/$anh_rename");
											rename("$path/$anh","$path/$anh_rename");
											}
										///dfgsdfsdfasdf
										$anh_lon=$HTTP_POST_FILES['userfile_lon']['name']; 
										$anh_lon_rename=$HTTP_POST_VARS["anh_lon"];
										$xoa_lon=$HTTP_POST_VARS["xoa_lon"];
										if($anh_lon!="")
											 {
											 $anh_lon_rename=$id;
											 $anh_lon_rename.="__.jpg";
											 }
										else
										  {
										  if($xoa_lon==1)
											 {
											  if(is_file("$path/$anh_lon_rename"))
												 unlink("$path/$anh_lon_rename");
											  $anh_lon_rename="";
											 }
										  }
										  
										if($anh_lon!="")
											{
											 if (in_array($_FILES['userfile_lon']['type'],$imgarray))
											 move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
											 delete_file("$path/$anh_lon_rename");
											 rename("$path/$anh_lon","$path/$anh_lon_rename");
											}
																		
										$movie=$HTTP_POST_FILES['movie']['name']; 
										$movie_rename=$HTTP_POST_VARS["movie_name"];
										$xoa_movie=$HTTP_POST_VARS["xoa_movie"];
										if($movie!="")
											 {
											 $movie_rename=$id.".wmv";
											 }
										else
										  {
										  if($xoa_movie==1)
											 {
											  delete_file("$path_movie/$movie_rename");
											  $movie_rename="";
											 }
										  }
										
										if($movie!="")
											{
											if (in_array($_FILES['movie']['type'],$imgarray))
											move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
											delete_file("$path_movie/$movie_rename");
											rename("$path_movie/$movie","$path_movie/$movie_rename");
											}

										$start=$HTTP_GET_VARS{"start"};
										$cat=$HTTP_POST_VARS["cat"];
										$bac = $HTTP_POST_VARS['bac'];
										$lg = $HTTP_POST_VARS['lg'];
													
										include("inc/inc_cat.php");										
										$ngay_df=date('m/d/y');
										$gio_df=date("g:i a");
										$ngay_n=rep($HTTP_POST_VARS{"ngay"});
										$gio_n=rep($HTTP_POST_VARS{"gio"});
										if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
										if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
										$ten = stripslashes($HTTP_POST_VARS["ten"]);
										$ten=chuan_php($ten);
										$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
										$ghi_chu=chuan_php($ghi_chu);
										$color = $HTTP_POST_VARS["chon_color"];
										$product_color = substr($color,0,strlen($color)-1);
									   
										$size = $HTTP_POST_VARS["chon_size"];
										$product_size = substr($size,0,strlen($size)-1);
										
										$made = $HTTP_POST_VARS["chon_made"];
										$product_made = substr($made,0,strlen($made)-1);
										
										$product_code = $HTTP_POST_VARS["product_code"];
										$product_price = $HTTP_POST_VARS["product_price"];
										$product_quality = $HTTP_POST_VARS["product_quality"];
										$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
										$product_status = $HTTP_POST_VARS["product_status"];
										
										$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
										$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
										$noidung =chuan_php("$noidung");
										
										$table="tb_product";
										switch($lg){
											case "vn":
												$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',
												product_color='$product_color',
												product_size='$product_size',
												product_made='$product_made',
												product_code='$product_code',
												product_price='$product_price',
												product_quality='$product_quality',
												product_sell_off='$product_sell_off',
												product_status='$product_status',
mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
												break;
											case "eg":
												$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',
												product_color='$product_color',
												product_size='$product_size',
												product_made='$product_made',
												product_code='$product_code',
												product_price='$product_price',
												product_quality='$product_quality',
												product_sell_off='$product_sell_off',
												product_status='$product_status',
												mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
												break;
											case "kr":
												$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',
												product_color='$product_color',
												product_size='$product_size',
												product_made='$product_made',
												product_code='$product_code',
												product_price='$product_price',
												product_quality='$product_quality',
												product_sell_off='$product_sell_off',
												product_status='$product_status',
												mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
												break;
											default:
												$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',
												product_color='$product_color',
												product_size='$product_size',
												product_made='$product_made',
												product_code='$product_code',
												product_price='$product_price',
												product_quality='$product_quality',
												product_sell_off='$product_sell_off',
												product_status='$product_status',
												mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_lon_rename',movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
												break;
										}
										
										$query .= "WHERE id =$id";
										if($result = mysql_query($query))
										echo "$update_completed<br><br>";
							
							
					}
					
				if($save=="edit_product_2_images")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
									{
									 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
									 delete_file("$path/$anh_nho");
									}
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
								{
								 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
								 delete_file("$path/$anh");
								}
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
										
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$product_type = $HTTP_POST_VARS["product_type"];
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_price_note = $HTTP_POST_VARS["product_price_note"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							$product_nguyen_hop = $HTTP_POST_VARS["product_nguyen_hop"];
							$product_bao_hanh = $HTTP_POST_VARS["product_bao_hanh"];
							$product_visitors = $HTTP_POST_VARS["product_visitors"];
							$product_khuyen_mai = $HTTP_POST_VARS["product_khuyen_mai"];
							$product_tien_nghi = $HTTP_POST_VARS["chon_service"];
							$product_thang_gia = $HTTP_POST_VARS["product_thang_gia"];
							$product_nam_san_xuat = $HTTP_POST_VARS["product_nam_san_xuat"];
							$product_catalog = $HTTP_POST_VARS["product_catalog"];
							$product_ho_tro = $HTTP_POST_VARS["product_ho_tro"];
							$product_cho_ngoi = $HTTP_POST_VARS["product_cho_ngoi"];												
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_product";
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_price_note_$lg='$product_price_note',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									product_nguyen_hop_$lg='$product_nguyen_hop',
									product_bao_hanh_$lg='$product_bao_hanh',
									product_visitors='$product_visitors',
									product_khuyen_mai_$lg='$product_khuyen_mai',
									product_tien_nghi_$lg='$product_tien_nghi',
									product_thang_gia='$product_thang_gia',
									product_nam_san_xuat='$product_nam_san_xuat',
									product_catalog='$product_catalog',
									product_ho_tro_$lg='$product_ho_tro',
									product_cho_ngoi='$product_cho_ngoi',
			mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
							$cat=$HTTP_POST_VARS["cat"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";

					}
				if($save=="edit_product_2_images_da_catalog")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{ 
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
								 delete_file("$path/$anh_nho");
								}
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
							{
							 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
							 delete_file("$path/$anh");
							}
								 
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
							
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
										
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$product_type = $HTTP_POST_VARS["product_type"];
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_product";
					
							$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
			mo_ta_$lg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	

							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							if($table=="tb_product")
							{
								if($suid==1)
								$query_2 = "UPDATE tb_product_da_catalog SET activate_='0',activate='0' WHERE id_product=$id ";
								else
								$query_2 = "UPDATE tb_product_da_catalog SET activate_='0' WHERE id_product=$id ";
								$result_2 = mysql_query($query_2);
							}
							
							
							$list_catalog = "|".$_POST["list_catalog"];
							
							$i=0; 
							$dem=0;
							$myLength = strlen($list_catalog);
							for ( $i = 0; $i < $myLength; ++$i )
								{   
									$ch = $list_catalog{$i};
									if($ch=="|") $dem++;
								}
							
							for ( $i = 1; $i <$dem; ++$i )
							  {   
							  $product=lay_id($list_catalog,$i);
							  $ma_bac_1=lay_product($product,1);
							  $ma_bac_2=lay_product($product,2);
							  $ma_bac_3=lay_product($product,3);
							  $ma_bac_4=lay_product($product,4);
							  $ma_bac_5=lay_product($product,5);
							  $num=dem_max_6dk("tb_product_da_catalog","ma_bac_1",$ma_bac_1,"ma_bac_2",$ma_bac_2,"ma_bac_3",$ma_bac_3,"ma_bac_4",$ma_bac_4,"ma_bac_5",$ma_bac_5,"id_product",$id);
							  if($num==0)
								  {
									$sql="insert into tb_product_da_catalog(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,id_product,thu_tu,activate_,activate)";
									$sql .=" values('";			
									$sql .=rep($ma_bac_1)."','";
									$sql .=rep($ma_bac_2)."','";
									$sql .=rep($ma_bac_3)."','";
									$sql .=rep($ma_bac_4)."','";
									$sql .=rep($ma_bac_5)."','";	
									$sql .=$id."','";	
									$sql .='0'."','"; 
									$sql .='0'."','"; 
									$sql .='0'."')";
									$result = mysql_query($sql);
								}
							 }
							
							$list_catalog_ko_select = "|".$_POST["list_catalog_ko_select"];
							
							$i=0; 
							$dem=0;
							$myLength = strlen($list_catalog_ko_select);
							for ( $i = 0; $i < $myLength; ++$i )
								{   
									$ch = $list_catalog_ko_select{$i};
									if($ch=="|") $dem++;
								}
							
							for ( $i = 1; $i <$dem; ++$i )
							  {   
							  $product=lay_id($list_catalog_ko_select,$i);
							  
							  $ma_bac_1=lay_product($product,1);
							  $ma_bac_2=lay_product($product,2);
							  $ma_bac_3=lay_product($product,3);
							  $ma_bac_4=lay_product($product,4);
							  $ma_bac_5=lay_product($product,5);

									$query = "DELETE FROM tb_product_da_catalog ";
									$query .= "WHERE ma_bac_1=$ma_bac_1 and ma_bac_2=$ma_bac_2 and ma_bac_3=$ma_bac_3 and ma_bac_4=$ma_bac_4 and ma_bac_5=$ma_bac_5 and id_product=$id ";
									$result = mysql_query($query);
							 }

							
							$cat=$HTTP_POST_VARS["cat"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";

					}
				if($save=="edit_product_2_images_da_catalog_6nd")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
								 delete_file("$path/$anh_nho");
								}
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
							{
							 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
							 delete_file("$path/$anh");
							}
								 
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
							
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
										
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$product_type = $HTTP_POST_VARS["product_type"];
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$noidung_2 = stripslashes($HTTP_POST_VARS["noi_dung_2"]);
							$noidung_2 =chuan_php("$noidung_2");

							$noidung_3 = stripslashes($HTTP_POST_VARS["noi_dung_3"]);
							$noidung_3 =chuan_php("$noidung_3");

							$noidung_4 = stripslashes($HTTP_POST_VARS["noi_dung_4"]);
							$noidung_4 =chuan_php("$noidung_4");

							$noidung_5 = stripslashes($HTTP_POST_VARS["noi_dung_5"]);
							$noidung_5 =chuan_php("$noidung_5");

							$noidung_6 = stripslashes($HTTP_POST_VARS["noi_dung_6"]);
							$noidung_6 =chuan_php("$noidung_6");

							$table="tb_product";
					
							$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_$lg='$ten',ghi_chu_$lg='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_$lg='$noidung',
									mo_ta_1_$lg='$noidung_2',
									mo_ta_2_$lg='$noidung_3',
									mo_ta_3_$lg='$noidung_4',
									mo_ta_4_$lg='$noidung_5',
									mo_ta_5_$lg='$noidung_6',
			thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	

							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							if($table=="tb_product")
							{
								if($suid==1)
								$query_2 = "UPDATE tb_product_da_catalog SET activate_='0',activate='0' WHERE id_product=$id ";
								else
								$query_2 = "UPDATE tb_product_da_catalog SET activate_='0' WHERE id_product=$id ";
								$result_2 = mysql_query($query_2);
							}
							
							
							$list_catalog = "|".$_POST["list_catalog"];
							
							$i=0; 
							$dem=0;
							$myLength = strlen($list_catalog);
							for ( $i = 0; $i < $myLength; ++$i )
								{   
									$ch = $list_catalog{$i};
									if($ch=="|") $dem++;
								}
							
							for ( $i = 1; $i <$dem; ++$i )
							  {   
							  $product=lay_id($list_catalog,$i);
							  $ma_bac_1=lay_product($product,1);
							  $ma_bac_2=lay_product($product,2);
							  $ma_bac_3=lay_product($product,3);
							  $ma_bac_4=lay_product($product,4);
							  $ma_bac_5=lay_product($product,5);
							  $num=dem_max_6dk("tb_product_da_catalog","ma_bac_1",$ma_bac_1,"ma_bac_2",$ma_bac_2,"ma_bac_3",$ma_bac_3,"ma_bac_4",$ma_bac_4,"ma_bac_5",$ma_bac_5,"id_product",$id);
							  if($num==0)
								  {
									$sql="insert into tb_product_da_catalog(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,id_product,thu_tu,activate_,activate)";
									$sql .=" values('";			
									$sql .=rep($ma_bac_1)."','";
									$sql .=rep($ma_bac_2)."','";
									$sql .=rep($ma_bac_3)."','";
									$sql .=rep($ma_bac_4)."','";
									$sql .=rep($ma_bac_5)."','";	
									$sql .=$id."','";	
									$sql .='0'."','"; 
									$sql .='0'."','"; 
									$sql .='0'."')";
									$result = mysql_query($sql);
								}
							 }
							
							$list_catalog_ko_select = "|".$_POST["list_catalog_ko_select"];
							
							$i=0; 
							$dem=0;
							$myLength = strlen($list_catalog_ko_select);
							for ( $i = 0; $i < $myLength; ++$i )
								{   
									$ch = $list_catalog_ko_select{$i};
									if($ch=="|") $dem++;
								}
							
							for ( $i = 1; $i <$dem; ++$i )
							  {   
							  $product=lay_id($list_catalog_ko_select,$i);
							  
							  $ma_bac_1=lay_product($product,1);
							  $ma_bac_2=lay_product($product,2);
							  $ma_bac_3=lay_product($product,3);
							  $ma_bac_4=lay_product($product,4);
							  $ma_bac_5=lay_product($product,5);

									$query = "DELETE FROM tb_product_da_catalog ";
									$query .= "WHERE ma_bac_1=$ma_bac_1 and ma_bac_2=$ma_bac_2 and ma_bac_3=$ma_bac_3 and ma_bac_4=$ma_bac_4 and ma_bac_5=$ma_bac_5 and id_product=$id ";
									$result = mysql_query($query);
							 }

							
							$cat=$HTTP_POST_VARS["cat"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";

					}
					
					if($save=="edit_product_2_images_type_01")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
								{
								 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
								 delete_file("$path/$anh_nho");
								}
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
							{
							 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
							 delete_file("$path/$anh");
							}
								 
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
							
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
										
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$product_type = $HTTP_POST_VARS["product_type"];
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							
							$product_catalog = $HTTP_POST_VARS["product_catalog"];
							$product_collection = $HTTP_POST_VARS["product_collection"];

							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_product";
					
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',
									product_industry_01='$product_catalog',
									product_industry_02='$product_collection',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
			mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',
									product_industry_01='$product_catalog',
									product_industry_02='$product_collection',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',
									product_industry_01='$product_catalog',
									product_industry_02='$product_collection',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',
									product_industry_01='$product_catalog',
									product_industry_02='$product_collection',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
							$cat=$HTTP_POST_VARS["cat"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";

					}
										
				if($save=="edit_product_2_images_3_noi_dung")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
									{
									 thumb($thumbnail,$_POST["width"],$_POST["height"],$_FILES['userfile_nho']['type'],"$path/$anh_nho","$path/$anh_nho_rename");
									 delete_file("$path/$anh_nho");
									}
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
								{
								 thumb($thumbnail_lon,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
								 delete_file("$path/$anh");
								}
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
										
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$product_type = $HTTP_POST_VARS["product_type"];
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$noidung =chuan_php("$noidung");
							
							$noidung_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$noidung_2 =chuan_php("$noidung_2");

							$noidung_3 = stripslashes($HTTP_POST_VARS["mo_ta_3"]);
							$noidung_3 =chuan_php("$noidung_3");
							
							$table="tb_product";
								switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_vn='$noidung',
									mo_ta_1_vn='$noidung_2',
									mo_ta_2_vn='$noidung_3',
									thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_eg='$noidung',
									mo_ta_1_eg='$noidung_2',
									mo_ta_2_eg='$noidung_3',
									thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_kr='$noidung',
									mo_ta_1_kr='$noidung_2',
									mo_ta_2_kr='$noidung_3',
									thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',
									product_type='$product_type',
									product_code='$product_code',
									product_price='$product_price',
									product_quality='$product_quality',
									product_sell_off='$product_sell_off',
									product_status='$product_status',
									product_mark='$product_mark',
									mo_ta_vn='$noidung',
									mo_ta_1_vn='$noidung_2',
									mo_ta_2_vn='$noidung_3',
									thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
							$cat=$HTTP_POST_VARS["cat"];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";

					}
					if($save=="banner"){
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];

							$id=$HTTP_GET_VARS{"id"};
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_old=$HTTP_POST_VARS["anh"];
							$anh_rename=$HTTP_POST_VARS["anh"];
							$type = gia_tri_mot_cot("tb_news","id",$id,"type");
							
						
							if($anh!="")
							  {
							   $ext= lay_ext($anh);
							   $anh_rename=$id."_".$lg.".".$ext;
								if(($ext=="swf")||($ext=="SWF"))
								   $type = 1;
								else
								   $type = 0;
							  }
							   
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							if($anh!="")
							{ 
							 if (in_array($_FILES['userfile']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							  //unlink("$path/$anh_old");
							  delete_file("$path/$anh_old");
							  rename("$path/$anh","$path/$anh_rename");
							}
			
							
							include("inc/inc_cat.php");
							
							$ngay_vn=date('m/d/y');
							$gio=date("g:i a");
							$ten=rep($HTTP_POST_VARS{"ten"});
							$mo_ta=rep($HTTP_POST_VARS{"mo_ta"});
							$target=rep($HTTP_POST_VARS{"target"});
							$ghi_chu=rep($HTTP_POST_VARS{"ghi_chu"});
										
							$table="tb_news";
							if($lg=="vn")
							    $query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',mo_ta_vn='$mo_ta',target_vn='$target',ghi_chu_vn='$ghi_chu',type='$type',anh_nho='$anh_rename',ngay='$ngay_vn',gio='$gio'";	
							if($lg=="eg")
							    $query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',mo_ta_eg='$mo_ta',target_eg='$target',ghi_chu_eg='$ghi_chu',type='$type',anh='$anh_rename',ngay='$ngay_vn',gio='$gio'";	
							if($lg=="kr")
							    $query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',mo_ta_kr='$mo_ta',target_kr='$target',ghi_chu_kr='$ghi_chu',type='$type',anh_nho_1='$anh_rename',ngay='$ngay_vn',gio='$gio'";	
							
							$query .= "WHERE id = $id ";
							if($result = mysql_query($query))
							echo "$update_completed";
			
					}
					
				if($save=="edit_weblink")
							{
						
							$id=$HTTP_GET_VARS{"id"};
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							
							$table="tb_news";

							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
					}					
					
				if($save=="edit_news_0_images")
							{
						
							$id=$HTTP_GET_VARS{"id"};
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
			
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
			
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio' ";	
									break;
							}
							else
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
					}
					
				if($save=="edit_news_1_images")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  if(is_file("$path/$anh_nho_rename"))
									unlink("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								 if($HTTP_POST_VARS["anh_nho"]!="")
								  {
									delete_file("$path/$anh_nho_rename");
								  }
									$thumbnail=$_POST["thumbnail"];
									if(($thumbnail==1)||($thumbnail==2))
										{
										  $source_file = "$path/$anh_nho";
										  $destination_file = "$path/$anh_nho_rename";
										  $width = $_POST["width"];
										  $height = $_POST["height"];
										  $type = $_FILES['userfile_nho']['type'];
										  if($thumbnail==1)
										  {
										  if(($width=="")&&($height!=""))
											thumbnaily($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height==""))
											thumbnailx($source_file,$destination_file,$type,$width,$height);
										  if(($width!="")&&($height!=""))
											thumbnailxy($source_file,$destination_file,$type,$width,$height);
										  }
										  else
											thumbnail_cut($source_file,$destination_file,$type,$width,$height);
										  
										  delete_file("$path/$anh_nho");
										 }
										 
									if($thumbnail==0)
										 {
										 rename("$path/$anh_nho","$path/$anh_nho_rename");
										 }
								}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
			
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
			
							
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							if($suid==1)
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio' ";	
									break;
							}
							else
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
							
					}
				if($save=="edit_news_2_images_2_noi_dung")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								delete_file("$path/$anh_nho_rename");
								rename("$path/$anh_nho","$path/$anh_nho_rename");
								}
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.jpg";
								 }
							else
							  {
							  if($xoa==1)
								 {
								  if(is_file("$path/$anh_rename"))
									 unlink("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
 								delete_file("$path/$anh_rename");
								rename("$path/$anh","$path/$anh_rename");
								}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							
							$mo_ta_1 = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$mo_ta_1 =chuan_php("$mo_ta_1");
							
							$mo_ta_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$mo_ta_2 =chuan_php("$mo_ta_2");
							
							
							$table="tb_news";

							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$mo_ta_1',mo_ta_1_vn='$mo_ta_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$mo_ta_1',mo_ta_1_eg='$mo_ta_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$mo_ta_1',mo_ta_1_kr='$mo_ta_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$mo_ta_1',mo_ta_1_vn='$mo_ta_2',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br>";
					}
								
				if($save=="edit_news_2_images")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								delete_file("$path/$anh_nho_rename");
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
									{
									  $source_file = "$path/$anh_nho";
									  $destination_file = "$path/$anh_nho_rename";
									  $width = $_POST["width"];
									  $height = $_POST["height"];
									  $type = $_FILES['userfile_nho']['type'];
									  if($thumbnail==1)
									  {
									  if(($width=="")&&($height!=""))
										thumbnaily($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height==""))
										thumbnailx($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height!=""))
										thumbnailxy($source_file,$destination_file,$type,$width,$height);
									  }
									  else
										thumbnail_cut($source_file,$destination_file,$type,$width,$height);
									  
									  delete_file("$path/$anh_nho");
									 }
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
								{
								  $source_file = "$path/$anh";
								  $destination_file = "$path/$anh_rename";
								  $width = $_POST["width_lon"];
								  $height = $_POST["height_lon"];
								  $type_lon = $_FILES['userfile']['type'];
								  if($thumbnail_lon==1)
								  {
								  if(($width=="")&&($height!=""))
								    thumbnaily($source_file,$destination_file,$type,$width,$height);
								  if(($width!="")&&($height==""))
								    thumbnailx($source_file,$destination_file,$type,$width,$height);
								  if(($width!="")&&($height!=""))
								    thumbnailxy($source_file,$destination_file,$type,$width,$height);
								  }
								  else
								    thumbnail_cut($source_file,$destination_file,$type,$width,$height);
								  
								  delete_file("$path/$anh");
								 }
								 
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
 
 							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;	
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_news";
							
						
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							     }
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}
				if($save=="edit_news_2_images_gallery")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							$id=$HTTP_GET_VARS{"id"};
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".".$ext_nho;
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  delete_file("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								delete_file("$path/$anh_nho_rename");
								$thumbnail=$_POST["thumbnail"];
								if(($thumbnail==1)||($thumbnail==2))
									{
									  $source_file = "$path/$anh_nho";
									  $destination_file = "$path/$anh_nho_rename";
									  $width = $_POST["width"];
									  $height = $_POST["height"];
									  $type = $_FILES['userfile_nho']['type'];
									  if($thumbnail==1)
									  {
									  if(($width=="")&&($height!=""))
										thumbnaily($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height==""))
										thumbnailx($source_file,$destination_file,$type,$width,$height);
									  if(($width!="")&&($height!=""))
										thumbnailxy($source_file,$destination_file,$type,$width,$height);
									  }
									  else
										thumbnail_cut($source_file,$destination_file,$type,$width,$height);
									  
									  delete_file("$path/$anh_nho");
									 }
									 
								if($thumbnail==0)
									 {
									 rename("$path/$anh_nho","$path/$anh_nho_rename");
									 }
						   }
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.".$ext;
								 }
							else
							  {
							  if($xoa==1)
								 {
								  delete_file("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								 if($HTTP_POST_VARS["anh"]!="")
									  {
									  delete_file("$path/$anh_rename");
									  }
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
								{
								  $source_file = "$path/$anh";
								  $destination_file = "$path/$anh_rename";
								  $width = $_POST["width_lon"];
								  $height = $_POST["height_lon"];
								  $type_lon = $_FILES['userfile']['type'];
								  if($thumbnail_lon==1)
								  {
								  if(($width=="")&&($height!=""))
								    thumbnaily($source_file,$destination_file,$type,$width,$height);
								  if(($width!="")&&($height==""))
								    thumbnailx($source_file,$destination_file,$type,$width,$height);
								  if(($width!="")&&($height!=""))
								    thumbnailxy($source_file,$destination_file,$type,$width,$height);
								  }
								  else
								    thumbnail_cut($source_file,$destination_file,$type,$width,$height);
								  
								  delete_file("$path/$anh");
								 }
								 
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
					    	}
 
 							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");										
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;	
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							
							$table="tb_news";
							
						
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							     }
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}
								   
				if($save=="edit_product_6_images")
							{
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							$path_movie=$path_root."images/movie";
							
							$id=$HTTP_GET_VARS{"id"};
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh_nho_rename=$HTTP_POST_VARS["anh_nho"];
							$xoa_nho=$HTTP_POST_VARS["xoa_nho"];
							
							
							if($anh_nho!="")
								 {
								 $anh_nho_rename=$id;
								 $anh_nho_rename.=".jpg";
								 }
							else
							  {
							  if($xoa_nho==1)
								 {
								  if(is_file("$path/$anh_nho_rename"))
									unlink("$path/$anh_nho_rename");
								  $anh_nho_rename="";
								 }
							  }
							if($anh_nho!="")
								{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
								delete_file("$path/$anh_nho_rename");
								rename("$path/$anh_nho","$path/$anh_nho_rename");
								}
								
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$HTTP_POST_VARS["anh"];
							$xoa=$HTTP_POST_VARS["xoa"];
							if($anh!="")
								 {
								 $anh_rename=$id;
								 $anh_rename.="_.jpg";
								 }
							else
							  {
							  if($xoa==1)
								 {
								  if(is_file("$path/$anh_rename"))
									 unlink("$path/$anh_rename");
								  $anh_rename="";
								 }
							  }
							if($anh!="")
								{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
   								delete_file("$path/$anh_rename");
								 rename("$path/$anh","$path/$anh_rename");
								}
							
							//hinh 1
							$anh_nho_1=$HTTP_POST_FILES['userfile_nho_1']['name']; 
							$anh_nho_1_rename=$HTTP_POST_VARS["anh_nho_1"];
							$xoa_nho_1=$HTTP_POST_VARS["xoa_nho_1"];
							if($anh_nho_1!="")
								 {
								 $anh_nho_1_rename=$id."_1.jpg";
								 }
							else
							  {
							  if($xoa_nho_1==1)
								 {
								   delete_file("$path/$anh_nho_1_rename");
								  $anh_nho_1_rename="";
								 }
							  }
							if($anh_nho_1!="")
								{
								if (in_array($_FILES['userfile_nho_1']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho_1']['tmp_name'], "$path/$anh_nho_1");
 								delete_file("$path/$anh_nho_1_rename");
								 rename("$path/$anh_nho_1","$path/$anh_nho_1_rename");
								}
								
							$anh_1=$HTTP_POST_FILES['userfile_1']['name']; 
							$anh_1_rename=$HTTP_POST_VARS["anh_1"];
							$xoa_1=$HTTP_POST_VARS["xoa_1"];
							if($anh_1!="")
								 {
								 $anh_1_rename=$id."_1_.jpg";
								 }
							else
							  {
							  if($xoa_1==1)
								 {
							      delete_file("$path/$anh_1_rename");
								  $anh_1_rename="";
								 }
							  }
							if($anh_1!="")
								{
								if (in_array($_FILES['userfile_1']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
								delete_file("$path/$anh_1_rename");
								rename("$path/$anh_1","$path/$anh_1_rename");
								}
							//end hinh 1
							
							//hinh 2
							$anh_nho_2=$HTTP_POST_FILES['userfile_nho_2']['name']; 
							$anh_nho_2_rename=$HTTP_POST_VARS["anh_nho_2"];
							$xoa_nho_2=$HTTP_POST_VARS["xoa_nho_2"];
							if($anh_nho_2!="")
								 {
								 $anh_nho_2_rename=$id."_2.jpg";
								 }
							else
							  {
							  if($xoa_nho_2==1)
								 {
								 delete_file("$path/$anh_nho_2_rename");
								 $anh_nho_2_rename="";
								 }
							  }
							if($anh_nho_2!="")
								{
								 if (in_array($_FILES['userfile_nho_2']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_nho_2']['tmp_name'], "$path/$anh_nho_2");
								  delete_file("$path/$anh_nho_2_rename");
								 rename("$path/$anh_nho_2","$path/$anh_nho_2_rename");
								}
								
							$anh_2=$HTTP_POST_FILES['userfile_2']['name']; 
							$anh_2_rename=$HTTP_POST_VARS["anh_2"];
							$xoa_2=$HTTP_POST_VARS["xoa_2"];
							if($anh_2!="")
								 {
								 $anh_2_rename=$id."_2_.jpg";
								 }
							else
							  {
							  if($xoa_2==1)
								 {
								  delete_file("$path/$anh_2_rename");
								  $anh_2_rename="";
								 }
							  }
							if($anh_2!="")
								{
								if (in_array($_FILES['userfile_2']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['userfile_2']['tmp_name'], "$path/$anh_2");
 								 delete_file("$path/$anh_2_rename");
								 rename("$path/$anh_2","$path/$anh_2_rename");
								}
							//end hinh 2
			
							$movie=$HTTP_POST_FILES['movie']['name']; 
							$movie_rename=$HTTP_POST_VARS["movie_name"];
							$xoa_movie=$HTTP_POST_VARS["xoa_movie"];
							if($movie!="")
								 {
								 $movie_rename=$id.".wmv";
								 }
							else
							  {
							  if($xoa_movie==1)
								 {
								   delete_file("$path_movie/$movie_rename");
								  $movie_rename="";
								 }
							  }
							
							if($movie!="")
								{
								 if (in_array($_FILES['movie']['type'],$imgarray))
								 move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
							     delete_file("$path_movie/$movie_rename");
								 rename("$path_movie/$movie","$path_movie/$movie_rename");
								}
			
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_POST_VARS["cat"];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];
							include("inc/inc_cat.php");					
												
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$thu_tu=rep($HTTP_POST_VARS{"thu_tu"});
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							$table="tb_product";
							if($suid==1)
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',
									anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',
									anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename', anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename', anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename', anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio' ";	
									break;
							}
							else
							switch($lg){
								case "vn":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_vn='$ten',ghi_chu_vn='$ghi_chu',mo_ta_vn='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename', anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "eg":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_eg='$ten',ghi_chu_eg='$ghi_chu',mo_ta_eg='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename', anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								case "kr":
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten_kr='$ten',ghi_chu_kr='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename',anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename',ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
								default:
									$query = "UPDATE $table SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ten='$ten',ghi_chu='$ghi_chu',mo_ta_kr='$noidung',thu_tu='$thu_tu',anh_nho='$anh_nho_rename',anh='$anh_rename',anh_nho_1='$anh_nho_1_rename',anh_1='$anh_1_rename,anh_nho_2='$anh_nho_2_rename',anh_2='$anh_2_rename', movie_vn='$movie_rename', ngay='$ngay',gio='$gio',activate='0',activate_='0'";	
									break;
							}
							
							
							$query .= "WHERE id =$id";
							if($result = mysql_query($query))
							echo "$update_completed<br><br>";
					}
					
				if($save=="chuyen_baiviet")
						{
							$id=$HTTP_GET_VARS{"id"};
							$id=str_replace (",", "','", $id);
							$lg=$HTTP_GET_VARS["lg"];
							$cat_s_s_s_s = $HTTP_POST_VARS['ma_bac_5'];
							if($cat_s_s_s_s!=0)
								$bac=5;
							 else
								$bac = $HTTP_POST_VARS['bac'];
								
							$start=$HTTP_GET_VARS{"start"};
							$cat=$HTTP_GET_VARS{"cat"};
							include("inc/inc_return_page.php");
							
							switch($bac){
								case '1':
									$cat = $HTTP_GET_VARS["cat"];
									$cat_s = '0';
									$cat_s_s = '0';
									$cat_s_s_s = '0';
									$cat_s_s_s_s = '0';
									break;
								case '2':
									$cat_s = $HTTP_GET_VARS["cat"];
									$cat = gia_tri_mot_cot('tb_bac_2','ma_bac_2',$cat_s,'ma_bac_1');
									$cat_s_s = '0';
									$cat_s_s_s = '0';
									$cat_s_s_s_s = '0';
									break;
								case '3':
									$cat_s_s = $HTTP_GET_VARS["cat"];
									$cat_s = gia_tri_mot_cot('tb_bac_3','ma_bac_3',$cat_s_s,'ma_bac_2');
									$cat = gia_tri_mot_cot('tb_bac_3','ma_bac_3',$cat_s_s,'ma_bac_1');									
									$cat_s_s_s = '0';
									$cat_s_s_s_s = '0';
									break;
								case '4':
									$cat_s_s_s = $HTTP_GET_VARS["cat"];
									$cat_s_s = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_4');
									$cat_s = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_2');
									$cat = gia_tri_mot_cot('tb_bac_4 ','ma_bac_4',$cat_s_s_s,'ma_bac_1');	
									$cat_s_s_s_s = '0';
									break;
								case '5':
									$cat_s_s_s_s = $HTTP_POST_VARS["ma_bac_5"];
									$cat_s_s_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_5');
									$cat_s_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_4');
									$cat_s = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_2');
									$cat = gia_tri_mot_cot('tb_bac_5','ma_bac_5',$cat_s_s_s_s,'ma_bac_1');										
									break;
								default:
									break;
							}
							
							//echo "<br>DAy: $cat, $cat_s, $cat_s_s |||| $bac || $trang<br>";
							
							$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
			
							$ngay_vn=date('m/d/y');
							$gio=date("g:i a");
							
							$query = "UPDATE $tb SET ma_bac_1='$cat',ma_bac_2='$cat_s',ma_bac_3='$cat_s_s',ma_bac_4='$cat_s_s_s',ma_bac_5='$cat_s_s_s_s',ngay='$ngay_vn',gio='$gio'";	
							$query .= "WHERE id in ('$id') ";
							if($result = mysql_query($query))
							echo "$update_completed";
							if($bac=="5")
								 $cat_re=$HTTP_POST_VARS["ma_bac_5"];
							else
								 $cat_re=$HTTP_GET_VARS["cat"];	
								 
							//echo "<meta http-equiv=\"refresh\" content=\"2;url=admin_view_product.php?cat=$cat_re&bac=$bac&start=0&lg=$lg\">";	
							
							$cat=$cat_re;
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
			 }
			 
			if($save=="ma_images") 
			echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_images_ma.php\">";
			if($save=="ma_files") 
			echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_files_ma.php\">";
			if($save=="ma_flash") 
			echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_flash_ma.php\">";
			?>
			<? if($save=="setup"){?> <meta http-equiv="refresh" content="2;url=setup.php"><? }?>	
			<? if($save=="user"){ ?> <meta http-equiv="refresh" content="2;url=admin_user.php?cat=1&start=0&lg=vn&alpha=All">				 <? }?>
			<? if($save=="catalog"){ ?> <meta http-equiv="refresh" content="2;url=<?=$page?>?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			<? if($save=="sort"){ ?>	<meta http-equiv="refresh" content="2;url=index.php?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			<? if($save=="sort_s"){ ?>	<meta http-equiv="refresh" content="2;url=index_2.php?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			<? if($save=="sort_s_s"){ ?><meta http-equiv="refresh" content="2;url=index_3.php?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			<? if($save=="sort_s_s_s"){ ?><meta http-equiv="refresh" content="2;url=index_4.php?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			<? if($save=="sort_s_s_s_s"){ ?><meta http-equiv="refresh" content="2;url=index_5.php?cat=<?=$HTTP_POST_VARS["cat"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			
			
			<? if(($save=="edit_news_0_images")
			||($save=="banner")
			||($save=="edit_weblink")
			||($save=="edit_news_1_images")
			||($save=="edit_files_download")
			||($save=="edit_news_3_images")
			||($save=="edit_news_3_images_gallery")
			||($save=="edit_news_2_images_gallery")
			||($save=="edit_news_3_images_4_noi_dung")
			||($save=="edit_news_2_images_1_movie")
			||($save=="edit_one_page")
			||($save=="edit_lich_chieu")
			||($save=="edit_product")
			||($save=="edit_product_6_images")
			||($save=="edit_news_2_images_2_noi_dung")
			||($save=="edit_news_2_images"))
			{
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_GET_VARS["start"];
				
				include("inc/inc_return_page.php");
				$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
				echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
			
			
			}?>
			<? if(($save=="edit_news_3_images")||($save=="add_product")){?>
			<? if($HTTP_POST_VARS["page"]=="p"){?>
			<meta http-equiv="refresh" content="2;url=admin_view_product.php?cat=<?=$HTTP_POST_VARS["cat"]?>&bac=<?=$HTTP_POST_VARS["bac"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>&start=<?=$HTTP_GET_VARS["start"]?>">
			<? }?>
			<? if($HTTP_POST_VARS["page"]=="p_"){?>
			<meta http-equiv="refresh" content="2;url=admin_view_product_.php?cat=<?=$HTTP_POST_VARS["cat"]?>&&bac=<?=$HTTP_POST_VARS["bac"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>&start=<?=$HTTP_GET_VARS["start"]?>">
			<? }?>
			<? }?>
			
			<? if($save=="loai_dv"){?>	<meta http-equiv="refresh" content="2;url=admin_type_items.php"><? }?>          </td>
			</tr>
			</table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
