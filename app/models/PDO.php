<?php
function pdo_get_connection(){
 
$servername = "localhost:3306";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=theluxuries", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

}


// xu ly delte update
function pdo_execute($sql){
 $sql_args = array_slice(func_get_args(), 1);
 try{
 $conn = pdo_get_connection();
 $stmt = $conn->prepare($sql);
 $stmt->execute($sql_args);
 }
 catch(PDOException $e){
 throw $e;
 }
 finally{
 unset($conn);
 }
}


function pdo_execute_lastinsertid($sql){
 $sql_args = array_slice(func_get_args(), 1);
 try{
 $conn = pdo_get_connection();
 $stmt = $conn->prepare($sql);
 $stmt->execute($sql_args);
 return $conn->lastInsertId();
 }
 catch(PDOException $e){
 throw $e;
 }
 finally{
 unset($conn);
 }
}

// truy vấn nhiều loại
function pdo_query($sql){
 $sql_args = array_slice(func_get_args(), 1);
 try{
 $conn = pdo_get_connection();
 $stmt = $conn->prepare($sql);
 $stmt->execute($sql_args);
 $rows = $stmt->fetchAll();
 return $rows;
 }
 catch(PDOException $e){
 throw $e;
 }
 finally{
 unset($conn);
 }
}

 function pdo_query_one($sql){
 $sql_args = array_slice(func_get_args(), 1);
 try{
 $conn = pdo_get_connection();
 $stmt = $conn->prepare($sql);
 $stmt->execute($sql_args);
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 return $row;
 }
 catch(PDOException $e){
 throw $e;
 }
 finally{
 unset($conn);
 }
}

 function pdo_query_value($sql){
 $sql_args = array_slice(func_get_args(), 1);
 try{
 $conn = pdo_get_connection();
 $stmt = $conn->prepare($sql);
 $stmt->execute($sql_args);
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 return array_values($row)[0];
 }
 catch(PDOException $e){
 throw $e;
 }
 finally{
 unset($conn);
 }
}
pdo_get_connection()
?>