<?php 

require '../1config/Database.php';
$db = new Database();

$path = 'C:/wamp/www/DATA/lexique/openLexique4columns.csv';
$table = 'lex1';
// $query = <<<eof
//     LOAD DATA INFILE 'C:/wamp/www/DATA/lexique/openLexique4columns.csv'
//      INTO TABLE lex1 character set latin1
//      FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '"'
//      LINES TERMINATED BY '\n'
//     (othographe,lemme,grammaire,genre,nombre)
// eof;
// $db->getQuery($query);
// if ($db->getQuery($query)) {
// 	echo 'Success : CSV to Database ';
// }
// else{
// 	echo 'Error : CSV to Database';
//  }
