<? include("../inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

	function view_profile(id)
	{
		var arg= "width=400,height=300,resizable=no,scrollbars=yes,status=0,top=0,left=0";			
		window.open ("inc/view_profile.php?ma_user="+ id,"a",arg);	
	}

//-->
</script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("../inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td height="25" valign="middle" class="bg_title"><a href="index.php?cat=0&alpha=All&start=0"><img src="../images/home.gif" width="14" height="14" border="0"> <?=gia_tri_mot_cot("tb_setup_menu","id","$menu","menu_ten");?></a> » <?=gia_tri_mot_cot("tb_setup_menu_s","id","$menu_s","menu_ten");?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center"><?
					$cat="1";
					if(isset($HTTP_GET_VARS["cat"])){
						$cat = $HTTP_GET_VARS["cat"];
					}
					$bac="1";
					if(isset($HTTP_GET_VARS["bac"])){
						$bac = $HTTP_GET_VARS["bac"];
					}
					$alpha="All";
					if(isset($HTTP_GET_VARS["alpha"])){
						$alpha=$HTTP_GET_VARS["alpha"];
					}
					$start="0";
					if(isset($HTTP_GET_VARS["start"])){
						$start = $HTTP_GET_VARS["start"];
					}

					 if($alpha=="All")
						 $sort="";
					 else
						 $sort="where ten like '".$alpha."%'";
					 
					 $table="tb_member";
					 $query = "Select * FROM  $table ";
					 $query.=$sort;
					 $result = mysql_query($query);
					 $tam=0;
					 $num = mysql_num_rows($result);
					 $PHP_SELF="index.php";
					 $page_count =15; 
					 $cut_off = 10; 
					 include("../inc/phantrang.php");
					 $query2 = "Select * FROM  $table ";
					 $query2.=$sort;
					 $query2.=" ORDER BY diem DESC, thu_tu DESC LIMIT $start, $page_count";
					 $result2 = mysql_query($query2);
				?>
 <form name=messageList ENCTYPE="multipart/form-data" method=post action="edit.php?ma_edit=sort_member">
 <? include("../inc/inc_lg_only.php"); ?>
 <? include("../inc/inc_sort_only.php"); ?>
  <table id="datatable" class="tbldata" width="100%" cellpadding=2 cellspacing=0 border=0>
    <!--DWLayoutTable-->
    <thead>
      <tr>
        <th width=3% height="23" align=center nowrap><input type="checkbox" id="selectallrows" name="toggleAll" title="Select all"></th>
	  <th width="32%" id="senderheader">Name</th>
	  <th width="10%" id="senderheader">Mark</th>
	  <th width="20%" id="senderheader">Email</th>
	  <th width="7%" id="senderheader">On/Off</th>
	  <th width="5%" id="senderheader"><?=$main_tieu_de_thu_tu?></th>
	  <th width="6%" colspan="2" id="senderheader">Edit</th>
	  </tr>
      </thead>
    <tbody>
    <input type="hidden" name="cat" value="<?=$cat?>">
    <input type="hidden" name="alpha" value="<?=$alpha?>">
    <input type="hidden" name="start" value="<?=$start?>">
    <input type="hidden" name="lg" value="<?=$lg?>">
    <? 
	 while($rs= mysql_fetch_array($result2)) 
	 {
	 $tam++; 
	 $kichhoat=$rs["kichhoat"];
	 if($kichhoat==1)
	   $on_off="<span class=xanh>On</span>";
	 else
	   $on_off="<span class=do>Off</span>";

	 $ma_user=$rs["ma_user"];
	 $link="member_permission.php?ma_user=$ma_user&alpha=All&start=0&lg=$lg";
	 
	 //$num_ = dem_max_dk("tb_tracnghiem_cauhoi","ma_tracnghiem","$ma_tracnghiem");  
	 ?>
    <tr bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
      <td height="24" align=center valign=middle><input id="1" type="checkbox" name="Mid" value="<?=$ma_user?>" ></td>
	  <td><? echo"<a href=javascript:view_profile('$ma_user')>$rs[ten]</a>"; ?></td>
	  <td><?=$rs["diem"];?></td>
	  <td><? echo $rs["email"]; ?></td>
	  <td><?=$on_off?></td>
	  <td><input type="hidden" name="id_<?=$tam?>" value="<?=$rs["id"]?>" />
        <input name="thu_tu_<?=$tam?>" type="text" class="input" onkeydown="AcceptNumbersOnly();" value="<?=$rs["thu_tu"]?>"  size="2" /></td>
	  <td colspan="2" align="center"><a href="member_edit.php?<? echo"cat=0&start=$start&ma_user=$rs[ma_user]&ma_edit=account_admin"?>"><img src="../images/edit.gif" border="0"/></a></td>
	  </tr>
    <? } ?>
    </table>
	  <table width="100%"><tr><td class="lot"><? 
	include("../inc/inc_select.php"); echo "[<a href=\"member_add.php?cat=$cat&alpha=$alpha&start=0&lg=$lg\" >Add new member</a>]";
	?>
	    <span class="S10">
	      <? 
		  if($suid==1)
		  {
		  if($num>0){
		?>
	     <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
		  <tr><td align="right" valign="middle">
		      <input type="hidden" name="num" value="<?=$tam?>">
		      <input type="submit" name="Submit3" value="<?=$update_page?>" class="nut_nhan">
		      <input type="reset" name="Submit22" value="<?=$main_buttom_sort_reset?>" class="nut_nhan">
		      <input type="button" name="Submit32" value="<?=$view_item_buttom_hien_thi?>" onClick="activate_all_do('activate.php','?ma_activate=activate_account&key=activate')" class="nut_nhan">
		      <input type="button" name="Submit42" value="<?=$view_item_buttom_khong_hien_thi?>" onClick="activate_all_do('activate.php','?ma_activate=activate_account&key=deactivate')" class="nut_nhan">
		      <input type="button" name="Submit22" value="<?=$view_item_buttom_xoa?>" onClick="delete_all_do('delete_wait.php','?ma_del=account')" class="nut_nhan">
		      </td>
		  </tr>
        </table>
		
	      <? }}?>
	      </span></td>
	  </tr></table>
	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    <tr><td width="59%" height="40" align="center" valign="middle"><span class="S10">
	      <? pag_cat_sort($page_count,$num,$start,$PHP_SELF,$cut_off,$cat,$alpha,$lg); ?>
	      </span></td>
		    </tr>
	    </table>
		  <INPUT type=hidden value='' name="chon">
                    <INPUT type=hidden value='' name="chon_s">
                  </form>		
		    </td></tr>
                  </table>
  <? ?></td>
  </tr>
</table>

<? include("../inc/bottom.php")?>
