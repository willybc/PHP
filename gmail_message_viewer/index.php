<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

// Parámetros de configuración
$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('http://localhost/oauth2callback.php');
$client->addScope(Google_Service_Gmail::GMAIL_READONLY);
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

// Si tenemos un token en sesión, lo usamos
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    
    // Verificar si el token ha expirado
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    // Conectar con Gmail API
    $service = new Google_Service_Gmail($client);

    // Obtener los mensajes de la bandeja de entrada
    //$results = $service->users_messages->listUsersMessages('me', ['maxResults' => 10]);

    $today = date('Y/m/d');
    $query = "after:$today";
    $optParams = ['q' => $query];
    $results = $service->users_messages->listUsersMessages('me', $optParams);
    
    /* echo '<pre>';
    print_r($results);
    echo '</pre>'; */

    echo "<h1>Mensajes de Gmail</h1>";

    if (empty($results)) {
        echo "No se encontraron mensajes.";
    } else {
        echo "Se encontraron " . count($results) . " mensajes.<br><br>";
        echo "Fecha: $today <br><br>";

        foreach ($results as $result) {
            $messageId = $result->getId();
            $threadId = $result->getThreadId();
            
            // Obtener el contenido del mensaje usando el ID
            $messageDetail = $service->users_messages->get('me', $messageId);
            $snippet = $messageDetail->getSnippet();

             // Obtener la fecha y hora de envío del mensaje
             $internalDate = $messageDetail->getInternalDate();
             $dateTime = date('Y-m-d H:i:s', $internalDate / 1000); // Convertir de milisegundos a segundos y luego a fecha legible
 
            
            echo "Mensaje ID: $messageId <br>";
            echo "Thread ID: $threadId <br>";
            echo "Fecha y hora de envío: $dateTime <br>";
            echo "Resumen: $snippet <br><br>";
        }
    }

} else {
    // Si no estamos autenticados, redirigir a la autenticación de Google
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}
