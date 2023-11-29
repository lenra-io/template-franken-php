<?php

use Lenra\App\Components\Listener;


function handle(ViewRequest $request) {
    $counter = $request->data[0];

    return [
        "value" => $counter->count,
        "onIncrement" => Listener::builder("increment")
            ->props([
                "id" => $counter->_id,
            ]),
    ];
}
