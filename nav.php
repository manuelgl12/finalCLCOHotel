<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon-->
    <link rel="stylesheet" href="CSS/style.css">
    <title>Home</title>
</head>

<style>
  body{
  background-color: lightgray;
  }
</style>

<body>

    <!----NAV-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        
      <div class="container-fluid"> <!--container fluid sorgt dafür dass navbar über die ganze seite ist (links bis rechts)-->
        <a class="navbar-brand" href="#"><img src="images/stars.png" alt="" width="80" height="80" class="d-inline-block"> Hotel Snooze</a> <!---img für Sternlogo neben "hotel snooze"-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span></span>
          <span></span>
          <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto ">  <!---MS-AUTO bringt die Navleiste nach reicht -> Home, Impressum, Hilfe....-->
            <li class="nav-item" style="background-color: rgba(158, 155, 152, 0.50);">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item" style="background-color: rgba(158, 155, 152, 0.50);">
              <a class="nav-link" href="./impressum.php">Impressum</a>
            </li>
            <li class="nav-item" style="background-color: rgba(158, 155, 152, 0.50);">
              <a class="nav-link" href="./hilfeseite.php">Hilfe</a>
            </li>
            <li class="nav-item" style="background-color: rgba(158, 155, 152, 0.50);">
              <a class="nav-link" href="./hotelgalerie.php">Galerie</a>
            </li>
            <?php
            if(!isset($_SESSION['user'])) //wenn user nicht eingeloggt ist sieht er ein loginbutton
            {
              echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./login.php'>Login</a>
            </li>";
            }
            
            ?>
             <?php
            if(isset($_SESSION['user'])&&isset($_SESSION['role'])&&$_SESSION['role']=='guest') //wenn user eingeloggt ist
            {
              echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./kontakt.php'>Kontakt</a>
            </li>"  ;
            echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./mytickets.php'>Tickets</a>
            </li>"  ;
            echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
            <a class='nav-link' href='./profil.php'>Profil</a>
          </li> ";
            echo "<li class='nav-item' style='background-color: rgba(255,0,0,0.2);'>
            <a class='nav-link' href='DB/files/logout.php'>Logout</a>
            </li>";
            }
            
            ?>
            
            <?php
            if(isset($_SESSION['user'])&&isset($_SESSION['role'])&&$_SESSION['role']=='techniker') //rolle techniker zum bearbeiten der tickets
            {
              echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./gettickets.php'>Tickets</a>
            </li>"  ;
            echo "<li class='nav-item' style='background-color: rgba(255,0,0,0.2);'>
            <a class='nav-link' href='DB/files/logout.php'>Logout</a>
            </li>";
            
            }
            
            ?>
            <?php
             if(isset($_SESSION['user'])&&isset($_SESSION['role'])&&$_SESSION['role']=='admin') //rolle des admins für liste aller user+ liste aller tickets
            {
              echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./alleuser.php'>Kunden</a>
            </li>"  ;

            echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
              <a class='nav-link' href='./alletickets.php'>Tickets</a>
            </li>"  ;

            echo "<li class='nav-item' style='background-color: rgba(158, 155, 152, 0.50);'>
            <a class='nav-link' href='./news.php'>News</a>
          </li>"  ;
          echo "<li class='nav-item' style='background-color: rgba(255,0,0,0.2);'>
            <a class='nav-link' href='DB/files/logout.php'>Logout</a>
            </li>";
            }
            
            ?>
           
          </ul>
          
        </div>
      </div>
    </nav>

        
</body>
</html>