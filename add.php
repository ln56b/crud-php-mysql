<?php

include('connection.php');

if (isset($_POST['addClient']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];

  $sql = "INSERT INTO clients(firstname, lastname, gender, email) VALUES('$firstname', '$lastname', '$gender', '$email')";
  $result = mysqli_query($conn, $sql);

  if ($result)
  {
    echo '<script> alert("Client succesfully saved."); </script>';
  }
  else
  {
    echo '<script> alert("Impossible to create client."); </script>';
  }
}
?>