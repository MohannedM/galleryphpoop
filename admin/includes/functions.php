<?php 


function loadAllFiles($class){
	$class = strtolower($class);
	$the_path = "includes/{$class}.php";
	if(file_exists($the_path) && !class_exists($class)){
		require_once($the_path);
	} else {
		die("File named $class couldn't be found");
	}

}
spl_autoload_register('loadAllFiles');


 ?>