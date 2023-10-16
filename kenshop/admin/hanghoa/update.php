<?php
    if(is_array($hh)){
        extract($hh);
    }
    $hinhpath = "../upload/".$hinh;
    if(is_file($hinhpath)){
     $hinh = "<img src='".$hinhpath."' width='25%'>";
    } else {
     $hinh = "";
    }
?>
<div class="banner">
            <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
        </div>
        <form action="index.php?act=updatehh" method="POST" enctype="multipart/form-data">
        <select name="ma_loai">
                <option value="0" selected>Tất cả</option>
                <?php foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    if($ma_loai == $ma_loai) 
                    echo ' <option value="'.$ma_loai.'" selected>'.$ten_loai.'</option>';
                    else  echo ' <option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                } ?>
            </select>
            <br>
            Tên hàng hóa
            <br>
            <input type="text" name="ten_hh" value="<?=$ten_hh?>">
            <br>
            Đơn giá
            <br>
            <input type="number" name="don_gia" value="<?=$don_gia?>">
            <br>
            Giảm giá
            <br>
            <input type="number" name="giam_gia" value="<?=$giam_gia?>">
            <br>
            Hình
            <br>
            <input type="file" name="hinh"><?=$hinh?> 
            <br>
            Mô tả
            <br>
            <textarea name="mo_ta" cols="30" rows="10"><?=$mo_ta?></textarea>
            <br>
            Số lượt xem
            <br>
            <input type="number" name="so_luot_xem" value="<?=$so_luot_xem?>">
            <br>
            <input type="hidden" name="ma_hh" value="<?=$ma_hh?>">
            <br>
            <input type="submit"  value="Cập nhật" name="update">

            <a href="index.php?act=listhh"><input type="button" value="Danh sách"></a>
        </form>
    </div>
</body>
</html>