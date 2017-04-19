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
        $order = $this->get_row($id);
        if ($order->CustomerID != 0) {
            $this->CI->load->model('customer_model');
            $customer = $this->CI->customer_model->single($order->CustomerID);
            $order->CustomerName = $customer->CustomerName;
            $order->Email = $customer->Email;
            $order->Phone = $customer->Phone;
        }
        //Get detail
        $option = array(
            'select' => 'orderdetail.*, product.ProductName',
            'join' => array(
                array('product', 'orderdetail.ProductID= product.ProductID', '')
            ),
            'where' => 'OrderID=' . $id
        );
        $this->CI->load->model('orderdetail_model');
        $details = $this->CI->orderdetail_model->get_all($option);

        $order->Details = $details;
        return $order;
    }

    //get order
    public function get_order($limit, $offset = 0) {
        $input = array(
            'limit' => array($limit, $offset)
        );
        $orders = $this->get_all($input);
        $this->CI->load->model('customer_model');
        foreach ($orders as $row) {
            if ($row->CustomerID != 0) {

                $customer = $this->CI->customer_model->single($row->CustomerID);
                $row->CustomerName = $customer->CustomerName;
                $row->Email = $customer->Email;
                $row->Phone = $customer->Phone;
            }
        }
        return $orders;
    }

    public function get_total_sales() {
        return $this->get_sum('Total');
    }
    public function get_today_sales(){
        $where=array('Date(OrderDate)'=>gmdate('Y-m-d', time()));
        return $this->get_sum('Total', $where);
    }
}
