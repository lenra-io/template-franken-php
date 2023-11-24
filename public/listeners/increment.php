<?php

use Data\Counter;
use Lenra\App\Collection;

/**
 * @var Collection
 */
$coll = $request->api->data()->coll(Counter::class);

$coll->updateMany(["_id" => $request->props->id], ['$inc' => ['count' => 1]])->wait();
