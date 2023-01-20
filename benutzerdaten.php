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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon-->
  
    <title>Profil bearbeiten</title>
</head>


<body class="profilbody">
 <?php 
    include 'nav.php';
 ?>
<form action="DB/files/update_profile.php" method="POST">
<div class="profile-container">
        <div class="img-container">
            <img src="images/user1.jpeg" alt="profile image">
        </div>
        <p class="info placeprofil"> <input type="text" placeholder="Vorname" id="vorname" name="vorname" pattern="[A-Za-z]{2,30}" required ></p>
        <p class="info placeprofil"> <input type="text" placeholder="Nachname" id="nachname" name="nachname" pattern="[A-Za-z]{2,30}" required ></p>
        <p class="info placeprofil"> <input type="email" placeholder="E-Mail" id="email" name="email" max="30" required></p>
        <p class="info placeprofil"> <input type="password" placeholder="Altes Passwort" id="oldpassword" name="oldpassword" min="5" max="30" required></p>
        <p class="info placeprofil"> <input type="password" placeholder="Neues Passwort" id="newpassword" name="newpassword" min="5" max="30" required></p>
        <p class="info placeprofil"> <input type="password" placeholder="Neues Passwort" id="newpassword2" name="newpassword2" min="5" max="30" required></p>
  

        <input type="submit"  action="submit" value="Speichern">
    </div>
</form>
  <style>
      .profilbody {
        min-height     : 100vh;
        width          : 100%;
        display        : flex;
        justify-content: center;
        align-items    : center;
        background     : linear-gradient(20deg, rgb(243, 216, 216));
        background-image: url('images/hilfeseite.jpeg');
      }

  
      .profile-container {
          position        : relative;
          background-color: #fff;
          width           : 450px;
          padding         : 100px 50px 40px;
          border-radius   : 12px;
          box-shadow      : 0 0 60px 5px rgba(0, 0, 0, 0.2);
          display         : flex;
          flex-direction  : column;
          justify-content : center;
          align-items     : center;
      }

      .img-container {
          width        : 130px;
          height       : 130px;
          overflow     : hidden;
          border       : 5px solid #494949;
          border-radius: 50%;
          box-shadow   : 0 8px 55px black;
          position     : absolute;
          top          : 0;
          left         : 50%;
          transform    : translate(-50%, -50%);
          }

      .img-container img {
          width    : 100%;
          max-width: 100%;
          transform: scale(1.1);
          }



      .placeprofil {
          margin-bottom: 10px;
          }

      .full-name {
          font-size     : 1.4em;
          font-weight   : bold;
          letter-spacing: 1px;
          color         : #494949;
          }

      .posts-info {
          width          : 100%;
          display        : flex;
          justify-content: space-around;
          align-items    : center;
          font-size      : 1.1em;
          letter-spacing : 0.5px;
          margin-bottom  : 30px;
          text-align     : center;
          }

      .posts-info span {
          display      : block;
          font-weight  : bold;
          margin-bottom: 4px;
          }


      .actionprofil {
          outline: none;
          cursor: pointer;
          color: #fff;
          background-color: #494949;
          border: none;
          border-radius: 50px;
          padding: 12px 20px;
          width: 100%;
          margin-top: 25px;
          box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
          text-transform: uppercase;
          font-size: 1em;
          font-weight: bold;
          letter-spacing: 2px;
          transition: transform 0.3s, opacity 0.3s;
          }

      .actionprofil.message {
          background-color: #6741ff;
          }

      .actionprofil:hover {
          transform: scale(1.05);
          opacity: 0.85;
          }

 
    </style>
 
</body>
</html>