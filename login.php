<?php
include("includes/header.php")
?>
<?php

?>
<script type="text/javascript">
    function check_empty() {
        let username = document.getElementById("username").value;
        if(username=="")
        alert("وارد کردن نام کاربری الزامی است");
        else {
            let r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
            if(r==true){
                document.register.submit();
            }
        }
    }
</script>
<form name="login"  action="./action_login.php" method="post">

  <table style="width: 50%;margin-left:auto;margin-right:auto;border:0;" >
   
    <tr>
        <td style="width: 40%;"> نام کاربری <span style="color:red;">*</span></td>
        <td style="width: 60%;"><input type="text" style="text-align: left;" id="username" name="username"></td>
    </tr>
    <tr>
        <td > کلمه عبور<span style="color:red;">*</span></td>
        <td ><input type="password" style="text-align: left;" id="password" name="password"></td>
    </tr>
    <tr>
        <td><br><br></td>
            <td>
                        <input   type="button" value="ورود" onclick="check_empty()">
                        &nbsp;&nbsp;&nbsp;
                    <input type="reset" value="جدید">
            </td>
    </tr>
  </table>
</form>




<?php
include("includes/footer.php")
?>