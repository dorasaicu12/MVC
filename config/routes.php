<?php 

$routes['default_controller']='home';
$routes['san-pham']='product/index';
//đường dẫn ảo trỏ tới đường dẫn thật
 $routes['san-pham']='product/getlist';
 $routes['chi-tiet']='product/detail';

 $routes['home']='home/index';

?>