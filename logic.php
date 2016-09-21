<?php

$wordBank = [];

$wordBank[0] = "zero";
$wordBank[1] = "first";
$wordBank[2] = "second";
$wordBank[3] = "third";
$wordBank[4] = "fourth";
$wordBank[5] = "fifth";
$wordBank[6] = "sixth";
$wordBank[7] = "seventh";
$wordBank[8] = "eieth";
$wordBank[9] = "nineth";
$wordBank[10] = "tenth";
$wordBank[11] = "eleventh";
$wordBank[12] = "twelevth";
$wordBank[13] = "thierteenth";
$wordBank[14] = "fourteenth";

$outputString = "";
$outputKeys = [];

// If wordNumber was passed from the form, store it in pasLen, else default to 4
if( array_key_exists("wordNumber", $_GET) ) {
    $passLen = $_GET["wordNumber"];
}
else {
	$passLen = 4;
}

// If an input not between zero and ten was given, default to 4
if(($passLen >10) || ($passLen <1)) {
	$passLen = 4;
}

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


// Store passLen number of keys in outputKeys
$outputKeys = array_rand($wordBank, $passLen);

// If capital letters are needed, first pick which word will be changed
$wordToUpper = rand(0, $passLen);

// Loop to build output string
for($i = 0; $i < $passLen; $i++){
	// If word should be upper case alter it, otherwise enter as is
	if( ($i == $wordToUpper) && ($reqCap == 1) ){ 
		$outputString .= strtoupper($wordBank[$outputKeys[$i]]);
	} 
	else {
		$outputString .= $wordBank[$outputKeys[$i]];
	}
	
	// If not the last word, append a '-' to it
	if($i != ($passLen-1)){
		$outputString .= '-';
	}
}

?>