<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './Controllers/GmailController.php';
require_once './vendor/autoload.php';
require_once './Models/Gmail.php';
require_once './Models/Service.php';

$controller = new GmailController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'oauth2callback':
            $controller->oauth2callback();
            break;
        case 'getEmailDetails':
            $controller->getEmailDetails();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}