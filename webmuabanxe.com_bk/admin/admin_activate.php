<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"> Activate </td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><br>
             <?
			$key=$HTTP_GET_VARS["key"];
			$ma_act=$HTTP_GET_VARS["ma_act"];
	if($ma_act=="activate_user")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$alpha=$HTTP_POST_VARS["alpha"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				if($key=="activate")
				 $activate=1;
				else
				 $activate=0;
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table="tb_admin";
				$query = "UPDATE $table SET activate='$activate'";
				$query .= "WHERE id in ('$items')";
				if($result = mysql_query($query))
				echo"Activate completed !";
				echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_user.php?cat=$cat&lg=$lg&alpha=$alpha&start=$start\">";
			   }
	if($ma_act=="style_file")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				if($key=="activate")
				 $activate=1;
				else
				 $activate=0;
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table="tb_style_site";
				$query = "UPDATE $table SET activate='$activate'";
				$query .= "WHERE id in ('$items')";
				if($result = mysql_query($query))
				echo"Activate completed !";
				echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_view_style.php?cat=$cat&lg=$lg&start=$start\">";
			   }
			if($key=="update_quyen_catalog")
			   {
				$bac =$HTTP_POST_VARS["bac"];
				$cat=$HTTP_POST_VARS["cat"];
				$lg=$HTTP_POST_VARS["lg"];
				$alpha=$HTTP_POST_VARS["alpha"];
				$start=$HTTP_POST_VARS["start"];
				
				$items =$HTTP_POST_VARS["chon"];
				$items_s =$HTTP_POST_VARS["chon_s"];
				//$items=str_replace (",", "','", $items);
				$ma_user=$HTTP_POST_VARS["ma_user"];
				
				if($bac==1)
				 {	
					$f="quyen";
				  }
				if($bac==2)
				 {	
					$f="quyen_s";
				  }
				if($bac==3)
				 {	
					$f="quyen_s_s";
				  }

				if($bac==4)
				 {	
					$f="quyen_s_s_s";
				  }
				if($bac==5)
				  {	
					$f="quyen_s_s_s_s";
				  }
				$query_2 = "UPDATE tb_admin SET quyen_catalog ='$items', quyen_catalog_s ='$items_s' ";
				$query_2 .= " WHERE ma_user= $ma_user";
				if($result_2 = mysql_query($query_2))
				    echo "$update_completed";
					
				//echo"$query_2";		
				echo"<meta http-equiv=\"refresh\" content=\"2;url=admin_user_catalog.php?ma_user=$ma_user&cat=$cat&bac=$bac&lg=$lg&alpha=$alpha&start=$start\">";
				}
							
			if($key=="muc")
			   {
				$activate=0;
				$activate_note=$deactivat_completed;
				if($ma_act=="activate_muc")
				   {
				   $activate=1;
				   $activate_note=$activat_completed;
				   }
							   
				   
				$bac =$HTTP_POST_VARS["bac"];
				
				$cat=$HTTP_POST_VARS["cat"];
				$lg=$HTTP_POST_VARS["lg"];
				$alpha=$HTTP_POST_VARS["alpha"];
				$start=$HTTP_POST_VARS["start"];
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				if($bac==1)
				 {	
					$query_2 = "UPDATE tb_bac_1 SET activate='$activate'";
					$query_2 .= "WHERE ma_bac_1 in ('$items')";
					$page="index.php";
				  }
				if($bac==2)
				 {	
					$query_2 = "UPDATE tb_bac_2 SET activate='$activate'";
					$query_2 .= "WHERE ma_bac_2 in ('$items')";
					$page="index_2.php";
				  }
				if($bac==3)
				 {	
					$query_2 = "UPDATE tb_bac_3 SET activate='$activate'";
					$query_2 .= "WHERE ma_bac_3 in ('$items')";
					$page="index_3.php";
				  }

				if($bac==4)
				 {	
					$query_2 = "UPDATE tb_bac_4 SET activate='$activate'";
					$query_2 .= "WHERE ma_bac_4 in ('$items')";
					$page="index_4.php";
				  }
				if($bac==5)
				  {	
					$query_2 = "UPDATE tb_bac_5 SET activate='$activate'";
					$query_2 .= "WHERE ma_bac_5 in ('$items')";
					$page="index_5.php";
				  }
				  
				if($result_2 = mysql_query($query_2))
				    echo $activate_note;
				echo"<meta http-equiv=\"refresh\" content=\"2;url=$page?cat=$cat&bac=$bac&lg=$lg&alpha=$alpha&start=$start\">";
				}

			if($ma_act=="activate_folder_set")
			   {
				$activate=0;
				$activate_note=$deactivat_completed;
				
				if($key=="activate")
				   {
				   $activate=1;
				   $activate_note=$activat_completed;
				   }
							   
				   
				$bac =$HTTP_POST_VARS["bac"];
				
				$cat=$HTTP_POST_VARS["cat"];
				$lg=$HTTP_POST_VARS["lg"];
				$alpha=$HTTP_POST_VARS["alpha"];
				$start=$HTTP_POST_VARS["start"];
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				if($bac==1)
				 {	
					$query_2 = "UPDATE tb_bac_1 SET activate_setup='$activate'";
					$query_2 .= "WHERE ma_bac_1 in ('$items')";
					$page="index.php";
				  }
				if($bac==2)
				 {	
					$query_2 = "UPDATE tb_bac_2 SET activate_setup='$activate'";
					$query_2 .= "WHERE ma_bac_2 in ('$items')";
					$page="index_2.php";
				  }
				if($bac==3)
				 {	
					$query_2 = "UPDATE tb_bac_3 SET activate_setup='$activate'";
					$query_2 .= "WHERE ma_bac_3 in ('$items')";
					$page="index_3.php";
				  }

				if($bac==4)
				 {	
					$query_2 = "UPDATE tb_bac_4 SET activate_setup='$activate'";
					$query_2 .= "WHERE ma_bac_4 in ('$items')";
					$page="index_4.php";
				  }
				if($bac==5)
				  {	
					$query_2 = "UPDATE tb_bac_5 SET activate_setup='$activate'";
					$query_2 .= "WHERE ma_bac_5 in ('$items')";
					$page="index_5.php";
				  }
				  
				if($result_2 = mysql_query($query_2))
				    echo $activate_note;
				echo"<meta http-equiv=\"refresh\" content=\"2;url=$page?cat=$cat&bac=$bac&lg=$lg&alpha=$alpha&start=$start\">";
				}

	if($ma_act=="activate_index")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				include("inc/inc_return_page.php");
				$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");

				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table_2="$tb";
				$query_2 = "UPDATE $table_2 SET ngoai_index='1'";
				$query_2 .= "WHERE id in ('$items')";
				if($result_2 = mysql_query($query_2))
				echo"Activate completed !";
				
				if($table_2=="tb_product")
				{
					$query_2 = "UPDATE tb_product_da_catalog SET ngoai_index='1',nguoi_viet='$ma_user_admin' WHERE id_product in ('$items')";
					$result_2 = mysql_query($query_2);
				}

				}
	if($ma_act=="deactivate_index")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				include("inc/inc_return_page.php");
				$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table="$tb";
				$query = "UPDATE $table SET ngoai_index='0'";
				$query .= "WHERE id in ('$items')";
				if($result = mysql_query($query))
				echo"Deactivate completed !";
				
				if($table=="tb_product")
				{
					$query = "UPDATE tb_product_da_catalog SET ngoai_index='0',nguoi_viet='$ma_user_admin' WHERE id_product in ('$items')";
					$result = mysql_query($query);
				}
			   }
	if($ma_act=="activate")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				include("inc/inc_return_page.php");
				$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");

				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table_2="$tb";
				if($suid==2)
				  {
				  $query_2 = "UPDATE $table_2 SET activate_='1' ";
  				  $query_2 .= "WHERE id in ('$items') and nguoi_viet='$ma_user_admin' "; 
				  }
				else
				 {
				  $query_2 = "UPDATE $table_2 SET activate_='1',activate='1' ";
  				  $query_2 .= "WHERE id in ('$items')";
				 }

				if($result_2 = mysql_query($query_2))
				echo"Activate completed !";
				
				if($table_2=="tb_product")
				{
					if($suid==2)
					$query_2 = "UPDATE tb_product_da_catalog SET activate_='1' WHERE id_product in ('$items') ";
					else
					$query_2 = "UPDATE tb_product_da_catalog SET activate_='1',activate='1',nguoi_viet='$ma_user_admin' WHERE id_product in ('$items') ";

					$result_2 = mysql_query($query_2);
				}
				
				}
				
	if($ma_act=="activate_hoat_dong")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				
				$cat_product=$HTTP_POST_VARS["cat_product"];
				$bac_product=$HTTP_POST_VARS["bac_product"];
				$id_product=$HTTP_POST_VARS["id_product"];
				
				$start=$HTTP_POST_VARS["start"];

				$chon =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $chon);
				$table_2="tb_product";

				$query_2 = "UPDATE $table_2 SET news_all='$chon' ";
				
				$query_2 .= "WHERE id=$id_product ";
				
				//echo $query_2;
				if($result_2 = mysql_query($query_2))
				echo"Activate completed !";
				echo"<meta http-equiv=\"refresh\" content=\"1;url=admin_view_news_hoat_hong.php?cat=$cat&bac=$bac&lg=$lg&cat_product=$cat_product&bac_product=$bac_product&id_product=$id_product&lg=$lg&start=$start\">";

				}
	if($ma_act=="deactivate")
			   {
				$cat=$HTTP_POST_VARS["cat"];
				$bac=$HTTP_POST_VARS["bac"];
				$lg=$HTTP_POST_VARS["lg"];
				$start=$HTTP_POST_VARS["start"];
				include("inc/inc_return_page.php");
				$tb=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"tb");
				
				
				$items =$HTTP_POST_VARS["chon"];
				$items=str_replace (",", "','", $items);
				$table="$tb";
				if($suid==2)
				   {
				   $query = "UPDATE $table SET activate_='0' ";
	 			   $query .= "WHERE id in ('$items') and nguoi_viet='$ma_user_admin' ";
				   }
				else
				   {
				   $query = "UPDATE $table SET activate_='0',activate='0' ";
				   $query .= "WHERE id in ('$items')";
				   }

				if($result = mysql_query($query))
				echo"Deactivate completed !";
				if($table=="tb_product")
				{
					if($suid==2)
						$query_2 = "UPDATE tb_product_da_catalog SET activate_='0' WHERE id_product in ('$items') ";
					else
					    $query_2 = "UPDATE tb_product_da_catalog SET activate_='0',activate='0' WHERE id_product in ('$items')";
					$result_2 = mysql_query($query_2);
				}
				
			   }

				if($key=="view") 
				{ 
					$page_view=gia_tri_mot_cot_2dk("tb_setup","ma_dm",$trang,"ma_bac",$bac,"file_view");
					echo"<meta http-equiv=\"refresh\" content=\"1;url=$page_view?cat=$cat&bac=$bac&lg=$lg&start=$start\">";
				}

			mysql_close();
							?>
          			</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
