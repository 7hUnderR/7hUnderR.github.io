<?php
session_start();
header("content-type:text/html;charset=utf-8");
include("../inc/dbconnect.php");
/*************/
$export=$_GET["export"];
$lg=$_GET["lg"];

$query = $HTTP_SESSION_VARS['export_query'];
if($export=="csv")
	{
		$contents="No., ID, Subject, Message, Name, Age, Address, Country, Email, Phone, Company, Occupation, Field of Interesting, Education, Contact Day, Contact Time \n";
		$user_query = mysql_query($query);
		$i=0;
		while($rs = mysql_fetch_array($user_query))
		{
		$contents.=$i.",";
		$contents.=$rs["id"].",";
		$contents.=$rs["title_$lg"].",";
		$contents.=$rs["noi_dung_$lg"].",";
		$contents.=$rs["name_$lg"].",";
		$contents.=$rs["age"].",";
		$contents.=$rs["address_$lg"].",";
		$contents.=$rs["country"].",";
		$contents.=$rs["email"].",";
		$contents.=$rs["phone"].",";
		$contents.=$rs["company_$lg"].",";
		$contents.=$rs["nghe_nghiep_$lg"].",";
		$contents.=$rs["so_thich_$lg"].",";
		$contents.=$rs["education_$lg"].",";
		$contents.=$rs["date"].",";
		$contents.=$rs["gio"].",";
		$contents.="\n";
		$i++;
		}
		$contents = strip_tags($contents); // remove html and php tags etc.
		header("Content-Disposition: attachment; filename=costumer_list.csv");
		print $contents;
	}
if($export=="xls")
	{
		 $result=mysql_query(" $query ");
		
		// Functions for export to excel.
		function xlsBOF() {
		echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
		return;
		}
		function xlsEOF() {
		echo pack("ss", 0x0A, 0x00);
		return;
		}
		function xlsWriteNumber($Row, $Col, $Value) {
		echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
		echo pack("d", $Value);
		return;
		}
		function xlsWriteLabel($Row, $Col, $Value ) {
		$L = strlen($Value);
		echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
		echo $Value;
		return;
		}
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");;
		header("Content-Disposition: attachment;filename=customer_list.xls ");
		header("Content-Transfer-Encoding: binary ");
		
		xlsBOF();
		
		/*
		Make a top line on your excel sheet at line 1 (starting at 0).
		The first number is the row number and the second number is the column, both are start at '0'
		*/
		
		xlsWriteLabel(0,0,"Costumer Contact List.");
	
		// Make column labels. (at line 3)
		xlsWriteLabel(2,0,"No.");
		xlsWriteLabel(2,1,"ID");
		xlsWriteLabel(2,2,"Subject");
		xlsWriteLabel(2,3,"Message");
		xlsWriteLabel(2,4,"Name");
		xlsWriteLabel(2,5,"Age");
		xlsWriteLabel(2,6,"Address");
		xlsWriteLabel(2,7,"Country");
		xlsWriteLabel(2,8,"Email");
		xlsWriteLabel(2,9,"Phone");
		xlsWriteLabel(2,10,"Company");
		xlsWriteLabel(2,11,"Occupation");
		xlsWriteLabel(2,12,"Field of Interesting");
		xlsWriteLabel(2,13,"Education");
		xlsWriteLabel(2,14,"Contact Day");
		xlsWriteLabel(2,15,"Contact Time");
		$xlsRow = 3;
		$i=0;
		// Put data records from mysql by while loop.
	
		while($rs=mysql_fetch_array($result))
		{
		xlsWriteLabel($xlsRow,0,$i);
		xlsWriteLabel($xlsRow,1,$rs["id"]);
		xlsWriteLabel($xlsRow,2,$rs["title_$lg"]);
		xlsWriteLabel($xlsRow,3,$rs["noi_dung_$lg"]);
		xlsWriteLabel($xlsRow,4,$rs["name_$lg"]);
		xlsWriteLabel($xlsRow,5,$rs["age"]);
		xlsWriteLabel($xlsRow,6,$rs["address_$lg"]);
		xlsWriteLabel($xlsRow,7,$rs["country"]);
		xlsWriteLabel($xlsRow,8,$rs["email"]);
		xlsWriteLabel($xlsRow,9,$rs["phone"]);
		xlsWriteLabel($xlsRow,10,$rs["company_$lg"]);
		xlsWriteLabel($xlsRow,11,$rs["nghe_nghiep_$lg"]);
		xlsWriteLabel($xlsRow,12,$rs["so_thich_$lg"]);
		xlsWriteLabel($xlsRow,13,$rs["education_$lg"]);
		xlsWriteLabel($xlsRow,14,$rs["date"]);
		xlsWriteLabel($xlsRow,15,$rs["gio"]);
		$i++;
		$xlsRow++;
		}
		xlsEOF();
		exit();	
	}

?>
