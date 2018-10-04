<?php

require_once 'token_validate.php';


$val = $_POST["csrf_token"];


if(isset($_POST['comment'])){
	if(token::checkToken($val,$_COOKIE['csrf_Cookie'])){
		echo "<h2>";
		echo "Hello there! ".$_POST['comment'];	
		echo "</h2>";	
	}
	
	else{
		echo "<h2>";
		echo "Wrong".$_COOKIE['csrf_Cookie'];
		echo "</h2>";
	}
}

?>