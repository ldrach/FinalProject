<?php
$conn = mysqli_connect('localhost', 'ldrachw20', 'Kamloops12', 'C354_ldrachw20');

/*
*   User management
*/

function is_valid($u, $p)
{
    global $conn;

    $sql = "select * from Clients where Username = '$u' and Password = '$p'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function is_new($u)
{
    global $conn;

    $sql = "select * from Clients where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return false;
    else
        return true;
}

function join_a_new_user($u, $p, $email, $fname, $lname)
{
    global $conn;

    $date = date("Ymd");

    $sql = "Insert into Clients values (NULL, '$u', '$p', '$email', '$fname', '$lname')";

  return mysqli_query($conn, $sql);
}

function get_userid($username)
{
    global $conn;

    $sql = "select * from Clients where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['UserId'];
    }
    else
        return -1;
}

/*
*   Queries
*/

function add_exercise($user, $ex, $reps, $sets, $date)
{
    global $conn;

    $uid = get_userid($user);
    if ($uid < 0)
        return false;

    $current_date = date('Ymd');
    // $sql =
    // mysqli_query($conn, $sql);

    return true;
}

function add_meal($user, $meal, $amount, $units, $date)
{
  global $conn;

  $uid = get_userid($user);
  if ($uid < 0)
    return false;

  $current_date = date('Ymd');
  // $sql =
  // mysqli_query($conn, $sql);

  return true;
}

function edit_exercise(){


}

function edit_meal(){

}

function list_exercises($u, $date)
{
    global $conn;



    return;
}

function list_meals($u, $date)
{
    global $conn;



    return;
}

function delete_exercise(){

}

function delete_meal(){


}

?>
