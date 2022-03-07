<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once __DIR__ . '/classes/Movie.php';
require_once __DIR__ . '/classes/Show.php';
require_once __DIR__ . '/classes/Room.php';
require_once __DIR__ . '/classes/ImmersiveRoom.php';

$moviesArray = [
    new Movie("Le Fabuleux Destin d'Amélie Poulain", ["comedy", "romance"], ["Audrey Tautou", "Mathieu Kassovitz", "Rufus", "André Dussollier"], 122),
    new Movie("Peppa Pig: The Golden Boots", ["cartoon"], ["	
    Lily Snowden-Fine", "Cecily Bloom", "Harley Bird", "Amelie Bea Smith"], 15),
    new Movie("Melancholia", ["drama", "sci-fi", "disaster"], ["Kirsten Dunst", "Charlotte Gainsbourg", "Kiefer Sutherland", "Alexander Skarsgård"], 130),
    new Movie("The Truman Show", ["psychological", "drama", "comedy", "sci-fi"], ["Jim Carrey", "Ed Harris", "Laura Linney", "Noah Emmerich"], 103)
];

$roomsArray = [
    new Room(1),
    new ImmersiveRoom(2, ["smoke", "vibration", "water"])
];

$showsArray = [
    new Show($moviesArray[0]->getTitle(), $roomsArray[0]->getNumber(), "20-05-2020", "14:00", 12),
    new Show($moviesArray[1]->getTitle(), $roomsArray[1]->getNumber(), "20-05-2020", "14:00", 12),
    new Show($moviesArray[1]->getTitle(), $roomsArray[0]->getNumber(), "20-05-2020", "16:00", 12),
    new Show($moviesArray[0]->getTitle(), $roomsArray[1]->getNumber(), "20-05-2020", "16:00", 12),
    new Show($moviesArray[2]->getTitle(), $roomsArray[0]->getNumber(), "21-05-2020", "14:00", 15),
    new Show($moviesArray[3]->getTitle(), $roomsArray[1]->getNumber(), "21-05-2020", "14:00", 10),
    new Show($moviesArray[3]->getTitle(), $roomsArray[0]->getNumber(), "21-05-2020", "16:00", 10),
    new Show($moviesArray[2]->getTitle(), $roomsArray[1]->getNumber(), "21-05-2020", "16:00", 15),
    new Show($moviesArray[1]->getTitle(), $roomsArray[1]->getNumber(), "22-05-2020", "14:00", 12),
    new Show($moviesArray[2]->getTitle(), $roomsArray[1]->getNumber(), "22-05-2020", "16:00", 15)
];

$daysArray = [];
foreach ($showsArray as $show) {

    if (in_array($show->getDate(), $daysArray) == false) {
        $daysArray[] = $show->getDate();
    }
}
$daysArray[] = "23-05-2020"

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
</head>

<body>
    <main>
        <!-- 1) Recupera l’elenco delle sale con relative informazioni, facendo particolare attenzione alle informazioni aggiuntive per le sale immersive. -->
        <h2>Rooms</h2>
        <ul>
            <?php
            foreach ($roomsArray as $room) {
                $output = "<li>Room {$room->getNumber()}, capacity {$room->getCapacity()}";

                if (is_a($room, "ImmersiveRoom")) {
                    $output .= ", special effects: {$room->getSpecialEffectsString()}";
                }

                $output .= ".</li>";
                echo $output;
            }
            ?>
        </ul>

        <!-- 2) Recuperare la capienza totale del cinema considerando tutte le sale a disposizione. -->
        <?php
        $totalCapacity = 0;

        foreach ($roomsArray as $room) {
            $totalCapacity += $room->getCapacity();
        }

        echo "<h3>Total capacity: {$totalCapacity}</h3>";
        ?>

        <!-- 3) Stabilito un giorno e un film, recuperare quante proiezioni totali di quel film ci saranno. -->
        <h2>Movies</h2>
        <?php
        foreach ($moviesArray as $movie) {
            echo "<h3>{$movie->getTitle()}</h3>";

            foreach ($daysArray as $day) {
                echo "<h4> $day </h4> <ul>";
                $hasShows = false;

                foreach ($showsArray as $show) {
                    if ($show->getMovie() == $movie->getTitle() && $show->getDate() == $day) {
                        echo "<li>{$show->getTime()}</li>";
                        $hasShows = true;
                    }
                }

                if (!$hasShows) {
                    echo "<li>No shows</li>";
                }

                echo "</ul>";
            }
        }
        ?>

        <!-- 4) Stabilito un giorno, recupera l’orario di fine dell’ultimo spettacolo. 
        5) gestire con logica un’eccezione try/catch in un punto qualsiasi del vostro codice.-->
        <h2>Everyday's last show</h2>
        <?php
        foreach ($daysArray as $day) {
            echo "<h3> $day </h3>";

            $lastShowTime = 0;
            $lastShowMovie = "";

            try {
                foreach ($showsArray as $show) {
                    if ($show->getDate() == $day && timeToNumber($show->getTime()) > $lastShowTime) {
                        $lastShowTime = $show->getTime();
                        $lastShowMovie = $show->getMovie();
                    }
                }
            } catch (Exception $e) {
                echo "Exception" . $e->getMessage();
            }

            if ($lastShowTime == 0) {
                echo "No shows";
            } else {
                echo "$lastShowTime ($lastShowMovie)";
            }
        }

        //Trasforma un orario in un numero per permettere comparazioni tra più orari
        function timeToNumber($time)
        {
            if (is_null($time)) {
                throw new Exception("Is null");
            }
            $tempTimeArray = explode(":", $time);
            return intval($tempTimeArray[0]) + (intval($tempTimeArray[0]) / 60);
        }
        ?>

        <!-- 6) Stabilito un film, una sala, un’ora di inizio e un numero di proiezioni, calcolare automaticamente gli orari degli spettacoli, considerando che tra uno spettacolo e l’altro devono passare 15 min. -->

        <?php
        function calculateShowsTime($movie, $room, $day, $time, $projections)
        {
            echo "<h2>{$movie->getTitle()}'s shows in Room {$room->getNumber()} if starting from $time with $projections projections on $day:</h2>";

            $duration = $movie->getDuration();
            $dateTime = new DateTime("$day $time");

            $output = "<ul>";
            for ($i = 0; $i < $projections; $i++) {
                $output .= "<li>{$dateTime->format('H:i')}</li>";
                $dateTime->modify(+$duration + 15 . 'minutes');
            }

            $output .= "</ul>";
            echo $output;
        }
        foreach ($moviesArray as $movie) {
            calculateShowsTime($movie, $roomsArray[0], "20-05-2000", "14:00", 5);
        }

        ?>

        <!-- 7) Stabilito un giorno, recuperare l’elenco dei film in proiezione con relativi attori, i quali dovranno essere stampati con iniziale del nome e cognome “N. Cognome”. -->


        <?php

        // 
        //Alcuni attorni non hanno il cognome, attenzione!
        ?>
    </main>
</body>

</html>