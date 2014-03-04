<?php include("auth.php");

$do = isset($_REQUEST['get']) ? trim($_REQUEST['get']) : "";

$self = $_SERVER['PHP_SELF'];


set_error_handler('myHandler');

function myHandler($code, $msg, $file, $line) {
echo "<B><Font size = 16>Server Error</Font></B><Br>Sorry .  Contact the Administrator";
}

?>

<a href="admin.php">Go Back to Admin</a><Br><Br>

<?
readfile("quizzes\\database\\".$do.".html");
?>

