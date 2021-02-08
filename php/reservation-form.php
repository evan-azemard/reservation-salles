<?php
session_start();
require('../php/Table.php');
require_once('../library/Utils.php');
access2('');
if(isset($_POST["reserver2"])){
    $date = $_POST['date1'];

    $heure1 = $_POST['heure1'];

    $heure2 = $heure1 + 1 ;



    $re = "$date-$heure1";
    $re2 = "$date-$heure2";

    $reserv = new Reservation();
    $errors = $reserv->reserver($_POST['for_titre'],$_POST['textarea'],$_SESSION['login'], $re,$re2,$heure1,$heure2);
}

else {
    $errors = array();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://use.fontawesome.com/d3028f0b61.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/reservationsalles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIP.W-ukJI6sI6FTEyYw1i5TVAHaLG?w=137&h=205&c=7&o=5&pid=1.7"/>
    <link rel="preconnect">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Formulaire de réservation</title>
</head>
<body id="form_body">
<div id="h_main">
    <nav id="h_container">
        <ul>
            <li>Menu
                <ul>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="planning.php">Planning</a></li>
                    <li><a href="reservation-form.php">Reservation</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<header id="index_header">
    <div class="index_header_container">
        <div id="index_header_menu">

        </div>
        <?php centreTitre()?>
        <h1>Tartanpion</h1>
    </div>
    <?php pseudo(); ?>
    </div>
    <div class="index_header_container">
        <div class="index_ins-conex">
            <?php remplace('inscription.php','inscription'); ?>
        </div>
        <div class="index_ins-conex">
            <?php remplace2('profil','profil.php','connexion','connexion.php'); ?>
        </div>
    </div>
</header>
<main id="form_main">
    <div id="form_container1">
        <div id="form_titre">
            <h1>Reserver une salle</h1>
        </div>
    </div>
    <?php
    foreach ($errors as $error) {
        echo "<div id='error_ins'> <center>";
        echo "• " . $error . "<br>";
        echo "</center></div>";

    }
    ?>
    <div id="form_container2">
        <div id="form_cnt2_main">
            <div id="form_cnt2_1">
                <div id="form_cnt2-1_label">
                    <label for="input_titre">Entrer le titre :</label>
                </div>
                <div id="form_cnt2-1_input">
                    <form method="post">
                        <input type="text" id="input_titre" class="formcolor" name="for_titre" placeholder="Titre:" required="required">
                </div>
            </div>
            <div id="form_cnt2_2">
                <div id="form_cnt2-2_label">
                    <label for="textarea">Entrer une description:</label>
                </div>
                <div id="form_cnt2-2_input">
                    <textarea rows="4" cols="50"  class="formcolor" name="textarea" id="textarea" placeholder="Description:" required="required"></textarea>
                </div>
            </div>
            <div id="form_cnt2_3">
                <div id="form_cnt2-3-1">
                    <div id="form_cnt2-3_label1">
                        <label for="date1">Entrer la date :</label>
                    </div>
                    <div id="form_cnt2-3_input1">
                        <input type="date" id="date1" class="formcolor" max="2022-12-31" min="2021-01-01" name="date1" required="required">
                    </div>
                    <div id="form_cnt2-3-2">
                        <div id="form_cnt2-3_label2">
                            <label for="date2">Crénaux horaire :</label>
                        </div>
                        <div id="form_cnt2-3_input2">
                            <select class="formcolor" id="heure1" size="1" name="heure1" required="required">
                                <option>Heure</option>
                                <option value="9">9h à 10h</option>
                                <option value="10">10h à 11h</option>
                                <option value="11">11h à 12h</option>
                                <option value="12">12h à 13h</option>
                                <option value="13">13h à 14h</option>
                                <option value="14">14h à 15h</option>
                                <option value="15">15h à 16h</option>
                                <option value="16">16h à 17h</option>
                                <option value="17">17h à 18h</option>
                                <option value="18">18h à 19h</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="form_cnt2_4">
                    <div id="form_cnt2_4_button">
                        <input type="submit" id="reserver2" name="reserver2" value="Reserver la salle">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer id="index_footer">
    <div id="index_footer_container1">
        <div id="footer_container1_titre">
            <p>Tartanpion</p>
        </div>
    </div>
    <div id="index_footer_container2">
        <div class="footer_container2_mentions">
            <p>Contacter</p>
        </div>
        <div class="footer_container2_mentions">
            <p>Politic</p>
        </div>
        <div class="footer_container2_mentions">
            <p>Histoire</p>
        </div>
    </div>
    <div id="index_footer_container3">
        <div class="footer_container3_nom">
            <p>Claude Rodriguez</p>
        </div>
        <div id="footer_container3_trait">
            <div id="footer_trait">
                <p>.</p>
            </div>
        </div>
        <div class="footer_container3_nom">
            <p>Evan Azemard</p>
        </div>
    </div>
</footer>
</body>
</html>