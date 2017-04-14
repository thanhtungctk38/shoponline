<?php

class Order extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }

    function index() {
        $this->load->library('pagination_library');
        $per_page = $this->pagination_library->per_page;
        $offset = $this->pagination_library->get_offset();
        $input = array(
            'select' => 'Order.*, Customer.*',
            'join' => array(
                'customer',
                'Order.CustomerID=Customer.CustomerID',
                ''
            ),
            'limit' => array($per_page, $offset)
        );
        $total = $this->order_model->get_total($input);
        $this->data = array(
            'message' => $this->session->flashdata('message'),
            'total' => $total,
            'temp' => 'admin/order/index',
            'list' => $this->order_model->get_list($input),
            'pagination' => $this->pagination_library->create_links()
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

}
?>

