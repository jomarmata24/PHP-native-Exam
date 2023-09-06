<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Display Data</title>

</head>

<body>
    <div class="container my-5">
        <button class="btn btn-primary"><a href="login.php" class="text-light text-decoration-none ml-5">Logout</a>
        </button>
        <h3 class="fw-bold my-5">Welcome to Dashboard</h3>

    </div>
    <div class="container my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">FULLNAME</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $passwd = $row['passwd'];
                        $fullname = $row['fullname'];

                        echo '<tr>
                            <th scope ="row">' . $id . '</th>
                            <td>' . $username . '</td>
                            <td>' . $passwd . '</td>
                            <td>' . $fullname . '</td>
                            <td>
                            <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class ="text-light text-decoration-none">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class ="text-light text-decoration-none">Delete</a></button>
                            </td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>

</body>

</html>