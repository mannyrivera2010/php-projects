<?php require_once('../../Connections/mysql.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO days (ID, Abv, `Day`, LAbv) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID'], "int"),
                       GetSQLValueString($_POST['Abv'], "text"),
                       GetSQLValueString($_POST['Day'], "text"),
                       GetSQLValueString($_POST['LAbv'], "text"));

  mysql_select_db($database_mysql, $mysql);
  $Result1 = mysql_query($insertSQL, $mysql) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE days SET Abv=%s, `Day`=%s, LAbv=%s WHERE ID=%s",
                       GetSQLValueString($_POST['Abv'], "text"),
                       GetSQLValueString($_POST['Day'], "text"),
                       GetSQLValueString($_POST['LAbv'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_mysql, $mysql);
  $Result1 = mysql_query($updateSQL, $mysql) or die(mysql_error());
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_mysql, $mysql);
$query_Recordset1 = "SELECT * FROM days";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $mysql) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_mysql, $mysql);
$query_Recordset2 = "SELECT * FROM accounts,days";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $mysql) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>ID</td>
    <td>Abv</td>
    <td>Day</td>
    <td>LAbv</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['ID']; ?></td>
      <td><?php echo $row_Recordset1['Abv']; ?></td>
      <td><?php echo $row_Recordset1['Day']; ?></td>
      <td><?php echo $row_Recordset1['LAbv']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ID:</td>
      <td><input type="text" name="ID" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Abv:</td>
      <td><input type="text" name="Abv" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Day:</td>
      <td><input type="text" name="Day" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">LAbv:</td>
      <td><input type="text" name="LAbv" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p>&nbsp;</p>
<table border="1">
  <tr>
    <td>ID</td>
    <td>Customer</td>
    <td>Box_Number</td>
    <td>Street</td>
    <td>City</td>
    <td>State</td>
    <td>Zip_Code</td>
    <td>Money</td>
    <td>ID</td>
    <td>Abv</td>
    <td>Day</td>
    <td>LAbv</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset2['ID']; ?></td>
      <td><?php echo $row_Recordset2['Customer']; ?></td>
      <td><?php echo $row_Recordset2['Box_Number']; ?></td>
      <td><?php echo $row_Recordset2['Street']; ?></td>
      <td><?php echo $row_Recordset2['City']; ?></td>
      <td><?php echo $row_Recordset2['State']; ?></td>
      <td><?php echo $row_Recordset2['Zip_Code']; ?></td>
      <td><?php echo $row_Recordset2['Money']; ?></td>
      <td><?php echo $row_Recordset2['ID']; ?></td>
      <td><?php echo $row_Recordset2['Abv']; ?></td>
      <td><?php echo $row_Recordset2['Day']; ?></td>
      <td><?php echo $row_Recordset2['LAbv']; ?></td>
    </tr>
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
<?php echo ($startRow_Recordset2 + 1) ?> <?php echo ($startRow_Recordset2 + 1) ?> Records <?php echo ($startRow_Recordset2 + 1) ?> to <?php echo min($startRow_Recordset2 + $maxRows_Recordset2, $totalRows_Recordset2) ?> of <?php echo $totalRows_Recordset2 ?>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
