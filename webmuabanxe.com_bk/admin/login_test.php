<?  
	ob_start();
	session_start();	//$HTTP_SESSION_VARS[
	require("inc/dbconnect.php");
	include("inc/common.php");
	$txtUser=$HTTP_POST_VARS["txtUser"];
    $txtPWD=$HTTP_POST_VARS["txtPWD"];
	$txtPWD=md5($txtPWD);
	
	$sql="select quyen,user,pass,ma_user,activate from tb_admin where user='".$txtUser."'";	
	$result = mysql_query($sql);
	$i = mysql_num_rows($result);
	if($i)
	{
		$row=mysql_fetch_row($result);
		if($row[2]==$txtPWD)				
		{						
			if($row[4]==1)
			{
				$project_path=gia_tri_mot_cot("tb_config","id",1,"project_path");
				$HTTP_SESSION_VARS['project_path'] = $project_path;
				$HTTP_SESSION_VARS['suid'] = $row[0];
				$HTTP_SESSION_VARS['susername_mjmaxx'] = $row[1];
				$HTTP_SESSION_VARS['ma_user_admin'] = $row[3];
				$HTTP_SESSION_VARS['key'] = 1;
				header("Location: index.php?cat=0&alpha=All&start=0&2b");
				}
			else
			{
				$suid=-3;
	  			$HTTP_SESSION_VARS['suid'] = $suid;
				$HTTP_SESSION_VARS['key'] = 1;
				//echo'<meta http-equiv="refresh" content="2;url=login.php">';
				header("Location: login.php");
			}
		}
		else
		{
			$suid=-1;
			$HTTP_SESSION_VARS['suid'] = $suid;
			$HTTP_SESSION_VARS['key'] = 1;
			//echo'<meta http-equiv="refresh" content="2;url=login.php">';
			header("Location: login.php");
		}
		
	}
	else
	{
		$suid=-2;
		$HTTP_SESSION_VARS['suid'] = $suid;
		$HTTP_SESSION_VARS['key'] = 1;
		//echo'<meta http-equiv="refresh" content="2;url=login.php">';
		header("Location: login.php");
	}

	mysql_close();
	ob_end_flush();
?>
