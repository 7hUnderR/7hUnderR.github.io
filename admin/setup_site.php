<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<? if($ma_user_admin==1) {?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" rowspan="4" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
    <td width="85%" height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&start=0&alpha=All"><img src="images/home.gif" width="14" height="14" border="0"> Home</a></td>
  </tr>
  <tr>
    <td height="538" valign="top" class="bg_center tab_5">
      <p>
      
      <?
$form_action = $_SERVER['PHP_SELF'];

if ( (isset($_POST["form_config"])) && ($_POST["form_config"] == "form_config"))
 {
	
	$project_name=$_POST["project_name"];
	$project_path=$_POST["project_path"];
	$project_note=$_POST["project_note"];
	$project_copyright=$_POST["project_copyright"];
	$project_email=$_POST["project_email"];
	
	$language_1=$_POST["language_1"];
	$language_2=$_POST["language_2"];
	$language_3=$_POST["language_3"];
	
	$add_folder_step_1=$_POST["add_folder_step_1"];
	$add_folder_step_2=$_POST["add_folder_step_2"];
	$add_folder_step_3=$_POST["add_folder_step_3"];
	$add_folder_step_4=$_POST["add_folder_step_4"];
	$add_folder_step_5=$_POST["add_folder_step_5"];
	
	$id=1;
	$dat = date("F/j/Y");
	
	$table="tb_config";
	$query = "UPDATE $table SET project_name='$project_name', project_path='$project_path', project_email='$project_email', project_note='$project_note', project_copyright='$project_copyright',
     language_1='$language_1',
	 language_2='$language_2',
	 language_3='$language_3',
	 add_folder_step_1='$add_folder_step_1',
	 add_folder_step_2='$add_folder_step_2',
	 add_folder_step_3='$add_folder_step_3',
	 add_folder_step_4='$add_folder_step_4',
	 add_folder_step_5='$add_folder_step_5',date='$dat'";
	$query .= "WHERE id =$id";
	if($result = mysql_query($query))
		$tip="Update completed !";
	else
	    $tip="Can't update !";
	echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
	echo "<script  language='JavaScript'>";
	echo "alert('$tip')";
	echo "</script>";

}
?>

	  <form name="form_config" method="post" action="<?=$form_action?>">
        <span style="font-weight: bold">Config: <?
		 $query = "Select * FROM  tb_config ";
		 $result = mysql_query($query);
		 $rs= mysql_fetch_array($result);
		 
		?></span><br>
        <br>
        <input name="switcher" type=radio onfocus="setTypingMode(0)" value="OFF" checked  >
        OFF
<input name="switcher" type=radio onfocus="setTypingMode(1)" value="TELEX" >
        TELEX
<input name="switcher" type=radio onfocus="setTypingMode(2)" value="VNI" >
        VNI<br>
        Project Name:<br>
  <input name="project_name" value="<?=$rs["project_name"]?>" onKeyUp="initTyper(this);" type="text" class="text" id="project_name"  style="width:500px;">
  <br>
  Project Path: <br>
  <input name="project_path" value="<?=$rs["project_path"]?>" onKeyUp="initTyper(this);" type="text" class="text" id="project_path" style="width:500px;">
  <br>
  Project email: <br>
  <input name="project_email" value="<?=$rs["project_email"]?>" onKeyUp="initTyper(this);" type="text" class="text" id="project_email" style="width:500px;">
  <br />
 Project notes:<br />
<?php
	include("../tool/fckeditor.php") ;
	$sBasePath = $_SERVER['PHP_SELF'];
	$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "admin" ) ) ;
	$oFCKeditor = new FCKeditor('project_note') ;
	$oFCKeditor->ToolbarSet	= 'Basic' ;
	$oFCKeditor->Height = 200;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $rs["project_note"];
	$oFCKeditor->Create() ;
	?>
<br>
  Project copyright:<br>
  <?php
	$oFCKeditor = new FCKeditor('project_copyright') ;
	$oFCKeditor->ToolbarSet	= 'Basic' ;
	$oFCKeditor->Height = 200;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $rs["project_copyright"];
	$oFCKeditor->Create() ;
	?>
  <br>
  <hr size="1" color="#CCCCCC">
    Language 01:<br> 
  <select name="language_1"  class="text" id="language_01">
    <option value="1" <? if($rs["language_1"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["language_1"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Language 02:<br>
  <select name="language_2"  class="text" id="select">
    <option value="1" <? if($rs["language_2"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["language_2"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Language 03:<br>
  <select name="language_3"  class="text" id="select2">
    <option value="1" <? if($rs["language_3"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["language_3"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  <hr size="1" color="#CCCCCC">
    Add new folder step 01:<br>
  <select name="add_folder_step_1"  class="text" id="add_folder_step_1">
    <option value="1" <? if($rs["add_folder_step_1"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["add_folder_step_1"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Add new folder step 02:<br>
  <select name="add_folder_step_2"  class="text" id="add_folder_step_1">
    <option value="1" <? if($rs["add_folder_step_2"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["add_folder_step_2"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Add new folder step 03:<br>
  <select name="add_folder_step_3"  class="text" id="folder_step_3">
    <option value="1" <? if($rs["add_folder_step_3"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["add_folder_step_3"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Add new folder step 04:<br>
  <select name="add_folder_step_4"  class="text" id="folder_step_4">
    <option value="1" <? if($rs["add_folder_step_4"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["add_folder_step_4"]==0) echo"selected";?>>OFF</option>
  </select>
  <br>
  Add new folder step 05:<br>
  <select name="add_folder_step_5"  class="text" id="folder_step_5">
    <option value="1" <? if($rs["add_folder_step_5"]==1) echo"selected";?>>ON</option>
    <option value="0" <? if($rs["add_folder_step_5"]==0) echo"selected";?>>OFF</option>
  </select>
<br>
<br>
  <br>
  <input name="Submit3" type="submit" class="nut_nhan" value="Update">
  <input name="Submit22" type="reset" class="nut_nhan" value="Reset">
  <input type="hidden" value="form_config" name="form_config">
      </form>
      <hr size="1" color="#CCCCCC">
       <? 
	   $path=GetRootPath(); echo"PATH: $path";
	   $project_path = $HTTP_SESSION_VARS['project_path'];
	   echo"<br>Editor Path: $project_path";
	   ?> 
</td>
  </tr>
  <tr>
    <td height="13"></td>
  </tr>
</table>
<? } else echo "Not permission! "; ?>
<? include("inc/bottom.php")?>
