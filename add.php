<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `student_list`(`first_name`, `last_name`,`birth_day`,`gender`) 
    VALUES ('$fname', '$lname', '$bday', '$gender')";
    $con->query($sql) or die ($con->error);

    echo header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body>
    <div class="container mt-5">
    <a class="btn btn-primary btn-sm" href="index.php">Back</a><h1>Add New Student </h1>
        <div class="row justify-content-center">
            <form action="" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="firstname" id="firstname" required placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lastname" id="lastname" required placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label>Birthday</label>
                    <input class="form-control" type="text" name="birthday" id="birthday" required placeholder="Enter Birthday">
                </div>

                <div class="form-group">
                    <select name="gender" id="gender">
                        <option value="disable">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                        <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Add Student">
                </div>

            </form>
        </div>
    </div>
</body>
</html>



<!-- <form action="" method="post">

    <label>First Name</label>
    <input type="text" name="firstname" id="firstname">

    <label>Last Name</label>
    <input type="text" name="lastname" id="lastname">

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <input type="submit" name="submit" value="Submit Form">
</form> -->