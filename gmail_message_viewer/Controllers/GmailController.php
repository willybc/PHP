<?php

class GmailController {
    private $gmailModel;
    private $serviceModel;

    public function __construct() {
        session_start();
        $this->serviceModel = new ServiceModel();
        $this->gmailModel = new GmailModel($this->serviceModel);
    }

    public function index() {
        if ($this->serviceModel->isAuthenticated()) {
            $this -> renderMessagesIds();
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

    private function renderMessagesIds() {
        //$results = $this-> gmailModel->getMessages();
        require $_SERVER["DOCUMENT_ROOT"] . '/Views/home.php';
    }

    private function redirectToAuth() {
        $authUrl = $this->serviceModel->getAuthUrl();
        header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        exit;
    }

    private function handleOAuth2Callback($code) {
        $token = $this->serviceModel->fetchAccessToken($code);
        $_SESSION['access_token'] = $token;

        header('Location: index.php');
        exit;
    }

    public function getEmailDetails() {
        if (isset($_GET['id'])) {
            $messageId = $_GET['id'];
            $emailDetails = $this->gmailModel->getMessageDetails($messageId);

            // Devuelve los detalles en formato JSON
            header('Content-Type: application/json');
            echo json_encode([
                'snippet' => $emailDetails->getSnippet(),
                'dateTime' => date('Y-m-d H:i:s', $emailDetails->getInternalDate() / 1000)
            ]);
            exit;
        } else {
            // Manejo de error si no se proporciona un ID
            http_response_code(400);
            echo json_encode(['error' => 'ID de mensaje no proporcionado.']);
            exit;
        }
    }

}
