<?php
	//disable error reporting
	error_reporting(0);
	//declaration of variables pulled from form
	$words = intval($_POST['words']);
	$num = $_POST['num'];
	$symbol = $_POST['symbol'];
	$symNum = $_POST['symNum'];
	$separation = $_POST['separation'];
	$letter = $_POST['letter'];
	
	//Scrape word list from paulnoll.com
	$data = file_get_contents('http://www.paulnoll.com/Books/Clear-English/words-03-04-hundred.html');
	$regex = '/<li>([^`]*?)<\/li>/';
	preg_match_all($regex,$data,$matches);

	//array to hold selected words
	$wordList = array();

	//Loop for number of words entered.
	for($x=0; $x<$words; $x++) {
		//Get a random number
		$random = rand(0, 159);
		//Check to see if array is empty
		if(sizeof($wordList) == 0) {
			$wordList[$x] = $matches[1][$random];
		} else {
			//check to see if the word has already been selected before adding it to the array.
			foreach($wordList as $key){
				//if the word has been used
				if($matches[1][$random] == $key){
					//reduce the word count to try again
					$x--;
				} else {
					//add the word to the word list
					$wordList[$x] = $matches[1][$random];
				}
			}
		}
	}


//Format if user selected "delimited by spaces"
if($separation == "spaces"){
	$wordString = implode(" ", $wordList);
}
//Format if user selected "delimited by camelCase"
elseif($separation == "camelCase"){
	$wordImplode = implode("", $wordList);
	$wordCapital = ucwords($wordImplode);
	$wordString = preg_replace('/\s+/', '', $wordCapital);
}
//Format if user selected "delimited by hyphens"
elseif($separation == "hyphens"){
	$wordString = implode("-", $wordList);
}


//Format if user selected "lowercase"
if($letter == "lower") {
	$wordString = strtolower($wordString);
}
//Format if user selected "uppercase"
elseif($letter == "upper") {
	$wordString = strtoupper($wordString);
}
//Format if user selected "capital"
elseif($letter == "capital") {
	$wordString = ucwords($wordString);
}


//Format if user selected a number
if (isset($num)) {
	$wordString = trim($wordString) . rand(0, 9);
}
//Format if user selected a symbol
if (isset($symbol)) {
	for($i=0; $i<$symNum; $i++) {
		$symbolList = "!@#$%^&*";
		$rand = rand(0, 8);
		$randomSymb = $symbolList[$rand];
		$wordString = trim($wordString) . $randomSymb;
	}
}

$result = $wordString;
