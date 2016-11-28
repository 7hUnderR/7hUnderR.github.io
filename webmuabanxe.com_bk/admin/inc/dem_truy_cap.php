	<?
			function dem_truy_cap($ma_company)
			{
			 $ngay= date("F j, Y, g:i a");  
			 $ip = getenv("REMOTE_ADDR"); 
			 $sql="insert into tb_quanly_truycap(ma_company,ip,date_time)";
	         $sql .=" values('";			
	         $sql .=$ma_company."','";
	         $sql .=$ip."','";
             $sql .=$ngay."')";
			 $result = mysql_query($sql);
			}
     ?>
