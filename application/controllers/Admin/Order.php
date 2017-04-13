<?php
class Order extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        
    }
    
    function index(){
        $input = array(
            'select'=>'Order.*, Customer.*',
            'join'=>array(
                'customer',
                'Order.CustomerID=Customer.CustomerID',
                ''
            ),
            
            
        );
        $this->data = array(
            'temp'=>'admin/order/index',
            'list'=>$this->order_model->get_list($input)
        );
        $this->load->view('admin/shared/layout', $this->data);
    }
}
?>

