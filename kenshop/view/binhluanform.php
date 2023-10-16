<?php
session_start();
include "../model/pdo.php";
include "../model/binh-luan.php";
$ma_hh = $_REQUEST['ma_hh'];
$bl = binh_luan_select_by_hang_hoa($ma_hh);
?>
<div class="box">
    <div class="box-title">
        BÌNH LUẬN
    </div>
    <div class="box-content">
        Nội dung bình luận ở đây
        <table>
            <?php
            foreach ($bl as $dsbl) {
                extract($dsbl);
                echo '<tr><td>' . $noi_dung . '</td>';
                echo '<td>' . $ho_ten . '</td>';
                echo '<td>' . $ngay_bl . '</td></tr>';
            }
            ?>
        </table>
        <?php
        if (isset($_SESSION['user']['ma_kh'])) {
             $ma_kh = $_SESSION['user']['ma_kh'] ;
            ?>
        <div class="binhluanform">
        <form action="<?=$_SERVER['PHP_SELF']; ?>"method="post" >
            <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
            <input type="hidden" name="ma_kh" value="<?php echo $ma_kh?>">
            <input type="text" name="noidung" >
            <input type="submit" name="guibinhluan" value="Gửi bình luận ">
        </form>
        </div>

        <?php } else {
            echo '<div>Bạn phải đăng nhập để bình luận đăng nhập</div>';
        }
        ?>

        <?php
        if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
            $noidung = $_POST['noidung'];
            $ma_hh = $_POST['ma_hh'];
            $ngaybl = date('Y/m/d');
            $ma_kh = $_POST['ma_kh'];
            binh_luan_insert($ma_kh, $ma_hh, $noidung, $ngaybl);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>

</div>