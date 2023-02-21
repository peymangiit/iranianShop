<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه ایرانیان</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="divTable">
        <div class="divTableRow">
            <div class="divTableCell">
                <header class="divTable">
                    <div class="divTableRow">
                        <div class="divTableCell">لوگوی سایت</div>
                    </div>
                </header>
                <nav class="divTable">
                    <ul class="divTableRow">
                        <li class="divTableCell"><a class="set_style_link" href="index.php">صفحه اصلی</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="register.php"> عضویت در سایت </a></li>
                        <?php
                                //اگر لاگین انجام شده خروج از سایت را نشان بده
                            if(isset($_SESSION['state_login']) && $_SESSION['state_login']===true){
                                    //becarefull of single qoutation'' and double qoutation"" using echo
                                echo("<li class='divTableCell'><a class='set_style_link' href='logout.php'> خروج از سایت ({$_SESSION['realname']}) </a></li>");
                            }
                            else
                            // در غیر این صورت ورود به سایت نشان بده
                                echo("<li class='divTableCell'><a class='set_style_link' href='login.php'> ورود به سایت </a></li>");

                            ?>
                        <li class="divTableCell"><a class="set_style_link" href="#"> درباره ما</a></li>                      
                        <li class="divTableCell"><a class="set_style_link" href="#"> ارتباط با ما</a></li>
                    </ul>
                </nav>
                <section class="divTable">
                    <section class="divTableRow">
                        <aside class="divTableCell" style="width:25%;"> بخش امکانات سایت</aside>
                        <section class="divTableCell" style="width:75%;"> 