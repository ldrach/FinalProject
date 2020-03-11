<?php
if (!isset($_SESSION['SignIn'])) {
  include('startpage.php');
  exit();
}
?>

<!DOCTYPE html>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class='container'>
  <!-- Header -->
  <div class='row'>
    <div class='bg-primary'>
      <h1 style='text-align:center; padding-top: 10px;'>TRU Questions & Answers</h1>
      <h2 style='text-align:center'>Winter 2020</h2>
      <h3 style='text-align:center; padding-bottom: 10px;'>- User: <?php echo $_SESSION['username']; ?> -</h3>
    </div>
  </div>
  <div class='row'>
    <!-- Navigation -->
    <div class='col-md-2 bg-info'>
      <br>
      <button class='btn btn-default' id='post-question' data-toggle="modal" data-target="#modal-post-question">Post a Question</button><br>
      <br>
      <button class='btn btn-default' id='list-questions'>List My Questions</button><br>
      <br>
      <button class='btn btn-default' id='sign-out'>Sign Out</button><br>
      <br>
    </div>

    <!-- Result -->
    <div class='col-md-10 bg-success' id='result-pane'>
      Results will be displayed here.
    </div>
  </div>
</div>

<!-- SignOut form -->

<form method='post' action='w7_controller.php' id='form-sign-out' style='display:none'>
  <input type='hidden' name='page' value='MainPage'>
  <input type='hidden' name='command' value='SignOut'>
</form>

<!-- Post a Question -->

<div class="modal fade" id="modal-post-question" role="dialog">  <!-- modal window -->
  <div class="modal-dialog">
    <div class="modal-content">  <!-- modal content -->
      <form id='form-post-question'>
        <div class='modal-header'>  <!-- modal header -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Post a Question</h4>
        </div>
        <div class='modal-body'>  <!-- modal body -->
          <label for='input-post-question'>Question:</label>
          <input id='input-post-question' class='form-control' type='text' autofocus required>
        </div>
        <div class='modal-footer'>  <!-- modal footer -->
          <button id='submit-post-question' type="button" class="btn btn-primary">Submit</button>  <!-- not data-dismiss='modal' -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<script>
  /*
  *   Timeout
  */

  document.getElementById('sign-out').addEventListener('click', function() {
    timeout();
  })

  var timer = setTimeout(timeout, 10 * 60 * 1000);
  window.addEventListener('mousemove', event_listener_mousemove_or_keydown);
  window.addEventListener('keydown', event_listener_mousemove_or_keydown);  // for keyboard action
  window.addEventListener('unload', function() {  // when the window is closed
    timeout();
  });
  function event_listener_mousemove_or_keydown() {
    clearTimeout(timer);
    timer = setTimeout(timeout, 10 * 60 * 1000);
  }
  function timeout() {
    document.getElementById('form-sign-out').submit();
  }

  /*
  *   Post a question
  *     Trial 6 in 5.6
  */

  // When the 'Submit' button on the 'PostQuestion' modal window is clicked
  ????
  {
    $('#modal-post-question').modal('hide');

    // Send then'PostQuestion' command using jQuery AJAX
    var q = ????  // read the question from the input element
    if (q != "") {
    ????
    }
    else
      $('#result-pane').html("");
  });

  /*
  *   List questions
  *     Trial 6 in 5.6
  */

  ????
  {
  ????
  });

  /*
  *   Sign out
  */
  $("#sign-out").click(function() {
    $.post("w7_controller.php",
      {page:"MainPage", command:"SignOut"},
      function(data) {}
    );
  })

</script>
