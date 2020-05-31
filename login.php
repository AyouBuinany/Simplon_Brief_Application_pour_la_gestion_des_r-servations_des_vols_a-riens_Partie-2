
<?php  include_once './classes/users.php';
$usersNew= new users();
if(isset($_POST["login"])){
  $userName=htmlspecialchars($_POST['username']);
  $password= htmlspecialchars($_POST["password"]);
  $status= htmlspecialchars($_POST["status"]);
if($usersNew->login($userName,$password,$status)){
    header("Location:reservation.php");
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
                    <li><a href="register.php">Inscription</a></li>
                </ul>
            </div>
        </div>
        <div class="entry-title">
        <h3>Se connecter</h3>
        <p><a href="register.php">Inscription</a></p>
        </div>
    <div  id="inpContainer" class="inputs-container2">
        <div class="error">
            Remplir tout les champs
        </div>
        <br>
        <form action="" method="POST" class="C_reserve">

        <div id="first-row">
            <input type="text" name="username" placeholder="Pseudo ou email"  required class="form-control"/>
        </div>
        <br>
        <div id="first-row">
        <input type="text" placeholder="Status"  name="status" class="form-control" list="status"/>
        <datalist id="status">
        <option value="Admin"/>
        <option value="User"/>
        </datalist>
    </div>
    <br>
        <div id="first-row">
            <input type="password" name="password" placeholder="Password" required class="form-control"/>

        </div>
        <br>
     <div id="first-row">
            <a href="#">(J'ai oublié mon mot de passe)</a>
     </div>
     <br>
        <div id="zero-row">
        <p> <input type="checkbox" name="remember" value="1">Se souvenir de moi</p>
        </div>

        <button type="submit" name="login" class="btn btn-primary">Se connecter</button>

    </form>
</body>
</html>
