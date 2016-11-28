<?php
ob_start();
session_start();
include("common.php");
include("dbconnect.php");
include("inc_confix.php");

if(!session_is_registered("suid"))
$suid="";
else
$suid = $HTTP_SESSION_VARS['suid'];

$msg=$login_tieude;
switch($suid)
	{
	case -2:
		$msg=$login_tb_1;
		break;
	case -1:
		$msg=$login_tb_2;
		break;
	case -3:
		$msg=$login_tb_3;
		break;
	case "":
		$msg=$login_tieude;
	}
?>
	<SCRIPT language=JavaScript>
       function checkInput()
	   {
	  
	   	if (document.frmLogin.txtUser.value=="")
		{
			alert("Xin nhập tên sữ dụng!");
			document.frmLogin.txtUser.focus();
			return false;
		}
		
		if (document.frmLogin.txtPWD.value=="")
		{
			alert("Xin nhập mật khẩu!");
			document.frmLogin.txtPWD.focus();
			return false;
		}
		return true;
	   }       	  		
	
</script>    
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=$banner_top_tieude?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 5px;
	margin-left: 5px;
	margin-right: 5px;
}
-->
</style>
<link href="inc/css_info.css" rel="stylesheet" type="text/css">
<link href="inc/style_<?=$style_admin?>.css" rel="stylesheet" type="text/css">

</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="middle" align="center" class="mau_lot"><img src="images/fpt_logo.gif" align="absbottom"></td>
    <td height="30" valign="middle" class="mau_lot"><span class="tieu_de_1"><?=$banner_top_tieude?> </span></td>
  </tr>
  <tr>
    <td valign="middle" class="mau_dam"></td>
    <td height="1" valign="middle" class="mau_dam"></td>
  </tr>
</table>
