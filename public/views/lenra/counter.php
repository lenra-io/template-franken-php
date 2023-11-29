<?php

use Lenra\App\Components\Flex;
use Lenra\App\Components\Text;
use Lenra\App\Components\Button;
use Lenra\App\Components\Listener;

$text = $request->props->text;
$counter = $request->data[0];

$response = Flex::builder([
  Text::builder("$text: $counter->count"),
  Button::builder("+")
    ->onPressed(Listener::builder("increment")->props([
      "id" => $counter->_id
    ]))
])
  ->spacing(16)
  ->mainAxisAlignment("spaceEvenly")
  ->crossAxisAlignment("center");
