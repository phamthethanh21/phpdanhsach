<!DOCTYPE html>
<?php
    include_once("ketnoi.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hàng mới</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <caption>Thêm mới hàng hóa</caption>
            <tr>
                <td>Mã hàng</td>
                <td><input type="text" name="txtmahang" ></td>
            </tr>
            <tr>
                <td>Tên hàng</td>
                <td><input type="text" name="txttenhang"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" name="txtdongia"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="txtsoluong"></td>
            </tr>
            <tr>
                <td>Đơn vị tính</td>
                <td><input type="text" name="txtdvt"></td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="txtanh"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Thêm mới">
                    <input type="reset" name="" value="Nhập lại">
                </td>
            </tr>
            <tr>
                <td colspan="2"><p id="loi" style="color:red"></p></td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_POST["submit"])) {
            $mahang = $_POST["txtmahang"];
            $tenhang = $_POST["txttenhang"];
            $dongia = $_POST["txtdongia"];
            $soluong = $_POST["txtsoluong"];
            $dvt = $_POST["txtdvt"];
            $anh = $_FILES["txtanh"]["name"];
            $dd = $_FILES["txtanh"]["tmp_name"];
            move_uploaded_file($dd,"$anh");
            $sql = "insert into hanghoa Values('$mahang','$tenhang','$dongia','$soluong','$dvt','$anh')";
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result) > 0) {
				echo "Mã hàng đã tồn tại!!!Mời bạn nhập lại!";
			}
			else{

				$sql="insert into hanghoa Values('$mahang','$tenhang',$dongia,$soluong,'$dvt','$anh')";
				$result=mysqli_query($con,$sql);

				if ($result) {
					header("location:DShang.php");
				}
				else{
					?>
						<script type="text/javascript">
							document.getElementById("loi").innerHTML="Lỗi! Mời kiểm tra lại dữu liệu!";
						</script>
					<?php 	
				}
			}
		}
	?>
</body>
</html>