<H1>Loading XML file and putting in Database</H1><Hr>
<?php
include 'vars.php';
set_time_limit(0);
  
  $library = simplexml_load_file($xmlDir.'Orders.xml');
  
  $db = sqlite_open($Databasefile);
 sqlite_query($db,"DELETE FROM Orders");

 
  foreach ($library->Orders as $Orders){
		$OrderID=$Orders->OrderID;
		$CustomerID=$Orders->CustomerID;
		$EmployeeID=$Orders->EmployeeID;
		$OrderDate=$Orders->OrderDate;
		$RequiredDate=$Orders->RequiredDate;
		$ShippedDate=$Orders->ShippedDate;
		$ShipVia=$Orders->ShipVia;
		$Freight=$Orders->Freight;
		$ShipName=$Orders->ShipName;
		$ShipAddress=$Orders->ShipAddress;
		$ShipCity=$Orders->ShipCity;
		$ShipPostalCode=$Orders->ShipPostalCode;
		$ShipCountry=$Orders->ShipCountry;
		///////////////////////
		////////////////////////
		/////////////////////////

$db = sqlite_open($Databasefile);

sqlite_query($db,"INSERT INTO Orders VALUES(
\"$OrderID\",
\"$CustomerID\",
\"$EmployeeID\",
\"$OrderDate\",
\"$RequiredDate\",
\"$ShippedDate\",
\"$ShipVia\",
\"$Freight\",
\"$ShipName\",
\"$ShipAddress\",
\"$ShipCity\",
\"$ShipPostalCode\",
\"$ShipCountry\")");

	printf("%s<br>",$OrderID);
	printf("%s<br>",$CustomerID);
	printf("%s<br>",$EmployeeID);
    echo "<br><hr><br>";
		
}
 echo "<hr><hr><h1>DONE</h1>";
  
  ?> 