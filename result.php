<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];
}else{
    echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();
$search = $_GET['search'];
$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body>
<div class="container mt-5">
    <h1>Student Management System</h1>
    <br>
    <br>
    
    <form action="result.php" method="get" class="mb-3">
        <input type="text" name="search" id="search" placeholder="Search Name">
        <button class="btn btn-primary btn-sm" type="submit">Go</button>
    </form>

        <a class="btn btn-primary btn-sm" href="index.php">Back</a>
    <div class="row justify-content-center">
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
            <?php do{ ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()) ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>