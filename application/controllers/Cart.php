<?php

class Cart extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->library('form_validation');
        $this->load->helper("form");
        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = md5($password);
                $where = array(
                    'Username' => $username,
                    'Password' => $password
                );
                $user = $this->customer_model->get_info_rule($where);
                $this->session->set_userdata('user_login', $user);
                $this->session->set_userdata('flash_message', 'Đăng nhập thành công');
                redirect('cart');
            }
        }
        $this->data = array(
            'temp' => 'site/cart/index',
            'title' => 'Trang giỏ hàng 4MENSHOP Thương hiệu thời trang nam giá rẻ',
            'cart' => $this->cart->contents(),
            'total' => $this->cart->total()
        );
        $this->load->view('site/shared/layout', $this->data);
    }

    function check_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('customer_model');
        if ($this->customer_model->check_login($username, $password))
            return true;
        $this->form_validation->set_message(__FUNCTION__, 'Tên đăng nhập hoặc mật không chính xác');
        return false;
    }

    function add($id, $qty = 1) {
        $this->load->model('product_model');

        $product = $this->product_model->get_info($id);
        $cart = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $product->Price,
            'name' => $product->ProductName,
            'option' => array(
                'image' => $product->Image
            )
        );
        $this->cart->insert($cart);
  
    }

    public function update($id, $qty) {
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value) {
            if ($value['id'] == $id) {
                $data = array(
                    'rowid' => $key,
                    'qty' => $qty
                );
                //cap nhat lai gio hang
                $this->cart->update($data);
                break;
            }
        }
    }

    function update_ajax() {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        echo format_price($qty * $price);
        $this->update($id, $qty);
    }

    public function load_cart_total() {
        echo format_price($this->cart->total());
    }

    public function delete($id) {
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value) {
            if ($value['id'] == $id) {
                $data = array(
                    'rowid' => $key,
                    'qty' => 0,
                );
                $this->cart->update($data);
                break;
            }
        }
        redirect(base_url('cart'));
    }

    function send($customerID) {
        $this->load->model('order_model');
        $this->load->model('orderdetail_model');
        $order = array(
            'OrderID' => 0,
            'CustomerID' =>$customerID,
            'OrderAddress' => $this->input->post('address'),
            'Total' => $this->cart->total()
        );

        $order_id = $this->order_model->Create($order);

        $cart = $this->cart->contents();
        foreach ($cart as $product) {
            $order_detail = array(
                'OrderID' => $order_id,
                'ProductID' => $product['id'],
                'Quantity' => $product['qty'],
                'Price' => $product['price']
            );
            $this->orderdetail_model->create($order_detail);
        }
        $this->cart->destroy();

        //load view
        header("refresh:5;url=" . base_url());

        echo '<div style="text-align: center;padding: 20px 10px;">Đặt hàng thành công <br>Cảm ơn bạn đã đặt hàng của shop. Shop sẽ confirm lại với bạn trong thời gian sớm nhất để xác nhận đơn hàng.<br>
                    Trình duyệt sẽ tự động chuyển về trang chủ sau 5s, hoặc bạn có thể click <a href="localhost/shoponline">here</a>.</div>';
    }

}
?>

