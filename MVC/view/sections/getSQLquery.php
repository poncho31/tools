<section class='getSQLquery'>
    <form action="#" method='post'>
        Database <input type="text" name="dbName" id="">
        Table <input type="text" name="tableName" id="">
        <input type="submit" name='submit'>
    </form>
<?php
include('MVC/model/modelGetSQLquery.php');

if (isset($_POST['submit'])) {
    $dbName = ($_POST['dbName'] == null)? 'lexique' :  $_POST['dbName'];
    $tableName = ($_POST['tableName'] == null)? 'lex1' :  $_POST['tableName'];
    $rows = getSQLquery($dbName, $tableName);
    if ($rows) {
        foreach ($rows as $row) {
            echo "<pre>";
            echo "<p class='alert-success'>Requête exécutées avec succès</p><br><br>";
            // var_dump($rows);
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