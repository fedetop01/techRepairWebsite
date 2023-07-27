<?php
    include("db_connection.php");
    session_start();
    $email = $_REQUEST["email"];
    $email_reset_password = pg_escape_string($db,$email);
    $request = "SELECT email,question_number,textQ FROM users,question WHERE email='$email_reset_password' and numberQ=question_number; ";
    $elem = pg_query($db,$request);
    $row = pg_fetch_row($elem);
    if(!$row || $row[0]!=$email_reset_password){
        echo "non verificato";
    }else{
        $_SESSION["email_change_password"] = $email_reset_password;
        echo $row[2];
    }

?>
