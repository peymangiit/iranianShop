<?php
include("includes/header.php")
?>

<?php
//اگر کاربری لاگین نکرده این صفحه را نشان نده و به صفحه دیگری برو
if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true)){
    echo("<script type='text/javascript'>
            location.replace('notLogged.php');
          </script>");
}
?>


<table style="width: 100%;">
    <tr>
        <td style="width: 70%;"> 
        <form name="register"  action="./order_register.php" method="post">

            <table style="width: 80%;margin-left:auto;margin-right:auto;border:0;" >
                <tr>
                    <td style="width: 40%;"> کد کالا <span style="color:red;">*</span></td>
                    <td style="width: 60%;"><input type="text" id="realname" name="realname"></td>
                </tr>
                <tr>
                    <td > نام کالا <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="username" name="username"></td>
                </tr>
                <tr>
                    <td > تعداد درخواستی <span style="color:red;">*</span></td>
                    <td ><input type="number" style="text-align: left;" id="password" name="password"></td>
                    <!-- <style>
                    .err { background: #ffe6ee; border: 1px solid #b1395f; }
                    .emsg { color: #c12020; font-weight: bold; }
                    </style>
                    <div id="message" class="errmsg"></div>  -->
 
                </tr>
                <tr>
                    <td > قیمت واحد کالا <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="repassword" name="repassword"></td>
                </tr>
                <tr>
                    <td > مبلغ قابل پرداخت <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="email" name="email"></td>
                </tr>


                <tr style="height: 12px;"></tr>

                <tr>
                    <td > نام خریدار <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="email" name="email"></td>
                </tr>
                
                <tr>
                    <td > شماره تماس <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="email" name="email"></td>
                </tr>

                <tr>
                    <td > پست الکتریکی <span style="color:red;">*</span></td>
                    <td ><input type="text" style="text-align: left;" id="email" name="email"></td>
                </tr>

                <tr>
                    <td > آدرس <span style="color:red;">*</span></td>
                    <td ><textarea name="" id="" cols="22" rows="5"></textarea></td>
                </tr>

                <tr>
                    <td><br><br></td>
                    <td>
                        <input   type="button" value="ثبت نهایی" >
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" value="جدید">
                    </td>
                </tr>
            </table>
        </form>
    </td>


    <td style="width: 30%;">
        <?php
            $link = mysqli_connect("localhost","root","","shop_db");
            if (mysqli_connect_errno())
                exit("خطایی به شرح زیر رخ داده".mysqli_connect_error());

            if (isset($_GET['id']))
                $pro_code = $_GET['id'];

            $query = "SELECT * FROM products WHERE pro_code = '$pro_code'";
            $q_result = mysqli_query($link,$query);

            ?>

        <table style="width: 100%;">
            <tr>

                <?php
                    if ($row=mysqli_fetch_array($q_result)){
                ?>
                <td style="border-style:dotted; vertical-align:top;">

                <h4><?php echo ($row['pro_name'])?></h4>

                <br>
                <img src="<?php echo ($row['pro_image'])?>"  />
                <p > قیمت : <?php echo($row['pro_price']) ?> &nbsp ريال </p>
                <p> توضیحات : <?php echo($row['pro_detail']) ?> </p>
                <p> تعداد موجودی : <span style="color:red;"><?php echo($row['pro_qty']) ?></span></p>

                
                </td>

   

        <?php
            }// if end
        ?>
            </tr>
        </table>
     </td>
    </tr>
</table>
                


<?php
include("includes/footer.php")
?>