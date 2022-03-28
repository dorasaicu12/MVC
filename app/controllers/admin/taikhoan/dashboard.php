<?php
 class dashboard extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('taikhoan'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='admin/taikhoan/index';
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
    public function dangnhap(){     
        $firstname=$_POST['firstname'];
        $pass=$_POST['pass'];
        $data= $this->model_home->findhs($firstname,$pass);
        if(is_array($data)){
            $_SESSION['user'] = $data;
            echo '1';
          }else{
            echo 'tài khoản mật khẩu bạn sai';
          }
    }

 }
 ?>