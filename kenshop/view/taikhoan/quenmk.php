<main>
<div class="artical">

    <div class="box-title">
       Quên mật khẩu
    </div>
    <div class="box-content">
       <form action="index.php?act=quenmk" method="POST">
            Email
            <br>
            <input type="email" name="email" required>
           Tên đăng nhâp
           <br>
           <input type="text" name="ho_ten">
            <br>
            <input type="submit" value="Gửi" name="gui">
            <input type="reset" value="Nhập lại"> 
       </form>
       <h2 class="thongbao">
       <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
       ?>
       </h2>
    </div>
</div>
<div class="aside">
    <?php include "./view/aside.php";?>
</div>
<div class="clear"></div>
</main>