<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />

<?php

if (!isset($_COOKIE['user_id'])) {
  header ("Location: login.php");
  exit;
}

$page_title = "{$_COOKIE['first_name']}'s Profile";


include ("includes/header.php");
include ("includes/functions.php");

require ('../../mysqli_connect.php');

$q = "SELECT experience, strength, agility, stamina, intelligence, charisma, avatar FROM stats WHERE user_id = {$_COOKIE['user_id']}";
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
  $avatar = $row['avatar'];

  echo "<h1>Level <span style='font-family:\"2dumb\"' id='lvl'>$lvl</span></h1>";

  echo '<table class="profile_table" align="center" cellspacing="5" cellpadding="5" width="75%">
  <tr>
    <td align="left"><b>Current Experience: ' . $exp . '</b></td>
    <td align="left"><b>Next Level Up At: ' . $next . '</b></td>
  </tr>
  ';
  echo "
  <tr>
    <td colspan=3 align=\"center\"><progress value=$exp max=$next></progress></td>
  </tr>
  <tr>
    <td align=\"left\"><a href=\"add_activity.php?stat=strength\"><img src=\"img/red.png\" /> Strength:</a></td>
    <td align=\"left\">$str</td>
    <td class='add1' align=\"left\"><a href=\"add_activity.php?stat=strength\">Add Activity</a></td>
  </tr>
  <tr>
    <td align=\"left\"><a href=\"add_activity.php?stat=agility\"><img src=\"img/green.png\" /> Agility:</a></td>
    <td align=\"left\">$agi</td>
    <td nowrap class='add2' align=\"left\"><a href=\"add_activity.php?stat=agility\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=stamina\"><img src=\"img/yellow.png\" /> Stamina:</a></td>
    <td>$sta</td>
    <td nowrap class='add3'><a href=\"add_activity.php?stat=stamina\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=intelligence\"><img src=\"img/blue.png\" /> Intelligence:</a></td>
    <td>$int</td>
    <td nowrap class='add4'><a href=\"add_activity.php?stat=intelligence\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=charisma\"><img src=\"img/purple.png\" /> Charisma:</a></td>
    <td>$cha</td>
    <td nowrap class='add5'><a href=\"add_activity.php?stat=charisma\">Add Activity</a></td>
  </tr>
  </table>
  ";
  echo "<img class=\"portrait\" align=\"right\" src=\"img/$avatar" . "head.png\" />";
  echo "<div style=\"clear:both\"></div>";
}

include ("includes/footer.html");
?>
