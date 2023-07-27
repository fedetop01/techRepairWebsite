<?php
  include("db_connection.php");
?>
<?php
    session_start();
    $password = $_REQUEST["password"];
    $password_string = pg_escape_string($db,$password);
    $email_reset_password = $_SESSION["email_change_password"];
    $request_1 = "SELECT password FROM users WHERE email = '$email_reset_password';";
    $elem_1 = pg_query($db,$request_1);
    $row = pg_fetch_row($elem_1);
    if($password_string == null){
      echo 'nullo';
    }
    else if(password_verify($password_string, $row[0])){
      echo 'uguale';
    }
    else{
      $password_string = password_hash($password_string, PASSWORD_DEFAULT);
      $request = "UPDATE users SET password='$password_string' WHERE email='$email_reset_password'; ";
      $elem = pg_query($db,$request);
      if(!$elem){
          echo 'fallita';
        }
        else{
          echo "corretto";
    }
}
?>
