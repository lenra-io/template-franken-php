<?php
class Flex {
    public $_type = 'flex';
    public $children = [];
    public $direction;
    public $scroll;
    public $spacing;
    public $crossAxisAlignment;
}

class View {
    public $_type = 'view';
    public $name = '';
}

$response = new Flex();

$view = new View();
$view->name = 'lenra.menu';
$response->children[] = $view;
$view = new View();
$view->name = 'lenra.home';
$response->children[] = $view;

$response->direction = 'vertical';
$response->scroll = true;
$response->spacing = 4;
$response->crossAxisAlignment = 'center';

// echo '{"_type":"flex","children":[{"_type":"view","name":"lenra.menu"},{"_type":"view","name":"lenra.home"}],"direction":"vertical","scroll":true,"spacing":4,"crossAxisAlignment":"center"}';

?>