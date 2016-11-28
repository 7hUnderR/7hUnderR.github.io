<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><img src="images/home.gif" width="14" height="14" border="0"> <?=$add_page?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><br>
				<? 
					$path_root=lay_path_root("local");
					$path_upload=path_upload_mannager("images");
					$path_upload_files=path_upload_mannager("files");
					$path_upload_flash=path_upload_mannager("flash");
					
					$ma_add=$HTTP_GET_VARS["ma_add"];
					
						if( $ma_add=="add_news_2_images_2_noi_dung")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";
							
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							 if (in_array($_FILES['userfile']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$mo_ta_1 = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$mo_ta_1 =chuan_php("$mo_ta_1");

							$mo_ta_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$mo_ta_2 =chuan_php("$mo_ta_2");

							
							include("inc/inc_cat.php");	
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,mo_ta_1_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,mo_ta_1_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,mo_ta_1_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,mo_ta_1_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$mo_ta_1."','";
							$sql .=$mo_ta_2."','";
							
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    	}
						
						if( $ma_add=="add_files_download")
						
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							
							$id_anh=max_cot("tb_news","id")+1;
							$ext=lay_ext($anh);
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
							
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							$file_size=$_FILES['userfile']['size'];
							
							if($file_size>7340032) //7MB
							  echo"<br>File Size < 7340032 bytes (7MB)!";
							else
							{
							if($anh_nho!="")
							{
		   				    if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							
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
							
							if($anh!="")
							{
							 if (in_array($_FILES['userfile']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung=chuan_php($noidung);
							$key_word = stripslashes($HTTP_POST_VARS["key_word"]);
							$key_word=chuan_php($key_word);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							//$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							//$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");	
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,key_word_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,key_word_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,key_word_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,key_word_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=$key_word."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
									
						  }
						
					    }
											
						if( $ma_add=="add_product_6_images")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							
							$anh_nho_1="";
							$anh_1="";
							$anh_nho_1=$HTTP_POST_FILES['userfile_nho_1']['name']; 
							$anh_1=$HTTP_POST_FILES['userfile_1']['name']; 

							$anh_nho_2="";
							$anh_2="";
							$anh_nho_2=$HTTP_POST_FILES['userfile_nho_2']['name']; 
							$anh_2=$HTTP_POST_FILES['userfile_2']['name']; 

							$movie=$HTTP_POST_FILES['movie']['name']; 
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";
							
							$anh_nho_1_rename=$id_anh."_1.jpg";
							if($anh_nho_1=="")
								$anh_nho_1_rename="";
							
							$anh_1_rename=$id_anh."_1_.jpg";
							if($anh_1=="")
								$anh_1_rename="";

							$anh_nho_2_rename=$id_anh."_2.jpg";
							if($anh_nho_2=="")
								$anh_nho_2_rename="";
							
							$anh_2_rename=$id_anh."_2_.jpg";
							if($anh_2=="")
								$anh_2_rename="";

							$movie_rename=$id_anh;
							$movie_rename.=".wmv";
							if($movie=="")
								$movie_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							$path_movie=$path_root."images/movie";
							
							if($anh_nho!="")
							{
							 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							
							if($anh_nho_1!="")
							{
							 if (in_array($_FILES['userfile_nho_1']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho_1']['tmp_name'], "$path/$anh_nho_1");
							 rename("$path/$anh_nho_1","$path/$anh_nho_1_rename");
							}
							
							if($anh_1!="")
							{
							 if (in_array($_FILES['userfile_1']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
							 rename("$path/$anh_1","$path/$anh_1_rename");
							}
							
							if($anh_nho_2!="")
							{
							 if (in_array($_FILES['userfile_nho_2']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho_2']['tmp_name'], "$path/$anh_nho_2");
							 rename("$path/$anh_nho_2","$path/$anh_nho_2_rename");
							}
							
							if($anh_2!="")
							{
							 if (in_array($_FILES['userfile_2']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_2']['tmp_name'], "$path/$anh_2");
							 rename("$path/$anh_2","$path/$anh_2_rename");
							}
							
							
							
							if($movie!="")
							{
							 if (in_array($_FILES['movie']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
							 rename("$path_movie/$movie","$path_movie/$movie_rename");
							}
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");
							
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,anh_1,anh_nho_2,anh_2,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,anh_1,anh_nho_2,anh_2,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,anh_1,anh_nho_2,anh_2,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,anh_1,anh_nho_2,anh_2,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=$movie_rename."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							
							$sql .=$anh_nho_1_rename."','";
							$sql .=$anh_1_rename."','";	

							$sql .=$anh_nho_2_rename."','";
							$sql .=$anh_2_rename."','";	

							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
					    }
						if( $ma_add=="add_one_page")
							{
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							include("inc/inc_cat.php");
							$id=max_id("tb_news","id")+1;
							$file_vn = $id."_vn.html";
							$file_eg = $id."_eg.html";
							$file_kr = $id."_kr.html";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,mo_ta_$lg,page_vn,page_eg,page_kr,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$noidung."','";
							$sql .=$file_vn."','";
							$sql .=$file_eg."','";
							$sql .=$file_kr."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    
							$path_nguon=$path_root."data/trang_mau";
							$path_dich=$path_root."data/upload_file/File/news_files";
							$file_mau = "$path_nguon/text.txt";
							$filename_vn = $path_dich."/".$file_vn;
							$filename_eg = $path_dich."/".$file_eg;
							$filename_kr = $path_dich."/".$file_kr;
							
							copy("$file_mau","$filename_vn");
							copy("$file_mau","$filename_eg");
							copy("$file_mau","$filename_kr");
							
							$somecontent=$noidung;
						    write_file($filename_vn,$somecontent);
						
						}
						if( $ma_add=="add_weblink")
							{
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;

							include("inc/inc_cat.php");
							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    }
						
						if( $ma_add=="add_news_0_images")
							{
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							include("inc/inc_cat.php");
							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    }
												
						if( $ma_add=="add_news_1_images")
							{
							$anh_nho="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext=lay_ext($anh_nho);
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							
							$anh_nho_rename.=".".$ext;
							
							if($anh_nho=="")
								$anh_nho_rename="";
							
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							
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
							
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							include("inc/inc_cat.php");
							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,thu_tu,anh_nho,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,thu_tu,anh_nho,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    }
						
						if( $ma_add=="add_news_2_images_gallery")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
							
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							include("inc/inc_cat.php");	
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
					    }

						if( $ma_add=="add_news_2_images")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
							
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
							
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");	
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
					    }

						if( $ma_add=="add_news_3_images_4_noi_dung")
							{
							$anh_nho="";
							$anh="";
							$anh_lon="";
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name'];
							
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";

							$anh_lon_rename=$id_anh;
							$anh_lon_rename.="_1.jpg";
							if($anh_lon=="")
								$anh_lon_rename="";

						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							 if (in_array($_FILES['userfile']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							if($anh_lon!="")
							{
							 if (in_array($_FILES['userfile_lon']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
							 rename("$path/$anh_lon","$path/$anh_lon_rename");
							}
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$mo_ta_1 = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$mo_ta_1 =chuan_php("$mo_ta_1");
							
							$mo_ta_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$mo_ta_2 =chuan_php("$mo_ta_2");
							
							$noi_dung_1 = stripslashes($HTTP_POST_VARS["noi_dung_1"]);
							$noi_dung_1 =chuan_php("$noi_dung_1");
							
							$noi_dung_2 = stripslashes($HTTP_POST_VARS["noi_dung_2"]);
							$noi_dung_2 =chuan_php("$noi_dung_2");

							include("inc/inc_cat.php");
													
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,mo_ta_1_vn,noi_dung_vn,noi_dung_1_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,mo_ta_1_eg,noi_dung_eg,noi_dung_1_eg,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,mo_ta_1_kr,noi_dung_kr,noi_dung_1_kr,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,mo_ta_1_vn,noi_dung_vn,noi_dung_1_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";
								
							$sql .=$mo_ta_1."','";
							$sql .=$mo_ta_2."','";
							$sql .=$noi_dung_1."','";
							$sql .=$noi_dung_2."','";
							
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .=$anh_lon_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    }

						if( $ma_add=="add_news_3_images")
							{
							$anh_nho="";
							$anh="";
							$anh_lon="";
							
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name'];
							$ext_lon=lay_ext($anh_lon);
							
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";

							$anh_lon_rename=$id_anh;
							$anh_lon_rename.="_1.".$ext_lon;
							if($anh_lon=="")
								$anh_lon_rename="";

						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
							
							if($anh_lon!="")
							{
							if (in_array($_FILES['userfile_lon']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
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
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");
													
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .=$anh_lon_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
							
					    }
						

						if( $ma_add=="add_news_2_images_1_movie")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$movie=$HTTP_POST_FILES['movie']['name']; 
							
							$id_anh=max_id("tb_news","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";
							
							
							$movie_rename=$id_anh;
							$movie_rename.=".wmv";
							if($movie=="")
								$movie_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo/news";
							$path_movie=$path_root."images/movie/news";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							
							if($movie!="")
							{
							 if(in_array($_FILES['movie']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
							 rename("$path_movie/$movie","$path_movie/$movie_rename");
							}
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");
													
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,mo_ta_eg,movie_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,mo_ta_kr,movie_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$noidung."','";
							$sql .=$movie_rename."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";							
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
							
					    }
					
						if( $ma_add=="add_product")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name'];
							
							$movie=$HTTP_POST_FILES['movie']['name']; 
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";

							$anh_lon_rename=$id_anh;
							$anh_lon_rename.="_1.jpg";
							if($anh_lon=="")
								$anh_lon_rename="";
							
							$movie_rename=$id_anh;
							$movie_rename.=".wmv";
							if($movie=="")
								$movie_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							$path_movie=$path_root."images/movie";
							
							if($anh_nho!="")
							{move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
							if($anh_lon!="")
							{
							if (in_array($_FILES['userfile_lon']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
							 rename("$path/$anh_lon","$path/$anh_lon_rename");
							}
							
							if($movie!="")
							{
							if (in_array($_FILES['movie']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['movie']['tmp_name'], "$path_movie/$movie");
							 rename("$path_movie/$movie","$path_movie/$movie_rename");
							}
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
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

							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_color,
									product_size,
									product_made,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,
									product_color,
									product_size,
									product_made,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									mo_ta_eg,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,
									product_color,
									product_size,
									product_made,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									mo_ta_kr,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_color,
									product_size,
									product_made,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									mo_ta_vn,movie_vn,thu_tu,anh_nho,anh,anh_nho_1,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_color."','";
							$sql .=$product_size."','";
							$sql .=$product_made."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
								
							$sql .=$noidung."','";
							$sql .=$movie_rename."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .=$anh_lon_rename."','";						
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
						
					    }
						
						if( $ma_add=="add_product_2_images_da_catalog_6nd")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							
							if($anh!="")
							{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
																				
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];

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

							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,ghi_chu_$lg,
							product_type,
							product_code,
							product_price,
							product_quality,
							product_sell_off,
							product_status,
							product_mark,
							mo_ta_$lg,
							mo_ta_1_$lg,
							mo_ta_2_$lg,
							mo_ta_3_$lg,
							mo_ta_4_$lg,
							mo_ta_5_$lg,
							thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";	
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=$noidung_2."','";
							$sql .=$noidung_3."','";
							$sql .=$noidung_4."','";
							$sql .=$noidung_5."','";
							$sql .=$noidung_6."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
							
							$id_product=max_cot("tb_product","id");
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
							  $num=dem_max_6dk("tb_product_da_catalog","ma_bac_1",$ma_bac_1,"ma_bac_2",$ma_bac_2,"ma_bac_3",$ma_bac_3,"ma_bac_4",$ma_bac_4,"ma_bac_5",$ma_bac_5,"id_product",$id_product);
							  if($num==0)
								  {
									$sql="insert into tb_product_da_catalog(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,id_product,thu_tu,activate_,activate)";
									$sql .=" values('";			
									$sql .=rep($ma_bac_1)."','";
									$sql .=rep($ma_bac_2)."','";
									$sql .=rep($ma_bac_3)."','";
									$sql .=rep($ma_bac_4)."','";
									$sql .=rep($ma_bac_5)."','";	
									$sql .=$id_product."','";	
									$sql .='0'."','"; 
									$sql .='0'."','"; 
									$sql .='0'."')";
									$result = mysql_query($sql);
								}
							 }

							
							$cat = $HTTP_POST_VARS['cat'];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=0\">";
									
					    }
						
						if( $ma_add=="add_product_2_images_da_catalog")
							{
							
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							
							if($anh!="")
							{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
																				
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];

							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,ghi_chu_$lg,
							product_type,
							product_code,
							product_price,
							product_quality,
							product_sell_off,
							product_status,
							product_mark,
							mo_ta_$lg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";	
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
							
							
							$id_product=max_cot("tb_product","id");
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
							  $num=dem_max_6dk("tb_product_da_catalog","ma_bac_1",$ma_bac_1,"ma_bac_2",$ma_bac_2,"ma_bac_3",$ma_bac_3,"ma_bac_4",$ma_bac_4,"ma_bac_5",$ma_bac_5,"id_product",$id_product);
							  if($num==0)
								  {
									$sql="insert into tb_product_da_catalog(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,id_product,thu_tu,activate_,activate)";
									$sql .=" values('";			
									$sql .=rep($ma_bac_1)."','";
									$sql .=rep($ma_bac_2)."','";
									$sql .=rep($ma_bac_3)."','";
									$sql .=rep($ma_bac_4)."','";
									$sql .=rep($ma_bac_5)."','";	
									$sql .=$id_product."','";	
									$sql .='0'."','"; 
									$sql .='0'."','"; 
									$sql .='0'."')";
									$result = mysql_query($sql);
								}
							 }

							
							$cat = $HTTP_POST_VARS['cat'];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=0\">";
									
					    }

						if( $ma_add=="add_product_2_images_type_01")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
								if (in_array($_FILES['userfile_nho']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							
							if($anh!="")
							{
								if (in_array($_FILES['userfile']['type'],$imgarray))
								move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
																				
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];
							
							$product_catalog = $HTTP_POST_VARS["product_catalog"];
							$product_collection = $HTTP_POST_VARS["product_collection"];

							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_industry_01,
									product_industry_02,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,
									product_industry_01,
									product_industry_02,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";

									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,
									product_industry_01,
									product_industry_02,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_industry_01,
									product_industry_02,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";	
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=rep($product_catalog)."','";
							$sql .=rep($product_collection)."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
							$cat = $HTTP_POST_VARS['cat'];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=0\">";
									
					    }
						
						if( $ma_add=="add_product_2_images")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							
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
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
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
													
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];

							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
							$cat = $HTTP_POST_VARS['cat'];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=0\">";
									
					    }
						
						if( $ma_add=="add_product_2_images_3_noi_dung")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$ext_nho=lay_ext($anh_nho);
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$ext=lay_ext($anh);
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".".$ext_nho;
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.".$ext;
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
							if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
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
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							$thumbnail_lon=$_POST["thumbnail_lon"];
							if(($thumbnail_lon==1)||($thumbnail_lon==2))
							{
							 thumb($thumbnail,$_POST["width_lon"],$_POST["height_lon"],$_FILES['userfile']['type'],"$path/$anh","$path/$anh_rename");
							 delete_file("$path/$anh");
							}
							if($thumbnail_lon==0)
							     {
								 rename("$path/$anh","$path/$anh_rename");
								 }
							}
													
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];

							$noidung = stripslashes($HTTP_POST_VARS["mo_ta_1"]);
							$noidung =chuan_php("$noidung");
							$noidung_2 = stripslashes($HTTP_POST_VARS["mo_ta_2"]);
							$noidung_2 =chuan_php("$noidung_2");
							$noidung_3 = stripslashes($HTTP_POST_VARS["mo_ta_3"]);
							$noidung_3 =chuan_php("$noidung_3");

							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,
									mo_ta_1_vn,
									mo_ta_2_vn,
									thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_eg,
									mo_ta_1_eg,
									mo_ta_2_eg,
									thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_kr,
									mo_ta_1_kr,
									mo_ta_2_kr,
									thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn
									mo_ta_1_vn,
									mo_ta_2_vn,
									,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=$noidung_2."','";
							$sql .=$noidung_3."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
							$cat = $HTTP_POST_VARS['cat'];
							include("inc/inc_return_page.php");
							$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
							echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=0\">";
									
					    }
												
						if( $ma_add=="add_product_2_images_3_price")
							{
							$anh_nho="";
							$anh="";
							$anh_nho=$HTTP_POST_FILES['userfile_nho']['name']; 
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							
							$id_anh=max_id("tb_product","id")+1;
							
							$anh_nho_rename=$id_anh;
							$anh_nho_rename.=".jpg";
							if($anh_nho=="")
								$anh_nho_rename="";
							
							$anh_rename=$id_anh;
							$anh_rename.="_.jpg";
							if($anh=="")
								$anh_rename="";
						
							$path_root=lay_path_root("local");
							$path=$path_root."images/photo";
							
							if($anh_nho!="")
							{
							 if (in_array($_FILES['userfile_nho']['type'],$imgarray))
							 move_uploaded_file($HTTP_POST_FILES['userfile_nho']['tmp_name'], "$path/$anh_nho");
							 rename("$path/$anh_nho","$path/$anh_nho_rename");
							}
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
						
							$ten = stripslashes($HTTP_POST_VARS["ten"]);
							$ten=chuan_php($ten);
							$ghi_chu = stripslashes($HTTP_POST_VARS["ghi_chu"]);
							$ghi_chu=chuan_php($ghi_chu);
							
							$ngay_df=date('m/d/y');
							$gio_df=date("g:i a");
							$ngay_n=rep($HTTP_POST_VARS{"ngay"});
							$gio_n=rep($HTTP_POST_VARS{"gio"});
							
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							$tam=$cat;
							
							$product_type = $HTTP_POST_VARS["product_type"];
							
							$product_code = $HTTP_POST_VARS["product_code"];
							$product_price = $HTTP_POST_VARS["product_price"];
							$product_price_1 = $HTTP_POST_VARS["product_price_1"];
							$product_price_2 = $HTTP_POST_VARS["product_price_2"];
							
							$product_quality = $HTTP_POST_VARS["product_quality"];
							$product_sell_off = $HTTP_POST_VARS["product_sell_off"];
							$product_status = $HTTP_POST_VARS["product_status"];
							$product_mark = $HTTP_POST_VARS["product_mark"];

							$noidung = stripslashes($HTTP_POST_VARS["FCKeditor1"]);
							$noidung =chuan_php("$noidung");
							
							include("inc/inc_cat.php");							
							//$ten_file_kr=$id_anh."_kr.php";
							
							if($ngay_n=="") $ngay=$ngay_df; else $ngay=$ngay_n;
							if($gio_n=="") $gio=$gio_df; else $gio=$gio_n;
							
							switch($lg){
								case "vn":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_price_1,
									product_price_2,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "eg":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,ghi_chu_eg,
									product_type,
									product_code,
									product_price,
									product_price_1,
									product_price_2,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_eg,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								case "kr":
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,ghi_chu_kr,
									product_type,
									product_code,
									product_price,
									product_price_1,
									product_price_2,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_kr,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;
								default:
									$sql="insert into tb_product(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,ghi_chu_vn,
									product_type,
									product_code,
									product_price,
									product_price_1,
									product_price_2,
									product_quality,
									product_sell_off,
									product_status,
									product_mark,
									mo_ta_vn,thu_tu,anh_nho,anh,activate_,activate,banner,nguoi_viet,gio,ngay)";
									break;									
							}
							
							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							$sql .=$ten."','";
							$sql .=$ghi_chu."','";	
							$sql .=$product_type."','";
							$sql .=$product_code."','";
							$sql .=$product_price."','";
							$sql .=$product_price_1."','";
							$sql .=$product_price_2."','";
							$sql .=$product_quality."','";
							$sql .=$product_sell_off."','";
							$sql .=$product_status."','";
							$sql .=$product_mark."','";
							$sql .=$noidung."','";
							$sql .=rep($HTTP_POST_VARS{"thu_tu"})."','";	
							$sql .=$anh_nho_rename."','";
							$sql .=$anh_rename."','";	
							$sql .='0'."','"; 
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";  
							$sql .=$gio."','"; 
							$sql .=$ngay."')";
							if($result = mysql_query($sql))
									echo"Add completed !";
					    }
						
						
				if( $ma_add=="folder"){
				              $folder_name=rep($HTTP_POST_VARS["tendichvu"]);
				              $path=lay_path_root("local")."data/images";
							  $newdir=$path."/".$folder_name;
							  if (mkdir($newdir,0777)) echo"Add folder Completed !";

							  echo"$path";

							}

				if( $ma_add=="user"){
							$ma_user=max_cot("tb_admin","ma_user")+1;
							$thu_tu=max_cot("tb_admin","thu_tu")+1;
							
							$name=rep($HTTP_POST_VARS["name"]);
							$email=rep($HTTP_POST_VARS["email"]);
							$user_name=rep($HTTP_POST_VARS["user_name"]);
							$password=rep($HTTP_POST_VARS["password"]);
							$password=md5($password);
							$quyen=rep($HTTP_POST_VARS["quyen"]);
							$query = "INSERT INTO tb_admin(ten,email,ma_user,user,pass,quyen,activate,thu_tu)";
							$query .= " VALUES('$name','$email','$ma_user','$user_name','$password','$quyen','0','$thu_tu')";
							if($result = mysql_query($query))
							echo"Add completed !";
							}
					if( $ma_add=="loai_dv")
							{
							$table="tb_ma_loai_dv";
							$query = "Select * FROM  $table ORDER BY id DESC";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);
							$ma_loai_dv=$rs["ma_loai_dv"]+1;
							
							$ten_loai_dv=rep($HTTP_POST_VARS["tendichvu"]);
							
							$table="tb_ma_loai_dv";
							$query = "INSERT INTO $table(ma_loai_dv,ten_loai_dv)";
							$query .= " VALUES('$ma_loai_dv','$ten_loai_dv')";
							if($result = mysql_query($query))
							echo"Add completed !";
							}
						if( $ma_add=="ma_images")
							{
							$table="tb_images_ma";
							
							$ma_images=max_cot($table,"ma_images") + 1;
							$thu_tu=max_cot($table,"thu_tu") + 1;
							
							$ten_dv=chuan_php($HTTP_POST_VARS["tendichvu"]);
							$mo_ta=chuan_php($HTTP_POST_VARS["mo_ta"]);
							$query = "Select * FROM  tb_images_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_images"]==$ten_dv)
							  $key=1;
							}
							if($key==0)
								{
								$query = "INSERT INTO $table(ma_images,ten_ma_images,mo_ta,user,thu_tu)";
								$query .= " VALUES('$ma_images','$ten_dv','$mo_ta','$ma_user_admin','$thu_tu')";
								if($result = mysql_query($query))
								
								$path=$path_root.$path_upload;
								
								$newdir=$path."/".$ten_dv;
								mkdir($newdir,0777); 
								echo"Add completed !";
								}
							else
							    echo"Can not add, please choose folder name another !";
							}
						if( $ma_add=="ma_files")
							{
							$table="tb_files_ma";
							$ma_files=max_cot($table,"ma_files") + 1;
							$thu_tu=max_cot($table,"thu_tu") + 1;

							$ten_dv=chuan_php($HTTP_POST_VARS["tendichvu"]);
							$mo_ta=chuan_php($HTTP_POST_VARS["mo_ta"]);
							
							$query = "Select * FROM  tb_files_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_files"]==$ten_dv)
							  $key=1;
							}
							
							
							if($key==0)
								{
								$table="tb_files_ma";
								$query = "INSERT INTO $table(ma_files,ten_ma_files,mo_ta,user,thu_tu)";
								$query .= " VALUES('$ma_files','$ten_dv','$mo_ta','$ma_user_admin','$thu_tu')";
								if($result = mysql_query($query))
								
								$path=$path_root.$path_upload_files;
								
								$newdir=$path."/".$ten_dv;
								if (mkdir($newdir,0777)) 
								echo"Add completed !";
								}
							else
							    echo"Can not add, please choose folder name another !";
							}
						
						if( $ma_add=="ma_flash")
							{
							$table="tb_flash_ma";
							$ma_files=max_cot($table,"ma_files") + 1;
							$thu_tu=max_cot($table,"thu_tu") + 1;

							$ten_dv=chuan_php($HTTP_POST_VARS["tendichvu"]);
							$mo_ta=chuan_php($HTTP_POST_VARS["mo_ta"]);
							
							$query = "Select * FROM  tb_files_ma";
							$result = mysql_query($query);
							$key=0;
							while($rs= mysql_fetch_array($result))
							{
							if($rs["ten_ma_files"]==$ten_dv)
							  $key=1;
							}
							
							
							if($key==0)
								{
								$query = "INSERT INTO $table(ma_files,ten_ma_files,mo_ta,user,thu_tu)";
								$query .= " VALUES('$ma_files','$ten_dv','$mo_ta','$ma_user_admin','$thu_tu')";
								if($result = mysql_query($query))
								
								$path=$path_root.$path_upload_flash;
								
								$newdir=$path."/".$ten_dv;
								if (mkdir($newdir,0777)) 
								echo"Add completed !";
								}
							else
							    echo"Can not add, please choose folder name another !";
							}

						if( $ma_add=="catalog"){
							$bac=$HTTP_GET_VARS["bac"];
							$lg=$HTTP_POST_VARS["lg"];
							if($bac=="1")
							   $table="tb_bac_1";
							if($bac=="2")
							   $table="tb_bac_2";
							if($bac=="3")
							   $table="tb_bac_3";
							if($bac=="4")
							   $table="tb_bac_4 ";
							if($bac=="5")
							   $table="tb_bac_5";
							   
							$query = "Select * FROM  $table ORDER BY id DESC";
							$result = mysql_query($query);
							$rs= mysql_fetch_array($result);

							if($bac=="1")
							   {
								$ma_bac_1=$rs["ma_bac_1"]+1;
								$thu_tu=$rs["thu_tu"]+1;
								$id_anh=$rs["id"]+1;
							    $page="index.php";
							   }
							if($bac=="2")
							   {
							    $ma_bac_1=$HTTP_POST_VARS["ma_bac_1"];
								$ma_bac_2=$rs["ma_bac_2"]+1;
								$thu_tu=$rs["thu_tu"]+1;
								$id_anh=$rs["id"]+1;
								$page="index_2.php";
							   }
							if($bac=="3")
							   {
							    $ma_bac_1=$HTTP_POST_VARS["ma_bac_1"];
							    $ma_bac_2=$HTTP_POST_VARS["ma_bac_2"];
								$ma_bac_3=$rs["ma_bac_3"]+1;
								$thu_tu=$rs["thu_tu"]+1;
								$id_anh=$rs["id"]+1;
								$page="index_3.php";
							   }
							if($bac=="4")
							   {
							    $ma_bac_1=$HTTP_POST_VARS["ma_bac_1"];
							    $ma_bac_2=$HTTP_POST_VARS["ma_bac_2"];
								$ma_bac_3=$HTTP_POST_VARS["ma_bac_3"];
								$ma_bac_4=$rs["ma_bac_4"]+1;
								$thu_tu=$rs["thu_tu"]+1;
								$id_anh=$rs["id"]+1;
								$page="index_4.php";
							   }
							if($bac=="5")
							   {
							    $ma_bac_1=$HTTP_POST_VARS["ma_bac_1"];
							    $ma_bac_2=$HTTP_POST_VARS["ma_bac_2"];
								$ma_bac_3=$HTTP_POST_VARS["ma_bac_3"];
								$ma_bac_4=$HTTP_POST_VARS["ma_bac_4"];
								$ma_bac_5=$rs["ma_bac_5"]+1;
								$thu_tu=$rs["thu_tu"]+1;
								$id_anh=$rs["id"]+1;
								$page="index_5.php";
							   }
							   
							$ten_dv=rep($HTTP_POST_VARS["tendichvu"]);
							$mo_ta_dv=rep($HTTP_POST_VARS["mo_ta_dv"]);
							$ghi_chu=rep($HTTP_POST_VARS["ghi_chu"]);
							$noi_dung = stripslashes($HTTP_POST_VARS["noi_dung"]);
							$noi_dung =chuan_php("$noi_dung");
							$link=rep($HTTP_POST_VARS["link"]);
							$target=rep($HTTP_POST_VARS["target"]);
							$trang=rep($HTTP_POST_VARS["trang"]);
							
						
							$anh="";
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$anh_rename=$bac;
							$ext_nho=lay_ext($anh);
							
							$anh_lon="";
							$anh_lon=$HTTP_POST_FILES['userfile_lon']['name']; 
							$anh_rename_lon=$bac;
							$ext_lon=lay_ext($anh_lon);

							
							$anh_1="";
							$anh_1=$HTTP_POST_FILES['userfile_1']['name']; 
							$anh_rename_1=$bac;
							$ext_1_nho=lay_ext($anh_1);
							
							$anh_1_lon="";
							$anh_1_lon=$HTTP_POST_FILES['userfile_1_lon']['name']; 
							$anh_rename_1_lon=$bac;
							$ext_1_lon=lay_ext($anh_1_lon);

							//$id_anh_lon=max_id("tb_bac_1","id")+1;
							
						   $anh_rename.="_"."$id_anh"."_small.".$ext_nho;
						   $anh_rename_lon.="_"."$id_anh"."_max.".$ext_lon;
						   
						   $anh_rename_1.="_"."$id_anh"."_1_small.".$ext_1_nho;
						   $anh_rename_1_lon.="_"."$id_anh"."_1_max.".$ext_1_lon;
						   
							
							if($anh=="")
							    $anh_rename="";
							if($anh_lon=="")
							    $anh_rename_lon="";
							if($anh_1=="")
							    $anh_rename_1="";
							if($anh_1_lon=="")
							    $anh_rename_1_lon="";

							$activate=0;
							$path=lay_path_root("local");
							$path.="images/danh_muc";
							
							if($anh!="")
								{
								  if (in_array($_FILES['userfile']['type'],$imgarray))
								  move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
								  rename("$path/$anh","$path/$anh_rename");
								}
							if($anh_lon!="")
								{
								  if (in_array($_FILES['userfile_lon']['type'],$imgarray))
								  move_uploaded_file($HTTP_POST_FILES['userfile_lon']['tmp_name'], "$path/$anh_lon");
								  rename("$path/$anh_lon","$path/$anh_rename_lon");
								}
							if($anh_1!="")
								{
								  if (in_array($_FILES['userfile_1']['type'],$imgarray))
								  move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
								  rename("$path/$anh_1","$path/$anh_rename_1");
								}
							if($anh_1_lon!="")
								{
								  if (in_array($_FILES['userfile_1_lon']['type'],$imgarray))
								  move_uploaded_file($HTTP_POST_FILES['userfile_1_lon']['tmp_name'], "$path/$anh_1_lon");
								  rename("$path/$anh_1_lon","$path/$anh_rename_1_lon");
								}
								
							switch($bac){
								case "1":
									$query = "INSERT INTO $table(ma_bac_1,ten_$lg,mo_ta_$lg,ghi_chu_$lg,noi_dung_$lg,anh,anh_lon,anh_1,anh_1_lon,link_$lg,target_$lg,trang,thu_tu,activate)";
									$query .= " VALUES('$ma_bac_1','$ten_dv','$mo_ta_dv','$ghi_chu','$noi_dung','$anh_rename','$anh_rename_lon','$anh_rename_1','$anh_rename_1_lon','$link','$target','$trang','$thu_tu','$activate')";
									break;
								case "2":
									$query = "INSERT INTO $table(ma_bac_1,ma_bac_2,ten_$lg,mo_ta_$lg,ghi_chu_$lg,noi_dung_$lg,anh,anh_lon,anh_1,anh_1_lon,link_$lg,target_$lg,trang,thu_tu,activate)";
									$query .= " VALUES('$ma_bac_1','$ma_bac_2','$ten_dv','$mo_ta_dv','$ghi_chu','$noi_dung','$anh_rename','$anh_rename_lon','$anh_rename_1','$anh_rename_1_lon','$link','$target','$trang','$thu_tu','$activate')";									break;
								case "3":
									$query = "INSERT INTO $table(ma_bac_1,ma_bac_2,ma_bac_3,ten_$lg,mo_ta_$lg,ghi_chu_$lg,noi_dung_$lg,anh,anh_lon,anh_1,anh_1_lon,link_$lg,target_$lg,trang,thu_tu,activate)";
									$query .= " VALUES('$ma_bac_1','$ma_bac_2','$ma_bac_3','$ten_dv','$mo_ta_dv','$ghi_chu','$noi_dung','$anh_rename','$anh_rename_lon','$anh_rename_1','$anh_rename_1_lon','$link','$target','$trang','$thu_tu','$activate')";
									break;
								case "4":								
									$query = "INSERT INTO $table(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ten_$lg,mo_ta_$lg,ghi_chu_$lg,noi_dung_$lg,anh,anh_lon,anh_1,anh_1_lon,link_$lg,target_$lg,trang,thu_tu,activate)";
									$query .= " VALUES('$ma_bac_1','$ma_bac_2','$ma_bac_3','$ma_bac_4','$ten_dv','$mo_ta_dv','$ghi_chu','$noi_dung','$anh_rename','$anh_rename_lon','$anh_rename_1','$anh_rename_1_lon','$link','$target','$trang','$thu_tu','$activate')";
									break;
								case "5":
									$query = "INSERT INTO $table(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_$lg,mo_ta_$lg,ghi_chu_$lg,noi_dung_$lg,anh,anh_lon,anh_1,anh_1_lon,link_$lg,target_$lg,trang,thu_tu,activate)";
									$query .= " VALUES('$ma_bac_1','$ma_bac_2','$ma_bac_3','$ma_bac_4','$ma_bac_5','$ten_dv','$mo_ta_dv','$ghi_chu','$noi_dung','$anh_rename','$anh_rename_lon','$anh_rename_1','$anh_rename_1_lon','$link','$target','$trang','$thu_tu','$activate')";
									break;
								default:
									break;
									
							}

						if($result = mysql_query($query)){
							echo"Add completed !";
						}
					}
				
						if( $ma_add=="banner")
							{
							$cat = $HTTP_POST_VARS['cat'];
							$bac = $HTTP_POST_VARS['bac'];
							$lg = $HTTP_POST_VARS['lg'];	
							include("inc/inc_cat.php");							

							$anh="";
							$anh=$HTTP_POST_FILES['userfile']['name']; 
							$id_anh=max_id("tb_news","id")+1;
							$thu_tu=max_cot("tb_news","thu_tu")+1;
							$anh_rename=$id_anh;
							 
							$ext= lay_ext($anh);
							if(($ext=="swf")||($ext=="SWF"))
							   $type = 1;
							else
							   $type = 0;
							
							if($anh!="")
							   $anh_rename=$id_anh."_".$lg.".".$ext;
							
							if($anh=="")
							    $anh_rename="";
							
							$path=lay_path_root("local");
							$path.="/images/photo/news";
							
							if($anh!="")
							{
							if (in_array($_FILES['userfile']['type'],$imgarray))
							move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], "$path/$anh");
							 rename("$path/$anh","$path/$anh_rename");
							}
                            $banner=1;
							$ngay=date('d-m-y');
							$gio=date("g:i a");
							if($lg=="vn")
							  $sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_vn,mo_ta_vn,target_vn,ghi_chu_vn,type,anh_nho,banner,thu_tu,activate,activate_,nguoi_viet,gio,ngay)";
							if($lg=="eg")
							  $sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_eg,mo_ta_eg,target_eg,ghi_chu_eg,type,anh,banner,thu_tu,activate,activate_,nguoi_viet,gio,ngay)";
							if($lg=="kr")
							  $sql="insert into tb_news(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ten_kr,mo_ta_kr,target_kr,ghi_chu_kr,type,anh_nho_1,banner,thu_tu,activate,activate_,nguoi_viet,gio,ngay)";

							$sql .=" values('";			
							$sql .=rep($cat)."','";
							$sql .=rep($cat_s)."','";
							$sql .=rep($cat_s_s)."','";
							$sql .=rep($cat_s_s_s)."','";
							$sql .=rep($cat_s_s_s_s)."','";							
							
							$sql .=rep($HTTP_POST_VARS{"ten"})."','";
							$sql .=rep($HTTP_POST_VARS{"mo_ta"})."','";
							$sql .=rep($HTTP_POST_VARS{"target"})."','";
							$sql .=rep($HTTP_POST_VARS{"ghi_chu"})."','";
							$sql .=$type."','";
							$sql .=$anh_rename."','"; 
							$sql .=$banner."','";
							$sql .=$thu_tu."','";
							$sql .='0'."','"; 
							$sql .='0'."','";
							$sql .=$ma_user_admin."','";
							$sql .=$gio."','";
							$sql .=$ngay."')";
							
						  	if($result = mysql_query($sql))
								echo"Add completed !";
							}

				if( $ma_add=="upload")
							{
								$ma_upload=$HTTP_GET_VARS{"ma_upload"};
								$ma_images=$HTTP_POST_VARS{"ma_images"};
								if($ma_upload=="images")
									{
									  $name_folder=gia_tri_mot_cot("tb_images_ma","ma_images",$ma_images,"ten_ma_images");
									  $path_upload=path_upload_mannager("images");
									  $files_ref="admin_view_images.php";
									}
								if($ma_upload=="files")
									{
									   $name_folder=gia_tri_mot_cot("tb_files_ma","ma_files",$ma_images,"ten_ma_files");
									   $path_upload=path_upload_mannager("files");
									   $files_ref="admin_view_files.php";
									}
								if($ma_upload=="flash")
									{
									   $name_folder=gia_tri_mot_cot("tb_flash_ma","ma_files",$ma_images,"ten_ma_files");
									   $path_upload=path_upload_mannager("flash");
									   $files_ref="admin_view_flash.php";
									}
								
								$path=$path_root.$path_upload."/".$name_folder;
								$anh_1="";
								$anh_1=$HTTP_POST_FILES['userfile_1']['name']; 
								$filetype_1 = $_FILES['userfile_1']['type'];
								
								$anh_2="";
								$anh_2=$HTTP_POST_FILES['userfile_2']['name']; 
								$filetype_2 = $_FILES['userfile_2']['type'];

								$anh_3="";
								$anh_3=$HTTP_POST_FILES['userfile_3']['name']; 
								$filetype_3 = $_FILES['userfile_3']['type'];

								$anh_4="";
								$anh_4=$HTTP_POST_FILES['userfile_4']['name']; 
								$filetype_4 = $_FILES['userfile_4']['type'];

								$anh_5="";
								$anh_5=$HTTP_POST_FILES['userfile_5']['name']; 
								$filetype_5 = $_FILES['userfile_5']['type'];
								
								$key_1=0;
								$key_2=0;
								$key_3=0;
								$key_4=0;
								$key_5=0;
							
							
								if($anh_1!="")
								 {  
								if (!in_array($filetype_1,$imgarray))
								   {
									   echo"Invalid filetype. Please use only a .JPG, .GIF, .PNG, .DOC, .XLS file. , .ZIP, .RAR";
								   }
								 else
									{
									$file_name_1=$name_folder."/".$anh_1;
									
									if($ma_upload=="images")
										$key_1=dem_max_dk("tb_images","ten_anh","$file_name_1");
									if($ma_upload=="files")
										$key_1=dem_max_dk("tb_files","ten_files","$file_name_1");
									if($ma_upload=="flash")
										$key_1=dem_max_dk("tb_flash","ten_files","$file_name_1");

									if($key_1==0)
									{
									 move_uploaded_file($HTTP_POST_FILES['userfile_1']['tmp_name'], "$path/$anh_1");
									 $date_vn=date("F j, Y, g:i a");
									
									if($ma_upload=="images")
									  {
		  							   $thu_tu = max_cot("tb_images","thu_tu")+1; 
									   $thumbnail_1=$_POST["thumbnail_1"];
									   if(($thumbnail_1==1)||($thumbnail_1==2))
									    {
									     thumb($thumbnail_1,$_POST["width_1"],$_POST["height_1"],$_FILES['userfile_1']['type'],"$path/$anh_1","$path/$anh_1");
									    }
									   $sql="insert into tb_images(ten_anh,ten_anh_,ghi_chu,ma_images,user,thu_tu,ngay)";
									  }
									
									if($ma_upload=="files")
									 {
									 $thu_tu = max_cot("tb_files","thu_tu")+1; 
									 $sql="insert into tb_files(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }
									if($ma_upload=="flash")
									 {
									 $thu_tu = max_cot("tb_flash","thu_tu")+1; 
									 $sql="insert into tb_flash(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }

									 $sql .=" values('";			
									 $sql .=$file_name_1."','";
									 $sql .=$anh_1."','";
									 $sql .=rep($HTTP_POST_VARS{"ghi_chu_1"})."','";
									 $sql .=$ma_images."','";
									 $sql .=$ma_user_admin."','";
									 $sql .=$thu_tu."','";
									 $sql .=$date_vn."')";
									 $result = mysql_query($sql);
									 echo"<br><br> Upload '$anh_1' Completed !";
									 }else echo"<br><br> Can not upload Images 1 ! You rename '$anh_1' & uploat again !";
								  }
							}
							
						if($anh_2!="")
								 {  
								if (!in_array($filetype_2,$imgarray))
								   {
									   echo"Invalid filetype. Please use only a .JPG, .GIF, .PNG, .DOC, .XLS file.";
								   }
								 else
									{
								 $file_name_2=$name_folder."/".$anh_2;
								 
									if($ma_upload=="images")
										$key_2=dem_max_dk("tb_images","ten_anh","$file_name_2");
									if($ma_upload=="files")
										$key_2=dem_max_dk("tb_files","ten_files","$file_name_2");
									if($ma_upload=="flash")
										$key_2=dem_max_dk("tb_flash","ten_files","$file_name_2");
									
									if($key_2==0)
									{
									 move_uploaded_file($HTTP_POST_FILES['userfile_2']['tmp_name'], "$path/$anh_2");
									 $date_vn=date("F j, Y, g:i a");
									if($ma_upload=="images")
									    {
										$thu_tu = max_cot("tb_images","thu_tu")+1; 
		  							    $thumbnail_2=$_POST["thumbnail_2"];
									    if(($thumbnail_2==1)||($thumbnail_2==2))
									    {
									     thumb($thumbnail_2,$_POST["width_2"],$_POST["height_2"],$_FILES['userfile_2']['type'],"$path/$anh_2","$path/$anh_2");
									    }
										$sql="insert into tb_images(ten_anh,ten_anh_,ghi_chu,ma_images,user,thu_tu,ngay)";
										}
										
									if($ma_upload=="files")
									   {
									   $thu_tu = max_cot("tb_files","thu_tu")+1; 
									   $sql="insert into tb_files(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									   }
									if($ma_upload=="flash")
									 {
									 $thu_tu = max_cot("tb_flash","thu_tu")+1; 
									 $sql="insert into tb_flash(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }

									 $sql .=" values('";			
									 $sql .=$file_name_2."','";
									 $sql .=$anh_2."','";
									 $sql .=rep($HTTP_POST_VARS{"ghi_chu_2"})."','";
									 $sql .=$ma_images."','";
									 $sql .=$ma_user_admin."','";
									 $sql .=$thu_tu."','";
									 $sql .=$date_vn."')";
									 $result = mysql_query($sql);
									 echo"<br><br> Upload '$anh_2' Completed !";
									 }else echo"<br><br> Can not upload Images 2 ! You rename ''$anh_2' & uploat again !";
								 }
							}
							
						if($anh_3!="")
								 {  
								if (!in_array($filetype_3,$imgarray))
								   {
									   echo"Invalid filetype. Please use only a .JPG, .GIF, .PNG, .DOC, .XLS file.";
								   }
								 else
									{
								
								 $file_name_3=$name_folder."/".$anh_3;
									if($ma_upload=="images")
										$key_3=dem_max_dk("tb_images","ten_anh","$file_name_3");
									if($ma_upload=="files")
										$key_3=dem_max_dk("tb_files","ten_files","$file_name_3");
									if($ma_upload=="flash")
										$key_3=dem_max_dk("tb_flash","ten_files","$file_name_3");
								 
									if($key_3==0)
									{
									 move_uploaded_file($HTTP_POST_FILES['userfile_3']['tmp_name'], "$path/$anh_3");
									 $date_vn=date("F j, Y, g:i a");
									if($ma_upload=="images")
									   {
		  							   $thu_tu = max_cot("tb_images","thu_tu")+1; 
									   $thumbnail_3=$_POST["thumbnail_3"];
									   if(($thumbnail_3==1)||($thumbnail_3==2))
									    {
									     thumb($thumbnail_3,$_POST["width_3"],$_POST["height_3"],$_FILES['userfile_3']['type'],"$path/$anh_3","$path/$anh_3");
									    }
									    $sql="insert into tb_images(ten_anh,ten_anh_,ghi_chu,ma_images,user,thu_tu,ngay)";
									   }
									if($ma_upload=="files")
									   {
									    $thu_tu = max_cot("tb_files","thu_tu")+1; 
									    $sql="insert into tb_files(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									   }
									if($ma_upload=="flash")
									 {
									 $thu_tu = max_cot("tb_flash","thu_tu")+1; 
									 $sql="insert into tb_flash(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }
									
									 $sql .=" values('";			
									 $sql .=$file_name_3."','";
									 $sql .=$anh_3."','";
									 $sql .=rep($HTTP_POST_VARS{"ghi_chu_3"})."','";
									 $sql .=$ma_images."','";
									 $sql .=$ma_user_admin."','";
									 $sql .=$thu_tu."','";
									 $sql .=$date_vn."')";
									 $result = mysql_query($sql);
									 echo"<br><br>Upload '$anh_3' Completed !";
									 }else echo"<br><br> Can not upload Images 3 ! You rename '$anh_3' & uploat again !";
								 }
							}
					if($anh_4!="")
							{  
							if (!in_array($filetype_4,$imgarray))
							   {
								   echo"Invalid filetype. Please use only a .JPG, .GIF, .PNG, .DOC, .XLS file.";
							   }
							 else
								{
								 $file_name_4=$name_folder."/".$anh_4;
									if($ma_upload=="images")
										$key_4=dem_max_dk("tb_images","ten_anh","$file_name_4");
									if($ma_upload=="files")
										$key_4=dem_max_dk("tb_files","ten_files","$file_name_4");
									if($ma_upload=="flash")
										$key_4=dem_max_dk("tb_flash","ten_files","$file_name_4");
									if($key_3==0)
									{
									 move_uploaded_file($HTTP_POST_FILES['userfile_4']['tmp_name'], "$path/$anh_4");
									 $date_vn=date("F j, Y, g:i a");
									if($ma_upload=="images")
									  {
  		  							    $thu_tu = max_cot("tb_images","thu_tu")+1; 
										$thumbnail_4=$_POST["thumbnail_4"];
									    if(($thumbnail_4==1)||($thumbnail_4==2))
									    {
									     thumb($thumbnail_4,$_POST["width_4"],$_POST["height_4"],$_FILES['userfile_4']['type'],"$path/$anh_4","$path/$anh_4");
									    }
										$sql="insert into tb_images(ten_anh,ten_anh_,ghi_chu,ma_images,user,thu_tu,ngay)";
									  }  
									if($ma_upload=="files")
									  {
									   $thu_tu = max_cot("tb_files","thu_tu")+1; 
									    $sql="insert into tb_files(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									   }
									if($ma_upload=="flash")
									 {
									 $thu_tu = max_cot("tb_flash","thu_tu")+1; 
									 $sql="insert into tb_flash(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }
									   
									 $sql .=" values('";			
									 $sql .=$file_name_4."','";
									 $sql .=$anh_4."','";
									 $sql .=rep($HTTP_POST_VARS{"ghi_chu_4"})."','";
									 $sql .=$ma_images."','";
									 $sql .=$ma_user_admin."','";
									 $sql .=$thu_tu."','";
									 $sql .=$date_vn."')";
									 $result = mysql_query($sql);
									 echo"<br><br>Upload '$anh_4' Completed !";
									 }else echo"<br><br> Can not upload Images 4 ! You rename '$anh_4' & uploat again !";
								 }
						}
						
						if($anh_5!="")
								 {  
								if (!in_array($filetype_5,$imgarray))
								   {
									   echo"Invalid filetype. Please use only a .JPG, .GIF, .PNG, .DOC, .XLS file.";
								   }
								 else
									{
								 $file_name_5=$name_folder."/".$anh_5;
									if($ma_upload=="images")
										$key_5=dem_max_dk("tb_images","ten_anh","$file_name_5");
									if($ma_upload=="files")
										$key_5=dem_max_dk("tb_files","ten_files","$file_name_5");
									if($ma_upload=="flash")
										$key_5=dem_max_dk("tb_flash","ten_files","$file_name_5");
									if($key_5==0)
									{
									 move_uploaded_file($HTTP_POST_FILES['userfile_5']['tmp_name'], "$path/$anh_5");
									 $date_vn=date("F j, Y, g:i a");
									
									if($ma_upload=="images")
									   {
									   $thu_tu = max_cot("tb_images","thu_tu")+1; 
  		  							    $thumbnail_4=$_POST["thumbnail_4"];
									    if(($thumbnail_4==1)||($thumbnail_4==2))
									    {
									     thumb($thumbnail_4,$_POST["width_4"],$_POST["height_4"],$_FILES['userfile_4']['type'],"$path/$anh_4","$path/$anh_4");
									    }
										$sql="insert into tb_images(ten_anh,ten_anh_,ghi_chu,ma_images,user,thu_tu,ngay)";
									   } 
									
									if($ma_upload=="files")
									   {
									    $thu_tu = max_cot("tb_files","thu_tu")+1; 
									    $sql="insert into tb_files(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									   }
									
									if($ma_upload=="flash")
									 {
									 $thu_tu = max_cot("tb_flash","thu_tu")+1; 
									 $sql="insert into tb_flash(ten_files,ten_files_,ghi_chu,ma_files,user,thu_tu,ngay)";
									 }

									 $sql .=" values('";			
									 $sql .=$file_name_5."','";
									 $sql .=$anh_5."','";
									 $sql .=rep($HTTP_POST_VARS{"ghi_chu_5"})."','";
									 $sql .=$ma_images."','";
									 $sql .=$ma_user_admin."','";
									 $sql .=$thu_tu."','";
									 $sql .=$date_vn."')";
									 $result = mysql_query($sql);
									 echo"<br><br>Upload '$anh_5' Completed !";
									 }else echo"<br><br>Can not upload Images 5 ! You rename '$anh_5' & uploat again !";
								 }
							   }
							
							echo"<br><br>[ <a href=\"#\" onClick=\"history.go(-1);\"><b>Back</b></li></a> | <a href=\"$files_ref?cat=$ma_images&start=0\"><b>View</b></a> ]";
							}

							?>
					<? 
					if($HTTP_GET_VARS["ma_add"]=="ma_images")
						echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_images_ma.php\">" ;
					if($HTTP_GET_VARS["ma_add"]=="ma_flash")
						echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_flash_ma.php\">" ;
						
					if($HTTP_GET_VARS["ma_add"]=="ma_files")
						echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_files_ma.php\">" ;
					if($HTTP_GET_VARS["ma_add"]=="setup")
						echo"<meta http-equiv=\"refresh\" content=\"2;url=setup.php\">";
					?>	
					<? 
					if($HTTP_GET_VARS["ma_add"]=="news")
					{?>
					<meta http-equiv="refresh" content="2;url=admin_view_product.php?cat=<?=$HTTP_POST_VARS["cat"]?>&bac=<?=$HTTP_POST_VARS["bac"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>&start=0">
					<? }?>	
					<? if(
					($HTTP_GET_VARS["ma_add"]=="add_news_0_images")
					||($HTTP_GET_VARS["ma_add"]=="add_weblink")
					||($HTTP_GET_VARS["ma_add"]=="add_news_1_images")
					||($HTTP_GET_VARS["ma_add"]=="add_files_download")
					||($HTTP_GET_VARS["ma_add"]=="add_one_page_")
					||($HTTP_GET_VARS["ma_add"]=="add_product")
					||($HTTP_GET_VARS["ma_add"]=="add_product_2_images")
					||($HTTP_GET_VARS["ma_add"]=="add_news_3_images")
					||($HTTP_GET_VARS["ma_add"]=="add_news_3_images_4_noi_dung")
					||($HTTP_GET_VARS["ma_add"]=="add_news_2_images_1_movie")
					||($HTTP_GET_VARS["ma_add"]=="add_product_6_images")
					||($HTTP_GET_VARS["ma_add"]=="add_news_2_images")
					||($HTTP_GET_VARS["ma_add"]=="add_news_2_images_gallery")
					||($HTTP_GET_VARS["ma_add"]=="add_news_2_images_2_noi_dung")
					||($HTTP_GET_VARS["ma_add"]=="banner"))
					{
					$cat=$HTTP_POST_VARS["cat"];
					$bac=$HTTP_POST_VARS["bac"];
					$lg=$HTTP_POST_VARS["lg"];
					$start=0;
					
					include("inc/inc_return_page.php");
					$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
					echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
					
					 }?>
			      <? if($HTTP_GET_VARS["ma_add"]=="user")
					{?><meta http-equiv="refresh" content="2;url=admin_user.php?cat=1&start=0&alpha=All&lg=vn">			      <? }?>					 
			      <? if($HTTP_GET_VARS["ma_add"]=="catalog"){?><meta http-equiv="refresh" content="2;url=<?=$page?>?cat=<?=$HTTP_POST_VARS["cat"]?>&bac=<?=$HTTP_POST_VARS["bac"]?>&alpha=<?=$HTTP_POST_VARS["alpha"]?>&start=<?=$HTTP_POST_VARS["start"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>"><? }?>
			      <? if($HTTP_GET_VARS["ma_add"]=="banner"){?>			      <meta http-equiv="refresh" content="2;url=admin_view_product.php?cat=<?=$HTTP_POST_VARS["cat"]?>&bac=<?=$HTTP_POST_VARS["bac"]?>&lg=<?=$HTTP_POST_VARS["lg"]?>&start=0">			      <? }?>
                <? ?></td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
