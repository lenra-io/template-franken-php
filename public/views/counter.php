<?php
$counter = $request->data[0];
$response = [
    "value" => $counter->count,
    "onIncrement" => [
        "type" => "listener",
        "name" => "increment",
        "props" => [
            "id" => $counter->_id,
        ],
    ]
];
?>