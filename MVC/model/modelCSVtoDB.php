<?php 

function csvToDB($dbName, $tableName, $CSVpath, $champs = 'othographe,lemme,grammaire,genre,nombre')
{
$db = new Database($dbName);
$query = 
<<<eof
    LOAD DATA INFILE '$CSVpath'
     INTO TABLE $tableName character set latin1
     FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '"'
     LINES TERMINATED BY '\n'
    ($champs)
eof;
$db->getQuery($query);
if ($db->getQuery($query)) {
	$echo = '<p class="alert-success">Success to import CSV to database</p>';
}
else{
	$echo = '<p class="alert-danger">Fail to import CSV to database</p>';
 }
 return $echo;
}