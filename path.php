<?php

  define("FILE_FOLDER", dirname(__FILE__));
  define("CURRENT_OPENED_PAGE",$_SERVER['SCRIPT_NAME']);
  define("FILE_PARENT_FOLDER",dirname(CURRENT_OPENED_PAGE));
define("HEADER_PATH",FILE_FOLDER.'/includes/header.php');
define("FOOTER_PATH",FILE_FOLDER.'/includes/footer.php');


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 29;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 1, $public_end);
$link_root = substr(FILE_FOLDER, 13);
//echo "<br>";
define("ROOT", $doc_root);
define("IMAGE_PATH", ROOT.'/uploads/');

/*echo 'ROOT FOLDER : '. ROOT . '<br><hr>';
echo 'Current file :'. CURRENT_OPENED_PAGE . '<br><hr>';
echo 'FILE_FOLDER : '. FILE_FOLDER . '<br><hr>';
echo 'File Parent folder : '. FILE_PARENT_FOLDER . '<br><hr><hr>';

echo "FILE_FOLDER = " . FILE_FOLDER. '<br><hr>';
echo "CURRENT_OPENED_PAGE = " . CURRENT_OPENED_PAGE. '<br><hr>';
echo "FILE_PARENT_FOLDER = " . FILE_PARENT_FOLDER. '<br><hr>';
echo "public_end = " .$public_end. '<br><hr>';
echo "doc_root = ".$doc_root. '<br><hr>';
echo "link_root =" .$link_root. '<br><hr>';
echo $_SERVER['SCRIPT_NAME'];*/
?>

<?php
require_once("function.php");
require_once('database.php');
require_once('query_functions.php');
// require_once('validation_functions.php');
$db = db_connect();
 ?>
