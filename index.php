<?php
require_once 'class/Database.php';
// header("Access-Control-Allow-Origin: *");
//VIEW
include 'MVC/view/header.php';
include 'MVC/view/nav.php';

//CONTROLLER SECTION
if (isset($_GET['section'])) {
	switch ($_GET['section']) {
		case 'wikiapi':
			include 'MVC/view/sections/wikiApi.php';
			break;

		case 'getdirandfiles':
			include 'MVC/view/sections/getPathDirAndFiles.php';
			break;

		case 'csvtoarray':
			include 'MVC/view/sections/getCSVtoArray.php';
			break;

		case 'getsqlquery':
			include 'MVC/view/sections/getSQLquery.php';
			break;

		case 'gitquery':
			include 'MVC/view/sections/getGitQuery.php';
			break;
		default:
			include 'MVC/view/section.php';
			break;
	}
}
else{
	include 'MVC/view/section.php';
}

include 'MVC/view/footer.php';
?>