	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
	$cat="1";
	if(isset($HTTP_GET_VARS["cat"]))
	{
		$cat = $HTTP_GET_VARS["cat"];
	}

	$bac="1";
	if(isset($HTTP_GET_VARS["bac"]))
	{
		$bac = $HTTP_GET_VARS["bac"];
	}

	$alpha="All";
	if(isset($HTTP_GET_VARS["alpha"]))
	{
		$alpha=$HTTP_GET_VARS["alpha"];
	}

	$start="0";
	if(isset($HTTP_GET_VARS["start"]))
	{
		$start = $HTTP_GET_VARS["start"];
	}
	if(isset($HTTP_GET_VARS["lg"]))
	{
		$lg = $HTTP_GET_VARS["lg"];
	}
?>
