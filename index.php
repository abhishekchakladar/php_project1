<?php
	session_start();
	include('helper.php');
	$SQL_CON = connectSQL();
	$CURRENT_PAGE = isset($_GET['page']) 
	&& file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'products';
	include($CURRENT_PAGE . '.php');
?>