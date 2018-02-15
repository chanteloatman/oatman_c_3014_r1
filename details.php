<?php
	require_once('admin/phpscripts/config.php'); //connection to config.php
	if(isset($_GET['id'])){
		$id = $_GET['id']; //defining id varibale and getting access to id
		$tbl = "tbl_movies";
    $col = "movies_id";
		$getSingle = getSingle($tbl, $col, $id);
		}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
</head>
<body>
	<?php
    if(!is_string($getSingle)){ //if an object, will return the object which is $getSingle
			$row = mysqli_fetch_array($getSingle);
			echo "<img src=\"images/{$row['movies_cover']}\"
			alt=\"{$row['movies_title']}\">
			<h2>{$row['movies_title']}</h2>
			<p>{$row['movies_year']}</p>
      <p>{$row['movies_storyline']}</p>
      <a href=\"index.php\">Back...</a>
			";


		}else{ // else if it is not an object, it will show error message
      echo "<p class=\"error\">{$getSingle}</p>";
		}
	?>
</body>
</html>
