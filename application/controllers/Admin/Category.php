<?php
class Category extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }
    function index(){
        $input = array(
            'select'=>'Category.*,Parent.CategoryName as ParentName',
            'join'=> array(
                'Category as Parent',
                'Category.ParentID = Parent.CategoryID',
                'left'
            )
        );

       
        $data = array(
            'temp'=>'admin/category/index',
            'total'=> $this->category_model->get_total(),
            'list'=>$this->category_model->get_list($input)
                
        );
        $this->load->view('admin/shared/layout',$data);
    }
}

?>