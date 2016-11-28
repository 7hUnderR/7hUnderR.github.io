<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$php_self = $_SERVER['PHP_SELF'];

switch($lg)
   {
		case "vn":
			$mr_tri = $_SERVER['QUERY_STRING'];
			if(!strstr("$mr_tri","lg"))
			$mr_tri = $mr_tri."&lg=vn"; 
			$mr_tri_1 = str_replace("lg=vn","lg=eg",$mr_tri);
			$mr_tri_2 = str_replace("lg=vn","lg=kr",$mr_tri);
			if($language_1==1 && $language_2==1)
				echo " [ Tiếng Việt ] ";
			if($language_2==1)
				echo "[ <a href='$php_self?$mr_tri_1' >English</a> ] ";
		    if($language_3==1)
				echo "[ <a href='$php_self?$mr_tri_2' >Korean</a> ] ";
			break;
			
		case "eg":
			$mr_tri = $_SERVER['QUERY_STRING'];
			$mr_tri_1 = str_replace("lg=eg","lg=vn",$mr_tri);
			$mr_tri_2 = str_replace("lg=eg","lg=kr",$mr_tri);
			if($language_1==1 && $language_2==1)
				echo " [ <a href='$php_self?$mr_tri_1' >Tiếng Việt</a> ] ";
			if($language_1==1 && $language_2==1)
				echo " [ English ] ";
			if($language_3==1)
				echo " [ <a href='$php_self?$mr_tri_2' >Korean</a> ] ";
			break;
			
		case "kr":
			$mr_tri = $_SERVER['QUERY_STRING'];
			$mr_tri_1 = str_replace("lg=kr","lg=vn",$mr_tri);
			$mr_tri_2 = str_replace("lg=kr","lg=eg",$mr_tri);
			if($language_1==1 && $language_2==1)
				echo " [ <a href='$php_self?$mr_tri_1' >Tiếng Việt</a> ] ";
			if($language_2==1)
				echo " [ <a href='$php_self?$mr_tri_2' >English</a> ] ";
			if($language_3==1)
				echo " [ Korean ] ";
			break;
			
		default:
			$mr_tri = $_SERVER['QUERY_STRING'];
			$mr_tri_1 = str_replace("lg=vn","lg=eg",$mr_tri);
			$mr_tri_2 = str_replace("lg=vn","lg=kr",$mr_tri);
			if($language_1==1 && $language_2==1)
				echo " [ Tiếng Việt ] ";
			if($language_2==1)
				echo " [ <a href='$php_self?$mr_tri_1' >English</a> ] ";
			if($language_3==1)
				echo " [ <a href='$php_self?$mr_tri_2' >Korean</a> ] ";	
			break;
	}
?>