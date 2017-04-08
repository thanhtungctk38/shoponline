<?php

class Category_model extends MY_Model {

    var $table = 'category';
    var $key = 'CategoryID';

    function get_categories() {
        $cateOption = array(
            'where' => array('ParentID' => NULL)
        );
        $categories = $this->get_list($cateOption);
        foreach ($categories as $row) {
            $cateOption['where'] = array('ParentID' => $row->CategoryID);
            $subs = $this->get_list($cateOption);
            $row->subs = $subs;
        }
        return $categories;
    }

}

?>