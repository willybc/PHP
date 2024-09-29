<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Gmail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <h1>Mensajes de Gmail</h1>
        <?php
        $index = 0;
        if (empty($emails)): ?>
            <p>No se encontraron mensajes.</p>
        <?php else: ?>
            <p>Se encontraron <?php echo count($emails); ?> mensajes.</p>
            <?php foreach ($emails as $email): ?>
                <?php
                $emailId = $email->getId();
                ?>
                <div class="card mt-4">
                    <div class="card-header" id="heading<?php echo $index; ?>">
                        <h5 class="mb-0">
                            <button
                                class="btn btn-link"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $index; ?>"
                                aria-expanded="false"
                                aria-controls="collapse<?php echo $index; ?>"
                                data-email-id="<?php echo $emailId; ?>"
                                onclick="loadEmailDetails(this)"> 
                                Email ID: <?php echo $emailId; ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?php echo $index; ?>" class="collapse" aria-labelledby="heading<?php echo $index; ?>" data-parent="#emailAccordion">
                        <div class="card-body">

                        </div>
                    </div>
                </div>

            <?php
                $index++;
            endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
        function loadEmailDetails(button) {
            var emailId = button.getAttribute('data-email-id');
            var collapseDiv = button.getAttribute('data-bs-target');

            // Verifica si ya se han cargado los detalles
            if (!button.classList.contains('loaded')) {
                fetch(`?action=getEmailDetails&id=${emailId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Inserta los datos en el div de colapso
                        document.querySelector(collapseDiv + ' .card-body').innerHTML = `
                    <strong>Snippet:</strong> ${data.snippet}<br>
                    <strong>Fecha y hora de envío:</strong> ${data.dateTime}<br>
                `;
                        button.classList.add('loaded'); // Marca que ya se cargaron los detalles
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>