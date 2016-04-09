<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />

<?php
  $page_title = "{$_GET['stat']} training!";
  include ('includes/header.php');

  echo '<p></p>';

  // Check if the "Strength" attribute was selected on view_profile.php
  if ($_GET['stat'] == 'strength') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Time</b></td>
    </tr>
    ';

    $bg = '#eeeeee';
  	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<form action="add_experience.php" method="post"><tr bgcolor="' . $bg . '">
  		<td align="left">Low Intensity Weight Training</td>
  		<td align="left"><input type="number" name="weight_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'weight_training_low\'])) echo $_POST[\'weight_training_low\']; ?>" /></td>
  	</tr>
  	';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Medium Intensity Weight Training</td>
  		<td align="left"><input type="number" name="weight_training_medium" size="4" maxlength="20" value="<?php if (isset($_POST[\'weight_training_medium\'])) echo $_POST[\'weight_training_medium\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">High Intensity Weight Training</td>
  		<td align="left"><input type="number" name="weight_training_high" size="4" maxlength="20" value="<?php if (isset($_POST[\'weight_training_high\'])) echo $_POST[\'weight_training_high\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Low Intensity Resistance Training</td>
  		<td align="left"><input type="number" name="resistance_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_low\'])) echo $_POST[\'resistance_training_low\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Medium Intensity Resistance Training</td>
  		<td align="left"><input type="number" name="resistance_training_medium" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_medium\'])) echo $_POST[\'resistance_training_medium\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">High Intensity Resistance Training</td>
  		<td align="left"><input type="number" name="resistance_training_high" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_high\'])) echo $_POST[\'resistance_training_high\']; ?>" /></td>
  	</tr>
    </table>';
  }

  // Check if the "Agility" attribute was selected on view_profile.php
  else if ($_GET['stat'] == 'agility') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Time</b></td>
    </tr>
    ';

    // Fetch and print all the records....
    $bg = '#eeeeee';
  	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<form action="add_experience.php" method="post"><tr bgcolor="' . $bg . '">
  		<td align="left">Low Intensity Cardiovascular Training</td>
  		<td align="left"><input type="number" name="cardiovascular_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'cardiovascular_training_low\'])) echo $_POST[\'weight_training_low\']; ?>" /></td>
  	</tr>
  	';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Medium Intensity Cardiovascular Training</td>
  		<td align="left"><input type="number" name="cardiovascular_training_medium" size="4" maxlength="20" value="<?php if (isset($_POST[\'cardiovascular_training_medium\'])) echo $_POST[\'cardiovascular_training_medium\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">High Intensity Cardiovascular Training</td>
  		<td align="left"><input type="number" name="cardiovascular_training_high" size="4" maxlength="20" value="<?php if (isset($_POST[\'cardiovascular_training_high\'])) echo $_POST[\'cardiovascular_training_high\']; ?>" /></td>
  	</tr>
    </table>';
  }

  // Check if the "Stamina" attribute was selected on view_profile.php
  else if ($_GET['stat'] == 'stamina') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Time</b></td>
    </tr>
    ';

    // Fetch and print all the records....
    $bg = '#eeeeee';
  	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<form action="add_experience.php" method="post"><tr bgcolor="' . $bg . '">
  		<td align="left">Sleep</td>
  		<td align="left"><input type="number" name="sleep" size="4" maxlength="20" value="<?php if (isset($_POST[\'sleep\'])) echo $_POST[\'sleep\']; ?>" /></td>
  	</tr>
    </table>';
  }

  // Check if the "Intelligence" attribute was selected on view_profile.php
  else if ($_GET['stat'] == 'intelligence') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Time</b></td>
    </tr>
    ';

    // Fetch and print all the records....
    $bg = '#eeeeee';
  	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<form action="add_experience.php" method="post"><tr bgcolor="' . $bg . '">
  		<td align="left">Light Reading</td>
  		<td align="left"><input type="number" name="reading_medium" size="4" maxlength="20" value="<?php if (isset($_POST[\'reading_medium\'])) echo $_POST[\'reading_medium\']; ?>" /></td>
  	</tr>
  	';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Dense Reading</td>
  		<td align="left"><input type="number" name="reading_high" size="4" maxlength="20" value="<?php if (isset($_POST[\'reading_high\'])) echo $_POST[\'reading_high\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Academics</td>
  		<td align="left"><input type="number" name="academics" size="4" maxlength="20" value="<?php if (isset($_POST[\'academics\'])) echo $_POST[\'academics\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Puzzle Games</td>
  		<td align="left"><input type="number" name="puzzle_games" size="4" maxlength="20" value="<?php if (isset($_POST[\'puzzle_games\'])) echo $_POST[\'puzzle_games\']; ?>" /></td>
  	</tr>
    </table>';
  }

  // Check if the "Intelligence" attribute was selected on view_profile.php
  else if ($_GET['stat'] == 'charisma') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Time</b></td>
    </tr>
    ';

    // Fetch and print all the records....
    $bg = '#eeeeee';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<form action="add_experience.php" method="post"><tr bgcolor="' . $bg . '">
  		<td align="left">Spending Time With People</td>
  		<td align="left"><input type="number" name="spending_time" size="4" maxlength="20" value="<?php if (isset($_POST[\'spending_time\'])) echo $_POST[\'spending_time\']; ?>" /></td>
  	</tr>
    ';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Gave a Presentation</td>
  		<td align="left"><input type="number" name="presentation" size="4" maxlength="20" value="<?php if (isset($_POST[\'presentation\'])) echo $_POST[\'presentation\']; ?>" /></td>
  	</tr>
    </table>';
  }

  echo '<p></p>
    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" name="stat" value="' . $_GET['stat'] . '" />
    </form>
    ';

  include ('includes/footer.html');
?>
