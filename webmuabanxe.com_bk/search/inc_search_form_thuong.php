<?
 $trang_here=29;
 if(gia_tri_mot_cot("tb_bac_1","trang",$trang_here,"activate")==1)
 {
?>
	<script language="javascript">
	function encode(value){
	value = value.replace('À','&Agrave;'); //&Agrave;
	value = value.replace('Á','&Aacute;'); //&Aacute;
	value = value.replace('Ã','&Atilde;'); //&Atilde;
	value = value.replace('Â','&Acirc;'); //&Acirc;
	value = value.replace('É','&Eacute;'); //&Eacute;
	value = value.replace('Ê','&Ecirc;'); //&Ecirc;
	value = value.replace('Ì','&Igrave;'); //&Igrave;
	value = value.replace('Í','&Iacute;'); //&Iacute;
	value = value.replace('Ò','&Ograve;'); //&Ograve;
	value = value.replace('Ó','&Oacute;'); //&Oacute;
	value = value.replace('Ô','&Ocirc;'); //&Ocirc;
	value = value.replace('Õ','&Otilde;'); //&Otilde;
	value = value.replace('Ù','&Ugrave;'); //&Ugrave;
	value = value.replace('Ú','&Uacute;'); //&Uacute;
	value = value.replace('Ý','&Yacute;'); //&Yacute;
	 
	value = value.replace('à','&agrave;'); //&agrave;
	value = value.replace('á','&aacute;'); //&aacute;
	value = value.replace('ã','&atilde;'); //&atilde;
	value = value.replace('â','&acirc;'); //&acirc;
	value = value.replace('é','&eacute;'); //&eacute;
	value = value.replace('ê','&ecirc;'); //&ecirc;
	value = value.replace('ì','&igrave;'); //&igrave;
	value = value.replace('í','&iacute;'); //&iacute;
	value = value.replace('ò','&ograve;'); //&ograve;
	value = value.replace('ó','&oacute;'); //&oacute;
	value = value.replace('ô','&ocirc;'); //&ocirc;
	value = value.replace('õ','&otilde;'); //&otilde;
	value = value.replace('ù','&ugrave;'); //&ugrave;
	value = value.replace('ú','&uacute;'); //&uacute;
	value = value.replace('ý','&yacute;'); //&yacute;	
	return value;
	}
	</script>
<?
	//$ma_bac_1 =  gia_tri_mot_cot("tb_bac_1","trang",12,"ma_bac_1");
		

	if(strstr($qr,"text_search"))
	   {
		$s_cat=$HTTP_GET_VARS["s_cat"];
		$value = $HTTP_GET_VARS["text_search"];
		$text= $value;
		$text_upper = strtoupper($text); //BAN TRAN
		$text_name = ucwords(strtolower($text)); //Ban Tran
		
	   }
	else
	   {
		$text="";
		$s_cat=0;
		$value = "";
	   }
	   
	if($lg=="eg")
	    {
		$title = "Key word: ";
		$ket_qua="Search result";
		$advanded="Advanded search";
		$all="All";
		}
	else
		{
		$title = "Từ khóa: ";
		$ket_qua="Kết quả tìm";
		$advanded="Tìm kiếm mở rộng";
		$all="Tất cả";
		}
		
		$search_cat=gia_tri_mot_cot("tb_bac_1","trang","29","ma_bac_1");
?>
	<table width="317" border="0" cellpadding="0" cellspacing="0">
 <form name="form_t" method="get" action="./" style="margin:0" onSubmit="this.text_search.value=encode(this.text_search.value);">
  <input type="hidden" name="Acat" value="<?=$search_cat?>">
  <tr>
    <td align="right" class="search_left">&nbsp;</td>
	<td width="299" align="center" class="text_search search_center"><table width="296" border="0" align="right" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="257" align="left" valign="middle" nowrap="nowrap" class="search_center_2 text_search" style="padding-left: 5px;"><input name="text_search" type="text" class="search_input" value="<?=$value?>" style="width: 245px; height: 19px;"/></td>
        <td width="36" align="center" valign="middle"><input type="image" src="styles/<?=$style_path?>/search.gif" value="Submit" align="absmiddle" border="0"></td>
      </tr>
    </table></td>
	<td align="right" class="search_right">&nbsp;</td>
  </tr>
 <input type="hidden" name="s_cat" value="0" />
<input type="hidden" name="start" value="0" />
 <input type="hidden" name="lg" value="<?=$lg?>" />
 </form>
</table>
<? } ?>