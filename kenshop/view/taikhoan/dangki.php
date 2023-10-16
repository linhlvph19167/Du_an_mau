<main>
<div class="artical">

    <div class="box-title">
       ĐĂNG KÝ THÀNH VIÊN
    </div>
    <div class="box-content">
       <form action="index.php?act=dangki" method="POST" enctype="multipart/form-data">
           <label for="">TÊN ĐĂNG NHẬP</label><br>
           <input type="text" name="ho_ten">

           <label for="">MẬT KHẨU</label><br>
           <input type="text" name="mat_khau">

           <label for="">XÁC NHẬN MẬT KHẨU</label><br>
           <input type="text" >

           <label for="">ĐỊA CHỈ EMAIL</label><br>
           <input type="email" name="email" required>

           <label for="">HÌNH ẢNH</label><br>
           <input type="file" name="hinh"><br>

           <label for="">KÍCH HOẠT</label><br>
           <div class="vt">
               <input type="radio" name="kich_hoat" value="Chưa kích hoạt">Chưa kích hoạt
               <input type="radio" name="kich_hoat" value="Đã kích hoạt"> Đã kích hoạt <br>
           </div>

           <label for="">VAI TRÒ</label>
           <div class="vt">
               <input type="radio" name="vai_tro" value="Khách hàng">Khách Hàng
               <input type="radio" name="vai_tro" value="Nhân viên">Nhân viên
           </div>

            <input type="submit" value="Đăng ký" name="dangki">
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