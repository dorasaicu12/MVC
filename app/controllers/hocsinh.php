<?php 
class Hocsinh extends controller {
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('hocsinhModel'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }
    public function index(){
        $data=$this->model_home->hienhocsinh();
        $this->data['sub_content']['product']=$data;
        $this->data['content']='hocsinh/list';
         $this->render('layout/client-layout',$this->data);  
    }
    public function loadhs(){
        $data=$this->model_home->hienhocsinh();
        $count=0;
        foreach($data as $key){
            $count++;
            extract($key);
          echo '<table class="table table-bordered table-triped">
          <tr>
            <th>thứ tự</th>
            <th>email</th>
            <th>tên họ</th>
            <th>tên đệm</th>
            <th>ngày tạo</th>
            <th>mật khẩu</th>
          </tr>
      
          <tr>
            <td contenteditable="true" >'.$count.'</td>
            <td contenteditable="true" class="email" data-id1="'.$id.'"> '.$email.' </td>
            <td contenteditable="true" class="firstname" data-id1="'.$id.'">'.$firstname.'</td>
            <td contenteditable="true" class="lastname" data-id1="'.$id.'">'.$lastname.'</td>
            <td contenteditable="true"  data-id1="'.$id.'">'.$create_time.'</td> 
            <td >'.$password.'</td>
            <td data-id2="'.$id.'" class="btn btn-sm btn-danger del-data" name="delete"><button>xoa du lieu</button></td>
          </tr>
          </table>';
        }  
    }
    public function suahs(){
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $text=$_POST['text'];
            $columm=$_POST['columm'];
            $output['id']=$_POST['columm'];
            $output['name']='namelsss';
            $output['dmm']='dfgfdfg';
            echo json_encode($output);
          }
    }

    public function themhs(){
        if(isset($_POST['firstname'])){
            $fisrtname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
          
            $this->model_home->addhs($fisrtname,$lastname,$pass,$email);
            
            echo $data = ' insert thanh cong ';
          
          }
    }



}

?>

