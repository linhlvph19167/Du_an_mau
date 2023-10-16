<div class="banner">
            <h1>THÊM MỚI HÀNG HÓA</h1>
        </div>
        <form action="index.php?act=addhh" method="POST" enctype="multipart/form-data">
            Mã hàng hóa
            <br>
            <input type="text" name="ma_hh" disabled>
            <br>
            Tên hàng hóa
            <br>
            <input type="text" name="ten_hh">
            <br>
            Đơn giá
            <br>
            <input type="number" name="don_gia" min="0">
            <br>
            Giảm giá
            <br>
            <input type="number" name="giam_gia" min="0">
            <br>
            Hình
            <br>
            <input type="file" name="hinh" > 
            <br>
            Mô tả
            <br>
            <textarea name="mo_ta" cols="30" rows="10"></textarea>
            <br>
            Số lượt xem
            <br>
            <input type="number" name="so_luot_xem" min="0">
            <br>
            Mã loại
            <br>
            <select name="ma_loai">
                <?php foreach ($listdm as $danhmuc) {//để lặp qua danh sách danh mục sản phẩm ($listdm). Mỗi $danhmuc trong danh sách được lấy ra
                // và sử dụng để tạo một tùy chọn trong danh sách thả xuống
                    extract($danhmuc); //được sử dụng để giải nén (extract) các phần tử trong mảng $danhmuc thành các biến động. 
                    //Mục đích là để truy cập dễ dàng vào các giá trị của từng danh mục, bao gồm ma_loai và ten_loai.
                    echo ' <option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                } ?>
            </select>
             
            <input type="submit"  value="Thêm mới">

            <input type="reset" value="Nhập lại">

            <a href="index.php?act=listhh"><input type="button" value="Danh sách"></a>
            <?php
                if(isset($thongbao) && ($thongbao!="")) echo $thongbao;
            ?>
        </form>
    </div>
</body>
</html>