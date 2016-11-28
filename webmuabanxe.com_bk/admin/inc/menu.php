<? 
include("menu_left_catalog.php");
?>
<SCRIPT language=javascript src="<?=$path_tuyet_doi?>/inc/menu_left_common.js"></SCRIPT>
<SCRIPT language=javascript src="<?=$path_tuyet_doi?>/inc/menu_left_validate.js"></SCRIPT>
<SCRIPT language=javascript src="<?=$path_tuyet_doi?>/inc/menu_left_jsWap.js"></SCRIPT>
<SCRIPT language=javascript src="<?=$path_tuyet_doi?>/inc/menu_left_link.js"></SCRIPT>

<SCRIPT language=javascript>
	setCookie('file_id','');
	setCookie('file_id_sub','');
</SCRIPT>
<TABLE cellSpacing=0 cellPadding=1 width="100%" border=0>
	<tr>
	<td height="25" valign="middle" align="center" class="tab_left_5">
	Welcome: <? echo"$susername";?> 
	</td>
	</tr>
	<? 
	
	$i=0;
	if($ma_user_admin==1)
	   $query = "Select * FROM  tb_setup_menu order by menu_sort ASC";
	else
	   {
	   if($suid==1)
	     $query = "Select * FROM  tb_setup_menu where menu_activate=1 and menu_type=1 order by menu_sort ASC";
	   else
	     $query = "Select * FROM  tb_setup_menu where menu_activate=1 and menu_quyen!=1 order by menu_sort ASC";
	   }
		
	$result = mysql_query($query);
	while($rs= mysql_fetch_array($result))
	{
		$id=$rs["id"];
		$menu_ten=$rs["menu_ten"];
		
		$query_ = "Select * FROM  tb_setup_menu_s where ma_id_s=$id and menu_activate=1 order by menu_sort ASC ";
		
		$result_ = mysql_query($query_);
		$num = mysql_num_rows($result_);
		
		if($num>0)
		  $link="javascript:;";
		else
		{  
		if(strstr($rs["menu_link"],"?"))
		  $link=$link_root."/admin/".$rs["menu_link"]."&menu=$id";
		else
		  $link=$link_root."/admin/".$rs["menu_link"]."?menu=$id";
		}
		if($menu==$id)
		   //$class="class=\"menu\"";
		   $class="class=\"menu_visit\"";
		else
		   $class="class=\"menu\"";
	?>
	<TR>
	<TD <?=$class?> >
	<A onclick="doAction('<?=$id?>');" href="<?=$link?>"><img src="<?=$path_tuyet_doi?>/images/exp_right.gif" border="0" align="absmiddle"> <?=$menu_ten?></A>	</TD>
	</TR>
	<SCRIPT language=javascript>
	var url_link = 'index.php';
	var url_id = '<?=$id?>';
	var link_id = '<?=$id?>';
	var element,element_sub ;
	var on_off="";
	j=0;
	for(var i=0; i<Tree.length;i++)
	{
		element = Tree[i].split('|');
		if(element[1]==url_id)
		{
			  if(element[0]=="<?=$menu?>")
			    on_off='block';
			  else
  			    on_off='none';
			  j++;	
			  document.writeln('<tr style="display:'+on_off+';" id="'+link_id+j+'">');
			  //document.writeln('<td>&nbsp;</td>');
			  document.writeln('<td height="18" class="menu_"><a href="'+element[6]+'"><img src="<?=$path_tuyet_doi?>/images/exp_right.gif"  border="0"> '+element[5]+'</a></td>');
			  document.writeln('</tr>');
		}
	}
	</SCRIPT>
	<? } ?>
	<tr>
	<td align="left" valign="middle" class="Box" ><a href="#"><img src="<?=$path_tuyet_doi?>/images/exp_right.gif" border="0" align="absmiddle" > <?=$menu_luot_truy_cap?>: <? $dtc=dem_max_dk("tb_quanly_truycap","root",1); echo" $dtc";?></a></td>
	</tr>
	<tr>
	<td height="10" align="center" valign="middle">&nbsp;</td>
	</tr>
		<tr>
	<td align="center" valign="middle">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" class="hop" ><MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollAmount=1 direction=up width="100%" height=100><? echo $project_note; $ngay=date("F j, Y, g:i a"); echo "<br>".$ngay;?></MARQUEE></td>
  </tr>
</table>
	<br>
	<? ?></td>
	</tr>
</TABLE>
<SCRIPT language=javascript>autoExpan();</SCRIPT>

