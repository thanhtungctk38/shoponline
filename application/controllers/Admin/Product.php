<?php

class Product extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
    }

    function index() {
        //Lấy ra số lượng các sản phẩm trong website
        //Kiểm tra có thực hiện lọc dữ liệu hay không?
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where'] += array('ProductID' => $id);
        }

        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('ProductName', $name);
        }

        $cateId = $this->input->get('category');
        $cateId = intval($cateId);
        if ($cateId > 0) {
            $input['where'] += array('CategoryID' => $cateId);
        }
        $this->load->library('pagination');
        $total = $this->product_model->get_total($input);
        $config = array(
            'total_rows' => $total, //tổng các sản phẩm trên website
            'base_url' => base_url('admin/product/index?id=' . $id . '&name=' . $name . '&category=' . $cateId), //link hiển thị danh sách sản phẩm
            'per_page' => 10, // số sản phẩm trên 1 trang
            'uri_segment' => 4, //phân đoạn hiển thị số trang trên url
            'next_link' => '>>',
            'prev_link' => '<<',
            'first_link' => 'Đầu',
            'last_link' => 'Cuối',
            'use_page_numbers' => TRUE,
            'query_string_segment' => 'page',
            'page_query_string' => TRUE
        );
        //Khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);
        $page = intval($this->input->get('page'));
        $page = ($page > 0) ? $page : 1;
        $input['limit'] = array($config['per_page'], ($page - 1) * $config['per_page']);

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

    function delete($id) {
        $info = $this->product_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        //Xóa sản phẩm
        $this->product_model->delete($id);
        //Xóa file ảnh của sản phẩm
        $product_link = product_img_url($info->Image);
        if(file_exists($product_link)){
            unlink($product_link);
        }
        $this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
        redirect(admin_url('product'));
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //Nếu có dữ liệu post lên thì kiểm tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên sản phẩm', 'required|max_length[50]');
            $this->form_validation->set_rules('price', 'Giá', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'Số lượng', 'required|numeric');
        }
        //Nếu nhập liệu chính xác
        if ($this->form_validation->run()) {
            $productname = $this->input->post('name');
            $categoryid = $this->input->post('category');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
            $quantity = $this->input->post('quantity');
            $this->load->library('upload_library');
            $image = $this->upload_library->upload('./upload/product', 'image');
            $data = array(
                'ProductName' => $productname,
                'CategoryID' => $categoryid,
                'Price' => $price,
                'Discount' => $discount,
                'Quantity' => $quantity,
                'Image' => $image
            );

            if ($this->product_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không thể thêm dữ liệu');
            }
            redirect(admin_url('product'));
        }

        $this->data = array(
            'temp' => 'admin/product/add',
            'categories' => $this->category_model->get_categories()
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    function edit($id) {
        $info = $this->product_model->get_info($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên sản phẩm', 'required|max_length[50]');
            $this->form_validation->set_rules('price', 'Giá', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'Số lượng', 'required|numeric');
        }
        //Nếu nhập liệu chính xác
        if ($this->form_validation->run()) {
            $productname = $this->input->post('name');
            $categoryid = $this->input->post('category');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
            $quantity = $this->input->post('quantity');
            $this->load->library('upload_library');
            $image = $this->upload_library->upload('./upload/product', 'image');
            
            $data = array(
                'ProductName' => $productname,
                'CategoryID' => $categoryid,
                'Price' => $price,
                'Discount' => $discount,
                'Quantity' => $quantity
            );
            if($image!=NULL){
                $data['Image']=$image;
            }
            if ($this->product_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'Chỉnh sửa dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không thể chỉnh sửa dữ liệu');
            }
            redirect(admin_url('product'));
        }
        $this->data = array(
            'temp' => 'admin/product/edit',
            'info' => $info,
            'categories' => $this->category_model->get_categories()
        );
        $this->load->view('admin/shared/layout', $this->data);
    }
}
