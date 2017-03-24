<?php
class MY_Controller extends CI_Controller{
    //Biến gửi dữ liệu sang view
    public $data = array();
    function __construct() {
        parent::__construct();
        
        $controller = $this->uri->segment(1);
        switch ($controller){
            case 'admin':
        {
                //Xử lý dữ liệu khi truy cập vào admin
                $this->load->helper('admin');
                break;
        }
            default:{
                //Xử lý dữ liệu ở trang ngoài
            }
        }
    }
    //Kiểm tra trạng thái đăng nhập của admin
    private  function checkLogin(){
        
    }
}

?>

