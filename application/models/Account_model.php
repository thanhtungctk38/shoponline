<?php
class Account_model extends MY_Model{
    var $table = 'account';
    var $key = 'AccountID';
    public function check_login($username, $password){
        $where = array(
            'Username'=>$username,
            'Password'=>$password
        );
        if($this->check_exists($where))
        {
            return true;
        }
        return false;
    }
    
}

?>
