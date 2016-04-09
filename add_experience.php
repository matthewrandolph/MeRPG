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
      $run_query = false;
      $level = calculate_level( $row[1]);

      if (!empty($_POST['weight_training_low'])) {
        $row[2] += award_experience(1, $level, $_POST['weight_training_low']);
        $row[1] += award_experience(1, $level, $_POST['weight_training_low']);
        $run_query = true;
      }
      if (!empty($_POST['weight_training_medium'])) {
        $row[2] += award_experience(2, $level, $_POST['weight_training_medium']);
        $row[1] += award_experience(2, $level, $_POST['weight_training_medium']);
        $run_query = true;
      }
      if (!empty($_POST['weight_training_high'])) {
        $row[2] += award_experience(3, $level, $_POST['weight_training_high']);
        $row[1] += award_experience(3, $level, $_POST['weight_training_high']);
        $run_query = true;
      }
      if (!empty($_POST['resistance_training_low'])) {
        $row[2] += award_experience(1, $level, $_POST['resistance_training_low']);
        $row[1] += award_experience(1, $level, $_POST['resistance_training_low']);
        $run_query = true;
      }
      if (!empty($_POST['resistance_training_medium'])) {
        $row[2] += award_experience(2, $level, $_POST['resistance_training_medium']);
        $row[1] += award_experience(2, $level, $_POST['resistance_training_medium']);
        $run_query = true;
      }
      if (!empty($_POST['resistance_training_high'])) {
        $row[2] += award_experience(3, $level, $_POST['resistance_training_high']);
        $row[1] += award_experience(3, $level, $_POST['resistance_training_high']);
        $run_query = true;
      }
      if (!empty($_POST['cardiovascular_training_low'])) {
        $row[3] += award_experience(1, $level, $_POST['cardiovascular_training_low']);
        $row[1] += award_experience(1, $level, $_POST['cardiovascular_training_low']);
        $run_query = true;
      }
      if (!empty($_POST['cardiovascular_training_medium'])) {
        $row[3] += award_experience(2, $level, $_POST['cardiovascular_training_medium']);
        $row[1] += award_experience(2, $level, $_POST['cardiovascular_training_medium']);
        $run_query = true;
      }
      if (!empty($_POST['cardiovascular_training_high'])) {
        $row[3] += award_experience(3, $level, $_POST['cardiovascular_training_high']);
        $row[1] += award_experience(3, $level, $_POST['cardiovascular_training_high']);
        $run_query = true;
      }
      if (!empty($_POST['sleep'])) {
        $row[4] += award_experience(1, $level, floor($_POST['sleep']/16.0));
        $row[1] += award_experience(1, $level, floor($_POST['sleep']/16.0));
        $run_query = true;
      }
      if (!empty($_POST['reading_medium'])) {
        $row[5] += award_experience(2, $level, $_POST['reading_medium']);
        $row[1] += award_experience(2, $level, $_POST['reading_medium']);
        $run_query = true;
      }
      if (!empty($_POST['reading_high'])) {
        $row[5] += award_experience(3, $level, $_POST['reading_high']);
        $row[1] += award_experience(3, $level, $_POST['reading_high']);
        $run_query = true;
      }
      if (!empty($_POST['academics'])) {
        $row[5] += award_experience(1, $level, floor($_POST['academics']/4));
        $row[1] += award_experience(1, $level, floor($_POST['academics']/4));
        $run_query = true;
      }
      if (!empty($_POST['puzzle_games'])) {
        $row[5] += award_experience(2, $level, $_POST['puzzle_games']);
        $row[1] += award_experience(2, $level, $_POST['puzzle_games']);
        $run_query = true;
      }
      if (!empty($_POST['spending_time'])) {
        $row[6] += award_experience(2, $level, $_POST['spending_time']);
        $row[1] += award_experience(2, $level, $_POST['spending_time']);
        $run_query = true;
      }
      if (!empty($_POST['presentation'])) {
        $row[6] += award_experience(3, $level, $_POST['presentation']);
        $row[1] += award_experience(3, $level, $_POST['presentation']);
        $run_query = true;
      }

      if ($run_query == true) {

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
        <p class="error">Your stats could not be updated due to a system error. We apologize for any inconvinience.</p>';

        // Debugging message:
        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

      } else {
        echo '<h1>Error!</h1>
        <p class="error">Please fill out at least one of the actitivites.</p>
        <p><a href="add_activity.php?stat=' . $_POST['stat'] . '">Back</a></p>';
      }// End if $run_query

    mysqli_close($dbc); // Close the database connection.

    // Include the footer and quit the script (to not show the form).
    include ('includes/footer.html');
    exit();

  } else { // User not found.

    echo '<h1>Error!</h1>
    <p class="error">There was an issue finding your information on record. Please logout and log back in. Sorry!</p>';

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

 include ('includes/footer.html'); ?>

?>
