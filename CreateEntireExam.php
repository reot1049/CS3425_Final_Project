<!DOCTYPE>
<html>
  <head>
  </head>
  <body>
    <div class="createExam">
      <form method='post' action='InsertExam.php'>
        <?php
          echo "<input type='hidden' name='question_num' value=".$_POST["question_num"].">";
          echo "<input type='hidden' name='ename' value=".$_POST["ename"].">";
          for($x=1; $x <= $_POST["question_num"]; $x++) {
            echo "<label for='question".$x."' >Question".$x."</label>";
            echo "<input type='text' size='50' name='question".$x."'><br>";
            echo "<input type='hidden' name='question".$x."points' value=".$_POST["question".$x."points"].">";
            echo "<input type='hidden' name='question".$x."choices' value=".$_POST["question".$x."choices"].">";
            for($y=1; $y <= $_POST["question".$x."choices"]; $y++) {
              echo "<label for='question".$x."choice".$y."'>Choice".$y."</label>";
              echo "<input type='text' name='question".$x."choice".$y."'>";
              echo "<label for='correct'> Correct</label>";
              echo "<input type='radio' id='correct' name='question".$x."correctness' value=".$y."></br>";
            }
          }
        ?>
        <input type='submit' value='submit'>
      </form>
    </div>
  </body>
</html>
