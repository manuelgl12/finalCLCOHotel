<!DOCTYPE html>
<html lang="de">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---icon-->

    <title>Login</title>


</head>

<body class="loginseite">

    <?php
    include 'nav.php';
    ?>

    <!----LOGIN/REGISTRIERUNG-->

    <div class="containerlogin">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="images/blatt.jpeg" alt="">
            </div>
        </div>
        <form action='DB/files/login_db.php' method="POST">
            <div class="form-content">
                <form action="" method="post">
                    <div class="login-form">
                        <div class="title">Login</div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <ion-icon name="person-outline"></ion-icon>
                                <input type="text" placeholder="Benutzername" id="username" name="username" required>
                            </div>
                            <div class="input-box">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="password" placeholder="Password" id="password" name="password" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Login">
                            </div>
                        </div>

                        <div class="text login-text">Noch nicht registriert? <label for="flip">Registrieren</label></div>
                        <!--wenn auf Registrieren geklickt wird, wird die checkbox abgehackt-->
                    </div>
                </form>

                <form action='DB/files/insert_into_db.php' method="POST">
                    <div class="registration-form">
                        <div class="title">Registrierung</div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <ion-icon name="person-outline"></ion-icon>
                                <select name="anrede" id="anrede">
                                    <option value="herr">Herr</option>
                                    <option value="frau">Frau</option>
                                    <option value="divers">Divers</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <ion-icon name="person-outline"></ion-icon>
                                <input type="text" placeholder="Vorname" id="vorname" name="vorname" pattern="[A-Za-z]{2,30}" required >
                            </div>
                            <div class="input-box">
                                <ion-icon name="person-outline"></ion-icon>
                                <input type="text" placeholder="Nachname" id="nachname" name="nachname" pattern="[A-Za-z]{2,30}" max="30" required>
                            </div>
                            <div class="input-box">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="email" placeholder="E-Mail" id="email" name="email" max="30" required>
                            </div>
                            <div class="input-box">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="text" placeholder="Benutzername" id="benutzername" name="benutzername" pattern="[A-Za-z0-9]{3,30}" max="30" required>
                            </div>
                            <div class="input-box">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="password" placeholder="Passwort" id="password" name="password" min="5" max="30" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Registrieren">
                            </div>
                        </div>

                        <div class="text reg-text">Sie haben bereits ein Konto?
                            <label for="flip">Login</label>
                            <!---wenn Login angeklickt wird, wird die checkbox abgehackt-->
                        </div>
                    </div>

                </form>
              
            </div>

    </div>


</body>

</html>