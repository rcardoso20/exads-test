<?php
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
    $multiples = getMultiples($number);
    $data = count($multiples) == 2 ? 'PRIME' : implode(',', $multiples);
    echo "$number [$data]" . PHP_EOL;
}
