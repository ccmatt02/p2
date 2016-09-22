<?php

// Load .csv file into wordbank
$wordBank = str_getcsv(file_get_contents('alice30.csv'));

// Establish bank of special characters
$specCharBank = [];
$specCharBank[1] = '!';
$specCharBank[2] = '@';
$specCharBank[3] = '#';
$specCharBank[4] = '$';
$specCharBank[5] = '%';
$specCharBank[6] = '^';
$specCharBank[7] = '&';
$specCharBank[8] = '*';

$outputString = "";
$outputKeys = [];

// If wordNumber was passed from the form, store it in pasLen, else default to 4
if( array_key_exists("wordNumber", $_GET) ) {
    $passLen = $_GET["wordNumber"];
}
else {
	$passLen = 4;
}

// If an input not between two and ten (inclusive) was given, default to 4
if(($passLen >10) || ($passLen <2)) {
	$passLen = 4;
}

// Check to see if the capital word checkbox was selected
if( array_key_exists("reqCap", $_GET) ) {
	if($_GET["reqCap"] == "on"){
		$reqCap = 1;
	}
	else
	{
		$reqCap = 0;
	}
}
else{
	$reqCap = 0;
}

// Check to see if the special character checkbox was selected
if( array_key_exists("reqSpec", $_GET) ) {
	if($_GET["reqSpec"] == "on"){
		$reqSpec = 1;
	}
	else
	{
		$reqSpec = 0;
	}
}
else{
	$reqSpec = 0;
}

// Check to see if the number checkbox was selected
if( array_key_exists("reqNum", $_GET) ) {
	if($_GET["reqNum"] == "on"){
		$reqNum = 1;
	}
	else
	{
		$reqNum = 0;
	}
}
else{
	$reqNum = 0;
}

// Store passLen number of keys in outputKeys
$outputKeys = array_rand($wordBank, $passLen);

// Randomly decide where any capitals, numbers, or special characters will go
$wordToAlter = rand(0, ($passLen-1));


// Loop to build output string
for($i = 0; $i < $passLen; $i++){
	// If word should be upper case alter it, otherwise enter as is
	if( ($i == $wordToAlter) && ($reqCap == 1) ){ 
		$outputString .= strtoupper($wordBank[$outputKeys[$i]]);
	} 
	else {
		$outputString .= strtolower($wordBank[$outputKeys[$i]]);
	}
	
	// If a number should be added, put in a random one
	if( ($i == $wordToAlter) && ($reqNum == 1) ){ 
		$outputString .= rand(0,9);
	} 
	
	// If a special character should be added, put in a random one
	if( ($i == $wordToAlter) && ($reqSpec == 1) ){ 
		$outputString .= $specCharBank[array_rand($specCharBank, 1)];
	} 
	
	// If not the last word, append a '-' to it
	if($i != ($passLen-1)){
		$outputString .= '-';
	}
}

?>