<!DOCTYPE html>
<?php
    include "ketnoi.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua hang</title>
</head>
<body>
    <?php
        $mahang = $_GET["Mahang"];
        $sql = "Select * from hanghoa where Mahang = '$mahang'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);

        if (isset($_POST['submit'])) {
            // lay thong so
            $tenhang=$_POST['txttenhang'];
            $dongia=$_POST['txtdongia'];
            $soluong=$_POST['txtsoluong'];
            $dvt=$_POST['txtdonvitinh'];
            $anh="";
            if (isset($_FILES['txtanh'])) {
                $anh=$_FILES['txtanh']["name"];
                $duongdan=$_FILES['txtanh']['tmp_name'];
                move_uploaded_file($duongdan, "images/$anh");
            }
    
            // Sửa
            if ($anh=="") {
                $sql="update hanghoa set Tenhang='$tenhang', Dongia=$dongia, Soluong=$soluong, DVT='$dvt'  where Mahang='$mahang'";
            }
            else{
                $sql="update hanghoa set Tenhang='$tenhang', Dongia=$dongia, Soluong=$soluong, DVT='$dvt', Anh='$anh'  where Mahang='$mahang'";
            }
    
            // echo $sql;
            mysqli_query($con,$sql);
            header("location:danhsachhang.php");
        }
    ?>
    <form method ="post" enctype="multipart/form-data">
        <table>
            <tr>
            <td>Mã hàng</td>
				<td>
					<input type="text" name="txtMahang" value="<?php echo $row["Mahang"]; ?>" readonly="true">
				</td>
				<td rowspan="6"><img src="images/<?php echo $row["Anh"];?>" width='200px' height='200px' alt="" name="imgHang"></td>
            </tr>
            <tr>
                <td>Tên hàng</td>
                <td>
                    <input type="text" name="txttenhang" value="<?php echo $row["Tenhang"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td>
                    <input type="text" name="txtdongia" value="<?php echo $row["Dongia"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td>
                    <input type="text" name="txtsoluong" value="<?php echo $row["Soluong"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Đơn vị tính</td>
                <td>
                    <input type="text" name="txtdonvitinh" value="<?php echo $row["DVT"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td>
                    <input type="file" name="txtanh" value="<?php echo $row["Anh"]; ?>" onchange="change_img();">
                </td>
            </tr>
            <tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Sửa">
					<input type="reset" name="reset" value="Làm lại">
				</td>
			</tr>
        </table>
    </form>
</body>
</html>

<script>
	function change_img()
	{
		var Element=document.getElementsByName("txtanh")[0];
		var img=document.getElementsByName('imgHang')[0];
		var url=URL.createObjectURL(Element.files[0]);
		img.src=url;
	}
</script>