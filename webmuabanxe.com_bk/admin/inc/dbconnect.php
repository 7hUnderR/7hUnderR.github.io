<? 
include("AntiSQLInjection.php");
if(strstr($_SERVER['HTTP_HOST'],"localhost") || strstr($_SERVER['HTTP_HOST'],"web-bantn"))
{
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "webmuabanxe_bk"; 		     
@mysql_connect($host,$user,$pass)
or die("Can not connect to server");
@mysql_select_db("$dbname")
or die("Can not connect to database");
}
else
{
$host = "localhost"; 
$dbname = ""; 		     
$user = ""; 
$pass = ""; 
@mysql_connect($host,$user,$pass)
or die("Can not connect to server");
@mysql_select_db("$dbname")
or die("Can not connect to database");
}
?>