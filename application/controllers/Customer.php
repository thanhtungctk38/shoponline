<?php

class Customer extends MY_Controller{
    function login(){
        $this->data=array(
            'temp'=>'site/customer/login',
            'title'=>'Đăng nhập 4MENSHOP'
        );
        $this->load->view('site/shared/layout', $this->data);
    }
}
