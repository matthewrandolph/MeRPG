<?php
  $page_title = "{$_GET['stat']} training!";
  include ('includes/header.php');

  echo '<p></p>';

  if ($_GET['stat'] == 'strength') {
    echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
    <tr>
    	<td align="left"><b>Activity</b></td>
    	<td align="left"><b>Value</b></td>
    </tr>
    ';

    // Fetch and print all the records....
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
  		<td align="left"><input type="number" name="resistance_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'weight_training_medium\'])) echo $_POST[\'weight_training_medium\']; ?>" /></td>
  	</tr>
    </table>';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">High Intensity Weight Training</td>
  		<td align="left"><input type="number" name="resistance_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_high\'])) echo $_POST[\'weight_training_high\']; ?>" /></td>
  	</tr>
    </table>';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Low Intensity Resistance Training</td>
  		<td align="left"><input type="number" name="resistance_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_low\'])) echo $_POST[\'resistance_training_low\']; ?>" /></td>
  	</tr>
    </table>';
    $bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
  		<td align="left">Medium Intensity Resistance Training</td>
  		<td align="left"><input type="number" name="resistance_training_low" size="4" maxlength="20" value="<?php if (isset($_POST[\'resistance_training_medium\'])) echo $_POST[\'resistance_training_medium\']; ?>" /></td>
  	</tr>
    </table>';
  }
  echo '
    <input type="submit" name="submit" value="Submit" />
    </form>
    ';

  include ('includes/footer.html');
?>
