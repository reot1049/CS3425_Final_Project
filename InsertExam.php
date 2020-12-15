<?php
try{
	session_start();
	date_default_timezone_set('UTC');
	$config = parse_ini_file("db.ini");
	$dbh = new PDO($config['dsn'], $config['username'], $config['password']);

	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$total_points = 0;
	for($x=1; $x <= $_POST["question_num"]; $x++) {
		$total_points = $total_points + $_POST['question'.$x.'points'];
	}

	$statement = $dbh->prepare("insert into Exam(ename, date_created, creator, total_points, num_questions) values(:ename, :date_created, :creator, :total_points, :num_questions)");
	$result = $statement->execute(array(':ename' => $_POST['ename'], ':date_created' => date('Y-m-d'), ':creator' => $_SESSION['iid'], ':total_points' => $total_points,  ':num_questions' => $_POST['question_num']));

	for($x=1; $x <= $_POST["question_num"]; $x++) {
		$statement = $dbh->prepare("insert into Question(question_num, ename, num_choices, answer, points, question_text) values(:question_num, :ename, :num_choices, :answer, :points, :question_text)");
		$result = $statement->execute(array(
			':question_num' => $x,
			':ename' => $_POST['ename'],
			':num_choices' => $_POST["question".$x."choices"],
			':answer' => $_POST['question'.$x.'correctness'],
			':points' => $_POST["question".$x."points"],
			':question_text' => $_POST["question".$x]
			));
			for($y=1; $y <= $_POST["question".$x."choices"]; $y++) {
				$statement = $dbh->prepare("insert into Answer(ans_num, ename, question_num, choice_text) values(:ans_num, :ename, :question_num, :choice_text)");
				$result = $statement->execute(array(
					':ans_num' => $y,
					':ename' => $_POST['ename'],
					':question_num' => $x,
					':choice_text' => $_POST['question'.$x.'choice'.$y]));
				}
			}

	header("LOCATION:Teacherview.php");
} catch (PDOException $e) {
			print "Error! ".$e->getMessage()."<br/>";
			die();
}
?>
