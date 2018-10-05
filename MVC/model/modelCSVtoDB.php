<?php 

function csvToDB($dbName, $tableName, $CSVpath, $champs = 'othographe,lemme,grammaire,genre,nombre')
{
$db = new Database($dbName);
$createTableQuery = "CREATE TABLE IF NOT EXISTS $tableName";

if ($db->getQuery($createTableQuery)) {
	$echo = 'yeeeep';
}
else{
	$echo = 'nooope';
}

$query = <<<eof
    LOAD DATA INFILE '$CSVpath'
     INTO TABLE $tableName character set latin1
     FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '"'
     LINES TERMINATED BY '\n'
    ($champs)
eof;

if ($db->getQuery($query)) {
	$echo = '<p class="alert-success">Success to import CSV to database</p>';
}
else{
	$echo = '<p class="alert-danger">Fail to import CSV to database</p>';
 }
 return $echo;
}