<?php

class Pagination_library {

    var $CI = '';

    public function __construct() {
        $this->CI = &get_instance();
    }
    function create_links($total, $url){
        $config= $this->config($total, $url);
        $this->CI->load->library('pagination',$config);
        return $this->CI->pagination->create_links();
    }
    function config($total, $url) {
        $config = array(
            'total_rows' => $total,
            'base_url' => $url,
            'per_page' => 9,
            'uri_segment' => 4,
            'next_link' => '>>',
            'prev_link' => '<<',
            'first_link' => 'Đầu',
            'last_link' => 'Cuối',
            'suffix' => '.html',
            'use_page_numbers' => TRUE
        );
        return $config;
    }

}
