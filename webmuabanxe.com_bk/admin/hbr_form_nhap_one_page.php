<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr class="M">
                <td width="1024" height="25" valign="middle" class="bg_title"><? include("inc/inc_path_top.php"); ?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<LINK REL="stylesheet" TYPE ="text/css" HREF= "css/wfw.css">
				<LINK REL="stylesheet" TYPE ="text/css" HREF= "css/common.css">
				<link REL="stylesheet" TYPE="text/css" HREF="css/nothing.css">
				<link REL="stylesheet" TYPE="text/css" HREF="css/tree.css">
				<script Language="JScript.Encode" src="js/$common.js"></script>
				<script Language="JScript.Encode" src="js/$validate.js"></script>
				<script Language="JScript.Encode" src="js/$check.js"></script>
				<script Language="JScript.Encode" src="js/jsPopup.js"></script>
				<?php
									
					//include('include/$session.php');
					include('$config.php');
					include('config/$config.php');
					//include('dbconnect.php');
					//include('config/$msg.php');
					include('./language/'.admin_language.'.php');
					//include('include/$db.php');
					//include('$security.php');
					include('$functions.php');
					include('$upload.php');
					include('$global_var.php');
					//include('$tree.php');
					include('$image.php');
					
				?>
				<?php
				
					$now_month = date("Y-m");
					if((!file_exists('../'.$wfwUploadPathAlone.'/'.$wfwNewsPath.'/'.$now_month))||(!is_dir('../'.$wfwUploadPathAlone.'/'.$wfwNewsPath.'/'.$now_month))){
						@mkdir('../'.$wfwUploadPathAlone.'/'.$wfwNewsPath.'/'.$now_month);
					}
					$catid = $HTTP_GET_VARS['catid'];
					if($HTTP_POST_VARS['axn']) {
						while (list($key, $val) = each($HTTP_POST_VARS)) { 
						   $$key = toString(trim($val));
						}	
						$err = 0;
						if(empty($title)) {
							$msg = $msg_empty_title;
							$err = 1;
						}
						if(!$err){
							if(!empty($_FILES['fileThumbnail']['name'])){
								$img = upload_file('fileThumbnail','../'.$wfwUploadPathAlone.'/'.$wfwNewsPath.'/'.$now_month.'/',&$error,lgSize,$arrPixFiles);
								if($error){
									$msg = $img;
									$err = 1;
								}else{
									$img = $now_month.'/'.$img;
								}
							}
							elseif(!empty($HTTP_POST_VARS['leadImg'])){
								$img = $HTTP_POST_VARS['leadImg'];
							}
						}
						
						if(!$err){
							
							 $lead = $HTTP_POST_VARS['lead'];
							 $content = $HTTP_POST_VARS['content'];
							 
							 echo $lead."<hr>";
							 echo $content;
							 echo htmlspecialchars($content);
							 echo"<hr>";
							/*
							$now = date("Y-m-d H:i:s");
							$active = ($HTTP_POST_VARS['active']=='1')?1:0;
							$sql = "Insert into `".pre_tbl."news`(`title`,`image_note`,`lead`,`image`,`content`,`active`,`create_date`,`last_update`)";
							$sql .= " VALUES('".$title."','".$image_note."','".$lead."','".$img."','".$content."',".$active.",'".$now."','".$now."')";
							$db=new Db();
							$db->connect(host,db,user,pass);
							$db->setSql($sql);
							$db->exeSql();
							$db->close();
							die("<script>window.location.href='news.php?lang_admin=$lang_admin';</script>");
						*/
						
						}
					}
				//echo admin_language;
				
				?>
				<script Language="JScript.Encode" src="js/$<?php echo admin_language;?>_global_var.js"></script>
				<script language="javascript" src="js/tree.js"></script>
				
				
				<div style="display:none;" id="contentValueDiv"><?php echo resString($content);?></div>
				<div style="display:none;" id="leadValueDiv"><?php echo resString($lead);?></div>
				<script language="JScript.Encode" src="HTMLEditor/ed_js/$ed_common.js"></script>
				<script>
				var sEditorPath = "<?php echo $gStrPath.$gStrAdmin.$gStrHTML;?>";
				//doSetEditorConfiguration(sBaseDomain,sEditorPath,sGreyNoteColor,language);
				doSetEditorConfiguration('<?php echo $gStrDomain;?>','<?php echo $gStrPath.$gStrAdmin.$gStrHTML;?>','#808080','<?php echo admin_language;?>');
				</script>
				<script>
					var sMediaPath = '<?php echo $wfwUploadPath."/".$wfwNewsPath;?>';
					var sMediaPathGlobal = sMediaPath+'/';
					var sMediaPathAlone = '<?php echo $wfwUploadPathAlone."/".$wfwNewsPath;?>/';
					var sBox = '<?php echo $now_month;?>';
				//sID,sCtrlName,gMediaPath,eWidth,sInitValue,sBackground,sFontColor,hasFile,hasOpenFile,hasCopy,hasLink,hasChar,hasList,hasSub,hasOutLine,hasHistory,hasFormat,hasAlign,hasFont,hasColor,hasTable,hasCol,hasRow,hasCell,hasImage,hasDoc,hasFlash,hasMovie,hasCaseFind,hasVote,hasViewSource,hasSmileys,hasVietuni
					contentEditor = new htmlEditor ('contentEditor',['lead','content'],[sMediaPathAlone,sMediaPathAlone],370,[leadValueDiv.innerHTML,contentValueDiv.innerHTML],'#FFFFFF','#000000');
					contentEditor.hasFTP = 0;
					contentEditor.hasVietuni = 1;
					contentEditor.hasAdvance = 1;
					contentEditor.hasVote = 0;
					contentEditor.hasSmileys = 0;
				</script>
				<script language="javascript">
					function checkNews(f){
						f.title.value = Trim(f.title.value);
						if(f.title.value==''){
							alert(msg_news_title);
							f.title.focus();
							return false;
						}
						contentEditor.doSave();
						return true;
					}
				</script>
				
				<table cellpadding="1" width="85%" cellspacing="0" border="0" bgcolor="#999999">
          <!--DWLayoutTable-->
          <tr>
            <td width="100%" height="" valign="top" align="center">
              <table border=0 cellspacing=1 cellpadding=0 width="100%" bgcolor="#FFFFFF">
                <form name="fmnews" enctype="multipart/form-data" method="post" action="" onSubmit="return checkNews(this);">
                  <?php if($msg){?>
                  <tr>
                    <td width="100%" align="center" height="20" valign="middle" bgcolor="#CCCCCC" class="alarm" colspan="2"><?php echo $msg;?></td>
		  </tr>
                  <?php }?>
                  <tr>
                    <td align=right valign=middle bgcolor="#DDDDDD" class=textbold><?php echo $common_title;?> : </td>
		        <td align="left" valign=middle bgcolor="#DDDDDD" class=text>
		          <input name="title" type="text" value="<?php echo htmlspecialchars(resString($title));?>" size="50" maxlength="255">		          </td>
		  </tr>
                  <tr>
                    <td valign=middle align=right bgcolor="#DDDDDD" class=textbold><?php echo $common_preview." ".$common_image;?> : </td>
		   <td valign=middle bgcolor="#DDDDDD" class=text>
		     <img src="" id="thumbPreview" name="thumbPreview"></td>
		  </tr>
                  <tr>
                    <td  height="25" align="right" valign="middle" bgcolor="#DDDDDD" class=textbold rowspan="2">
                    <?php echo $common_image;?> : </td>
		    <td  height="25" align="left"  valign=middle bgcolor="#DDDDDD" class=text><input type="radio" name="check_thumb" id="check_thumb" value="0" checked onClick="if(this.checked) {this.form.leadImg.disabled=true;this.form.fileThumbnail.disabled=false;this.form.findthumb.disabled=true;this.form.leadImg.style.backgroundColor='#cccccc';this.form.fileThumbnail.style.backgroundColor='#FFFFFF';thumbPreview.src=this.form.fileThumbnail.value}">&nbsp;
		      <input type="file" class="text" size="30" name="fileThumbnail" id="fileThumbnail"  style="background-color:#FFFFFF" onChange="thumbPreview.src=this.value">		      </td>
			  </tr>
                  <tr>
                    <td  height="25" align="left"  valign=middle bgcolor="#DDDDDD" class=text><input type="radio" name="check_thumb" id="check_thumb" value="1"  onClick="if(this.checked) {this.form.leadImg.disabled=false;this.form.fileThumbnail.disabled=true;this.form.findthumb.disabled=false;this.form.leadImg.style.backgroundColor='#FFFFFF';this.form.fileThumbnail.style.backgroundColor='#CCCCCC';thumbPreview.src=sMediaPathGlobal+this.form.leadImg.value}">&nbsp;&nbsp;<input type="text" class="text" size="30" name="leadImg" id="leadImg" disabled style="background-color:#CCCCCC"> <input disabled type="button" name="findthumb" id="findthumb" value="Select" onclick="return openGallery('fmnews','leadImg','thumbPreview',sMediaPathAlone,sBox,'<?php echo admin_language;?>');"></td>
		  </tr>
                  <tr>
                    <td align=right valign=middle bgcolor="#DDDDDD" class=textbold><?php echo $common_image_note;?> : </td>
		        <td align="left" valign=middle bgcolor="#DDDDDD" class=text>
		          <input name="image_note" type="text" id="image_note" value="<?php echo htmlspecialchars(resString($image_note));?>" size="50" maxlength="255">		          </td>
		  </tr>
                  <tr>
                    <td height="22" align=right valign=middle bgcolor="#DDDDDD" class=textbold><?php echo $common_display;?>:</td>
			    <td align="left" valign=middle bgcolor="#DDDDDD" class=text><input type="checkbox" name="active" value="1"></td>
		  </tr>
                  <tr>
                    <td height="22" align=right valign=middle bgcolor="#DDDDDD" class=textbold></td>
			    <td align="left" valign=middle bgcolor="#DDDDDD" class=text><script>contentEditor.doShow();</script></td>
		  </tr>
                  <tr>
                    <td height="22" align=right valign=middle bgcolor="#DDDDDD" class=textbold><?php echo $common_lead;?> :</td>
			    <td align="left" valign=middle bgcolor="#DDDDDD" class=text>
			      <IFRAME height="100" name="lead_editbox" id="lead_editbox" width="525" frameborder=1 onFocus="initMode('lead',contentEditor)"></IFRAME>
				  <script>
					WriteMenuItems(contentEditor,'lead');
				</script>			      </td>
		  </tr>
                  <tr>
                    <td height="22" align=right valign=middle bgcolor="#DDDDDD" class=textbold><?php echo $common_content;?> :</td>
                    <td align="left" valign=middle bgcolor="#DDDDDD" class=text><iframe height="250" name="content_editbox" id="content_editbox" width="525" frameborder="1" onfocus="initMode('content',contentEditor)"></iframe>
					<script>
					WriteMenuItems(contentEditor,'content');
					contentEditor.init();
				</script></td>
                  </tr>
                  <tr><td class=text bgcolor="#CCCCCC"></td>
		  <td align="left" valign="middle" bgcolor="#CCCCCC" class=text>
		    <input type="submit" id="axn" name="axn" value="<?php echo $common_addnew;?>"></td>
		  </tr>
                </form>
		  </table>		  </td>
		  </tr>
                </table>
				<? ?>
				</td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
