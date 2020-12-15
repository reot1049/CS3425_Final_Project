<html>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="base.css" rel="stylesheet">
  <head>
  </head>
  <body>
    <div class="d-flex justify-content-center">
      <h3>Available Exams</h3>
    </div>
    <?php
      try {
        $config = parse_ini_file("db.ini");
        $dbh = new PDO($config['dsn'], $config['username'], $config['password']);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach($dbh->query("SELECT ename, num_questions, total_points from Exam") as $row) {
          echo "<div class='d-flex justify-content-center'>";
          echo "<form method='post' action='TakeExam.php'>";
          echo "<input type=submit class='btn btn-primary husky-button' value='".$row[0]."' name='ExamName'>";
          echo "<input type='hidden' name='num_questions' value=".$row[1].">";
          echo "<input type='hidden' name='total_points' value=".$row[2].">";
          //echo "<input type='hidden' value=".$row[0]." name='ExamName'>";
          echo "</form>";
          echo "</div>";
        }
      } catch (PDOException $e) {
        print "Error!".$e->getMessage()."<br/>";
        die();
      }

     ?>
     </div>
  </body>
</html>
