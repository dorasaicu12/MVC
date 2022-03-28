<?php
 class hocsinhModel{
    protected $_table='hocsinh';
    public function hienhocsinh(){
        $sql="select * from hocsinh order by id DESC";
        return pdo_query($sql);
    }
    public function uphs($id,$text,$columm){
        $sql="update hocsinh set $columm='$text' where id = $id";
        return pdo_execute($sql);
      }

      public function addhs($fisrtname,$lastname,$pass,$email){
        $sql1="insert into hocsinh(firstname,lastname,password,email) values(?,?,?,?)";
        $khach= pdo_execute($sql1,$fisrtname,$lastname,$pass,$email);
      }  
      public function hienencode(){

        if(isset($_POST['id'])){
          $id=$_POST['id'];
          $text=$_POST['text'];
          $output[]=array(
             'col' =>'sdfsdf'
          );
          echo json_encode($output);
        }
      } 
 }
 ?>