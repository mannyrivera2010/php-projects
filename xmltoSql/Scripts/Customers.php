<H1>Loading XML file and putting in Database</H1><Hr>
<?php
include 'vars.php';
set_time_limit(0);
  
  $library = simplexml_load_file($xmlDir.'Customers.xml');
  
  $db = sqlite_open($Databasefile);
 sqlite_query($db,"DELETE FROM customers ");

  foreach ($library->Customers as $Customers){
		$CustomerID=$Customers->CustomerID;
		$CompanyName=$Customers->CompanyName;
		$ContactName=$Customers->ContactName;
		$ContactTitle=$Customers->ContactTitle;
		$Address=$Customers->Address;
		$City=$Customers->City;
		$PostalCode=$Customers->PostalCode;
		$Country=$Customers->Country;
		$Phone=$Customers->Phone;
		$Fax=$Customers->Fax;
		
		///////////////////////
		////////////////////////
		/////////////////////////

$db = sqlite_open($Databasefile);

sqlite_query($db,"INSERT INTO Customers VALUES(\"$CustomerID\",\"$CompanyName\",\"$ContactName\",\"$ContactTitle\",\"$Address\",\"$City\",\"$PostalCode\",\"$Country\",\"$Phone\",\"$Fax\")");

	printf("%s<br>",$CustomerID);
	printf("%s<br>",$CompanyName);
	printf("%s<br>",$ContactName);
	printf("%s<br>",$ContactTitle);
	printf("%s<br>",$Address);
	printf("%s<br>",$City);
	printf("%s<br>",$PostalCode);
	printf("%s<br>",$Country);
	printf("%s<br>",$Phone);
	printf("%s<br>",$Fax);
		echo "<br><hr><br>";
		
}
  
  echo "<hr><hr><h1>DONE</h1>";
  ?> 