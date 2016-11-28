<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript>

function checkInput(param)
{  
	if (param.old_password.value==""){
		alert("Please fill in your old password!");
		param.old_password.focus();
		return false;
	}	
	if (param.password.value==""){
		alert("Please fill in your new password!");
		param.password.focus();
		return false;
	}	
	if (param.confirm_password.value==""){
		alert("Please fill in your confirm password!");
		param.confirm_password.focus();
		return false;
	}	
	
	if (param.password.value!="")
	{	
	 if (param.confirm_password.value==""){
			alert("Please fill in new password!");
			param.confirm_password.focus();
			return false;
		}
		
		if (param.password.value!=param.confirm_password.value){
			alert("Please confirm your password!");
			param.confirm_password.focus();
			return false;
		}
	}
	return true;
}       	  		


</script>
<?php 
if ((isset($_POST["update_profile_form"])) && ($_POST["update_profile_form"] == "update_profile_form")) 
{

		$pass_old=md5(rep($HTTP_POST_VARS["old_password"]));
		
		$pass=rep($HTTP_POST_VARS["password"]);
		if($pass!="")
			$pass=md5($pass);
		else
			$pass=gia_tri_mot_cot("tb_member","ma_user",$ma_dang_nhap,"pass");
							
		$num=dem_max_2dk("tb_member","ma_user","$ma_dang_nhap","pass","$pass_old");
		if($num>0)
		{
		$table = "tb_member";
		$query = "UPDATE $table SET pass='$pass' ";
		$query .= "WHERE ma_user=$ma_dang_nhap";
		if($result = mysql_query($query))
			echo "Successful update!";
		}
		else
		echo"Old password you\'ve entered is invalid.!";
}
else
{
?>
<link href="member/style.css" rel="stylesheet" type="text/css" />
<table width="360" border="0" align="center" cellpadding="2" cellspacing="0" class="tbldata">
  <form name="update_profile_form" method="post"  ENCTYPE="multipart/form-data" action="<?=$form_action?>" onSubmit="return checkInput(this)">
  <input type="hidden" name="update_profile_form" value="update_profile_form">
	<thead>
	<tr>
	<th>&nbsp;</th>
	<th height="23" colspan="2" align="center" valign="middle" id="senderheader"><div align="left">
	  <?=gia_tri_mot_cot("tb_bac_2","trang",53,"ten_$lg");?>
	</div></th>
	</tr>
	</thead>
  <tr>
    <td width="149" align="right" valign="middle" class="text_def" ><span class="alert1">* </span>Old password:</td>
    <td width="201" valign="middle" class="tab_5" >
      <input name="old_password"  type="password" class="input" style="WIDTH:100px;" value="" maxlength="20"></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="text_def" ><span class="alert1">*</span> Password:</td>
    <td valign="middle" class="tab_5" >
      <input name="password" type="password" class="input" style="WIDTH:100px;" value=""  maxlength="20">   </td>
    </tr>
  <tr>
    <td align="right" valign="middle" class="text_def"><span class="alert1">*</span> Confirm password:</td>
    <td valign="middle" class="tab_5" >
      <input name="confirm_password" type="password" class="input" style="WIDTH:100px;"  maxlength="20">   </td>
  </tr>
	  <tr>
    <td valign="top" class="text_def"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" class="tab_5" ><input name="Submit" type="submit" class="nut_nhan_2" value="Change">
      <input name="Submit2" type="reset" class="nut_nhan_2" value="Reset"></td>
  </tr>
  </form>
</table>
<?php }?>