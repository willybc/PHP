<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Gmail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <div class="wrapper">
        <nav class="navbar navbar-dark" style="height: 6vh; background-color: #143558;">
            <div class="container">
                <a class="navbar-brand" style="color: white;">Gmail API</a>
                <button class="btn" id="cartButton" style="background-color: #143558; border-color: #143558; color: white;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </div>
        </nav>

        <div class="content-page" style="background-color: #fafbfe">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <h4 class="page-title">Imbox</h4>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                <div class="page-aside-left">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#compose-modal">Compose</button>
                                        </div>

                                        <div class="email-menu-list mt-3">
                                            <a href="javascript: void(0);" class="text-danger fw-bold"><i class="fas fa-inbox me-2"></i>Bandeja de entrada<span class="badge badge-danger-lighten float-end ms-2">7</span></a>
                                            <a href="javascript: void(0);"><i class="fas fa-star me-2"></i>Destacados</a>
                                            <a href="javascript: void(0);"><i class="fas fa-clock me-2"></i>Pospuestos</a>
                                            <a href="javascript: void(0);"><i class="fas fa-file-alt me-2"></i>Borradores<span class="badge badge-info-lighten float-end ms-2">32</span></a>
                                            <a href="javascript: void(0);"><i class="fas fa-paper-plane me-2"></i>Enviados</a>
                                            <a href="javascript: void(0);"><i class="fas fa-trash-alt me-2"></i>Papelera</a>
                                            <a href="javascript: void(0);"><i class="fas fa-tag me-2"></i>Importante</a>
                                            <a href="javascript: void(0);"><i class="fas fa-exclamation-triangle me-2"></i>Spam</a>
                                        </div>

                                    </div>

                                    <div class="page-aside-right">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-box-archive font-16"></i></button>
                                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-circle-exclamation font-16"></i></button>
                                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-trash font-16"></i></button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-folder font-16"></i>
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-header">Move to:</span>
                                                <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-tag font-16"></i>
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-header">Label as:</span>
                                                <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                            </div>
                                        </div>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal font-16"></i> More
                                                <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <span class="dropdown-header">More Options :</span>
                                                <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <ul class="email-list">
                                                <li class="unread">
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail1">
                                                                <label class="form-check-label" for="mail1"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star text-warning"></span>
                                                        <a href="javascript: void(0);" class="email-title">Lucas Kriebel (via Twitter)</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Lucas Kriebel (@LucasKriebel) has sent
                                                            you a direct message on Twitter! &nbsp;–&nbsp;
                                                            <span>@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                                        </a>
                                                        <div class="email-date">11:49 am</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="fas fa-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="fas fa-trash email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="fas fa-envelope-open email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="fas fa-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail2">
                                                                <label class="form-check-label" for="mail2"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star"></span>
                                                        <a href="javascript: void(0);" class="email-title">Randy, me (5)</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Last pic over my village &nbsp;–&nbsp;
                                                            <span>Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                        </a>
                                                        <div class="email-date">5:01 am</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail3">
                                                                <label class="form-check-label" for="mail3"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star text-warning"></span>
                                                        <a href="javascript: void(0);" class="email-title">Andrew Zimmer</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Mochila Beta: Subscription Confirmed
                                                            &nbsp;–&nbsp; <span>You've been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span>
                                                        </a>
                                                        <div class="email-date">Mar 8</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="unread">
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail4">
                                                                <label class="form-check-label" for="mail4"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star"></span>
                                                        <a href="javascript: void(0);" class="email-title">Infinity HR</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Sveriges Hetaste sommarjobb &nbsp;–&nbsp;
                                                            <span>Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter iSverige.</span>
                                                        </a>
                                                        <div class="email-date">Mar 8</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-open email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail5">
                                                                <label class="form-check-label" for="mail5"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star"></span>
                                                        <a href="javascript: void(0);" class="email-title">Web Support Dennis</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Re: New mail settings &nbsp;–&nbsp;
                                                            <span>Will you answer him asap?</span>
                                                        </a>
                                                        <div class="email-date">Mar 7</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail6">
                                                                <label class="form-check-label" for="mail6"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star text-warning"></span>
                                                        <a href="javascript: void(0);" class="email-title">me, Peter (2)</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Off on Thursday &nbsp;–&nbsp;
                                                            <span>Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span>
                                                        </a>
                                                        <div class="email-date">Mar 4</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail19">
                                                                <label class="form-check-label" for="mail19"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star"></span>
                                                        <a href="javascript: void(0);" class="email-title">me, Susanna (7)</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Since you asked... and i'm
                                                            inconceivably bored at the train station &nbsp;–&nbsp;
                                                            <span>Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                        </a>
                                                        <div class="email-date">Jan 25</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="email-sender-info">
                                                        <div class="checkbox-wrapper-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="mail20">
                                                                <label class="form-check-label" for="mail20"></label>
                                                            </div>
                                                        </div>
                                                        <span class="fa-regular fa-star"></span>
                                                        <a href="javascript: void(0);" class="email-title">Randy, me (5)</a>
                                                    </div>
                                                    <div class="email-content">
                                                        <a href="javascript: void(0);" class="email-subject">Last pic over my village &nbsp;–&nbsp;
                                                            <span>Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                        </a>
                                                        <div class="email-date">Jan 22</div>
                                                    </div>
                                                    <div class="email-action-icons">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-email-mark-as-unread email-action-icons-item"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript: void(0);"><i class="mdi mdi-clock email-action-icons-item"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="row">
                                            <div class="col-7 mt-1">
                                                Showing 1 - 10 of 100
                                            </div>
                                            <div class="col-5">
                                                <div class="btn-group btn-group-page float-end">
                                                    <button type="button" class="btn btn-light btn-sm"><i class="fa-solid fa-chevron-left"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    /*
                    $index = 0;
                    if (empty($results)): ?>
                        <p>No se encontraron mensajes.</p>
                    <?php else: ?>
                        <p>Se encontraron <?php echo count($results); ?> mensajes.</p>
                        <?php foreach ($results as $result): ?>
                            <?php
                            $emailId = $result->getId();
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
                                            <?php echo $emailId ;?>
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
                    <?php endif; */?>
                </div>
            </div>
        </div>
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