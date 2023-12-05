<?php
namespace App\Data;

class Counter extends \Lenra\App\Data {
    public string $user;
    public int $count;
    public function __construct(string $user = null, int $count = null) {
        $this->user = $user;
        $this->count = $count;
    }
}
?>