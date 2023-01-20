<!DOCTYPE html>
<html lang="de">
<head>
    <title>FAQ</title>
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
    <title>HILFE</title>
    <style>
       body {
            min-height: 100vh;
            width: 100%;
            background-image: url('images/hilfeseite.jpeg');
            background-position: center;
            background-size: cover;
            position: relative;
     } 
    </style>
</head>
<body class="hilfebody">

<?php
include 'nav.php';
?>

   
      </section>

    <div class="hilfe">
        <h1>FAQ - häufig gestellte Fragen</h1><br>
    </div>

    
      <div class="containerhilfe">
      <div class="rowhilfe ">
        <div class="col-md-6 offset-md-3"> <!---bringt das accordion in die mitte der seite-->

          <div class="accordion" id="accordionExample" >
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Wie erfolgt die Registrierung?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Sie sind zum ersten Mal hier?</strong> Um sich zu registrieren, benötigen wir lediglich einige Stammdaten von Ihnen. Sie können sich ganz einfach registrieren, indem Sie diesem Link folgen und uns Ihre Daten übermitteln. <a href="./login.php">Registrieren</a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Wo finde ich das Impressum?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Sie möchten mehr über uns erfahren?</strong> Folgen Sie dabei einfach nur dem folgenden Link, um uns besser kennenzulernen. <a href="./impressum.php">Impressum</a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Wo kann ich Fotos vom Hotel und der Zimmer sehen?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Sie wollen einen Blick auf unser Hotel werfen?</strong> In unserer Hotelgalerie finden Sie einige Einblicke in die modernsten Zimmer und bestmögliche Entspannung von unseren Wellness-Bereichen. <a href="./hotelgalerie.php">Hotelgalerie</a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                  Wie kann ich ein Ticket schreiben?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Haben Sie spezielle Wünsche oder Anregungen?</strong> Für unsere Kunden nehmen wir uns gerne Zeit. Hierfür können Sie das <a href="./kontakt.php">Kontaktformular</a> nutzen. Wir bemühen uns gerne um Ihr Anliegen! 
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                  Wo sind die aktuellen News des Hotels zu finden?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Das Neueste aus unserem Hotel.</strong> Aktuelle Informationen zu unseren Angeboten oder Veranstaltungen finden Sie auf unserer <a href="./index.php">Homepage</a>.
                </div>
              </div>
            </div>
           
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseTwo">
                  Wie kann ich meine persönlichen Daten ändern oder anpassen?
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <strong>Sie möchten Ihre Stammdaten ändern?</strong> Diese Einstellungen können Sie in Ihrem Profil bearbeiten sobald Sie sich eingeloggt haben .
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseTwo">
                  Kann ich den Status meiner Tickets einsehen?
                </button>
              </h2>
              <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Sie möchten den aktuellen Stand Ihrer Tickets bzw. Anliegen einsehen?</strong> Diese befinden sich in Ihrer Kundenzone und werden schnellstmöglich von uns bearbeitet.
                </div>
              </div>
            </div>
          </div>
        </div>

       




    </div>
       

    </div>
  
    
</body>
</html>