<?php
include 'database.php';

if (isset($_POST['submit'])){
  // $sno = $_POST['sno'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $allhobbies = $_POST['hobbies'];
  $hobbiz = array_filter ($allhobbies);
  $hobbies = implode (",", $hobbiz);
  // echo $allhobbies;echo "<br>";
  // echo $hobbies;
  // exit();
  $dob = $_POST['dob'];
  $number = $_POST['number'];
  $address = $_POST['address'];

    $sql = "INSERT INTO `php_crud` (`name`, `email`, `password`, `gender`, `hobbies`, `dob`, `number`, `address`) VALUES ('$name', '$email', '$password', '$gender', '$hobbies', '$dob', '$number', '$address')";
    $result = mysqli_query($connect, $sql);
  if(!$result){
    die(mysqli_error($connect));
  }
  else{
    header('location:view.php');
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP - Operation</title>

    <!-- <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap.bundle.min.js"></script>

    <style>
      body{
        background-color: #e6e6e6;
      }
      h1{
        text-align: center;
      }
        label{
            font-size: 16px;
            font-weight: 700;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        form{
          padding: 20px;
          background-color: #fff;
          border-radius: 5px;
          box-shadow: black 1px 1px 6px 1px;
          /* box-shadow: inset 10px 10px 90px 10px rgba(0,0,0,0.15); */
        }
        .gender{
          margin: 0px 5px 0px 30px;
        }
        .hobbies{
          margin: 0px 5px 0px 15px;
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
                  <a class="nav-link" href="view.php">Data</a>
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
  
  
    <!-- --InPuts-- -->
    <!---------------->
    <div><h1 class="my-3">CRUD Application</h1></div>
    <div class="container mt-4">
      <form method="post">
        <div class="row">
  
              <div class="mb-3  col-md-4">
                  <label>Name</label>
                  <input type="text" class="form-control  col-md-4" id="name" name="name" value="" placeholder="enter your name..." >
              </div>
  
              <div class="mb-3  col-md-4">
                  <label>Email</label>
                  <input type="email" class="form-control col-md-4" id="email" name="email" value="" placeholder="enter your Email...">
              </div>  
  
              <div class="mb-3 col-md-4">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" name="password" value=""  placeholder="type password...">
              </div>
          
              <div class="col-md-4 mb-3">
                <label>Contact No:</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Contact Number">
              </div>
  
              <div class="col-md-4 mb-3">
                <label>Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="enter your DOB...">
              </div>
  
              <div class="mt-4 col-md-4" class="hobbies">
                <label aria-required="">Hobbies</label>
                <input type="hidden" name="hobbies[]" required>
  
                <span>
                  <input type="checkbox" 
                  name="hobbies[]" 
                  id="cricket" value="Cricket" class="hobbies"><label for="cricket">Cricket</label>
                </span>
                
                <span>
                  <input type="checkbox" 
                  name="hobbies[]" 
                  id="basketball" value="Basketball" class="hobbies"><label for="basketball">Basketball</label>
                </span>
                
                <span>
                  <input type="checkbox" 
                  name="hobbies[]" id="chess" value="Chess" class="hobbies"><label for="chess">Chess</label>
                </span>
                 
              </div>
            
              <div class="mb-3 col-md-4">
                <label>Gender</label>
                <input type="hidden" name="gender" required>
  
                <input type="radio" name="gender" id="male" class="gender" value="Male"><label for="male">Male</label>
                
                <input type="radio" name="gender" id="female" class="gender" value="Female"><label for="female">Female</label>
                
                <input type="radio" name="gender" id="other" class="gender" value="Other"><label for="other">Other</label>
                 
              </div>
            
              <div class="mb-3">
                <label>Address</label>
                <textarea type="address" class="form-control" id="address" name="address" rows="3"></textarea>
              </div>
              
            </div>
            <button class="btn btn-primary" name="submit" type="submit" >Submit</button>
        </form>
    </div>
    <!---------------->
    <!-- --InPuts-- -->

  
    </div>
  </body>
</html>