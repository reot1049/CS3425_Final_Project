<?php
  try {
    $config = parse_ini_file("db.ini");
    $dbh = new PDO($config['dsn'], $config['username'], $config['password']);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach($dbh->query("SELECT ename from Exam") as $row) {
      echo "<form method='post' action='TakeExam.php'>";
      echo "<input type=submit value='".$row[0]."' name='ExamName'></br>";
      //echo "<input type='hidden' value=".$row[0]." name='ExamName'>";
      echo "</form>";
    }
  } catch (PDOException $e) {
    print "Error!".$e->getMessage()."<br/>";
    die();
  }

 ?>
