<?php
class ProductDetail extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }
    function index($id){
        $product = $this->product_model->get_info($id);
        $this->data += array(
            'temp'=>'site/productdetail/index',
            'title'=> $product->ProductName,
            'product'=>$product,
            'hottestProducts'=>$this->product_model->get_hottest_products(3)
        );
        $this->load->view('site/shared/layout', $this->data);
    }
    
}

