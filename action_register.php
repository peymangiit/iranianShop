<?php
include("includes/header.php");
?>

Form Method: <?= $_SERVER["REQUEST_METHOD"]?> </br>

<?php

if (isset($_POST['realname'])&& !empty($_POST['realname'])&& isset($_POST['username'])&& !empty($_POST['username'])&& isset($_POST['password'])&& !empty($_POST['password'])&& isset($_POST['repassword'])&& !empty($_POST['repassword'])&& isset($_POST['email'])&& !empty($_POST['email'])) {
    # code...
    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else {
    # code...
    exit("برخی از فیلدها مقدار دهی نشده");
}

if ($password!=$repassword) {
    exit("کلمه عبور و تکرار آن مشابه نیست");
}
if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
    exit("پست الکتریکی وارد شده صحیح نمیباشد");
}
?>

<div dir="ltr" style="text-align: left;">

<?php
echo ("realname: ".$realname."<br>");
echo ("username: ".$username."<br>");
echo ("password: ".$password."<br>");
echo ("repassword: ".$repassword."<br>");
echo ("email: ".$email."<br>");
?>
</div>

<?php
                include("includes/footer.php");
                ?>