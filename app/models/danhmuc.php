<?php
 class danhmuc{
    protected $_table='danhmuc';
    public function loaddanhmuc(){
        $sql="select * from danh_muc order by ma_nhom_hang DESC";
        return pdo_query($sql);
    }

    public function loadthuonghieu(){
        $sql="select * from thuong_hieu order by ma_thuong_hieu DESC";
        return pdo_query($sql);
    }
    public function loaddanhmuc1($id){
        $sql="select * from danh_muc where ma_nhom_hang= '$id' ";
        return pdo_query($sql);
    }

    public function update($id,$name){
        $sql="update danh_muc set ten_nhom_hang= '$name' where ma_nhom_hang= $id";
        pdo_execute($sql);
    }
    public function delete($id){
        $sql="delete  from danh_muc where ma_nhom_hang=$id";
        pdo_execute($sql);
    }
    public function insert($id,$name){
        $sql="insert into danh_muc(ma_nhom_hang,ten_nhom_hang) values($id,'$name')";
        pdo_execute($sql);
    }
 }
 ?>