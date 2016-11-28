    <link href="member/style.css" rel="stylesheet" type="text/css" />
<table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td height="20" align="left" class="bg_title title tab_5_5"><img src="images/icon/icon_b.gif" style="margin-right: 5px;" /><?=gia_tri_mot_cot("tb_bac_1","trang",49,"mo_ta_$lg")?></td>
                            </tr></table>
	<?
		if(!session_is_registered("ten_dang_nhap"))
		{
			include("form_login.php"); 
		}
		else
		{
		 	include("form_logout.php");
		}
	?>