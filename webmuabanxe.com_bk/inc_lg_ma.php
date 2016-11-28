<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$php_self = $_SERVER['PHP_SELF'];
$language_1=gia_tri_mot_cot('tb_config','id',1,'language_1');
$language_2=gia_tri_mot_cot('tb_config','id',1,'language_2');
$language_3=gia_tri_mot_cot('tb_config','id',1,'language_3');
$page_lg="";

$mr_tri = $_SERVER['QUERY_STRING'];
if(!$mr_tri)
 {
 $mr_tri ="Acat=1&lg=vn&start=0";
 $lg="vn";
 }
if(isset($HTTP_GET_VARS["lg"]))
   $lg=$HTTP_GET_VARS["lg"];



switch($lg)
   {
		case "vn":
			if(!strstr("$mr_tri","lg"))
			$mr_tri = $mr_tri."&lg=vn"; 
			$mr_tri_1 = str_replace("lg=vn","lg=eg",$mr_tri);
			$mr_tri_2 = str_replace("lg=vn","lg=kr",$mr_tri);
			if(($language_1==1) && ($language_2==1) && ($language_3==0))
				{
				$page_lg="Ngôn ngữ: <img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				}
			if(($language_1==1) && ($language_2==1) && ($language_3==1))
				{
				$page_lg="Ngôn ngữ: <img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_2' ><img src=\"images/icon/flg_kr.gif\" border=\"0\" align=\"absmiddle\"/></a> ";
				}
			break;
			
		case "eg":
			$mr_tri_1 = str_replace("lg=eg","lg=vn",$mr_tri);
			$mr_tri_2 = str_replace("lg=eg","lg=kr",$mr_tri);
			if($language_1==1 && $language_2==1 && $language_3==0)
				{
				$page_lg="Language: <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/>";
				}
			if($language_1==1 && $language_2==1 && $language_3==1)
				{
				$page_lg="Language: <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_2' ><img src=\"images/icon/flg_kr.gif\" border=\"0\" align=\"absmiddle\"/></a> ";
				}
			break;
			
		case "kr":
			$mr_tri_1 = str_replace("lg=kr","lg=vn",$mr_tri);
			$mr_tri_2 = str_replace("lg=kr","lg=eg",$mr_tri);

			if($language_1==1 && $language_2==1 && $language_3==1)
				{
				$page_lg="Language: <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_2' ><img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <img src=\"images/icon/flg_kr.gif\" border=\"0\" align=\"absmiddle\"/> ";
				}
			break;
			
		default:
			$mr_tri_1 = str_replace("lg=vn","lg=eg",$mr_tri);
			$mr_tri_2 = str_replace("lg=vn","lg=kr",$mr_tri);
			if($language_1==1 && $language_2==1 && $language_3==0)
				{
				$page_lg="Ngôn ngữ: <img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				}
			if($language_1==1 && $language_2==1 && $language_3==1)
				{
				$page_lg="Ngôn ngữ: <img src=\"images/icon/flg_vn.jpg\" border=\"0\" align=\"absmiddle\"/>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_1' ><img src=\"images/icon/flg_eg.jpg\" border=\"0\" align=\"absmiddle\"/></a>";
				$page_lg=$page_lg." <a href='$php_self?$mr_tri_2' ><img src=\"images/icon/flg_kr.gif\" border=\"0\" align=\"absmiddle\"/></a> ";
				}
			break;
	}
?>