<?php

namespace App\View;

use Lenra\App\Components\Listener;
use Lenra\App\View\Renderer;
use Lenra\App\View\Request;

class Counter extends Renderer {
    function render(Request $request) {
        $counter = $request->data[0];
        return [
            "value" => $counter->count,
            "onIncrement" => Listener::builder("increment")
                ->props([
                    "id" => $counter->_id,
                ]),
        ];
    }
}
