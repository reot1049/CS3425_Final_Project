<?php
session_start();

if(isset($_POST["student_name"])) {
  if($_POST["student_name"] == "Alice" && $_POST["student_pass"] = "Alice123") {
    $_SESSION["loggedin"] = true;
    echo 'Student name: '.$_POST["student_name"].' password: '.$_POST["student_pass"].' has been created<br>' ;
    echo "<a href='Teacherview.html'><button>Teacher Dashboard</button></a>";
    return;
  } else {
    echo "incorrect username and password";
  }
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
    <form method=post action=CreateStudent.php>
      <div class="form-group">
        <label for="student_name">Student Name</label>
        <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label for="student_pass">Student Password</label>
        <input type="text" class="form-control" name="student_pass" id="student_pass" placeholder="Password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary husky-button">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
