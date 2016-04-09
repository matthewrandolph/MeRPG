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

  echo "<h1>Level <span style='font-family:\"2dumb\"' id='lvl'>$lvl</span></h1>";

  echo '<table align="center" cellspacing="5" cellpadding="5" width="75%">
  <tr>
    <td align="left"><b>Current Experience: ' . $exp . '</b></td>
    <td align="left"><b>Next Level Up At: ' . $next . '</b></td>
  </tr>
  ';
  echo "
  <tr>
    <td align=\"center\"><progress value=$exp max=$next></progress></td>
  </tr>
  <tr>
    <td align=\"left\"><a href=\"add_activity.php?stat=strength\">Strength:</a></td>
    <td align=\"left\">$str</td>
    <td class='add' align=\"left\"><a href=\"add_activity.php?stat=strength\">Add Activity</a></td>
  </tr>
  <tr>
    <td align=\"left\"><a href=\"add_activity.php?stat=agility\">Agility:</a></td>
    <td align=\"left\">$agi</td>
    <td nowrap class='add' align=\"left\"><a href=\"add_activity.php?stat=agility\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=stamina\">Stamina:</a></td>
    <td>$sta</td>
    <td nowrap class='add'><a href=\"add_activity.php?stat=stamina\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=intelligence\">Intelligence:</a></td>
    <td>$int</td>
    <td nowrap class='add'><a href=\"add_activity.php?stat=intelligence\">Add Activity</a></td>
  </tr>
  <tr>
    <td><a href=\"add_activity.php?stat=charisma\">Charisma:</a></td>
    <td>$cha</td>
    <td nowrap class='add'><a href=\"add_activity.php?stat=charisma\">Add Activity</a></td>
  </tr>
  </table>
  ";
}

include ("includes/footer.html");
?>
