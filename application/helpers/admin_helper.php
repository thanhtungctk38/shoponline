<?php
//Tạo ra các link trong trang admin
function admin_url($url=''){
    return base_url('admin/'.$url);
}

function product_img_url($imgname){
    return base_url('upload/productimg/'.$imgname);
}



?>

