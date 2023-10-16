<div class="banner">
            <h1>DANH SÁCH LOẠI HÀNG</h1>
        </div>
        <table>
            <tr>
                <th></th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th></th>
            </tr>
            <?php foreach ($listdm as $danhmuc) { //lặp qua danh sách danh mục sản phẩm ($listdm) 
            //và hiển thị thông tin của từng danh mục trên trang
               extract($danhmuc); //giải nén thành các biến riêng lẻ,  giúp bạn biến chúng thành các biến riêng lẻ
               $suadm = "index.php?act=suadm&ma_loai=".$ma_loai; //Tạo biến liên kết
               $xoadm = "index.php?act=xoadm&ma_loai=".$ma_loai;
               echo '<tr>
                <td><input type="checkbox"></td>
                <td>'.$ma_loai.'</td>
                <td>'.$ten_loai.'</td>
                <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a>
                <a href="'.$xoadm.'"> <input type="button" value="Xóa"></a>
                </td>
            </tr>';
            }
            ?>
        </table>
             
        <input type="button" value="Chọn tất cả">

        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        