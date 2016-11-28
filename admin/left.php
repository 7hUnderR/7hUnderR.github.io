<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#FFFFFF" style="border-collapse: collapse">
          <tr> 
            <td width="100%" align="center" class="textbold" bgcolor="#003366" height="25"><font color="#FFFFFF">Administrator Menu</font></td>
          </tr>
		   <tr> 
            <td  height="22" width="100%" align="left"  bgcolor="#999999"><a href="" onClick="doAction('product'); return false;"><img src="img/white_plus.gif" align="absbottom" id="product_img" border="0"></a><a href="ban.php?lang_admin=<?php echo $lang_admin;?>" class="left_link" onClick="setFileID('product');return true;"><?php echo $display_manager_product;?></a></td>
          </tr>
			<?php if(has_member){?>
		  <?php }?>	
		   <!--<tr> 
            <td height="22"  width="100%" align="left" bgcolor="#999999"><img src="img/white_join.gif" align="absbottom"><a href="configuration.php?lang_admin=<?php echo $lang_admin;?>" class="left_link" onClick="setFileID('');return true;"><?php echo $display_manager_config;?></a></td>
          </tr>-->
		  <!--
		   <tr> 
            <td height="22"  width="100%" align="left" bgcolor="#999999"><img src="img/white_join.gif" align="absbottom"><a href="<?php echo $current_script."?lang_admin=".$_lang_admin;?>" class="left_link" onClick="setFileID('');return true;"><font color="#0000FF"><?php echo $display_manager_switch;?></font></a></td>
          </tr>
		  -->
		   <tr> 
            <td height="22"  width="100%" align="left" bgcolor="#999999"><img src="img/white_joinbottom.gif" align="absbottom"><a href="logout.php" class="left_link"><?php echo $display_manager_logout;?></a></td>
          </tr>
		   <tr>
            <td class="textbold" align="center" bgcolor="#AAAAAA">----------------</td>
          </tr>
        </table>
<script>
	function setFileID(file_id){
		setCookie('file_id',file_id);
	}
	function doAction(file_id){
		if(document.images[file_id+'_img'].src =='<?php echo $gStrDomain.$gStrAdmin;?>/img/white_plus.gif'){			
			document.images[file_id+'_img'].src='img/white_minus.gif';
			expanIt(file_id);
		}
		else{
			document.images[file_id+'_img'].src='img/white_plus.gif';
			closeIt(file_id)
		}
	}
	function expanIt(file_id){
		var item_action;
		i = 0;
		item_action = document.getElementById(file_id+i);
		while(item_action){
			item_action.style.display='';
			item_action = document.getElementById(file_id+i+'_');
			if(item_action) item_action.style.display='';
			i++;
			item_action = document.getElementById(file_id+i);
		}
		return ;
	}
	function closeIt(file_id){
		var item_action,item_action_sub;
		i = 0;
		item_action = document.getElementById(file_id+i);
		while(item_action){
			item_action.style.display='none';
			item_action = document.getElementById(file_id+i+'_');
			if(item_action) item_action.style.display='none';
			i++;
			item_action = document.getElementById(file_id+i);
		}
		return ;
	}
	function autoExpan(){
		
		var file_id = getCookie('file_id');
		if(document.images[file_id+'_img']) {
			document.images[file_id+'_img'].src='img/white_minus.gif';
			expanIt(file_id);
		}
	}
	autoExpan();
</script>