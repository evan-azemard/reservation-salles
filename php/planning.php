<?php
session_start();
include('User.php');
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
            <?php
require 'Date.php';
require 'Event.php';
$events = new Events();
$month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
$start = $month->getStartingDay();
$start = $start->format('N') === '1'  ? $start : $month->getStartingDay()->modify('last monday');
$weeks = $month->getWeeks();
$end =(clone $start)->modify('+' . (6 + 7 * ( $weeks - 1)) . ' days');
$events = $events->getEventsBetweenByDay($start,$end);
?>

<div class="d-flex flex-row aligne-item-center justify-content-between mx-sm-3">
    <h1><?= $month->toString(); ?></h1>
    <div>
        <a href="planning.php?month=<?= $month->previoustMonth()->month; ?>&year=<?= $month->previoustMonth()->year; ?>" class="btn btn-primary">&lt</a>
        <a href="planning.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt</a>
    </div>
</div>


<table class="calendar__table calendar__table--<?= $weeks; ?>weeks" >
    <?php for ($i = 0; $i < $weeks; $i++): ?>
    <tr id="invisibletd">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <thead>
            <?php
        foreach ($month->days as $k => $day):
            $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
            $eventsForDay = $events[$date->format('Y-m-d')] ?? [] ;
            ?>
        <th class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
            <?php if ($i === 0): ?>
            <div class="calendar__weekday"> <?= $day; ?></div>
            <?php endif; ?>
            <div class="calendar__day"><?= $date->format('d'); ?></div>
            <?php foreach ($eventsForDay as $event): ?>
            <div class="calendar__event">
                <?=   $_SESSION["login"]; ?> - <?= $event['titre']; ?>
            </div>
            <?php endforeach; ?>
        </th>
            <?php endforeach; ?>
    </thead>
    <tbody>
        <tr>
                    <td class="heure">8h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure">9h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure">10h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure">11h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure millieu">12h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">13h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">14h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">15h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">16h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">17h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">18h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>
                <tr>
                    <td class="heure apre">19h</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="tborder-right"></td>
                </tr>

        <?php endfor; ?>
    </tbody>
</table>
</main>




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