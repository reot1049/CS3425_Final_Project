<html>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link href="base.css" rel="stylesheet">
  <head>
  </head>
  <body>
    <div class="d-flex justify-content-center">
      <form method=post action=StudentLogin.php>
        <div class="form-group">
          <label for="student_name">Student ID</label>
          <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter ID">
        </div>
        <div class="form-group">
          <label for="student_pass">Student Password</label>
          <input type="password" class="form-control" name="student_pass" id="student_pass" placeholder="Password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary husky-button">Submit</button>
        </div>
      </form>
    </div>
		<div class="d-flex justify-content-center">
			<?php
			session_start();

			$config = parse_ini_file("db.ini");
			$dbh = new PDO($config['dsn'], $config['username'], $config['password']);

			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$incorrect = false;

			// user enter the data */
			if(isset($_POST["student_name"], $_POST["student_pass"])){
				$name = $_POST["student_name"];
				$password = $_POST["student_pass"];

				foreach ( $dbh->query("SELECT sid, pass, sname FROM Student WHERE sid ='".$name."' AND pass = '".$password."'") as $row ) {
					if($name == $row[0] && $password == $row[1]){
						$_SESSION["loggedin"]=true;
						$_SESSION["sid"]=$name;
						$_SESSION["sname"]=$row[2];
						header("LOCATION:StudentView.html");
					}
				}
				echo "<br><p>Incorrect username and/or password</p>";
			}
			?>
		</div>
  </body>
</html>
