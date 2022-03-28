<?php
 class main{
    protected $_table='main';

    public function loadsanpham(){
        $sql="SELECT * 
        FROM san_pham INNER JOIN danh_muc  ON san_pham.ma_nhom_hang = danh_muc.ma_nhom_hang inner join thuong_hieu ON san_pham.ma_thuong_hieu = thuong_hieu.ma_thuong_hieu";
        return pdo_query($sql);
    }
    public function loadsanpham1($id){
        $sql="SELECT * 
        FROM san_pham INNER JOIN danh_muc  ON san_pham.ma_nhom_hang = danh_muc.ma_nhom_hang inner join thuong_hieu ON san_pham.ma_thuong_hieu = thuong_hieu.ma_thuong_hieu  WHERE san_pham.ma_san_pham='$id';";
        return pdo_query_one($sql);
    }
    public function loadtt($id){
        $sql="SELECT * 
        FROM thuoc_tinh WHERE ma_san_pham='$id';";
        return pdo_query($sql);
    }


 }
 ?>