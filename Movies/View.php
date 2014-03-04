<?
$do = isset($_REQUEST['do']) ? trim($_REQUEST['do']) : "";

$self = $_SERVER['PHP_SELF'];


if (empty($do)) {
    echo 'ERROR';
}
  
echo '<Center><Font size="5">'.substr($do, 0, Strlen($file)-4).'</font></Center>';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Movie</title>
</head>
<body>
<center>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="445" height="379" id="player" align="middle">
<param name="movie" value="player.swf?file=movies/<? echo $do ?> &size=false&aplay=false&autorew=false&title=" />
<param name="menu" value="false" />
<param name="quality" value="high" />
<param name="bgcolor" value="#FFFFFF" />
<embed src="player.swf?file=movies/<? echo $do ?>&size=false&aplay=false&autorew=false&title=" menu="false" quality="high" bgcolor="#FFFFFF" width="445" height="379" name="player" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>

</center>

</body>
</html>

