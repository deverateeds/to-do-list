<?php

	//retrieve data from front end
	$newTask = $_POST['task'];

	//echo $newTask;


	//open json file
	$todos = file_get_contents('assets/todos.json');
	$todos = json_decode($todos, true);

	
	//append new task to array $todos
	array_push($todos, array('task' => $newTask, 'done' =>false));

	//var_dump($todos);

	//Update json file
	$file = fopen('assets/todos.json', 'w');  //w means writable
	fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));  //converts to json format
	fclose($file);



//return id of new task to front-end
	$id = count($todos) - 1; 
	echo $id;

?>