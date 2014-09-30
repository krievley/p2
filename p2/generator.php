<?php
	//declaration of variables pulled from form.
	$words = 4; //intval($_POST['words']);
	//$num = $_POST['num'];
	//$symbol = $_POST['symbol'];
	//$symNum = $_POST['symNum'];
	//$separation = $_POST['separation'];
	//$letter = $_POST['letter'];
	
	//Scrape word list from paulnoll.com
	$data = file_get_contents('http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html');
	$regex = '/<li>([^`]*?)<\/li>/';
	preg_match_all($regex,$data,$matches);

	//array to hold selected words
	$wordList = array();

	//Loop for number of words entered.
	for($x=0; $x<$words; $x++) {
		//Get a random number
		$random = rand(0, 187);
		//Check to see if array is empty
		if(sizeof($wordList) == 0) {
			//if it is, add the current word to the array
			$wordList[$x] = $matches[1][$random];
		}
		//if array is not empty
		else {
			//check to see if the word has already been selected before adding it to the array.
			foreach($wordList as $key){
				//if the word has been used
				if( $matches[1][$random] == $wordList[$key]){
					//reduce the word count to try again
					$x--;
				}
				//if the word has NOT been used
				else {
					//add the word to the array
					$wordList[$x] = $matches[1][$random];
				}
		}
	}
}
//print_r($wordList);