<?php
include 'db.php';
include 'header.php';
include 'tablesDB/friendlist.php';


?>



<link rel="stylesheet" href="css/friends.css">

<div class="container">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1>Arkadaşlarım</h1>
            </div>
            <?php
            $counter = 0; // Kart sayacı
            foreach ($query2 as $q) {
                if ($counter % 3 == 0) {
                    echo '</div><div class="row">'; // Satırın sonuna gelindiğinde yeni bir satıra geçiş
                }

                if($q['status']==1)
                {
                echo '
            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span style="background-image: url(img/' . ($_SESSION['name'] != $q['receiver_name'] ? $q['receiverimg'] : $q['senderimg']) . ')" class="avatar avatar-xl mr-3"></span>
                            <div class="media-body overflow-hidden">
                                <h5 class="card-text mb-0">' .  ($_SESSION['name'] != $q['receiver_name'] ? $q['receiver_name'] : $q['sender_name']) . '</h5>
                                <p class="card-text text-uppercase "> <a class="nav-link active" aria-current="page" href="chat.php?session_id=' . $session_query3['id'] . '&user_id=' . ($_SESSION['name'] != $q['receiver_name'] ? $q['receiverid'] : $q['senderid']) . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg></a></p>
                                <p class="card-text">
                                    <br><abbr title="date">' . $q['date'] . '</abbr>
                                </p>
                              
                              



                           
                           
                            <a href="user.php?user_id=' . ($_SESSION['name'] != $q['receiver_name'] ? $q['receiverid'] : $q['senderid']) . '" class="col">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        </a>
                        


                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                $counter++;
            }
        }
            //<a href="user.php?user_id=' . ($_SESSION['name'] != $q['receiver_name'] ? $q['receiverid'] : $q['senderid']) . '" class="tile-link"></a>
            ?>
        </div>
    </div>


</div>
</div>