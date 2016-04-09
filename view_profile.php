<?php

if (!isset($_COOKIE['user_id'])) {
  header ("Location: login.php");
  exit;
}

$page_title = "{$_COOKIE['first_name']}'s Profile";


include ("includes/header.php");
include ("includes/functions.php");

require ('../../mysqli_connect.php');

$q = "SELECT experience, strength, agility, stamina, intelligence, charisma FROM stats WHERE user_id = {$_COOKIE['user_id']}";
$r = @mysqli_query($dbc, $q);
if (mysqli_num_rows($r) == 1) {

  $row = mysqli_fetch_array($r);
  $exp = $row['experience'];
  $str = $row['strength'];
  $agi = $row['agility'];
  $sta = $row['stamina'];
  $int = $row['intelligence'];
  $cha = $row['charisma'];
  $lvl = calculate_level($exp);
  $next = to_next_level($exp);

  echo "<p>Level $lvl</p>
  <p>Current Experience: $exp</p>
  <p>To Next Level Up: $next</p>
  <progress value=$exp max=$next></progress>
  <p><a href=\"add_activity.php?stat=strength\">Strength:</a> $str <a href=\"add_activity.php?stat=strength\">Add Activity</a></p>
  <p><a href=\"add_activity.php?stat=agility\">Agility:</a> $agi <a href=\"add_activity.php?stat=agility\">Add Activity</a></p>
  <p><a href=\"add_activity.php?stat=stamina\">Stamina:</a> $sta <a href=\"add_activity.php?stat=stamina\">Add Activity</a></p>
  <p><a href=\"add_activity.php?stat=intelligence\">Intelligence:</a> $int <a href=\"add_activity.php?stat=intelligence\">Add Activity</a></p>
  <p><a href=\"add_activity.php?stat=charisma\">Charisma:</a> $cha <a href=\"add_activity.php?stat=agility\">Add Activity</p>";
}

include ("includes/footer.html");
?>
