<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>
  <div class="d-flex justify-content-center">
    <h3>Exam Results</h3>
  </div>
  <br>
  <?php
  session_start();
  if(!isset($_SESSION["loggedin"])){
    header("LOCATION:StudentLogin.php");
    return;
  }
  try {
    $config = parse_ini_file("db.ini");
    $dbh = new PDO($config['dsn'], $config['username'], $config['password']);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach($dbh->query("SELECT ename, points_received, points_possible from RecordE where sid='".$_SESSION['sid']."'") as $row) {
      echo "<div class='d-flex justify-content-center'>";
      echo "<h4>".$row[0]."</h4>";
      echo "</div>";
      echo "<div class='d-flex justify-content-center'>";
      echo "<h5>Total Score: ".$row[1]." points out of ".$row[2]." points received</h5>";
      echo "</div>";
      foreach($dbh->query("SELECT question_num, points_received, points_possible from RecordQ where sid='".$_SESSION['sid']."' and ename='".$row[0]."'") as $row2) {
        echo "<div class='d-flex justify-content-center'>";
        echo "Question ".$row2[0].": ";
        echo $row2[1]." points out of ".$row2[2]." points received";
        echo "</div>";
      }
      echo "<br>";
    }
  } catch (PDOException $e) {
    print "Error!".$e->getMessage()."<br/>";
    die();
  }

  ?>
<div class="d-flex justify-content-center">
  <a href="StudentView.html"><button class="btn btn-primary husky-button">Return To Menu</button></a>
</div>
</body>
</html>
