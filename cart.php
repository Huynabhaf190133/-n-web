<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php

if(isset($_SESSION["message"])):?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
echo $_SESSION["message"];
unset($_SESSION["message"]);
?>
</div>

<?php endif ?>
    <div class="container">
    <?php
    require_once 'gettt.php';
    ?>

    <?php
    $mysqli=new mysqli('localhost','root','','webds') or die(mysqli_error($mysqli));
    $result=$mysqli->query("select * from cart");
    
    // pre($result->fetch_assoc());
    // function pre($array){
    //     echo '<pre>';
    //     print_r($array);
    //     echo '</pre>';
    // }

    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Số lượng</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php
                while($row=$result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row["cart_name"];?></td>
                    <td><?php echo $row["cart_price"];?></td>
                    <td><?php echo $row["cart_amount"];?></td>
                    <td>
                        <a href="index.php?edit=<?Php echo $row['cart_id'];?>" class="btn btn-info">Edit</a>
                        <a href="gettt.php?delete=<?Php echo $row['cart_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>
    </div>
    
    <div class="row justify-content-center">
        <form action="gettt.php" method="post">
            <div class="row justify-content-center">
                <div class="form-group">
                    <label for="a">Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="a">giá</label>
                    <input type="text" name="price">
                </div>
                <div class="form-group">
                    <label for="a">số lượng</label>
                    <input type="text" name="amount">
                </div>
                <div class="form-group">
                   <button type="submit" name="save">Save</button>
                </div>
            </div>
            
        </form>
    </div>
    </div>
</body>
</html>