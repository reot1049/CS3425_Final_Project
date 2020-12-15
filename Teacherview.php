
<html>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="Teacherview.css" rel="stylesheet">
  <link href="base.css" rel="stylesheet">
  <title>Teacher View</title>
  <head>
  </head>
  <body>
    <div class="MainScreen">
      <h2>Welcome Professor!</h2>
      <h3>Class SQL101</h3>
        <div id="creation">
          <a href="CreateExam.html"><button class="btn btn-primary husky-button">Create Exam</button></a>
          <a href="CreateStudent.php"><button class="btn btn-primary husky-button">Create Student</button></a>
          <br>
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
     </div>
  </body>
</html>
