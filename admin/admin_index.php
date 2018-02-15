<?php
require_once('phpscripts/config.php');
confirm_logged_in();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal Login</title>
<link href="css/main.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>

<h1>Welcome to your admin page</h1>
<?php echo "<h2>Hi-{$_SESSION['user_name']}</h2>"; ?>
<!--.........My Assignment additions below added............-->
<!--.........Delete line 17 once bottom functionality working............-->
<?php if(date("H" < 12){ //if the time is morning, show the following message:
echo "<h2 class="morningMsgH msgH">Goodmorning-{$SESSION['user_name']}</h2>
<br>
<p class="morningMsgP msgP">Hope you are having a groovy morning :)</p>"
}else if(date("H" > 11 && date("H") < 18){ //if the time is afternoon show the following message:
  echo "<h2 class="noonMsgH msgH">Good Afternoon-{$SESSION['user_name']}</h2>
  <br>
  <p class="noonMsgP msgP">Hope you are having a delightful afternoon :)</p>"
}else if(date("H" > 18 && date("H") < 1){ //if the time is evening, show the following message:
  echo "<h2 class="eveMsgH msgH">Good Evening-{$SESSION['user_name']}</h2>
  <br>
  <p class="eveMsgP msgP">It's getting late out, time for a movie break? :)</p>"
}
?>


</body>
</html>
