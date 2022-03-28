<?php 
class product extends controller
{
    public $data=[];
    public $model_home;

    public function __construct(){
        
            $this->model_home=$this->model('productModel');
       
     }
    public function getlist(){
        $data=$this->model_home->getlistpro();
        $title='danh sách';
        $this->data['sub_content']['product_list']=$data;
        $this->data['sub_content']['pagetitle']=$title;
        $this->data['content']='product/list';
        $this->render('layout/client-layout',$this->data);
    }
    public function detail(){
        $data=$this->model_home->getlistpro();
        $this->data['sub_content']['product']=$data;
        $this->data['sub_content']['title']='asdasd';
        $this->data['content']='product/detail';
        $this->render('layout/client-layout',$this->data);
    }
}
?>