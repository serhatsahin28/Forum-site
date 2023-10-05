<link rel="stylesheet" href="css/chat.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
ob_start(); // Çıktı tamponlamayı başlat
include "db.php";

include 'tablesDB/Messages.php';
include 'tablesDB/bildirim_mesaj.php';


$sender_id = $_GET['session_id']; //Oturumu açık olan Id
$receiver_id = $_GET['user_id']; //Mesajı alan Kullanıcı Id








if (isset($_POST['Geri'])) {

    header("Location:index.php");
}



?>
<form method="POST" action="" id="Geri">
    <input type="submit" class="Geri" name="Geri" value="Geri" />
</form>



<div id="chat-container" class="chat-container">

    <ul id="chat2"> <?php

                    include "get_messages.php";
                    $user_id = $_GET['user_id'];

                    ?>


    </ul>
    <form method="POST" action="" id="myForm">
        <input type="text" name="text" id="text" class="text_input" placeholder="Message..." />
        <input type="submit" id="submit" class="submit" name="submit" value="Submit" />
    </form>
</div>



<?php

?>


<script>

    
    $(document).ready(function() {

        // Sayfa yüklendiğinde ve güncellendiğinde en altında kalmayı sağlayan fonksiyon
        function keepScrollBarDown() {
            var chatContainer = document.getElementById("chat-container");
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Sayfa yüklendiğinde hemen en alta kaydır
        keepScrollBarDown();




        var session_name = <?php echo json_encode($_SESSION['name']); ?>;
        var user_id = <?php echo json_encode($_GET['user_id']); ?>;
        var session_id = <?php echo json_encode($_GET['session_id']); ?>;



        function updateMessages() {
            $.ajax({
                type: 'POST',
                url: 'get_messages.php',
                data: {
                    user_id: user_id,
                    session_name: session_name,
                },
                success: function(response) {
                    if ($('#chat2').html() !== response) {
                        $('#chat2').html(response);
                        keepScrollBarDown();
                    }
                }
            });
        }












        setInterval(updateMessages, 100);

        $("#submit").on("click", function(event) { // buton id'li elemana tıklandığında
            event.preventDefault(); // Sayfa yenilemesini önlemek için

            var text = $("#text").val(); // Input alanındaki metni al

            function sendMessages() {
                $.ajax({
                    type: 'POST',
                    url: 'sent_messages.php',
                    data: {
                        user_id: user_id,
                        session_name: session_name,
                        session_id: session_id,
                        text: text,
                    },
                    success: function(response) {
                        if ($('#chat2').html() !== response) {
                            $('#chat2').html(response);
                        }

                    }
                });
            }

            sendMessages();
            var text = $("#text").val(""); // Input alanındaki metni al
            keepScrollBarDown();


        });

function checkReadStatus() {
    $.ajax({
        type: 'POST',
        url: 'is_read.php',
        data: {
            user_id: user_id,
            session_id: session_id,
        },
       
    });
}

// İlk çalıştırma
checkReadStatus();

// Belirli aralıklarla tekrar kontrol etmek için setInterval kullanabilirsiniz
setInterval(checkReadStatus, 1000);



    });
</script>