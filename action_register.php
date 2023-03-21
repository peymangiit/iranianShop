<?php
include("includes/header.php");
?>

Form Method: <?= $_SERVER["REQUEST_METHOD"]?> </br>

<?php
    //&& isset($_POST['type'])&& !empty($_POST['type'])
if (isset($_POST['realname'])&& !empty($_POST['realname'])&& isset($_POST['username'])&& !empty($_POST['username'])&& isset($_POST['password'])&& !empty($_POST['password'])&& isset($_POST['repassword'])&& !empty($_POST['repassword'])&& isset($_POST['email'])&& !empty($_POST['email'])) {
    # code...
    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
    $type = $_POST['type'];
} else {
    exit("برخی از فیلدها مقدار دهی نشده");
}

if ($password!=$repassword) {
    exit("کلمه عبور و تکرار آن مشابه نیست");
}
if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
    exit("پست الکتریکی وارد شده صحیح نمیباشد");
}

$link = mysqli_connect("localhost","root","","shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده".mysqli_connect_error());

$query= "INSERT INTO users(realname,username,password,email,type)VALUES('$realname','$username','$password','$email','$type')";

//اگر عملیات قرار دادن اطلاعات به درستی انجام شد پیام موفق و غیر آن پیام ناموفق
if (mysqli_query($link,$query))
    echo("<p style='color:green;'><b>".$realname." گرامی عضویت شما با نام کاربری ".$username." در فروشگاه ایرانیان با موفقیت انجام شد "."</b></p>");
else
    echo("<p style='color:red;'><b>عضویت شما در فروشگاه به درستی انجام نشد</b></p>");

mysqli_close($link);//قطع ارتباط با پایگاه داده

?>

<!-- برای نشان دادن اطلاعات ثبت شده روی صفحه -->
<!-- <div dir="ltr" style="text-align: left;"> -->
<!-- <?php
    echo ("realname: ".$realname."<br>");
    echo ("username: ".$username."<br>");
    echo ("password: ".$password."<br>");
    echo ("repassword: ".$repassword."<br>");
    echo ("email: ".$email."<br>");
    echo ("type: ".$type."<br>");
?>
</div> -->

<?php
 include("includes/footer.php");
 ?>