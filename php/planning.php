<?php
require('../php/Table.php');
require_once('../library/Utils.php');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- 	<script src="https://use.fontawesome.com/d3028f0b61.js"></script>
 --><link rel="stylesheet" type="text/css" href="../css/reservationsalles.css">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/OIP.W-ukJI6sI6FTEyYw1i5TVAHaLG?w=137&h=205&c=7&o=5&pid=1.7"/>
    <link rel="preconnect">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Harmattan:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <meta name="description" content="Reserver votre salle en ligne !" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Planning</title>
</head>
<body id="planning_body">
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
        <?php centreTitre2()?>
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
<main id="planning_main">
<div class="planning_container_table">
<table>
            <thead>
                <tr>
                    <th class="vide"></th>
                    <th class="jour">Lun.<br> <?php echo $jour_semaine = date('d/m', strtotime('monday this week'));?></th>
                    <th class="jour">Mar.<br> <?php echo $jour_semaine = date('d/m', strtotime('tuesday this week'));?></th>
                    <th class="jour">Mer.<br> <?php echo $jour_semaine = date('d/m', strtotime('wednesday this week'));?></th>
                    <th class="jour">Jeu.<br> <?php echo $jour_semaine = date('d/m', strtotime('thursday this week'));?></th>
                    <th class="jour">Ven.<br> <?php echo $jour_semaine = date('d/m', strtotime('friday this week'));?></th>
                </tr>
            </thead>
            <tbody>
               <!-- --><?php /*include 'include/php_planning.php';*/?>
            <?php

for($heure = 8; $heure <= 19; $heure++)//génération lignes des heures
            {
                ?>
                <tr>
                    <td class="heure"><p><?php echo $heure . "h";?></p></td>
                <?php
                for($jour = 1; $jour<=5; $jour++)//génération des cellules sous les jours
                    {
                        if(!empty($info_resa))
                            {
                                foreach($info_resa as $resa => $Hresa)//sépare les réservations
                                    {
                                        $JH = explode(" ", $Hresa["debut"]);//sélection la ligne correspondant à l'heure de début

                                        $H = explode(":", $JH[1]);//explose l'heure
                                        $heure_resa = date("G", mktime($H[0], $H[1], $H[2], 0, 0, 0));//récupère uniquement l'heure sans le 0

                                        $J = explode("-", $JH[0]);//explose la date
                                        $jour_resa = date("N", mktime(0, 0, 0, $J[1], $J[2], $J[0]));//récupère le numéro du jour

                                        $case_resa = $heure_resa . $jour_resa;//crée un numéro de réservation

                                        $titre = $Hresa["titre"];
                                        $login = $Hresa["login"];
                                        $id = $Hresa["id"];

                                        $case = $heure . $jour;//Crée un numéro pour chaque cellules

                                        if($case == $case_resa)
                                            {
                                                ?>
                                                    <td class="resa"><a href="reservation.php?evenement=<?php echo $id;?>"><p><?php echo $titre;?></p><p><?php echo $login;?></p></a></td>
                                                <?php
                                                break;
                                            }
                                        else //si pas de correspondance set $case à null pour éviter trop d'affchage
                                            {
                                                $case = null;
                                            }
                                    }
                                if ($case == null)
                                    {
                                        ?>
                                        <td class="case"><a href="reservation-form.php?heure_debut=<?php echo $heure;?>&amp;date_debut=<?php echo $jour;?>">Réserver un créneau</a></td>
                                        <?php
                                    }
                            }
                        else
                            {
                                ?>
                                <td class="case"><a href="reservation-form.php?heure_debut=<?php echo $heure;?>&amp;date_debut=<?php echo $jour;?>">Réserver un créneau</a></td>
                                <?php
                            }
                    }
                ?>
                </tr>
                <?php
            }
?>
            </tbody>
        </table>
</div>



</main>

<footer id="planning_footer">
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