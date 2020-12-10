<?php

session_start();


$mysqli=new mysqli("localhost","root","","webds") or die(mysqli_error($mysqli));
if(isset($_POST["save"])){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $amount=$_POST["amount"];



    $mysqli->query("INSERT INTO `cart`(`cart_name`, `cart_price`, `cart_amount`) values('$name','$price','$amount')");
    $_SESSION["message"]="Record has been saved !";
    $_SESSION["msg_type"]="Success";

    header("location: index.html");
}

if(isset($_GET["delete"])){
    $id=$_GET["delete"];
    $mysqli->query("DELETE FROM `cart` WHERE cart_id='$id'") or die(mysqli_error());;
}
if(isset($_GET["edit"])){
    $id=$_GET["edit"];
    $mysqli->query("UPDATE `cart` SET `cart_name`=[value-2],`cart_price`=[value-3],`cart_amount`=[value-4] WHERE 1") or die(mysqli_error());;
    $_SESSION["message"]="Record has been deleted !";
    $_SESSION["msg_type"]="danger";
}
?>