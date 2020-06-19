<?php
//include "config.php";
include_once './classes/users.php';

$user=new users();
$idStatus=(isset($_SESSION["user"])) ? $_SESSION["user"][0] : NULL  ;
$status= (isset($_SESSION["user"])) ? $_SESSION["user"][4] : NULL;
if($status=='admin'){
$query="SELECT * from flights_list t where t.id_user=$idStatus";
}else{
$query="SELECT t.FullName,t.numeroTel,f.flyingFrom,f.flyingTo,t.departingDate,t.returningDate,(t.Adult+t.children) as 'Seats',t.price from reservation t,flights_list f where f.id=t.id_flight AND  t.id_users=$idStatus";
}
  $result=$user->afficheAjax($idStatus,$query);
  $data= array();
if($result){
  while($array=mysqli_fetch_array($result)){
    $data[]=$array;
  }
  echo json_encode($data);
}
?>
