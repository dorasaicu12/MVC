<?php
 class details extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
    $this->model_home=$this->model('main'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='main/details';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/main-layout',$this->data);
     }


     public function cart(){     
        $this->data['content']='main/cart';
        $this->data['sub_content']['title']='trang admin';
        $this->render('layout/main-layout',$this->data);
    }

 }
 ?>