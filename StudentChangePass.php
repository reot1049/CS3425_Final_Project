<?php
session_start();
try{
	$config = parse_ini_file("db.ini");
	$dbh = new PDO($config['dsn'], $config['username'], $config['password']);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST["password"], $_POST["new_pass"], $_POST["new_pass_conf"])){
		$pass = $_POST["password"];
		$new_pass = $_POST["new_pass"];
		$new_pass_conf = $_POST["new_pass_conf"];

		foreach ( $dbh->query("SELECT sid, pass FROM Student WHERE sid ='".$_SESSION['sid']."' AND pass = '".$pass."'") as $row ) {
			if($pass == $row[1]){
				if($new_pass == $new_pass_conf){
					echo "password changed";
					$statement = $dbh->prepare(" update Student set pass=:pass where sid=:sid");
					$result = $statement->execute(array(':pass' => $new_pass, ':sid' => $_SESSION['sid']));
					session_destroy();
					header("LOCATION:StudentLogin.php");
				} else {
					echo "new passwords didn't match try again";
				}
			} else {
				echo "incorrect password";
			}
		}
	}
} catch (PDOException $e) {
	print "Error! ".$e->getMessage()."<br/>";
	die();
}

?>
<html>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="base.css" rel="stylesheet">
	<div class="d-flex justify-content-center">
		<form method=post action=StudentChangePass.php>
			<div class="form-group">
				<label for="password">Old Password</label>
				<input type="password" class="form-control" name="password" placeholder="Old Password">
			</div>
			<div class="form-group">
				<label for="new_pass">New Password</label>
				<input type="password" class="form-control" name="new_pass" placeholder="New Password">
			</div>
			<div class="form-group">
				<label for="new_pass_conf">Confirm New Password</label>
				<input type="password" class="form-control" name="new_pass_conf" placeholder="New Password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary husky-button">Submit</button>
			</div>
		</form>
	</div>
</html>
