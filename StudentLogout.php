<?php
if(isset($_POST["logout"])) {
  session_destroy();
  echo "user logged out";
  return;
}
?>

<!DOCTYPE>
<html>
  <head>
  </head>
  <body>
    <h2>You have successfully logged out</h2>
    <a href='StudentLogin.php'><button>Login</button></a>
  </body>


</html>
