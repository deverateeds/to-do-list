<?php

	$id = $_POST['id']; // to get value (id)from .post in todos.js

	$todos = file_get_contents('assets/todos.json'); //import json file to update
	$todos = json_decode($todos, true); // need to convert the data to array - format php can read


	// this part only updates array. 


	/* 
	& 

	call by value - we have no way to modify value but can access
	call by reference - we have permissions to access the array and modify

	& is used to "ask permission to modify the array"

	*/
	foreach ($todos as $key => &$todo) { //&
		
		if ($key == $id) {//look for id of task you want to update
			if ($todo['done'] == false)
				$todo['done'] = true;
			else
				$todo['done'] = false;
		}

	}

	// this part updates json fiel.  to overwrite json file
	$file = fopen('assets/todos.json', 'w');  //w means writable
	fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));  //converts to json format
	fclose($file);

?>