<?php

class Order extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }

    function index() {
        //Kiểm tra có lọc hay không
        $input = $this->_filter();
        $this->load->library('pagination_library');
        $offset = $this->pagination_library->get_offset(10);
        $input = array(
            'limit' => array(10, $offset)
        );
        $total = $this->order_model->total($input);
        $url = admin_url('order');
        $this->data = array(
            'message' => $this->session->flashdata('message'),
            'total' => $total,
            'temp' => 'admin/order/index',
            'list' => $this->order_model->get_order(10, $offset),
            'pagination' => $this->pagination_library->create_links($total, $url)
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    public function detail($id) {
        $this->data = array(
            'message' => $this->session->flashdata('message'),
            'temp' => 'admin/order/detail',
            'order' => $this->order_model->get_order_detail($id),
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    /*
     * Hàm kiểm tra các điều kiện lọc
     * @return $input : mảng các điều kiện
     */

    private function _filter() {
        $input = array();
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where'] += array('OrderID' => $id);
        }
        $status = $this->input->get('status');
        $status = intval($status);
        if ($status >= 0) {
            $input['where'] += array('Status' => $status);
        }

        $customer = $this->input->get('customer');
        $customer = intval($customer);
        if ($customer > 0) {
            $input['where'] += array('Customer.CustomerID' => $customer);
        }
        return $input;
    }

}
?>

