<?php

use Data\Counter;

function handle(ListenerRequest $request) {
    $coll = $request->api->data()->coll(Counter::class);
    $coll->updateMany(["_id" => $request->props->id], ['$inc' => ['count' => 1]])->wait();
}
