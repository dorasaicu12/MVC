<?php
 class home extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
    $this->model_home=$this->model('main'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='main/index';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/main-layout',$this->data);
     }

     public function loadata(){     
        $data=$this->model_home->loadsanpham();
        foreach($data as $key){
            extract($key);
            $file = explode(",",substr($image, 0, -1));
            $output[]=$key;
            
        }
        echo json_encode($output);
    }
     
 }
 ?>