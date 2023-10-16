<?php
session_start();
include "global.php";
include "model/pdo.php";
include "model/loai-hang.php";
include "model/hang-hoa.php";
include "model/khach-hang.php";

include "./view/header.php";

$loadhh = hh_selectall_home();
$loaddm = loai_selectall();
$top10 = hh_selectall_top10();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangki':
            
            if (isset($_POST['dangki'])) {
              
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                //Di chuyển tệp tin đã tải lên từ vị trí tạm thời đến vị trí lưu trữ cuối cùng
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                //thêm người dùng mới vào cơ sở dữ liệu
                khach_hang_insert($mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
                $thongbao = 'Đăng ký thành công';
            }
            include 'view/taikhoan/dangki.php';
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                $ho_ten=$_POST['ho_ten'];
                $mat_khau=$_POST['mat_khau'];
                
                $checkuser= check_user($ho_ten,$mat_khau);
                //kiem tra xem ng dùng có ở trong csdl hay k
                if(is_array($checkuser)){
                    $_SESSION['user'] = $checkuser;
                    //load lại trang
                    header('Location: index.php');
                }else {
                    $thongbao ="Tài khoản không tồn tại, vui lòng đăng kí";
                }
            }
            include "view/taikhoan/dangki.php";
            break;
        case 'updatetk':
            if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                $email=$_POST['email'];
                $ho_ten=$_POST['ho_ten'];
                $mat_khau=$_POST['mat_khau'];
                $vai_tro=$_POST['dia_chi'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $kich_hoat = $_POST['kich_hoat'];
                $ma_kh=$_POST['ma_kh'];
                //Gọi hàm "khach_hang_update" để cập nhật thông tin tài khoản người dùng trong cơ sở dữ liệu
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                $_SESSION['user'] = check_user($ho_ten,$mat_khau);
                header('Location: index.php?act=updatetk');
            }
            include "view/taikhoan/updatetk.php";
            break;
        case 'updatetk':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $email=$_POST['email'];
                    $ho_ten=$_POST['ho_ten'];
                    $mat_khau=$_POST['mat_khau'];
                    $vai_tro=$_POST['dia_chi'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "./upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $kich_hoat = $_POST['kich_hoat'];
                    $ma_kh=$_POST['ma_kh'];
                    //Gọi hàm "khach_hang_update" để cập nhật thông tin tài khoản người dùng trong cơ sở dữ liệu
                    khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                    $_SESSION['user'] = check_user($ho_ten,$mat_khau);
                    header('Location: index.php?act=updatetk');
                }
                include "view/taikhoan/updatetk.php";
                break;
                case 'quenmk':
                    if(isset($_POST['gui']) && ($_POST['gui'])){
                        $email=$_POST['email'];
                        $ho_ten = $_POST['ho_ten'];
                        $checkemail = check_email($email, $ho_ten);
                        if(is_array($checkemail)){
                            $thongbao="Mật khẩu của bạn là: ".$checkemail['mat_khau'];
                        } else {
                            $thongbao="Email này không tồn tại";
                        }
                    }
                    include "view/taikhoan/quenmk.php";
                    break;
                    case 'logout':
                        //được sử dụng để xóa tất cả các biến phiên ($_SESSION) trong phiên hiện tại
                        session_unset();
                        header('Location: index.php');
                        break;
        case 'sanpham':
            if (isset($_POST['keyw']) && ($_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
            } else {
                $ma_loai = 0;
            }
            $dshh = hh_selectall($keyw, $ma_loai);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $ma_hh = $_GET['idsp'];
                $onesp = hh_getinfo($ma_hh);
                extract($onesp);
                $spkhac = cunghh_getinfo($ma_loai, $ma_hh);

                include "view/sanphamct.php";
            } else {
                include "./view/home.php";
            }

            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";


?>