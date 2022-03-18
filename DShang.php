<!DOCTYPE html>
<?php
    include_once('ketnoi.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sql= "Select*from hanghoa";
        $result=mysqli_query($con,$sql);
        ?>
        <table border="1" cellspacing="0" cellpadding="3px" align="center">
            <caption>Danh sách hàng hóa</caption>
            <tr>
                <td colspan="6" align="center"><a href="themhang.php"><button>Thêm mới</button></a></td>
            </tr>
            <tr>
                <th>Mã Hàng</th>
                <th>Tên hàng</th>
                <th>ĐƠn giá</th>
                <th>Số lượng</th>
                <th>ĐƠn vị tính</th>
                <th>Ảnh</th>
                <img src="" alt="">
                <th>Sửa</th>
	   		    <th>Xóa</th>
            </tr>
        <?php
        while($row=mysqli_fetch_array($result)){
            $mahang = $row['Mahang'];
            echo"<tr>";
                echo"<td>".$row["Mahang"]."</td>";
                echo"<td>".$row["Tenhang"]."</td>";
                echo"<td>".$row["Dongia"]."</td>";
                echo"<td>".$row["Soluong"]."</td>";
                echo"<td>".$row["DVT"]."</td>";
                echo"<td><img src='R.jpg'".$row["Anh"]."'width='50' height='50'></td>";
                echo "<td><a href='suahang.php?mahang=$mahang'><img src='ghi.jpg' width='30px' height='30px'></a></td>";
	   			echo "<td><a href='xoa.php?mahang=$mahang'><img src='delete.png' width='30px' height='30px'></a></td>";
            echo"</tr>";
        }
        ?>
</body>
</html>