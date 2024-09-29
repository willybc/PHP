<?php

require_once './Controllers/GmailController.php';
require_once './vendor/autoload.php';
require_once './Models/GmailModel.php';

$controller = new GmailController();

if (isset($_GET['action']) && $_GET['action'] === 'oauth2callback') {
    $controller->oauth2callback();
} else {
    $controller->index();
}