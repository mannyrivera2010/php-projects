<?php
include 'vars.php';

$myFile = "../database_v3.db ";

try {
unlink($myFile);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



exec("sqlite2 ".$Databasefile." < export.txt");
exec("sqlite3 ".$myFile." < import.txt");

echo "Converted Database to Sqlite version 3<br>";
echo "The java sqlite driver used Sqlite3<br>";
echo "output: ".$myFile;
?>
