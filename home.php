<?php
include_once 'config.php';
include "./classes/ClassFlight.php";
$flying= new flights_list();
$next='login.php';
if(isset($_POST["Show_Flights"])){
  echo "wa3ak";
  $_SESSION["flying_from"]=$_POST["flying_from"];
  $_SESSION["flying_to"]=$_POST["flying_to"];
  if(isset($_SESSION['user'])){
  $next="reservation.php";
  }
  header("Location:$next");
}
$flyingFrom="";
$flyingTo="";
if($result=$flying->readFlying()){
$rows=mysqli_num_rows($result);
   if($rows>0){
       while($affiche=mysqli_fetch_array($result)){
            $flyingFrom .= "<option value=". $affiche["flyingFrom"]."></option>";
            $flyingTo .= "<option value=".$affiche["flyingTo"]."></option>";
        }
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
                    <li><a href="#">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                </ul>
            </div>
        </div>
        <div class="entry-title">
            <h3>Why Morocco AirLines</h3>
            <p><a href="about_us.php">Discover more</a></p>
        </div>
    </div>

    <div class="inputs-container">
        <div class="error"></div>
        <br>
        <form action="" method="POST" class="H_search">
            <br>
            <div id="first-row">
                <input type="text" placeholder="Flying From" id="flying_from" name="flying_from" required list="flights_list">
               <datalist id="flights_list">
              <?php echo $flyingFrom; ?>
               </datalist>
                <input type="text"  placeholder="Flying To" id="flying_to" required name="flying_to" list="flights_to">
                <datalist id="flights_to">
                <?php  echo $flyingTo; ?>
               </datalist>
            </div>
            <br>
            <br>
            <button type="submit" name="Show_Flights" id="reserve">Show Flights</button>
        </form>
    </div>
    <br><br><br><br><br><br>
    <hr>
       <h2 id="h2-title">Discover our serveces</h2>
    <hr>
    <h3 style="text-align: center">Explore the additional services we offer to make your journey even more memorable.</h3>
    <div id="up"><a href="#top"><i class="fa fa-chevron-circle-up"></i></a></div>
     <br>
    <div class="serveces-container">
          <div id="servece">
            <i class="fa fa-address-book" id="font"></i>
            <h3>Manage booking</h3>
          </div>
          <div id="servece">
          <i class="fa fa-suitcase" id="font"></i>
            <h3>Excess baggage</h3>
          </div>
          <div id="servece">
          <i class="fa fa-car" id="font"></i>
            <h3>Car rental</h3>
          </div>
          <div id="servece">
          <i class="fa fa-coffee" id="font"></i>
            <h3>Dilecious food</h3>
          </div>
          <div id="servece">
          <i class="fa fa-building" id="font"></i>
            <h3>Hotel booking</h3>
          </div>
    </div>

     <br><br><br>
    <div class="comfort-container">
     <div class="inner-comfort">
       <h1>Morocco AirLines</h1>
       <h2>Travel safe , with no woories</h2>
       <p><a href="#top">book now</a></p>
     </div>
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
</body>
</html>