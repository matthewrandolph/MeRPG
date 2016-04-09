<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />

<?php
  include ("includes/functions.php");
  echo calculate_level(1);
  echo "\n";
  echo calculate_level(1400);
  echo "\n";
  echo calculate_level(72000);
  echo "\n";
  echo calculate_level(4400000);

  echo "<p>To Next Level</p>";

  echo "\n";
  echo to_next_level(1);
  echo "\n";
  echo to_next_level(1400);
  echo "\n";
  echo to_next_level(72000);
  echo "\n";
  echo to_next_level(4400000);

  echo "<p>Award experience:</p>";

  echo award_experience(1, 1);
  echo "\n";
  echo award_experience(1, 2);
  echo "\n";
  echo award_experience(1, 3);
  echo "\n";
  echo award_experience(10, 2);
  echo "\n";
  echo award_experience(10, 3);

?>
