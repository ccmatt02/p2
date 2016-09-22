<!doctype html>
<html>
<head>

	<title>XKCD Style Password Generator - Matthew Sanders</title>
	<meta charset='utf-8'>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link href='css/main.css' rel='stylesheet'>
		
	<?php
		error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
		ini_set('display_errors', 1); # Display errors on page (instead of a log file)
		
		require('logic.php');
	?>

</head>
<body>

<div class="banner">
    <h1 class="banner-head">
        XKCD Style<br>
		Random Password Generator
    </h1>
</div>

<form class="pure-form" action="index.php" method="GET">
	<fieldset>
			<div class="pure-g"> 
				<div class="pure-u-1-5" id="formLeft"> 
					<input name="wordNumber" type="textbox" placeholder="Number of words (2-10)">
					<br><br>
					<button type="submit" class="pure-button pure-button-primary">Generate</button>
				</div>
				
				<div class="pure-u-1-5" id="formRight"> 

					<br>
					<label for="reqNum">
						<input name="reqNum" type="checkbox"> Include a number
					</label>
					
					<br>
					
					<label for="reqCap">
						<input name="reqCap" type="checkbox"> Include a capitalized word
					</label>
					
					<br>
					
					<label for="reqSpec">
						<input name="reqSpec" type="checkbox"> Include a special character
					</label>

				</div>
				<div class="pure-u-2-5" id="outputBlock">
					<h2> <?php echo $outputString; ?> </h2>
				</div>
			</div>
	</fieldset>
</form>


</body>
</html>
