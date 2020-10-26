<?php

include('connection.php');

if (isset($_POST['deleteClient']))
{
  $id = $_POST['deleteId'];

  $sql = "DELETE FROM clients WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result)
  {
    echo '<script> alert("Client successfully deleted."); </script>';
  }
  else
  {
    echo '<script> alert("Impossible to delete client."); </script>';
  }
}
?>