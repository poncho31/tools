<div class='alert-danger toDo'>TO DO LIST<hr>
    <p>&#8594; Ne fonctionne pas </p>
    <p>&#8594; Corriger le path </p>
</div><br><br>
<?php
$path = "/var/www/repos/$_POST[project]"; 

chdir($path);
exec("git add .");  
exec("git commit -m'message'");
if (chdir($path)) {
    echo "<h3 align = center> Succesfully commited all the files.</h3>";
}
?>