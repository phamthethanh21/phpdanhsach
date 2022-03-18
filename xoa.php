
<?php
    include_once("ketnoi.php");

    $mahang=$_GET['mahang'];
    $sql="Delete from hanghoa where Mahang='$mahang'";
        if (mysqli_query($con,$sql)) {
            echo "Xóa thành công";
        }
        else{
            echo "Error updating record: $sql" . $mysqli_error($con);
        }
    header("location:DShang.php");
?>