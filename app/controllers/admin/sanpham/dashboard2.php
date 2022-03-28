<?php
 class dashboard2 extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('sanpham'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='admin/sanpham/index';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/client-layout',$this->data);
     }
     public function addsp(){     
        $this->data['content']='admin/sanpham/addsp';
        $this->data['sub_content']['title']='trang admin';
        $this->render('layout/client-layout',$this->data);
    } 
    public function addtt(){     
        $this->data['content']='admin/sanpham/addtt';
        $this->data['sub_content']['title']='trang admin';
        $this->render('layout/client-layout',$this->data);
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
    public function loaddm(){     
        $id=$_POST['id_dm'];
        $data=$this->model_home->loaddanhmuc1($id);
        extract($data);
        echo $ten_nhom_hang;
    }
     
    public function loaddata2(){     
        $id=$_POST['id_hang'];
        $data=$this->model_home->loadsanpham_theomuc($id);
        foreach($data as $key){
        extract($key);
        $output[]=$key;
    } 
    echo json_encode($output);
    }  
    public function loadth(){     
        $data=$this->model_home->loaddanhmuc1();
        foreach($data as $key){
        extract($key);
        $output[]=$key;
    } 
    echo json_encode($output);
    }
    public function loadth2(){     
        $data=$this->model_home->loadthuonghieu();
        foreach($data as $key){
        extract($key);
        $output[]=$key;
    } 
    echo json_encode($output);
    }
    public function realupdate(){     
        $id=$_POST['image_id'];
        $name_th=$_POST['cars'];
        $name_th2=$_POST['cars1'];
        $name=$_POST['name_sp'];
        $price=$_POST['price_sp'];
        
        if($this->model_home->update($id,$name_th,$name_th2,$name,$price)){
            echo 'cập nhập thất bại lỗi từ phía dtb';
        }else{
            echo 'cập nhập thành công';
        }
  } 

  public function delete(){     
    $id=$_POST['id_dm'];
    if($this->model_home->delete($id)){
        echo 'xóa thất bài xem lại câu truy vấn sql';
    }else{
        echo 'xóa thành công';
    }
} 
public function themsp(){     
   $name=$_POST['name'];
   $giasp=$_POST['giasp'];
   $danhmuc=$_POST['danhmuc'];
   $thuonghieu=$_POST['thuonghieu'];
   $mota=$_POST['mota'];
   $hinh=$_FILES['mutiple_file']['name'];
   $file = implode(',',$hinh);
   $random =rand(10000,99999999);
   $_SESSION['code']=$random;
   $timestamp = time();
   $today=date("20y-m-d h:i:s", $timestamp);

   $this->model_home->insert($random,$danhmuc,$name,$file,$giasp,$today,$mota,$thuonghieu);
   echo'<script>
   window.location.assign("http://localhost/ps16895.assingmen/mvs-test/admin/sanpham/dashboard2/addtt")</script>';
}
public function hinhanh(){     
    $hinh=array($_FILES['file']['name']);
    for($count = 0;$count<count($_FILES['file']['name']);$count++){
        $file_name=$_FILES['file']['name'][$count];
        $tmp_name=$_FILES['file']['tmp_name'][$count];
        
        $file_array=explode(".",$file_name);
        $file_ext=end($file_array);
     
        $location='./upload/'.$file_name;
        if(move_uploaded_file($tmp_name,$location)){
          
        }
    }
    
    echo json_encode($hinh);
 }

 public function addtt2(){
          $id_tt= rand(100,999);    
         $code=$_SESSION['code'];
         $size=$_POST['size'];
         $color=$_POST['favcolor'];
         $number=$_POST['number'];
         
         $this->model_home->inserttt($id_tt,$code,$size,$color,$number);
    }
    public function loadatatt(){     
        $code=$_SESSION['code'];
        $data= $this->model_home->loadthuoctinh($code);
        foreach($data as $key){
            extract($key);
            $output[]=$key;
        } 
        echo json_encode($output);
    }

    public function loadbinhluan(){     
       $id=$_POST['id'];
       $data= $this->model_home->loadbinhluan($id);
       foreach($data as $key){
           extract($key);
           $output[]=$key;
       } 
       echo json_encode($output);
    }
    public function insertbinhluan(){
         
        $id=$_POST['id'];
        $noidung=$_POST['noidung'];
        $user_id=$_SESSION['user']['id_tai_khoan'];
        $user_name=$_SESSION['user']['username'];
        $timestamp = time();
        $today=date("20y-m-d h:i:s", $timestamp); 
        $this->model_home->binhluanthem($id,$user_name,$user_id,$noidung,$today) ;
     }

     public function insertdonhang(){
         
        $ma_san_pham=$_POST['id_sp'];
        $gia=$_POST['gia'];
        $soluong=$_POST['soluong'];
        $color=$_POST['color'];
        $size=$_POST['size'];
        $this->model_home->themGH($ma_san_pham,$soluong,$gia,$size,$color);
       
     }
     public function loadgiohang(){
         
        if(!empty($_SESSION["shopping_cart"])){
            $total=0;
            $a=1;
            foreach ($_SESSION["shopping_cart"] as $value) {
                extract($value);
                    $url_hinh="";                                
                    if(isset($image)&&!$image==""){
                        $file = explode(",",substr($image, 0, -1));
                    }else{
                        $url_hinh="không có hình";
                    }; 
            $imgpath = _WEB_ROOT."/upload/" . $file[0];
            $hinhp = "<img src='" . $imgpath . "' height='80px'>";

            echo'
            <tr>
            <td>mã sản phẩm </td>
            <td>tên sản phẩm </td>
            <td>giá sản phẩm </td>
            <td> giá </td>
            <td>màu</td>
            <td>size</td>
            <td>số lượng</td>
            <td>tổng</td>
           </tr> 

            <tr> 
            <td  class="name" >'.$ma_san_pham.' </td>
            <td  class="name" >'.$ten_san_pham.' </td>
            <td  class="name" >'.$hinhp.' </td>
            <td  class="phonenumber"  >'.$gia.' </td>
            <td  class="address" >'.$color.'</td>
            <td  class="email" >'.$size.'</td>
            <td  class="email" ><input type="number" class="quan" data-id1="'.$key.'" value="'.$quantity.'" min="1"></td>
            <td  class="email" >'.$tt[$a]=$gia*$quantity.'</td>
            </tr>
            ';
            $a++; }}
     }
     public function updatedonhang(){
         $key2=$_POST['id'];
         $quan=$_POST['quan'];
         if($quan==0){
			unset($_SESSION['shopping_cart'][$key2]);
		 }else{
			$_SESSION['shopping_cart'][$key2]['quantity']=$quan;
		 }
     }
 }



 ?>