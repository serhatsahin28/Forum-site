
<?php
include "db.php";
if (isset($_POST['submit'])) {
    if ($_POST['text'] != "" && $_POST['text'] != null) {
        $message = $_POST['text'];
        $session_id = $_GET['session_id'];
        $user_id = $_GET['user_id'];

        $mesaj = mesaj($session_id, $user_id, $message);
        $response = array(
            'success' => true,
            'message' => $text,
            // Diğer gerekli veriler
        );
        echo json_encode($response);
    }
}

?>