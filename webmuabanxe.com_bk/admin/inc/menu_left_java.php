<SCRIPT language=javascript>
	setCookie('file_id','');
	setCookie('file_id_sub','');
</SCRIPT>
<TABLE cellSpacing=0 cellPadding=1 width=100% border=0>
	<tr>
	<td valign="middle" class="tab_left_10">
	<? 
	echo"Welcome $susername";
	?></td>
	</tr>

	<? 
	$i=0;
	$query = "Select * FROM  tb_setup_menu where menu_activate=1 order by menu_sort ASC";
	$result = mysql_query($query);
	while($rs= mysql_fetch_array($result))
	{
		$id=$rs["id"];
		$menu_ten=$rs["menu_ten"];
		
		$query_ = "Select * FROM  tb_setup_menu_s where ma_id_s=$id and menu_activate=1 order by menu_sort ASC ";
		$result_ = mysql_query($query_);
		$num = mysql_num_rows($result_);
		
		if($num>0)
		$link="#";
		else
		$link=$rs["menu_link"];
	?>
	<TR>
	<TD class="menu">
	<A onclick="doAction('<?=$id?>');" href="<?=$link?>"><img src="images/exp_right.gif" border="0" align="absmiddle"> <?=$menu_ten?></A>	</TD>
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
			 // if(element[0]=="<? //=$cat_s?>")
			 //   on_off='block';
			//  else
  			  on_off='none';
			  j++;	
			  document.writeln('<tr style="display:'+on_off+';" id="'+link_id+j+'">');
			  //document.writeln('<td>&nbsp;</td>');
			  document.writeln('<td height="18" class="menu_"><a href="'+element[6]+'"><img src="images/exp_right.gif" border="0" align="absmiddle"> '+element[5]+'</a></td>');
			  document.writeln('</tr>');
		}
	}
	</SCRIPT>
	<? } ?>
	<tr>
	<td align="left" valign="middle" class="Box"><a href="#"><img src="images/exp_right.gif" border="0" align="absmiddle"> <?=$menu_luot_truy_cap?>: <? $dtc=dem_max_dk("tb_quanly_truycap","root",1); echo" $dtc";?></a></td>
	</tr>
	</TABLE>
<SCRIPT language=javascript>autoExpan();</SCRIPT>