<?php
class ProductDetail extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }
    function index(){
        $id = intval($this->uri->segment(3));
        
        $this->data += array(
            'temp'=>'site/productdetail/index',
            'product'=>$this->product_model->get_info($id),
            'hottestProducts'=>$this->product_model->get_hottest_products(3)
        );
        $this->load->view('site/shared/layout', $this->data);
    }
}

