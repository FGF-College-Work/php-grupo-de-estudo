<?php

$grade="C";

switch($grade){
  case "A":
    echo "Excelent";
    break;
  case "B":
    echo "Good";
    break;
  case "C":
    echo "Well Done";
    break;
  case "D":
      echo "You Passed";
    break;
  default:
    echo "Invalid grade";
}

//new line
echo "<br>";
echo "Your grade is".$grade;

?>
