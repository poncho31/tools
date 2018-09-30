<div class='alert-danger toDo'>TO DO LIST
    <p>&#8594; Renvoit l'ensemble du fichier CSV dans l'array </p>
    <p>&#8594; Permettre de ne renvoyer que les lignes de l'array </p>
</div><br><br>

<?php
    include('MVC/model/modelCSVtoArray.php');
    $arrayCSV = csvToArray('./data/exampleCSV.csv', ',', $search = null);
    
    var_dump($arrayCSV);
?>