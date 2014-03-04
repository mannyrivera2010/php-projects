<H1>Loading XML file and putting in Database</H1><Hr>
<?php
include 'vars.php';
set_time_limit(0);
  
  $library = simplexml_load_file($xmlDir.'Products.xml');
  
  $db = sqlite_open($Databasefile);
 sqlite_query($db,"DELETE FROM Products ");

  foreach ($library->Products as $Products){

$ProductID=$Products->ProductID;
$ProductName=$Products->ProductName;
$SupplierID=$Products->SupplierID; 
$CategoryID=$Products->CategoryID; 
$QuantityPerUnit=$Products->QuantityPerUnit;
$UnitPrice=$Products->UnitPrice;
$UnitsInStock=$Products->UnitsInStock;
$UnitsOnOrder=$Products->UnitsOnOrder;
$ReorderLevel=$Products->ReorderLevel;
$Discontinued=$Products->Discontinued;

		
		///////////////////////
		////////////////////////
		/////////////////////////

$db = sqlite_open($Databasefile);

sqlite_query($db,"INSERT INTO Products VALUES(
\"$ProductID\",
\"$ProductName\",
\"$SupplierID\",
\"$CategoryID\", 
\"$QuantityPerUnit\",
\"$UnitPrice\",
\"$UnitsInStock\",
\"$UnitsOnOrder\",
\"$ReorderLevel\",
\"$Discontinued\")");

	printf("%s<br>",$ProductID);
	printf("%s<br>",$ProductName);
		echo "<br><hr><br>";
		
}
  
  echo "<hr><hr><h1>DONE</h1>";
  ?> 