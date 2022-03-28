<?php 
define('_DIR_ROOT',__DIR__);

//xử lý http root
if(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'){
    $web_root='https://'.$_SERVER['HTTP_HOST'];
}else{
    $web_root='http://'.$_SERVER['HTTP_HOST'];
}
$dirRoot = str_replace('\\', '/', _DIR_ROOT);

$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);


$folder=str_replace(strtolower($documentRoot),'',strtolower($dirRoot));

$web_root=$web_root.$folder;

define('_WEB_ROOT',$web_root);


 
require_once 'config/routes.php';
require_once 'core/routes.php';
require_once 'app/app.php';//load app
require_once 'core/controller.php';//load base controller
require_once 'app/models/PDO.php';//load base controller
?>