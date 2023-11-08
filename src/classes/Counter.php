<?php
require_once 'Data.php';

class Counter extends Data {
    public function __construct(public $user: string = NULL, public $count: int = NULL) {}
}
?>