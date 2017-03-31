<?php

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    function index() {
        //Load thư viên phân trang
        $this->load->library('pagination');
        $this->load->model('category_model');
        $id = intval($this->uri->segment(3));
         $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array(
            'limit' => array(9, $segment),
            'join' => array(
                'Category',
                'Product.CategoryID = Category.CategoryID',
                ''
            ),
            'where' => 'Product.CategoryID =' . $id,
            'or_where'=> 'Category.ParentID = '.$id
        );
        $total = $this->product_model->get_total($input);
        $category = $this->category_model->get_info($id);
        $config = array(
            'total_rows' => $total,
            'base_url' => base_url('product/index/' . $id . '/'),
            'per_page' => 9,
            'uri_segment' => 4,
            'next_link' => '>>',
            'prev_link' => '<<',
            'first_link' => 'Đầu',
            'last_link' => 'Cuối'
        );
        $this->pagination->initialize($config);

       
        
        $this->data += array(
            'temp' => 'site/product/index',
            "title" => $category->CategoryName,
            "totalRows" => $total,
            "listProducts" => $this->product_model->get_list($input),
            "hottestProducts" => $this->product_model->get_hottest_products(5)
        );
        $this->load->view('site/shared/layout', $this->data);
    }

}
