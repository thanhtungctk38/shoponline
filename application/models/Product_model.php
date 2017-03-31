<?php
class Product_model extends MY_Model{
    var $table='product';
    var $key ='ProductID';
    function get_featured_products(){
        $option = array(
            'limit'=> array(10,0)
        );
        return $this->get_list($option);
    }
    function  get_lastest_products(){
        $option = array(
            'limit'=>array(10,0),
            'order'=>array('CreateDate','DESC')
        );
        return $this->get_list($option);
    }
    function get_hottest_products($limit = 10){
        $option = array(
            'limit'=>array($limit,0),
            'order'=>array('TotalView','DESC')
        );
        return $this->get_list($option);
    }
    function get_promotion_products(){
        $option = array(
            'where'=>'PercentOff > 0'
        );
        return $this->get_list($option);
    }
}
?>
