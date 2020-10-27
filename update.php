<?php

include('connection.php');

if (isset($_POST['updateClient']))
{
  $id = $_POST['updateId'];
  $gender = $_POST['updateGender'];
  $firstname = $_POST['updateFirstname'];
  $lastname = $_POST['updateLastname'];
  $email = $_POST['updateEmail'];

  $sql = "UPDATE clients SET 
    gender='$gender',
    firstname='$firstname', 
    lastname='$lastname', 
    email=' $email',
    WHERE id='$id'";

  $result = mysqli_query($conn, $sql);


  if ($result)
  {
    echo '<script> alert("Client succesfully updated."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }
  else
  {
    echo '<script> alert("Impossible to update client."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }

}
?>

