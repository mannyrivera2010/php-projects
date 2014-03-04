<?
$do = isset($_REQUEST['do']) ? trim($_REQUEST['do']) : "";

$self = $_SERVER['PHP_SELF'];

$Title='Quiz 1';
$QuizID='Quiz 1';
//Background and Text Color
$BGColor= '#ffffff' ; //White
$TextColor = '#000000' ; //Black

switch ($do) {
case "":

?>
<html>
<head>

<?
Echo '<title>'.$Title.'</title>'
?>


</head>

<?
echo '<body bgcolor="'.$BGColor.'" text="'.$TextColor.'">'
?>

<?
echo '<form method="post" action="'.$self.'?do=grade">'
?>


<table align="center" border="15" width="727">


<tr><td>

<?
echo '<center><h1>'.$Title.'</h1></Center>'
?>


</td></tr>


<tr><td>
<?

echo '<input name="QuizID" value ="'.$QuizID.'" type="hidden">'
?>

      <b>Enter name:</b>
      <input name="name" value size="20" maxlength="20" type="text"><br> <BR>
    
</td></tr>

<tr><td>
<b>Question 1</b> <br>
      
      <input name="Q1" value="1" type="radio"> Choice A<br>
      <input name="Q1" value="2" type="radio"> Choice B<br>
      <input name="Q1" value="3" type="radio"> Choice C<br>
      <input name="Q1" value="4" type="radio"> Choice D<br> 

</td></tr>

<tr><td>
<b>Question 2</b> <br>
      
      <input name="Q2" value="1" type="radio"> Choice A<br>
      <input name="Q2" value="2" type="radio"> Choice B<br>
      <input name="Q2" value="3" type="radio"> Choice C<br>
      <input name="Q2" value="4" type="radio"> Choice D<br> 

</td></tr>

<tr><td>
<b>Question 3</b> <br>
      
      <input name="Q3" value="1" type="radio"> Choice A<br>
      <input name="Q3" value="2" type="radio"> Choice B<br>
      <input name="Q3" value="3" type="radio"> Choice C<br>
      <input name="Q3" value="4" type="radio"> Choice D<br> 

</td></tr>

<tr><td>
<b>Question 4</b> <br>
      
      <input name="Q4" value="1" type="radio"> Choice A<br>
      <input name="Q4" value="2" type="radio"> Choice B<br>
      <input name="Q4" value="3" type="radio"> Choice C<br>
      <input name="Q4" value="4" type="radio"> Choice D<br> 

</td></tr>

    <!-- End Question -->

<tr><td>
      <p align="center"><input value="Grade Test" name="mark" type="submit"><input value="Reset Test" name="reset" type="reset">
</td></tr>


<tr><td>
      This was made with&nbsp; PHP QUIZ MAKER<br>
      <B>EARA SOFTWARE </B>
</td></tr>


</table>
</form>

</body>
</html>


<?
break;
case "grade":

?>

<html>
<head>
<title>Quiz Results</title>
</head>

<body>

<?







mark_questions();



Echo '<Br><Br><Br><Br><Br><B>EARA SOFTWARE</B?'

?>

</body>
</html>


<?
break;

}

function score($result)
{
$content=''.
'<b>Date:</B> '.date('M-d-Y').
'<BR><B>Time: </B> '.Date('g:i a').'<br>'.
'<B>Quiz Id : </B> '.$_POST['QuizID'].
'<BR><b>User ID: </b>'.$_POST['name'].'<br>'.
'<b>Score: </b>'."$result%".'<br>'.
'<b>IP : </b>'.$_SERVER['REMOTE_ADDR'].
'<HR>';

$path='database\\'.$_POST['QuizID'].'.html';

@$fp=fopen($path,'a');
if(!$fp)
{
echo "<b>ERROR - Writing to File</b>";
}
fwrite($fp,$content);
fclose($fp);
}//End Of Fuction

function mark_questions()
{



echo '<b>Date:</B> '.date('M-d-Y');
Echo '<BR><B>Time: </B> '.Date('g:i a').'<br>';

echo '<HR>';

Echo '<B>Quiz Id : </B> '.$_POST['QuizID'];
Echo '<Br><B>User ID : </B>'.$_POST[name];


$right=0;
$wrong=0;
$numberofquestion=0;

//Question
$numberofquestion++;
if ($_POST[Q1] == "1") //start Endif
{
$right++;
}
else
{
$wrong++;

} 

$numberofquestion++;
if ($_POST[Q2] == "2") //Start 1st endif
{
$right++;
}
else
{
$wrong++;
} //Endif

//Question
$numberofquestion++;
if ($_POST[Q3] == "3") //Start
{
$right++;
}
else
{
$wrong++;

}//End Endif

//Question
$numberofquestion++;
if ($_POST[Q4] == "4") //Start Endif
{
$right++;
}
else
{
$wrong++;
}


$result = $right / $numberofquestion * 100;
echo	"<BR><B>Score: </B>  $result% <Br>";

//Users stats

echo '<HR>';
echo '<b>Statistics:</B> <BR>';
echo 'Number of right questions: '.$right.'<br>';
echo 'Number of wrong Questions: '.$wrong.'</b><br/>';

echo '<HR>';

echo '<br><B>Administror recored you score into the Database</b><br>';
echo '<B> Your computer ID is </B> '.$_SERVER['REMOTE_ADDR'];
score($result);


}//End Of Fuction
?>
