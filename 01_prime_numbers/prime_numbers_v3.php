<?php
$nbrs = range(1, 100);

foreach ($nbrs as $nbr) {
    $multiples = array();
	for ($i = 1; $i <= $nbr; $i++) {
        if ($nbr % $i == 0) {
            $multiples[] = $i;
        }
    }
    echo $nbr . ' [' . (count($multiples) == 2 ? 'PRIME' : implode(',', $multiples)) . ']' . PHP_EOL;
}
