
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

   
<?php
include 'nav.php';
?>

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Second slide"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Third slide"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/2506990/pexels-photo-2506990.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="First slide">
          </div>
          <div class="carousel-item">
            <img src="images/lobby.jpeg" class="d-block w-100" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="images/bathroom.jpeg" class="d-block w-100" alt="Third slide">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<!------HOMEPAGE------->
<section class="news">
<?php
require_once('DB/files/dbaccess.php');
$db_obj = new mysqli($host, $user, $password, $database);

$sql = "SELECT * from news ORDER BY datum DESC LIMIT 3"; //limit auf die letzten 3 beiträge

$stmt = $db_obj->prepare($sql);


    
    
    
$stmt->execute(); //sql objekt das aus der datenbank zurückkommt
$result = $stmt->get_result();

?>
  <h1>News</h1>

  <div class="row">
      
        <?php
        while($row = mysqli_fetch_array($result)) { 
            echo "<div class='news-col'>";
            echo $row['inhalt'];
            echo "<br>";              
            echo $row['datum'];
            echo "</div>";
      }
  
    ?>
     
  </div>
</section>


<!--FOTOS-->
<section class="fotos">

  <div class="row">
      <div class="fotos-col">
          <img src="images/thai.jpg">
          <h3>Thai-Massage</h3>
      </div>
      <div class="fotos-col">
          <img src="images/pool.jpg">
          <h3>Indoor Pool</h3>
      </div>
      <div class="fotos-col">
          <img src="images/outdoorpool.jpg">
          <h3>Outdoor Pool</h3>
      </div>
  </div>

</section>

<!--EINDRÜCKE-->
<section class="eindruck">
  <h1>Zimmer</h1>

  <div class="row">
      <div class="eindruck-col">
          <img src="images/einzel.jpg">
          <h3>Einzelzimmer</h3>
      </div>
      <div class="eindruck-col">
          <img src="images/doppel.jpg">
          <h3>Doppelzimmer</h3>
      </div>
      <div class="eindruck-col">
          <img src="https://images.pexels.com/photos/6957090/pexels-photo-6957090.jpeg?cs=srgb&dl=pexels-max-vakhtbovych-6957090.jpg&fm=jpg">
          <h3>Master Zimmer</h3>
      </div>
  </div>
</section>


<!---KONTAKT HOMEPAGE-->
<section class="cta">
  <h1>Wollen Sie mehr von unserem Hotel sehen? <br> Klicken Sie auf unsere Galerie!</h1>
  <a href="hotelgalerie.php" class="kontakt-button">Galerie</a> <br>
  <a  class="fa fa-facebook"></a> <a class="fa fa-twitter"></a> <a class="fa fa-instagram"></a>
  <!--Hintergrundfoto für Kontakt Homepage, weil auf css nicht funktioniert-->
  <style>
      .cta{
          background-image: url('images/fragen.jpg');
          background-position: center;
          background-size: cover;
          border-radius: 10px;
          text-align: center;
          padding: 100px 50px;
          width: 60%;
          margin: 100px auto;
      }

  </style>
</section>


      
    
    
</body>
</html>