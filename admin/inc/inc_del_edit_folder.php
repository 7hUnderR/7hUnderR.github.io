<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? 
if($suid==1)
{
echo"<a href=\"admin_edit.php?cat=$cat&alpha=$alpha&start=$start&id=$rs[id]&ma_edit=catalog&bac=$bac\"><img src=\"images/edit.gif\" alt=\"Edit\" border=\"0\"></a><br>";
 if(($num_==0)&&($num_item==0)) 
	 { 
		 echo"<a href=\"admin_delete_wait.php?cat=$cat&bac=$bac&id=$rs[id]&alpha=$alpha&start=$start&ma_del=catalog\"><img src=\"images/del.jpg\" width=21 height=21 border=0 alt=Delete></a>"; 
	 } 
} 
 ?>
