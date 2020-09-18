<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
    echo "Welcome ".$_SESSION['UserLogin']. "<br/> <br/>";
}else{
    echo header("Location: index.php");
}

include_once("connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-2">
<a class="btn btn-primary btn-sm mb-2" href="index.php">Back</a>
    <div class="row justify-content-center">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th colspan="2">ACTION</th>
                </tr>
            </thead>
            <tr>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['birth_day']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="edit.php?ID=<?php echo $row['id']; ?>">EDIT</a>
                    <form action="delete.php" method="post">
                        <?php if($_SESSION['Access'] == "administrator"){?>
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">DELETE</button>
                        <?php } ?>
                        <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>