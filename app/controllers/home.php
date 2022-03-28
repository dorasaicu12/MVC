<?php 
class Home extends controller {
    public $model_home;

    public function __construct(){

            $this->model_home=$this->model('homeModel'); //lấy ra các hàm từ homeModel của file models/homeModel

          
     }
    public function index(){
        $data=$this->model_home->getlist();
        $this->data['sub_content']['homedata']=$data;
        $this->data['sub_content']['title']='asdasd';
        $this->data['content']='home/index';
        $this->render('layout/client-layout',$this->data);
    }

}

?>