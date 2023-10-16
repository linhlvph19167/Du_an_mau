<?php
include "header.php";
include "../model/pdo.php";
include "../model/loai-hang.php";
include "../model/hang-hoa.php";
include "../model/khach-hang.php";
include "../model/binh-luan.php";
include "../model/thong-ke.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['ten_loai'])) {
                $ten_loai = $_POST['ten_loai'];
                loai_insert($ten_loai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                loai_delete($_GET['ma_loai']);
            }
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $dm = loai_getinfo($_GET['ma_loai']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $ten_loai = $_POST['ten_loai'];
                $ma_loai = $_POST['ma_loai'];
                loai_update($ma_loai, $ten_loai);
            }
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        /*hàng hóa*/
        case 'addhh':
            if (isset($_POST['ten_hh'])) {
                $ma_loai = $_POST['ma_loai'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                hh_insert($ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta, $so_luot_xem, $ma_loai);
                $thongbao = "Thêm thành công";
            }
            $listdm = loai_selectall();
            include "hanghoa/add.php";
            break;
        case 'listhh':
            if (isset($_POST['list_search']) && ($_POST['list_search'])) {
                $keyw = $_POST['keyw'];
                $ma_loai = $_POST['ma_loai'];
            } else {
                $keyw = '';
                $ma_loai = 0;
            }
            $listdm = loai_selectall();
            $listhh = hh_selectall($keyw, $ma_loai);
            include "hanghoa/list.php";
            break;
        case 'xoahh':
            if (isset($_GET['ma_hh']) && $_GET['ma_hh'] > 0) {
                hh_delete($_GET['ma_hh']);
            }
            $listhh = hh_selectall("", 0);
            include "hanghoa/list.php";
            break;
        case 'suahh':
            if (isset($_GET['ma_hh']) && $_GET['ma_hh'] > 0) {
                $hh = hh_getinfo($_GET['ma_hh']);
            }
            $listdm = loai_selectall();
            include "hanghoa/update.php";
            break;
        case 'updatehh':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $ma_loai = $_POST['ma_loai'];
                $ma_hh = $_POST['ma_hh'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                hh_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta, $so_luot_xem, $ma_loai);
            }
            $listdm = loai_selectall();
            $listhh = hh_selectall("", 0);
            include "hanghoa/list.php";
            break;
            /* Khách hàng*/
            case 'dskh':
                $listkh = khach_hang_select_all();
                include 'khachhang/list.php';
                break;
            case 'xoakh':
                if (isset($_GET['ma_kh']) && $_GET['ma_kh'] > 0) {
                    khach_hang_delete($_GET['ma_kh']);
                }
                $listkh = khach_hang_select_all();
                include "khachhang/list.php";
                break;
            case 'suakh':
                if (isset($_GET['ma_kh']) && $_GET['ma_kh'] > 0) {
                    $kh = khach_hang_select_by_id($_GET['ma_kh']);
                }
                // $listkh = khach_hang_select_all();
                include "khachhang/update.php";
                break;
            case 'updatekh':
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $ma_kh = $_POST['ma_kh'];
                    $email = $_POST['email'];
                    $mat_khau = $_POST['mat_khau'];
                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh_anh, $kich_hoat, $vai_tro);
                    $thongbao = 'Upload thành công';
                }
                $listkh = khach_hang_select_all();
                include "khachhang/list.php";
                break;
                case 'dsbl':
                    $listbl = thong_ke_binh_luan();
                    include 'binhluan/list.php';
                    break;
                case 'ctbl':
                    $ma_hh = $_GET['ma_hh'];
                    $items = binh_luan_select_by_hang_hoa($ma_hh);
                    include 'binhluan/detail.php';
                    break;
                    case 'thongke':
                        $thongke = thong_ke_hang_hoa();
                        include 'thongke/thong_ke.php';
                        break;
        
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
?>