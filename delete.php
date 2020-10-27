<?php

include('./config/connection.php');

if (isset($_POST['deleteClient']))
{
  $id = $_POST['deleteId'];

  $sql = "DELETE FROM clients WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result)
  {
    echo '<script> alert("Client succesfully deleted."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }
  else
  {
    echo '<script> alert("Impossible to delete client."); </script>';
    echo '<script>window.location = "http://localhost:8888/hospitalidee-php-crud/";</script>';
  }
}
?>