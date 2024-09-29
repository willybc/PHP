<?php

class GmailController {
    private $gmailModel;

    public function __construct() {
        session_start();
        $this->gmailModel = new GmailModel();
    }

    public function index() {
        if ($this->gmailModel->isAuthenticated()) {
            $this -> renderMessages();
        } else {
            $this -> redirectToAuth();
        }
    }

    public function showMessage($messageId) {
        return $this->gmailModel->getMessageDetails($messageId);
    }

    public function oauth2callback() {
        if (!isset($_GET['code'])) {
            $this -> redirectToAuth();
        } else {
            $this -> handleOAuth2Callback($_GET['code']);
        }
    }

    private function renderMessages() {
        
        require $_SERVER["DOCUMENT_ROOT"] . '/Views/messages.php';
    }

    private function redirectToAuth() {
        $authUrl = $this->gmailModel->getAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        exit;
    }

    private function handleOAuth2Callback($code) {
        $token = $this->gmailModel->fetchAccessToken($code);
        $_SESSION['access_token'] = $token;

        header('Location: index.php');
        exit;
    }

}
