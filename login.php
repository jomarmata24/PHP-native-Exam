<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql = "SELECT username, passwd FROM user WHERE username = ? AND passwd = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);


  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    echo '<script>
      alert("Login Successfully!");
  </script>';
    header('location: display.php');
    exit();
  } else {
    echo '<script>
      alert("Incorrect Username or password. Please Try again");
      document.getelementById("form").reset();
  </script>';
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($conn);
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
        <form method="post" id="form">
          <h3 class="fw-bold my-5">Login Here</h3>
          <div class="mb-3  ">
            <label for="exampleinputusername" class="form-label ">Username</label>
            <input type="text" name="username" class="form-control " id="exampleInputusername" placeholder="Username">
          </div>
          <div class="mb-3 ">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control " id="exampleInputPassword1"
              placeholder="Password">
          </div>
          <div class="grid gap-3 ">
            <button type="submit" name="submit" class="btn btn-primary ml-5">Submit</button>
            <button type="register" name="register" class="btn btn-dark mr-5"><a href="register.php"
                class="text-light text-decoration-none">Go to register</a></button>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>

</html>