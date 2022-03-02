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

$showsArray = [
    new Show("Le Fabuleux Destin d'Amélie Poulain", 1, "20-05-2020", "14:00", 12),
    new Show("Peppa Pig: The Golden Boots", 2, "20-05-2020", "14:00", 12),
    new Show("Peppa Pig: The Golden Boots", 1, "20-05-2020", "16:00", 12),
    new Show("Le Fabuleux Destin d'Amélie Poulain", 2, "20-05-2020", "16:00", 12),
    new Show("Melancholia", 1, "21-05-2020", "14:00", 15),
    new Show("The Truman Show", 2, "21-05-2020", "14:00", 10),
    new Show("The Truman Show", 1, "21-05-2020", "16:00", 10),
    new Show("Melancholia", 2, "21-05-2020", "16:00", 15)
];

$roomsArray = [
    new Room(1),
    new ImmersiveRoom(2, ["smoke", "vibration", "water"])
];

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
                echo "<li>Room {$room->getNumber()}, capacity </li>";
            }
            ?>
        </ul>

        <?php
        // 2) Recuperare la capienza totale del cinema considerando tutte le sale a disposizione.
        $totalCapacity = 0;

        foreach ($roomsArray as $room) {
            $totalCapacity += $room->getCapacity();
        }

        echo "<h4>Total capacity: {$totalCapacity}</h4>";
        ?>

        <?php
        // 3) Stabilito un giorno e un film, recuperare quante proiezioni totali di quel film ci saranno.

        // 4) Stabilito un giorno, recupera l’orario di fine dell’ultimo spettacolo.
        // BONUS
        // 5) gestire con logica un’eccezione try/catch in un punto qualsiasi del vostro codice.
        // 6) Stabilito un film, una sala, un’ora di inizio e un numero di proiezioni, calcolare automaticamente gli orari degli spettacoli, considerando che tra uno spettacolo e l’altro devono passare 15 min.
        //Alcuni film durano meno di un'ora, attenzione!
        // 7) Stabilito un giorno, recuperare l’elenco dei film in proiezione con relativi attori, i quali dovranno essere stampati con iniziale del nome e cognome “N. Cognome”.
        //Alcuni attorni non hanno il cognome, attenzione!
        ?>
    </main>
</body>

</html>