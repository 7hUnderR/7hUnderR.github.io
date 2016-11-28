<? include("inc/banner.php")?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="15%" valign="top" class="bg_left"><? include("inc/menu.php")?></td>
  <td width="85%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
              <tr class="M">
                <td width="792" height="25" valign="middle" class="bg_title"><img src="images/home.gif" border="0"> <?=$change_style?></td>
             </tr>
              <tr>
                <td height="285" valign="top" class="bg_center">
				<?
					$form_action = $_SERVER['PHP_SELF'];
					$qr = $_SERVER["QUERY_STRING"];
					if($qr!="")
					  $form_action = $form_action."?".$qr;
					  
					if ( (isset($_POST["form"])) && ($_POST["form"] == "form"))
					 {
							$style_code = $_POST["style_code"];
							$query = "UPDATE tb_config_style SET activate='1' ";
							$query .= "WHERE style_code=$style_code";
							$result = mysql_query($query);
							
							$query = "UPDATE tb_config_style SET activate='0' ";
							$query .= "WHERE style_code!=$style_code";
							$result = mysql_query($query);

							echo "<script  language='JavaScript'>";
							echo "alert('$update_completed')";
							echo "</script>";
						    echo"<meta http-equiv=\"refresh\" content=\"0;url=$form_action\">";
					}
				?>
			<table id="datatable" class="tbldata"  width="300" border="0" cellpadding="2" cellspacing="0">
			<form name="form" method="post" action="<?=$form_action?>">
			<thead>
			  <tr valign="bottom">
               <th id="subjectheader" width="81" height="22">&nbsp;</Th>
              <th id="subjectheader" width="211" valign="middle"><?=$change_style?></Th>
                </tr>
              </thead>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="middle" class="tab_10_bg_1" align="right"><?=$style?></td>
            <td valign="top" class="line_bottom">
			 <select name="style_code" id="select" class="selected">
                <?
				$query = "Select * FROM  tb_config_style order by style_code ASC ";
				$result = mysql_query($query);
				while($rs= mysql_fetch_array($result))
				 {
				?>
				<option value="<?=$rs["style_code"]?>" <? if($rs["activate"]=="1") echo"selected"?>><?=$rs["style_name"]?></option>
				<?
				 }
				?>
              </select>
				</td>
                </tr>
              <tr  bgcolor='ffffff' onMouseOut=this.style.backgroundColor='#ffffff'; onmouseover=this.style.backgroundColor='#EAEAEA';>
                <td valign="top" class="tab_10_bg_1"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td valign="top" class="line_bottom">
			         <input type="hidden" name="form" value="form">
				     <input name="Submit" type="submit" class="nut_nhan" value="<?=$login_change?>"> 
				     <input name="Submit2" type="reset" class="nut_nhan" value="<?=$view_item_reset?>">			</td>
              </tr>
	        </form> 
			   </table>
			   </td>
              </tr>
                  </table>
  <? ?></td>
  </tr>
</table>
<? include("inc/bottom.php")?>
