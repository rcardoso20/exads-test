<?php

require_once('TVSeries.php');

$tvSeries = new TVSeries();

echo 'Next air time: ' . PHP_EOL . $tvSeries->getNextAirTime() . PHP_EOL . PHP_EOL;
echo 'Next air time for The Office: ' . PHP_EOL . $tvSeries->getNextAirTime('The Office') . PHP_EOL . PHP_EOL;
echo 'Next air time after 15:00:00: ' . PHP_EOL . $tvSeries->getNextAirTime(date: '23:05:00') . PHP_EOL . PHP_EOL;
echo 'Next air time after 2023-03-15 10:00:00: ' . PHP_EOL . $tvSeries->getNextAirTime(date: '2023-03-15 10:00:00') . PHP_EOL . PHP_EOL;
echo 'Next air time for Squid Game after 16-03-2023: ' . PHP_EOL . $tvSeries->getNextAirTime('Squid Game', '16-03-2023') . PHP_EOL . PHP_EOL;
