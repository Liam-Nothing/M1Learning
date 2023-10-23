<?php
require 'vendor/autoload.php';
use AnthonyMartin\GeoLocation\GeoPoint;

function haversineDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Rayon de la Terre en kilomètres

    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    $latDiff = $lat2 - $lat1;
    $lonDiff = $lon2 - $lon1;

    $a = sin($latDiff / 2) * sin($latDiff / 2) + cos($lat1) * cos($lat2) * sin($lonDiff / 2) * sin($lonDiff / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;
    return $distance;
}

if ($argc < 5) {
    echo "Usage: php haversine.php <latitude1> <longitude1> <latitude2> <longitude2>\n";
    exit(1);
}

$lat1 = floatval($argv[1]);
$lon1 = floatval($argv[2]);
$lat2 = floatval($argv[3]);
$lon2 = floatval($argv[4]);

$distance = haversineDistance($lat1, $lon1, $lat2, $lon2);
echo "La distance calculée avec la méthode mathématique haversine est d'environ " . number_format($distance, 2) . " kilomètres.\n";


$geopointA = new GeoPoint($lat1, $lon1);
$geopointB = new GeoPoint($lat2, $lon2);
$totalDistance = $geopointA->distanceTo($geopointB, 'km');

echo "Distance calculée avec la librairie Geopoint : " . number_format(json_encode($totalDistance), 2) . " kilomètres.\n";
