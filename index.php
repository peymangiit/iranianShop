<?php
  include("includes/header.php")
?>
محصولات  
<?php

  $link = mysqli_connect("localhost","root","","shop_db");
  if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده".mysqli_connect_error());

    $query = "SELECT * FROM products";
    $query_result = mysqli_query($link,$query);
?>
<table style="width: 100%; border:1px;">
  <tr>

    <?php
      $counter =0;
      while ($row=mysqli_fetch_array($query_result)){
        $counter++;
    ?>

    <td style="border-style:dotted; vertical-align:top; width:33%">

      <h4><?php echo ($row['pro_name'])?></h4>
      <a href="product_detail.php?id=<?php echo($row['pro_code'])?> style=text-decoration:none;">
        <img src="<?php echo ($row['pro_image'])?>" width="150px" height="250px" />
      </a>
      <br>
      <p> قیمت : <?php echo($row['pro_price']) ?> &nbsp ريال </p>
      <br>
      <p> تعداد موجودی : <span style="color:red;"><?php echo($row['pro_qty']) ?></span></p>
      <br>

    </td> 
    
  <?php 
    if ($counter%3 == 0)
        echo("<tr></tr>");
  }//end of while
    if ($counter%3 != 0)
      echo("</tr>");
    ?>

  </tr>
</table>


<?php 
  include("includes/footer.php");
?>