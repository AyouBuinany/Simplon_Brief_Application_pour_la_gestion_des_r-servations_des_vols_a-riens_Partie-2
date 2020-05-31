<?php
include_once './classes/ClassFlight.php';
include_once './classes/users.php';
$flight_list= new flights_list();
$messageSession="";
  if(!empty($_SESSION['flying_from']) && !empty($_SESSION['flying_to']) ){
       $flying_to= $_SESSION['flying_to'];
     $flying_from=$_SESSION['flying_from'];
     //result
         $result=$flight_list->showFlights($flying_from,$flying_to);
             if($result){
                 $row=$result->num_rows;
                 if(isset($_SESSION["user"])){
                         $messageSession="
                             <h3 style='margin: auto; text-align: center; font-size:27px'> Welcome " .$_SESSION["user"][1]. " To Morocco AirLines  From $flying_from To $flying_to ";
                             "</h3>" ;
                                              }
                        }
                                                                             }

/*user*/
$admin= new users();
//show
if(!empty($_GET["show"])){
    $query=$admin->show($_GET["show"]);
    $show=mysqli_num_rows($query);
}
//cancel
if(!empty($_GET["cancel"])){
$admin->cancel($_SESSION["user"][0]);
}
//add
if(isset($_POST["ajouter"])){
    $admin->addFlight();
}
if(!empty($_SESSION["user"][4]) && $_SESSION["user"][4]=='Admin'){
    $add="<button type='button' id='add' class='btn btn-success'>+</button>" ;
}else{
    $add="";
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
                <h1 id='fixed'><a href="#">Moroco AirLines</a></h1>
            </div>
            <div id="search">
                <input type="text" placeholder="Search for you flite ">
            </div>
            <div id="menu">
                <ul id="fixed-ul">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about_us.php">About us</a></li>
                    <li>
                    <a href="profile.php"><img src="./img/profile.png" alt="user" width="40"></a></li>
                </ul>
            </div>
        </div>
        <div class="entry-title">
            <h3>Why Morocco AirLines</h3>
            <p><a href="about_us.php">Discover more</a></p>
            <br>
            <?php echo $messageSession; ?>
        </div>
    </div>

    <div id="up"><a href="#top"><i class="fa fa-chevron-circle-up"></i></a></div>
    <br><br><br><br><br>
    <div class="col-md-10  reservation_table" style="margin: auto;">
        <h4 class="text-center ">Today's flights </h4>
        <table class="table mr-4">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Flying FROM</th>
                <th>Flying To</th>
                <th>Departing date</th>
                <th>returning date</th>
                <th>Seats</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="T_table">
        <?php if(isset($row)>0):?>
        <?php while($vol=mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $vol['id'];  ?></td>
                <td ><?= $vol['flyingFrom'];  ?></td>
                <td ><?= $vol['flyingTo'];   ?></td>
                <td ><?= $vol['departingDate'];  ?></td>
                <td ><?= $vol['returningDate'];  ?></td>
                <td ><?= $vol['seats']; ?></td>
                <td>
                    <?php if($_SESSION["user"][4]=='User'){?>
                <a href="reserver.php?reserver=<?= $vol['id'];  ?>" class="badge badge-primary p-3" id="reserver">RESERVER</a>
        <?php }else if($_SESSION["user"][4]=='Admin'){?>
            <a href="reservation.php?show=<?= $vol['id'];  ?>" class="badge badge-primary p-3" id="reserver">Show</a>
            <a href="reservation.php?cancel=<?= $vol['id'];  ?>" class="badge badge-primary p-3" id="reserver">Cancel</a>

        <?php }?>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
 if(isset($show)>0){
     $details=mysqli_fetch_object($query);?>
<div class="alert alert-success" role="alert"  id="alert">
<a href="reservation.php" class="close"   onclick="document.getElementById('alert').style.display='none';">
  <span aria-hidden="true">&times;</span>
 </a>
  <h4 class="alert-heading"> Welcome To flight From  <?= "$details->flyingFrom To $details->flyingTo"  ;?></h4>
  <p>Number of seats left  <b><?= $details->seats; ?></p></b>
  <hr>
  <p class="mb-0">Number seats reserver From Adult is <b><?= $details->seats_Adult; ?></b>  .</p>
  <p class="mb-0">Number seats reserver From Children is <b><?= $details->seats_Children; ?></b>  .</p>
  </div>
<?php }?>
<div style="text-align:center;">
<?=$add;?>
</div>
<div  id="inpContainer" class="inputs-container2" style="display:none;">
    <br>
    <form action="" method="POST" class="C_reserve">
<table id="tableForm">
    <tr>
        <th> <label for="">Flying From</label>   </th>
        <td> <input type="text" placeholder ="Flying From" name="FlyingFrom" class="form-control"/></td> 
    </tr>
    <tr>
            <th><label for="">Flying To</label>  </th>
            <td> <input type="text" placeholder="Flying To"  name="FlyingTo" class="form-control"/></td>
    </tr>

        <tr>
                <th>
                <label for="dateDebut">Date Departing</label>
                </th>
                <td>
                <input type="date" id="departing" required name="departing" class="form-control" placeholder="departing">
                </td>
           </tr>

            <tr>
                    <th>
                    <label for="dateFin">Date returning</label></th>
                    <td> <input type="date"  id="returning" required name="returning" class="form-control" placeholder="returning" ></td>
            </tr>
    <tr>
            <th>
            <label for="dateFin">Seats</label>
            </th>
            <td> <input type="text" placeholder="Seats"  name="Seats"  class="form-control"/></td>
            <td> <input type="hidden" placeholder="id_user"  name="id_user"  class="form-control" value="<?= $_SESSION["user"][0];?>"/></td>
    </tr>
<tr>
        <th colspan="2"><button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button></th>
</tr>
    </table>
</form>
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