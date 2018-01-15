<?php

$todos = file_get_contents('assets/todos.json') /*import todos json file*/;

$todos = json_decode($todos, true); 
/* 	-change Json data to JS object. 
	-Second $todos is to override the first variable assignment.  
	-true converts and organizes json format to multimdimensional/associative array in JS
*/




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">


	<title>PHP To-Do List</title>



	<!-- Imports Bootstrap -->
  	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">


	<!-- Imports CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>


<div id="container-fluid" id="mainContainer">
	<div class="container" id="secondContainer">
	
		<h1>To-Do List</h1>
	
	<div class="well">
		
		
		<input type="text" placeholder="Add New Task" id="newTask">


		<ul>

			<?php 

				foreach ($todos as $key => $todo) {

					if ($todo['done'] === false)
						echo '<li id=' .$key. '><span><i class="fa fa-trash"></i></span>'.$todo['task'].'</li>';
					else
						echo '<li id="' .$key. '" class="completed"><span><i class="fa fa-trash"></i></span>'.$todo['task'].'</li>'; // even if you reload page, task will still have linethrough
				}

			?>
		</ul>
		
		</div> <!-- well -->
	</div>
</div> <!-- container -->


<!-- Import jQuery -->
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Import Font Awesome -->
<script src="https://use.fontawesome.com/e20396d196.js"></script>

<!-- Import Custom JS -->
<script type="text/javascript" src="assets/js/todos.js"></script>

</body>
</html>