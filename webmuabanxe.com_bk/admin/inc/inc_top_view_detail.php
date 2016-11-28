<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr >
				      <td height="30" align="right" valign="middle" class="tab_lr_5 bg_page_border_bottom">&nbsp;<? 
					  include("inc/inc_lg.php"); 
					  include("inc/inc_page_all.php");  
					  ?></td>
			        </tr>
                    <tr>
                      <td height="30" valign="middle" class="tab_lr_5 bg_page_border_bottom">
					  <?
					  $PHP_SELF=$php_self;
					  alpha_3dk($PHP_SELF,"cat",$cat,"bac",$bac,"lg",$lg,$main_sort_by);
					  ?></td>
                    </tr>
                    <tr>
                      <td width="1%" height="30" valign="middle" background="images/bg_icon.gif" class="tab_lr_5">
					<?
					include("inc/inc_jum_folder.php"); 
	
					$alpha="All";
					if(isset($HTTP_GET_VARS["alpha"]))
					{
						$alpha = $HTTP_GET_VARS["alpha"];
					}
					 
					 if($alpha=="All")
						    $sort=" ";
					 else
						    $sort=" and ten_$lg like '".$alpha."%'";

					if($suid==2)
					{	
						switch($bac)
						{
							case "1";
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ";
								break;
							case "2";
								$query = "Select * FROM  $tb_setup where ma_bac_2=$cat and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ";
								break;
							case "3";
								$query = "Select * FROM  $tb_setup where ma_bac_3=$cat and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ";
								break;
							case "4";
								$query = "Select * FROM  $tb_setup where ma_bac_4=$cat and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ";
								break;
							case "5";
								$query = "Select * FROM  $tb_setup where ma_bac_5=$cat and nguoi_viet=$ma_user_admin $sort ";
								break;
							default:
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ";							
								break;
						}
					}
					else
					{
						switch($bac)
						{
							case "1";
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 $sort ";
								break;
							case "2";
								$query = "Select * FROM  $tb_setup where ma_bac_2=$cat and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0  $sort ";
								break;
							case "3";
								$query = "Select * FROM  $tb_setup where ma_bac_3=$cat and ma_bac_4=0 and ma_bac_5=0 $sort ";
								break;
							case "4";
								$query = "Select * FROM  $tb_setup where ma_bac_4=$cat and ma_bac_5=0 $sort ";
								break;
							case "5";
								$query = "Select * FROM  $tb_setup where ma_bac_5=$cat $sort ";
								break;
							default:
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 $sort ";							
								break;
						}
    				}
					$result = mysql_query($query);
					$rs= mysql_fetch_array($result);
					$num = mysql_num_rows($result);
					$page_count =30; 
					$cut_off = 5; 
					$start=$HTTP_GET_VARS["start"];
					include("inc/phantrang.php");
					
					if($suid==2)
					{
						switch($bac)
						{
							case "1";
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin and nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "2";
								$query = "Select * FROM  $tb_setup where ma_bac_2=$cat and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin and nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "3";
								$query = "Select * FROM  $tb_setup where ma_bac_3=$cat and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin and nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "4";
								$query = "Select * FROM  $tb_setup where ma_bac_4=$cat and ma_bac_5=0 and  nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "5";
								$query = "Select * FROM  $tb_setup where ma_bac_5=$cat and nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							default:
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 and nguoi_viet=$ma_user_admin $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";							
								break;
						}					
					}
					else
					{
						switch($bac){
							case "1";
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "2";
								$query = "Select * FROM  $tb_setup where ma_bac_2=$cat and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "3";
								$query = "Select * FROM  $tb_setup where ma_bac_3=$cat and ma_bac_4=0 and ma_bac_5=0 $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "4";
								$query = "Select * FROM  $tb_setup where ma_bac_4=$cat and ma_bac_5=0 $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							case "5";
								$query = "Select * FROM  $tb_setup where ma_bac_5=$cat $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";
								break;
							default:
								$query = "Select * FROM  $tb_setup where ma_bac_1=$cat and ma_bac_2=0 and ma_bac_3=0 and ma_bac_4=0 and ma_bac_5=0 $sort ORDER BY thu_tu DESC LIMIT $start, $page_count ";							
								break;
						}
					}
					$result = mysql_query($query);
				    $i=0;
					$tem=0;
					?>					  </td>
                </tr>
                  </table>
