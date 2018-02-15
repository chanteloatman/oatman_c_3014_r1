<?php
function logIn($username, $password, $ip)
{
  require_once('connect.php');
  $username = mysqli_real_escape_string($link, $username); //make sure use mysqli, mysql is old don't use
  $password = mysqli_real_escape_string($link, $password);
  $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
  //  echo $loginstring;
  $user_set = mysqli_query($link, $loginstring); //shows number of rows in phpmyadmin
  if(mysqli_num_rows($user_set)){
    $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC); //look at who's inside object
    $id = $found_user['user_id'];//what want from line above is users id, shown in this line of code
    $_SESSION['user_id'] = $id; //use sessions when session is done file deleted from server
    $_SESSION['user_name'] = $found_user['user_fname'];
    if(mysqli_query($link, $loginstring)){
      $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id={$id}";
      $updatequery = mysqli_query($link, $updatestring);
    }
    redirect_to("admin_index.php");
    $loginTimeLast = mysqli_fetch_assoc($LoginTime); //get the result, loginTimeLast
    $_SESSION['last_login'] = $theTime['time']; //show the last login time
  }else{
    $message = "username and or password is incorrect.<br>Please make sure your capslock key is turned off.";
    return $message;

    //Attempt to Log User Out 1:
  //}else if{
  //  $_SESSION['attempts'] < 3;
  //  $messageLockout = "You have exceeded the maximum log in attempts, try again later."; //message if exceed max log in attempts
  //  return $messageLockout; //show the message when user is locked out after exceeded attempts

    //Attempt to Log User Out 2:
  //logic errors - maximum log in attempts have happened, no access
 //}else if($id < 3){ //if the id in database shows more than 3:
  //    $messageLockout = "You have exceeded the maximum log in attempts, try again later." //message if exceed max log in attempts shows
    // return $messageLockout; //show the message when user is locked out after exceeded attempts
    }
  mysqli_close($link);
}
?>
