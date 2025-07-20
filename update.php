<?php
    include "database.php";

$sno = $_GET['updatepro']; 
// if (isset($_GET['updatepro'])){
    
$sql = "SELECT * FROM `php_crud` WHERE sno=$sno";
$result = mysqli_query($connect, $sql);
if (!$result) {
    die(mysqli_error($connect));
}
$row = mysqli_fetch_assoc($result);

// Assign the fetched data to variables
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$gender = $row['gender'];
$allhobbies = $row['hobbies'];
$hobbies = explode(",", $allhobbies);
// echo $allhobbies;
// exit();
$dob = $row['dob'];
$number = $row['number'];
$address = $row['address'];

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $allhobbies = $_POST['hobbies'];
    $hobbies = implode(",", $allhobbies);
    $dob = $_POST['dob'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    // Start building the update query
    $sql = "UPDATE `php_crud` SET `name` = '$name', `email` = '$email', `password` = '$password', `number` = '$number', `dob` = '$dob', `gender` = '$gender', `hobbies` = '$hobbies', `address` = '$address'";

    // Check if a new password is provided
    if (!empty($password)) {
        $sql .= ", `password` = '$password'";
    }

    $sql .= " WHERE `php_crud`.`sno` = '$sno'";

    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die(mysqli_error($connect));
    } else {
        header('Location: view.php');
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP - Operation</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap.bundle.min.js"></script>

    <style>
       body{
        background-color: #e6e6e6;
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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="crud_logo.jpeg" alt="Crud Logo" height="28"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
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
        <!-- Form -->
        <div class="container mt-5">
            <form method="post">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name...">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email...">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Password</label>
                        <input type="" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Type password...">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Contact No:</label>
                        <input type="text" class="form-control" id="number" name="number" value="<?php echo $number; ?>" placeholder="Contact Number">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Hobbies</label>
                        <input type="checkbox" name="hobbies[]" id="cricket" class="hobbies" value="Cricket" <?php if (in_array("Cricket", $hobbies)) echo "checked"; ?>><label for="cricket">Cricket</label>
                        <input type="checkbox" name="hobbies[]" id="basketball" class="hobbies" value="Basketball" <?php if (in_array("Basketball", $hobbies)) echo "checked"; ?>><label for="basketball">Basketball</label>
                        <input type="checkbox" name="hobbies[]" id="chess" class="hobbies" value="Chess" <?php if (in_array("Chess", $hobbies)) echo "checked"; ?>><label for="chess">Chess</label>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Gender</label>
                        <input type="radio" name="gender" id="male" class="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>><label for="male">Male</label>
                        <input type="radio" name="gender" id="female" class="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>><label for="female">Female</label>
                        <input type="radio" name="gender" id="other" class="gender" value="Other" <?php if ($gender == "Other") echo "checked"; ?>><label for="other">Other</label>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Write your complete address..." rows="3"><?php echo $address; ?></textarea>
                    </div>
                </div>
                <button class="btn btn-success" name="submit" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>