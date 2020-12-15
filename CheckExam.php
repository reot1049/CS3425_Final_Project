<?php
try{
	session_start();

	$config = parse_ini_file("db.ini");
	$dbh = new PDO($config['dsn'], $config['username'], $config['password']);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$points = 0;
	$tot = 0;
	echo "ExamName ";
	echo $_POST['ExamName'];
	echo "<br>";
	echo "num_questions ";
	echo $_POST['num_questions'];
	echo "<br>";
	echo "total_points ";
	echo $_POST['total_points'];
	echo "<br>";
	echo "<br>";
	for($x=1; $x <= $_POST['num_questions']; $x++) {
		echo "Question ".$x;
		echo "<br>";
		echo "choice ";
		echo $_POST['question'.$x.'choice'];
		echo "<br>";
		echo "answer ";
		echo $_POST['question'.$x.'answer'];
		echo "<br>";
		if($_POST['question'.$x.'answer'] == $_POST['question'.$x.'choice']){
			$points = $_POST['question'.$x.'points'];
			echo $_POST['question'.$x.'points']." out of ";
		} else {
			$points = 0;
			echo "0 out of ";
		}
		echo $_POST['question'.$x.'points']." points";
		echo "<br>";
		echo "<br>";

		$tot = $tot + $points;

		$statement = $dbh->prepare("insert into RecordQ(sid, ename, question_num, points_received, points_possible) values(:sid, :ename, :question_num, :points_received, :points_possible)");
		$result = $statement->execute(array(
			':sid' => $_SESSION['sid'],
			':ename' => $_POST['ExamName'],
			':question_num' => $x,
			':points_received' => $points,
			':points_possible' => $_POST['question'.$x.'points']
			));

	}

	echo $tot." out of ".$_POST['total_points']." received for ".$_POST['ExamName']."<br>";

	$statement = $dbh->prepare("insert into RecordE(sid, ename, points_received, points_possible) values(:sid, :ename, :points_received, :points_possible)");
	$result = $statement->execute(array(
		':sid' => $_SESSION['sid'],
		':ename' => $_POST['ExamName'],
		':points_received' => $tot,
		':points_possible' => $_POST['total_points']
		));

	echo "<a href='StudentView.html'><button>Student Page</button></a>";
	header("LOCATION:StudentView.html");
} catch (PDOException $e) {
			print "Error! ".$e->getMessage()."<br/>";
			die();
}
?>
