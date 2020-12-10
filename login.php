<?php
$account=$_POST["user"];
$pass=$_POST["pass"];
$account = strip_tags($account);
$account = addslashes($account);
$pass = strip_tags($pass);
$pass = addslashes($pass);
// Create connection
$conn = mysqli_connect("localhost", "root", "", "webds");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$run_login = mysqli_query($conn, "select * from login where password='$pass' AND account='$account'" );


$check_login = mysqli_num_rows($run_login);
  
$row_login = mysqli_fetch_array($run_login);

if($check_login == 0){
    echo "<script>alert('Password or email is incorrect, please try again!')</script>";
    header('location: sign.php');
    exit();
   }
else
{
    echo "<script>alert('You have logged in successfully !')</script>";
    // Lấy ra thông tin người dùng và lưu vào session
		
      // Thực thi hành động sau khi lưu thông tin vào session
      // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
    header('Location: index.php');

} 

mysqli_close($conn);
?>