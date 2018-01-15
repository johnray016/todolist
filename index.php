<?php 
$todos = file_get_contents('assets/todos.json')	; //import JSON file
$todos = json_decode($todos, true); // convert the JSON file to Javascript Object
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>PHP To do list</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Joti+One|Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<div  class="wrapper">
			<br>
			<br>
			<h1>To-Do List</h1>
			<input type="text" placeholder="Add New Task" id="newTask">
			<ul>
				<?php 
					foreach ($todos as $key => $todo) {
						if ($todo['done'] ===false) {							
						echo '<li id="'.$key.'"><span><i class="fa fa-trash"></i></span> '.$todo['task'].'</li>';
						} else {
							echo '<li id="'.$key.'" class=completed><span><i class="fa fa-trash"></i></span> '.$todo['task'].'</li>';
						}
					}
				?>
			</ul>
		</div>
	</div>
<script type="text/javascript" src="assets/lib/jquery-3.2.1.min.js"></script>		
<script type="text/javascript" src="assets/js/script.js"></script>	
</body>
</html>