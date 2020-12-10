<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
$email=$_POST["email"];

// Tạo kết nối
$conn = new mysqli('localhost', 'root', '', 'webds');
 
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} 
 
// Câu SQL Insert
$sql = "INSERT INTO `login`(`account`, `password`,`username`) VALUES ('$user','$pass','$email')";
 
// Thực hiện thêm record
if ($conn->query($sql) === TRUE) {
    echo "Thêm record thành công";
    echo "<script>alert('You have logged in successfully !')</script>";
    echo "<script>window.open('sign.php','_self')</script>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
    echo "<script>windown.open('sign.php')</script>";
}
 
// Ngắt kết nối
$conn->close();

?>