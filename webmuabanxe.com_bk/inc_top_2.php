<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
	       <tr>
        <td valign="bottom" align="center" class="bg_top_left"><img src="" width="10" height="1" /></td>
        <td valign="bottom" align="center" class="bg_top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
	       <tr>
	         <td width="24%" rowspan="2" align="left" valign="middle" class="tab_left"><a href="./?lg=<?=$lg?>"><img src="styles/<?=$style_path?>/logo.gif" border="0" /></a></td>
	         <td width="76%" height="40" align="right" valign="middle" class="text_lg" style="padding-top: 15px; padding-right: 15px;"><? include("inc_search_form_thuong.php"); ?></td>
          </tr>
           <tr>
             <td height="31" align="right" valign="middle" class="text_lg tab_right">
             <? include("inc_menu_top.php"); echo""; ?>
|
<? 
	$language_1=gia_tri_mot_cot('tb_config','id',1,'language_1');
	$language_2=gia_tri_mot_cot('tb_config','id',1,'language_2');
	$language_3=gia_tri_mot_cot('tb_config','id',1,'language_3');
	
	if(($language_1==1) && ($language_2==1))
	   echo "$page_lg"; 
	if(($language_1==1) && ($language_3==1))
	   echo "$page_lg"; 
	if(($language_2==1) && ($language_3==1))
	   echo "$page_lg";
	?></td>
           </tr>
          
</table>
</td><td valign="bottom" align="center" class="bg_top_right"><img src="" width="10" height="1" /></td>
    </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="middle" width="190" class="bg_menu"></td><td align="left" valign="middle"><? include("menu_css/menu.php"); echo ""; ?></td>
        </tr>
</table>