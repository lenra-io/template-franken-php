<?php
use Data\Counter;
use Lenra\App\Collection;

$user = "global";
/**
 * @var Collection
 */
$counterColl = $request->api->data()->coll(Counter::class);
$counters = $counterColl->find([ "user" => $user ], [])->wait();

error_log("onEnvStart.php - " . count($counters) . " counters found for user $user");

if (count($counters) == 0) {
    $counterColl->createDoc(new Counter($user, 0))->wait();
}
?>