<?php
if(isset($_POST["logout"])) {
  session_destroy();
  echo "user logged out";
  return;
}
?>

<!DOCTYPE>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>
  <div class="d-flex justify-content-center">
    <h2>You have successfully logged out</h2>
  </div>
  <div class="d-flex justify-content-center">
    <a href='StudentLogin.php'><button class="btn btn-primary husky-button">Login</button></a>
  </div>
</body>


</html>
