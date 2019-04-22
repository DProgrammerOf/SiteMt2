<?php
require_once ('../../connect/functions.php');
sec_session_start();

if (login_check($mysqli) == true){
	header('Location: ../../connect/logout.php');
	exit();
}

date_default_timezone_set("Brazil/East");
?>