<?php

include_once "controllers/HomeController.php";
include_once "controllers/SettingsController.php";

/* gets the name of the action */
if (isset($_GET['action'])) {
    $url = $_GET['action'];
} else {
    $url = "";
}

// choose the right path
switch ($url) {
    case '' :
        $controller = new HomeController();
        $controller->index();
        break;
    case 'home' :
        $controller = new HomeController();
        $controller->index();
        break;
    case 'settings' :
        $controller = new SettingsController();
        $controller->index();
        break;
    default:
        require 'views/404.php';
        break;
}

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    require_once 'views/base/footer.php';
}