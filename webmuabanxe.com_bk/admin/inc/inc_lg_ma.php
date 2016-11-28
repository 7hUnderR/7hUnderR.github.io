<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$language_1=gia_tri_mot_cot('tb_config','id',1,'language_1');
$language_2=gia_tri_mot_cot('tb_config','id',1,'language_2');
$language_3=gia_tri_mot_cot('tb_config','id',1,'language_3');

if(($language_1==1) && ($language_2!=1) && ($language_3!=1))
 $lg="vn";
if(($language_1!=1) && ($language_2==1) && ($language_3!=1))
 $lg="eg";
if(($language_1!=1) && ($language_2!=1) && ($language_3==1))
 $lg="kr";
 
if(($language_1==1) && ($language_2==1) && ($language_3!=1))
 $lg="vn";
if(($language_1==1) && ($language_2==1) && ($language_3==1))
 $lg="vn";

?>