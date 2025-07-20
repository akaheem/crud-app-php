<?php
include 'database.php';
if(isset($_GET['viewRecord'])){
// $sno = $_GET['viewRecord'];
  $sno = mysqli_real_escape_string($connect, $_GET['viewRecord']);
  $sql = "SELECT * FROM `php_crud` WHERE sno=$sno";
  $result = mysqli_query($connect, $sql);
  if (!$result) {
      die(mysqli_error($connect));
  }
  $row = mysqli_fetch_assoc($result);
  
  // mysqli_free_result($result);
  // mysqli_close($connect);

// $name = $row['name'];
// $email = $row['email'];
// $gender = $row['gender'];
// $allhobbies = $row['hobbies'];
// $hobbies = explode(",", $allhobbies);
// $dob = $row['dob'];
// $number = $row['number'];
// $address = $row['address'];
}
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
      <!-- <th scope="col">S.No</th> -->
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <th scope="col">DoB</th>
      <th scope="col">Number</th>
      <th scope="col">Address</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
        // $sql = "SELECT * FROM `php_crud`";
        // $result = mysqli_query($connect, $sql);
        // $row = mysqli_fetch_assoc($result);
        {
          // <td>".$row['sno']."</td>
          // <td>".$sno."</td>

          $hobbies = str_replace(",","<br>",$row['hobbies']);
          echo 
          "<tr>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['password']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$hobbies."</td>
                        <td>".$row['dob']."</td>
                        <td>".$row['number']."</td>
                        <td>".$row['address']."</td>
                        <td>
                              <button type='button' class='edit btn btn-sm btn-primary'>
                              <a href='update.php?updatepro=".$row['sno']."'>Update</a>
                              </button> 
                        </td>
                           
                </tr>";
              }
    ?>
  </tbody>
</table>
    </div>
    <!---------------->
    <!-- --Tables-- -->
    </div>  
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <!-- <script> -->
       <!-- $(document).ready(function () {
       $('#myTable').DataTable();
       }); -->
    <!-- </script> -->
  </body>
</html>
