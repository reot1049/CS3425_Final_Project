<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>
	<div class="d-flex justify-content-center">
		<form method=post action=TeacherLogin.php>
			<div class="form-group">
				<label for="userid">Instructor ID</label>
				<input type="text" class="form-control" name="userid" placeholder="Enter ID">
			</div>
			<div class="form-group">
				<label for="password">Instructor Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary husky-button">Submit</button>
			</div>
		</form>
	</div>
	<div class="d-flex justify-content-center">
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

			foreach ( $dbh->query("SELECT iid, pass FROM Instructor WHERE iid ='".$name."' AND pass = '".$password."'") as $row ) {
				if($name == $row[0] && $password == $row[1]){
					$_SESSION["loggedin"]=true;
					$_SESSION["iid"]=$name;
					header("LOCATION:Teacherview.php");
				}
			}
			echo "<br><p>Incorrect username and/or password</p>";
		}
		?>
	</div>
</body>
</html>
