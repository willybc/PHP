<?php

class GmailModel {
    private $client;
    private $service;

    const CREDENTIALS_PATH = __DIR__ . '/../config/credentials.json';
    const REDIRECT_URI = __DIR__ . '/../index.php?action=oauth2callback';

    public function __construct() {
        // Inicializar cliente de Google
        $this->client = new Google_Client();
        $this->configureClient();

        if ($this -> isAccessTokenSet()) {
            $this -> initializeService();
        }
    }

    private function configureClient() {
        $this->client->setAuthConfig(self::CREDENTIALS_PATH);
        $this->client->setRedirectUri(self::REDIRECT_URI);
        $this->client->addScope(Google_Service_Gmail::GMAIL_READONLY);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
    }

    private function isAccessTokenSet() {
        return isset($_SESSION['access_token']) && $_SESSION['access_token'];
    }

    private function initializeService() {
        $this->client->setAccessToken($_SESSION['access_token']);

        if ($this->client->isAccessTokenExpired()) {
            $this->refreshAccessToken();
        }

        $this->service = new Google_Service_Gmail($this->client);
    }

    private function refreshAccessToken() {
        $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
        $_SESSION['access_token'] = $this->client->getAccessToken();
    }

    public function fetchAccessToken($authCode) {
        return $this->client->fetchAccessTokenWithAuthCode($authCode);
    }

    public function getMessages() {
        if ($this->service) {
            $today = date('Y/m/d');
            $query = "after:$today";
            $optParams = ['q' => $query];
            return $this->service->users_messages->listUsersMessages('me', $optParams);
        }
        return null;
    }

    public function getMessageDetails($messageId) {
        if ($this->service) {
            return $this->service->users_messages->get('me', $messageId);
        }
        return null;
    }

    public function isAuthenticated() {
        return $this->client->getAccessToken();
    }

    public function getAuthUrl() {
        return $this->client->createAuthUrl();
    }
}
