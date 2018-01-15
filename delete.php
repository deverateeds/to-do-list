<?php


//retrieve item to be deleted
$id = $_POST['id'];

// load JSON file
$todos = file_get_contents('assets/todos.json');
$todos = json_decode($todos, true);


//delete task from the array $todos
array_splice($todos, $id, 1);

//var_dump($todos) ;


//Update json file
$file = fopen('assets/todos.json', 'w');  //w means writable
fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));  //converts to json format
fclose($file);

// echo $id;

