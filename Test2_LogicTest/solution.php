<?php

function transformedArray(array $inputArray): array
{
    $arrayLength = count($inputArray);
    $zeros       = [];
    $resultArray = [];

    for ($i = 0; $i < $arrayLength; $i++) {
        if ($inputArray[$i] != 0) {
            $resultArray[] = $inputArray[$i];
        } else {
            $zeros[] = $inputArray[$i];
        }
    }

    if (!empty($zeros)) {
        $zerosCnt = count($zeros);
        $position = ceil($zerosCnt / 2);

        $resultArray = array_merge(array_slice($zeros,0, $position), $resultArray);
        $resultArray = array_merge($resultArray, array_slice($zeros,$position));
    }

    return $resultArray;
}
