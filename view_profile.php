<?php

if (!isset($_COOKIE['user_id'])) {
  header ("Location: login.php");
  exit;
}

$page_title = "{$_COOKIE['first_name']}'s Profile";


include ("includes/header.php");
include ("includes/functions.php");

$exp = 10010;
$str = 100;
$agi = 100;
$sta = 100;
$int = 100;
$cha = 100;
$lvl = calculate_level($exp);
$next = to_next_level($exp);

echo "<p>Level $lvl</p>
<p>Current Experience: $exp</p>
<p>To Next Level Up: $next</p>
<progress value=$exp max=$next></progress>
<p>Strength: $str</p>
<p>Agility: $agi</p>
<p>Stamina: $sta</p>
<p>Intelligence: $int</p>
<p>Charisma: $cha</p>";

include ("includes/footer.html");
?>
