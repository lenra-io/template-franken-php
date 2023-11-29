<?php

use Lenra\App\Components\Listener;

$counter = $request->data[0];


$response = [
    "value" => $counter->count,
    "onIncrement" => Listener::builder("increment")
        ->props([
            "id" => $counter->_id,
        ]),
];
