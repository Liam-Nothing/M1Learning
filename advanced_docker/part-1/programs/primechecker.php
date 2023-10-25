<?php
function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    if ($num <= 3) {
        return true;
    }
    if ($num % 2 == 0 || $num % 3 == 0) {
        return false;
    }
    $i = 5;
    while ($i * $i <= $num) {
        if ($num % $i == 0 || $num % ($i + 2) == 0) {
            return false;
        }
        $i += 6;
    }
    return true;
}

function findClosestPrime($num) {
    if ($num <= 2) {
        return 2;
    }
    while (true) {
        $num--;
        if (isPrime($num)) {
            return $num;
        }
    }
}

if (isset($argv[1])) {
    $input = intval($argv[1]);
    if (isPrime($input)) {
        echo "$input est un nombre premier.\n";
    } else {
        $closestPrime = findClosestPrime($input);
        echo "$input n'est pas un nombre premier. Le nombre premier inférieur le plus proche est $closestPrime.\n";
    }
} else {
    echo "Veuillez fournir un nombre en paramètre.\n";
}
?>
