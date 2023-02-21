<?php
include("includes/header.php")
?>

<?php

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}
else 
    exit(" فیلد های ورودی به درستی مفدار دهی کنید");

$link = mysqli_connect("localhost","root","","shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده".mysqli_connect_error());
$query = "SELECT * FROM users WHERE username='$username' AND  password='$password'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
 if ($row)
    echo ("<p style='color:green;'><b> {$row['realname']} عزیز به فروشگاه ایرانیان خوش آمدید </b></p>");
 else
 echo ("<p style='color:red;'><b>کلمه کاربری یا کلمه عبوری یافت نشد</b></p>");
 mysqli_close($link);
?>

<?php
include("includes/footer.php")
?>