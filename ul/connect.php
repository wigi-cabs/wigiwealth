<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(fistName, lastName, gender, email, number)values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $firstName, $lastName, $gender, $email, $number);
    $stmt->execute();
    echo "Registration Succesfully ...";
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registeration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="card card-primary">
                <div class="card-heading text-center">
                    <h1>Registration Form </h1> 
                </div>
                <div class="card-body">
                    <form action="connect.php" method="post">
                        <div class="from-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" />
                        </div>
                        <div class="from-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" />
                        </div>
                        <div class="from-group">
                            <label for="gender">Gender</label>
                            <div>
                            <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male">Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" id="female">Female</label>
                            <label for="Others" class="radio-inline"><input type="radio" name="gender" value="o" id="Others">Others</label>
                        </div>
                        </div>
                        <div class="from-group"></div>
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" />
                        </div>
                        <div class="from-group"></div>
                            <label for="number">Phone No.</label>
                            <input type="text" class="form-control" id="number" name="number" />
                        </div>
                       
                        <input type="submit" class="btn btn-primary" />                 
                    </form>
                </div>
                <div class="card-footer text-right">
                    <small>&copy; Aman Jaiswar</small>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>

