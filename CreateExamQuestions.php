<?php
echo "<form method='post' action='CreateEntireExam.php' id=examquestions>";
echo "<input type='hidden' name='question_num' value=".$_POST["question_num"].">";
for($x=1; $x <= $_POST["question_num"]; $x++) {
  echo "<label for='question".$x."choices' >How many choices for question".$x."?</label>";
  echo "<input type='number' min='1' max='99' name='question".$x."choices' placeholder='1'><br>";
  echo "<label for='question".$x."points'>How many points is question".$x."</label>";
  echo "<input type='number' min='1' max='99' name='question".$x."points' placeholder='1'><br>";
}
echo "<input type='submit' value='submit'>";
echo "</form>";
?>
