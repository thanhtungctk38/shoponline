<?php

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }

    /*
     * Lấy danh sách account
     */

    function index() {
        $this->data = array(
            'temp' => 'admin/admin/index',
            'list' => $this->account_model->get_list(),
            'total' => $this->account_model->get_total()
        );
        $this->load->view('admin/shared/layout', $this->data);
    }
    function add(){
        $this->data = array(
            'temp' => 'admin/admin/add'
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

}
?>

