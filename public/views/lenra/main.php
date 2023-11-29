<?php

use Lenra\App\Components\Flex;
use Lenra\App\Components\View;

$response = Flex::builder([
  View::builder("lenra.menu"),
  View::builder("lenra.home")
])
  ->direction("vertical")
  ->scroll(true)
  ->spacing(4)
  ->crossAxisAlignment("center");
