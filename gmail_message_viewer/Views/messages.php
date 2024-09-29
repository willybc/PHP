<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Gmail</title>
</head>
<body>
    <h1>Mensajes de Gmail</h1>

    <?php if (empty($messages)): ?>
        <p>No se encontraron mensajes.</p>
    <?php else: ?>
        <p>Se encontraron <?php echo count($messages->getMessages()); ?> mensajes.</p>
        <?php foreach ($messages->getMessages() as $message): ?>
            <?php 
            $messageId = $message->getId();
            $details = $message->showMessage($messageId);
            $snippet = $details->getSnippet();
            $internalDate = $details->getInternalDate();
            $dateTime = date('Y-m-d H:i:s', $internalDate / 1000);
            ?>
            <p>
                <strong>Mensaje ID:</strong> <?php echo $messageId; ?><br>
                <strong>Fecha y hora de envío:</strong> <?php echo $dateTime; ?><br>
                <strong>Resumen:</strong> <?php echo $snippet; ?><br>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
