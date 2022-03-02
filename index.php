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
