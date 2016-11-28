	<?  
	$str_search = array ( 
	"Mon", 
	"Tue", 
	"Wed", 
	"Thu", 
	"Fri", 
	"Sat", 
	"Sun", 
	"am", 
	"pm", 
	":" 
	); 
	$str_replace = array ( 
	"Th&#7913; hai", 
	"Th&#7913; ba", 
	"Th&#7913; t&#432", 
	"Th&#7913; n&#259;m", 
	"Th&#7913; s&#225;u", 
	"Th&#7913; b&#7843;y", 
	"Ch&#7911; nh&#7853;t", 
	" ph&#250;t, s&#225;ng", 
	" ph&#250;t, chi&#7873;u", 
	" gi&#7901; " 
	); 

	$timenow = gmdate("D, d/m/Y - g:i ", time() + 7*3600); 
	if($lg=="vn")
	$timenow = str_replace( $str_search, $str_replace, $timenow); 
	
	echo $timenow; 
	?>