<?php
 class donhang{
    protected $_table='donhang';

    public function loaddanhmuc(){
        $sql="select * from hoa_don INNER JOIN chi_tiet_hoa_don on hoa_don.so_hoa_don =chi_tiet_hoa_don.so_hoa_don order by id_tai_khoan DESC";
        return pdo_query($sql);
    }
    public function delete($id){
        $sql="delete  from hoa_don where so_hoa_don=$id";
        pdo_execute($sql);
    }
    public function loadtheoid($id){
        $sql="select * from hoa_don where so_hoa_don=$id";
        return pdo_query($sql);
    }
    public function update($id,$tt){
        $sql="update hoa_don set trang_thai= $tt where so_hoa_don= $id ";
        pdo_execute($sql);
    }


 }
 ?>