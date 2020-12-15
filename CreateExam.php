<!DOCTYPE html>
<html>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="CreateExam.css" rel="stylesheet">

  <head>
  </head>
  <body>
    <div id="createExam">
      <form method="post" action="CreateExamQuestions.php" id="question_num">
          <label for="question_num">How many questions are there?</label><br>
          <input type="number" id="question_num" min="1" max="9999" name="question_num"><br>
          <input type="submit" value="submit">
      </form>
    </div>
  </body>
</html>
