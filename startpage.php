<!DOCTYPE html>

<html lang="">
<head>
  <title>Welcome</title>
  <style>
    #ddm {
      position: fixed;
      top: 0px;
      left: 0px;
    }
    #ddm li, #ddm ul {
      list-style: none;
      padding: 0;
      background-color: Gray;
      cursor:pointer;
    }
    #ddm ul {
      border: 1px solid black;
    }
    #ddm > li {
      position: relative;
    }
    #ddm > li > ul {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
    }
    #ddm > li > ul > li { padding: 5px; }
    #ddm li:hover {
      background-color: #eee;
    }
    #ddm > li:hover > ul {
      display: block;
    }

    .modal-window {
      display: none;
      background-color: White;
      width: 400px; height: 300px; border: 1px solid black;
      position: absolute; top: 100px; left: calc(50% - 200px);
      z-index: 999;
      padding: 10px;
    }
    .modal-label {
      display: inline-block;
      width: 80px;
    }

    #blanket {
      display: none;
      background-color: LightGrey;
      opacity: 0.5;
      position: fixed; top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 998;
    }
  </style>
</head>

<body>
<h1 style='text-align:center'>Workout and Meal Tracker</h1>
<hr>

<!-- menu -->
<ul id='ddm'>
  <li style='width: 50px;'><img src='menu.png' width='50px' height='50px'/>
    <ul style='width:120px'>
      <li id='menu-signin'>Sign In</li>
      <li id='menu-join'>Join</li>
    </ul>
  </li>
</ul>

<!-- blanket for modal windows -->
<div id='blanket'>
</div>

<!-- SignIn modal window-->
<div id='signin-box' class='modal-window'>
  <h2 style='text-align:center'>Sign In</h2>
  <br>
  <form method='post' action='controller.php'>
    <input type='hidden' name='page' value='StartPage'>
    <input type='hidden' name='command' value='SignIn'>
    <label class='modal-label'>Username:</label>
    <input type='text' name='username' required> <?php if (!empty($error_msg_username)) echo $error_msg_username; ?><br>
    <br>
    <label class='modal-label'>Password:</label>
    <input type='password' name='password' required> <?php if (!empty($error_msg_password)) echo $error_msg_password; ?><br>
    <br>
    <input type='submit'>&nbsp;&nbsp;
    <input id='cancel-signin-button' type='button' value='Cancel'>&nbsp;&nbsp;
    <input type='reset'>
  </form>
</div>

<!-- Join modal window-->
<div id='join-box' class='modal-window'>
  <h2 style='text-align:center'>Join</h2>
  <br>
  <form method='post' action='controller.php'>
    <input type='hidden' name='page' value='StartPage'>
    <input type='hidden' name='command' value='Join'>
    <label class='modal-label'>Username:</label>
    <input type='text' name='username' required> <?php if (!empty($join_error_msg_username)) echo $join_error_msg_username; ?><br>
    <br>
    <label class='modal-label'>Password:</label>
    <input type='password' name='password' required><br>
    <br>
    <label class='modal-label'>Email:</label>
    <input type='text' name='email' required><br>
    <br>
    <input type='submit'>&nbsp;&nbsp;
    <input id='cancel-join-button' type='button' value='Cancel'>&nbsp;&nbsp;
    <input type='reset'>
  </form>
</div>
</body>
</html>

<script>
  <?php
  if ($display_type == 'signin')
    echo 'show_signin();';
  else if ($display_type == 'join')
    echo 'show_join();';
  else
    ;
  ?>

  function show_join() {
    document.getElementById('blanket').style.display = 'block';
    document.getElementById('join-box').style.display = 'block';
  };

  function show_signin() {
    document.getElementById('blanket').style.display = 'block';
    document.getElementById('signin-box').style.display = 'block';
  };

  document.getElementById('menu-signin').addEventListener('click', function() {
    document.getElementById('blanket').style.display = 'block';
    document.getElementById('signin-box').style.display = 'block';
  });
  document.getElementById('menu-join').addEventListener('click', function() {
    document.getElementById('blanket').style.display = 'block';
    document.getElementById('join-box').style.display = 'block';
  });
  document.getElementById('blanket').addEventListener('click', function() {
    document.getElementById('blanket').style.display = 'none';
    document.getElementById('signin-box').style.display = 'none';
    document.getElementById('join-box').style.display = 'none';
  });
  document.getElementById('cancel-signin-button').addEventListener('click', function() {
    document.getElementById('blanket').style.display = 'none';
    document.getElementById('signin-box').style.display = 'none';
    document.getElementById('join-box').style.display = 'none';
  });
  document.getElementById('cancel-join-button').addEventListener('click', function() {
    document.getElementById('blanket').style.display = 'none';
    document.getElementById('signin-box').style.display = 'none';
    document.getElementById('join-box').style.display = 'none';
  });
</script>
