<?php

$wordBank = [];

$wordBank[0] = "zero";
$wordBank[1] = "first";
$wordBank[2] = "second";
$wordBank[3] = "third";
$wordBank[4] = "fourth";

$outputString = "";

if (array_key_exists("wordNumber", $_GET)) {
    $passLen = $_GET["wordNumber"];
}
else {
	$passLen = 4;
}

var_dump($_GET);

for($i = 0; $i < $passLen; $i++){
	$outputString .= $wordBank[$i];
	echo "loop ".$i;
	if($i != ($passLen-1)){
		$outputString .= '-';
	}
}

?>