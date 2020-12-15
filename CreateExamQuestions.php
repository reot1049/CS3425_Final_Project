<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="base.css" rel="stylesheet">
<head>
</head>
<body>
  <div class="d-flex justify-content-center">
    <form method='post' action='CreateEntireExam.php'>
      <?php
      echo "<input type='hidden' name='question_num' value=".$_POST["question_num"].">";
      echo "<input type='hidden' name='ename' value=".$_POST["ename"].">";
      for($x=1; $x <= $_POST["question_num"]; $x++) {
        echo "<div class='form-group'>";
        echo "<label for='question".$x."choices' >How many choices for question".$x."?</label>";
        echo "<input type='number' class='form-control' min='1' max='99' name='question".$x."choices' value=1>";
        echo "<label for='question".$x."points'>How many points is question".$x."</label>";
        echo "<input type='number' class='form-control' min='1' max='99' name='question".$x."points' value=1>";
        echo "</div>";
        echo "<br>";
      }
      ?>
      <div class="form-group">
        <button type="submit" class="btn btn-primary husky-button">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
