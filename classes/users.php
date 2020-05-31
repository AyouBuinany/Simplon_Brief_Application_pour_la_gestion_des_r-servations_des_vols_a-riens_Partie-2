<?php
include "config.php";
class users{
    public $id;
    public $UserName;
    public $email;
    public $password;
    public $status;
    public function __construct(){}

    //login
   public function login($UserName,$password,$status){
    if(!empty($UserName) && !empty($password)){
          $req = "SELECT * FROM users WHERE (UserName ='$UserName'  OR email = '$UserName') AND status ='$status' AND password='$password'";
          $result=request($req) or die("sorry user don't exists") ;
          if(mysqli_num_rows($result)>0){
          $user=mysqli_fetch_row($result);
          $_SESSION["flash"]["success"]='Vous êtes maintenant connecté.';
              $_SESSION['user'] = $user;
           return $user;
          }else{
             echo "<script> alert('Identifiant ou mot de passe incorrecte .'); </script>";
          }
        }
    }

    //inscription
    //validation pseudo =>
    public function validation($regExp,$attribute,$value){
    if(empty($value) || !preg_match($regExp, $value)){
        $errors ="Votre $attribute n'est pas valide ";
     }
     else{
      $req = "SELECT id FROM users WHERE $attribute ='$value'";
      $result=request($req);
     $user = mysqli_fetch_row($result);
        if(!empty($user)){
            $errors="Ce $attribute est déjà pris";
        }
     }
     return $errors;
    }
    //validation password =>"/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@_-])[a-zA-Z0-9@_-]{8,15}+$/"
    public function validationPassword($regExp,$password,$password_confirm){
    if(empty($password) || !preg_match($regExp, $password) ||  $password !=$password_confirm){
      return  $errors= "Vous devez rentrer un mot de passe valide";
                                                                                             }
                                                                            }
  //insertion in database
    public function insertion($tableError,$userName,$email,$status,$password){
        if(empty($tableError)){
        $req = "INSERT INTO users SET username ='$userName', email ='$email', status='$status',password = '$password'";
        if(request($req)){
            return true;
                         }
                                 }
                                                                            }
    //button cancel
    //Admin Button Cancel $_GET["cancel"]
    public function cancel($user){
            $id=$_GET["cancel"];
            $id_user=$user;
            $query= "INSERT INTO cancel set id_cancel=$id,id_user=$id_user";
            $result= request($query) or die ("sorry id_cancel deja exist ");
            return  header("Location:reservation.php");
    }
    //admin Button show
    public function show($show){
                    $id=$show;
                    $query= "SELECT flyingFrom,flyingTo ,SUM(r.Adult) 'seats_Adult',SUM(r.children) 'seats_Children', seats   FROM `flights_list`,`reservation` as r WHERE id=r.id_flight AND id=$id";
                    $result=request($query) or die ("Sorry query not exist pas");
                   return $result;
        }

        //Admin Button add flying
       public function addFlight(){
        $flying_from=$_POST["FlyingFrom"];
        $flying_to=$_POST["FlyingTo"];
        $departingDate=$_POST["departing"];
        $returningDate=$_POST["returning"];
        $seats=$_POST["Seats"];
        $id_user=$_POST["id_user"];
   $query="INSERT INTO flights_list SET FlyingFrom='$flying_from', FlyingTo='$flying_to', departingDate='$departingDate',returningDate='$returningDate',seats='$seats',id_user=$id_user";
   $result=request($query) or die("Sorry not add flying");
   if($result){
    return header("Location:reservation.php");
   }
  }
//users
function AfficheAjax($status,$id_status){
  if($status=="Admin"){
    $query="SELECT t.id,t.flyingFrom,t.flyingTo,t.departingDate,t.returningDate,t.seats from users u,flights_list t where u.id=t.id_user AND u.id=$id_status";
    }
    else{
      $query="SELECT t.id_reservation,t.FullName,t.numeroTel,t.email,f.flyingFrom,f.flyingTo,t.departingDate,t.returningDate,(t.Adult+t.children) as 'Seats' from users u,reservation t,flights_list f where u.id=t.id_users AND f.id=t.id_flight AND u.id=$id_status";
    }
  $result=request($query);
    return  $result;
}
}