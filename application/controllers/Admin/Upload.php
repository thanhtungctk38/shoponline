<?php

class Upload extends MY_Controller {

    function index() {

        if ($this->input->post('submit')) {
            $this->load->library('upload_library');
            $data = $this->upload_library->upload('./upload/user', 'image');
            pre($data);
        }


        $this->data = array(
            'temp' => 'admin/upload/index'
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

    function upload_file() {
        if ($this->input->post('submit')) {
            $this->load->library('upload_library');
            $data = $this->upload_library->upload_list('./upload/user', 'image_list');
            pre($data);
        }
        $this->data = array(
            'temp' => 'admin/upload/upload_file'
        );
        $this->load->view('admin/shared/layout', $this->data);
    }

}

?>
