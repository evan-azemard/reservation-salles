<?php
session_start();
include('User.php');
require_once('../library/Utils.php');
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
    <title>Menu</title>
</head>
<body id="index_body">
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
<main id="index_main">
    <div id="index_main_center">
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <h1>Bienvenue sur tartanpion</h1>
            </div>
            <div id="index_main_container-img1">
                <div id="index_img1_images-1">
                </div>
                <div id="index_img1_images-2">
                </div>
                <div id="index_img1_images-3">
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div id="index_main_principaux_titre1">
                <div id="index_main_titre1">
                    <p>Nos salles ont était construite par l'architecte reconnu Rem Koolhaas </p>
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <p>Nos plus belles salles</p>
            </div>
            <div id="index_main_container-img2">
                <div class="index_img2_contient">
                    <div class="index_img2_titre">
                        <p>salle Jullien Doré</p>
                    </div>
                    <div class="index_img4">
                        <img src="../img/img4.jpg">
                    </div>
                </div>
                <div class="index_img2_contient">
                    <div class="index_img2_titre">
                        <p>salle Arthur Bilo</p>
                    </div>
                    <div class="index_img4">
                        <img src="../img/img5.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="index_main_container-principaux">
            <div class="index_main_principaux_titre">
                <p>Reserver dès maintenant !</p>
            </div>
            <div id="index_main_button">
                <div id="index_main_fake_button">
                    <button id="index_button"><a href="reservation-form.php"> Réserver ! </a></button>
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

