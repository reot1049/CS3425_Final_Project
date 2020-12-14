<?php
session_start();

if(isset($_POST["student_name"])) {
  if($_POST["student_name"] == "Alice" && $_POST["student_pass"] = "Alice123") {
    $_SESSION["loggedin"] = true;
    echo "You are logged in now!";
    return;
  } else {
    echo "incorrect username and password";
  }
}
?>
