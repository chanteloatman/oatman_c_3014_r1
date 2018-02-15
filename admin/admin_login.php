<?php
//the two lines below are to turn on error reporting // for a mac
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once('phpscripts/config.php');

//ip address, on mac it appears as two colons then a number, ex. ::1
$ip = $_SERVER['REMOTE_ADDR'];
//echo $ip;
if(isset($_POST['submit'])){
$username = trim($_POST['username']); //trim deletes the extra space before and after user or pass to avoid possible error logging in
$password = trim($_POST['password']);
if($username !== "" && $password !== ""){ //!== means not equal to
  //echo "you can type ;)";
  $result = logIn($username, $password, $ip);
  $message = $result;
}  else{
  $message = "Please fill in the required fields below"; //if someone doesn't fill in the required filed this message will appear
//  echo $message;
  }
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
<link rel="stylesheet" href="../css/main.css">
</head>

<body>

<h1 id="welcomeTitleMain">Welcome to Flashback</h1>
<?php if(!empty($message)){echo $message;} ?>
<form action="admin_login.php" method="post">
  <label id="userName" class="labelStyle">Username:</label>
  <input type="text" name="username" value="" class="inputStyle">
  <br>
  <label id="passWord" class="labelStyle">Password:</label>
  <input type="text" name="password" value="" class="inputStyle">
  <br>
  <input type="submit" name="submit" value="SUBMIT" id="submitButton">
</form>

</body>
</html>
