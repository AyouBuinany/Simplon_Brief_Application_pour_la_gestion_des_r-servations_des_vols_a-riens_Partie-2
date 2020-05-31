<?php  include_once './classes/users.php';
$user=new users();
if(isset($_POST["inscrire"])){
    $errors = array();
    $userName=htmlspecialchars($_POST['username']);
    $email=htmlspecialchars($_POST['email']);
    $status=htmlspecialchars($_POST['status']);
    $password=htmlspecialchars($_POST['password']);
    $password_confirm=htmlspecialchars($_POST["password_confirm"]);
     //validate pseudo
    if($user->validation('/^[a-zA-Z]{4,}+$/',"UserName",$userName)){
    $errors["pseudo"]=$user->validation('/^[a-zA-Z]{4,}+$/',"UserName",$userName);
            }
         //validate email
         if($user->validation('/\w+@\w+\.(net|com|fr)+$/',"email",$email)){
            $errors["email"]=$user->validation('/\w+@\w+\.(net|com|fr)+$/',"email",$email);
         }
       //validation password =>
      if($user->validationPassword('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@_-])[a-zA-Z0-9@_-]{8,15}+$/',$password,$password_confirm)){
    $errors["password"]=$user->validationPassword('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@_-])[a-zA-Z0-9@_-]{8,15}+$/',$password,$password_confirm);
      }
     //inscription
 if($user->insertion($errors,$userName,$email,$status,$password)){
      header("Location:login.php");
 }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maroc airlines</title>
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class=" header-container">
        <div class="inner-container">
            <div id="logo">
                <h1><a href="#">Moroco AirLines</a></h1>
            </div>
            <div id="search">
                <input type="text" placeholder="Search for you flite ">
            </div>
            <div id="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="entry-title">
        <h3>S'inscrire</h3>
        </div>


<?php if(!empty($errors)):
    ?>
    <div class="alert alert-danger" role="alert">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach($errors as $error): ?>
           <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div  id="inpContainer" class="inputs-container2">
    <div class="error"></div>
    <br>
    <form action="" method="POST" class="C_reserve">

    <div id="first-row">
        <input type="text" placeholder ="Pseudo" name="username" class="form-control"/>
    </div>
<br>
    <div id="first-row">
        <input type="text" placeholder="Email"  name="email" class="form-control"/>
    </div>
<br>
<div id="first-row">
        <input type="text" placeholder="Status"  name="status" class="form-control" value="User" readonly/>
    </div>
    <br>
    <div id="first-row">
        <input type="password" placeholder="Mot de passe"  name="password" class="form-control"/>
    </div>
<br>
    <div id="first-row">
        <input type="password" placeholder="Confirmez votre mot de passe"  name="password_confirm" class="form-control"/>
    </div>
<br>
    <button type="submit" class="btn btn-primary" name="inscrire">M'inscrire</button>

</form>
</div>
</body>
</html>
