<html>
<head>
<title>Online Quizzes</title>
</head>
<body text="#FFFFFF" bgcolor="#000080" link="#CCFFFF">

<Center><Font size = "18">Online Quizzes<br>
</font>
	<I><A HREF="admin.php">Administrator</A></I><p>&nbsp;</p>
</Center>

</body>


<?php
$intcount = "0";

if ($handle = opendir('quizzes')) {


//Listing Files 
 if ($handle = opendir('quizzes')) {
    while (false !== ($file = readdir($handle))) {
       
		if (substr($file, Strlen($file)-4, Strlen($file)) == ".php" ) {
            //echo "$file <Br> ";
			
			$intcount ++;

			$stringShowing = substr($file, 0, Strlen($file)-4);

			 echo $intcount.'. '.'<A HREF="quizzes/'.$stringShowing.'.php">'.$stringShowing.'</A><BR>'."\n";  // returns "abcde"
			 
			 
        }
    }
    closedir($handle);
}

	
//end Listing File

echo "</Body>"."\n";
echo "</html>"."\n";
 

}
?> 

