<section class='getPathDirAndFiles'>
    <form action="#" method='post'>
        <input type="text" name="path" id="">
        <input type="submit" name='submit'>
    </form>
<?php
    include('MVC/model/modelGetPathDirAndFiles.php');
    if (isset($_POST['submit'])) {
        $path = ($_POST['path'] == null)? '.' :  $_POST['path'];
        read_all_files($path);
    }
?>

</section>