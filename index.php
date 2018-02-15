<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once('admin/phpscripts/config.php'); //connecting to the config.php page
//set up condition below
//can use this as a reference/template example for future projects linking 3 columns
////make sure to include the lines of code in the read.php file too (the function filterType)
if(isset($_GET['filter'])){
  $tbl = "tbl_movies";
  $tbl2 = "tbl_genre";
  $tbl3 = "tbl_mov_genre";
  $col = "movies_id";
  $col2 = "genre_id";
  $col3 = "genre_name";
  $filter = $_GET['filter'];   //$filter //replacing word action with the variable filter
  $getMovies = filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
}else{
  $tbl = "tbl_movies";
  $getMovies = getAll($tbl); //this is where we are defining/connection the varible tbl to tbl_movies in db
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
</head>
<body>
  <?php
  include('includes/nav.html'); //the nav
  //this is where php will write out the info for the nav

  if(!is_string($getMovies)){ //the ! means not, in this case, it's checking if it is not a string...
   while($row = mysqli_fetch_array($getMovies)){ //while loop, fetch as array, and store in variable as row
     echo "<img src=\"images/{$row['movies_cover']}\" alt\"{$row['movies_title']}\">
     <h2>{$row['movies_title']}</h2>
     <p>{$row['movies_year']}</p>
     <a href=\"details.php?id={$row['movies_id']}\">More Details...</a>
     <br><br>";
   }
  }else{ //else, if it is a string
    echo "<p class=\"error\">{$getMovies}</p>"; //the \ is a cancelling character
  }

  include('includes/footer.html'); //the footer
  ?>
</body>
</html>
