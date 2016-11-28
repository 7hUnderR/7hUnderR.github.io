<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)" class="button">
	<option selected>VOTE</option>
	<option value="view.php?cat=<?=$cat?>&id=<?=$id?>&curPg=1&curPg_=1&d=1">*</option>
	<option value="view.php?cat=<?=$cat?>&id=<?=$id?>&curPg=1&curPg_=1&d=2">**</option>
	<option value="view.php?cat=<?=$cat?>&id=<?=$id?>&curPg=1&curPg_=1&d=3">***</option>
	<option value="view.php?cat=<?=$cat?>&id=<?=$id?>&curPg=1&curPg_=1&d=4">****</option>
	<option value="view.php?cat=<?=$cat?>&id=<?=$id?>&curPg=1&curPg_=1&d=5">*****</option>
</select>
