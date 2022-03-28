<?php 
class Route{
    function __construct(){
  
    }
    
    function handleroute($url){ //xu lý route
       global $routes;//biến routes từ file config/routes
       unset($routes['default_controller']);
       $url=trim($url,'/'); //bỏ đi dấu/ trc file ex:/product/detail ==>product/detail
       $handleurl=$url;
       if(!empty($routes)){ //check xem mảng routes có rỗng ko
             foreach($routes as $key=>$value){
                if(preg_match('~'.$key.'~is',$url)){ //kiểm tra có trùng url ko
                   $handleurl=preg_replace('~'.$key.'~is',$value,$url);
                }
             }
       }
       
       return $handleurl;
    }

}
?>