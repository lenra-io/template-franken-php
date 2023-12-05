<?php

namespace App\Listener;

use App\Data\Counter;
use Lenra\App\Listener\Handler;
use Lenra\App\Listener\Request;

class Increment extends Handler {
    function handle(Request $request) {
        $coll = $request->api->data()->coll(Counter::class);
        $coll->updateMany(["_id" => $request->props->id], ['$inc' => ['count' => 1]])->wait();
    }
}
