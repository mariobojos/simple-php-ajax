<?php

$list = [
    '0' => [
        'name' => 'Meira Sofia',
        'age' => 11,
        'gender' => 'F'
    ],
    '1' => [
        'name' => 'Ena Margarita',
        'age' => 22,
        'gender' => 'F'
    ],
    '2' => [
        'name' => 'Pacific Maize',
        'age' => 33,
        'gender' => 'M'
    ],
    '3' => [
        'name' => 'Nuevo Monty',
        'age' => 44,
        'gender' => 'M'
    ],
];

if (isset($_POST['index']) && (int)$_POST['index'] >= 0 && (int)$_POST['index'] <= count($list)-1) {
    echo json_encode($list[(int)$_POST['index']]); // return a single row
} else {
    echo json_encode($list); // return all
}

