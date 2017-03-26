<?php

class Account extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }

    /*
     * Lấy danh sách account
     */

    function admin() {
        $option = array(
            'where' => 'MaQuyen =1'
        );
        $this->data = array(
            'temp' => 'admin/account/admin',
            'list' => $this->account_model->get_list($option),
            'total' => $this->account_model->get_total($option)
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    function user() {
        $option = array(
            'where' => 'MaQuyen =2'
        );
        $this->data = array(
            'temp' => 'admin/account/user',
            'list' => $this->account_model->get_list($option),
            'total' => $this->account_model->get_total($option)
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    function permission() {
        $this->load->model('permission_model');
        $this->data = array(
            'temp' => 'admin/account/permission',
            'list' => $this->permission_model->get_list(),
            'total' => $this->permission_model->get_total()
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //Nếu có dữ liệu post lên thì kiểm tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|max_length[50]|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|max_length[50]');
            $this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'required|matches[password]');
            $this->form_validation->set_rules('fullname', 'Nhập lại mật khẩu', 'required|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'numeric|max_length[12]|min_length[9]');
        }
        //Nếu nhập liệu chính xác
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('ơassword');
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $birthday = $this->input->post('birthday');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            if ($this->input->post('gender')) {
                $gender = 1;
            } else {
                $gender = 0;
            }
            if ($this->input->post('permission')) {
                $permission = 1;
            } else {
                $permission = 2;
            }
        }
        $this->data = array(
            'temp' => 'admin/account/add'
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    //Kiểm tra username đã tồn tại hay chưa
    function check_username() {
        $username = $this->input->post('username');
        $where = array(
            'TenDN' => $username
        );
        if ($this->account_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
            return false;
        }

        return true;
    }

}
?>

