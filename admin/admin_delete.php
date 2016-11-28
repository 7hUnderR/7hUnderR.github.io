<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$delete_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><br>
				<?
						$id=$HTTP_GET_VARS["id"]; 
						$path_root=lay_path_root("local");
						$path=$path_root."images/photo";
						$path_upload=path_upload_mannager("images");
						$path_upload_files=path_upload_mannager("files");
						$path_upload_flash=path_upload_mannager("flash");
						
						if($HTTP_GET_VARS["ma_del"]=="setup")
							{
							$id=$HTTP_GET_VARS["id"]; 
							delete("tb_setup","id",$id,"$delete_completed<br>");
							}
						if($HTTP_GET_VARS["ma_del"]=="user")
							{
							$cat=$HTTP_POST_VARS["cat"];
							$alpha=$HTTP_POST_VARS["alpha"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							$items=$HTTP_POST_VARS["items"]; 
							$items = str_replace ("\'", "'", $items);
							delete_db_in("tb_admin","id",$items);
							echo "<br>$delete_completed"; 
							echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_user.php?cat=$cat&alpha=$alpha&start=$start&lg=$lg\">";
							}
						if($HTTP_GET_VARS["ma_del"]=="ma_images")
							{
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];

							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							
							$query = "Select * FROM tb_images WHERE ma_images in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								 { 
								 $ma_images=$rs["ma_images"];
								 $anh=$rs["ten_anh"];
								 delete_file("$path_root/$path_upload/$anh");
								}

							$tb = "tb_images_ma";
							$query = "Select * FROM $tb WHERE ma_images in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								{ 
									$ten_dv=$rs["ten_ma_images"];
									$path=$path_root.$path_upload;
									$newdir=$path."/".$ten_dv;
									rmdir("$newdir");
								}
							delete_db_in("tb_images","ma_images",$items);
							delete_db_in("tb_images_ma","ma_images",$items);
							echo "<br>$delete_completed"; 
							}
						if($HTTP_GET_VARS["ma_del"]=="ma_files")
							{
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];

							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							
							$query = "Select * FROM tb_files WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								 { 
								 $ma_images=$rs["ma_files"];
								 $anh=$rs["ten_files"];
								 delete_file("$path_root/$path_upload_files/$anh");
								}

							$tb = "tb_files_ma";
							$query = "Select * FROM $tb WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								{ 
									$ten_dv=$rs["ten_ma_files"];
									$path=$path_root.$path_upload_files;
									$newdir=$path."/".$ten_dv;
									rmdir("$newdir");
								}
							delete_db_in("tb_files","ma_files",$items);
							delete_db_in("tb_files_ma","ma_files",$items);
							echo "<br>$delete_completed"; 
							}
						if($HTTP_GET_VARS["ma_del"]=="ma_style")
							{
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];

							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							
							$query = "Select * FROM tb_style_site WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								 { 
								 $ma_images=$rs["ma_files"];
								 $anh=$rs["ten_files"];
								 delete_file("$path_root/styles/$anh");
								}

							$tb = "tb_style_site_ma";
							$query = "Select * FROM $tb WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								{ 
									$ten_dv=$rs["ten_ma_files"];
									$path=$path_root."styles";
									$newdir=$path."/".$ten_dv;
									rmdir("$newdir");
								}
							delete_db_in("tb_style_site","ma_files",$items);
							delete_db_in("tb_style_site_ma","ma_files",$items);
							echo "<br>$delete_completed"; 
							}
						
						if($HTTP_GET_VARS["ma_del"]=="ma_flash")
							{
							$cat=$HTTP_POST_VARS["cat"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];

							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							
							$query = "Select * FROM tb_flash WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								 { 
								 $ma_images=$rs["ma_files"];
								 $anh=$rs["ten_files"];
								 delete_file("$path_root/$path_upload_flash/$anh");
								}

							$tb = "tb_flash_ma";
							$query = "Select * FROM $tb WHERE ma_files in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
								{ 
									$ten_dv=$rs["ten_ma_files"];
									$path=$path_root.$path_upload_flash;
									$newdir=$path."/".$ten_dv;
									rmdir("$newdir");
								}
							delete_db_in("tb_flash","ma_files",$items);
							delete_db_in("tb_flash_ma","ma_files",$items);
							echo "<br>$delete_completed"; 
							}
						if($HTTP_GET_VARS["ma_del"]=="loai_dv")
							{
							$id=$HTTP_GET_VARS["id"]; 
							delete("tb_ma_loai_dv","id",$id,"$delete_completed<br>");
							}
						if($HTTP_GET_VARS["ma_del"]=="product")
						{
							echo"$delete_completed";
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							$start=$HTTP_POST_VARS["start"];
							include("inc/inc_return_page.php");
							$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
							
							 if($tb=="tb_news")
							     $path=$path."/news";

							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							//echo $items;

							$query = "Select * FROM $tb WHERE id in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
							{ 
								 delete_file("$path/$rs[anh_nho]");
								 delete_file("$path/$rs[anh]");

								 delete_file("$path/$rs[anh_nho_1]");
								 delete_file("$path/$rs[anh_1]");
								
								 delete_file("$path/$rs[anh_nho_2]");
								 delete_file("$path/$rs[anh_2]");
							
								 delete_file("$path/$rs[movie_vn]");
								 delete_file("$path/$rs[movie_vn]");
								
							}
							 				
							$query = "DELETE FROM $tb WHERE id in ('$items')";
							if($result = mysql_query($query))
							if($tb=="tb_product")
								{
									$query = "DELETE FROM tb_product_da_catalog WHERE id_product in ('$items')";
									$result = mysql_query($query);
								}
							
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
					   }
						   
						if($HTTP_GET_VARS["ma_del"]=="catalog")
							{
							$path_muc=$path_root."images/danh_muc";
							
							$cat=$HTTP_POST_VARS["cat"];
							$bac=$HTTP_POST_VARS["bac"];
							$start=$HTTP_POST_VARS["start"];
							$alpha=$HTTP_POST_VARS["alpha"];
							$lg=$HTTP_POST_VARS["lg"];
							
							$items = $HTTP_POST_VARS["items"];				 
							$items = str_replace ("\'", "'", $items);
							//echo"$items";
							
							if($bac=="1")
							   {
							   $page="index.php";
									// xoa ma_bac_5
									$query = "Select * FROM tb_bac_5 WHERE ma_bac_1 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");
										
										
										$ma_bac_5=$rs["ma_bac_5"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_5 = $ma_bac_5 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
	
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_5",$ma_bac_5,"");
									}
									delete_db_in("tb_bac_5","ma_bac_1","$items");
									 
									// xoa ma_bac_4
								    $query = "Select * FROM tb_bac_4  WHERE ma_bac_1 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_4=$rs["ma_bac_4"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_4 = $ma_bac_4 and ma_bac_5 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_4",$ma_bac_4,"");
										
									}
									delete_db_in("tb_bac_4 ","ma_bac_1","$items");

									// xoa ma_bac_3
								    $query = "Select * FROM tb_bac_3 WHERE ma_bac_1 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_3=$rs["ma_bac_3"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_3 = $ma_bac_3  and ma_bac_4 = 0  ";
											//echo"<br>$query_";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_3",$ma_bac_3,"");
									}
									delete_db_in("tb_bac_3","ma_bac_1","$items");

									// xoa ma_bac_2
								    $query = "Select * FROM tb_bac_2 WHERE ma_bac_1 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_2=$rs["ma_bac_2"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_2 = $ma_bac_2  and ma_bac_3 = 0 ";
											//echo"<br>$query_";
											$result_ = mysql_query($query_);	
											
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_2",$ma_bac_2,"");
									}
									delete_db_in("tb_bac_2","ma_bac_1","$items");
									
									// xoa ma_bac_1
								    $query = "Select * FROM tb_bac_1 WHERE ma_bac_1 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_1=$rs["ma_bac_1"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										
										    $query_ = "Select * FROM $tb WHERE ma_bac_1 = $ma_bac_1  and ma_bac_2 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_1",$ma_bac_1,"");
											
										
									}
									
									delete_db_in("tb_bac_1","ma_bac_1","$items");
									echo "<br>$delete_completed"; 
							   }
							   
							if($bac=="2")
							  {
							   $page="index_2.php";
									
									// xoa ma_bac_5
									$query = "Select * FROM tb_bac_5 WHERE ma_bac_2 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_5=$rs["ma_bac_5"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_5 = $ma_bac_5 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_5",$ma_bac_5,"");
									}
									delete_db_in("tb_bac_5","ma_bac_2","$items");
									 
									// xoa ma_bac_4
								    $query = "Select * FROM tb_bac_4  WHERE ma_bac_2 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_4=$rs["ma_bac_4"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_4 = $ma_bac_4  and ma_bac_5 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_4",$ma_bac_4,"");
									}
									delete_db_in("tb_bac_4 ","ma_bac_2","$items");

									// xoa ma_bac_3
								    $query = "Select * FROM tb_bac_3 WHERE ma_bac_2 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_3=$rs["ma_bac_3"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_3 = $ma_bac_3  and ma_bac_4 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_3",$ma_bac_3,"");
									}
									delete_db_in("tb_bac_3","ma_bac_2","$items");

									// xoa ma_bac_2
								    $query = "Select * FROM tb_bac_2 WHERE ma_bac_2 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");
										
										$ma_bac_2=$rs["ma_bac_2"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_2 = $ma_bac_2  and ma_bac_3 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_2",$ma_bac_2,"");
									}
									delete_db_in("tb_bac_2","ma_bac_2","$items");
									echo "<br>$delete_completed"; 

							  }
							if($bac=="3")
							  {
							   $page="index_3.php";
									
									// xoa ma_bac_5
								    
									$query = "Select * FROM tb_bac_5 WHERE ma_bac_3 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_5=$rs["ma_bac_5"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_5 = $ma_bac_5 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_5",$ma_bac_5,"");
									}
									delete_db_in("tb_bac_5","ma_bac_3","$items");
									 
									// xoa ma_bac_4
								    $query = "Select * FROM tb_bac_4  WHERE ma_bac_3 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_4=$rs["ma_bac_4"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_4 = $ma_bac_4 and ma_bac_5 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_4",$ma_bac_4,"");
									
									}
									delete_db_in("tb_bac_4 ","ma_bac_3","$items");

									// xoa ma_bac_3
								    $query = "Select * FROM tb_bac_3 WHERE ma_bac_3 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_3=$rs["ma_bac_3"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";

										    $query_ = "Select * FROM $tb WHERE ma_bac_3 = $ma_bac_3  and ma_bac_4 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_3",$ma_bac_3,"");
									}
									delete_db_in("tb_bac_3","ma_bac_3","$items");
							  }
							if($bac=="4")
							   {
							   $page="index_4.php";
									
									// xoa ma_bac_5
								    
									$query = "Select * FROM tb_bac_5 WHERE ma_bac_4 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_5=$rs["ma_bac_5"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_5 = $ma_bac_5 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_5",$ma_bac_5,"");
									}
									delete_db_in("tb_bac_5","ma_bac_4","$items");
									 
									// xoa ma_bac_4
								    $query = "Select * FROM tb_bac_4  WHERE ma_bac_4 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_4=$rs["ma_bac_4"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_4 = $ma_bac_4 and ma_bac_5 = 0 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_4",$ma_bac_4,"");
									}
									delete_db_in("tb_bac_4 ","ma_bac_4","$items");
									echo "<br>$delete_completed"; 
							   }
							if($bac=="5")
							   {
							   $page="index_5.php";
									
									// xoa ma_bac_5
									$query = "Select * FROM tb_bac_5 WHERE ma_bac_5 in ('$items')";
									$result = mysql_query($query);	
									while($rs= mysql_fetch_array($result))
									{ 
										delete_file("$path_muc/$rs[anh]");
										delete_file("$path_muc/$rs[anh_lon]");
										delete_file("$path_muc/$rs[anh_1]");
										delete_file("$path_muc/$rs[anh_1_lon]");

										$ma_bac_5=$rs["ma_bac_5"];
										$trang=$rs["trang"];
										$tb=gia_tri_mot_cot("tb_setup","ma_dm",$trang,"tb");
										if($tb=="tb_news")
									    $path=$path."/news";
														
											$query_ = "Select * FROM $tb WHERE ma_bac_5 = $ma_bac_5 ";
											$result_ = mysql_query($query_);	
											while($rs_= mysql_fetch_array($result_))
											{ 
											delete_file("$path/$rs_[anh_nho]");
											delete_file("$path/$rs_[anh]");
		
											delete_file("$path/$rs_[anh_nho_1]");
											delete_file("$path/$rs_[anh_1]");
		
											delete_file("$path/$rs_[anh_nho_2]");
											delete_file("$path/$rs_[anh_2]");
											
											delete_file("$path/$rs_[movie_vn]");
											}
											delete("$tb","ma_bac_5",$ma_bac_5,"");
									}
									delete_db_in("tb_bac_5","ma_bac_5","$items");
									echo "<br>$delete_completed"; 							   
							   }

							
							echo"<meta http-equiv=\"refresh\" content=\"2;url=$page?cat=$cat&bac=$bac&alpha=$alpha&start=$start&lg=$lg\">";
												
							}
							
						if($HTTP_GET_VARS["ma_del"]=="images")
							{
							$items=$HTTP_POST_VARS["items"];	
							$items=str_replace (",", "','", $items);
							$query = "Select * FROM tb_images WHERE id in ('$items')";
							$result = mysql_query($query);	
			                while($rs= mysql_fetch_array($result))
							 { 
							 $ma_images=$rs["ma_images"];
							 $anh=$rs["ten_anh"];
							 delete_file("$path_root/$path_upload/$anh");
							}
							delete_db_in("tb_images","id","$items");

							echo"<br>$delete_completed";
						   }
						   
						if($HTTP_GET_VARS["ma_del"]=="files")
							{
								$items=$HTTP_POST_VARS["items"];				 
								$items=str_replace (",", "','", $items);
								$query = "Select * FROM tb_files WHERE id in ('$items')";
								$result = mysql_query($query);	
								while($rs= mysql_fetch_array($result))
								 { 
								 $ma_files=$rs["ma_files"];
								 $files=$rs["ten_files"];
								 delete_file("$path_root/$path_upload_files/$files");
								}
								
								$query = "DELETE FROM tb_files WHERE id in ('$items')";
								if($result = mysql_query($query))
								echo"<br>$delete_completed";
						   }
						if($HTTP_GET_VARS["ma_del"]=="style")
							{
								$items=$HTTP_POST_VARS["items"];				 
								$items=str_replace (",", "','", $items);
								$path_upload_style=path_upload_mannager("styles");
								$query = "Select * FROM tb_style_site WHERE id in ('$items')";
								$result = mysql_query($query);	
								while($rs= mysql_fetch_array($result))
								 { 
								 $ma_files=$rs["ma_files"];
								 $files=$rs["ten_files"];
								 delete_file("$path_root/$path_upload_style/$files");
								}
								$query = "DELETE FROM tb_style_site WHERE id in ('$items')";
								if($result = mysql_query($query))
								echo"$delete_completed";
								
								$cat=$HTTP_POST_VARS["cat"];
								$start=$HTTP_POST_VARS["start"];
								$alpha=$HTTP_POST_VARS["alpha"];
						   }
					if($HTTP_GET_VARS["ma_del"]=="flash")
							{
								$items=$HTTP_POST_VARS["items"];				 
								$items=str_replace (",", "','", $items);
								$query = "Select * FROM tb_flash WHERE id in ('$items')";
								$result = mysql_query($query);	
								while($rs= mysql_fetch_array($result))
								 { 
								 $ma_files=$rs["ma_files"];
								 $files=$rs["ten_files"];
								 delete_file("$path_root/$path_upload_flash/$files");
								}
								
								$query = "DELETE FROM tb_flash WHERE id in ('$items')";
								if($result = mysql_query($query))
								echo"$delete_completed";
						   }
						   
				if($HTTP_GET_VARS["ma_del"]=="ma_images")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_images_ma.php\">";
				if($HTTP_GET_VARS["ma_del"]=="ma_files")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_files_ma.php\">";
				if($HTTP_GET_VARS["ma_del"]=="ma_style")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_style_ma.php\">";
				if($HTTP_GET_VARS["ma_del"]=="style")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_style.php?cat=$cat&start=$start&lg=$lg\">";
				if($HTTP_GET_VARS["ma_del"]=="ma_flash")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_flash_ma.php\">";
					 
			   if($HTTP_GET_VARS["ma_del"]=="setup")
				     echo"<meta http-equiv=\"refresh\" content=\"2;url=setup.php\">";
				?>
				 
				 <? if($HTTP_GET_VARS["ma_del"]=="tab"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_tab.php?cat=<?=$HTTP_GET_VARS["cat"]?>&bac=<?=$HTTP_GET_VARS["bac"]?>&lg=<?=$HTTP_GET_VARS["lg"]?>&trang=<?=$HTTP_GET_VARS["trang"]?>">				 <? }?>
				 
				 <? if($HTTP_GET_VARS["ma_del"]=="kg"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_kygui.php?cat=<?=$HTTP_GET_VARS["cat"]?>&bac=<?=$HTTP_GET_VARS["bac"]?>&lg=<?=$HTTP_GET_VARS["lg"]?>&start=<?=$HTTP_GET_VARS["start"]?>">				 <? }?>
				 <? if($HTTP_GET_VARS["ma_del"]=="images"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_images.php?cat=<?=$HTTP_POST_VARS["cat"]?>&start=<?=$HTTP_POST_VARS["start"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>">				 <? }?>
				 <? if($HTTP_GET_VARS["ma_del"]=="files"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_files.php?cat=<?=$HTTP_POST_VARS["cat"]?>&start=<?=$HTTP_POST_VARS["start"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>">				 <? }?>
			   <? if($HTTP_GET_VARS["ma_del"]=="flash"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_flash.php?cat=<?=$HTTP_POST_VARS["cat"]?>&start=<?=$HTTP_POST_VARS["start"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>">				 <? }?>
			  <? if($HTTP_GET_VARS["ma_del"]=="partner"){?>				 <meta http-equiv="refresh" content="2;url=admin_view_business_partner.php?cat=0&bac=<?=$HTTP_GET_VARS["bac"]?>&lg=<?=$HTTP_GET_VARS["lg"]?>&start=<?=$HTTP_GET_VARS["start"]?>">				 <? }?>
			   <? if($HTTP_GET_VARS["ma_del"]=="loai_dv"){?>				 <meta http-equiv="refresh" content="2;url=admin_type_items.php">				 
			   <? }?></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
