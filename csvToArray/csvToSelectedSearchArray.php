<?php 
function csvToArray($filepath, $delimiter, $search = null){
	$lines = file($filepath);
	$fileArray = array();
	$i = 0;
	foreach ($lines as $line) {
		if ($i == 0 || $search == null || stristr($line, $search)) {

			$fileArray[] = explode($delimiter, $line);
		}
		$i++;
	}
	return $fileArray;
}