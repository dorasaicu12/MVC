<?php
 class danhmuc{
    protected $_table='danhmuc';
    public function loaddanhmuc($limit,$page,$start){
       
        $sql="select * from danhmuc  LIMIT $start ,5"; 
        return pdo_query($sql);

    }
    public function loaddanhmucsearch($data,$limit,$page,$start){
        $sql="select * from danhmuc where ten_dm like '%$data%'";
        return pdo_query($sql);
    }
    public function loadcountsearch($data){
        $sql="select COUNT(id) as number,ten_dm as name from danhmuc where ten_dm like '%$data%'";
        return pdo_query($sql);
    }

    public function loaddanhmuc1($id){
        $sql="select * from danhmuc INNER JOIN cate on danhmuc.id_cate=cate.id_cate where id= '$id' ";
        return pdo_query($sql);
    }
    public function loadcate(){
        $sql="select * from cate order by id_cate ";
        return pdo_query($sql);
    }

    public function update($id,$name,$id_dm){
        $sql="update danhmuc set ten_dm= '$name' ,id_cate='$id' where id= '$id_dm'";
        pdo_execute($sql);
    }
    public function delete($id){
        $sql="delete  from danhmuc where id=$id";
        pdo_execute($sql);
    }
    public function insert($id_cate,$name){
        $sql="insert into danhmuc(ten_dm,id_cate) values('$name','$id_cate')";
        pdo_execute($sql);
    }
 }
 ?>