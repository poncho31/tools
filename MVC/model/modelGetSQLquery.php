<?php 



function getSQLquery($dbName, $tableName){
    $db = new Database($dbName);
    $query = "SHOW CREATE TABLE ". $tableName;
    $rows = $db->getQuery($query);
    return $rows;
}



