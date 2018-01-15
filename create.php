<?php 
	$newTask = $_POST['task'];

	echo $newTask;

	$todos = file_get_contents('assets/todos.json');
	$todos = json_decode($todos, true);

	// var_dump($todos); //var_dump is can parse information can substitute to "echo"


	//apend new task to array $todos

	array_push($todos, array('task' => $newTask, 'done' => false));
	var_dump($todos);

	//update json file
	$file = fopen('assets/todos.json', 'w');
	fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));
	fclose($file);


	$id = count($todos)-1;
	echo $id;
?>