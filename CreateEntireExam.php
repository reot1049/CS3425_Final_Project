<!DOCTYPE>
<html>
  <head>
  </head>
  <body>
    <div class="createExam">
      <form>
        <?php
          echo"<form method='post' action='InsertExam.php'>";
          for($x=1; $x <= $_POST["question_num"]; $x++) {
            echo "<label for='question".$x."' >Question".$x."</label>";
            echo "<input type='text' size='50' name='question".$x."'><br>";
            echo "<input type='hidden' name='question".$x."points' value=".$_POST["question".$x."points"].">";
            for($y=1; $y <= $_POST["question".$x."choices"]; $y++) {
              echo "<label for='question".$x."choice".$y."'>Choice".$y."</label>";
              echo "<input type='text' name='question".$x."choice".$y."'>";
              echo "<label for='correct'> Correct</label>";
              echo "<input type='radio' id='correct' name='question".$x."correctness' value='correct'></br>";
            }
          }
          echo "<input type='submit' value='Create Exam'>";
          echo "</form>";

        ?>
      </form>
    </div>
  </body>
</html>
