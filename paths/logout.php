<?php

session_start();
require_once('../path.php'); 
$page_title = 'Logout';
$header_title = "Logout of your Account";

require_once(HEADER_PATH);

$_SESSION['user_id'] = null;
$_SESSION['first_name'] = null;
$_SESSION['count'] = null;
redirect_to('/'.ROOT.'/index.php');

 ?>