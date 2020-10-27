<?php

include('./config/connection.php');

if (isset($_POST['addClient']))
{
  $gender = $_POST['gender'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];

  $sql = "INSERT INTO clients(gender, firstname, lastname, email) VALUES('$gender', '$firstname', '$lastname', '$email')";
  $result = mysqli_query($conn, $sql);

  if ($result)
  {
    echo '<script> alert("Client succesfully saved."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }
  else
  {
    echo '<script> alert("Impossible to create client."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }
}
?>