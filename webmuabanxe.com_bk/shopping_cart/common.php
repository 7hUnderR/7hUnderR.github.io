<?
function lay_path_root($key)
{
 if($key=="server")
 $path="/home/hsphere/local/home/vanhaodi/hokhanh.com/images/photo/";
 else
 $path="D:/webtest/cothienlac/";
 return  $path;
}

function gai_tri_co_dk($table,$field,$dk,$trave)
{
	$giatri="";
	$tab=$table;
	$query="Select * FROM  $tab where $field=$dk";
	$result = mysql_query($query);
	$rs= mysql_fetch_array($result);
	$giatri=$rs["$trave"];
	return $giatri;
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

function cong_them($table,$id,$field_ct,$gt)
{
$query="Select * FROM  $table where id=$id";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num=$rs["$field_ct"];
$num=$num+$gt;

$query = "UPDATE $table SET diem='$num'";
$query .= "WHERE id =$id";
$result = mysql_query($query);
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

function select_mot_dong($table,$field,$dk)
{
$query = "Select * FROM  $table where $field=$dk";
$bien = mysql_query($query);
return $bien ; 
}
function select_hai_dong($table,$field,$dk,$field2,$dk2)
{
$query = "Select * FROM  $table where $field=$dk and $field2=$dk2";
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
	

function rep($user)
{
	$user=trim($user);
    $user=str_replace("'''","''",$user);
	return $user;
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
$query="Select * FROM  $tab where $field=$dk order by id DESC";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$num = mysql_num_rows($result);
return $num;
}

function gia_tri_mot_cot($table,$field,$dk,$field_tv)
{
$tab=$table;
$query="Select * FROM  $tab where $field=$dk";
$result = mysql_query($query);
$rs= mysql_fetch_array($result);
$giatri=$rs["$field_tv"];
return $giatri;
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

function sao_rating($d)
{
$sao="";
$diem=$d;
if($diem<=100)
$sao="<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>";
if(($diem>100)&&($diem<=200))
$sao="<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>";
if(($diem>200)&&($diem<=300))
$sao="<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>";
if(($diem>300)&&($diem<=400))
$sao="<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>";
if(($diem>400)&&($diem<=500))
$sao="<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star1.gif\" width=10 height=9 hspace=2>";
if($diem>500)
$sao="<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>
	<img src=\"images/star.gif\" width=10 height=9 hspace=2>";
return $sao;
}

function so_ngay($date_hh,$date_dang)
	{
		  $date_hh=$date_hh;
		  $date_dang=$date_dang;
		  $ngay_hh=trim_chuoi("$date_hh",0,2);
  		  $thang_hh=trim_chuoi("$date_hh",3,5);
  		  $nam_hh=trim_chuoi("$date_hh",6,8);
		 // echo"$ngay_hh , $thang_hh , $nam_hh<br>";
		 
		  $ngay_dang=trim_chuoi("$date_dang",0,2);
  		  $thang_dang=trim_chuoi("$date_dang",3,5);
  		  $nam_dang=trim_chuoi("$date_dang",6,8);
		 // echo"$ngay_dang , $thang_dang , $nam_dang<br>";
		  
		  if($nam_hh>$nam_dang)
		  {
		   if($thang_hh>=$thang_dang)
		   {	  
			$so_ngay=(30-$ngay_dang)+$ngay_hh+((($thang_hh-$thang_dang)-1)*30);
		    //echo"A So Ngay: $so_ngay";
		   }
		   if($thang_hh<=$thang_dang)
		   {	  
			$so_ngay=(30-$ngay_dang)+$ngay_hh+((11-($thang_dang-$thang_hh))*30);
   		    //echo"B So Ngay: $so_ngay";
		   }
		  }
		if($nam_hh==$nam_dang)
		   {
			$so_ngay=(30-$ngay_dang)+$ngay_hh+((($thang_hh-$thang_dang)-1)*30);
		   // echo"C So Ngay: $so_ngay";
		  }
		if($nam_hh<$nam_dang)
		   {
			$so_ngay=1;
		   // echo"C So Ngay: $so_ngay";
		  }
		  return $so_ngay;
    	}	
?>