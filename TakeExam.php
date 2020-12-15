<?php
try {
  $config = parse_ini_file("db.ini");
  $dbh = new PDO($config['dsn'], $config['username'], $config['password']);

  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "<h2>".$_POST["ExamName"]."</h2>";
  echo "<form method='post' action='CheckExam.php'>";
  foreach($dbh->query("SELECT question_num, num_choices, points, question_text FROM Question WHERE ename='".$_POST["ExamName"]."'") as $row) {
      echo "<p>Question".$row[0].": ".$row[3]." (".$row[2]." points)</p>";
      foreach($dbh->query("SELECT ans_num, choice_text FROM Answer WHERE ename='".$_POST["ExamName"]."' and question_num='".$row[0]."'") as $row1) {
        echo "<input type='radio' name='question".$row[0]."' value='question".$row[0]."answer".$row1[0]."'>Answer ".$row1[0].": ".$row1[1]."</br>";
      }
  }
  echo "</form>";
} catch (PDOException $e) {
  print "Error!".$e.getMessage()."<br/>";
  die();
}

?>
