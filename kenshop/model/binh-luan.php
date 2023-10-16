<?php
require_once 'pdo.php';

function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl){
    //Them mới
    $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}



function binh_luan_select_all(){
    //truy vấn ngaybl
    $sql = "SELECT * FROM binh_luan bl ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}

function binh_luan_select_by_id($ma_bl){
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}

//-------------------------------//
//truy van trả lại tất cả bl kèm thông tin
function binh_luan_select_by_hang_hoa($ma_hh){
    $sql = "SELECT b.*, h.ten_hh, k.ho_ten FROM hang_hoa h INNER JOIN  binh_luan b ON h.ma_hh=b.ma_hh INNER JOIN khach_hang k ON b.ma_kh = k.ma_kh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
    //ORDER BY được sử dụng để sắp xếp kết quả theo trường "ngay_bl"
}