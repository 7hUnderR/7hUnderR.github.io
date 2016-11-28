<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
	$link_root = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) 
		$link_root .= "?" . $_SERVER['QUERY_STRING'];

	if(strstr($link_root,"menu"))
	{
		if(isset($_GET["menu"]))
		$menu=$_GET["menu"];
		$menu=(isset($menu))?$menu:0;
		
		$HTTP_SESSION_VARS['menu'] = $menu;
		//echo"AA: $menu";
	}
	else
	{
	   if(session_is_registered("menu"))
	     $menu= $HTTP_SESSION_VARS['menu'];
	   else
	     $menu=0;
	   //echo"BB: $menu";
	}
	
	
	//echo"$menu";
	
	$link_root = substr( $link_root, 0, strpos( $link_root, "/admin/" ) );
	
?>
<script language="javascript">
	var Tree = new Array();
		<?
		$i=-1;
		
		if($ma_user_admin==1)
		   $query = "Select * FROM  tb_setup_menu order by menu_sort ASC";
		else
		   {
		   if($suid==1)
			 $query = "Select * FROM  tb_setup_menu where menu_activate=1 and menu_type=1 order by menu_sort ASC";
		   else
			 $query = "Select * FROM  tb_setup_menu where menu_activate=1 and menu_quyen!=1 order by menu_sort ASC";
		   }
		
		$result = mysql_query($query);
		while($rs= mysql_fetch_array($result))
		{
			$id=$rs["id"];
			$ten_dv=$rs["menu_ten"];
			$i++;
			$num=dem_max_dk("tb_setup_menu_s","ma_id_s",$id);
			if($num>0)
			  $link_page="javascript:;";
			else
			  $link_page=$rs["menu_link"];
		?>
	 	Tree[<?=$i?>] = "<?=$id?>|0|0|0|0|<?=$ten_dv?>|<?=$link_page?>";
		<?
		if($ma_user_admin==1)
		   $query_tp = " Select * FROM  tb_setup_menu_s where ma_id_s=$id and menu_activate=1 order by menu_sort ASC ";
		else
		   {
		   if($suid==1)
		   $query_tp = " Select * FROM  tb_setup_menu_s where ma_id_s=$id and menu_activate=1 order by menu_sort ASC ";
		   else
		   $query_tp = " Select * FROM  tb_setup_menu_s where ma_id_s=$id and menu_quyen=2 and menu_type=1 and menu_activate=1 order by menu_sort ASC ";
		   }
		   
		$result_tp = mysql_query($query_tp);
		while($rs_tp= mysql_fetch_array($result_tp))
		{
			$id_s=$rs_tp["ma_id_s"];
			$menu_name=$rs_tp["menu_ten"];
			$i++;
			if(strstr($rs_tp["menu_link"],"?"))
		      $link_page=$rs_tp["menu_link"]."&menu=$id";
			else
			  $link_page=$rs_tp["menu_link"]."?menu=$id";
			
			if($menu!=$id)
			{
				if(strstr($_SERVER['PHP_SELF'],"binhchon/"))
					$link_page=str_replace("binhchon/","",$link_page);
			}	
			if($menu!=$id)
			{
				if(strstr($_SERVER['PHP_SELF'],"shopping_cart/"))
					$link_page=str_replace("shopping_cart/","",$link_page);
			}
				
			$link_page = $link_root."/admin/".$link_page;
		?>
	 	Tree[<?=$i?>] = "<?=$id_s?>|<?=$id?>|0|0|0|<?=$menu_name?>|<?=$link_page?>";
     
	  <?
	  }//end bat 2 
	  }//end bat 1 
	  ?></script>