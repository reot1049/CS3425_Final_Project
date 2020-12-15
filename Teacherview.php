
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="Teacherview.css" rel="stylesheet">
<link href="base.css" rel="stylesheet">
<title>Teacher View</title>
<head>
</head>
<body>
  <div class="d-flex justify-content-center">
    <h3>Welcome Professor!</h3>
  </div>
  <div class="d-flex justify-content-center">
    <h4>Class SQL101</h4>
  </div>
  <div class="d-flex justify-content-center">
    <a href="CreateExam.php"><button class="btn btn-primary husky-button">Create Exam</button></a>
  </div>
  <div class="d-flex justify-content-center">
    <a href="CreateStudent.php"><button class="btn btn-primary husky-button">Create Student</button></a>
  </div>
  <div class="d-flex justify-content-center">
    <form action="TeacherLogin.php" method="post">

      <?php
      session_start();
      if(isset($_SESSION["loggedin"])){
        echo '<button class="btn btn-primary husky-button" type="submit" name = "logout" value="logout">';
        echo "Logout";
      } else {
        echo '<button class="btn btn-primary husky-button" type="submit" value="login">';
        echo "Login";
      }
      ?>
    </button>
  </form>
</div>
</body>
</html>
