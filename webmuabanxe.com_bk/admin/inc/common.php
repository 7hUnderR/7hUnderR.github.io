<?
$imgarray = array("image/pjpeg", "image/jpeg", "image/gif", "image/png", "application/msword","application/pdf","application/vnd.ms-excel","application/x-shockwave-flash", "application/octet-stream", "application/x-zip-compressed", "application/octet-stream","application/x-css"); 

function GetRootPath()
{
	$sSelfPath = realpath("index.php");

	$sSelfPath=str_replace("/index.php","",$sSelfPath);
	$sSelfPath=str_replace("\index.php","",$sSelfPath);
	
	$sSelfPath=str_replace("admin","",$sSelfPath);

	$sSelfPath=str_replace("\module_trac_nghiem","",$sSelfPath);
	$sSelfPath=str_replace("\module_help","",$sSelfPath);
	$sSelfPath=str_replace("\module_private_news","",$sSelfPath);
	$sSelfPath=str_replace("\module_forum","",$sSelfPath);
	$sSelfPath=str_replace("\module_dia_oc","",$sSelfPath);
	$sSelfPath=str_replace("\module_shopping_cart","",$sSelfPath);
	$sSelfPath=str_replace("/module_shopping_cart","",$sSelfPath);
	
	//$sSelfPath=str_replace('','',$sSelfPath);
	return $sSelfPath ;
}

function lay_path_root($key)
{
 if($key=="server")
 	$path="";
 else
 	$path=GetRootPath(); 
 return  $path;
}

function path_upload_mannager($key)
{
 $path="";
 if($key=="images")
   $path="data/upload_file/Image";
 if($key=="files")
   $path="data/upload_file/File";
 if($key=="flash")
   $path="data/upload_file/Flash";
 if($key=="styles")
   $path="styles";
 
 return  $path;
}

function cat_duong_dan_thua($text)
{
	$text = $text;
	//http://localhost/webtest/sino_pacific//
	//$text=str_replace("http://trade.hcm.fpt.vn/beta-webs/202/web_dienanh","/dienanh",$text);
	//$text=str_replace("/beta-webs/202/web_dienanh","/dienanh",$text);

	$text=str_replace("/ebro_silver_4","/beta-webs/299/web/FN012",$text);
	$text=str_replace("/ebro_silver_4","/beta-webs/299/web/FN012",$text);
	return $text;
}


function upload($file_form_name,$file_form,$file_del,$file_name,$file_ext,$path)
{
	$file_rename="";
	echo"$file_form<br>";
	echo"$path/$file_form<br>";
	if($file_form_name!="")
		 {
		 $file_rename=$file_name.$file_ext;
		 }
	else
	  {
	  if($file_del==1)
		 {
		  if(is_file("$path/$file_rename"))
			 unlink("$path/$file_rename");
		  $file_rename="";
		 }
	  }
	
	if($file_form_name!="")
		{
		 if (!is_uploaded_file($HTTP_POST_FILES["$file_form"]['tmp_name']))
		 echo "Possible file upload attack. Filename: " . $file_form_name."<br><br>";
		 move_uploaded_file($HTTP_POST_FILES["$file_form"]['tmp_name'], "$path/$file_form");
		 
		 if($file_form!="") 
			{
			if(is_file("$path/$file_rename"))
			unlink("$path/$file_rename");
			}
		 rename("$path/$file_form_name","$path/$file_rename");
		}
 return $file_rename;
}


function trim_dau($user)
{
	$user=trim($user);
    //$user=str_replace("'''","'\''",$user);
   // $user=str_replace('\"',"",$user);
	$user=str_replace("\'","~",$user);
    $user=str_replace('\"',"",$user);
	return $user;
}
function rep_vao($user)
{
	$user=trim($user);
    $user=str_replace("'","~",$user);
	$user=str_replace('"',"~~",$user);
	return $user;
}
function rep_ra($user)
{
	$user=trim($user);
    $user=str_replace("~","'",$user);
	//$user=str_replace("~~",'"',$user);
	return $user;
}
function chuan_php($user)
{
	$user=trim($user);
    $user=str_replace("'","\'",$user);
	return $user;
}

function rep($user)
{
	$user=trim($user);
    //$user=str_replace("'''","''",$user);
	$user=str_replace("'","\'",$user);
	return $user;
}
function cut_ky_tu($user,$kt)
{
	$user=trim($user);
	$user=str_replace("$kt"," ",$user);
	return $user;
}

	function vitri_chuoi($s,$s_tim,$num)
	{
	$k=0;
	$tam="";
	$myLength = strlen($s);
	for ( $i = 0; $i < $myLength; ++$i )
	{   
		$ch = $s{$i};
		if($ch==$s_tim)
		  { 
		   $k++;
		   if($k==$num)
			   {
			   $tam=$i;
			   }
		  }
	}
	return $tam;
	}	
	
	function trim_chuoi($s,$bd,$kt)
	{
	$k=0;
	$tam="";
	$myLength = strlen($s);
	for ( $i = 0; $i < $myLength; ++$i )
	{   
		$ch = $s{$i};
		  $k++;
		   if(($k>$bd))
			   {
			   if($k<=$kt)
				  {
				  $tam.=$ch;
				  } 		   
			   }
	}
	return $tam;
	}	
	
	function lay_product($s,$num)
	{
	$bd=vitri_chuoi($s,",",$num);
	$bd++;
	$num2=$num+1;
	$kt=vitri_chuoi($s,",",$num2);
	$tim= trim_chuoi($s,$bd,$kt); 
	return $tim;
	}

	function lay_id($s,$num)
	{
	$bd=vitri_chuoi($s,"|",$num);
	$bd++;
	$num2=$num+1;
	$kt=vitri_chuoi($s,"|",$num2);
	$tim= trim_chuoi($s,$bd,$kt); 
	return $tim;
	}


function la_so($s)
{
$k=0;
$myLength = strlen($s); 
for ( $i = 0; $i < $myLength; ++$i )
{   
    $ch = $s{$i};
	$tam=ord($ch); // echo "$tam <br>";
	if(($tam==48)||($tam==49)||($tam==50)||($tam==51)||($tam==52)||($tam==53)||($tam==54)||($tam==55)||($tam==56)||($tam==57))
	  { 
	   $k++;
	  }
}
if($k==$myLength) return 1; 
else  return 0;
}	

function select_ko_dk($table,$order_by,$sort)
{
$query = "Select * FROM  $table order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_co_dk($table,$field,$dk,$order_by,$sort)
{
$query = "Select * FROM  $table where $field=$dk order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_co_2dk($table,$field,$dk,$field2,$dk2,$order_by,$sort)
{
$query = "Select * FROM  $table where $field=$dk and $field2=$dk2 order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_co_3dk($table,$field,$dk,$field2,$dk2,$field3,$dk3,$order_by,$sort)
{
$query = "Select * FROM  $table where $field=$dk and $field2=$dk2 and $field3=$dk3 order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_co_dk_1in($table,$field,$dk,$field_in,$dk_in,$order_by,$sort)
{
$query = "Select * FROM  $table where $field=$dk and $field in ('$dk_in') order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_co_2dk_1in($table,$field,$dk,$field2,$dk2,$field_in,$dk_in,$order_by,$sort)
{
$query = "Select * FROM  $table where $field=$dk and $field2=$dk2 and $field_in in ('$dk_in') order by $order_by $sort";
$bien = mysql_query($query);
return $bien ; 
}

function select_mot_dong($table,$field,$dk)
{
$query = "Select * FROM  $table where $field=$dk";
$bien = mysql_query($query);
return $bien ; 
}

function delete($table,$field_dk,$dk,$chuoi_return)
{
	$query = "DELETE FROM $table ";
	$query .= "WHERE $field_dk = $dk";
	if($result = mysql_query($query))
	echo" $chuoi_return";
}

function kim_tra_edit_khong($table_f,$num_f)
{
	$tam_f=0;
	$query_f="Select * FROM  $table_f where ma_company=$num_f";
	$result_f = mysql_query($query_f);
	while($rs_f= mysql_fetch_array($result_f))
	{
	$activate=$rs_f["activate"];
	if($activate==0) $tam_f=1;
	}
	return $tam_f;
}

function KimTraAll($ma_company)
{
 $tam=0;
 $k_aboutus=kim_tra_edit_khong("tb_company_aboutus_edit",$ma_company);
 $k_profile=kim_tra_edit_khong("tb_company_profile_edit",$ma_company);
 $k_inform=kim_tra_edit_khong("tb_company_edit",$ma_company);
 $k_logo=kim_tra_edit_khong("tb_company_logo_edit",$ma_company);
 $k_images=kim_tra_edit_khong("tb_gold_company_images_edit",$ma_company);
 $k_product=kim_tra_edit_khong("tb_product_edit",$ma_company);
 if(($k_aboutus==1)||($k_profile==1)||($k_inform==1)||($k_logo==1)||($k_images==1)||($k_product==1))
 $tam=1;
 return $tam;
}

function repl($str)
{
	return str_replace("'''","''",$str);
}
function chuan_ten($text)
{
	$text = $text;
	$text=str_replace(" ","-",$text);
	$text=$text.".html";
	return $text;
}
function chuan_hoa_chuoi($s)
{
$tam="";
$myLength = strlen( $s );
for ( $i = 0; $i < $myLength; ++$i )
{   
    
    $ch = $s{ $i };
	$num=ord($ch);
	if($num==13) 
	  $tam=$tam."<br>";
	$tam=$tam.$ch;
}
return $tam;
}

function trim_to_f_chuoi($s,$num)
{
$chuoi="";
$null=0;
$myLength = strlen( $s );
for ( $i = 0; $i < $myLength; ++$i )
{   
 	$ch = $s{ $i };
	if($ch==' ') $null++;
	if(($null<$num))
	  {
	   $chuoi.=$ch;
	  }
}
return $chuoi;
}
 
function trim_to_n_chuoi($s,$num)
{
$chuoi="";
$null=0;
$myLength = strlen( $s );
for ( $i = 0; $i < $myLength; ++$i )
{   
 	$ch = $s{ $i };
	if($ch==' ') $null++;
	if(($null>=$num))
	  {
	   $chuoi.=$ch;
	  }
}
return $chuoi;
}
 
function getFirstWords($string, $number)
	{
		$strResult = '' ;
		$arrstr = str_word_count($string,1);
		for ($i = 0; $i <= $number-1; $i++) 
		{
			$strResult .= $arrstr[$i] . " ";
		}
		$strResult .= '...';
		return $strResult;
	}
	
function min_id($table,$field)
{
$tab=$table;
$query="Select * FROM  $tab order by id ASC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$top=$rs["$field"];
return $top;
}

function max_id($table,$field)
{
$tab=$table;
$query="Select * FROM  $tab order by id DESC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$top=$rs["$field"];
return $top;
}

function max_cot($table,$field)
{
$tab=$table;
$query="Select * FROM  $tab order by $field DESC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$top=$rs["$field"];
return $top;
}

function max_cat_dk($table,$field,$dk,$field_tv)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk order by id DESC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$bottom=$rs["$field_tv"];
return $bottom;
}

function min_cat_dk($table,$field,$dk,$field_tv)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk order by id ASC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$bottom=$rs["$field_tv"];
return $bottom;
}

function dem_max_dk($table,$field,$dk)
{
$tab=$table;
$query="Select * FROM  $tab where $field='$dk'";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}

function dem_max_2dk($table,$field,$dk,$field2,$dk2)
{
$tab=$table;
$query="Select * FROM  $tab where $field='$dk' and $field2='$dk2'";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}

function dem_max_3dk($table,$field,$dk,$field2,$dk2,$field3,$dk3)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk and $field2=$dk2 and $field3=$dk3";
//echo $query;
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}
function dem_max_4dk($table,$field,$dk,$field2,$dk2,$field3,$dk3,$field4,$dk4)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk and $field2=$dk2 and $field3=$dk3 and $field4=$dk4 ";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}
function dem_max_6dk($table,$field,$dk,$field2,$dk2,$field3,$dk3,$field4,$dk4,$field5,$dk5,$field6,$dk6)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk and $field2=$dk2 and $field3=$dk3 and $field4=$dk4 and $field5=$dk5 and $field6=$dk6 ";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}
function dem_max_1b_1k($table,$field_b,$dk_b,$field_k,$dk_k)
{
$tab=$table;
$query="Select * FROM  $tab where $field_b=$dk_b and $field_k!=$dk_k";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}
function dem_max_1b_2k($table,$field_b,$dk_b,$field_k,$dk_k,$field_k_2,$dk_k_2)
{
$tab=$table;
$query="Select * FROM  $tab where $field_b=$dk_b and $field_k!=$dk_k and $field_k_2!=$dk_k_2";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}

function gia_tri_mot_cot($table,$field,$dk,$field_tv)
{
	$tab=$table;
	$query="Select * FROM  $tab where $field=$dk order by thu_tu ASC";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$giatri=$rs["$field_tv"];
	if(mysql_num_rows($result)>0)
	return $giatri;
	else
	return 0;
}
function gia_tri_mot_cot_2dk($table,$field,$dk,$field2,$dk2,$field_tv)
{
	$tab=$table;
	$query="Select * FROM  $tab where $field=$dk and $field2=$dk2  order by thu_tu ASC ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$giatri=$rs["$field_tv"];
	if(mysql_num_rows($result)>0)
	return $giatri;
	else
	return 0;
}
function gia_tri_mot_cot_3dk($table,$field,$dk,$field2,$dk2,$field3,$dk3,$field_tv)
{
	$tab=$table;
	$query="Select * FROM  $tab where $field=$dk and $field2=$dk2 and $field3=$dk3 order by thu_tu ASC ";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$giatri=$rs["$field_tv"];
	if(mysql_num_rows($result)>0)
	return $giatri;
	else
	return 0;
}

function insert_mot_cot($table,$field,$giatri)
{
	if(dem_max_dk($table,$field,$giatri)==0)
	{
	$sql="insert into $table($field)";
	$sql .=" values('$giatri')";			
	$result = mysql_query($sql);
    }
}

function Separate($lsX,$lsY)
{
   $x= strpos($lsX, $lsY,1)+strlen($lsY)+1; 	
   $y= strpos($lsX,"(",$x-1);  
   return substr($lsX,$x,$y-$x-1);
}

function gui_email($mail_to,$mail_from,$subject,$message,$thanks)
{
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "To: $mail_to \r\n"; 
	$headers .= "From: < $mail_from > \r\n";
	
	if(@mail($mail_to,$subject,$message,$headers))
	   {
		   echo"$thanks";
	   }
}




function delete_file($file)
{
 if(is_file("$file"))
	unlink("$file"); 
}

function delete_db_in($table,$field,$dk)
	{
		$query = "DELETE FROM $table WHERE $field in ('$dk')";
		$result = mysql_query($query);
	}

function ran_dom( $nameLength ) 
{
 $NameChars = 'abcdefghijklmnopqrstuvwxyz0123456789';
 $Vouel = 'aeiou';
 $Name = "";
 for ($index = 1; $index <= $nameLength; $index++) 
 { 
    if ($index % 3 == 0)
    {
      $randomNumber = rand(1,strlen($Vouel));
      $Name .= substr($Vouel,$randomNumber-1,1); 
    }else
      {
        $randomNumber = rand(1,strlen($NameChars));
        $Name .= substr($NameChars,$randomNumber-1,1);
      } 
 }
 return $Name;
}


function encode($text) 
{
$text=str_replace("","&Agrave;",$text);
$text=str_replace("","&Aacute;",$text);
$text=str_replace("","&Eacute;",$text);
$text=str_replace("","&Ecirc;",$text);
$text=str_replace("","&Igrave;",$text);
$text=str_replace("","&Iacute;",$text);
$text=str_replace("","&Ograve;",$text);
$text=str_replace("","&Oacute;",$text);
$text=str_replace("","&Ocirc;",$text);
$text=str_replace("","&Otilde;",$text);
$text=str_replace("","&Ugrave;",$text);
$text=str_replace("","&Uacute;",$text);
$text=str_replace("","&Yacute;",$text);
$text=str_replace("","&agrave;",$text);
$text=str_replace("","&aacute;",$text);
$text=str_replace("","&eacute;",$text);
$text=str_replace("","&ecirc;",$text);
$text=str_replace("","&igrave;",$text);
$text=str_replace("","&iacute;",$text);
$text=str_replace("","&ograve;",$text);
$text=str_replace("","&oacute;",$text);
$text=str_replace("","&ocirc;",$text);
$text=str_replace("","&otilde;",$text);
$text=str_replace("","&ugrave;",$text);
$text=str_replace("","&uacute;",$text);
$text=str_replace("","&yacute;",$text);
return $text;
}


function lay_ext($local_file) 
  { 
	$ext_array =explode(".",$local_file);
	$last_position = count($ext_array) - 1  ; 
	$extension = $ext_array[$last_position] ;
	return $extension;
  }
  
function lay_email($s,$num)
{
$bd=vitri_chuoi($s,",",$num);
$bd++;
$num2=$num+1;
$kt=vitri_chuoi($s,",",$num2);
$tim= trim_chuoi($s,$bd,$kt); 
return $tim;
}

//----------------------------------Start code thumnail image hinh anh theo chieu ngang
 
function thumbnailx($source_file,$destination_file,$type,$width,$height)
{
// $source_path="uploadimages/";
// $destination_path="uploadimages/thumbnail/";
 $new_w=$width; 
 $new_h=$height;  
 if($type=="image/pjpeg")
     $srcimg=imagecreatefromjpeg($source_file) or die("Problem In opening Source Image");
 if($type=="image/gif") 
     $srcimg=imagecreatefromgif($source_file) or die("Problem In opening Source Image"); 
 if($type=="image/png") 
     $srcimg=imagecreatefrompng($source_file) or die("Problem In opening Source Image"); 
//  
 
 $old_x=imagesx($srcimg); //Width
 $old_y=imagesy($srcimg); //height
  $thumb_w=$old_x;
 $thumb_h = $old_y; 

 if ($old_x>$new_w){
  $thumb_w=$new_w;
  $thumb_h = $old_y*($new_w/$old_x); 
 }
 
  //End code copy another
 $destimg=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image");  
 imagecopyresampled($destimg,$srcimg,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y) or die("Problem In resizing"); 
 
 if($type=="image/pjpeg") 
   imagejpeg($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/gif")
   imagegif($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/png")
   imagepng($destimg,$destination_file) or die("Problem In saving");
 
}
//End code thumnail image

function thumbnaily($source_file,$destination_file,$type,$width,$height)
{
// $source_path="uploadimages/";
// $destination_path="uploadimages/thumbnail/";
 $new_w=$width; 
 $new_h=$height;  
 if($type=="image/pjpeg")
     $srcimg=imagecreatefromjpeg($source_file) or die("Problem In opening Source Image");
 if($type=="image/gif") 
     $srcimg=imagecreatefromgif($source_file) or die("Problem In opening Source Image"); 
 if($type=="image/png") 
     $srcimg=imagecreatefrompng($source_file) or die("Problem In opening Source Image"); 
//  
 
 $old_x=imagesx($srcimg); //Width
 $old_y=imagesy($srcimg); //height
  $thumb_w=$old_x;
  $thumb_h = $old_y; 

 if ($old_y>$new_h){
  $thumb_h=$new_h;
  $thumb_w = $old_x*($new_h/$old_y); 
 }
 
  //End code copy another
 $destimg=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image");  
 imagecopyresampled($destimg,$srcimg,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y) or die("Problem In resizing"); 
 
 if($type=="image/pjpeg") 
   imagejpeg($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/gif")
   imagegif($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/png")
   imagepng($destimg,$destination_file) or die("Problem In saving");
 
}
//End code thumnail image

//----------------------------------Start code thumnail image hinh anh theo chieu ngang va chieu doc
function thumbnailxy($source_file,$destination_file,$type,$width,$height)
{
// $source_path="uploadimages/";
// $destination_path="uploadimages/thumbnail/";
 $new_w=$width; 
 $new_h=$height;  
// print "<br> new_w ".$new_w;
// print "<br> new_h ".$new_h;
 if($type=="image/pjpeg")
	  $srcimg=imagecreatefromjpeg($source_file) or die("Problem In opening Source Image");
 if($type=="image/gif") 
	 $srcimg=imagecreatefromgif($source_file) or die("Problem In opening Source Image"); 
 if($type=="image/png") 
	 $srcimg=imagecreatefrompng($source_file) or die("Problem In opening Source Image"); 
//  
 
 $old_x=imagesx($srcimg);
 $old_y=imagesy($srcimg);
 //Start code copy another/
 
 if ($old_x > $old_y) 
  {
  $thumb_w=$new_w;
  $thumb_h=$old_y*($new_h/$old_x);
  }
 if ($old_x < $old_y) 
  {
  $thumb_w=$old_x*($new_w/$old_y);
  $thumb_h=$new_h;
  }
 if ($old_x == $old_y) 
  {
  $thumb_w=$new_w;
  $thumb_h=$new_h;
  }
 
 //End code copy another
 $destimg=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image");  
 imagecopyresampled($destimg,$srcimg,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y) or die("Problem In resizing"); 
 
 if($type=="image/pjpeg") 
	imagejpeg($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/gif")
	imagegif($destimg,$destination_file) or die("Problem In saving");
 if($type=="image/png")
	imagepng($destimg,$destination_file) or die("Problem In saving");
 
}
//End code thumnail image
 
 function thumbnail_cut($source_file,$destination_file,$type,$width,$height)
	{
		$image = $source_file; // name/location of original image.
		$new_image = $destination_file; // name/location of generated thumbnail.

		 if($type=="image/pjpeg")
			  $src_img = ImageCreateFromJPEG($image); // make 'connection' to image
		 if($type=="image/gif") 
		     $src_img = ImageCreateFromGIF($image); // make 'connection' to image
		 if($type=="image/png") 
			 $src_img = ImageCreateFromPNG($image); // make 'connection' to image

		
		
		$quality = 100; //quality of the .jpg
		$src_width = imagesx($src_img); // width original image
		$src_height = imagesy($src_img); // height original image
		$dest_width = $width; //width thumbnail (image will scale down completely to this width)
		$dest_height = $height; //max height of the thumbnail
		$ar = $dest_width / $dest_height; // aspect ratio
		$divX = $src_width / $dest_width; // factor to calculate the scaled down height
		if($src_height / $divX <= $dest_height){ //if the scaled down height is smaller than the thumbnail max height
		$y = 0; // don`t center crop (there is nothing to center)
		$dest_height = $src_height / $divX; // keep the original scaled down height
		$cropheight = $src_height; // set the cropheight to the original image height (there is nothing to be cropped)
		}else{
		$cropheight = $src_width / $ar; //maintain the proper thumbnail aspect ratio
		$y = $src_height / $divX; //calculate the scaled down height
		$y = ($y - $dest_height) * $divX / 2; //substract the thumbnail height from the scaled down original height than divide by 2 (for centering the crop to the proper height)
		}
		$dest_img = imagecreatetruecolor($dest_width,$dest_height); 
		imagecopyresampled($dest_img, $src_img, 0, 0, 0 ,$y, $dest_width, $dest_height, $src_width, $cropheight); 
		
		
		 if($type=="image/pjpeg")
			  imagejpeg($dest_img, $new_image, $quality); 
		 if($type=="image/gif") 
		      imagegif($dest_img, $new_image, $quality); 
		 if($type=="image/png") 
			  imagepng($dest_img, $new_image, $quality); 

		imagedestroy($src_img); 
		imagedestroy($dest_img);
	} 

 function thumb($thumbnail,$width,$height,$type,$source_file,$destination_file)
	{
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
    }
	/*function fsize($file) {
	 return number_format(filesize($file)/1024)." KB";
	}*/
	
	function fsize($file) {
	
	// Does the file exist?
	if(is_file($file)){
	
	//Setup some common file size measurements.
	$kb=1024;
	$mb=1048576;
	$gb=1073741824;
	$tb=1099511627776;
	
	//Get the file size in bytes.
	$size = filesize($file);
	
	//Format file size
	
	if($size < $kb) {
	return $size." B";
	}
	else if($size < $mb) {
	return round($size/$kb,2)." KB";
	}
	else if($size < $gb) {
	return round($size/$mb,2)." MB";
	}
	else if($size < $tb) {
	return round($size/$gb,2)." GB";
	}
	else {
	return round($size/$tb,2)." TB";
	}
	}
	}

	function write_file($filename,$somecontent)
	{
		if (is_writable($filename))
		{
			if (!$handle = fopen($filename, 'a')) 
			{
				 print "<br>Cannot open file ($filename)";
				 exit;
			}
			if (!fwrite($handle, $somecontent)) 
			{
				print "<br>Cannot write to file ($filename)";
				exit;
			}
				fclose($handle);
		} 
		else
		{
			print "<br>The file $filename is not writable";
		}
	}

	function is_email($str){
		$pos = strpos($str,"@");
		if($pos==false){
			return 0;
		}
		$user = substr($str,0,$pos);
		$domain = substr($str,$pos+1);
		$pos = strrpos($domain,".");
		if($pos==false){
			return 0;
		}
		$subdomain = substr($domain,0,$pos);
		$topdomain = substr($domain,$pos+1);
		return ((is_topdomain($topdomain))&&(is_subdomain($subdomain))&&(is_subdomain($user)));
	}
	function is_topdomain($str){
		$str = strtolower($str);
		if(ereg("^(ad|ae|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|fx|ga|gb|gov|gd|ge|gf|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nato|nc|ne|net|nf|ng|ni|nl|no|np|nr|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$",$str)){
			return 1;
			} else {
			return 0;
		}
	}
	function is_subdomain($str){
		$str = strtolower($str);
		if(ereg("^([a-zA-Z0-9_-]+(\.?[a-zA-Z0-9_-]+)*)$",$str)){
			return 1;
			} else {
			return 0;
		}
	}	

?>