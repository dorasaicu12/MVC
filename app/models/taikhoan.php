<?php
 class taikhoan{
    protected $_table='taikhoan';

    public function loaddanhmuc(){
        $sql="select * from tai_khoan order by id_tai_khoan DESC";
        return pdo_query($sql);
    }
    public function delete($id){
        $sql="delete  from tai_khoan where id_tai_khoan=$id";
        pdo_execute($sql);
    }

    public function loadbinhluan(){
        $sql="select * from binh_luan inner join san_pham on binh_luan.ma_san_pham=san_pham.ma_san_pham order by ma_bl DESC";
        return pdo_query($sql);
    }
    public function deletebl($id){
        $sql="delete  from binh_luan where ma_bl=$id";
        pdo_execute($sql);
    }

    public function findhs($fisrtname,$pass){
        $sql1="select * from tai_khoan where username = '$fisrtname' and password = '$pass'";
        $khach= pdo_query_one($sql1);
        return $khach;
      }

 }
 ?>