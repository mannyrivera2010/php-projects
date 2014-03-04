<?php
$intcount = "1";

if ($handle = opendir('Movies')) {

readfile("files\\header.html");


//Listing Files 
 if ($handle = opendir('Movies')) {
    while (false !== ($file = readdir($handle))) {
       
		if (substr($file, Strlen($file)-4, Strlen($file)) == ".flv" ) {
            //echo "$file <Br> ";
			
$IntCount ++;

			$stringShowing = substr($file, 0, Strlen($file)-4);

			 echo $IntCount.'. '.'<A HREF="view.php?do='.$stringShowing.'.FLV">'.$stringShowing.'</A><BR>'."\n";  // returns "abcde"
			 
			 
        }
    }
    closedir($handle);
}

	
//end Listing File

echo "</Body>"."\n";
echo "</html>"."\n";
 

}
?> 