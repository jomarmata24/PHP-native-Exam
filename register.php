<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $Name = $_POST['name'];
    $passwd = $_POST['password'];
    $sql = " INSERT INTO user (username, passwd, fullname) VALUES ('$username', '$passwd', '$Name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
      alert("New User Added Succesfully");
      document.getelementById("form").reset();
  </script>';
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
    <title>Login App</title>
</head>

<body>
    <div class="container my-5  ">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" id ="form">
                    <h3 class="fw-bold my-5">Register Here</h3>
                    <div class="mb-3  ">
                        <label for="exampleinputusername" class="form-label ">Username</label>
                        <input type="text" name="username" class="form-control " id="exampleInputusername"
                            placeholder="Username">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleinputname" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control " id="exampleinputname" placeholder="Name">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control " id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    <div class="grid gap-3 ">
                        <button type="submit" name="submit" class="btn btn-primary ml-5">Submit</button>
                        <button type="login" name="login" class="btn btn-dark mr-5"><a href="login.php" class = "text-light text-decoration-none">Go to Login</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>