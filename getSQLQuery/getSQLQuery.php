<?php 
require '../1config/Database.php';
$db = new Database();

$table = 'lex1';

$query = "SHOW CREATE TABLE ". $table;
$rows = $db->getQuery($query);
foreach ($rows as $row) {
	var_dump($row);
}

if ($rows) {
    echo "yeeep";
    
}
else{
    echo 'noope';
}
