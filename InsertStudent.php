<?php
try{
	$config = parse_ini_file("db.ini");
	$dbh = new PDO($config['dsn'], $config['username'], $config['password']);

	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $dbh->prepare("insert into Student(sname, sid, major, pass) values(:sname, :sid, :major, :pass)");

	$result = $statement->execute(array(':sname' => $_POST['student_name'], ':sid' => $_POST['student_id'], ':major' => $_POST['student_major'], ':pass' => $_POST['student_pass']));
	header("LOCATION:Teacherview.php");
} catch (PDOException $e) {
	print "Error! ".$e->getMessage()."<br/>";
	die();
}
?>
