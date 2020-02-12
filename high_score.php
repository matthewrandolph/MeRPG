<?php

$page_title = "Leaderboards";


include ("includes/header.php");
include ("includes/functions.php");

require ('../../mysqli_connect.php');

$q = "SELECT experience, first_name, CONCAT(SUBSTR(last_name,1,1),\".\") AS last_inital, strength, agility, stamina, intelligence, charisma FROM stats JOIN users ON stats.user_id = users.user_id ORDER BY experience DESC LIMIT 10";
$r = @mysqli_query($dbc, $q);
//if (mysqli_num_rows($r) < 0) {

  echo '<table align="center" cellspacing="5" cellpadding="5" width="75%">
  <tr>
    <td align="left"><b>Experience</b></td>
    <td align="left"><b>Name</b></td>
    <td align="left">&nbsp;</td>
    <td align="left"><b>Strength</b></td>
    <td align="left"><b>Agility</b></td>
    <td align="left"><b>Stamina</b></td>
    <td align="left"><b>Intelligence</b></td>
    <td align="left"><b>Charisma</b></td>
  </tr>
  ';

  // Fetch and print all the records....
  $bg = '#eeeeee';
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
    echo '<tr bgcolor="' . $bg . '">
      <td align="left">' . $row['experience'] . '</td>
      <td align="left">' . $row['first_name'] . '</td>
      <td align="left">' . $row['last_inital'] . '</td>
      <td align="left">' . $row['strength'] . '</td>
      <td align="left">' . $row['agility'] . '</td>
      <td align="left">' . $row['stamina'] . '</td>
      <td align="left">' . $row['intelligence'] . '</td>
      <td align="left">' . $row['charisma'] . '</td>
    </tr>
    ';
  } // End of WHILE loop.
//}

  echo '</table>';
  mysqli_free_result ($r);
  mysqli_close($dbc);

include ("includes/footer.html");
?>
