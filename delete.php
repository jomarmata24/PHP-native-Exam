<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];;

    $sql = "DELETE FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo '<script>
        alert("Delete Succesfully");
    </script>';
    header('location:display.php');
    }else{
        echo '<script>
        alert("Failed!");
    </script>';
        header('location:display.php');
    }
}
?>