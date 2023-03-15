<?php
function generateRandomListFromRange($range) {
    shuffle($range);
    return $range;
}

function removeRandomItemsFromList(&$list, $items = 1) {
    shuffle($list);
    for ($i = 0; $i < $items; $i++) {
        array_pop($list);
    }
    return $list;
}

function getMissingCharacters($array1, $array2) {
    $map = $missingCharacters = array();
    foreach ($array1 as $val) {
        $map[$val] = 1;
    }
    foreach ($array2 as $val) {
        unset($map[$val]);
    }
    foreach ($map as $key => $val) {
        $missingCharacters[] = $key;
    }

    return $missing_characters;
}

$sourceList = range(',', '|');
$targetList = generateRandomListFromRange($sourceList);
removeRandomItemsFromList($targetList);

$missingCharacters = getMissingCharacters($sourceList, $targetList);

echo "Missing characters: [".implode(',', $missingCharacters)."]" . PHP_EOL;
