<html>
<head>
<title>LOGIN PAGE</title>
</head>
<body>
<h3><align= "center">
LOGIN DETAILS</align>
<br>
<br><br>
</h3>
<?php
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'iamtheking';
$usrname=$_GET['username'];
$pwd=$_GET['password'];
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$log = "SELECT username,password FROM details WHERE username='$usrname'";
$sub="INSERT INTO details (username,password) VALUES ('$usrname','$pwd')";
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db( 'login' );
if(isset($_GET['submit']))
if(!(is_null($usrname)))
{
 {
 $ret_sub=mysql_query( $sub, $conn );
 if(! $ret_sub )
{
  die('Could not enter data: ' . mysql_error());
}
}
}
else
{
  echo "PLEASE ENTER USERNAME.";
    }

if(isset($_GET['logi']))
{
  if($usrname  != "")
  {
   $ret_log=mysql_query( $log, $conn );
   if(! $ret_log )
   {
     die('Could not get data: ' . mysql_error());
   }  
  $row = mysql_fetch_array($ret_log, MYSQL_ASSOC);
{
   if($row['password'] != $pwd)
   {
    echo "USERNAME AND PASSWORD MISMATCH";
   } 
   else
   {
    echo "HELLO ";
    echo strtoupper($row['username']); 
    echo " WELCOME!";
    
    }
  }
 }
}
mysql_close($conn);
?>
<form action="login_page.php" method="GET">
USER NAME:&nbsp;&nbsp;<input type="text" name="username"><br>
PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SIGN UP!" name="submit" > &nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="LOGIN" name="logi"><br>
</form>
</body>
</html>
