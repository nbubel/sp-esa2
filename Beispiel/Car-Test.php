<?php
require_once 'Car.php';

$bmw = new Car('BMW', 'blau');
$bmw->startEngine();
$bmw->driveForward(500);
$bmw->stopEngine();

echo "Kilometerstand des BMW ist {$bmw->milage} km.\n";
?>