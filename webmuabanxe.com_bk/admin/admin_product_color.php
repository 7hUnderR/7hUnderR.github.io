<? 
ob_start();
session_start();
if(!$HTTP_SESSION_VARS['susername_mjmaxx'])
 echo"You mout login!";
else
{

require("inc/inc_javascript.php");
require("inc/common.php");
include("dbconnect.php");


$table="tb_product_color order by id DESC ";
$query = "Select * FROM  $table ";
$result = mysql_query($query);


$form_action = $_SERVER['PHP_SELF'];
if ( (isset($_POST["form_color"])) && ($_POST["form_color"] == "form_color"))
 {
	
	$ten_mau=$_POST["ten_mau"];
	$ma_mau=max_id("tb_product_color","ma_mau")+1;
	
	$table_="tb_product_color";
	$query_ = "INSERT INTO $table_(ma_mau,ten_mau)";
	$query_ .= " VALUES('$ma_mau','$ten_mau')";
	if($result_ = mysql_query($query_))
	$tip="Add completed !";
		
	echo"<meta http-equiv=\"refresh\" content=\"0;url=admin_product_color.php\">";
	echo "<script  language='JavaScript'>";
	echo "alert('$tip')";
	echo "</script>";
}

if ( (isset($_POST["form_color_del"])) && ($_POST["form_color_del"] == "form_color_del"))
 {
	$id=$HTTP_POST_VARS["chon"];
	$id = substr($id,0,strlen($id)-1);
	$query__ = "DELETE  FROM tb_product_color WHERE ma_mau in (".$id.")";
	if($result__ = mysql_query($query__))
	  $tip="Delete completed !";
	echo"<meta http-equiv=\"refresh\" content=\"0;url=admin_product_color.php\">";
	echo "<script  language='JavaScript'>";
	echo "alert('$tip')";
	echo "</script>";
}


if ( (isset($_POST["form_color_edit"])) && ($_POST["form_color_edit"] == "form_color_edit"))
   {
	
	$id=$_POST["id"];
	$ten_mau=$_POST["ten_mau"];
	$query_edit = "UPDATE tb_product_color SET ten_mau='$ten_mau'";
	$query_edit .= "WHERE id=$id";
	$result_edit = mysql_query($query_edit);
	if($result_edit = mysql_query($query_edit))
	  $tip="Update completed !";
	echo"<meta http-equiv=\"refresh\" content=\"0;url=admin_product_color.php\">";
	echo "<script  language='JavaScript'>";
	echo "alert('$tip')";
	echo "</script>";
  }

?>		  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Product Calor</title>
<link href="css_info.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="400" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
              <tr align="center" valign="bottom" class="bg_title">
                <td height="30" colspan="2" valign="middle"><strong>PRODUCT COLOR</strong></td>
  </tr>
              <tr>
                <td valign="top"><br>
				<?
				$qr = getenv('QUERY_STRING');
				//$qr = $_SERVER["QUERY_STRING"];
				
				if(strstr($qr,"edit"))
				  {
					$id=$HTTP_GET_VARS["id"];
					$query_edit = "Select * FROM tb_product_color WHERE id=$id ";
					$result_edit = mysql_query($query_edit);
					$rs_edit= mysql_fetch_array($result_edit);
				?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color_edit" >
                  <tr>
                    <td width="129" align="right" valign="middle" class="text">Color Name: </td>
                    <td width="271" align="left" valign="middle" class="tab_5">
                    <input name="ten_mau" type="text" size="25" value="<?=$rs_edit["ten_mau"]?>">                   </td>
                  </tr>
                  <tr>
                    <td height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="tab_5">
                    <input type="submit" name="Update" value="Update" ></td>
                  </tr>
				  <input type="hidden" name="id" value="<?=$rs_edit["id"]?>">
				  <input type="hidden" name="form_color_edit" value="form_color_edit">
				  </form>
                </table>
				<? 
				} 
				else
				{
				?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <!--DWLayoutTable-->
               <form action="<?=$form_action?>" method="post" name="form_color" >
                  <tr>
                    <td width="129" align="right" valign="middle" class="text">Color Name: </td>
                    <td width="271" align="left" valign="middle" class="tab_5">
                    <input name="ten_mau" type="text" size="25">                   </td>
                  </tr>
                  <tr>
                    <td height="21" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td valign="top" class="tab_5">
                    <input type="submit" name="Add" value="  Add  " >                    </td>
                  </tr>
				  <input type="hidden" name="form_color" value="form_color">
				  </form>
                </table>
				<? } ?>
				</td>
              </tr>
              <tr>
                <td height="8"></td>
              </tr>

 <!-- ........................................................ -->			  
              <tr>
                <td height="88" valign="top">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
		      <!--DWLayoutTable-->
               <form name="form_color_del" method="post" action="<?=$form_action?>" onSubmit=" return checkInput();">
              <tr>
                <td width="398" height="52" valign="top">
			    
			    <table width="100%" border="0" cellpadding=2 cellspacing=1 bgcolor="#FFFFFF" class="bodylink">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="36" height="26" align="center" valign="middle" class="ST" >No.</td>
                        <td width="106" align="center" valign="middle" class="text" >
                          <input type="checkbox" name="chkall" value="checkbox" onClick="docheck();">
                          Select all  </td>
                        <td width="194" align="left" valign="middle" class="ST" ><strong>Color Name </strong></td>
                      <td width="41" align="center" valign="top" class="ST" >Edit</td>
                      </tr>
                         <?
						 $i=0;
					  while ($rs= mysql_fetch_array($result)) // LAY DU LIEU RA
					   { 
					   $i++;
					   ?>
				      <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                        <td height="24" align="center" valign="middle"><?=$i?></td>
                        <td align="center" valign="middle"><input type="checkbox" name="chkid" value=<?=$rs["ma_mau"]?>></td>
                        <td align="left" valign="middle"><span class="Subtitle"><? echo"$rs[ten_mau]";?></span></td>
                      <td align="center" valign="middle"><a href="admin_product_color.php?id=<?=$rs["id"]?>&do=edit"><img src="images/edit.gif" width="12" height="12" border="0"></a></td>
				      </tr>
			          <? } ?>
              </table></td>
              </tr>
              <tr>
                <td height="12"></td>
                </tr>
              <tr>
                <td height="24" align="left" valign="top"><input type="submit" name="Submit" value="Delete"></td>
                </tr>
               <input type=hidden name="chon" value=" ">
			   <input type="hidden" name="form_color_del" value="form_color_del">
			   </form>
		          </table></td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>


</table>
 <?  
 }
 mysql_close(); 
 ?>	
</body>
</html>
