<?php
if (empty($_POST['page'])) {

  $display_type = 'none';
  $error_message_username = "";
  $error_message_password = "";
  include ('startpage.php');
  exit();
}

require('model.php');

session_start();

// When commands come from StartPage
if ($_POST['page'] == 'StartPage')
{
  $command = $_POST['command'];
  switch($command) {
    case 'SignIn':
      if (!is_valid($_POST['username'], $_POST['password'])) {
        $error_msg_username = '* Wrong username, or';
        $error_msg_password = '* Wrong password'; // Set an error message into a variable.
        // This variable will used in the form in 'view_startpage.php'.
        $display_type = 'signin';  // It will display the start page with the SignIn box.
        // This variable will be used in 'view_startpage.php'.
        include('startpage.php');
      }
      else {
        $_SESSION['SignIn'] = 'Yes';
        $_SESSION['username'] = $_POST['username'];
        include('mainpage.php');
      }
      exit();

    case 'Join':
      if (!is_new($_POST['username'])) {
        $join_error_msg_username = '* Username exists';
        $display_type = 'join';
        include('startpage.php');
      }
      else if (join_a_new_user($_POST['username'], $_POST['password'], $_POST['email'])) {
        $error_msg_username = '';
        $error_msg_password = '';
        $display_type = 'signin';
        include('startpage.php');
      }
      else {
        $join_error_msg_username = '* Something wrong';
        $display_type = 'join';
        include('startpage.php');
      }
      exit();
  }
}

// When commands come from 'MainPage'
else if ($_POST['page'] == 'MainPage')
{
  if (!isset($_SESSION['SignIn'])) {
    $display_type = 'none';
    include('startpage.php');
    exit();
  }

  $command = $_POST['command'];
  switch($command) {
    case 'AddExercise':

            break;

    case 'AddMeal':
      //
            break;

    case 'ViewDay':
      //
      //
      break;

    case 'SignOut':
      session_unset();
      session_destroy();  // It does not unset session variables. session_unset() is needed.
      $display_type = 'none';
      include ('startpage.php');
      break;
  }
}

else {
  //...
}
?>
