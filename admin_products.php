<?php
include("includes/header.php");

if(!(isset($_SESSION['state_login']) && $_SESSION['state_login']===true && $_SESSION['user_type'] == "admin")){
    echo("<script type='text/javascript'>
            location.replace('index.php');
          </script>");
}
?>
<br>
<form name="add_products"  action="./action_admin_products.php" method="post" enctype="multipart/form-data">

                    <table style="width: 100%;margin-left:auto;margin-right:auto;border:0;" >
                        <tr>
                            <td style="width: 22%;"> کد کالا<span style="color:red;">*</span></td>
                            <td style="width: 78%;"><input type="text" id="pro_code" name="pro_code"></td>
                        </tr>
                        <tr>
                            <td >نام کالا <span style="color:red;">*</span></td>
                            <td ><input type="text" style="text-align: right;" id="pro_name" name="pro_name"></td>
                        </tr>
                        <tr>
                            <td > موجودی کالا<span style="color:red;">*</span></td>
                            <td ><input type="text" style="text-align: left;" id="pro_qty" name="pro_qty"></td>
                        </tr>
                        <tr>
                            <td > قیمت کالا <span style="color:red;">*</span></td>
                            <td ><input type="text" style="text-align: left;" id="pro_price" name="pro_price"> ريال </td>
                        </tr>
                        <tr>
                            <td > آپلود تصویر کالا <span style="color:red;">*</span></td>
                            <td ><input type="file" style="text-align: left;" id="pro_image" name="pro_image" size="30"></td>
                        </tr>
                        <tr>
                            <td > توضیحات کالا <span style="color:red;">*</span></td>
                            <td ><textarea id="pro_detail" name="pro_detail" cols="45" rows="10" wrap="virtual"></textarea>
                             </td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                            <td>
                                <input   type="submit" id="ersal" name="ersal" value=" افزودن کالا " >
                                &nbsp;&nbsp;&nbsp;
                                <input type="reset" value="جدید">
                            </td>
                        </tr>
                    </table>
                </form>



<?php
 include("includes/footer.php");
 ?>