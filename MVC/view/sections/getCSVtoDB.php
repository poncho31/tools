<section class='getCSVtoDB'>
    <form action="#" method='post'>
        Database <input type="text" name="dbName" id="">
        Table <input type="text" name="tableName" id="">
        Path <input type="text" name="path" id="">
        <input type="submit" name='submit'>
    </form>
<?php
include('MVC/model/modelCSVtoDB.php');

if (isset($_POST['submit'])) {
    $dbName = ($_POST['dbName'] == null)? 'lexique' :  $_POST['dbName'];
    $tableName = ($_POST['tableName'] == null)? 'lex1' :  $_POST['tableName'];
    $path = ($_POST['path'] == null)? 'lex1' :  $_POST['path'];

    $rows = csvToDB($dbName, $tableName, $path);
    if ($rows) {
        foreach ($rows as $row) {
            echo "<pre>";
            echo "<p class='alert-success'>Requête exécutées avec succès</p><br><br>";
            var_dump($row);
            echo "</pre>"; 
        }
    }
    else{
        echo "<p class='alert-DANGER'>Erreur lors de la requête</p><br><br>";
    }
}

?>
</section>

<?php 
// require '../1config/Database.php';
// $db = new Database();
// $path = 'C:/wamp/www/DATA/lexique/openLexique4columns.csv';
// $table = 'lex1';
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
