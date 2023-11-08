<?php
$counter = $request->data[0];
$response = [
    "value" => 1,
    "onIncrement" => [
        "type" => "listener",
        "name" => "increment",
        "props" => [
            "id" => $counter->count,
        ],
    ]
];
?>