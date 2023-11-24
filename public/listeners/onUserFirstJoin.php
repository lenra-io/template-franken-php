<?php

use Data\Counter;
use Lenra\App\Collection;

$user = "@me";
/**
 * @var Collection
 */
$counterColl = $request->api->data()->coll(Counter::class);
$counters = $counterColl->find([ "user" => $user ])->wait();

if (count($counters) == 0) {
    $counterColl->createDoc(new Counter($user, 0))->wait();
}
?>