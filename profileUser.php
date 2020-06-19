<?php include_once("./classes/users.php");

    //tester session
    if(empty($_SESSION['user'])){
        header('Location:login.php');
    }

    $idStatus="";
    $FullName="";
    $Email="";
    $status="";
if( isset($_SESSION["user"])):
    $idStatus=$_SESSION["user"][0];
    $FullName=$_SESSION["user"][1];
    $Email=$_SESSION["user"][2];
    $status=$_SESSION["user"][4];
endif;


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
    </html>
       <div class="container sb-left">
           <div class="sidebar left">
               <div class="sidebar-logo">
                   <img src="img/user-icon.png" width="128" alt="user">
               </div>
               <div class="nav-list">
                <ul>
                    <li><a href="contact.php?idStatus=<?=$idStatus;?>" data-page="users"><i class="fn users"></i><span>COMMENTS</span></a></li>
                </ul>
               </div>
           </div>
           <?php if(isset($_SESSION["user"]) && !empty($_SESSION["user"])):?>
           <div class="page-wrapper">
               <div class="page-content">
                   <div class="head-btns">
                       <a class="back btn" href="home.php"><i class="fn left-arrow"></i><span>Back to Homepage</span></a>
                       <a class="back btn" href="reservation.php"><i class="fn left-arrow"></i><span>Back to Reservation</span></a>
                       <a class="logout btn" href="log_Out.php?log_out=<?=$idStatus;?>"><i class="fn logout-ic"></i><span>Log Out</span></a>
                       <div style="clear: both;"></div>
                   </div>
                   <br>
                   <br>
                   <div class="row table">
                            <table class="rwd-table">
                                <tr>
                                    <th>Full Name</th>
                                    <td data-th="Movie Title"><?= $FullName;?></td>
                                    </tr>
                                    <tr>
                                    <th>Email</th>
                                    <td data-th="Movie Title"><?= $Email;?></td>
                                    </tr>
                                    <tr>
                                    <th>Status</th>
                                    <td data-th="Movie Title"><?= $status;?></td>
                                </tr>
                            </table>
                       </div>
       </div>
        <section id="AfficheDetails">
        <h3 style="text-align:center"> Details des reservations reserver
 </h3>
        <div class="row table" style="margin:0;">
        <table class="table mr-4">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Telephone</th>
                <th>flying From</th>
                <th>flying To</th>
                <th>Date depart</th>
                <th>Date return</th>
                <th>Seats</th>
                <th style="background-color:#f07d43;">price DH</th>
            </tr>
        </thead>
        <tbody id="T_table">
        </tbody>
        </table>
                       </div>
        </section>
<?php endif;?>
       </div>


       <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script type="text/javascript" src="js/jax.js"></script>
    </body>