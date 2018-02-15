<?php

//This is code to get all of something
function getAll($tbl){
	include('connect.php');
  $queryAll = "SELECT * FROM {$tbl}"; //replacing tbl_movies with variable tbl, tbl varible defined on index.php page
  //echo $tbl;
	$runAll = mysqli_query($link, $queryAll); //getting the link and what is defined in varibale $tbl
  if($runAll){ //if it's an object you can just use runAll here, and you add a return in the if statement
  return $runAll;
}else{ //else, if it is not an object... there is some kind of error
  $error = "There was an error accessing this information. Please contact your admin"; //error message pops up if error
  return $error;
	}
	mysqli_close($link);
}
function getSingle($tbl, $col, $id){
	include('connect.php');
	$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}"; //instead of using tbl_movies for example, replacing with tbl varible
  //echo $querySingle;
  $runSingle = mysqli_query($link, $querySingle);
	if($runSingle){ //if it's an object you can just use runAll here, and you add a return in the if statement
  return $runSingle;
}else{ //else, if it is not an object... there is some kind of error
  $error = "There was an error accessing this information. Please contact your admin"; //error message pops up if error
  return $error;
	}
	mysqli_close($link);
	}
	//can use this function below as a template/example for anything that requires 3 tables
	//make sure to write out th lines in your index as well, the ones commented out in this function
	//refer to index in this example site as a reference
	function filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter){
		include('connect.php');
		//echo "From filterType()";
		//the lines comment below are found in the index page (index page is where connecting them)
		//$tbl = "tbl_movies";
		//$tbl2 = "tbl_genre";
		//$tbl3 = "tbl_mov_genre";
		//$col = "movies_id";
		//$col2 = "genre_id"
		//$col3 = "genre_name"
		//$filter //replacing word action with the variable filter
$queryFilter= "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND
{$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3} = '{$filter}'";
//echo $queryFilter;
$runFilter = mysqli_query($link, $queryFilter);
if($runFilter){
	return $runFilter;
}else{
	$error = "There was an error accessing this information. Please contact your admin"; //error message pops up if error
	return $error;
}
mysqli_close($link);

}


?>
