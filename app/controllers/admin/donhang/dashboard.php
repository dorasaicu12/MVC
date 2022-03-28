<?php
 class dashboard extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('donhang'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='admin/donhang/index';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/client-layout',$this->data);
     }
     public function loadata(){     
        $data=$this->model_home->loaddanhmuc();
        foreach($data as $key){
            extract($key);
            $output[]=$key;
            
        }
        echo json_encode($output);
    }
    public function delete(){     
        $id=$_POST['id_dm'];
        if($this->model_home->delete($id)){
            echo 'xóa thất bài xem lại câu truy vấn sql';
        }else{
            echo 'xóa thành công';
        }
    }
    public function loadata2(){
        $id=$_POST['id_hang']  ;   
        $data=$this->model_home->loadtheoid($id);
        foreach($data as $key){
            extract($key);
            $output[]=$key;
            
        }
        echo json_encode($output);
    }

    public function update(){
        $id=$_POST['image_id'];
        $lua=$_POST['cars'];
        $this->model_home->update($id,$lua);  

    }

 }
 
 ?>