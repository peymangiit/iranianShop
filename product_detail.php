<?php
include("includes/header.php")
?>

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
<p > قیمت : <?php echo($row['pro_price']) ?> &nbsp ريال </p>
<p> توضیحات : <?php echo($row['pro_detail']) ?> </p>
<p> تعداد موجودی : <span style="color:red;"><?php echo($row['pro_qty']) ?></span></p>

<a  href="order.php?id=<?php echo($row['pro_code'])?>" style="font-weight: bold;color:green; text-decoration:none"> ثبت سفارش و خرید پستی </a>


</td>

<td><img src="<?php echo ($row['pro_image'])?>"  /></td>
    
   

<?php
    }// if end
?>
 </tr>
</table>

<?php
include("includes/footer.php")
?>