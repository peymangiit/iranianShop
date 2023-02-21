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

 if ($row){
    $_SESSION['state_login'] = true;
    $_SESSION['realname'] = $row['realname'];

    if ($row['type'] == 0)
        $_SESSION['user_type'] = "public";
    elseif ($row['type'] == 1){
        $_SESSION['user_type'] = "admin";
        echo("<script type='text/javascript'>location.replace('admin_products.php');</script>");
    }
    echo ("<p style='color:green;'><b> {$row['realname']} عزیز به فروشگاه ایرانیان خوش آمدید </b></p>");
    echo ($_SESSION['user_type']);
 }
 else
 echo ("<p style='color:red;'><b>کلمه کاربری یا کلمه عبوری یافت نشد</b></p>");
 mysqli_close($link);
?>

<?php
include("includes/footer.php")
?>