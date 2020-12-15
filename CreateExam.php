<?php
  session_start();
  if(!$_SESSION["loggedin"]){
    header("LOCATION:TeacherLogin.php");
    return;
  }
?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="CreateExam.css" rel="stylesheet">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>
  <div class="d-flex justify-content-center">
    <form method="post" action="CreateExamQuestions.php">
      <div class="form-group">
        <label for="ename">Exam Name</label><br>
        <input type="text" class="form-control" name="ename">
      </div>
      <div class="form-group">
        <label for="question_num">How many questions are there?</label><br>
        <input type="number" class="form-control" min="1" max="9999" name="question_num">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary husky-button">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
