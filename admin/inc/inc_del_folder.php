<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? 
if($suid==1)
{
 if(($num_==0)&&($num_item==0)) 
  echo"<input type=checkbox name=\"chkid\" value=\"$ma_bac_1\" onClick=\"docheckone();\">$view_item_select"; 
 else
  echo"<input type=checkbox name=\"null\" disabled=\"disabled\">$view_item_select"; 
} 
 ?>
