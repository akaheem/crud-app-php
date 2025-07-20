<?php
include 'database.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Operation</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

    

    <style>
      body{
        padding: 0% !important;
        margin: 0% !important;
      }
      a{
        color: white;
        text-decoration: none;
      }
      #action{
        width: 200px;
        padding: 8px 2px;
        margin: 4px opx;
      }
      
    </style>

  </head>
  <body>
    <div class="contain">

    <!-- --Navbar-- -->
    <!---------------->
    <nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img src="crud_logo.jpeg" alt="Crud Logo" height="28"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html">Form</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="data.php">Data</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Edit</a>
                </li>
              </ul>
            </div>
          </div>
    </nav>
    <!---------------->
    <!-- --Navbar-- -->
  
    <!-- --Tables-- -->
    <!---------------->
    <div class="container">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <!-- <th scope="col">DoB</th> -->
      <th scope="col">Number</th>
      <!-- <th scope="col">Address</th> -->
      <th scope="col" id="action">Action</th> 
    </tr>
  </thead>
  <tbody>
  <?php
        $sql = "SELECT * FROM `php_crud`";
        $result = mysqli_query($connect, $sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
          $sno = $sno + 1;

          $hobbies = str_replace(",","<br>",$row['hobbies']);
          // <td>".$row['password']."</td>
          // <td>".$row['dob']."</td>
          // <td>".$row['address']."</td>
          echo 
                "<tr>
                        <td>".$sno."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$hobbies."</td>
                        <td>".$row['number']."</td>
                        <td>
                              <button type='button' class='edit btn btn-sm btn-primary'>
                              <a href='update.php?updatepro=".$row['sno']."'>Update</a>
                              </button> 

                              <button type='button' class='delete btn btn-sm btn-danger' 
                              data-bs-toggle='modal' data-bs-target='#deleteModal' 
                              data-sno='".$row['sno']."'>Delete</button>

                              <button type='button' class='view btn btn-sm btn-primary'>
                              <a href='individual.php?viewRecord=".$row['sno']."'>view</a>
                              </button> 
                        </td>
                </tr>";
        }
    ?>
  </tbody>
  <button class="btn btn-prime"><a href="index.php">Add Record</a></button>
</table>
    </div>
    <!---------------->
    <!-- --Tables-- -->
    </div>  
    
    <!-- Delete-Modal -->
    <!-- ------------ -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog mt-0">
        <div class="modal-content">
            <div class="modal-body">
            Are you sure you want to delete this record?
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="#" class="btn btn-warning" id="confirmDeleteBtn">Yes</a>
        </div>
        </div>
      </div>
    </div>
    <!-- ------------ -->
    <!-- Delete-Modal -->

    <script src="assets/jquery-3.7.1.js"></script>
    <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script>
      //$(document).ready(function () {
       // $('#myTable').DataTable();
        
        $('#deleteModal').on('show.bs.modal', function (event) {
          let button = $(event.relatedTarget);
          let sno = button.data('sno'); 
          let modal = $(this);

          modal.find('#confirmDeleteBtn').attr('href', 'delete.php?deletepro=' + sno);
        });
      // });
    </script>
     
  </body>
</html>
