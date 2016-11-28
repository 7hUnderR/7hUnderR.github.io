<?
include("../dbconnect.php");
				
		for ( $i = 1; $i < 171; $i++ )
				{
				if($i<10)
				$name="000";
				if(($i>10)&&($i<100))
				$name="00";
				if($i>100)
				$name="0";
				
				$name.=$i.".GIF";
				
				$table="tb_account_symbol";
				$query = "INSERT INTO $table(ma_symbol,ten_symbol)";
				$query .= " VALUES('$i','$name')";
				if($result = mysql_query($query))
				echo "Catelogy Add Complete !";
				}
?>