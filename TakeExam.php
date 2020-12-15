<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>

  <?php
  try {
    $config = parse_ini_file("db.ini");
    $dbh = new PDO($config['dsn'], $config['username'], $config['password']);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>".$_POST["ExamName"]."</h2>";
    echo "<form method='post' action='CheckExam.php'>";
    foreach($dbh->query("SELECT question_num, num_choices, points, question_text, answer FROM Question WHERE ename='".$_POST["ExamName"]."'") as $row) {
      echo "<div class='form-group'>";
      echo "<label>Question".$row[0].": ".$row[3]." (".$row[2]." points)</label>";
      foreach($dbh->query("SELECT ans_num, choice_text FROM Answer WHERE ename='".$_POST["ExamName"]."' and question_num='".$row[0]."'") as $row1) {
        echo "<div class='form-check'>";
        echo "<input type='radio' class='form-check-input' name='question".$row[0]."choice' value=".$row1[0].">";
        echo "<label class='form-check-label' for='question".$row[0]."choice'>";
        echo "Answer ".$row1[0].": ".$row1[1];
        echo "</label>";
        echo "</div>";
      }
      echo "<input type='hidden' name='question".$row[0]."answer' value=".$row[4].">";
      echo "<input type='hidden' name='question".$row[0]."points' value=".$row[2].">";
      echo "</div>";
    }
    echo "<input type='hidden' name='ExamName' value=".$_POST["ExamName"].">";
    echo "<input type='hidden' name='num_questions' value=".$_POST["num_questions"].">";
    echo "<input type='hidden' name='total_points' value=".$_POST["total_points"].">";
    echo "<div class='form-group'>";
    echo "<button type='submit' class='btn btn-primary husky-button'>Submit</button>";
    echo "</div>";
    echo "</form>";
  } catch (PDOException $e) {
    print "Error!".$e.getMessage()."<br/>";
    die();
  }

  ?>
</body>
</html>
