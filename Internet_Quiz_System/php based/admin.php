<?php include("auth.php");

$intcount = "1";

if ($handle = opendir('quizzes')) {

?>
<html>
<head>
<title>Online Quizzes Results</title>
</head>
<body>
<Center><H1 align="center">Online Quizzes Results</H1></Center>

<?

//Listing Files 
 if ($handle = opendir('\\quizzes\\database')) {
    while (false !== ($file = readdir($handle))) {
       
		if (substr($file, Strlen($file)-5, Strlen($file)) == ".html" ) {
            //echo "$file <Br> ";
			
$IntCount ++;

			$stringShowing = substr($file, 0, Strlen($file)-5);

			 echo '<A HREF="getresults.php?get='.$stringShowing.'">'.$IntCount.". ".$stringShowing.'</A><BR>'."\n";  
			 
        }
    }
    closedir($handle);
}


?>

</Body>
</html>
 
<?

}
?> 