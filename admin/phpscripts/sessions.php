<?php

session_start();

//sessions for locking down page , CMS checks does this page still exisit
//below shows if user goes back to login page and tried to go forward doesn't work, have to loggin again
function confirm_logged_in(){
  if(!isset($_SESSION['user_id'])){ //if false / not set, brings back to log in
    redirect_to('admin_login.php');  //brings back to log in
  }
}
?>
