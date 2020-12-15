<?php
session_start();

if(isset($_POST["logout"])){
	session_destroy();
	header("LOCATION:Teacherview.php");
	return;
}

$config = parse_ini_file("db.ini");
$dbh = new PDO($config['dsn'], $config['username'], $config['password']);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// user enter the data */
if(isset($_POST["userid"], $_POST["password"])){
	$name = $_POST["userid"];
	$password = $_POST["password"];

	$result = mysql_query("select iid, pass from Instructor where iid = '".$name."' and pass = '".$password."'");

	foreach ( $dbh->query("SELECT iid, pass FROM Instructor WHERE iid ='".$name."' AND pass = '".$password."'") as $row ) {
		if($name == $row[0] && $password == $row[1]){
			$_SESSION["loggedin"]=true;
			header("LOCATION:Teacherview.php");
		} else {
			echo "incorrect username and password";
		}
	}
}
?>

<form action="TeacherLogin.php" method=post>
username: <input type="text" name="userid">;
<br>
password: <input type="password" name="password">
<br>
<input type="submit" name="login" value="login">
</form>
