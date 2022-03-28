<?php 
class App{
    private $__controller, $__action,$__params,$__route;   
     
    function __construct(){
        global $routes;
        $this->__route = new Route(); //khởi tạo route từ file core/routes
      if(!empty($routes['default_controller'])) {
        $this->__controller =$routes['default_controller'];
      } 
      $this->__action ='index';
      $this->__params =[]; 

      $this->handleurl();
    }

    function getURL(){ //hàm lấy url từ path info
        if(isset($_SERVER['PATH_INFO'])){
            $url=$_SERVER['PATH_INFO'];
        }else{
            $url='/';
        }
        return $url;
    }
   public function handleurl(){
    

       $url=$this->getURL();//lấy ra url

       $url= $this->__route ->handleroute($url);//xử lý url từ hàm handleurl từ file core/routes

       $urlarr=array_filter(explode('/',$url)); 
       $urlarr=array_values($urlarr);

       $urlcheck='';
       if(!empty($urlarr)){
        foreach($urlarr as $key=>$item){
            $urlcheck.=$item.'/' ; 
            $filecheck=rtrim($urlcheck,'/');
            $filearray=explode('/',$filecheck);
            $filearray[count($filearray) - 1] = ucfirst($filearray[count($filearray) - 1]);
            $filecheck=implode('/',$filearray);
            if(!empty($urlarr[$key-1])){
                unset($urlarr[$key-1]);
            }
            
            if(file_exists('app/controllers/'.$filecheck.'.php')){
                 $urlcheck=$filecheck;
                 break;
            }
           }
           $urlarr=array_values($urlarr);
       }
  
       //xử lý controllers
       if(!empty($urlarr[0])){
          $this->__controller=ucfirst($urlarr[0]);
          
       }else{
           $this->__controller=ucfirst($this->__controller);
       }


       if(file_exists('app/controllers/'.$urlcheck.'.php')){
        require_once 'controllers/'.$urlcheck.'.php';
        //kiem63 tra class $this->__contronler ton62 tai5
        if(class_exists($this->__controller)){
            $this->__controller=new $this->__controller();
            unset($urlarr[0]);
        }else{
            $this->loadError();
        }
      }else{
          $this->loadError();
      }
       //xử lý action
       if(!empty($urlarr[1])){
           $this->__action=$urlarr[1];
           unset($urlarr[1]);
           
       }
       
       //xử lý params
       $this->__params= array_values($urlarr);
       //kiểm tra method có tồn tại hay ko
       if(method_exists($this->__controller,$this->__action)){
        call_user_func_array([$this->__controller,$this->__action],$this->__params);
       }else{
        $this->loadError();
       }
       
   }
      
    
   public function loadError($name='404'){
    require_once 'error/'.$name.'.php';
   }

   }
?>