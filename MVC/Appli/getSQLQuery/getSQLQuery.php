<?php 
require '../1config/Database.php';
$db = new Database();

$table = 'rss';

$query = "SHOW CREATE TABLE ". $table;
$rows = $db->getQuery($query);
foreach ($rows as $row) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";    
}

if ($rows) {
    echo "yeeep";
    
}
else{
    echo 'noope';
}
