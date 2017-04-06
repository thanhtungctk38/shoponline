<?php

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    function index($id, $page = 1) {
        //Load thư viên phân trang
        $this->load->library('pagination');
        $this->load->model('category_model');
        $input = array(
            'limit' => array(9, $page),
            'join' => array(
                'category',
                'product.CategoryID = category.CategoryID',
                ''
            ),
            'where' => 'product.CategoryID =' . $id,
            'or_where' => 'category.ParentID = ' . $id
        );
        $total = $this->product_model->get_total($input);
        $category = $this->category_model->get_info($id);
        $config = array(
            'total_rows' => $total,
            'base_url' => base_url('danhmuc/'.$id. '-'.str_to_slug($category->CategoryName)),
            'per_page' => 9,
            'uri_segment' => 4,
            'next_link' => '>>',
            'prev_link' => '<<',
            'first_link' => 'Đầu',
            'last_link' => 'Cuối',
           'suffix'=>'.html',
            'use_page_numbers'=>TRUE
            
        );
 
        $this->pagination->initialize($config);
        $this->data += array(
            'temp' => 'site/product/index',
            'title' => $category->CategoryName,
            'totalRows' => $total,
            'pagination'=>$this->pagination->create_links(),
            'listProducts' => $this->product_model->get_list($input),
            'hottestProducts' => $this->product_model->get_hottest_products(5)
        );
        $this->load->view('site/shared/layout', $this->data);
    }

}
