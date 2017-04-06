<?php

class Product extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
    }

    function index() {
        //Lấy ra số lượng các sản phẩm trong website
        $total = $this->product_model->get_total();

        //Load và cài đặt thư viện phân trang
        $this->load->library('pagination');
        $config = array(
            'total_rows' => $total, //tổng các sản phẩm trên website
            'base_url' => base_url('admin/product/index'), //link hiển thị danh sách sản phẩm
            'per_page' => 10, // số sản phẩm trên 1 trang
            'uri_segment' => 4, //phân đoạn hiển thị số trang trên url
            'next_link' => '>>',
            'prev_link' => '<<',
            'first_link' => 'Đầu',
            'last_link' => 'Cuối'
        );
        //Khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array(
            'limit' => array($config['per_page'], $segment)
        );
        //Kiểm tra có thực hiện lọc dữ liệu hay không?
        $id = $this->input->get('id');
        $id = intval($id);
        if ($id > 0) {
            $input['where'] = array('ProductID' => $id);
        }

        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('ProductName', $name);
        }

        $cateId = $this->input->get('category');
        $cateId = intval($cateId);
        if ($cateId > 0) {
            $input['where'] = array('CategoryID' => $cateId);
        }
        //Lấy danh sách sản phẩm theo phân trang
        $list = $this->product_model->get_list($input);
        $cateOption = array(
            'where' => array('ParentID' => NULL)
        );
        $categories = $this->category_model->get_list($cateOption);
        foreach ($categories as $row) {
            $cateOption['where'] = array('ParentID' => $row->CategoryID);
            $subs = $this->category_model->get_list($cateOption);
            $row->subs = $subs;
        }

        $this->data = array(
            'message' => $this->session->flashdata('message'),
            'temp' => 'admin/product/index',
            'total' => $total,
            'list' => $list,
            'categories' => $categories
        );

        $this->load->view('admin/shared/layout', $this->data);
    }

    function delete() {
        $id = $this->uri->segment(4);
        $id = intval($id);
        $info = $this->product_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->product_model->delete($id);
        $this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
        redirect(admin_url('product'));
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $cateOption = array(
            'where' => array('ParentID' => NULL)
        );
        $categories = $this->category_model->get_list($cateOption);
        foreach ($categories as $row) {
            $cateOption['where'] = array('ParentID' => $row->CategoryID);
            $subs = $this->category_model->get_list($cateOption);
            $row->subs = $subs;
        }
        $this->data = array(
            'temp' => 'admin/product/add',
            'categories' => $categories
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

}
