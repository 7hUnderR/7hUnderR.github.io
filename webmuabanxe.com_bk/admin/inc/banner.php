<?
ob_start();
session_start();
error_reporting(0);
if(!$HTTP_SESSION_VARS['susername_mjmaxx']) header("Location:login.php");
$suid = $HTTP_SESSION_VARS['suid'];
$ma_user_admin = $HTTP_SESSION_VARS['ma_user_admin'];
$susername = $HTTP_SESSION_VARS['susername_mjmaxx'];
$project_path = $HTTP_SESSION_VARS['project_path'];

$key = $HTTP_SESSION_VARS['key'];
include("common.php");
include("inc_javascript.php");
include("dbconnect.php");
include("inc_confix.php");
include("inc_lg_ma.php");
include("alphabet.php");

?>
<html>
<head>
<title><?=$banner_top_tieude?></title>
<META content="MSHTML 6.00.2800.1106" name=GENERATOR>
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
<link href="<?=$path_tuyet_doi?>/inc/css_info.css" rel="stylesheet" type="text/css">
<link href="<?=$path_tuyet_doi?>/inc/style_<?=$style_admin?>.css" rel="stylesheet" type="text/css">

<SCRIPT src="<?=$path_tuyet_doi?>/inc/vietuni.js"></SCRIPT>
<SCRIPT src="<?=$path_tuyet_doi?>/inc/popupImg.js"></SCRIPT>
<SCRIPT language=JavaScript>
<!--
function Check_Values(form)
{
  if(form.code.value == 0)
  {
    alert("Please select 'Business type'!");
    form.code.focus();
    return (false);
  } 
  if(form.country.value == 0)
  {
    alert("Please select 'Countries'!");
    form.country.focus();
    return (false);
  } 
 }

function Check_Values_send_email(theForm)
{
if(theForm.mailto.value == 0)
  {
    alert("Please selet Email Catalog !");
    theForm.mailto.focus();
    return (false);
  }
  
if(theForm.noidung.value == "")
  {
    alert("Please enter Detail!");
    theForm.noidung.focus();
    return (false);
  }
}

 function back_edit(ma_bac_1)
{
	form.action="send_email_back.php?ma_bac_1="+ ma_bac_1 +"";
	form.submit();
}

function MM_jumpMenu(targ,selObj,restore)
{ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}   

function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}
//-->
</SCRIPT>
<style type="text/css">.replbq{width:100%}</style>


<script type="text/javascript">
			var FolderViewVals =
			{
				UIStrings : {
					BulkPrompt : "Are you sure? Deleted Bulk messages are gone forever, and will not go to your Trash folder. ",
					DeletePrompt : "Are you sure you want to delete all items?",
					DeleteLabel : "Delete",
					DontDeleteLabel : "Don't Delete",
					__lastStr : 'not used'
				},

				StateDynamic : true,
				yplus_browser : false,
				premium_user : false,
				ymURI : "a",
				URLExtras : "",
				box : "Inbox",
				SidebarSyncActionType : "",
				SidebarSyncUIDList : "",

				getString : function(id)
				{
					var result = this.UIStrings[id];
					if ( result == null ) {
						return "Not translated: '" + id + "'";
					}
                                        return result;
				}
			}
</script>

<SCRIPT src="<?=$path_tuyet_doi?>/inc/inc_checked.js"></SCRIPT>
</head>
<body onLoad="doSynch();">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" align="center" valign="middle" class="mau_lot"><img src="<?=$path_tuyet_doi?>/images/fpt_logo.gif"></td>
    <td width="85%" height="30" valign="middle" class="mau_lot"><span class="tieu_de_1"><?=$banner_top_tieude?> </span></td>
  </tr>
  <tr>
    <td valign="middle" class="mau_dam"></td>
    <td height="1" valign="middle" class="mau_dam"></td>
  </tr>
</table>
