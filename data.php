<?php
//include "config.php";
include_once './classes/users.php';

$user=new users();
$idStatus=$_SESSION["user"][0];
$status=$_SESSION["user"][4];

  $result=$user->afficheAjax($status,$idStatus);
  $data= array();
if($result){
  while($array=mysqli_fetch_array($result)){
    $data[]=$array;
  }
  echo json_encode($data);
}
?>
