<?php
 class sanpham{
    protected $_table='danhmuc';
    public function loadsanpham(){
        $sql="SELECT * 
        FROM san_pham INNER JOIN danh_muc  ON san_pham.ma_nhom_hang = danh_muc.ma_nhom_hang inner join thuong_hieu ON san_pham.ma_thuong_hieu = thuong_hieu.ma_thuong_hieu";
        return pdo_query($sql);
    }
    public function loaddanhmuc1(){
        $sql="select * from danh_muc order by ma_nhom_hang ";
        return pdo_query($sql);
    }
    public function loadthuonghieu(){
        $sql="select * from thuong_hieu order by ma_thuong_hieu ";
        return pdo_query($sql);
    }
    public function loadthuoctinh($id){
        $sql="select * from thuoc_tinh where ma_san_pham = $id ";
        return pdo_query($sql);
    }

    public function loadsanpham_theomuc($id){
        $sql="SELECT * 
        FROM san_pham INNER JOIN danh_muc ON san_pham.ma_nhom_hang = danh_muc.ma_nhom_hang inner join thuong_hieu ON san_pham.ma_thuong_hieu = thuong_hieu.ma_thuong_hieu where ma_san_pham='$id' ";
        return pdo_query($sql);
    }
    public function update($id,$name_th,$name_th2,$name,$price){
        $sql="update san_pham set ma_nhom_hang= $name_th,ten_san_pham='$name',gia_goc=$price,ma_thuong_hieu=$name_th2 where ma_san_pham= $id ";
        pdo_execute($sql);
    }
    public function delete($id){
        $sql="delete  from san_pham where ma_san_pham=$id";
        pdo_execute($sql);
    }
    public function insert($random,$danhmuc,$name,$hinh,$giasp,$today,$mota,$thuonghieu){
        $sql="INSERT INTO san_pham
        (ma_san_pham,ma_nhom_hang,ten_san_pham, ma_thuong_hieu ,image , gia_goc  ,ngay_nhap ,mo_ta) 
VALUES (?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$random,$danhmuc,$name,$thuonghieu,$hinh,$giasp,$today,$mota);
    }
    public function inserttt($id_tt,$code,$size,$color,$number){
        $sql="INSERT INTO thuoc_tinh
        (id_tt,ma_san_pham,size,color,so_luong) 
VALUES (?,?,?,?,?)";
        pdo_execute($sql,$id_tt,$code,$size,$color,$number);
    }

    public function loadbinhluan($id){
        $sql="select * from binh_luan INNER JOIN tai_khoan ON binh_luan.id_tai_khoan=tai_khoan.id_tai_khoan
        WHERE binh_luan.ma_san_pham=$id ";
        return pdo_query($sql);
    }
    public function binhluanthem($id,$user_name,$user_id,$noidung,$today){
        $sql="INSERT INTO binh_luan
        (id_tai_khoan,username,ma_san_pham,noi_dung,ngay_bl) 
VALUES (?,?,?,?,?)";
        pdo_execute($sql,$user_id,$user_name,$id,$noidung,$today);
    }




    public     function themGH($ma_san_pham,$soluong,$gia,$size,$color) {
         $sql="SELECT * FROM `san_pham` WHERE `ma_san_pham`='$ma_san_pham'";
         $onesp=pdo_query_one($sql);
       
        if(is_array($onesp)){
             extract($onesp);
        }
       

         $sql2="SELECT thuoc_tinh.id_tt FROM `thuoc_tinh` WHERE 
                        thuoc_tinh.ma_san_pham = '$ma_san_pham' 
                         and thuoc_tinh.size = '$size'
                        AND thuoc_tinh.color= '$color'";
         $idTT = pdo_query_one($sql2);  
       
        if(is_array($idTT)){
            extract($idTT);
        }
        

        $key = $ma_san_pham . $id_tt ;
        
			$cartArray = array(
                'ten_san_pham'=>$ten_san_pham,
                'ma_san_pham'=>$ma_san_pham,
                'gia'=>$gia,
                'quantity'=>$soluong,
                'image'=>$image,
                'idTT' =>$id_tt,
                'size'=>$size,
                'color'=>$color,
                'key' => $key
		    );
            if(empty($_SESSION["shopping_cart"])) {
                return    $_SESSION["shopping_cart"][$ma_san_pham . $id_tt] = $cartArray;
                   
            }else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);                
                if(in_array($ma_san_pham . $id_tt,$array_keys)) {
                    return   $_SESSION["shopping_cart"][$ma_san_pham . $id_tt]['quantity']+=1;
                  
                }else{
                    return  $_SESSION["shopping_cart"][$ma_san_pham . $id_tt] = $cartArray;
                   
                }
            }
    }

 }
 ?>