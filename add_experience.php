<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />

<?php

$page_title = "Experience Awarded!";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  include ('includes/functions.php');
  include ('includes/header.php');

  require ('../../mysqli_connect.php'); // Connect to the database

  $errors = array(); // Initialize an error array.

  // Check for user id:
  if (empty($_COOKIE['user_id'])) {
    $errors[] = 'You have been inactive and automatically logged out. Please login again.';
  } else {
    $id = mysqli_real_escape_string($dbc, trim($_COOKIE['user_id']));
  }

  if (empty($errors)) { // If everything's OK.

    // Check that they've entered the right email address/password combination:
    $q = "SELECT user_id, experience, strength, agility, stamina, intelligence, charisma FROM stats WHERE user_id = {$_COOKIE['user_id']}";
    $r = @mysqli_query ($dbc, $q); // Run the query.
    $num = @mysqli_num_rows($r);
    if ($num == 1) { // Match was made.

      // Get the user_id:
      $row = mysqli_fetch_array($r, MYSQLI_NUM);

      $level = calculate_level( $row[1]);

      if (!empty($_POST['weight_training_low'])) {
        $row[2] += award_experience(1, $level, $_POST['weight_training_low']);
        $row[1] += award_experience(1, $level, $_POST['weight_training_low']);
      }
      if (!empty($_POST['resistance_training_low'])) {
        $row[2] += award_experience(1, $level, $_POST['resistance_training_low']);
        $row[1] += award_experience(1, $level, $_POST['resistance_training_low']);
      }


      // Make the UPDATE query:
      $q = "UPDATE stats SET experience=$row[1], strength=$row[2], agility=$row[3], stamina=$row[4], intelligence=$row[5], charisma=$row[6] WHERE user_id=$row[0]";
      $r = @mysqli_query($dbc, $q);

      if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

        mysqli_close();
          header ("Location: view_profile.php");

        // Print a message:
        echo '<h1>Thank you!</h1>
        <p>Your stats have been updated.</p><p><br /></p>';

      } else { // If it did not run OK.

      // Public message:
      echo '<h1>System Error</h1>
      <p class="error">Your password could not be changed due to a system error. We apologize for any inconvinience.</p>';

      // Debugging message:
      echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

    } // End of if ($r) IF.

    mysqli_close($dbc); // Close the database connection.

    // Include the footer and quit the script (to not show the form).
    include ('includes/footer.html');
    exit();

  } else { // Invalid email address/password combination.

    echo '<h1>Error!</h1>
    <p class="error">The email address and password do not match those on file.</p>';

  }

} else { // Report the errors

  echo '<h1>Error!</h1>
  <p class="error">The following error(s) occured:<br />';
  foreach ($errors as $msg) { // Print each error.
    echo " - $msg<br />\n";
  }
} // End of if (empty($errors)) IF.

mysqli_close($dbc);

} // End of the main Submit conditional.
?>
<h1>Change Your Password</h1>
<form action="password.php" method="post">
  <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
  <p>Current Password: <input type="password" name="pass" size="10" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" /></p>
  <p>New Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
  <p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
  <p><input type="submit" name="submit" value="Register" /></p>
</form>
<?php include ('includes/footer.html'); ?>

?>
