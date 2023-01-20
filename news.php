<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <!--ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon-->
    
    <title>News</title>

    <style>
      body{
        min-height: 100vh;
        background: url(images/beach.jpeg) no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
</head>
<body>

<?php
include 'nav.php';
?>


<!---News bereich-->
      <div class="contact-section">
        <div class="contact-form">
          <h2>Neuen News erstellen</h2>
          <form class="contact" action="DB/files/insert_into_news.php" method="POST">
            <textarea name="inhalt" id="inhalt" placeholder="Ihre Nachricht" rows="10" required></textarea>
            <div class="fileupload">
            <input type="file"  name="bild"  id="bild" class="inputfile"  accept="image/png, image/jpeg">
            </div>
            <input type="submit" name="submit" class="send-btn" value="Senden">
          </form>
          
        </div>
      </div>
    
</body>
</html>