<?php

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
    }

    function get_by_category($id = 0, $page = 1) {
        $input = array(
            'limit' => array(9, $page),
            'where' => 'CategoryID =' . $id
        );
        $total = $this->product_model->get_total($input);
        $category = $this->category_model->get_info($id);
        $url = product_link($id, $category->CategoryName);
        $this->_default($total, $url, $category->CategoryName, $input);
    }

    function index($page = 1) {
        $input = array(
            'limit' => array(9, $page),
        );
        $total = $this->product_model->get_total($input);
        $url = 'product/all';
        $this->_default($total, $url, 'Thời trang nam', $input);
    }

    function _default($total, $url, $title, $input) {
        $this->load->library('pagination_library');
        $this->data = array(
            'temp' => 'site/product/index',
            'title' => $title,
            'totalRows' => $total,
            'pagination' => $this->pagination_library->create_links($total, $url),
            'listProducts' => $this->product_model->get_list($input),
            'hottestProducts' => $this->product_model->get_hottest_products(5),
            'categories' => $this->category_model->get_categories()
        );
        $this->load->view('site/shared/layout', $this->data);
    }

}
