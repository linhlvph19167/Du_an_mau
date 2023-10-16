<div class="banner">
    <h1>QUẢN LÝ KHÁCH HÀNG</h1>
    <form action="index.php?act=addkh" method="post" enctype="multipart/form-data">
        <label for="">MÃ KHÁCH HÀNG</label><br>
        <input type="text">

        <label for="">HỌ VÀ TÊN</label><br>
        <input type="text" name="ho_ten">

        <label for="">MẬT KHẨU</label><br>
        <input type="text" name="mat_khau">

        <label for="">XÁC NHẬN MẬT KHẨU</label><br>
        <input type="text" >

        <label for="">ĐỊA CHỈ EMAIL</label><br>
        <input type="email" name="email" required>

        <label for="">HÌNH ẢNH</label><br>
        <input type="file" name="hinh_anh"><br>

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

        <button type="submit">Thêm mới</button>
        <button type="reset">Nhập lại</button>
        <button><a href="index.php?act=dskh">Danh sách</a></button>
        <?php
        if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>
</body>

</html>