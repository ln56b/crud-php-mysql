<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>PHP and MySQL CRUD</title>
</head>

<body>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <ul class="navbar-brand">
        <li><strong>CRUD PHP & MYSQL</strong></li>
      <li><a href="#signin">Signin</a></li>
        <li><a href="#clients">Clients</a></li>
      </ul>
    </div>
  </nav>
  <br><br><br>

  
  <div class="container">
    <div class="row"  id="clients">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <h4 class="text-center">Clients</h4>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-outline" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Add a client
            </a>
          </div>
          <br><br><br>
          <table class="table table-dark">
            <thead class="thead-dark">
              <tr>
                <th class="d-none d-sm-block">Id</th>
                <th>Gender</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th class="d-none d-sm-block">Email</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

            <?php

            $sql = "SELECT * FROM clients";
            $result = mysqli_query($conn, $sql);

            if ($result)
            {
              while ($row = mysqli_fetch_assoc($result))
              {
            ?>
              <tr>
                <td class="d-none d-sm-block"><?php echo $row['id']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td class="d-none d-sm-block"><?php echo $row['email']; ?></td>
                <td>
                  <button type="button" class="btn btn-outline-info viewBtn"> <i class="fas fa-eye"></i>View</button>
                </td>
                <td>
                  <button type="button" class="btn btn-outline-warning updateBtn"> <i class="fas fa-edit"></i>Update</button>
                </td>
                <td>
                  <button type="button" class="btn btn-outline-danger deleteBtn"> <i class="fas fa-trash-alt"></i>Delete</button>
                </td>
              </tr>
            <?php
              }
            }
            else
            {
              echo "<script> alert('No client in the database.');</script>";
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add a client</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="add.php" method="POST">
            <div class="form-group">
              <label for="title">Gender</label>
              <select class="form-control" name="gender">
                <option selected="selected">Madame</option>
                <option>Monsieur</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Firstname</label>
              <input type="text" name="firstname" class="form-control" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Lastname</label>
              <input type="text" name="lastname" class="form-control"  maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Email</label>
              <input type="email" name="email" class="form-control"  maxlength="50" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="addClient">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View client details</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Gender:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewGender"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Firstname:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFirstname"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Lastname:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewLastname"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Email:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewEmail"></div>
            </div>        
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Client</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">Gender</label>
              <input type="text" name="updateGender" id="updateGender" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="title">Firstname</label>
              <input type="text" name="updateFirstname" id="updateFirstname" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="title">Lastname</label>
              <input type="text" name="updateLastname" id="updateLastname" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="title">Email</label>
              <input type="text" name="updateEmail" id="updateEmail" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning" name="updateClient">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="delete.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Do you really want to delete this client?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger" name="deleteClient">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Libraries-->
  <script src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js" 
  integrity="sha512-53CQcu9ciJDlqhK7UD8dZZ+TF2PFGZrOngEYM/8qucuQba+a+BXOIRsp9PoMNJI3ZeLMVNIxIfZLbG/CdHI5PA==" 
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
  crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>


  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#updateModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#updateId').val(data[0]);
        $('#updateGender').val(data[1]);
        $('#updateFirstname').val(data[2]);
        $('#updateLastname').val(data[3]);
        $('#updateEmail').val(data[4]);
        });
        
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.viewBtn').on('click', function(){

        $('#viewModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#viewGender').text(data[1]);
        $('#viewFirstname').text(data[2]);
        $('#viewLastname').text(data[3]);
        $('#viewEmail').text(data[4]);
        });
    
    });
  </script>

  <script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
        
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#deleteId').val(data[0]);

        });
    
    });
  </script>
</body>

</html>