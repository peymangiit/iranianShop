<?php
include("includes/header.php");

if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type'] == "admin")){
    echo("<script type='text/javascript'>
            location.replace('index.php');
          </script>");
}
?>
<?php
    //var_dump($_FILES['pro_image']);
    if (isset($_FILES['pro_image'])){
        $image_name = $_FILES['pro_image']['name'];
        $image_type = $_FILES['pro_image']['type'];
        $image_tmp = $_FILES['pro_image']['tmp_name'];
        $image_err = $_FILES['pro_image']['error'];
        $image_size = $_FILES['pro_image']['size'];

        $target_file = "images/uploads/{$image_name}";

        if ($image_err)//اگر ارور هر عددی به چز صفر بود
            exit("خطا رخ داده است");
        if ($image_size > 200*1024)
            exit("حجم فایل زیاد است");
        if ($image_type!="image/gif" && $image_type!="image/jpg" && $image_type!="image/jpeg" && $image_type!="image/png")
            exit("لطفاً فایل تصویر آپلود کنید");
        $movefile = move_uploaded_file($image_tmp,$target_file);
        if ($movefile)
            echo("<p style='color:green;'><b> فایل با موفقیت ارسال شد </b></p>");
        else
            echo("<p style='color:red;'><b> فایل با موفقیت ارسال نشد </b></p>");

    }

    if (isset($_POST['pro_code']) && !empty($_POST['pro_code']) && isset($_POST['pro_name']) && !empty($_POST['pro_name']) && isset($_POST['pro_qty']) && !empty($_POST['pro_qty']) && isset($_POST['pro_price']) && !empty($_POST['pro_price']) && isset($_POST['pro_detail']) && !empty($_POST['pro_detail'])) {
        $pro_code   = $_POST['pro_code'];
        $pro_name   = $_POST['pro_name'];
        $pro_qty    = $_POST['pro_qty'];
        $pro_price  = $_POST['pro_price'];
        $pro_detail = $_POST['pro_detail'];
    }
    //var_dump($_FILES['pro_image']);
    $link = mysqli_connect("localhost","root","","shop_db");
    if (mysqli_connect_errno())
        exit("خطایی به شرح زیر رخ داده".mysqli_connect_error());
    $query = "INSERT INTO products(pro_code,pro_name,pro_qty,pro_price,pro_image,pro_detail) VALUES('$pro_code','$pro_name','$pro_qty','$pro_price','$target_file','$pro_detail') ";
    
    if (mysqli_query($link,$query))
        echo("<p style='color:green;'><b>کالا با موفقیت در پایگاه داده ذخیره شد</b></p>");
    else
        echo("<p style='color:red;'><b>ذخیره کالا به درستی انجام نشد</b></p>");
    
    mysqli_close($link);//قطع ارتباط با پایگاه داده
?>



<?php
 include("includes/footer.php");
?>