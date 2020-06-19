<?php
include './classes/Classreservation.php';
$OneReservation= new reservations();

//tester session
if(empty($_SESSION['user'])){
    header('Location:login.php');
  }

$lastId="";
$fullName="";
if(isset($_POST["reservation"])){
    $fullName=$_POST["f_name"];
    $query=$OneReservation->reservation();
    if(mysqli_query($con,$query)){
    $lastId=mysqli_insert_id($con);
    //modifier
       $OneReservation->modifierSeats($lastId);
        header("Location:confirmer.php?id_reservation=$lastId");
    }
 else {
  die("<div style='background-color: #e04c4c;text-align: center;padding: 20px;margin: 10%;color: white;font-family: fantasy;'>Sorry mister $fullName your id déja exist </div>");
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
<div id="up"><a href="#top"><i class="fa fa-chevron-circle-up"></i></a></div>
<body>
    <div class=" header-container">
        <div class="inner-container">
        <div id="logo">
                <h1 id='fixed'><a href="#">Moroco AirLines</a></h1>
            </div>
            <div id="search">
                <input type="text" placeholder="Search for you flite ">
            </div>
            <div id="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li><a href="profileUser.php"><img src="./img/profile.png" alt="user" width="40"></a></li>
                </ul>
            </div>
        </div>
        <div class="entry-title">
            <h3>Why Morocco AirLines</h3>
            <p><a href="about_us.php">Discover more</a></p>
            <br>
            <?php if(isset($_SESSION["user"])){
             echo "<h3 style='margin: auto;
            text-align: center; font-size:27px'> Welcome " .$_SESSION["user"][1]. " To Morocco AirLines  From ". $_SESSION["flying_from"] . " To ". $_SESSION["flying_to"];
            " </h3>";
            }
           ?>
        </div>

    </div>
  <div  id="inpContainer" class="inputs-container2">
        <div class="error"></div>
        <br>
        <form action="" method="POST" class="C_reserve">
           <div id="zero-row">
                <input  type="hidden" name="id_air"  id="air" value="<?php echo $_GET["reserver"];?>">
                <input type="radio" name="trips" id="round_trip" value="round_trip" class="trip-type" required><span>Round trip</span>
                <input type="radio" name="trips" id="one_way" class="trip-type" value="one_way"  required><span>One way</span>
            </div>
            <br>
            <div id="third-row">
            <input type="text" name="id_reserver" id="id_reserver" required placeholder="Enter id ">
               <input type="text" name="f_name" id="f_name" required placeholder="Enter your Full name">
               <input type="tel"  id="phone" required name="phone" placeholder="Enter your phone" >
            </div>
            <br>
            <div id="second-row">
                <input type="email" id="email" required name="email" placeholder="Enter your email">
                <input type="text" name="num_passport" id="num_passport" required placeholder="Enter your numero passport">

            </div>
            <br>
            <div id="second-row">
                <input type="date" id="departing" required name="departing" placeholder="departing">
                <input type="date"  id="returning" required name="returning" placeholder="returning" >
            </div>
            <br>
            <div id="third-row">
                <input type="number" placeholder="Adults(+18)" id="adults" required name="adults">
                <input type="number"  placeholder="Children(0-17)" id="children" required name="children">
                <select name="travel_class" id="travel_class" required>
                    <optgroup Label="TRAVEL CLASSES"></optgroup>
                    <option value="First Class">First Class</option>
                    <option value="Bussness Class">Bussness Class</option>
                    <option value="Econemy Class">Econemy Class</option>
                </select>
            </div>
            <br>
            <input type="hidden" name="users" value="<?= $_SESSION["user"][0];?>" id="users">
            <input type="hidden" name="price"  id="price">
            <button type="submit" name="reservation" id="reserve">Reserve now</button>
        </form>
    </div>
    <div class="footer-div">
               <div class="footer-item">
                    <div id="icon">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-instagram"></i>
                    </div>
                    <br>
                    <p>all right reseverd from youcode</p>
              </div>
              <div class="footer-item">
                  <input type="text"  placeholder="Enter your name" id="feedback-sender"><br><br>
                  <textarea name="" id="feedback-area" placeholder="enter your feedback"></textarea><br>
                  <div id="feedback-error"><p></p></div><br>
                  <button type="submit" id="btn-feedback">submit feedback</button>
              </div>
    </div>


 <!-- jquery link -->
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script>

  </script>
</body>
</html>