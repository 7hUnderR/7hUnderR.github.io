<?
	// DEM CLICK cho tung MODULE
	//dem_truy_cap($cat,$cat_s,$cat_s_s,$cat_s_s_s,$cat_s_s_s_s); 
	
	if(!session_is_registered("dem_truy_cap"))
		{
			$dem_truy_cap =1;
			$HTTP_SESSION_VARS['dem_truy_cap'] = $dem_truy_cap;
		
			$project_visitors=$project_visitors+1;
			$query = "UPDATE tb_config_site SET project_visitors='$project_visitors' ";
			$query .= "WHERE id=1 ";
			$result = mysql_query($query);
		}
	$dtc=gia_tri_mot_cot("tb_config_site","id",1,"project_visitors");
	
	function dem_truy_cap($ma_bac_1,$ma_bac_2,$ma_bac_3,$ma_bac_4,$ma_bac_5)
	{
	 $ngay= date("Y/m/d"); 
	 $gio= date("g:i a"); 
	 $browser=$_SERVER['HTTP_USER_AGENT'];
	 $ip = $_SERVER['REMOTE_ADDR'];
	 
	 $query=" Select * FROM  tb_quanly_truycap where 
	 ma_bac_1='$ma_bac_1'
	 and ma_bac_2='$ma_bac_2' 
	 and ma_bac_3='$ma_bac_3'
	 and ma_bac_4='$ma_bac_4'
	 and ma_bac_5='$ma_bac_5'
	 and date='$ngay'
	 ";
	 $result = mysql_query($query);
	 $rs= mysql_fetch_array($result);
	 $num_row = mysql_num_rows($result);
	 $visitors=$rs["visitors_num"];
	
		 if($num_row==0)
		 {
			 $visitors_num=1;
			 $sql="insert into tb_quanly_truycap(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,visitors_num,ip,browser,time,date)";
			 $sql .=" values('";			
			 $sql .=$ma_bac_1."','";
			 $sql .=$ma_bac_2."','";
			 $sql .=$ma_bac_3."','";
			 $sql .=$ma_bac_4."','";
			 $sql .=$ma_bac_5."','";
			 $sql .=$visitors_num."','";
			 $sql .=$ip."','";
			 $sql .=$browser."','";
			 $sql .=$gio."','";
			 $sql .=$ngay."')";
			 $result = mysql_query($sql);
		 }
		 else
		 {
			$visitors_num=$visitors + 1;
			$query = " UPDATE tb_quanly_truycap SET visitors_num='$visitors_num' ";
			$query .= " WHERE ma_bac_1='$ma_bac_1'
			and ma_bac_2='$ma_bac_2'
			and ma_bac_3='$ma_bac_3'
			and ma_bac_4='$ma_bac_4'
			and ma_bac_5='$ma_bac_5'
			and date='$ngay' ";
			$result = mysql_query($query);
		 }
	 $sql="insert into tb_quanly_truycap_s(ma_bac_1,ma_bac_2,ma_bac_3,ma_bac_4,ma_bac_5,ip,browser,time,date)";
	 $sql .=" values('";			
	 $sql .=$ma_bac_1."','";
	 $sql .=$ma_bac_2."','";
	 $sql .=$ma_bac_3."','";
	 $sql .=$ma_bac_4."','";
	 $sql .=$ma_bac_5."','";
	 $sql .=$ip."','";
	 $sql .=$browser."','";
	 $sql .=$gio."','";
	 $sql .=$ngay."')";
	 $result = mysql_query($sql);
	}
	?>
