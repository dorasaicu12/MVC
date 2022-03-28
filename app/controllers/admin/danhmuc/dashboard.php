<?php
 class dashboard extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('danhmuc'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='admin/danhmuc/index';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/client-layout',$this->data);
     }  
     public function mylist(){     
        $this->data['content']='admin/danhmuc/danhsach';
        $this->data['sub_content']['title']='trang admin';
        $this->render('layout/client-layout',$this->data);
    } 
    public function newdm(){     
        $this->data['content']='admin/danhmuc/add';
        $this->data['sub_content']['title']='trang admin';
        $this->render('layout/client-layout',$this->data);
    } 
    public function adddm(){     
        $name=$_POST['name'];
        $id =rand(1000,9999) ;
        $this->model_home->insert($id,$name);
    } 
    public function loaddata(){     
        $data=$this->model_home->loaddanhmuc();
        foreach($data as $key){
            extract($key);
            
            $output[]=$key;
        }
        echo json_encode($output);
        
    }

    public function loaddata2(){     
        $data=$this->model_home->loadthuonghieu();
        foreach($data as $key){
            extract($key);
            
            $output[]=$key;
        }
        echo json_encode($output);
        
    }   

    public function update(){     
        $id=$_POST['id_dm'];
        $data=$this->model_home->loaddanhmuc1($id);
        foreach($data as $key){
        extract($key);
        $output[]=$key;
    }
    echo json_encode($output);
    }  
    public function realupdate(){     
          $name=$_POST['ten_dm'];
          $id=$_POST['image_id'];
          $this->model_home->update($id,$name);
    } 
    public function delete(){ 
        $id=$_POST['id_dm'];
        $this->model_home->delete($id);
  } 
 }
 ?>