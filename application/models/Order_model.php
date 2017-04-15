<?php

class Order_model extends MY_Model {

    var $table = 'order';
    var $key = 'OrderID';
    var $CI;

    function __construct() {
        parent::__construct();
        $this->CI = &get_instance();
    }

    /*
     * Lấy thông tin chi tiết đơn hàng
     * @param $id : mã đơn hàng
     * @return array: mảng đơn hàng (gồm chi tiết)
     */

    public function get_order_detail($id) {
        $order = $this->get_info($id);
        $option = array(
            'select' => 'orderdetail.*, product.ProductName',
            'join' => array(
                'product',
                'orderdetail.ProductID= product.ProductID',
                ''
            ),
            'where' => 'OrderID=' . $id
        );
        $this->CI->load->model('orderdetail_model');
        $details = $this->CI->orderdetail_model->get_list($option);
       
        $order->details = $details;
        return $order;
    }

}
