<?php
function isPrimeNumber($number) {
    if ($number == 1) {
        return false;
    }

	for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function getMultiples($number) {
	$multiples = array();

	for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            array_push($multiples, $i);
        }
    }

	return $multiples;
}

$numbers = range(1, 100);

foreach ($numbers as $number) {
    if (isPrimeNumber($number)) {
        $data = 'PRIME';
    } else {
        $multiples = getMultiples($number);
        $data = implode(',', $multiples);
    }
    echo "$number [$data]" . PHP_EOL;
}
