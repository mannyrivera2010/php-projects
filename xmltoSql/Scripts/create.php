<H1>Creating Sql Database File</H1><Hr>
<?php
include 'vars.php';
set_time_limit(0);

$db = sqlite_open($Databasefile);

sqlite_query($db,"
CREATE TABLE Products(
Products_ProductID Varchar(20),
Products_ProductName Varchar(20),
Products_SupplierID Varchar(20),
Products_CategoryID Varchar(20),
Products_QuantityPerUnit Varchar(20),
Products_UnitPrice Varchar(20),
Products_UnitsInStock Varchar(20),
Products_UnitsOnOrder Varchar(20),
Products_ReorderLevel Varchar(20),
Products_Discountinued Varchar(20))");

sqlite_query($db,"CREATE TABLE Orders(
Orders_OrderID Varchar(20),
Orders_CustomerID Varchar(20),
Orders_EmployeeID Varchar(20),
Orders_OrderDate Varchar(20),
Orders_RequiredDate Varchar(20),
Orders_ShippedDate Varchar(20),
Orders_ShipVia Varchar(20),
Orders_Freight Varchar(20),
Orders_ShipName Varchar(20),
Orders_ShipAddress Varchar(20),
Orders_ShipCity Varchar(20),
Orders_ShipPostalCode Varchar(20),
Orders_ShipCountry Varchar(20))");

sqlite_query($db,"CREATE TABLE OrderDetails (
OrderDetails_OrderID Varchar(20),
OrderDetails_ProductID Varchar(20),
OrderDetails_UnitPrice Varchar(20),
OrderDetails_Quantity Varchar(20),
OrderDetails_Discount Varchar(20))");

sqlite_query($db,"CREATE TABLE Customers (
Customers_CustomerID Varchar(20),
Customers_CompanyName Varchar(20),
Customers_ContactName Varchar(20),
Customers_ContactTitle Varchar(20),
Customers_Address Varchar(20),
Customers_City Varchar(20),
Customers_PostalCode Varchar(20),
Customers_Country Varchar(20),
Customers_Phone Varchar(20),
Customers_Fax Varchar(20))");

 echo "Making Tables <hr><h1>DONE</h1>";
  ?> 