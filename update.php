<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$passwd = $row['passwd'];
$fullname = $row['fullname'];

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    $fullname = $_POST['name'];

    $sql = "UPDATE user SET id = $id, username = '$username', passwd = '$passwd', fullname = '$fullname' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:display.php');

    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Reset information App</title>
</head>

<body>
    <div class="container my-5  ">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" id="form">
                    <h3 class="fw-bold my-5">Reset information</h3>
                    <div class="mb-3  ">
                        <label for="exampleinputusername" class="form-label ">Username</label>
                        <input type="text" name="username" class="form-control " id="exampleInputusername"
                            placeholder="Username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control " id="exampleInputPassword1"
                            placeholder="Password" value="<?php echo $passwd; ?>">
                        <div class="mb-3 ">
                            <label for="exampleinputname" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control " id="exampleinputname"
                                placeholder="Name" value="<?php echo $fullname; ?>">
                        </div>
                    </div>
                    <div class="grid gap-3 ">
                        <button type="submit" name="submit" class="btn btn-primary ml-5">Submit</button>
                        <button type="login" name="login" class="btn btn-dark mr-5"><a href="login.php"
                                class="text-light text-decoration-none">Go to Login</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>