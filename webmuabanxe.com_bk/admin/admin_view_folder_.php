<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
	function Check(from)
	{
		if(from.tendichvu.value ==""){
			alert("Please enter 'Folder Name' !");
			from.tendichvu.focus();
			return (false);
		  } 
	}
	function view(id)
			{
				var arg= "width=350,height=410,resizable=YES,scrollbars=YES,status=0,top=0,left=0";			
				window.open ("inc/popup_images.php?ma=images&id="+ id ,"a",arg);	
				
			}
</script>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="153" height="329" valign="top" class="mau_lot"><? include("inc/menu.php")?></td>
    <td width="617" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td width="608" height="30" valign="middle" class="tab_left_10"><a href="index.php?cat=0&alpha=All&start=0"><img src="images/home.gif" width="14" height="14" border="0"> Home</a> ></td>
             </tr>
             <tr>
               <td height="364" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F7F7FF">
                            <!--DWLayoutTable-->
                            <tr>
                              <td width="617" height="364" valign="top" bgcolor="#FFFBFF" class="S9">
								<?
								$folder_name=rep($HTTP_GET_VARS["folder"]);
								
								$dir_name=lay_path_root("local");
								$dir_name=$dir_name."editer/data/images/".$folder_name;
								
								$dir = opendir($dir_name);
								$basename = basename($dir_name);
								$fileArr = array();
								while ($file_name = readdir($dir))
								{
								 if (($file_name !=".") && ($file_name != ".."))
								 {
								   #Get file modification date...
								   #
								   $fName = "$dir_name/$file_name";
								   $fTime = filemtime($fName);
								   $fileArr[$file_name] = $fTime;    
								 }
								}
								$tam=0;
								arsort($fileArr);
								$numberOfFiles = sizeOf($fileArr);
								for($t=0;$t<$numberOfFiles;$t++)
								{
								   $tam++;
								   $thisFile = each($fileArr);
								   $thisName = $thisFile[0];
								   $thisTime = $thisFile[1];
								   $thisTime = date("d M y", $thisTime);
								?>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <!--DWLayoutTable-->
                                  <tr <? if($tam%2==0) echo"class=b1"; else echo"class=b2";?>>
                                    <td width="42" height="25" align="center" valign="middle" class="S10"><? echo $tam; ?></td>
                                    <td width="330" valign="middle" class="S10"><a onclick="return view('<?=$dir_name."/".$thisName?>')" href="#"><? echo"<img src=\"images/anh.jpg\" border=\"0\"> $thisName";?></a></td>
                                    <td width="122" valign="middle" class="text"><?=$thisTime?></td>
                                    <td width="40" align="center" valign="middle" class="S10"><a href="admin_edit.php?folder=<?=$thisName?>&ma_edit=folder"><img src="images/edit.gif" alt="Edit" border="0"></a></td>
                                  <td width="66" valign="middle" class="S10"><a href="admin_delete_wait.php?folder=<?=$thisName?>&ma_del=folder"><? echo"<img src=\"images/del.jpg\" width=21 height=21 border=0 alt=Delete>";?></a></td>
                                  </tr>
                                </table>                                <? 
								}
								closedir ($dir);
								?> 
								<br>
								<hr size="1" color="#CCCCCC">                                </td>
                          </tr>
			 <form name="form1" method="post" action="admin_add.php?ma_add=folder" onSubmit="return Check(this)">
			</form>
                          <!--DWLayoutTable-->
               </table></td>
            </tr>
                  </table></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
