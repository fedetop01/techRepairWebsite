<?php
    include("db_connection.php");
    session_start();
    $answer = $_REQUEST["answer"];
    $answer_string = pg_escape_string($db,$answer);
    $email_reset_password = $_SESSION["email_change_password"];
    $request = "SELECT answer FROM users WHERE email='$email_reset_password'; ";
    $elem = pg_query($db,$request);
    $row = pg_fetch_row($elem);
    if(!$row || $row[0]!=$answer_string){
        echo "non corretto";
    }

?>
