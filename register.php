<?php # Script 9.3 - register.php

ob_start();

$page_title = 'Register';
include ('includes/header.php');
require ('includes/login_functions.inc.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require ('../../mysqli_connect.php'); // Connect to the database

  $errors = array(); // Initialize an error array.

  // Check for a first name:
  if (empty($_POST['first_name'])) {
    $errors[] = 'You forgot to enter your first name.';
  } else {
    $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  }

  // Check for a last name:
  if (empty($_POST['last_name'])) {
    $errors[] = 'You forgot to enter your last name.';
  } else {
    $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
  }

  // Check for an email address:
  if (empty($_POST['email'])) {
    $errors[] = 'You forgot to enter your email address.';
  } else {
    $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }

  // Check for a password and match against the confirmed password:
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Your password did not match the confirmed password.';
    } else {
      $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'You forgot to enter your password';
  }

  $avatar = $_POST['avatar'];

  if (empty($errors)) { // If everything's OK.

    // Register the user in the database...

    // Make the query:
    $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";
    $r = @mysqli_query ($dbc, $q); // Run the query.

    $q = "SELECT user_id FROM users WHERE first_name = '$fn' AND last_name = '$ln' AND email='$e'";
    $r = @mysqli_query ($dbc, $q);
    $row = mysqli_fetch_array($r);

    $q = "INSERT INTO stats (user_id, experience, strength, agility, stamina, intelligence, charisma, avatar) VALUES ({$row['user_id']}, 100, 100, 100, 100, 100, 100, '$avatar')";
    $r = @mysqli_query ($dbc, $q);
    if ($r) { // If it ran OK

      // Set the cookies:
      setcookie ('user_id', $row['user_id'], time()+3600, '/', '', 0, 0);
      setcookie ('first_name', $fn, time()+3600, '/', '', 0, 0);

      // Redirect:
      redirect_user('loggedin.php');

      // Print a message:
      echo '<h1>Thank you for joining our community!</h1>
      <p>You are now registered!</p><p><br /></p>';

    } else { // If it did not run OK.

      // Public message:
      echo '<h1>System Error</h1>
      <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

      // Debugging message:
      echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

    } // End of if ($r) IF.

    mysqli_close($dbc); // Close the database connection.

    // Include the footer and quit the script:
    include ('includes/footer.html');
    exit();

  } else { // Report the errors

    echo '<h1>Error!</h1>
    <p class="error">The following error(s) occured:<br />';
    foreach ($errors as $msg) { // Print each error.
      echo " - $msg<br />\n";
    }

  } // End of if (empty($errors)) IF.

  mysqli_close($dbc);

} // End of the main Submit conditional.

ob_end_flush();

?>
<h1>Register</h1>
<form action="register.php" method="post">
  <table>
    <tr>
      <td align="right">First Name:&nbsp;&nbsp;</td><td><input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></td>
    </tr><tr>
      <td align="right">Last Name:&nbsp;&nbsp;</td><td><input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></td>
    </tr><tr>
      <td align="right">Email Address:&nbsp;&nbsp;</td><td><input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
    </tr><tr>
      <td align="right">Password:&nbsp;&nbsp;</td><td><input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></td>
    </tr><tr>
      <td align="right">Confirm Password:&nbsp;&nbsp;</td><td><input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></td>
    </tr>
  </table>
<p><input type="submit" name="submit" value="REGISTER" /></p>
  <input type="hidden" name="avatar" value="<?php echo $_GET['avatar']; ?>" />
</form>
<?php include ('includes/footer.html'); ?>
