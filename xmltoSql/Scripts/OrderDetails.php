<H1>Loading XML file and putting in Database</H1><Hr>
<?php
include 'vars.php';
set_time_limit(0);
  
  $library = simplexml_load_file($xmlDir.'OrderDetails.xml');
  
  $db = sqlite_open($Databasefile);
 sqlite_query($db,"DELETE FROM OrderDetails");

 
  foreach ($library->Order_x0020_Details as $Order_x0020_Details){
		$OrderID=$Order_x0020_Details->OrderID;
		$ProductID=$Order_x0020_Details->ProductID;
		$UnitPrice=$Order_x0020_Details->UnitPrice;
		$Quantity=$Order_x0020_Details->Quantity;
		$Discount=$Order_x0020_Details->Discount;

		///////////////////////
		////////////////////////
		/////////////////////////

$db = sqlite_open($Databasefile);

sqlite_query($db,"INSERT INTO OrderDetails VALUES(\"$OrderID\",\"$ProductID\",\"$UnitPrice\",\"$Quantity\",\"$Discount\")");

	printf("%s<br>",$OrderID);
	printf("%s<br>",$ProductID);
	printf("%s<br>",$UnitPrice);
	printf("%s<br>",$Quantity);
	printf("%s<br>",$Discount);

		echo "<br><hr><br>";
		
}
 echo "<hr><hr><h1>DONE</h1>";
  
  ?> 