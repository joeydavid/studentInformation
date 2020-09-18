<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', birth_day = '$bday',
    gender = '$gender' WHERE id = '$id'";
    $con->query($sql) or die ($con->error);

    echo header("Location: details.php?ID=".$id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit and Update</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <form action="" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>">
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>">
            </div>

            <div class="form-group">
                <label>Birthday</label>
                <input class="form-control" type="text" name="birthday" id="birthday" value="<?php echo $row['birth_day']; ?>">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" id="gender">
                    <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
                </select>
            </div>

            <div class="form-group">
                <input class="btn btn-info btn-sm" type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>
</div>

</body>
</html>